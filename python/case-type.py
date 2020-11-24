from selenium.webdriver.support.ui import Select
from selenium import webdriver
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.common.keys import Keys
from PIL import Image
from pytesseract import image_to_string
import pytesseract ,bs4 ,json
import time
import argparse
import os,sys
import time
import mysql.connector


def get_captcha_text(location, size):
    # pytesseract.pytesseract.tesseract_cmd = 'path/to/pytesseract'
    im = Image.open('screenshot.png')
    left = location['x']
    top = location['y']
    right = location['x'] + size['width']
    bottom = location['y'] + size['height']
    im = im.crop((left, top, right, bottom)) # defines crop points
    im.save('screenshot.png')
    captcha_text = image_to_string(Image.open('screenshot.png'))
    return captcha_text


def get_captcha_image(driver):
    element = driver.find_element_by_id('captcha_image')
    location = element.location

    size = element.size
    driver.save_screenshot('screenshot.png')

    return get_captcha_text(location,size)

def download_page_from_child_link():
    time.sleep(2)
    webobj = driver.find_element_by_id("download")
    webobj.click()
    #Click the OK button and close
    time.sleep(5)
    # allGUID = driver.window_handles
    # press('enter')
    # print(allGUID)
    pyautogui.press('enter')

    # time.sleep(2)
    # webobj.send_keys(Keys.RETURN)

    time.sleep(2)
    driver.close()

    #Restore the handle back to parent handle
    driver.switch_to.window(driver.window_handles[0])

# main function
if __name__ =="__main__":

    try :

        config = {
            'user': 'root',
                'password': '12345',
                    'unix_socket': '/var/run/mysqld/mysqld.sock',
                        'database': 'delhi_police',
                            'raise_on_warnings': True,
                                'auth_plugin':'mysql_native_password'
        }
        # connection to database
        mydb = mysql.connector.connect(**config)

        mycursor = mydb.cursor()

        sqlSelect = "SELECT * FROM case_types WHERE scrap_status='0'"
        mycursor.execute(sqlSelect)

        myresult = mycursor.fetchone()
        
        print(myresult)
        print("Begin")
        
        #define variable from api
        site_url = myresult[1]
        court_type = myresult[2]   #Court Complex(default) or Court Establishment
        court_complex = myresult[3] # Tis hazari for now
        case_type = myresult[4] #ARB. A. (COMM.) - COMMERCIAL ARBITRATION UNDER SECTION 37 (2)
        year = myresult[5]
        status = myresult[6] # 0 for pending and 1 for disposed

        #Chrome settings
        settings = {
        "recentDestinations": [{
                "id": "Save as PDF",
                "origin": "local",
                "account": "",
            }],
            "selectedDestinationId": "Save as PDF",
            "version": 2
        }
        prefs = {'printing.print_preview_sticky_settings.appState': json.dumps(settings)}
        options = webdriver.ChromeOptions()
        options.add_experimental_option('prefs', prefs)
        options.add_argument('--kiosk-printing')
        options.add_argument('--disable-dev-shm-usage')
        options.add_argument('--no-sandbox')
        options.add_argument('--headless')
        driver = webdriver.Chrome('/home/ubuntu/chromedriver',options=options)
        driver.implicitly_wait(30)
        driver.maximize_window()
        print('Lets start')
        driver.get(site_url)
        WebDriverWait(driver, 10).until(lambda d: d.execute_script('return document.readyState') == 'complete')
        # choose radio button for the court type


        # choose radio button for the court type
        if court_type == '1':
            driver.find_element_by_id('radCourtComplex').click()
            courtComplex = Select(driver.find_element_by_id("court_complex_code")).select_by_value(court_complex)
        else :
            driver.find_element_by_id('radCourtEst').click()
            courtComplex = Select(driver.find_element_by_id("court_code")).select_by_value(court_complex)



        #case type
        Select(driver.find_element_by_id("case_type")).select_by_value(case_type)

        #year
        driver.find_element_by_id('search_year').send_keys(year)

        if(status == '1') :
            driver.find_element_by_id('radP').click()
        else :
            driver.find_element_by_id('radD').click()

        print("Input value done")


        i = 0
        k=0
        previous = ''

        #loop to attempt captcha entry max 20
        while i<20:

            time.sleep(2)

            captcha_text = get_captcha_image(driver)
            captcha = driver.find_element_by_id('captcha')
            captcha.clear()
            captcha.send_keys(captcha_text) #enter captcha text

            driver.execute_script("validate()") #submit

            print("form submit")

            time.sleep(3)

            try:
                WebDriverWait(driver, 3).until(EC.alert_is_present(),
                                                    'Timed out waiting for PA creation ' +
                                                    'confirmation popup to appear.')

                alert = driver.switch_to.alert
                alert_text = alert.text
                alert.accept()

                # click to refresh captch
                driver.find_element_by_xpath('//a[@title="Refresh Image"]').click()

                # print('alert - accept')
                # print(alert_text)
                i = i+1
            except TimeoutException:
                print("exception")
                
            output = driver.find_element_by_id('showList')
            source_code = output.get_attribute("outerHTML")
            
            print("response")
            
            links = []
            for link in output.find_elements_by_tag_name('a') :
                # link.click()
                parent_attribute = link.get_attribute("onclick")

                # print(parent_attribute)
                print("==========> parent attribute")

                if(parent_attribute) :
                    driver.execute_script(str(parent_attribute))

                    time.sleep(3)
                    driver.implicitly_wait(30)

                    second_output = driver.find_element_by_id('secondpage')
                    second_output_source_code = second_output.get_attribute("outerHTML")

                    # print(second_output_source_code)
                    print("second page output +++++++++++")
                    soup = bs4.BeautifulSoup(driver.page_source,'html.parser')
                    elems  = soup.select('a[target="_blank"]')
                    
                    for elem in elems:
                        link = 'https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/' + elem['href']
                        links.append(link)

                    for link in second_output.find_elements_by_tag_name('a') :
                        attribute = link.get_attribute("onclick")
                        print("==========> second attribute")

                        if(attribute) :
                            driver.execute_script(str(attribute))
                            time.sleep(3)
                            third_output = driver.find_element_by_id('thirdpage')
                            third_output_source_code = third_output.get_attribute("outerHTML")
                            # print(third_output_source_code)
                            print('--------> third page output')
                            driver.execute_script("funBackBusiness()")



                    time.sleep(2)
                    driver.execute_script("funBack()") #back to the previous page

            if links != []:
                print(links)
                print('Total Docs:'+str(len(links)))   
            for m,link in enumerate(links) :
                driver.get(link)
                time.sleep(10)
                driver.execute_script('window.print();')
                time.sleep(5)
                new_name = link.split('filename=')[1].split('/')[3].split('&')[0].strip()
                os.rename('display_pdf.pdf',new_name)
                time.sleep(3)
                print('Documents completed'+str(m+1))
                if m == len(links)-1:
                    print('Done.Bye-Bye')
                    # driver.quit()
                    sys.exit()

    except Exception as err:
        print('ERROR: %sn' % str(err))
        # driver.quit()


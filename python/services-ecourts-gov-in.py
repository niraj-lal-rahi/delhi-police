from selenium.webdriver.support.ui import Select
from selenium import webdriver
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.common.exceptions import TimeoutException
from PIL import Image
from pytesseract import image_to_string
import pytesseract ,bs4 ,json
import time
import argparse
import requests
# for ssh login dependency below
import subprocess
import os,sys
import glob
from zipfile import ZipFile
import time
import platform
from pathlib import Path

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


        API_ENDPOINT = "http://13.233.146.136/DelhiPolice/public/api/"

        parser = argparse.ArgumentParser(description='Short sample app')
        parser.add_argument('-id','--id', required=False,  type=int)

        # args = vars(parser.parse_args())

        # defining a params dict for the parameters to be sent to the API
        PARAMS = {'Name':"Niraj lal rahi"}

        URL = API_ENDPOINT+'list'
        # sending get request and saving the response as response object
        request_data = requests.get(url = URL, params = PARAMS)

        response = request_data.json()

        if(response['status']) :
            for record in response['data'] :
                args = record['id']

                #define variable from api
                site_url = record['url']
                court_type = record['court_type']
                court_complex = record['court_complex']
                from_date = record['from_date']
                to_date = record['to_date']

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
                driver = webdriver.Chrome(options=options)
                driver.implicitly_wait(30)
                driver.maximize_window()
                print('Lets start')

                driver.get(site_url)
                WebDriverWait(driver, 10).until(lambda d: d.execute_script('return document.readyState') == 'complete')


                # choose radio button for the court type
                if court_type == '1':
                    driver.find_element_by_id('radCourtComplex').click()
                    courtComplex = Select(driver.find_element_by_id("court_complex_code")).select_by_value(court_complex)
                else :
                    driver.find_element_by_id('radCourtEst').click()
                    courtComplex = Select(driver.find_element_by_id("court_code")).select_by_value(court_complex)



                # calendar values
                fromDate = driver.find_element_by_id('from_date').send_keys(from_date)
                toDate = driver.find_element_by_id('to_date').send_keys(to_date)
                driver.find_element_by_id('to_date').send_keys(Keys.RETURN)

                previous = ''

                #loop to attempt captcha entry max 20
                while i<20:

                    time.sleep(10)
                    captcha_text = get_captcha_image(driver)
                    captcha = driver.find_element_by_id('captcha')
                    captcha.clear()
                    captcha.send_keys(captcha_text) #enter captcha text
                    print('submitting captcha')
                    driver.execute_script("validate()") #submit

                    try:
                        print('reached here:try part')
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
                        print('exception')

                    soup = bs4.BeautifulSoup(driver.page_source,'html.parser')
                    elems  = soup.select('a[id="orderid"]')
                    links =[]
                    for elem in elems:
                        link = 'https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/' + elem['href']
                        links.append(link)
                    if links != []:
                        print(links)
                        print('Total Docs:'+str(len(links)))



                    output = driver.find_element_by_id('showList3')
                    source_code = output.get_attribute("outerHTML")


                    data = {
                        'id':args,
                        'data':source_code

                    }
                    UPDATE_URL = API_ENDPOINT+"update-data"
                    # sending post request and saving response as response object
                    post_data = requests.post(url = UPDATE_URL, data = data)

                    res = post_data.json()

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
                            driver.quit()
                            sys.exit()
        driver.quit()

    except Exception as err:
        print('ERROR: %sn' % str(err))
        driver.quit()


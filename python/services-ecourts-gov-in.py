from selenium.webdriver.firefox.options import Options as FirefoxOptions
from selenium.webdriver.support.ui import Select
from selenium import webdriver
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.common.exceptions import TimeoutException
from PIL import Image
from pytesseract import image_to_string
import time
from selenium.webdriver.firefox.options import Options as FirefoxOptions
import mysql.connector
import argparse

def get_captcha_text(location, size):
    # pytesseract.pytesseract.tesseract_cmd = 'path/to/pytesseract'
    im = Image.open('screenshot.png')
    left = location['x']
    top = location['y']
    right = location['x'] + size['width']
    bottom = location['y'] + size['height']
    im = im.crop((left, top, right, bottom)) # defines crop points
    im.save('screenshot.png')
    # response = requests.get("http://main.sci.gov.in/php/captcha.php")
    captcha_text = image_to_string(Image.open('screenshot.png'))
    return captcha_text


def get_captcha_image(driver):
    element = driver.find_element_by_id('captcha_image')
    location = element.location

    size = element.size
    driver.save_screenshot('screenshot.png')

    return get_captcha_text(location,size)

# main function
if __name__ =="__main__":

    try :

        parser = argparse.ArgumentParser(description='Short sample app')
        parser.add_argument('-id','--id', required=True,  type=int)

        args = vars(parser.parse_args())
        # database connection

        config = {
            'user': 'root',
                'password': 'root',
                    'unix_socket': '/Applications/MAMP/tmp/mysql/mysql.sock',
                        'database': 'delhi_police',
                            'raise_on_warnings': True,
        }

        mydb = mysql.connector.connect(**config)

        mycursor = mydb.cursor()

        sqlSelect = "SELECT url, court_type, court_complex, from_date, to_date FROM court_orders WHERE id="+str(args['id'])
        mycursor.execute(sqlSelect)

        myresult = mycursor.fetchone()

        site_url = myresult[0]
        court_type = myresult[1]
        court_complex = myresult[2]
        from_date = myresult[3]
        to_date = myresult[4]

        # site_url = "https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/s_orderdate.php?state=D&state_cd=26&dist_cd=8"

        # options = FirefoxOptions()
        # options.add_argument("--headless")

        # driver = webdriver.Firefox(options=options)

        driver = webdriver.Firefox()
        driver.implicitly_wait(30)
        driver.maximize_window()

        driver.get(site_url)
        WebDriverWait(driver, 10).until(lambda d: d.execute_script('return document.readyState') == 'complete')

        # enter static value

        # choose radio button for the court type
        if court_type == '1':
            driver.find_element_by_id('radCourtComplex').click()
            courtComplex = Select(driver.find_element_by_id("court_complex_code")).select_by_value(court_complex)
        else :
            driver.find_element_by_id('radCourtEst').click()
            courtComplex = Select(driver.find_element_by_id("court_code")).select_by_value(court_complex)
        # drop down value


        # calendar values
        fromDate = driver.find_element_by_id('from_date').send_keys(from_date)
        toDate = driver.find_element_by_id('to_date').send_keys(to_date)

        i = 0
        k=0
        previous = ''
        while i<10:
            # print(i)

            captcha_text = get_captcha_image(driver)
            captcha = driver.find_element_by_id('captcha')
            captcha.clear()
            captcha.send_keys(captcha_text) #enter captcha text

            driver.execute_script("validate();") #submit

            try:
                WebDriverWait(driver, 3).until(EC.alert_is_present(),
                                                    'Timed out waiting for PA creation ' +
                                                    'confirmation popup to appear.')

                alert = driver.switch_to.alert
                alert_text = alert.text
                alert.accept()
                # driver.execute_script("clearCaptchaText();") #submit
                driver.find_element_by_xpath('//a[@title="Refresh Image"]').click()
                time.sleep(2)
                # print('alert - accept')
                # print(alert_text)
                i = i+1
            except TimeoutException:

                server_error_msg = driver.find_element_by_id('errSpan')
                if server_error_msg.is_displayed() :
                    if k == 0 :
                        driver.find_element_by_xpath('//a[@title="Refresh Image"]').click()
                        k = k+1
                        time.sleep(2)

                    i=i+1
                else :
                    break


            if previous == i :
                i=i+1
            else :
                previous = i




        if i < 10 :
            time.sleep(10)
            j=0
            while j <100000 :
                response_wait = driver.find_element_by_id('divWait')
                if response_wait.is_displayed() :
                    j=j+1
                else :
                    break

            output = driver.find_element_by_id('showList3')
            source_code = output.get_attribute("outerHTML")

            sql = "UPDATE court_orders SET data=%s WHERE id=%s"
            val = (source_code,str(args['id']))
            mycursor.execute(sql, val)
            mydb.commit()
            mydb.close()
            print(source_code)
            driver.quit()
        else :
            print('We miss data this time, will find in another shot and update you.')
            mydb.close()
            driver.quit()

    except Exception as err:
        print('ERROR: %sn' % str(err))
        mydb.close()
        driver.quit()

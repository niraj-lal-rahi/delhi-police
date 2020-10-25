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
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.action_chains import ActionChains
import pyautogui
from keyboard import press

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


        API_ENDPOINT = "http://127.0.0.1:8000/api/"

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
                args = vars(record['id'])

                #define variable from api
                site_url = record['url']
                court_type = record['court_type']
                court_complex = record['court_complex']
                from_date = record['from_date']
                to_date = record['to_date']

                # driver = webdriver.Firefox()
                driver.implicitly_wait(30)
                driver.maximize_window()

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

                        server_error_msg = driver.find_element_by_id('errSpan')
                        if server_error_msg.is_displayed() :
                            if k == 0 :
                                driver.find_element_by_xpath('//a[@title="Refresh Image"]').click()
                                k = k+1
                                time.sleep(5)

                            i=i+1
                        else :
                            break


                    if previous == i :
                        i=i+1
                    else :
                        previous = i

                if i < 20 :
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


                    data = {
                        'id':args,
                        'data':source_code

                    }
                    # sending post request and saving response as response object
                    post_data = requests.post(url = API_ENDPOINT, data = data)

                    res = r.json()

                    for link in output.find_elements_by_tag_name('a') :
                        link.click()

                        time.sleep(5)
                        driver.switch_to.window(driver.window_handles[1])
                        download_page_from_child_link()


                else :
                    print('We miss data this time, will find in another shot and update you.')


    except Exception as err:
        print('ERROR: %sn' % str(err))
        driver.quit()

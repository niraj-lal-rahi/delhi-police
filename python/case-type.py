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
import requests
# for ssh login dependency below
import subprocess
import os
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





        #define variable from api
        site_url = "https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/s_casetype.php?state=D&state_cd=26&dist_cd=8"
        court_type = '1'   #Court Complex(default) or Court Establishment
        court_complex = "1@1,2,3,4@N" # Tis hazari for now
        case_type = "81" #ARB. A. (COMM.) - COMMERCIAL ARBITRATION UNDER SECTION 37 (2)
        year = "2020"
        status = "1" # 1 for pending and 0 for disposed

        driver = webdriver.Firefox()
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



        #case type
        Select(driver.find_element_by_id("case_type")).select_by_value(case_type)

        #year
        driver.find_element_by_id('search_year').send_keys(year)

        if(status == '1') :
            driver.find_element_by_id('radP').click()
        else :
            driver.find_element_by_id('radD').click()



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

            output = driver.find_element_by_id('showList')
            source_code = output.get_attribute("outerHTML")


            for link in output.find_elements_by_tag_name('a') :
                # link.click()
                parent_attribute = link.get_attribute("onclick")

                print(parent_attribute)
                print("==========> parent attribute")

                if(parent_attribute) :
                    driver.execute_script(str(parent_attribute))

                    time.sleep(3)
                    driver.implicitly_wait(30)

                    second_output = driver.find_element_by_id('secondpage')
                    second_output_source_code = second_output.get_attribute("outerHTML")

                    print(second_output_source_code)
                    print("second page output +++++++++++")

                    for link in second_output.find_elements_by_tag_name('a') :

                        time.sleep(1)
                        attribute = link.get_attribute("onclick")

                        print(attribute)
                        print("==========> parent attribute")

                        if(attribute) :
                            driver.execute_script(str(attribute))
                            time.sleep(3)
                            third_output = driver.find_element_by_id('thirdpage')
                            print(third_output)
                            print('--------> third page output')
                            driver.execute_script("funBackBusiness()")



                    time.sleep(2)
                    driver.execute_script("funBack()") #back to the previous page





        else :
            print('We miss data this time, will find in another shot and update you.')

        driver.quit()

    except Exception as err:
        print('ERROR: %sn' % str(err))
        driver.quit()


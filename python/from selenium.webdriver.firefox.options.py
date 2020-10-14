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
from bs4 import BeautifulSoup
import requests
from selenium.webdriver.common.keys import Keys


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

def download_page_from_child_link():
    webobj = driver.find_element_by_id("download")
    webobj.click()
    #Click the OK button and close

    time.sleep(2)
    # webobj.send_keys(Keys.RETURN)

    time.sleep(10)
    driver.close()

    #Restore the handle back to parent handle
    driver.switch_to.window(driver.window_handles[0])

# main function
if __name__ =="__main__":

    try :


        #Setting the profile
        fp = webdriver.FirefoxProfile()
        fp.set_preference("browser.download.folderList", 2)
        fp.set_preference("browser.download.manager.showWhenStarting", False)
        fp.set_preference("browser.helperApps.neverAsk.openFile","application/pdf,application/x-pdf,application/download, application/octet-stream")
        fp.set_preference("browser.download.dir", "/Users/niraj/Downloads/")
        fp.set_preference("browser.helperApps.neverAsk.saveToDisk", "application/pdf,application/x-pdf")
        fp.set_preference("pdfjs.disabled", "true")
        # fp.set_preference("plugin.disable_full_page_plugin_for_types", "application/pdf,application/vnd.adobe.xfdf,application/vnd.fdf,application/vnd.adobe.xdp+xml")

        # fp.set_preference("browser.helperApps.alwaysAsk.force", False)
        # fp.set_preference("browser.download.manager.useWindow", False)

        # fp.set_preference("browser.download.manager.alertOnEXEOpen", False)
        # fp.set_preference("browser.download.manager.closeWhenDone", False)
        # fp.set_preference("browser.download.manager.showAlertOnComplete", False)
        # fp.set_preference("browser.download.manager.focusWhenStarting", False)

        driver = webdriver.Firefox(firefox_profile = fp)

        # driver = webdriver.Firefox()
        driver.implicitly_wait(30)
        driver.maximize_window()

        driver.get("https://www.citysdk.eu/wp-content/uploads/2013/09/DELIVERABLE_WP4_TA_SRS_0.21.pdf")
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

            driver.execute_script("validate()") #submit

            try:
                WebDriverWait(driver, 3).until(EC.alert_is_present(),
                                                    'Timed out waiting for PA creation ' +
                                                    'confirmation popup to appear.')

                alert = driver.switch_to.alert
                alert_text = alert.text
                alert.accept()
                # driver.execute_script("clearCaptchaText()") #submit
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
            # print(source_code)
            # links = [i.get_attribute('href') for i in output.find_elements_by_tag_name('a')]

            # if len(links) > 0 :
            #     for link in links:
            #         r = requests.get(link)
            #         content_type = r.headers.get('content-type')
            #         print(content_type)

            for link in output.find_elements_by_tag_name('a') :
                link.click()
                time.sleep(5)

                driver.switch_to.window(driver.window_handles[1])
                download_page_from_child_link()
                time.sleep(5)
                # main_window = driver.current_window_handle


                # driver.switch_to.window(main_window)

                # link.send_keys(Keys.CONTROL + Keys.RETURN)
                # driver.find_element_by_tag_name('body').send_keys(Keys.CONTROL + Keys.TAB)

                # time.sleep(2)
                # print(driver.current_url)
                # driver.find_element_by_id('download').click()

                # driver.find_element_by_tag_name('body').send_keys(Keys.CONTROL + 'w')
                # driver.switch_to.window(main_window)
                break


            # print(links)
            # driver.quit()

        else :
            print('We miss data this time, will find in another shot and update you.')
            mydb.close()
            driver.quit()

    except Exception as err:
        print('ERROR: %sn' % str(err))
        mydb.close()
        driver.quit()

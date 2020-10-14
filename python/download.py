from selenium import webdriver
from selenium.webdriver.support.ui import WebDriverWait
import time
import pyautogui

try :



    driver = webdriver.Firefox()

    driver.implicitly_wait(30)
    driver.maximize_window()

    driver.get("https://www.citysdk.eu/wp-content/uploads/2013/09/DELIVERABLE_WP4_TA_SRS_0.21.pdf")
    WebDriverWait(driver, 10).until(lambda d: d.execute_script('return document.readyState') == 'complete')
    # Click the OK button and close

    time.sleep(5)
    webelem = driver.find_element_by_id('download')
    webelem.click()

    time.sleep(5)
    print('press enter')
    pyautogui.press('enter')


except Exception as err:
    print('ERROR: %sn' % str(err))

    driver.quit()

from selenium.webdriver.firefox.options import Options as FirefoxOptions
from selenium import webdriver
from selenium.webdriver.support.ui import WebDriverWait
import time
from selenium.webdriver.firefox.options import Options as FirefoxOptions
import os
from selenium.webdriver.common.keys import Keys

try :


    #Setting the profile
    mime_types = "application/pdf,application/vnd.adobe.xfdf,application/vnd.fdf,application/vnd.adobe.xdp+xml"

    fp = webdriver.FirefoxProfile()
    # fp.set_preference("browser.download.folderList", 2) #for custom path keep it commented for default path
    fp.set_preference("browser.download.manager.showWhenStarting", False)
    # fp.set_preference("browser.download.dir", "/home") #custom path define
    fp.set_preference("browser.helperApps.neverAsk.saveToDisk", mime_types)
    fp.set_preference("plugin.disable_full_page_plugin_for_types", mime_types)
    fp.set_preference("pdfjs.disabled", True)

    driver = webdriver.Firefox(firefox_profile=fp)


    driver = webdriver.Firefox(firefox_profile = fp)


    driver.implicitly_wait(30)
    driver.maximize_window()

    driver.get("https://www.citysdk.eu/wp-content/uploads/2013/09/DELIVERABLE_WP4_TA_SRS_0.21.pdf")
    WebDriverWait(driver, 10).until(lambda d: d.execute_script('return document.readyState') == 'complete')

    # webobj = driver.find_element_by_id("download")
    # webobj.click()
    # #Click the OK button and close
    # alert = driver.switch_to.alert()
    # # alert.send_keys(Keys.RETURN)
    # alert_text = alert.text
    # print(alert_text)
    time.sleep(5)


except Exception as err:
    print('ERROR: %s' % str(err))

    driver.quit()

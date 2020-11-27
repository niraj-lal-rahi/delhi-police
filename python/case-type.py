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
from mysql.connector import Error

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

        mycursor = mydb.cursor(buffered=True)

        sqlSelect = "SELECT * FROM case_types WHERE scrap_status='0'"
        mycursor.execute(sqlSelect)

        myresult = mycursor.fetchone()
        
        print(myresult)
        print("Begin")
        
        #define variable from api
        data_id = str(myresult[0])
        site_url = myresult[1]
        court_type = myresult[2]   #Court Complex(default) or Court Establishment
        court_complex = myresult[3] # Tis hazari for now
        case_type = myresult[4] #ARB. A. (COMM.) - COMMERCIAL ARBITRATION UNDER SECTION 37 (2)
        year = myresult[5]
        status = myresult[6] # 0 for pending and 1 for disposed
        

        district_code = site_url[-1]

        print("district_code "+str(district_code))
        
        
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
        # driver = webdriver.Chrome('/home/ubuntu/chromedriver',options=options)
        driver = webdriver.Chrome(options=options)
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

            print("form submit "+ str(i))

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
                server_error_msg = driver.find_element_by_id('errSpan')
                if server_error_msg.is_displayed() :
                    i=i+1
                else :
                    break


        parent_id = level = str(0)        
        output = driver.find_element_by_id('showList')
        parent_source_code = output.get_attribute("outerHTML")

       
        
        # print("response")
        # print(parent_source_code)

        parent_insert_counter = 1
        
        links = []

        first_page_table =  output.find_element_by_id('showList1')
        
        parent_loop = 0
        for parent_row in first_page_table.find_elements_by_tag_name('tr') :
            
            
            if parent_loop > 0 :
                
                sr_no = parent_row.find_elements_by_tag_name("td")[0].text
                case = parent_row.find_elements_by_tag_name("td")[1].text
                petitioner = parent_row.find_elements_by_tag_name("td")[2].text
                
                print(str(data_id) + "=> "+str(sr_no) + "=> "+str(case) + "=> "+str(petitioner))
                # mydb.close()
                # driver.quit
                # sys.exit()   
                mycursor = mydb.cursor()
                SQL = "INSERT INTO case_type_parents( case_types_id, s_no, case_type, petitioner_name) VALUES('"+str(data_id) + "','"+str(sr_no) + "','"+str(case) + "','"+str(petitioner)+"')"

                print(SQL)
                # sql = "INSERT INTO case_type_parents( case_types_id, s_no, case_type, petitioner_name) VALUES (%s,%s,%s,%s)"
                # val = (str(data_id),str(sr_no),str(case),str(petitioner))
                # print(val)
                # print("cursor ==========    : ", mycursor)
                # mycursor.execute(sql , val)
                mycursor.execute(SQL)
                mydb.commit()

                parent_id = mycursor.lastrowid
                print("parent_insert => id => "+str(parent_id))
               
            
                parent_html = parent_row.get_attribute("outerHTML")

                # print(parent_html)
                # parent_row.find_elements_by_tag_name("td")[0]
                
                parent_link = parent_row.find_elements_by_tag_name('a')[0]

                parent_attribute = parent_link.get_attribute("onclick")
                
                if(parent_attribute) :

                    print("insert parent")
                    
                    
                    print("data_id "+data_id)
                    # sql = '''INSERT INTO case_type_data( case_types_id, parent_id, level, data) string.replace(old, new, count)
                    #         VALUES (data_id,parent_id,level,parent_html)'''
                    
                    
                    driver.execute_script(str(parent_attribute))
                    print("first row click")
                    time.sleep(5)

                    level = str(1)

                    second_output = driver.find_element_by_id('secondpage')
                    second_output_source_code = second_output.get_attribute("outerHTML")

                    mycursor = mydb.cursor()
                    sql = "INSERT INTO case_type_data( case_types_id, parent_id, level, data) VALUES (%s,%s,%s,%s)"
                    val = (data_id,parent_id,level,second_output_source_code)
                    mycursor.execute(sql, val)
                    mydb.commit()
                    second_parent_id = mycursor.lastrowid

                    print("second insertion id "+ str(second_parent_id))
                    # print("second table ")
                    # print(second_output_source_code)

                    case_status = second_output.find_element_by_xpath("//h2[text() = 'Case Status']/following-sibling::div")
                    
                    label_count = len(case_status.find_elements_by_tag_name("label"))
                    first_label = case_status.find_elements_by_tag_name("label")[0]
                    second_label = case_status.find_elements_by_tag_name("label")[1]
                    third_label = case_status.find_elements_by_tag_name("label")[2]
                    fourth_label = case_status.find_elements_by_tag_name("label")[label_count-1]

                    hearing_date = first_label.find_elements_by_tag_name("strong")[1].text
                    next_hearing = second_label.find_elements_by_tag_name("strong")[1].text
                    # stage_case = third_label.find_elements_by_tag_name("strong")[1].text 
                    court_judge = fourth_label.find_elements_by_tag_name("strong")[1].text
                    
                    print(str(hearing_date) +" hearing =="+ str(next_hearing) + " next hearing == "  +str(court_judge) + "count  == "+str(label_count))
                    

                    # insert grid filter data
                    mycursor = mydb.cursor()
                    grid_insert_query = "INSERT INTO case_type_data_grids( case_types_id, case_type_parents, case_number, party_name, last_hearing_date, nxt_hearing_date, judge, court_district) VALUES (%s,%s,%s,%s,%s,%s,%s,%s)" 
                    
                    print("grid insert query pass")
                    
                    grid_val = (str(data_id),str(parent_id),str(case),str(petitioner),str(hearing_date),str(next_hearing),str(court_judge),str(district_code))
                    
                    print("grid insert val pass")
                    
                    mycursor.execute(grid_insert_query, grid_val)
                    
                    print("grid db insertion pass")
                    
                    mydb.commit()

                    grid_id = mycursor.lastrowid

                    print("grid db insertion pass last id "+str(grid_id))
                    # Act data 
                    try: 
                        act_table = second_output.find_elements_by_class_name("Acts_table")

                        if len(act_table) > 0 : 

                            print("enter into act table")
                            act_iteration = 0
                            for act_table_row in act_table[0].find_elements_by_tag_name('tr') : 
                                
                                if act_iteration > 0 :
                                    get_column = act_table_row.find_elements_by_tag_name('td')
                                    print("act find td successfull")
                                    act_value = get_column[0].text
                                    section_value = get_column[1].text
                                    
                                    # insert act and section
                                    mycursor = mydb.cursor()
                                    insert_act = "INSERT INTO case_type_act_sections(case_type_data_grids_id, act, sections) VALUES (%s,%s,%s)"
                                    print("act insert query pass")
                                    insert_act_val = (grid_id,act_value,section_value)
                                    mycursor.execute(insert_act, insert_act_val)
                                    print("act insertion pass")
                                    mydb.commit()
                                act_iteration = act_iteration+1
                    except AttributeError as attrErr: 
                        print("There is no such attribute Exception") 
                    # act table end here

                    print(case_status.get_attribute("outerHTML"))

                    # print(second_table.get_attribute("outerHTML"))
                    print("second table ")
                    second_table_loop = 0
                    
                    second_table = second_output.find_element_by_xpath(("//table[@class='history_table']"))
                    
                    soup = bs4.BeautifulSoup(driver.page_source,'html.parser')
                    elems  = soup.select('a[target="_blank"]')
                    
                    for elem in elems:
                        link = 'https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/' + elem['href']
                        links.append(link)

                    for second_parent_row in second_table.find_elements_by_tag_name('tr') :
                        
                        if second_table_loop > 0 :
                            
                            print("second table tr loop")
                            
                            level = str(1)
                            second_parent_row_html = second_parent_row.get_attribute("outerHTML")

                            print(second_parent_row_html)

                            second_parent_link = second_parent_row.find_elements_by_tag_name('a')[0]

                            second_parent_attribute = second_parent_link.get_attribute("onclick")
                            
                            if(second_parent_attribute) :

                                time.sleep(2)
                                print("second row click")

                                
                                # parent_insert_counter = parent_insert_counter+1
                                print("parent_insert => id => "+str(parent_id)+ " child => "+str(second_parent_id))

                                driver.execute_script(str(second_parent_attribute))
                                
                                time.sleep(3)
                                
                                third_output = driver.find_element_by_id('thirdpage')
                                third_output_source_code = third_output.get_attribute("outerHTML")
                                print(third_output_source_code)

                                level = str(2)
                                mycursor = mydb.cursor()
                                sql = "INSERT INTO case_type_data( case_types_id, parent_id, level, data) VALUES (%s,%s,%s,%s)"
                                val = (data_id,second_parent_id,level,third_output_source_code)
                                mycursor.execute(sql, val)
                                mydb.commit()
                                third_parent_id = mycursor.lastrowid
                                
                                # parent_insert_counter = parent_insert_counter+1
                                print("parent_insert => id => "+str(parent_id)+ " second child => "+str(second_parent_id) +"third child => "+str(third_parent_id))
                                print('--------> third page output')
                                
                                driver.execute_script("funBackBusiness()")


                            driver.execute_script("funBackBusiness()") 
                        second_table_loop = second_table_loop+1  

                driver.execute_script("funBack()")

            parent_loop =  parent_loop+1

            
        mydb.close()
        driver.quit
        sys.exit()        

    except Exception as err:
        print('ERROR: %sn' % str(err))
        # print(insertCursor._last_executed)
        driver.quit()
        mydb.close()
    except mysql.connector.Error as error:
        print("Failed to insert into MySQL table {}".format(error))
        # print(insertCursor._last_executed)
        mydb.close()

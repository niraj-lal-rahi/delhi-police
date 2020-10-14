from bs4 import BeautifulSoup
import mysql.connector
import requests


try :
    config = {
        'user': 'root',
            'password': 'root',
                'unix_socket': '/Applications/MAMP/tmp/mysql/mysql.sock',
                    'database': 'delhi_police',
                        'raise_on_warnings': True,
    }

    mydb = mysql.connector.connect(**config)

    mycursor = mydb.cursor()

    sqlSelect = "SELECT data FROM court_orders WHERE id=3"
    mycursor.execute(sqlSelect)

    myresult = mycursor.fetchone()

    data = myresult[0]
    mydb.close()

    base_url = "https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/"

    soup = BeautifulSoup(data, 'html.parser')



    for link in soup.find_all('a'):
        r = requests.get(base_url+link.get('href'))
        content_type = r.headers.get('content-type')
        if 'application/pdf' in content_type:
            ext = '.pdf'
            print(ext)
        elif 'text/html' in content_type:
            ext = '.html'
        else:
            ext = ''
            print('Unknown type: {}'.format(content_type))

        # print(content_type)




except Exception as err:
    print('ERROR: %sn' % str(err))
    mydb.close()



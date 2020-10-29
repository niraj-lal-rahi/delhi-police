
import glob
from tika import parser
import os
import requests
import time


API_ENDPOINT = "http://127.0.0.1:8000/api/"
# os.listdir('/var/www/html/delhi-police/storage/app/public')
x = glob.glob("/var/www/html/delhi-police/storage/app/public/*pdf")

STORE_URL = API_ENDPOINT+"store/pdf-text"

PARAMS = {'Name':"Niraj lal rahi"}

URL = API_ENDPOINT+'pdf-text'
# sending get request and saving the response as response object
request_data = requests.get(url = URL, params = PARAMS)

response =  request_data.json()



for y in x:


    if str(y) not in response['list']:
        print(str(y))
        raw = parser.from_file(str(y))
        # print(raw['content'])
        data = {
            'filename':str(y),
            'content':raw['content']

        }

        time.sleep(2)
        # sending post request and saving response as response object
        post_data = requests.post(url = STORE_URL, data = data)
        print(post_data)


# raw = parser.from_file('201200009602018_4.pdf')
# print(raw['content'])

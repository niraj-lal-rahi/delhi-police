import subprocess
import os
import glob
from zipfile import ZipFile
import time
import platform
from pathlib import Path


# OS_NAME = platform.system()
downloads_path = str(Path.home() / "Downloads/")

x = glob.glob(downloads_path+"/*[0-9].pdf")

if bool(x) :

    zipName = downloads_path+"/upload.zip"

    with ZipFile(zipName, 'w') as zipObj2:
        for y in x:
            zipObj2.write(str(y))


    time.sleep(4)

    pemFile = downloads_path+"/Production.pem"
    ssh = subprocess.Popen(["scp","-r", "-i",pemFile,zipName,"ec2-user@18.188.142.12:/var/www/html/delhi-police/storage/app/public/"])

    sts = os.waitpid(ssh.pid, 0)

    os.remove(zipName)
    for y in x:
        os.remove(y)

else :
    print("no pdf found")




from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.chrome.options import Options
from BrowsFiles import browse_file

def Get_Driver ():

    options = Options()
    options.add_argument('--headless')
    options.add_argument('--disable-gpu')

    try:
        CHROMEDRIVER_PATH = r"D:\xamp\htdocs\eghtesad24\New folder\chromedriver.exe"
        service = Service(CHROMEDRIVER_PATH)
        driver = webdriver.Chrome(service=service, options=options)

    except:
        CHROMEDRIVER_PATH = browse_file()
        service = Service(CHROMEDRIVER_PATH)
        driver = webdriver.Chrome(service=service, options=options)

    return driver

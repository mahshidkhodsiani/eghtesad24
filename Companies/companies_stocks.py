from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import json
import time

url = 'https://www.tradingview.com/markets/stocks-usa/market-movers-large-cap/'

CHROMEDRIVER_PATH = r"D:\xampp\htdocs\eghtesad24\Companies\chromedriver.exe"

options = Options()
options.add_argument('--headless')
options.add_argument('--disable-gpu')

service = Service(CHROMEDRIVER_PATH)
driver = webdriver.Chrome(service=service, options=options)

while True:

    driver.get(url)

    # Wait for the table to be visible
    wait = WebDriverWait(driver, 10)
    table = wait.until(EC.presence_of_element_located((By.CLASS_NAME, 'root-cFX_j1gd')))

    # Get all rows in the table body
    rows = table.find_elements(By.TAG_NAME, 'tr')

    # List to hold the table data
    table_data = []

    # Extract data from each row and column
    counter = 0
    for row in rows:
        if counter == 10:
            break
        cells = row.find_elements(By.TAG_NAME, 'td')
        row_data = [cell.text for cell in cells]
        table_data.append(row_data)
        counter+=1
            

    # Save table data to a JSON file
    with open('D:\\xampp\\htdocs\\eghtesad24\\Companies\\table_data.json', 'w') as file:
        json.dump(table_data[2:], file)

    break
    
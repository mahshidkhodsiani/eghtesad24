from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import json
from GetChromeDriver import Get_Driver

count = 0

while True:

    driver = Get_Driver()

    if count == 0:
        url = 'https://www.tradingview.com/markets/stocks-usa/market-movers-large-cap/'
        table_name = 'stocks_table.json'
    elif count == 1:
        url = 'https://www.tradingview.com/markets/currencies/rates-major/'
        table_name = 'currencies_table.json'
    elif count == 2:
        url = 'https://www.tradingview.com/markets/cryptocurrencies/prices-all/'
        table_name = 'cryptocurrencies_table.json'
    elif count == 3:
        url = 'https://www.tradingview.com/markets/futures/quotes-metals/'
        table_name = 'metals_table.json'
    

    table_name = f'D:\\xamp\\htdocs\\eghtesad24\\python-scripts\\{table_name}'

    try :
        driver.get(url)
    except:
        driver.get(url)

    # Wait for the table to be visible
    wait = WebDriverWait(driver, 10)
    table = wait.until(EC.presence_of_element_located((By.CLASS_NAME, 'root-cFX_j1gd')))                 

    # Get all rows in the table body
    rows = table.find_elements(By.TAG_NAME, 'tr')

    # List to hold the table data
    table_data = []

    # Extract data from each row and column
    for row in rows:
        cells = row.find_elements(By.TAG_NAME, 'td')
        row_data = [cell.text for cell in cells]
        table_data.append(row_data)

    # Save table data to a JSON file
    with open(table_name, 'w') as file:
        json.dump(table_data[2:], file)
    

    if count == 3:
        count = 0
    else:
        count += 1
    
    driver.quit()
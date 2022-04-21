# thư viện requests đọc dữ liệu khi crawl về
import requests
# jsson chuyển file lấy từ web về đọc dữ liệu
import json
#lưu vào csv truyền vào database
import csv
import numpy as np
#pandas đọc ghi file nhanh
import pandas as pd
import pymysql
from bs4 import BeautifulSoup


url = 'https://shopee.vn/api/v4/search/search_items?by=relevancy&keyword=iphone&limit=50'

headers = {
    'User-Agent': 'Mozilla/5.0 (X11; Linux x86_64; rv:73.0) Gecko/20100101 Firefox/73.0',
    'X-Requested-With': 'XMLHttpRequest',
    'Referer': '',
}    

r = requests.get(url, headers=headers)
discount = "1"
data = r.json()
brand = -1
#print(data['items'][0].keys())
brand = ""     
for item in data['items']:
    id = item['item_basic']['itemid']
    print('itemid:', item['item_basic']['itemid'])


    ten =item['item_basic']['name']
    #print('name:', item['item_basic']['name'])


    idshop =item['item_basic']['shopid']
    print('idshop',item['item_basic']['shopid'])

    itemid = item['item_basic']['itemid']
    print('itemid',item['item_basic']['itemid'])

    stock =  item['item_basic']['stock']
    print('stock:', item['item_basic']['stock'])

    historical_sold =  item['item_basic']['historical_sold']
    print('historical_sold:', item['item_basic']['historical_sold'])


    sold = item['item_basic']['sold']
    print('sold:', item['item_basic']['sold'])
    brand =item['item_basic']['brand']
    print('brand:', brand)
    view_count = item['item_basic']['view_count']
    print('view_count:', item['item_basic']['view_count'])

    price = item['item_basic']['price']
    print('price:', item['item_basic']['price'])
    price_min =item['item_basic']['price_min']
    print('price_min:', item['item_basic']['price_min'])
 
    price_min_before_discount =item['item_basic']['price_min_before_discount']
    print('price_min_before_discount:', item['item_basic']['price_min_before_discount'])
    price_max_before_discount = item['item_basic']['price_max_before_discount']
    print('price_max_before_discount:', item['item_basic']['price_max_before_discount'])
    discount = item['item_basic']['discount']
    print('discount:', item['item_basic']['discount'])

    transparent_background_image = item['item_basic']['transparent_background_image']
    print('transparent_background_image:', item['item_basic']['transparent_background_image'])
    image =  item['item_basic']['image']
    print('image:', item['item_basic']['image'])
    point = item['item_basic']['item_rating']['rating_star']


    url1 = 'https://shopee.vn/api/v2/item/get?itemid=' + str(itemid) + '&shopid=' + str(idshop)
    r = requests.get(url1, headers=headers)
    data1 = r.json()
    mota = data1['item']['description']

    print('---')

    conn= pymysql.connect(host="localhost", user="root", passwd="", db="tiki3")                          
    myCur = conn.cursor()
    sql= "INSERT INTO shoppe(id,ten,idshop,itemid, stock,  historical_sold, sold,brand,view_count,price,price_min,  price_min_before_discount, price_max_before_discount,point,image,discount,mota) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
    val= (id,ten,idshop,itemid, stock,  historical_sold, sold,brand,view_count,price,price_min,  price_min_before_discount, price_max_before_discount,point,image,discount,mota)

    myCur.execute(sql, val)
    conn.commit()
    conn.close()


#print(data['items'][0]) # for test only
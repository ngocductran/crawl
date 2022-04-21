import requests
import pymysql

url = 'https://mapi.sendo.vn/mob/product/search?p=1&q=iphone'
id = -1
headers = {
    'User-Agent': 'Mozilla/5.0 (X11; Linux x86_64; rv:73.0) Gecko/20100101 Firefox/73.0',
    'X-Requested-With': 'XMLHttpRequest',
    'Referer': '',
}    

r = requests.get(url, headers=headers)

data = r.json()

for item in data['data']:
    id = item['product_id']
    ten = item['name']
    product_url = item['cat_path']
    view_count = item['order_count_dd_1000_cod']
    cat_path = item['deep_link']
    shop_name = item['shop_name']
    price = item['price']
    url_image = item['img_url_mob']
    point = item['percent_star']
    promotion_percent = item['promotion_percent'] #% khuyến mãi
    price_max = item['final_price_max']

    print('product_id:', item['product_id'])
    #print('name:', item['name'])
    print('cat_path:', item['cat_path'])
    print('order_count:', item['order_count_dd_1000_cod'])
    #print('shop_name:', item['shop_name'])
    print('price:', item['price'])
    print('img_url_mob:', item['img_url_mob'])
    
    s1=item['cat_path'].replace(".html","")
    #print (s1) #cắt đuôi html
    URL ='https://mapi.sendo.vn/wap_v2/full/san-pham/' + s1 #nối chuỗi 

    r1 = requests.get(URL, headers=headers)

    data1 = r1.json()
    mota = data1['result']['data']['description']
    #print('description:', data1['result']['data']['description'])
    print('---')
    conn= pymysql.connect(host="localhost", user="root", passwd="", db="tiki3")                          
    myCur = conn.cursor()
    sql= "INSERT INTO sendo(id, ten, product_url, view_count, price, price_max, point, url_image, mota, promotion_percent, cat_path) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
    val= (id, ten, product_url, view_count, price, price_max, point, url_image, mota, promotion_percent, cat_path)

    myCur.execute(sql, val)
    conn.commit()
    conn.close()
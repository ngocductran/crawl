# This files contains your custom actions which can be used to run
# custom Python code.
#
# See this guide on how to implement these action:
# https://rasa.com/docs/rasa/core/actions/#custom-actions/


# This is a simple example for a custom action which utters "Hello World!"
from bs4 import BeautifulSoup
import csv
import urllib.request
import ssl
import json
import requests
import os
import html
import random
import pathlib
from typing import Any, Text, Dict, List
#
from rasa_sdk.events import SlotSet
from rasa_sdk.events import FollowupAction
from rasa_sdk import Action, Tracker
from rasa_sdk.executor import CollectingDispatcher
#
#
import mysql.connector
from mysql.connector import Error, errorcode
import gc
import pymysql
import requests
import MySQLdb
conn= pymysql.connect(host="localhost", user="root", passwd="", db="tiki3")      

more_text = "Chao"

class ActionsaveBrand(Action):
    def name(self) -> Text:
        return "action_save_brand"
    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
    	brand=""
    	brand = tracker.latest_message['text']
    	dispatcher.utter_message(text=f"Bạn chọn:{brand}!")
    	return [SlotSet("brand",brand)]

class ActionLaptop(Action):
    def name(self) -> Text:
        return "action_goiy"
    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        # Open a file: file
        print('[%s] <- %s' % (self.name(), tracker.latest_message['text']))

        button = {
            "type": "postback",
            "title": "🔔Trên 5 triệu",
            "payload": "Trên 5 triệu"
        }
        button1 = {
            "type": "postback",
            "title": "🔔Trên 10 triệu",
            "payload": "Trên 10 triệu"
        }
        button2 = {
            "type": "postback",
            "title": "🔔Trên 20 triệu",
            "payload": "Trên 20 triệu"
        }
        button3 = {
            "type": "postback",
            "title": "🔔Trên 30 triệu",
            "payload": "Trên 30 triệu"
        }
        ret_text = "Tôi là trợ lý ảo."
        dispatcher.utter_message(text=ret_text, buttons=[button, button1, button2])
        print('[%s] -> %s' % (self.name(), ret_text))

        del ret_text, button, button1, button2, button3
        gc.collect()
        return []

class ActionLaptop(Action):
    def name(self) -> Text:
        return "action_kq"
    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:     
    	brand = tracker.get_slot("brand") # lấy thương hiệu sản phẩm dell ,macbook,,,auss
    	print(brand)
    	text = tracker.latest_message['text'] # lấy giá thành người dùng chọn
    	dispatcher.utter_message("Đây là kết quả mà bot tìm kiếm được :\n")
    	print(text);


    	if(text == 'Trên 30 triệu'):
    		#Tiki
    		
    		cursor = conn.cursor()
    		sql= "select * from product where gia >=30000000 and  ten like '%{}%'  limit 2 ".format(brand)
    		try:
    			dispatcher.utter_message("Sản phẩm đến từ TIKI :\n")
    			cursor.execute(sql)
    			rows = cursor.fetchall()
    			for row in rows:
    				dispatcher.utter_message(text = f" Tên: {row[1]},\nGiá: {row[2]},  \nDiscount: {row[9]}%, \nLink:http://tiki.vn/{row[12]}")	
    				print(row[11])
    				print(row[12])
    				dispatcher.utter_message(image = f"{row[11]}")
    				dispatcher.utter_message(text = f"<=====>")
    		except:
    			print(" ko co data")

    		#Sendo
    		sql2 ="select * from sendo where price >=30000000 and  ten like '%{}%'  limit 2 ".format(brand)
    		try:	
    			dispatcher.utter_message("Sản phẩm đến từ SENDO :\n")
    			cursor.execute(sql2)
    			rows = cursor.fetchall()
    			for row in rows:
    				dispatcher.utter_message(text = f" Tên: {row[1]},\nGiá: {row[4]},  \nDiscount: {row[8]} %, \nLink:https://www.sendo.vn/{row[2]}")	
    				dispatcher.utter_message(image = f"{row[6]}")
    				dispatcher.utter_message(text = f"<=====>")
    		except:

    			dispatcher.utter_message(text = f"Bot không tìm thấy dữ liệu")	
    			dispatcher.utter_message(image = f"https://i.pinimg.com/originals/4f/c0/8a/4fc08a3d40586c71749c9ddd4746b65f.gif")

    		
	    	
    	
    	if(text == 'Trên 20 triệu'):
    		#Tiki
    		dispatcher.utter_message("Sản phẩm đến từ TIKI :\n")
    		cursor = conn.cursor()
    		sql= "select * from product where gia >=20000000 and  ten like '%{}%'  limit 2 ".format(brand)
    		try:
    			cursor.execute(sql)
    			rows = cursor.fetchall()
    			for row in rows:
    				dispatcher.utter_message(text = f" Tên: {row[1]},\nGiá: {row[2]},  \nDiscount: {row[9]}%, \nLink:http://tiki.vn/{row[12]}")	
    				print(row[11])
    				print(row[12])
    				dispatcher.utter_message(image = f"{row[11]}")
    				dispatcher.utter_message(text = f"<=====>")
    		except:
    			print(" ko co data")

    		dispatcher.utter_message("Sản phẩm đến từ SENDO :\n")
    		#Sendo
    		sql2 ="select * from sendo where price >=20000000 and  ten like '%{}%'  limit 2 ".format(brand)
    		try:
    			cursor.execute(sql2)
    			rows = cursor.fetchall()
    			for row in rows:
    				dispatcher.utter_message(text = f" Tên: {row[1]},\nGiá: {row[4]},  \nDiscount: {row[8]} %, \nLink:https://www.sendo.vn/{row[2]}")	
    				dispatcher.utter_message(image = f"{row[6]}")
    				dispatcher.utter_message(text = f"<=====>")
    		except:
    			dispatcher.utter_message(text = f"Bot không tìm thấy dữ liệu")	
    			dispatcher.utter_message(image = f"https://i.pinimg.com/originals/4f/c0/8a/4fc08a3d40586c71749c9ddd4746b65f.gif")

    		
	    	

    	if(text == 'Trên 10 triệu'):
    		cursor = conn.cursor()
    		sql= "select * from product where gia >=10000000 and  ten like '%{}%'  limit 2 ".format(brand)
    		try:
    			cursor.execute(sql)
    			rows = cursor.fetchall()
    			for row in rows:
    				dispatcher.utter_message(text = f" Tên: {row[1]},\nGiá: {row[2]},  \nDiscount: {row[9]}%, \nLink:http://tiki.vn/{row[12]}")	
    				print(row[11])
    				print(row[12])
    				dispatcher.utter_message(image = f"{row[11]}")
    				dispatcher.utter_message(text = f"<=====>")
    		except:
    			print(" ko co data")
    		
    	if(text == 'Trên 5 triệu'):
    		cursor = conn.cursor()
    		sql= "select * from product where gia >=5000000 and  ten like '%{}%'  limit 2 ".format(brand)
    		try:
    			cursor.execute(sql)
    			rows = cursor.fetchall()
    			for row in rows:
    				dispatcher.utter_message(text = f" Tên: {row[1]},\nGiá: {row[2]},  \nDiscount: {row[9]}%, \nLink:http://tiki.vn/{row[12]}")	
    				print(row[11])
    				print(row[12])
    				dispatcher.utter_message(image = f"{row[11]}")
    				dispatcher.utter_message(text = f"<=====>")
    		except:
    			dispatcher.utter_message(text = f"Bot không tìm thấy dữ liệu")	
    			dispatcher.utter_message(image = f"https://i.pinimg.com/originals/4f/c0/8a/4fc08a3d40586c71749c9ddd4746b65f.gif")
    		


    	if(text == 'Trên 8 triệu'):
    		cursor = conn.cursor()
    		sql= "select * from product where gia >=8000000 and  ten like '%{}%'  limit 2 ".format(brand)
    		try:
    			cursor.execute(sql)
    			rows = cursor.fetchall()
    			for row in rows:
    				dispatcher.utter_message(text = f" Tên: {row[1]},\nGiá: {row[2]},  \nDiscount: {row[9]}%, \nLink:http://tiki.vn/{row[12]}")	
    				print(row[11])
    				print(row[12])
    				dispatcher.utter_message(image = f"{row[11]}")
    				dispatcher.utter_message(text = f"<=====>")
    		except:
    			dispatcher.utter_message(text = f"Bot không tìm thấy dữ liệu")	
    			dispatcher.utter_message(image = f"https://i.pinimg.com/originals/4f/c0/8a/4fc08a3d40586c71749c9ddd4746b65f.gif")
    		

    		sql2 ="select * from sendo where price >=8000000 and  ten like '%{}%'  limit 2 ".format(brand)
    		try:
    			cursor.execute(sql2)
    			rows = cursor.fetchall()
    			for row in rows:
    				dispatcher.utter_message(text = f" Tên: {row[1]},\nGiá: {row[4]},  \nDiscount: {row[8]} %, \nLink:https://www.sendo.vn/{row[2]}")	
    				dispatcher.utter_message(image = f"{row[6]}")
    				dispatcher.utter_message(text = f"<=====>")
    		except:
    			dispatcher.utter_message(text = f"Bot không tìm thấy dữ liệu")	
    			dispatcher.utter_message(image = f"https://i.pinimg.com/originals/4f/c0/8a/4fc08a3d40586c71749c9ddd4746b65f.gif")
    		conn.close()
    	return [SlotSet("brand",brand)]      
    
def get_faq():
    idx =random.randint(0,len(q_list)-1)
    ret_text = "🎁Quà tặng kiến thức cho bạn:\n"
    ret_text += "🔸Hỏi: " + q_list[idx] + "\n"
    ret_text += "🔸Đáp:️ " + a_list[idx] + "\n"
    ret_text += "Nguồn: bit.ly/100FAQPeter"
    return ret_text






#phone
class Actionsavemucdich(Action):
    def name(self) -> Text:
        return "action_save_mucdich"
    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
    	mucdich = tracker.latest_message['text']
    	dispatcher.utter_message(text=f"Mục đích của bạn là{mucdich}!")
    	return [SlotSet("mucdich",mucdich)]


class ActionPhone(Action):
    def name(self) -> Text:
        return "action_select_mucdich"
    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        # Open a file: file
        print('[%s] <- %s' % (self.name(), tracker.latest_message['text']))

        button = {
            "type": "postback",
            "title": "🔔Chơi game",
            "payload": "Chơi game"
        }
        button1 = {
            "type": "postback",
            "title": "🔔Quay phim chụp ảnh đẹp",
            "payload": "Quay phim chụp ảnh đẹp"
        }
        button2 = {
            "type": "postback",
            "title": "🔔Pin trâu",
            "payload": "Pin trâu"
        }
        button3 = {
            "type": "postback",
            "title": "🔔Bảo mật thông tin tốt",
            "payload": "Bảo mật thông tin tốt"
        }
        ret_text = "Tôi là trợ lý ảo."
        dispatcher.utter_message(text=ret_text, buttons=[button, button1, button2])
        print('[%s] -> %s' % (self.name(), ret_text))

        del ret_text, button, button1, button2, button3
        gc.collect()
        return []


class ActionPhone(Action):
    def name(self) -> Text:
        return "action_goiy2"
    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        # Open a file: file
        print('[%s] <- %s' % (self.name(), tracker.latest_message['text']))

        button = {
            "type": "postback",
            "title": "🔔Trên 2 triệu",
            "payload": "Trên 2 triệux"
        }
        button1 = {
            "type": "postback",
            "title": "🔔Trên 4 triệu",
            "payload": "Trên 4 triệu"
        }
        button2 = {
            "type": "postback",
            "title": "🔔Trên 8 triệu",
            "payload": "Trên 8 triệu"
        }
        button3 = {
            "type": "postback",
            "title": "🔔Trên 20 triệu",
            "payload": "Trên 20 triệu"
        }
        ret_text = "Tôi là trợ lý ảo."
        dispatcher.utter_message(text=ret_text, buttons=[button, button1, button2, button3])
        print('[%s] -> %s' % (self.name(), ret_text))

        del ret_text, button, button1, button2, button3,
        gc.collect()
        return []


class Actionh(Action):
    def name(self) -> Text:
        return "action_kq_phone"
    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:     
    	brand= tracker.get_slot("brand") # lấy thương hiệu sản phẩm dell ,macbook,,,auss
    	print(brand)
    	text = tracker.latest_message['text'] # lấy giá thành người dùng chọn
    	dispatcher.utter_message("Phone:\n")
    	print(text);


    	if(text == 'Trên 8 triệu'):
    		#Tiki
    		
    		cursor = conn.cursor()
    		sql= "select * from product where gia >=8000000 and  ten like '%{}%'  limit 2 ".format(brand)
    		try:
    			dispatcher.utter_message("Sản phẩm đến từ TIKI :\n")
    			cursor.execute(sql)
    			rows = cursor.fetchall()
    			for row in rows:
    				dispatcher.utter_message(text = f" Tên: {row[1]},\nGiá: {row[2]},  \nDiscount: {row[9]}%, \nLink:http://tiki.vn/{row[12]}")	
    				print(row[11])
    				print(row[12])
    				dispatcher.utter_message(image = f"{row[11]}")
    				dispatcher.utter_message(text = f"<=====>")
    		except:
    			print(" ko co data")	
    		conn.close()
    	return [SlotSet("brand",brand)]      
    
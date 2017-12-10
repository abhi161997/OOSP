import requests
from bs4 import BeautifulSoup
import MySQLdb
import re
link = "https://www.ebay.in/sch/i.html?_from=R40&_trksid=p2055845.m570.l1313.TR0.TRC0.H0.Xmobile.TRS0&_nkw=mobile&_sacat=0"
r = requests.get(link)
soup = BeautifulSoup(r.content,"lxml")
links = soup.find_all("div",{"class":"col _2-gKeQ"})
l = len(links)

price = soup.find_all("div",{"class":"_1vC4OE _2rQ-NK"})
rating = soup.find_all("div",{"class":"hGSR34 _2beYZw"})
ratingreview = soup.find_all("span",{"class":"_38sUEc"})
name = soup.find_all("div",{"class":"_3wU53n"})
features = soup.find_all("li",{"class":"tVe95H"})
points = soup.find_all("div",{"class":"hGSR34 _2beYZw"})

j=0
feature =''

db = MySQLdb.connect("localhost","root","","web_mining")
c = db.cursor()
print(l)
for i in range(0,l-1):
   flippoint = points[i].text
   flippoint = flippoint[0:(len(flippoint)-2)]
   flipfeature = features[i].text
   flipname = name[i].text
   fliprate = ratingreview[i].text
   fl = len(fliprate)
   fliprate1 = fliprate[0:l-2]
   flipprice = price[i].text
   price1 = flipprice[1:]
   price1 = price1.replace(',','')
   sql = "insert into products(company, product_name, category, rating, review, no_of_review, price) values('flipkart','"+flipname+"','"+'mobile'+"','"+flippoint+"','"+flipfeature+"','"+fliprate1+"','"+price1+"')";
   print(sql)
   c.execute(sql)
   db.commit()
c.close()





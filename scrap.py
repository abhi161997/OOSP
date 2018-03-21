import requests
from bs4 import BeautifulSoup
#import MySQLdb

def strip_non_ascii(string):
    ''' Returns the string without non ASCII characters'''
    stripped = (c for c in string if 48 <= ord(c) <= 57)
    return ''.join(stripped)


q = input("Enter product code to Search the product")

link = "https://www.flipkart.com/search?q="+q+"&otracker=start&as-show=on&as=off"
r = requests.get(link)
soup = BeautifulSoup(r.content,"lxml")
price = soup.find_all("div",{"class":"_1vC4OE"})
fp = price[0].text
fp = strip_non_ascii(fp)
print(fp);

#print(soup);
j=0
feature =''

#db = MySQLdb.connect("localhost","root","","web_mining")
#c = db.cursor()
# sql = "insert into products(company, product_name, category, rating, review, no_of_review, price) values('flipkart','"+flipname+"','"+'mobile'+"','"+flippoint+"','"+flipfeature+"','"+fliprate1+"','"+price1+"')";
#   print(sql)
#   c.execute(sql)
#   db.commit()
#c.close()


import requests
from bs4 import BeautifulSoup
#import MySQLdb

def strip_non_ascii(string):
    ''' Returns the string without non ASCII characters'''
    stripped = (c for c in string if 48 <= ord(c) <= 57)
    return ''.join(stripped)

link = "https://www.amazon.in/s/ref=nb_sb_noss_1?url=search-alias%3Daps&field-keywords=klv-40w562d&rh=i%3Aaps%2Ck%3Aklv-40w562d"
https://www.amazon.in/s/ref=nb_sb_noss?url=search-alias%3Daps&field-keywords=klv-40w562d
#link = "https://www.amazon.in/s/ref=nb_sb_noss_1?url=search-alias%3Daps&field-keywords="+"klv-24p413d"+"&rh=i%3Aaps%2Ck%3A"+"klv-24p413d"
#q = input("Enter product code to Search the product")
#q = "klv-24p413d"
#q = "klv-40w562d"
#link = "https://www.flipkart.com/search?q="+q+"&otracker=start&as-show=on&as=off"
#link = "https://www.snapdeal.com/search?keyword="+q+"&santizedKeyword=&catId=&categoryId=0&suggested=false&vertical=&noOfResults=1&clickSrc=go_header&lastKeyword=&prodCatId=&changeBackToAll=false&foundInAll=false&categoryIdSearched=&cityPageUrl=&categoryUrl=&url=&utmContent=&dealDetail=&sort=rlvncy"
r = requests.get(link)
soup = BeautifulSoup(r.content,"lxml")
price = soup.find("span",{"class":"a-size-base a-color-price s-price a-text-bold"})
#price = '<span class="a-size-base a-color-price s-price a-text-bold"><span class="currencyINR">  </span>45,990</span>';
print(price.text)
fp = price.text
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

#klv-24p413d
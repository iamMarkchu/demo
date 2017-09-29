#!/usr/bin/env python3
# -*- coding: utf-8 -*-

########## prepare ##########

# install mysql-connector-python:
# pip3 install mysql-connector-python --allow-external mysql-connector-python

import mysql.connector
from datetime import datetime
# change root password to yours:
conn = mysql.connector.connect(user='root', password='chukui', database='eat')

count = '10'
cursor = conn.cursor()
cursor.execute('select * from lunch_logs order by date desc limit %s', (int(count),))
values = cursor.fetchall()
back = '日期\t'+'金额\t' + '人数\t' + '人均\t'+"\n"
for value in values:
    date = value[1].strftime('%Y-%m-%d')
    total = str(value[3])
    count = str(value[4])
    back += '{0}\t{1}\t{2}\t{3}\n'.format(date, total, count, str(round(float(total)/float(count), 2)))
print back
# 关闭Cursor和Connection:
cursor.close()
conn.close()
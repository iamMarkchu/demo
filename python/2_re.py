# encoding: UTF-8
import re

content = '2017-08-10' 
# pattern = re.compile('\-total (([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$')
# match = pattern.match(content)
# if match:
#     print(match.group(1))
# match = re.match(r'\-sum (([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*)) (\d+)$', content)
match = re.match(r'^(d{2}|d{4})-((0([1-9]{1}))|(1[1|2]))-(([0-2]([1-9]{1}))|(3[0|1]))$', content)
print match
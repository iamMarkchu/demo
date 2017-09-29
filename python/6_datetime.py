#! /usr/bin/python
# -*- coding: utf-8 -*-

from datetime import datetime
now = datetime.now()
dt = datetime(2015, 4, 19, 12, 20)
print(now, type(now))
print(dt, type(now))

print(dt.timestamp())
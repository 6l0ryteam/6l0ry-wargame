#include <stdio.h>
#include <stdint.h>
#include <stdlib.h>
#include <unistd.h>
#include <klee/klee.h>

uint32_t state = 42;

typedef enum {
    D_SOUP_CHICKEN,
    D_SOUP_MEAT,
    D_SOUP_NAZI,
    D_CHICKEN_RAW,
    D_CHICKEN_BLACK,
    D_MEAT_BLACKANGUS,
    D_MEAT_WAGYU,
    D_MEAT_HORSE,
    D_TIRAMISU,
    D_ICE_BANANA,
    D_ICE_STRAWBERRY,
    D_OVERFLOW,
} dish_t;

const char *dishes[] = {
    "soup-chicken", "soup-meat", "soup-nazi", "chicken-raw", "chicken-black",
    "meat-blackangus", "meat-wagyu", "meat-horse", "tiramisu", "ice-banana",
    "ice-strawberry",
};

void dish(uint8_t d)
{
    state = ((state + d) * 3294782) ^ 3159238819;
}

int main()
{
    setvbuf(stdout, 0LL, 2, 0LL);
    setvbuf(stdin, 0LL, 1, 0LL);
    uint8_t input[32];
    klee_make_symbolic(&input, sizeof(input), "input");

    for (uint32_t idx = 0; idx < 32; idx++) {
        dish(input[idx]);
    }

    for (uint32_t idx = 0; idx < 32; idx++) {
        if(input[idx] < D_OVERFLOW) {
        }
        else {
        }
    }

    if(state == 0xd34db33f) {
        klee_assert(0);
    }
    return 0;
}
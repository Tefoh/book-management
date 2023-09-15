<?php

namespace App\Enums;

enum BookReserveStatus: string
{
    case DEFAULT = 'default';
    case RESERVED = 'reserved';
    case RELEASED = 'released';
}

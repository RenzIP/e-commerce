<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'admin';
    case SELLER = 'seller';
    case CUSTOMER = 'customer';
}

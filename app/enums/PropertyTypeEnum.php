<?php


namespace App\Enums;

enum PropertyTypeEnum: string
{
    case SINGLE = 'Single-family Home';
    case TOWNHOUSE = 'Town house';
    case MULTIFAMILY = 'Multi-family Home';
    case BUNGALOW = 'Bungalow';
}

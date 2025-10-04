<?php
namespace App\enums;
declare(strict_types=1);

enum Genre: string
{
    case ACTION = "action";
    case ROMANCE = "romance";
    case COMEDY = "comdedy";
    case HORROR = "horror";
}

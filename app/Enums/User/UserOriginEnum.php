<?php

namespace App\Enums\User;

enum UserOriginEnum: string
{
    case LOCAL = 'local';
    case LINKEDIN = 'linkedin';
    
    //any other third party origins
}

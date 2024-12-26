<?php

namespace App\Enums\User;

enum UserOriginEnum: string
{
    case LOCAL = 'local';
    case LINKEDIN = 'linkedin-openid';
    
    //any other third party origins
}

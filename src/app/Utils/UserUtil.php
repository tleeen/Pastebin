<?php

namespace App\Utils;

class UserUtil
{
    /**
     * @return int
     */
    public static function getId(): int
    {
        if(auth('api')->user()){
            return auth('api')->user()->id;
        }
        elseif (auth()->user()) {
            return auth()->user()->id;
        }
        else{
            return 0;
        }
    }
}

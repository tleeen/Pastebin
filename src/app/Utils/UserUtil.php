<?php

namespace App\Utils;

use App\Models\User;

class UserUtil
{
    /**
     * @return int|null
     */
    public static function getId(): ?int
    {
        if(auth('api')->user()){

            /** @var User $user */
            $user = auth('api')->user();

            return $user->id;
        }
        elseif (auth()->user()) {

            /** @var User $user */
            $user = auth()->user();

            return $user->id;
        }
        else{
            return null;
        }
    }
}

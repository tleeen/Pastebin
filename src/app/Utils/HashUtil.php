<?php

namespace App\Utils;

use Hashids\Hashids;

class HashUtil
{
    static public function encrypt(string $id): string
    {
        $hashids = new Hashids('ggIKLdf', 8);

        return $hashids->encode($id);
    }

    static public function decipher(string $hash)
    {
        $hashids = new Hashids('ggIKLdf', 8);

        return $hashids->decode($hash)[0];
    }
}

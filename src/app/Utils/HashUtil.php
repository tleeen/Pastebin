<?php

namespace App\Utils;

use Hashids\Hashids;

class HashUtil
{
    /**
     * @param int $id
     * @return string
     */
    static public function encrypt(int $id): string
    {
        $hashids = new Hashids('ggIKLdf', 8);

        return $hashids->encode($id);
    }

    /**
     * @param string $hash
     * @return int
     */
    static public function decipher(string $hash): int
    {
        $hashids = new Hashids('ggIKLdf', 8);

        return $hashids->decode($hash)[0];
    }
}

<?php

namespace App\Services\interfaces;

interface UserServiceInterface
{
    public function getAllPastes(string $id);
    public function getLastPastes(string $id);
}

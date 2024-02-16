<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function getAllPaginatePastes(string $id);

    public function getLastPastes(string $id);
}

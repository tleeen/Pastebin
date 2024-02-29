<?php

namespace App\Services;

use App\DTO\PasteDTO;
use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Services\interfaces\PasteServiceInterface;
use App\Utils\HashUtil;
use Illuminate\Database\Eloquent\Collection;
use  Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PasteService implements PasteServiceInterface
{
    /**
     * @param PasteRepositoryInterface $repository
     */
    public function __construct(private readonly PasteRepositoryInterface $repository){}

    /**
     * @return LengthAwarePaginator
     */
    public function getAllPaginate(): LengthAwarePaginator
    {
        $pastes = $this->repository->getAllPaginate();

        foreach ($pastes->items() as $paste) {
            $paste->hash_id = HashUtil::encrypt($paste->id);
        }

        return $pastes;
    }

    /**
     * @return Collection<int, Paste>
     */
    public function getAll(): Collection
    {
        $pastes = $this->repository->getAll();

        $pastes->transform(function ($paste) {
            $paste->hash_id = HashUtil::encrypt($paste->id);
            return $paste;
        });

        return $pastes;
    }

    /**
     * @return Collection<int, Paste>
     */
    public function getLast(): Collection
    {
        $pastes = $this->repository->getLast();

        $pastes->transform(function ($paste) {
            $paste->hash_id = HashUtil::encrypt($paste->id);
            return $paste;
        });

        return $pastes;
    }

    /**
     * @param PasteDTO $DTO
     * @return Paste
     */
    public function store(PasteDTO $DTO): Paste
    {
        $paste = $this->repository->store($DTO);

        $paste->hash_id = HashUtil::encrypt($paste->id);

        return $paste;
    }

    /**
     * @param string $hash
     * @return Paste
     */
    public function getById(string $hash): Paste
    {
        $id = HashUtil::decipher($hash);

        $paste = $this->repository->getById($id);

        $paste->hash_id = $hash;

        return $paste;
    }

    public function delete(string $hash): void
    {
        $id = HashUtil::decipher($hash);

        $this->repository->delete($id);
    }

    /**
     * @param int|null $id
     * @return LengthAwarePaginator
     */
    public function getAuthor(int|null $id): LengthAwarePaginator
    {
        $pastes = $this->repository->getAuthor($id);

        foreach ($pastes->items() as $paste) {
            $paste->hash_id = HashUtil::encrypt($paste->id);
        }

        return $pastes;
    }

    /**
     * @param int|null $id
     * @return Collection<int, Paste>
     */
    public function getAuthorLast(int|null $id): Collection
    {
        $pastes = $this->repository->getAuthorLast($id);

        $pastes->transform(function ($paste) {
            $paste->hash_id = HashUtil::encrypt($paste->id);
            return $paste;
        });

        return $pastes;
    }
}

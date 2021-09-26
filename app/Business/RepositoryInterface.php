<?php

namespace App\Business;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    /**
     * @param int $id
     * @return model
     */
    public function find(int $id): Model;

    /**
     * @param array $filter
     * @return RepositoryInterface
     */
    public function findBy(array $filter): RepositoryInterface;

    /**
     * @param int $id
     * @return bool|null
     */
    public function delete(int $id): ?bool;

    /**
     * @return Collection
     */
    public function get(): Collection;

    /**
     * @param string $columm
     * @param string|null $direction
     * @return RepositoryInterface
     */
    public function order(string $columm, string $direction = null):RepositoryInterface;

    /**
     * @param int $pages
     * @return LengthAwarePaginator
     */
    public function paginate(int $pages): LengthAwarePaginator;

    /**
     * @param int $limit
     * @return RepositoryInterface
     */
    public function limit(int $limit):RepositoryInterface;
}

<?php

namespace App\Business\Produto\Repository\Categoria;

use App\Business\RepositoryInterface;
use Illuminate\Http\Request;

interface CategoriaRepositoryInterface extends RepositoryInterface
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request);

    /**
     * @param int $id
     * @param Request $request
     * @return mixed
     */
    public function replace(int $id, Request $request);
}

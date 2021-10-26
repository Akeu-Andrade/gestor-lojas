<?php

namespace App\Business\Produto\Repository\Produto;

use App\Business\RepositoryInterface;
use Illuminate\Http\Request;

interface ProdutoRepositoryInterface extends RepositoryInterface
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request);

    /**
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function replace(int $id, Request $request);
}

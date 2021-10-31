<?php

namespace App\Business\Loja\Repository\Loja;

use App\Business\RepositoryInterface;
use Illuminate\Http\Request;

interface LojaRepositoryInterface extends RepositoryInterface
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

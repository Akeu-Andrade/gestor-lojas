<?php

namespace App\Business\Site\Repository;

use App\Business\RepositoryInterface;
use Illuminate\Http\Request;

interface LojaConfigRepositoryInterface extends RepositoryInterface
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

<?php

namespace App\Business\Produto\Repository\CategoriaProduto;

use App\Business\RepositoryInterface;
use Illuminate\Http\Request;

interface CategoriaProdutoRepositoryInterface extends RepositoryInterface
{
    public function store(Request $request);
    public function replace(int $id, Request $request);
}

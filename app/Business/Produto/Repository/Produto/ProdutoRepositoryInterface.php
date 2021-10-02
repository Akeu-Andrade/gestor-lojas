<?php

namespace App\Business\Produto\Repository\Produto;

use App\Business\RepositoryInterface;
use Illuminate\Http\Request;

interface ProdutoRepositoryInterface extends RepositoryInterface
{
    /**
     * Método para cadastrar um novo veiculo
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request);

    /**
     * Método para atualizar as informações de um veiculo
     *
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function replace(int $id, Request $request);
}

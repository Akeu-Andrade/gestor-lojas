<?php

namespace App\Business\Produto\Repository\Produto;

use App\Business\Produto\Models\Produto;
use App\Business\Repository;
use Illuminate\Http\Request;

class ProdutoRepository extends Repository implements ProdutoRepositoryInterface
{

    /**
     * ProdutoRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Produto();
    }

    /**
     * @param Request $request
     * @return mixed|void
     */
    public function store(Request $request): Produto
    {
        /**
         * @var Produto $produto
         */
        $produto = $this->create($request->request->all());

        return $produto;
    }

    /**
     * @param int $id
     * @param Request $request
     * @return mixed|void
     */
    public function replace(int $id, Request $request)
    {
        $this->update($id, $request->all());
    }
}

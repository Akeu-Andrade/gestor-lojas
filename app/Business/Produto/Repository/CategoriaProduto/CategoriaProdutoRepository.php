<?php
namespace App\Business\Produto\Repository\CategoriaProduto;

use App\Business\Produto\Models\CategoriaProduto;
use App\Business\Repository;
use Illuminate\Http\Request;

class CategoriaProdutoRepository extends Repository implements CategoriaProdutoRepositoryInterface
{
    /**
     * CategoriaRepository constructor.
     */
    public function __construct()
    {
        $this->model = new CategoriaProduto();
    }

    /**
     * @param Request $request
     * @return mixed|void
     */
    public function store(Request $request)
    {
        $this->create($request->all());
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

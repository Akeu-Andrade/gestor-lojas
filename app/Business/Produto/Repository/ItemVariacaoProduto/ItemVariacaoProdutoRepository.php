<?php
namespace App\Business\Produto\Repository\ItemVariacaoProduto;

use App\Business\Produto\Models\ItemVariacaoProduto;
use App\Business\Repository;
use Illuminate\Http\Request;

class ItemVariacaoProdutoRepository extends Repository implements ItemVariacaoProdutoRepositoryInterface
{
    /**
     * ItemVariacaoProdutoRepository constructor.
     */
    public function __construct()
    {
        $this->model = new ItemVariacaoProduto();
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

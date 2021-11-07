<?php

namespace App\Business\Site\Repository;

use App\Business\Produto\Models\Pedido;
use App\Business\Repository;
use Illuminate\Http\Request;

class PedidoRepository extends Repository implements PedidoRepositoryInterface
{

    /**
     * PedidoRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Pedido();
    }

    /**
     * @param Request $request
     * @return mixed|void
     */
    public function store(Request $request): Pedido
    {
        return $this->create($request->request->all());
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

<?php
namespace App\Business\Produto\Repository\Categoria;

use App\Business\Produto\Models\Categoria;
use App\Business\Repository;
use Illuminate\Http\Request;

class CategoriaRepository extends Repository implements CategoriaRepositoryInterface
{
    /**
     * CategoriaRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Categoria();
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

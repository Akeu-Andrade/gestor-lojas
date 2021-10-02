<?php

namespace App\Http\Controllers\Web\Produto;

use App\Business\Produto\Models\Categoria;
use App\Business\Produto\Repository\Categoria\CategoriaRepositoryInterface;
use App\Http\Controllers\BaseController;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\View\View;
use Throwable;

class CategoriaController extends BaseController
{
    /**
     * @param CategoriaRepositoryInterface $repository
     */
    public function __construct(CategoriaRepositoryInterface $repository)
    {
        parent::__construct($repository);

        $this->setPages(10);
        $this->setFolderView("produto.categoria");
        $this->setName("Categoria do produto");
        $this->setUrl(route('categoria.index'));
        $this->setOrderList(['created_at', 'desc']);
    }

    /**
     * * Método para fazer a listagem das categorias
     *
     * @param Request $request
     * @return Application
     * @throws Exception
     */
    public function index(Request $request)
    {
        return parent::indexBase($request);
    }

    public function create()
    {
        return parent::createBase();
    }

    /**
     * Método para salvar as informações no banco de dados
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws Throwable
     */
    public function store(Request $request)
    {
        return parent::storeBase($request);
    }

    /**
     * Método para exibi o formulário de edição de uma categoria
     *
     * @param Categoria $categoria
     * @return Factory|View
     */
    public function edit(Categoria $categoria)
    {
        return parent::editBase($categoria);
    }

    /**
     * @param Request $request
     * @param Categoria $categoria
     * @return RedirectResponse
     * @throws Throwable
     */
    public function update(Request $request, Categoria $categoria): RedirectResponse
    {
        return parent::updateBase($request, $categoria);
    }

    /**
     * @param Request $request
     * @param Categoria $categoria
     * @return RedirectResponse
     * @throws Throwable
     */
    public function destroy(Request $request, Categoria $categoria)
    {
        return parent::destroyBase($request, $categoria);
    }
}

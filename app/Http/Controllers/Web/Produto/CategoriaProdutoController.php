<?php

namespace App\Http\Controllers\Web\Produto;

use App\Business\Produto\Models\CategoriaProduto;
use App\Business\Produto\Repository\CategoriaProduto\CategoriaProdutoRepositoryInterface;
use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;

class CategoriaProdutoController extends BaseController
{
    /**
     * CategoriaController constructor.
     * @param CategoriaProdutoRepositoryInterface $repository
     */
    public function __construct(CategoriaProdutoRepositoryInterface $repository)
    {
        parent::__construct($repository);

        $this->setPages(10);
        $this->setFolderView("admin.produto.categoria");
        $this->setName("Categoria do produto");
        $this->setUrl(route('categoria.index'));
        $this->setOrderList(['created_at', 'desc']);
    }

    /**
     * * Método para fazer a listagem das categorias
     *
     * @param Request $request
     * @return Application
     * @throws \Exception
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
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        return parent::storeBase($request);
    }

    /**
     * Método para exibi o formulário de edição de uma categoria
     *
     * @param CategoriaProduto $categoriaProduto
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(CategoriaProduto $categoriaProduto)
    {
        return parent::editBase($categoriaProduto);
    }

    /**
     * @param Request $request
     * @param CategoriaProduto $categoriaProduto
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(Request $request, CategoriaProduto $categoriaProduto): RedirectResponse
    {
        return parent::updateBase($request, $categoriaProduto);
    }

    /**
     * @param Request $request
     * @param CategoriaProduto $categoriaProduto
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function destroy(Request $request, CategoriaProduto $categoriaProduto)
    {
        return parent::destroyBase($request, $categoriaProduto);
    }
}

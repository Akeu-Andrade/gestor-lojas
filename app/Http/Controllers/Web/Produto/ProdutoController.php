<?php

namespace App\Http\Controllers\Web\Produto;

use App\Business\Produto\Models\Produto;
use App\Business\Produto\Repository\Produto\ProdutoRepositoryInterface;
use App\Http\Controllers\BaseController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProdutoController extends BaseController
{
    /**
     * ProdutoController constructor.
     * @param ProdutoRepositoryInterface $produtoRepository
     */
    public function __construct(ProdutoRepositoryInterface $produtoRepository)
    {
        parent::__construct($produtoRepository);

        $this->setPages(10);
        $this->setFolderView("produto");
        $this->setName("produto");
        $this->setUrl(route('produto.index'));
        $this->setOrderList(['created_at', 'desc']);
    }

    /**
     * Método para fazer a listagem dos Produtos
     *
     * @param Request $request
     * @return Application|Factory|View
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
     * Método para exibi o formulário de edição de um produto
     *
     * @param Produto $produto
     * @return Factory|View
     */
    public function edit(Produto $produto)
    {
        return parent::editBase($produto);
    }

    /**
     * @param Request $request
     * @param Produto $produto
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(Request $request, Produto $produto): RedirectResponse
    {
        return parent::updateBase($request, $produto);
    }

    /**
     * @throws \Exception
     */
    public function show(Request $request)
    {
        return parent::indexBase($request);
    }

    /**
     * @param Request $request
     * @param Produto $produto
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function destroy(Request $request, Produto $produto)
    {
        return parent::destroyBase($request, $produto);
    }


}

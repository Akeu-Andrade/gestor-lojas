<?php

namespace App\Http\Controllers\Web\Produto;

use App\Business\Produto\Models\ItemVariacaoProduto ;
use App\Business\Produto\Repository\ItemVariacaoProduto\ItemVariacaoProdutoRepositoryInterface;
use App\Http\Controllers\BaseController;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\View\View;
use Throwable;

class ItemVariacaoProdutoController extends BaseController
{

    /**
     * ItemVariacaoProdutoController constructor.
     * @param ItemVariacaoProdutoRepositoryInterface $repository
     */
    public function __construct(ItemVariacaoProdutoRepositoryInterface $repository)
    {
        parent::__construct($repository);

        $this->setPages(10);
        $this->setFolderView("produto.itemvariacaoproduto");
        $this->setName("Item de Variacao do Produto");
        $this->setUrl(route('itemvariacaoproduto.index'));
        $this->setOrderList(['created_at', 'desc']);
    }

    /**
     * * Método para fazer a listagem das itens de variação do produto
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
     * Método para exibi o formulário de edição
     *
     * @param ItemVariacaoProduto $itemvariacaoproduto
     * @return Factory|View
     */
    public function edit(ItemVariacaoProduto $itemvariacaoproduto)
    {
        return parent::editBase($itemvariacaoproduto);
    }

    /**
     * @param Request $request
     * @param ItemVariacaoProduto $itemvariacaoproduto
     * @return RedirectResponse
     * @throws Throwable
     */
    public function update(Request $request, ItemVariacaoProduto $itemvariacaoproduto): RedirectResponse
    {
        return parent::updateBase($request, $itemvariacaoproduto);
    }

    public function show(){

    }

    /**
     * @param Request $request
     * @param ItemVariacaoProduto $itemvariacaoproduto
     * @return RedirectResponse
     * @throws Throwable
     */
    public function destroy(Request $request, ItemVariacaoProduto $itemvariacaoproduto)
    {
        return parent::destroyBase($request, $itemvariacaoproduto);
    }

}

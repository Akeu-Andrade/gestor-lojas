<?php

namespace App\Http\Controllers\Web\Loja;

use App\Business\Loja\Repository\Loja\LojaRepositoryInterface;
use App\Business\Produto\Models\Produto;
use App\Business\Produto\Repository\Produto\ProdutoRepositoryInterface;
use App\Business\Site\Models\LojaConfig;
use App\Http\Controllers\BaseController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LojaController extends BaseController
{
    /**
     * LojaController constructor.
     * @param LojaRepositoryInterface $repository
     */
    public function __construct(LojaRepositoryInterface $repository)
    {
        parent::__construct($repository);

        $this->setPages(10);
        $this->setFolderView("loja");
        $this->setName("loja");
        $this->setUrl(route('loja.index'));
        $this->setOrderList(['created_at', 'desc']);
    }

    /**
     * Método para fazer a listagem
     *
     * @param Request $request
     * @return Application|Factory|View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        return parent::indexBase($request);
    }

    /**
     * @return Factory|View
     */
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
     * @param LojaConfig $loja
     * @return Factory|View
     */
    public function edit(LojaConfig $loja)
    {
        return parent::editBase($loja);
    }

    /**
     * @param Request $request
     * @param LojaConfig $loja
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(Request $request, LojaConfig $loja): RedirectResponse
    {
        return parent::updateBase($request, $loja);
    }

}

<?php

namespace App\Http\Controllers\Site;

use App\Business\Produto\Models\Pedido;
use App\Business\Produto\Models\Produto;
use App\Business\Produto\Repository\Produto\ProdutoRepositoryInterface;
use App\Business\Site\Models\LojaConfig;
use App\Enums\SimNaoEnum;
use App\Http\Controllers\BaseController;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends BaseController
{
    /**
     * SiteController constructor.
     * @param ProdutoRepositoryInterface $repository
     */
    public function __construct(ProdutoRepositoryInterface $repository)
    {
        parent::__construct($repository);

        $this->setPages(10);
        $this->setFolderView("site");
        $this->setName("welcome");
        $this->setUrl(route('welcome'));
        $this->setOrderList(['created_at', 'desc']);
    }

    /**
     * Método para fazer a listagem dos Produtos
     *
     * @param Request $request
     * @return Application|Factory|View
     * @throws Exception
     */
    public function index(Request $request)
    {

        $loja = LojaConfig::query()->first();

        $novos = $this->novos(4);

        return view( $this->getFolderView(). ".index", [
            'url' => $this->getUrl(),
            'novos' => $novos,
            'loja' => $loja
        ]);
    }

    public function novos(int $quantidade){
        return Produto::whereStatusProduto(SimNaoEnum::Sim)
            ->where('quantidade', '>', 0)
            ->orderBy('created_at', 'desc')
            ->limit($quantidade)
            ->get();
    }

}

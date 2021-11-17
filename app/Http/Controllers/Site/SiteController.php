<?php

namespace App\Http\Controllers\Site;

use App\Business\Produto\Models\Categoria;
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

        $this->setPages(20);
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

        $loja = $this->consultaLoja();
        $novos = $this->tempoLancado(4, 'desc');
        $velhos = $this->tempoLancado(4, 'asc');
        $descontos = $this->desconto(4);
        $allCategorias = Categoria::query()->get();
        $categorias = $this->topCategoria(8);

        $produtos = null;
        if (!empty($request->all())){
            $this->getRepository()->findBy($request->request->all())->order('nome', 'asc');
            $produtos = $this->getRepository()->paginate($this->getPages());
            $produtos->appends($request->except('page'));
            $this->setFolderView('site/lista');
        } else {
            $this->setFolderView('site');
        }

        $isCarrinho = $request->getSession()->get('_previous')['url'];

        return view( $this->getFolderView(). ".index", [
            'url' => $this->getUrl(),
            'produtos' => $produtos,
            'novos' => $novos,
            'descontos' => $descontos,
            'velhos' => $velhos,
            'loja' => $loja,
            'isCarrinho' => $isCarrinho,
            'allCategorias' => $allCategorias,
            'categorias' => $categorias
        ]);
    }

    //Consulta as config da loja
    public function consultaLoja()
    {
        return LojaConfig::query()->first();
    }

    public function topCategoria(int $quantidade){
        return Categoria::query()->limit($quantidade)->get();
    }

    public function tempoLancado(int $quantidade, string $ordem){
        return Produto::whereStatusProduto(SimNaoEnum::Sim)
            ->where('quantidade', '>', 0)
            ->orderBy('created_at', $ordem)
            ->limit($quantidade)
            ->get();
    }

    public function desconto(int $quantidade){
        return Produto::whereStatusProduto(SimNaoEnum::Sim)
            ->where('quantidade', '>', 0)
            ->where('desconto_porcento', '!=', null)
            ->orderBy('desconto_porcento', 'desc')
            ->limit($quantidade)
            ->get();
    }

    public function show($id)
    {
        $pedido = $this->consultaProdutosId($id);
        $allCategorias = Categoria::query()->get();
        $loja = $this->consultaLoja();
        $categorias = $this->topCategoria(8);
        $this->setFolderView('site');

        return view($this->getFolderView(). ".pedido", [
            'pedido' => $pedido,
            'loja' => $loja,
            'allCategorias' => $allCategorias,
            'categorias' => $categorias
        ]);
    }

    //Consulta os produtos com as regras de disponivel
    public function consultaProdutosId(int $id)
    {
        return Produto::whereStatusProduto(SimNaoEnum::Sim)
            ->where('quantidade', '>', 0)
            ->where('id', '=', $id)
            ->get();
    }

}

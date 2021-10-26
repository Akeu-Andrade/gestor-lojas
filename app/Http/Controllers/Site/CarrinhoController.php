<?php
namespace App\Http\Controllers\Site;

use App\Business\Produto\Models\Produto;
use App\Business\Produto\Repository\Produto\ProdutoRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Site\Carrinho\Carrinho;
use Illuminate\Http\Request;
use Redirect;
use Session;

class CarrinhoController extends Controller
{

    public function index(ProdutoRepositoryInterface $produtoRepository) {
        $carrinho = new Carrinho(session());
        $produtosCarrinho = $carrinho->getProdutos();

        $produtos = $produtoRepository->getDestaques(4);

        return \view("site.carrinho.index", [
            "produtosCarrinho" => $produtosCarrinho,
            "produtos" => $produtos
        ]);
    }

    public function adicionarProduto(Request $request, Produto $produto) {
        $carrinho = new Carrinho(session());
        $carrinho->adicionarProduto($produto, $request->quantidade ?? 1);

        Session::flash('message', 'Produto adicionado ao seu carrinho');

        return Redirect::to('carrinho');
    }

    public function removerProduto(Produto $produto) {
        $carrinho = new Carrinho(session());
        $carrinho->removerProduto($produto);

        Session::flash('message', 'Produto removido');

        return Redirect::to('carrinho');
    }

    public function qtdProdutos() {
        $carrinho = new Carrinho(session());

        return response()->json([
            "qtd" => $carrinho->getProdutos()->count()
        ]);
    }
}

<?php
namespace App\Http\Controllers\Site;

use App\Business\Produto\Models\Categoria;
use App\Business\Produto\Models\PedidoProduto;
use App\Business\Produto\Models\Produto;
use App\Business\Produto\Models\Pedido;
use App\Business\Site\Enums\StatusPedidoEnum;
use App\Business\Site\Models\LojaConfig;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    function __construct()
    {
        // obriga estar logado;
        $this->middleware('auth');
    }

    public function index()
    {
        $pedidos = Pedido::where([
            'status'  => StatusPedidoEnum::RE,
            'user_comprador_id' => Auth::id()
        ])->get();

        $loja = $this->consultaLoja();
        $allCategorias = Categoria::query()->get();
        $categorias = $this->topCategoria(8);

        return view('site.carrinho.index', [
            'pedidos' => $pedidos,
            'loja' => $loja,
            'allCategorias' => $allCategorias,
            'categorias' => $categorias
        ]);
    }

    public function adicionar(Request $request): RedirectResponse
    {
        $idproduto = $request->get('id');
        $produto = Produto::find($idproduto);

        if(empty($produto->id) ) {
            $request->session()->flash('mensagem-falha', 'Produto não encontrado em nossa loja!');
            return redirect()->route('carrinho.index');
        }

        $idusuario = Auth::id();

        $idpedido = Pedido::consultaId([
            'user_comprador_id' => $idusuario,
            'status'  => StatusPedidoEnum::RE
        ]);

        if( empty($idpedido) ) {
            $pedido_novo = Pedido::create([
                'user_comprador_id' => $idusuario,
                'status'  => StatusPedidoEnum::RE
            ]);

            $idpedido = $pedido_novo->id;
        }

        PedidoProduto::create([
            'pedido_id'  => $idpedido,
            'produto_id' => $idproduto,
            'valor'      => $produto->valor_uni,
            'status'     => StatusPedidoEnum::RE
        ]);

        $request->session()->flash('mensagem-sucesso', 'Produto adicionado ao carrinho com sucesso!');

        return redirect()->route('carrinho.index');
    }

    public function remover(Request $request): RedirectResponse
    {
        $this->middleware('VerifyCsrfToken');

        $idpedido           = $request->input('pedido_id');
        $idproduto          = $request->input('produto_id');
        $remove_apenas_item = (boolean)$request->input('item');
        $idusuario          = Auth::id();

        $idpedido = Pedido::consultaId([
            'id'      => $idpedido,
            'user_comprador_id' => $idusuario,
            'status'  => StatusPedidoEnum::RE
        ]);

        if( empty($idpedido) ) {
            $request->session()->flash('mensagem-falha', 'Pedido não encontrado!');
            return redirect()->route('carrinho.index');
        }

        $where_produto = [
            'pedido_id'  => $idpedido,
            'produto_id' => $idproduto
        ];

        $produto = PedidoProduto::where($where_produto)->orderBy('id', 'desc')->first();
        if( empty($produto->id) ) {
            $request->session()->flash('mensagem-falha', 'Produto não encontrado no carrinho!');
            return redirect()->route('carrinho.index');
        }

        if( $remove_apenas_item ) {
            $where_produto['id'] = $produto->id;
        }
        PedidoProduto::where($where_produto)->delete();

        $check_pedido = PedidoProduto::where([
            'pedido_id' => $produto->pedido_id
        ])->exists();

        if( !$check_pedido ) {
            Pedido::where([
                'id' => $produto->pedido_id
            ])->delete();
        }

        $request->session()->flash('mensagem-sucesso', 'Produto removido do carrinho com sucesso!');

        return redirect()->route('carrinho.index');
    }



    //Consulta as config da loja
    public function consultaLoja()
    {
        return LojaConfig::query()->first();
    }

    public function topCategoria(int $quantidade){
        return Categoria::query()->limit($quantidade)->get();
    }
}

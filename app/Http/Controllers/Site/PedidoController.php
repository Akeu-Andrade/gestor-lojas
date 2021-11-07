<?php
namespace App\Http\Controllers\Site;

use App\Business\Produto\Models\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    function __construct()
    {
        // obriga estar logado;
        $this->middleware('auth');
    }

    public function adicionar(Request $request)
    {
        $idproduto = $request->get('produtoId');
        $produto = Produto::find($idproduto);
    }
}

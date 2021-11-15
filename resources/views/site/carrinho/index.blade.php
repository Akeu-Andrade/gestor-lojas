<?php
/**
 * @var LojaConfig $loja
 * @var Pedido $pedido
 */

use App\Business\Produto\Models\Pedido;
use App\Business\Site\Models\LojaConfig;

?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('site.layouts.head')

<body>
<div style="width:100%; max-width:600px; min-height:100%; display:flex; flex-direction:column; padding: 32px 32px 56px; -webkit-box-align: center; align-items: center; margin: 40px auto; border: 1px solid rgb(239, 239, 239); box-sizing: border-box; border-radius: 16px;">
    <div style="display: flex; flex-direction: column; width: 100%;">
        <div style="align-items: center; padding-bottom: 20px">
            <h5> Produtos no carrinho </h5>
        </div>
        @forelse ($pedidos as $pedido)
            @php
                $total_pedido = 0
            @endphp
            @foreach ($pedido->pedidoProduto as $pedido_produto)
                <div style="display: flex; -webkit-box-align: center; align-items: center; width: 100%; border-bottom: 0.5px solid rgb(214, 215, 217); margin-bottom: 10px; padding-bottom: 10px;">
                    <div style="display: flex; flex-direction: column; width: 35px; background: rgb(250, 250, 250); -webkit-box-pack: center; justify-content: center; -webkit-box-align: center; align-items: center; border: 1px solid rgb(250, 250, 250); box-sizing: border-box; border-radius: 8px; margin-right: 10px;">
                        <button href="#" onclick="carrinhoAdicionarProduto({{ $pedido_produto->produto_id }})" type="button" style="width: 35px; border: none; background: none; font-size: 15px; color: rgb(162, 168, 178);">
                            +
                        </button>
                        <span>{{ $pedido_produto->qtd }}</span>
                        <button href="#" onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 1 )" type="button" style="width: 35px; border: none; background: none; font-size: 15px; color: rgb(162, 168, 178);">
                            -
                        </button>
                    </div>
                    <a href="pedido/{{$pedido_produto->produto_id}}" style="width: 70px; height: 70px; margin-right: 10px;">
                        <img src="{{$pedido_produto->produto->getCaminhoImagem()}}" alt style="width: 100%; height: 100%; min-width: 65px; min-height: 65px;">
                    </a>
                    <div style="display: flex; flex: 1 1 0; flex-direction: column; -webkit-box-pack: center; justify-content: center; width: 55%;">
                        <a href="pedido/{{$pedido_produto->produto_id}}" style="color: rgb(0, 0, 0); text-decoration: none; font-weight: 500; font-size: 14px; font-style: normal; max-width: 90%; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
                            <strong style="font-weight: normal; font-size: 13px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
                                {{$pedido_produto->produto->nome}}
                            </strong>
                        </a>
                        <span style="color: rgb(131, 131, 131); font-size: 13px;">
{{--                            Desconto --}}
                        </span>
                        <span style="color: rgb(131, 131, 131); font-size: 13px;">
                            @if(empty($pedido_produto->produto->desconto_porcento))
                                @php
                                    $valorProduto = $pedido_produto->produto->valor_uni
                                @endphp
                                <div class="price mt-1">R$ {{number_format($valorProduto, 2, ',', ' ')}}</div>
                            @else
                                @php
                                    $valorProduto = $pedido_produto->produto->valor_uni - ($pedido_produto->produto->valor_uni / 100 * $pedido_produto->produto->desconto_porcento)
                                @endphp
                                <div class="price mt-1"> De <s style="color: red">
                                        R$ {{number_format($pedido_produto->produto->valor_uni, 2, ',', ' ')}}</s> por
                                    R$ {{number_format($valorProduto, 2, ',', ' ')}}
                                </div>
                            @endif
                        </span>
                    </div>
                    <a href="#"
                       onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 0)"
                       class="tooltipped" data-position="right" data-delay="50"
                       data-tooltip="Retirar produto do carrinho?" style="height: 22px; width: auto; border-radius: 0; cursor: pointer;">
                        🗑
                    </a>
                </div>
                @php
                    $total_pedido += $pedido_produto->qtd * $valorProduto
                @endphp
            @endforeach
            <div style="display: flex; width: 100%; -webkit-box-pack: justify; justify-content: space-between; margin-top: 6px; margin-bottom: 24px; border-bottom: 4px solid rgb(250, 250, 250); padding-bottom: 24px;">
                <strong style="font-style: normal; font-weight: normal; font-size: 12px; line-height: 18px; color: rgb(131, 131, 131);">
                    Subtotal
                </strong>
                <span style="font-style: normal; font-weight: 500; font-size: 12px; line-height: 18px; text-align: right; color: rgb(0, 0, 0);">
                    R$ {{number_format($total_pedido, 2, ',', ' ')}}
                </span>
            </div>
            <div style="display: flex; width: 100%;">
                <form method="POST" >
                    {{ csrf_field() }}
                    <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                    <button type="submit" data-position="top" data-delay="50"
                        data-tooltip="Adquirir os produtos concluindo a compra?" style="display: flex; border: none; -webkit-box-align: center; align-items: center; position: relative; height: 50px; width: 100%; font-weight: 500; font-size: 14px; color: rgb(255, 255, 255); border-radius: 10px; -webkit-box-pack: center; justify-content: center; background: rgb(0, 0, 0); margin-bottom: 24px;">
                        Concluir compra
                    </button>
                </form>
            </div>
            <div style="display: flex; width: 100%;">
                <a href="{{ route('welcome') }}"> Voltar </a>
            </div>
        @empty
            <h5>Não há nenhum pedido no carrinho</h5>
        @endforelse
    </div>
</div>

<form id="form-remover-produto" method="POST" action="{{ route('carrinho.remover') }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <input type="hidden" name="pedido_id">
    <input type="hidden" name="produto_id">
    <input type="hidden" name="item">
</form>

<form id="form-adicionar-produto" method="POST" action="{{ route('carrinho.adicionar') }}">
    {{ csrf_field() }}
    <input type="hidden" name="id">
</form>

@include('site.layouts.footer')

</body>

<script type="text/javascript" src={{asset('js/carrinho.js')}}></script>

</html>



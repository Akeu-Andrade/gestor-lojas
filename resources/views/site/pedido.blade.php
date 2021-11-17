<?php
/**
 * @var Produto $produto
 * @var LojaConfig $loja
 */

use App\Business\Produto\Models\Produto;
use App\Business\Site\Models\LojaConfig;

?>
    <!DOCTYPE html>
@include('site.layouts.head')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>

@php($produto = $pedido->first())

<section class="section-content" style="min-height: 540px; padding-top: 30px">
    <div class="container">
        <div class="card lg-5">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $produto->getCaminhoImagem() }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <form method="POST" action="{{ route('carrinho.adicionar') }}">
                            @csrf
                            <h5 class="card-title">{{$produto->nome}}</h5>
                            <p class="card-text">{{$produto->descricao}}</p>
                            <p class="card-text"><small class="text-muted">Restam apenas: {{$produto->quantidade}}
                                    unidades</small></p>
                            @php($itens = explode(',', $produto->tamanho))
                            @foreach($itens as $item)
                                <button type="button" class="btn btn-outline-primary">{{$item}}</button>
                            @endforeach
                            <div style="padding-top: 20px; font-size: larger">
                                @if(empty($produto->desconto_porcento))
                                    <div class="price mt-1">R$ {{number_format($produto->valor_uni, 2, ',', ' ')}}</div>
                                @else
                                    <div class="price mt-1"> De <s style="color: red">
                                            R$ {{number_format($produto->valor_uni, 2, ',', ' ')}}</s> por
                                        R$ {{number_format($produto->valor_uni - ($produto->valor_uni / 100 * $produto->desconto_porcento), 2, ',', ' ')}}
                                    </div>
                                @endif
                            </div>
                            <input type="number" hidden name="id" value="{{$produto->id}}"/>
                            <div style="padding-top: 30px">
                                <button style="padding: 10px 50px 10px 50px" type="submit" class="btn btn-dark">
                                    Adicionar a sacola
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('site.layouts.footer')
</body>
</html>

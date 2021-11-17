<?php
/**
 * @var Produto $produto
 * @var LojaConfig $loja
 */

use App\Business\Produto\Models\Produto;
use App\Business\Site\Models\LojaConfig;

?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('site.layouts.head')

<body>
<!-- ========================= SECTION INTRO ========================= -->
<section class="section-intro padding-y-sm">
    <div class="container">
        <div class="intro-banner-wrap">
            <img src="{{empty($loja->imagem) ? 'assets/images/1.jpg' : $loja->getCaminhoImagem()}} "
                 class="img-fluid rounded">
        </div>
    </div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->
<!-- ========================= SECTION FEATURE ========================= -->
<section class="section-content padding-y-sm">
    <div class="container">
        <article class="card card-body">
            <div class="row">
                <div class="col-md-4">
                    <figure class="item-feature">
                        <span class="text-primary"><i class="fa fa-2x fa-truck"></i></span>
                        <figcaption class="pt-3">
                            <h5 class="title">Entrega rápida</h5>
                            <p> Você continua comprando em estabelecimentos que deixam você esperando? </p>
                        </figcaption>
                    </figure> <!-- iconbox // -->
                </div><!-- col // -->
                <div class="col-md-4">
                    <figure class="item-feature">
                        <span class="text-primary"><i class="fa fa-2x fa-rocket"></i></span>
                        <figcaption class="pt-3">
                            <h5 class="title"> Inovação </h5>
                            <p> Buscando o próximo nível sempre</p>
                        </figcaption>
                    </figure> <!-- iconbox // -->
                </div><!-- col // -->
                <div class="col-md-4">
                    <figure class="item-feature">
                        <span class="text-primary"><i class="fa fa-2x fa-lock"></i></span>
                        <figcaption class="pt-3">
                            <h5 class="title"> Seguro </h5>
                            <p> Privacidade, Segurança e Confinaça</p>
                        </figcaption>
                    </figure> <!-- iconbox // -->
                </div> <!-- col // -->
            </div>
        </article>
    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION FEATURE END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
    <div class="container">
        <header class="section-heading">
            <a href="/welcome?nomeLike=" class="btn btn-outline-primary float-right">Todos</a>
            <h3 class="section-title">New ✨</h3>
        </header><!-- sect-heading -->
        <div class="row">
            @foreach($novos as $produto)
                <div class="col-md-3">
                    <div href="pedido/{{$produto->id}}" class="card card-product-grid">
                        <a href="pedido/{{$produto->id}}" class="img-wrap"> <img src="{{$produto->getCaminhoImagem()}}"
                                                           alt={{$produto->nome}}> </a>
                        <figcaption class="info-wrap">
                            <a href="pedido/{{$produto->id}}" class="title">{{$produto->nome}}</a>
                            <div class="rating-wrap">
                                <span class="label-rating text-muted"> {{$produto->tamanho}}</span>
                            </div>
                            @if(empty($produto->desconto_porcento))
                                <div class="price mt-1">R$ {{number_format($produto->valor_uni, 2, ',', ' ')}}</div>
                            @else
                                <div class="price mt-1"> De <s style="color: red">
                                        R$ {{number_format($produto->valor_uni, 2, ',', ' ')}}</s> por
                                    R$ {{number_format($produto->valor_uni - ($produto->valor_uni / 100 * $produto->desconto_porcento), 2, ',', ' ')}}
                                </div>
                            @endif
                        </figcaption>
                    </div>
                </div>
            @endforeach
        </div> <!-- row.// -->
    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
    <div class="container">
        <header class="section-heading">
            <h3 class="section-title">Hot 🔥</h3>
        </header><!-- sect-heading -->
        <div class="row">
            @foreach($descontos as $produto)
                <div class="col-md-3">
                    <div href="pedido/{{$produto->id}}" class="card card-product-grid">
                        <a href="pedido/{{$produto->id}}" class="img-wrap"> <img src="{{$produto->getCaminhoImagem()}}"
                                                           alt={{$produto->nome}}> </a>
                        <figcaption class="info-wrap">
                            <a href="pedido/{{$produto->id}}" class="title">{{$produto->nome}}</a>
                            <div class="rating-wrap">
                                <span class="label-rating text-muted"> {{$produto->tamanho}}</span>
                            </div>
                            @if(empty($produto->desconto_porcento))
                                <div class="price mt-1">R$ {{number_format($produto->valor_uni, 2, ',', ' ')}}</div>
                            @else
                                <div class="price mt-1"> De <s style="color: red">
                                        R$ {{number_format($produto->valor_uni, 2, ',', ' ')}}</s> por
                                    R$ {{number_format($produto->valor_uni - ($produto->valor_uni / 100 * $produto->desconto_porcento), 2, ',', ' ')}}
                                </div>
                            @endif
                        </figcaption>
                    </div>
                </div>
            @endforeach
        </div> <!-- row.// -->
    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-bottom-sm">
    <div class="container">
        <header class="section-heading">
            <h3 class="section-title">Recomendados</h3>
        </header><!-- sect-heading -->
        <div class="row">
            @foreach($velhos as $produto)
                <div class="col-md-3">
                    <div href="pedido/{{$produto->id}}" class="card card-product-grid">
                        <a href="pedido/{{$produto->id}}" class="img-wrap"> <img src="{{$produto->getCaminhoImagem()}}"
                                                           alt={{$produto->nome}}> </a>
                        <figcaption class="info-wrap">
                            <a href="#" class="title">{{$produto->nome}}</a>
                            <div class="rating-wrap">
                                <span class="label-rating text-muted"> {{$produto->tamanho}}</span>
                            </div>
                            @if(empty($produto->desconto_porcento))
                                <div class="price mt-1">R$ {{number_format($produto->valor_uni, 2, ',', ' ')}}</div>
                            @else
                                <div class="price mt-1"> De <s style="color: red">
                                        R$ {{number_format($produto->valor_uni, 2, ',', ' ')}}</s> por
                                    R$ {{number_format($produto->valor_uni - ($produto->valor_uni / 100 * $produto->desconto_porcento), 2, ',', ' ')}}
                                </div>
                            @endif
                        </figcaption>
                    </div>
                </div>
            @endforeach
        </div> <!-- row.// -->
    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

@include('site.layouts.footer')

@yield ( 'scripts' )
@if( substr($isCarrinho, -9) == '/carrinho')
    <script>
        $(function() {

            $('#modalLoginForm').modal({
                show: true
            });
        });
    </script>
@endif
</body>
</html>

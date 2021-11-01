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
<header class="section-header">
    <section class="header-main border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-6">
                    <a href="/" class="brand-wrap">
                        <img width="50rm" src="{{$loja->getCaminhoLogo()}}" alt="logo"/>
                        {{$loja->nome}}
                    </a> <!-- brand-wrap.// -->
                </div>
                <div class="col-lg-6 col-12 col-sm-12">
                    <form action="{{  url('/welcome') }}" class="search" method="get">
                        <div class="input-group w-100">
                            <input type="text" name="nomeLike" class="form-control" placeholder="Search"
                                   value="{{Request::input('nomeLike')}}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form> <!-- search-wrap .end// -->
                </div> <!-- col.// -->
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="widgets-wrap float-md-right">
                        <div class="widget-header  mr-3">
                            <a href="#" class="icon icon-sm rounded-circle border"><i
                                    class="fa fa-shopping-cart"></i></a>
                            <span class="badge badge-pill badge-danger notify">0</span>
                        </div>
                        <div class="widget-header icontext">
                            <a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a>
                            <div class="text">
                                <span class="text-muted">Bem Vindo!</span>
                                <div>
                                    <a href="#">Sign in</a> |
                                    <a href="#"> Register</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- widgets-wrap.// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section> <!-- header-main .// -->
    <nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                    aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link pl-0" data-toggle="dropdown" href="#"><strong> <i class="fa fa-bars"></i>
                                Todas categorias </strong></a>
                        <div class="dropdown-menu">
                            @foreach($allCategorias as $categoria)
                                <a class="dropdown-item" href="#">{{$categoria->name}}</a>
                            @endforeach
                        </div>
                    </li>
                    @foreach($categorias as $categoria)
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{$categoria->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div> <!-- collapse .// -->
        </div> <!-- container .// -->
    </nav>
</header> <!-- section-header.// -->

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
                    <div href="#" class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="{{$produto->getCaminhoImagem()}}"
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
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
    <div class="container">
        <header class="section-heading">
            <h3 class="section-title">Hot 🔥</h3>
        </header><!-- sect-heading -->
        <div class="row">
            @foreach($descontos as $produto)
                <div class="col-md-3">
                    <div href="#" class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="{{$produto->getCaminhoImagem()}}"
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

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-bottom-sm">
    <div class="container">
        <header class="section-heading">
            <h3 class="section-title">Recomendados</h3>
        </header><!-- sect-heading -->
        <div class="row">
            @foreach($velhos as $produto)
                <div class="col-md-3">
                    <div href="#" class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="{{$produto->getCaminhoImagem()}}"
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
</body>
</html>

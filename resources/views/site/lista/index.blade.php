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
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$loja->nome}}</title>
    <link rel="icon" href={{empty($loja->logo) ? 'assets/images/items/1.jpg' : $loja->getCaminhoLogo()}} type="image/x-icon"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/ui.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">

    <link href="assets/css/all.min.css" rel="stylesheet">
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>

</head>
<body>

<header class="section-header">
    <section class="header-main border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-6">
                    <a href="/" class="brand-wrap">
                        <img width="50rm" src="{{$loja->getCaminhoLogo()}}" alt="logo" />
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
                            <a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></a>
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link pl-0" data-toggle="dropdown" href="#"><strong> <i class="fa fa-bars"></i> Todas categorias </strong></a>
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

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content" style="min-height: 550px">
    <div class="container">
        <header class="section-heading">
            <a href="/welcome?nomeLike=" class="btn btn-outline-primary float-right">Todos</a>
            <h3 class="section-title"> &nbsp; </h3>
        </header><!-- sect-heading -->
        <div class="row">
                @foreach($produtos as $produto)
                <div class="col-md-3">
                    <div href="#" class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="{{$produto->getCaminhoImagem()}}" alt={{$produto->nome}}> </a>
                        <figcaption class="info-wrap">
                            <a href="#" class="title">{{$produto->nome}}</a>
                            <div class="rating-wrap">
                                <span class="label-rating text-muted"> {{$produto->tamanho}}</span>
                            </div>
                            @if(empty($produto->desconto_porcento))
                                <div class="price mt-1">R$ {{number_format($produto->valor_uni, 2, ',', ' ')}}</div>
                            @else
                                <div class="price mt-1"> De <s style="color: red"> R$ {{number_format($produto->valor_uni, 2, ',', ' ')}}</s>  por  R$ {{number_format($produto->valor_uni - ($produto->valor_uni / 100 * $produto->desconto_porcento), 2, ',', ' ')}}</div>
                            @endif
                        </figcaption>
                    </div>
                </div>
                @endforeach
        </div> <!-- row.// -->
    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= FOOTER ========================= -->
<footer class="section-footer border-top bg">
    <div class="container">
        <section class="footer-top  padding-y">
            <div class="row">
{{--                <aside class="col-md col-6">--}}
{{--                    <h6 class="title">Marcas</h6>--}}
{{--                    <ul class="list-unstyled">--}}
{{--                        <li> <a href="#">Adidas</a></li>--}}
{{--                        <li> <a href="#">Puma</a></li>--}}
{{--                        <li> <a href="#">Reebok</a></li>--}}
{{--                        <li> <a href="#">Nike</a></li>--}}
{{--                    </ul>--}}
{{--                </aside>--}}
                <aside class="col-md col-6">
                    <h6 class="title">Company</h6>
                    <ul class="list-unstyled">
                        <li> <a href="#">About us</a></li>
                        <li> <a href="#">Career</a></li>
                        <li> <a href="#">Rules and terms</a></li>
                        <li> <a href="#">Sitemap</a></li>
                    </ul>
                </aside>
                <aside class="col-md col-6">
                    <h6 class="title">Minha conta</h6>
                    <ul class="list-unstyled">
                        <li> <a href="#"> Login </a></li>
                        <li> <a href="#"> Register </a></li>
                        <li> <a href="#"> Account Setting </a></li>
                    </ul>
                </aside>
                <aside class="col-md">
                    <h6 class="title">Social</h6>
                    <ul class="list-unstyled">
                        {!! !empty($loja->link_instagram) ? "<li><a href='$loja->link_instagram'> <i class='fab fa-instagram'></i> Instagram </a></li>" : '' !!}
                        {!! !empty($loja->link_facebook) ? "<li><a href='$loja->link_facebook'> <i class='fab fa-facebook'></i> Instagram </a></li>" : '' !!}
                        {!! !empty($loja->link_twitter) ? "<li><a href='$loja->link_twitter'> <i class='fab fa-twitter'></i> Instagram </a></li>" : '' !!}
                    </ul>
                </aside>
            </div> <!-- row.// -->
        </section>  <!-- footer-top.// -->
        <section class="footer-bottom row">
            <div class="col-md-2">
                <p class="text-muted"> {{now()->year}} {{$loja->nome}} </p>
            </div>
            <div class="col-md-8 text-md-center">
                <span  class="px-2"> {{$loja->endereco}} </span>
            </div>
            <div class="col-md-2 text-md-right text-muted">
                <i class="fab fa-lg fa-cc-visa"></i>
                <i class="fab fa-lg fa-cc-paypal"></i>
                <i class="fab fa-lg fa-cc-mastercard"></i>
            </div>
        </section>
    </div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->

</body>
</html>

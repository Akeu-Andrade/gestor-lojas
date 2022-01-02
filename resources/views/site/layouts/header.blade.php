
@if(!empty(Auth::id()))
    @include('site.auth.user')
    @include('site.auth.senha')
@else
    @include('site.auth.login')
    @include('site.auth.register')
@endif

<header class="section-header">
    <section class="header-main border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-6">
                    <a href="/" class="brand-wrap">
                        <img width="50rm" src="{{$loja->getCaminhoLogo()}}" alt="logo" />
{{--                        {{$loja->nome}}--}}
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
                            <a href="{{ route('carrinho.index') }}" class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></a>
                            <span class="badge badge-pill badge-danger notify">
                                <?php
                                    use App\Business\Produto\Models\PedidoProduto;use App\Business\Site\Enums\StatusPedidoEnum;

                                $qtd = PedidoProduto::
                                    whereStatus(StatusPedidoEnum::RE)
                                    ->join('produtos', 'produtos.id', '=', 'pedido_produtos.produto_id')
                                    ->get();
                                ?>
                                {{$qtd->count()}}
                            </span>
                        </div>
                        <div class="widget-header icontext">
                            <a href="" data-toggle="modal" class="icon icon-sm rounded-circle border"
                               data-target={{Auth::id() != null ? "#modalUserForm" : "#modalLoginForm"}}  >
                                <i class="fa fa-user"></i>
                            </a>
                            <div class="text">
                                <span class="text-muted">Bem Vindo!</span>
                                <div>
                                    @if(Auth::id() != null)
                                        <a href="" data-toggle="modal" data-target="#modalUserForm"> Meu Perfil </a>
                                    @else
                                        <a href="" data-toggle="modal" data-target="#modalLoginForm"> Entrar </a> |
                                        <a href="" data-toggle="modal" data-target="#modalRegisterForm"> Registre-se </a>
                                    @endif
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
                                <a class="dropdown-item" href="/welcome?categoria_id={{$categoria->id}}">{{$categoria->name}}</a>
                            @endforeach
                        </div>
                    </li>
                    @foreach($categorias as $categoria)
                        <li class="nav-item">
                            <a class="nav-link" href="/welcome?categoria_id={{$categoria->id}}">{{$categoria->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div> <!-- collapse .// -->
        </div> <!-- container .// -->
    </nav>
</header> <!-- section-header.// -->

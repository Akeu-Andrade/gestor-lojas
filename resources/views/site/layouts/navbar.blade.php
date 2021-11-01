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

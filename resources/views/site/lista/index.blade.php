<?php
/**
 * @var Produto  $produto
 * @var LengthAwarePaginator $produtos
 * @var LojaConfig $loja
 */

use App\Business\Produto\Models\Produto;
use App\Business\Site\Models\LojaConfig;
use Illuminate\Pagination\LengthAwarePaginator;

?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('site.layouts.head')
<body>
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
                    <div href="pedido/{{$produto->id}}" class="card card-product-grid">
                        <a href="pedido/{{$produto->id}}" class="img-wrap"> <img src="{{$produto->getCaminhoImagem()}}" alt={{$produto->nome}}> </a>
                        <figcaption class="info-wrap">
                            <a href="pedido/{{$produto->id}}" class="title">{{$produto->nome}}</a>
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
        @if($produtos->lastPage() > 1)
            <div class="col-md-2 col-xs-12" style="padding: 2px; margin-left: 10px">
                <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Página {{ $produtos->currentPage() }} de {{ $produtos->lastPage() }}</div>
            </div>
            <div class="col-md-8 col-12">
                <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                    <nav class="bd-example" aria-label="data-example-id">
                        <ul class="pagination">
                            <li class="page-item" style="margin: 2px">
                                <a class="btn btn-primary {{empty($produtos->previousPageUrl())? 'disabled' : ''}}"  href="{{$produtos->previousPageUrl()}}">Volte</a>
                            </li>
                            <li class="page-item" style="margin: 2px">
                                <a class="btn btn-primary {{empty($produtos->nextPageUrl()) ? 'disabled' : ''}}" href="{{$produtos->nextPageUrl()}}">Prox</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        @endif

    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

@include('site.layouts.footer')

</body>
</html>

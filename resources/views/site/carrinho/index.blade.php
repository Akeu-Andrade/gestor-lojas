<?php
/**
 * @var \Illuminate\Support\Collection $produtosCarrinho
 * @var \App\Site\Carrinho\ProdutoCarrinho $produtoCarrinho
 */
?>

@extends("site.layouts.page")


@section('content')
    <div class="container mt-5">

        @include("site.layouts.alerts")
        @include("site.layouts.verificacao_email")

        <h5 class="title">Carrinho</h5>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Carrinho</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <form action="{{url("solicitacaoorcamento/store")}}" method="post">
                    <table class="table table-striped">
                        <tbody>
                        @foreach($produtosCarrinho  as $produtoCarrinho)
                            @php($fotos = $produtoCarrinho->getProduto()->fotos)
                            @php($url = urlProduto($produtoCarrinho->getProduto()))
                            <tr>
                                <th scope="row" width="100">
                                    @if($fotos->count() > 0)
                                        <?php
                                        /**
                                         * @var \App\Business\Produto\Models\FotoProduto $foto
                                         */
                                        ?>
                                        @php($foto = $fotos->first())
                                        <a href="{{$url}}" title="{{$produtoCarrinho->getProduto()->nome}}">
                                            <img src="{{$foto->getCaminhoFoto()}}" alt="{{$produtoCarrinho->getProduto()->nome}}" class="img-thumbnail">
                                        </a>
                                    @endif
                                </th>
                                <td>
                                    <a href="{{$url}}">{{$produtoCarrinho->getProduto()->nome}}</a>
                                    @if(!$produtoCarrinho->getProduto()->isDisponivel())
                                        <br>
                                        <small class="text-danger">Produto indisponível</small>
                                    @endif
                                </td>
                                <td width="200">
                                    @if($produtoCarrinho->getProduto()->categoriaProduto->podeSelecionarQuantidade())
                                        <span>Quantidade</span>
                                        {{(new \App\View\Site\IncrementalField("quantidades[".$produtoCarrinho->getProduto()->id."]", $produtoCarrinho->getQuantidade()))->get()}}
                                    @endif
                                </td>
                                <td class="align-middle" width="100">
                                    <a href="{{url("carrinho/".$produtoCarrinho->getProduto()->id)}}"
                                       class="btn btn-outline-danger btn-sm"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="Remover o produto do carrinho">
                                        <i class="icofont-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        @if($produtosCarrinho->isEmpty())
                            <tr>
                                <td colspan="3" class="align-middle text-center">
                                    Seu carrinho está vazio
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>

                    @csrf
                    @if($produtosCarrinho->isNotEmpty())
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="observacao">Observação</label>
                                    <textarea name="observacao" class="form-control" id="observacao"></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-outline-primary" type="submit">
                            <i class="icofont-page"></i>
                            Solicitar orçamento
                        </button>
                    @endif
                </form>
            </div>
        </div>

        @include("site.destaque")
    </div>
@endsection

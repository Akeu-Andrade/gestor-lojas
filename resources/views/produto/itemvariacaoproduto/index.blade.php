@extends('layouts.app',
        ['activePage' => 'itemvariacaoproduto',
        'titlePage' => __('Item de variação do produto'),

            ]
        )

<?php
/**
 * @var LengthAwarePaginator $models
 */

use App\Business\Produto\Models\ItemVariacaoProduto;
use Illuminate\Pagination\LengthAwarePaginator;

?>
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Item de variação do produto</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    <div class="text-right">
                                        {!! \App\View\Buttons\ButtonNew::make('itemvariacaoprodutocontroller@create', route('itemvariacaoproduto.create'))->render() !!}
                                    </div>
                                    <?php
                                    /**
                                     * @var ItemVariacaoProduto $itemvariacaoproduto
                                     */
                                    ?>
                                    @foreach($models as $itemvariacaoproduto)
                                        <tr>
                                            <td>{{$itemvariacaoproduto->id}}</td>
                                            <td>{{$itemvariacaoproduto->nome}}</td>
                                            <td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    {!! \App\View\Buttons\ButtonInfo::make($itemvariacaoproduto)->render() !!}
                                                    {!! \App\View\Buttons\ButtonEdit::make('itemvariacaoprodutocontroller@edit', route('itemvariacaoproduto.edit', $itemvariacaoproduto->id))->render() !!}
                                                    {!! \App\View\Buttons\ButtonDelete::make('itemvariacaoprodutocontroller@destroy', route('itemvariacaoproduto.destroy', $itemvariacaoproduto->id))->render() !!}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-5 col-12">
                                        <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">
                                            Mostrando {{ $models->currentPage() }} a {{ $models->count() }}
                                            de {{ $models->total() }} entradas
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                            <nav class="bd-example" aria-label="data-example-id">
                                                <ul class="pagination">
                                                    <li class="page-item">
                                                        <a class="btn btn-primary {{empty($models->previousPageUrl())? 'disabled' : ''}}"  href="{{$models->previousPageUrl()}}">Volte</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="btn btn-primary {{empty($models->nextPageUrl()) ? 'disabled' : ''}}" href="{{$models->nextPageUrl()}}">Prox</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endpush

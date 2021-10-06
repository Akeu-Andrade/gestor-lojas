@extends('layouts.app',
        ['activePage' => 'produto',
        'titlePage' => __('Produto'),

            ]
        )

<?php
/**
 * @var LengthAwarePaginator $models
 */

use App\Business\Produto\Models\Produto;
use Illuminate\Pagination\LengthAwarePaginator;

?>
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Produtos</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Descricao</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    <div class="text-right">
                                        {!! \App\View\Buttons\ButtonNew::make('produtocontroller@create', route('produto.create'))->render() !!}
                                    </div>
                                    <?php
                                    /**
                                     * @var Produto $produto
                                     */
                                    ?>
                                    @foreach($models as $produto)
                                        <tr>
                                            <td>{{$produto->id}}</td>
                                            <td>{{$produto->nome}}</td>
                                            <td>{{$produto->descricao}}</td>
                                            <td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    {!! \App\View\Buttons\ButtonInfo::make($produto)->render() !!}
                                                    {!! \App\View\Buttons\ButtonEdit::make('produtocontroller@edit', route('produto.edit', $produto->id))->render() !!}
                                                    {!! \App\View\Buttons\ButtonDelete::make('produtocontroller@destroy', route('produto.destroy', $produto->id))->render() !!}
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

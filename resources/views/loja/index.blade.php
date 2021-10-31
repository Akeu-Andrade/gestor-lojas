@extends('layouts.app',
        ['activePage' => 'loja',
        'titlePage' => __('Loja'),

            ]
        )

<?php
/**
 * @var LengthAwarePaginator $models
 */

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
                            <h4 class="card-title ">Loja</h4>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th class="text-primary"> Ações </th>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                {!! \App\View\Buttons\ButtonInfo::make($models[0])->render() !!}
                                                {!! \App\View\Buttons\ButtonEdit::make('lojacontroller@edit', route('loja.edit', $models[0]->id))->render() !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary">Nome</th>
                                        <td>{{$models[0]->nome}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary"> Numero </th>
                                        <td> {{$models[0]->numero}} </td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary"> Whatsapp Link </th>
                                        <td> {{$models[0]->link_whatsapp}} </td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary"> Instagram </th>
                                        <td> {{$models[0]->link_instagram}} </td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary"> FaceBook </th>
                                        <td> {{$models[0]->link_facebook}} </td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary"> Twitter </th>
                                        <td> {{$models[0]->link_twitter}} </td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary"> Endereço </th>
                                        <td> {{$models[0]->endereco}} </td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary"> Logo </th>
                                        <td>
                                            @if (!empty($models[0]->getCaminhoLogo()))
                                                <img src="{{$models[0]->getCaminhoLogo()}}"
                                                     class="card-img-top" alt="Logo da loja">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary"> Banner </th>
                                        <td>
                                            @if (!empty($models[0]->getCaminhoImagem()))
                                                <img src="{{$models[0]->getCaminhoImagem()}}"
                                                     class="card-img-top" alt="Imagem do banner">
                                            @endif
                                        </td>
                                    </tr>
                                </table>
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

<?php
use App\Business\Seguranca\Models\Perfil;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @var LengthAwarePaginator $perfis
 */
?>

@extends('layouts.app', ['titlePage' => __('Perfils')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Perfils</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Observação</th>
                                        <th width="50"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <div class="text-right">
                                            {!! \App\View\Buttons\ButtonNew::make('perfilcontroller@create', route('perfil.create'))->render() !!}
                                        </div>
                                    <?php
                                    /**
                                     * @var Perfil $perfil
                                     */
                                    ?>
                                    @foreach($perfis as $perfil)
                                        <tr>
                                            <td>{{ $perfil->id }}</td>
                                            <td>{{ $perfil->nome }}</td>
                                            <td>{{ $perfil->observacao }}</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    {!! \App\View\Buttons\ButtonInfo::make($perfil, '')->render() !!}
                                                    {!! \App\View\Buttons\ButtonEdit::make('perfilcontroller@edit', route('perfil.edit', $perfil->id))->render() !!}
                                                    {!! \App\View\Buttons\ButtonDelete::make('perfilcontroller@destroy', route('perfil.destroy', $perfil->id))->render() !!}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row d-flex align-items-center">
                                <div class="col-md-5 col-12">
                                    <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">
                                        Mostrando {{ $perfis->currentPage() }} a {{ $perfis->count() }}
                                        de {{ $perfis->total() }} entradas
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                        {{ $perfis->links() }}
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


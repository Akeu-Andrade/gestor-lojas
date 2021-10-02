@extends('layouts.app',
        ['activePage' => 'categoria',
        'titlePage' => __('Categoria'),
            'config' => [
                'new' => [
                    'permission' => 'categoriacontroller@create',
                    'url' => route('categoria.create'),
                ],
                'back' => route('categoria.index'),
                'filter_action' => route('categoria.index'),
                ],
            ]
        )

<?php
/**
 * @var LengthAwarePaginator $models
 */

use App\Business\Produto\Models\Categoria;
use Illuminate\Pagination\LengthAwarePaginator;

?>
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Categorias</h4>
                            <p class="card-category"> Um produto só pode ser cadastrado com uma categoria <br> A
                                descrição não é obrigatoria</p>
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
                                    <?php
                                    /**
                                     * @var Categoria $categoria
                                     */
                                    ?>
                                    @foreach($models as $categoria)
                                        <tr>
                                            <td>{{$categoria->id}}</td>
                                            <td>{{$categoria->name}}</td>
                                            <td>{{$categoria->descricao}}</td>
                                            <td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    {!! \App\View\Buttons\ButtonInfo::make($categoria)->render() !!}
                                                    {!! \App\View\Buttons\ButtonEdit::make('categoriacontroller@edit', route('categoria.edit', $categoria->id))->render() !!}
                                                    {!! \App\View\Buttons\ButtonDelete::make('categoriacontroller@destroy', route('categoria.destroy', $categoria->id))->render() !!}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

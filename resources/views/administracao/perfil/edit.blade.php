<?php
/**
 * @var Perfil $perfil
 */

use App\Business\Seguranca\Models\Perfil;

?>

@extends('layouts.app', [
    'titlePage' => __('Produto Edit'),
    'config' => [
        'back' => route('produto.index'),
    ],
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="card card-plain">
                    <form method="post"  action="{{ route('perfil.store', $perfil->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body" style="padding: 30px">
                                @method('PATCH')
                                @include('administracao.perfil.form')
                                <button type="submit" class="btn btn-sm btn-primary">Atualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


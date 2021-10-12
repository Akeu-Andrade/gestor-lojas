<?php
/**
 * @var Produto $model
 */

use App\Business\Produto\Models\Produto;
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
                    <form method="post"  action="{{ route('produto.update', $model->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body" style="padding: 30px">
                                @method('PATCH')
                                @include('produto.form')
                                <button type="submit" class="btn btn-sm btn-primary">Atualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


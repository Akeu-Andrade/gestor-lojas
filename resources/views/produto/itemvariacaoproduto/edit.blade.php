<?php
/**
 * @var Categoria $model
 */

use App\Business\Produto\Models\Categoria;
?>

@extends('layouts.app', [
    'titlePage' => __('Item de variação do produto Edit'),
    'config' => [
        'back' => route('itemvariacaoproduto.index'),
    ],
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="card card-plain">
                    <form method="post"  action="{{ route('itemvariacaoproduto.update', $model->id) }}">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                @method('PATCH')
                                @include('produto.itemvariacaoproduto.form')
                                <button type="submit" class="btn btn-sm btn-primary">Atualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $("#status").change(verificarTemAcesso);
            verificarTemAcesso();

            function verificarTemAcesso()
            {
                $("#esc").hide();
                $("#esc").find(".input_required").prop("required", false).prop("disabled", true).val("");

                $("#status").hide();
                $("#status").find(".input_required").prop("required", false).prop("disabled", true).val("");
            }
        });
    </script>
@endsection

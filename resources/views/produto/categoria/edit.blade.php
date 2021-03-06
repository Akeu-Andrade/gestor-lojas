<?php
/**
 * @var Categoria $model
 */

use App\Business\Produto\Models\Categoria;
?>

@extends('layouts.app', [
    'titlePage' => __('Categoria Edit'),
    'config' => [
        'back' => route('categoria.index'),
    ],
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="card card-plain">
                    <form method="post"  action="{{ route('categoria.update', $model->id) }}">
                        @csrf
                        <div class="card">
                            <div class="card-body" style="padding: 30px">
                                @method('PATCH')
                                @include('produto.categoria.form')
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

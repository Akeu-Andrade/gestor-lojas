@extends('layouts.app', ['titlePage' => __('Perfils'),
'config' => [
        'back' => route('produto.index'),
    ],
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="card card-plain">
                    <form method="post" action="{{ route('perfil.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body" style="padding: 30px">
                                @include('administracao.perfil.form')
                                <div style="padding-top: 20px">
                                    <button type="submit" class="btn btn-sm btn-primary">Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection



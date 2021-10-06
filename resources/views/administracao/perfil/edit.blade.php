@extends('layouts.app', [
    'title' => 'Perfis',
    'subtile' => 'Edição',
    'config' => [
        'back' => route('perfil.index'),
    ],
])

@section('content')
    <form  method="post" action="{{ route('perfil.store', $perfil->id) }}">
        @csrf
        <div class="card">
            <div class="card-body">
                @method('PATCH')
                @include('administracao.perfil.form')
                <button type="submit" class="btn btn-sm btn-primary">Atualizar</button>
            </div>
        </div>
    </form>
@endsection

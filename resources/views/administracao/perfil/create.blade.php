@extends('layouts.app', ['titlePage' => __('Perfils')])

@section('content')
    <form  method="post" action="{{ route('perfil.store') }}">
        @csrf
        <div class="card">
            <div class="card-body">
                @include('administracao.perfil.form')
                <button type="submit" class="btn btn-sm btn-primary">Cadastrar</button>
            </div>
        </div>
    </form>
@endsection

@extends('layouts.app', [
    'titlePage' => __('Loja Edit'),
    'config' => [
        'back' => route('loja.index'),
    ],
])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="card card-plain">
                    <form method="post" action="{{ route('loja.update', $model->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body" style="padding: 30px">
                                @method('PATCH')
                                @include('loja.form')
                                <button type="submit" class="btn btn-sm btn-primary">Atualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


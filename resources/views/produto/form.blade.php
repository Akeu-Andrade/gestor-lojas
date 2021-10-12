<?php
/**
 * @var Produto $model
 */

use App\Business\Produto\Models\Produto;

?>
<div class="form-row" style="padding-bottom: 20px">
    <div class="col">
        <label for="nome">Nome <span style="font-size: 11px"> &nbsp;&nbsp;(Título do produto) </span></label>
        <input type="text" id="nome" name="nome" class="form-control" required
               value="{{$model->nome ?? old('nome')}}">
    </div>
    <div class="col">
        <label for="tamanho">Tamanho <span style="font-size: 11px"> &nbsp;&nbsp;(Tamanho desse produto. ex: P, M, GG) </span></label>
        <input type="text" id="tamanho" name="tamanho" class="form-control"
               value="{{$model->tamanho ?? old('tamanho')}}">
    </div>
</div>

<div class="col" style="padding-bottom: 20px">
    <label for="descricao">Descrição <span style="font-size: 11px"> &nbsp;&nbsp;(Descrição detalhada do produto) </span></label>
    <input type="text" id="descricao" name="descricao" class="form-control"
           value="{{$model->descricao ?? old('descricao')}}">
</div>

<div class="form-row" style="padding-bottom: 20px">
    <div class="col">
            <label for="quantidade">Estoque <span style="font-size: 11px"> &nbsp;&nbsp;(A quantidade disponível para venda) </span></label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" required
                   value="{{$model->quantidade ?? old('quantidade')}}">
    </div>
    <div class="col">
        <label for="desconto_porcento">Desconto <span style="font-size: 11px"> &nbsp;&nbsp;(Em %, defina o desconto no produto) </span></label>
        <input type="number" class="form-control" id="desconto_porcento" name="desconto_porcento"
               value="{{$model->desconto_porcento ?? old('desconto_porcento')}}">
    </div>
</div>

<div class="form-row" style="padding-bottom: 20px">
    <div class='col' style="padding-bottom: 20px">
        <label for="status_produto" id="esc">Ativo?<span style="font-size: 11px"> &nbsp;&nbsp;(Se o produto deve ser exibido) </span></label>
        <div id="status_produto" name="status_produto">
            {{ Form::select('status_produto', \App\Enums\SimNaoEnum::asSelectArray(),
              $model->status_produto ?? old('status_produto'), ['class' => 'desab form-control categoria_produto_load',
              'id' => 'status_produto']) }}
        </div>
    </div>
    <div class='col' style="padding-bottom: 20px">
        <label for="categoria_id" id="esc">Categoria</label>
        <div id="categoria_id" name="categoria_id">
            {{ Form::select('categoria_id', \App\Business\Produto\Models\Categoria::select(['name', 'id'])->get()->pluck('name', 'id'),
                !empty($model->categoria_id) ? $model->categoria_id : old('categoria_id'),
                ['class' => 'form-control', 'id' => 'categoria_id', 'required' => 'required',
                'placeholder' => 'Selecione uma opção']) }}
        </div>
    </div>
</div>

<div class="form-row" style="padding-bottom: 20px">
    <div class="col">
        <label for="valor_uni">Valor<span style="font-size: 11px"> &nbsp;&nbsp;(Valor do produto) </span></label>
        <input type="number" class="form-control" id="valor_uni" name="valor_uni" required
               value="{{$model->valor_uni ?? old('valor_uni')}}">
    </div>
    <div class="col">
        <label for="valor_entrega">Valor da entrega<span style="font-size: 11px"> &nbsp;&nbsp;(Só caso de possível entrega) </span></label>
        <input type="number" class="form-control" id="valor_entrega" name="valor_entrega"
               value="{{$model->valor_entrega ?? old('valor_entrega')}}">
    </div>
</div>

<div class="col">
    <label for="imagem">Imagem <span style="font-size: 11px"> &nbsp;&nbsp;(Sem a foto o produto não é exibido) </span></label>
    <div class="input-group mb-3">
        <input type="file" class="form-control" {{empty($model)? 'required' : ''}} name="imagem">
    </div>
</div>
@if(!empty($model))
    <div class="col-md-6">
        <div class="form-group box_foto">
            <label>Imagem Atual</label>
            <img src="{{$model->getCaminhoImagem()}}" class="img-fluid rounded">
            <input type="hidden" name="imagem_atual" id="imagem_atual" value="{{$model->imagem}}">
        </div>
    </div>
@endif



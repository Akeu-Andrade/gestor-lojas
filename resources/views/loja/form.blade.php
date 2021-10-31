<?php
/**
 * @var LojaConfig $model
 */

use App\Business\Site\Models\LojaConfig;

?>
<div class="form-row" style="padding-bottom: 20px">
    <div class="col">
        <label for="nome">Nome <span style="font-size: 11px"> &nbsp;&nbsp;(Nome do seu négocio) </span></label>
        <input type="text" id="nome" name="nome" class="form-control" required
               value="{{$model->nome ?? old('nome')}}">
    </div>
    <div class="col">
        <label for="numero">Numero <span
                style="font-size: 11px"> &nbsp;&nbsp;(Seu número de whatsapp da loja) </span></label>
        <input type="number" class="form-control" id="numero" name="numero"
               value="{{$model->numero ?? old('numero')}}">
    </div>
</div>

<div class="col" style="padding-bottom: 20px">
    <label for="link_whatsapp">Whatsapp Link <span
            style="font-size: 11px"> &nbsp;&nbsp;(Finalização da venda) </span></label>
    <input type="text" id="link_whatsapp" name="link_whatsapp" class="form-control"
           value="{{$model->link_whatsapp ?? old('link_whatsapp')}}">
</div>
<div class="col" style="padding-bottom: 20px">
    <label for="link_instagram"> Instagram <span
            style="font-size: 11px"> &nbsp;&nbsp;(Para o rodapé do site) </span></label>
    <input type="text" id="link_instagram" name="link_instagram" class="form-control"
           value="{{$model->link_instagram ?? old('link_instagram')}}">
</div>
<div class="col" style="padding-bottom: 20px">
    <label for="link_facebook"> Facebook <span
            style="font-size: 11px"> &nbsp;&nbsp;(Para o rodapé do site) </span></label>
    <input type="text" id="link_facebook" name="link_facebook" class="form-control"
           value="{{$model->link_facebook ?? old('link_facebook')}}">
</div>
<div class="col" style="padding-bottom: 20px">
    <label for="link_twitter"> Twitter <span
            style="font-size: 11px"> &nbsp;&nbsp;(Para o rodapé do site) </span></label>
    <input type="text" id="link_twitter" name="link_twitter" class="form-control"
           value="{{$model->link_twitter ?? old('link_twitter')}}">
</div>
<div class="col" style="padding-bottom: 20px">
    <label for="endereco"> Endereço <span style="font-size: 11px"> &nbsp;&nbsp;(Para o rodapé do site) </span></label>
    <input type="text" id="endereco" name="endereco" class="form-control"
           value="{{$model->endereco ?? old('endereco')}}">
</div>

<div class="col">
    <label for="imagem">Imagem <span
            style="font-size: 11px"> &nbsp;&nbsp;(Banner do site) </span></label>
    <div class="input-group mb-3">
        <input type="file" class="form-control" name="imagem">
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

<div class="col">
    <label for="logo"> Logo <span
            style="font-size: 11px"> &nbsp;&nbsp;(Logo da sua loja) </span></label>
    <div class="input-group mb-3">
        <input type="file" class="form-control" name="logo">
    </div>
</div>
@if(!empty($model))
    <div class="col-md-6">
        <div class="form-group box_foto">
            <label>Logo Atual</label>
            <img src="{{$model->getCaminhologo()}}" class="img-fluid rounded">
            <input type="hidden" name="logo_atual" id="logo_atual" value="{{$model->logo}}">
        </div>
    </div>
@endif



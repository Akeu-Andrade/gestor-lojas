<?php
/**
 * @var Produto $model
 */

use App\Business\Produto\Models\Produto;

?>

<div class="col" style="padding-bottom: 20px">
    <input type="text" id="nome" name="nome"
           class="form-control" placeholder="Nome" required
           value="{{$model->nome ?? old('nome')}}"
    >
</div>
<div class="col" style="padding-bottom: 20px">
    <input type="text" id="descricao" name="descricao"
           class="form-control" placeholder="Descricao"
           value="{{$model->descricao ?? old('descricao')}}"
    >
</div>


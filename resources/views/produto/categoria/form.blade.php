<?php
/**
 * @var Categoria $model
 */

use App\Business\Produto\Models\Categoria;

?>

<div class="col" style="padding-bottom: 20px">
    <input type="text" id="name" name="name"
           class="form-control" placeholder="Nome" required
           value="{{$model->name ?? old('name')}}"
    >
</div>
<div class="col" style="padding-bottom: 20px">
    <input type="text" id="descricao" name="descricao"
           class="form-control" placeholder="Descricao"
           value="{{$model->descricao ?? old('descricao')}}"
    >
</div>


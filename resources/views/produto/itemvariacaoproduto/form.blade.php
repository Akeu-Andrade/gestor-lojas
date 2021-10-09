<?php
/**
 * @var ItemVariacaoProduto $model
 */

use App\Business\Produto\Models\ItemVariacaoProduto;

?>

<div class="col" style="padding-bottom: 20px">
    <input type="text" id="nome" name="nome"
           class="form-control" placeholder="Nome" required
           value="{{$model->nome ?? old('nome')}}"
    >
</div>


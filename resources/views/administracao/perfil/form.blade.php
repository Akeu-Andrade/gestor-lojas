<?php

use App\Business\Relatorio\RelatorioAbstract;
use App\Business\Seguranca\Models\Perfil;
use App\Modules\Actions\GroupAction;
use App\Modules\Module;

/**
 * @var Perfil $perfil
 */
?>
<div class="form-row" style="padding-bottom: 20px">
    <div class="col">
        <label for="p_nome">Nome</label>
        <input type="text" name="nome" class="form-control form-control-sm" id="p_nome"
               value="{{$perfil->nome ?? old('nome')}}" required>
    </div>
    <div class="col">
        <label for="p_observacao">Observação</label>
        <input type="text" name="observacao" class="form-control form-control-sm" id="p_observacao"
               value="{{$perfil->observacao ?? old('observacao')}}">
    </div>
</div>
<div class="form-row" style="padding-bottom: 20px">
    <div class="col-md-12">
        @foreach($modulesComAcoes as $key => $module)
            @foreach($module->groupActions() as $y => $groupAction)
                <h4>
                    {{$groupAction->getName()}}
                </h4>
                @foreach($groupAction->getActions() as $action)
                        <p style="margin-left: 20px">
                            <input
                                name="actions[]"
                                id="{{$action->getAction()}}"
                                value="{{$action->getAction()}}" {{!empty($perfil) && $perfil->hasAction($action->getAction()) ? "checked" : ""}}
                                type="checkbox"
                                class="flat"> {{$action->getName()}}
                        </p>
                @endforeach
            @endforeach
        @endforeach
    </div>
</div>


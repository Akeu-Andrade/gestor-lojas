<?php

use App\Business\Seguranca\Models\Perfil;
use App\Modules\Actions\GroupAction;
use App\Modules\Module;
/**
 * @var Perfil $perfil
 */
?>
<div class="row">
    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
        <div class="form-group">
            <label for="p_nome">Nome</label>
            <input type="text" name="nome" class="form-control form-control-sm" id="p_nome"
                   value="{{$perfil->nome ?? old('nome')}}" required>
        </div>
    </div>
    <div class="col-md-8 col-sm-12 col-xs-12 form-group has-feedback">
        <div class="form-group">
            <label for="p_observacao">Observação</label>
            <input type="text" name="observacao" class="form-control form-control-sm" id="p_observacao"
                   value="{{$perfil->observacao ?? old('observacao')}}">
        </div>
    </div>
    <div class="col-md-12">
        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                @foreach($modulesComAcoes as $key => $module)
                    <li role="presentation" class="{{$key == 0 ? "active" : ""}}">
                        <a href="#tab_content{{ $key }}" id="tab_{{ $key }}" role="tab" data-toggle="tab" aria-expanded="true">{{$module->getName()}}</a>
                    </li>
                @endforeach
            </ul>
            <div id="myTabContent" class="tab-content">
                <?php
                /**
                 * @var Module $module
                 */
                ?>
                @foreach($modulesComAcoes as $i => $module)
                    <div role="tabpanel" class="tab-pane fade {{$i == 0 ? "active" : ""}} in" id="tab_content{{$i}}" aria-labelledby="tab_{{$i}}">
                        <?php
                        /**
                         * @var GroupAction $groupAction
                         */
                        ?>
                        @foreach($module->groupActions() as $y => $groupAction)
                            <div class="x_panel" @if($y > 0)style="height: auto;"@endif>
                                <div class="x_title">
                                    <h2><i class="fa fa-bars"></i> {{$groupAction->getName()}} <small>Configuração de permissão</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li>
                                            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content" @if($y > 0)style="display: none;"@endif>
                                    <div class="">
                                        <ul class="to_do">
                                            <?php
                                            /**
                                             * @var \App\Modules\Actions\Action $action
                                             */
                                            ?>
                                            @foreach($groupAction->getActions() as $action)
                                                <li>
                                                    <p>
                                                        <input
                                                            name="actions[]"
                                                            id="{{$action->getAction()}}"
                                                            value="{{$action->getAction()}}" {{!empty($perfil) && $perfil->hasAction($action->getAction()) ? "checked" : ""}}
                                                            type="checkbox"
                                                            class="flat"> {{$action->getName()}}
                                                    </p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if(!empty($module->getReports()) && $module->getReports()->isNotEmpty())
                            <div class="x_panel" style="height: auto;">
                                <div class="x_title">
                                    <h2><i class="fa fa-bars"></i> Relatórios <small>Configuração de permissão</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li>
                                            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content" style="display: none;">
                                    <div class="">
                                        <ul class="to_do">
                                            <?php
                                            /**
                                             * @var RelatorioAbstract $relatorio
                                             */
                                            ?>
                                            @foreach($module->getReports() as $y => $relatorio)
                                                <li>
                                                    <p>
                                                        <input
                                                            name="reports[]"
                                                            id="{{$relatorio->getId()}}"
                                                            value="{{strtolower($relatorio->getId())}}" {{!empty($perfil) && $perfil->hasReport($relatorio->getId()) ? "checked" : ""}}
                                                            type="checkbox"
                                                            class="flat"> {{$relatorio->getNome()}}
                                                    </p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @foreach($module->groupActionsApi() ?? [] as $y => $groupAction)
                            <div class="x_panel" style="height: auto;">
                                <div class="x_title">
                                    <h2><i class="fa fa-android"></i> {{$groupAction->getName()}} <small>Configuração de permissão para o aplicativo</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li>
                                            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content" style="display: none;">
                                    <div class="">
                                        <ul class="to_do">
                                            <?php
                                            /**
                                             * @var \App\Modules\Actions\Action $action
                                             */
                                            ?>
                                            @foreach($groupAction->getActions() as $action)
                                                <li>
                                                    <p>
                                                        <input
                                                            name="actions_api[]"
                                                            id="{{$action->getAction()}}"
                                                            value="{{$action->getAction()}}" {{!empty($perfil) && $perfil->hasActionApi($action->getAction()) ? "checked" : ""}}
                                                            type="checkbox"
                                                            class="flat"> {{$action->getName()}}
                                                    </p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

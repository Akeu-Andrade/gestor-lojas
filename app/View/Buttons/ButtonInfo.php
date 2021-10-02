<?php


namespace App\View\Buttons;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ButtonInfo extends Button
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * ButtonNew constructor.
     * @param Model $model
     * @param string $permission
     */
    public function __construct(Model $model, string $permission = 'baseController@showInfo')
    {
        $this->model = $model;

        parent::__construct($permission, "#", "info", Button::METHOD_GET, $this->getTitle(), ["btn-info"], $attributes = []);
    }

    /**
     * Função para gerar uma objeto do tipo ButtonNew
     *
     * @param Model $model
     * @param string $permission
     * @return ButtonInfo
     */
    public static function make(Model $model, string $permission = 'baseController@showInfo'): ButtonInfo
    {
        return new ButtonInfo($model, $permission);
    }

    public function getTitle(): string
    {
        /**
         * @var Carbon $created_at
         */
        $created_at = $this->model->created_at;
        /**
         * @var Carbon $updated_at
         */
        $updated_at = $this->model->updated_at;

        /**
         * @var User $userAlteracao
         */
        $userAlteracao = $this->model->userAlteracao;

        /**
         * @var User $userCadastro
         */
        $userCadastro = $this->model->userCadastro;

        $texto = "Cadastrado em {$created_at->format('d/m/Y')} às {$created_at->format('H:i')}";

        if(!empty($userCadastro))
        {
            $texto .= " por {$userCadastro->name}";
        }

        if(!empty($userAlteracao))
        {
            $texto .= " | Alterado em {$updated_at->format('d/m/Y')} às {$updated_at->format('H:i')} por {$userAlteracao->name}";
        }

        return $texto;
    }
}

<?php
namespace App\View\Buttons;

class ButtonDelete extends Button
{
    /**
     * ButtonDelete constructor.
     * @param string $permission
     * @param string $url
     * @param bool $withAjax
     */
    public function __construct(string $permission, string $url, bool $withAjax)
    {
        parent::__construct($permission, $url, 'fas fa-trash', $withAjax ? Button::METHOD_DELETE_WITH_AJAX : Button::METHOD_DELETE, "Excluir");
        $this->setMensagemConfirmation("Deseja realmente excluir?");
    }

    public static function make(string $permission, string $url, bool $withAjax = false): ButtonDelete
    {
        return new ButtonDelete($permission, $url, $withAjax);
    }
}

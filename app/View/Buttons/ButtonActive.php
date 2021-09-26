<?php


namespace App\View\Buttons;

class ButtonActive extends Button
{
    const ICON_ACTIVE = "icofont-circled-up";
    const ICON_DISABLE = "icofont-minus-circle";
    /**
     * ButtonActive constructor.
     * @param string $permission
     * @param string $url
     * @param bool $active
     */
    public function __construct(string $permission, string $url, bool $active)
    {
        $title = $active ? "Desabilitar" : "Ativar";
        $icon = $active ? self::ICON_DISABLE : self::ICON_ACTIVE;
        $url .= "?active=".(!$active ? 1 : 0);
        $className = $active ? 'btn-outline-warning' : 'btn-outline-success';

        parent::__construct($permission, $url, $icon, Button::METHOD_POST, $title, [$className]);
        $this->setMensagemConfirmation("Deseja realmente ".strtolower($title)."?");
    }

    /**
     * @param string $permission
     * @param string $url
     * @param bool $active
     * @return ButtonActive
     */
    public static  function make(string $permission, string $url, bool $active):ButtonActive
    {
        return new ButtonActive($permission, $url, $active);
    }
}

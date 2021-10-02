<?php
namespace App\View\Menu\Administracao;

use App\View\Menu\LinkMenu;

class PerfilLink extends LinkMenu
{

    public function getName(): string
    {
        return "Perfis";
    }

    public function getComponete(): string
    {
        return "perfils";
    }

    public function getIcon(): string
    {
        return "fas fa-unlock-alt";
    }

    public function getLink(): string
    {
        return route('perfil');
    }

    public function getPermission(): string
    {
        return "perfilcontroller@index";
    }
}

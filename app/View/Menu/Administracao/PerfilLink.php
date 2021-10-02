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
        return "people";
    }

    public function getLink(): string
    {
        return route('perfil.index');
    }

    public function getPermission(): string
    {
        return "perfilcontroller@index";
    }
}

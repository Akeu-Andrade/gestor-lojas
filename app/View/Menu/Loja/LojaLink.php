<?php

namespace App\View\Menu\Loja;

use App\View\Menu\LinkMenu;

class LojaLink extends LinkMenu
{
    public function getName(): String
    {
        return "Loja";
    }

    public function getComponete(): String
    {
        return 'loja';
    }

    public function getIcon(): String
    {
        return 'store';
    }

    public function getPermission(): String
    {
        return "lojacontroller@index";
    }

    public function getLink(): String
    {
        return route('loja.index');
    }
}

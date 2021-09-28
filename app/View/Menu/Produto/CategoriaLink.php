<?php

namespace App\View\Menu\Produto;

use App\View\Menu\LinkMenu;

class CategoriaLink extends LinkMenu
{
    public function getName(): String
    {
        return "Categoria";
    }

    public function getIcon(): String
    {
        return "fas fa-tag";
    }

    public function getPermission(): String
    {
        return "categoriacontroller@index";
    }

    public function getLink(): String
    {
        return route('categoria.index');
    }
}
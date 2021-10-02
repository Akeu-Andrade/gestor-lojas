<?php

namespace App\View\Menu\Produto;

use App\View\Menu\LinkMenu;

class CategoriaLink extends LinkMenu
{
    public function getName(): String
    {
        return "Categoria";
    }

    public function getComponete(): String
    {
        return 'categoria';
    }

    public function getIcon(): String
    {
        return 'category';
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

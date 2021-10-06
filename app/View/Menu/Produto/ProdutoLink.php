<?php

namespace App\View\Menu\Produto;

use App\View\Menu\LinkMenu;

class ProdutoLink extends LinkMenu
{
    public function getName(): String
    {
        return "Produto";
    }

    public function getComponete(): String
    {
        return 'produto';
    }

    public function getIcon(): String
    {
        return 'rule';
    }

    public function getPermission(): String
    {
        return "produtocontroller@index";
    }

    public function getLink(): String
    {
        return route('produto.index');
    }
}

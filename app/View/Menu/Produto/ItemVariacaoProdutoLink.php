<?php

namespace App\View\Menu\Produto;

use App\View\Menu\LinkMenu;

class ItemVariacaoProdutoLink extends LinkMenu
{
    public function getName(): String
    {
        return "Item de variação";
    }

    public function getComponete(): String
    {
        return 'itemvariacaoproduto';
    }

    public function getIcon(): String
    {
        return 'rule';
    }

    public function getPermission(): String
    {
        return "itemvariacaoprodutocontroller@index";
    }

    public function getLink(): String
    {
        return route('itemvariacaoproduto.index');
    }
}

<?php

namespace App\View\Menu\Produto;

use App\View\Menu\HeaderMenu;
use Illuminate\Database\Eloquent\Collection;

class ProdutoHeader extends HeaderMenu
{
    public function getName(): String
    {
        return "Produto";
    }

    public function getIcon(): String
    {
        return "fas fa-car";
    }

    /**
     * Retorna uma lista de menu
     **/
    public function getSubMenu(): Collection
    {
        $colecao = new Collection();
        $colecao->add(new CategoriaLink());
        return $colecao;
    }
}

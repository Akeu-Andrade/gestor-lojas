<?php
namespace App\View\Menu\Administracao;

use App\View\Menu\HeaderMenu;
use Illuminate\Database\Eloquent\Collection;

class AdministracaoHeader extends HeaderMenu
{

    public function getName(): string
    {
        return "Admin";
    }

    public function getIcon(): string
    {
        return "fas fa-user-shield";
    }

    public function getSubMenu(): Collection
    {
        $colecao = new Collection();
        $colecao->add(new PerfilLink());
        return $colecao;
    }
}

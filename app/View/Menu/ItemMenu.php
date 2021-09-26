<?php
namespace App\View\Menu;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface ItemMenu
{
    public function getName(): String;
    public function getIcon(): String;
    public function hasSubMenu(): Bool;
    /**
     * Retorna uma lista de menu
     **/
    public function getSubMenu(): Collection;
    public function getLink(): String;
    public function userHasPermission(User $user): bool;
    public function getPermission(): String;
}

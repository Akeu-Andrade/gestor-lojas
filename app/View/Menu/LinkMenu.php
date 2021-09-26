<?php
namespace App\View\Menu;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

abstract class LinkMenu implements ItemMenu
{
    public function hasSubMenu(): Bool
    {
        return false;
    }

    /**
     * @return Collection
     */
    public function getSubMenu(): Collection
    {
        return new Collection();
    }

    public function userHasPermission(User $user): bool
    {
        return $user->hasPermission($this->getPermission());
    }
}

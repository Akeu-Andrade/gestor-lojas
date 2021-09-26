<?php
namespace App\View\Menu;


use App\Models\User;

abstract class HeaderMenu implements ItemMenu
{
    public function hasSubMenu(): Bool
    {
        return true;
    }

    public function getPermission(): String
    {
        return "";
    }

    public function getLink(): String
    {
        return "";
    }

    public function userHasPermission(User $user): bool
    {
        /**
         * @var ItemMenu $submenu
         *
         */
        foreach ($this->getSubMenu() as $submenu) {
            if ($submenu->userHasPermission($user)) {
                return true;
            }
        }
        return false;
    }
}

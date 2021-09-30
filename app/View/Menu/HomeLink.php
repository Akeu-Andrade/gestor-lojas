<?php

namespace App\View\Menu;

class HomeLink extends LinkMenu
{
    public function getName(): String
    {
        return "Dashboard";
    }

    public function getIcon(): String
    {
        return "fas fa-tag";
    }

    public function getPermission(): String
    {
        return true;
           // "homecontroller@index";
    }

    public function getLink(): String
    {
        return route('home');
    }
}

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
        return "dashboard";
    }

    public function getPermission(): String
    {
        return "homecontroller@index";
    }

    public function getLink(): String
    {
        return route('home');
    }

    public function getComponete(): string
    {
        return 'home';
    }
}

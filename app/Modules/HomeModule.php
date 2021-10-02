<?php
namespace App\Modules;

use App\Http\Controllers\Web\Home\HomeController;
use Illuminate\Support\Facades\Route;

class HomeModule extends Module
{

    public function getName(): string
    {
        return "Home";
    }

    public function getIcon(): string
    {
        return "";
    }

    public function routeWeb(): void
    {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
    }
}

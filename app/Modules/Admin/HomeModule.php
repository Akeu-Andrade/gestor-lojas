<?php
namespace App\Modules\Admin;

use App\Http\Controllers\Web\Home\HomeController;
use App\Modules\Module;
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
        Route::get('/', [HomeController::class, 'index'])->name('home');
    }
}

<?php

namespace App\Modules;

use App\Business\Produto\Repository\Produto\ProdutoRepository;
use App\Business\Produto\Repository\Produto\ProdutoRepositoryInterface;
use App\Business\Site\Models\LojaConfig;
use App\Business\Site\Repository\LojaConfigRepositoryInterface;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Route;

class SiteModule extends Module
{
    public function getName(): string
    {
        return "Site";
    }

    public function getIcon(): string
    {
        return "fa fa-truck-pickup";
    }

    public function boot(Application $app)
    {
        $app->bind(
            ProdutoRepositoryInterface::class,
            ProdutoRepository::class
        );

        $app->bind(
            LojaConfigRepositoryInterface::class,
            LojaConfig::class
        );

    }

    public function routeWeb(): void
    {
        Route::get('/welcome', [SiteController::class, 'index'])->name('welcome');
    }

    public function routeApi(): void
    {
    }
}

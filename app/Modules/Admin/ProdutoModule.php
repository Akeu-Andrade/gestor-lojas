<?php

namespace App\Modules\Admin;

use App\Business\Produto\Repository\Categoria\CategoriaRepository;
use App\Business\Produto\Repository\Categoria\CategoriaRepositoryInterface;
use App\Business\Produto\Repository\Produto\ProdutoRepository;
use App\Business\Produto\Repository\Produto\ProdutoRepositoryInterface;
use App\Http\Controllers\Web\Produto\CategoriaController;
use App\Http\Controllers\Web\Produto\ProdutoController;
use App\Modules\Actions\GroupActionResource;
use App\Modules\Module;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class ProdutoModule extends Module
{
    public function getName(): string
    {
        return "Produto";
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
            CategoriaRepositoryInterface::class,
            CategoriaRepository::class
        );

    }

    public function groupActions(): ?Collection
    {
        $group = new Collection();

        $group->add(new GroupActionResource('produto', ProdutoController::class));
        $group->add(new GroupActionResource('Categoria', CategoriaController::class));

        return $group;
    }

    public function routeWeb(): void
    {
//        Route::resource('/produto', ProdutoController::class);
//        Route::resource('/produto/categoria', CategoriaController::class)->parameter('categoria', 'categoria');
    }

    public function routeApi(): void
    {
    }
}

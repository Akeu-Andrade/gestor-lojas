<?php

namespace App\Modules\Admin;

use App\Business\Produto\Repository\CategoriaProduto\CategoriaProdutoRepository;
use App\Business\Produto\Repository\CategoriaProduto\CategoriaProdutoRepositoryInterface;
use App\Http\Controllers\Web\Produto\CategoriaProdutoController;
use App\Modules\Actions\GroupActionResource;
use App\Modules\Module;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;

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
//        $app->bind(
//            ProdutoRepositoryInterface::class,
//            ProdutoRepository::class
//        );
        $app->bind(
            CategoriaProdutoRepositoryInterface::class,
            CategoriaProdutoRepository::class
        );
    }

    public function groupActions(): ?Collection
    {
        $group = new Collection();

//        $group->add(new GroupActionResource('produto', ProdutoController::class));
        $group->add(new GroupActionResource('Categoria', CategoriaProdutoController::class));

        return $group;
    }

    public function routeWeb(): void
    {
        Route::resource('/produto/categoria', CategoriaProdutoController::class)->parameter('categoria', 'categoriaProduto');
//        Route::resource('/produto', ProdutoController::class);
    }

    public function routeApi(): void
    {
    }
}

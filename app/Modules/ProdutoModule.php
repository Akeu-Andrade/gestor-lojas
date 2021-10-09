<?php

namespace App\Modules;

use App\Business\Produto\Repository\Categoria\CategoriaRepository;
use App\Business\Produto\Repository\Categoria\CategoriaRepositoryInterface;
use App\Business\Produto\Repository\ItemVariacaoProduto\ItemVariacaoProdutoRepository;
use App\Business\Produto\Repository\ItemVariacaoProduto\ItemVariacaoProdutoRepositoryInterface;
use App\Business\Produto\Repository\Produto\ProdutoRepository;
use App\Business\Produto\Repository\Produto\ProdutoRepositoryInterface;
use App\Http\Controllers\Web\Produto\CategoriaController;
use App\Http\Controllers\Web\Produto\ItemVariacaoProdutoController;
use App\Http\Controllers\Web\Produto\ProdutoController;
use App\Modules\Actions\GroupActionResource;
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
        $app->bind(
            ProdutoRepositoryInterface::class,
            ProdutoRepository::class
        );

        $app->bind(
            CategoriaRepositoryInterface::class,
            CategoriaRepository::class
        );

        $app->bind(
            ItemVariacaoProdutoRepositoryInterface::class,
            ItemVariacaoProdutoRepository::class
        );

    }

    public function groupActions(): ?Collection
    {
        $group = new Collection();

        $group->add(new GroupActionResource('produto', ProdutoController::class));
        $group->add(new GroupActionResource('categoria', CategoriaController::class));
        $group->add(new GroupActionResource('itemvariacaoproduto', ItemVariacaoProdutoController::class));

        return $group;
    }

    public function routeWeb(): void
    {
        Route::resource('/produto', ProdutoController::class);
        Route::resource('/categoria', CategoriaController::class)->parameter('categoria','categoria');
        Route::resource('/itemvariacaoproduto', ItemVariacaoProdutoController::class);

    }

    public function routeApi(): void
    {
    }
}

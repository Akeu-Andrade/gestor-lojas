<?php

namespace App\Modules;

use App\Business\Produto\Repository\Produto\ProdutoRepository;
use App\Business\Produto\Repository\Produto\ProdutoRepositoryInterface;
use App\Business\Site\Repository\PedidoRepositoryInterface;
use App\Business\Site\Repository\LojaConfigRepository;
use App\Business\Site\Repository\LojaConfigRepositoryInterface;
use App\Business\Site\Repository\PedidoRepository;
use App\Http\Controllers\Site\PedidoController;
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
            PedidoRepositoryInterface::class,
            PedidoRepository::class
        );

        $app->bind(
            LojaConfigRepositoryInterface::class,
            LojaConfigRepository::class
        );
    }

    public function routeWeb(): void
    {
        Route::get('/welcome', [SiteController::class, 'index'])->name('welcome');
        Route::get('/pedido/{produto}', [SiteController::class, 'show']);

        Route::get('/carrinho', [PedidoController::class, 'index'])->name('carrinho.index');
        Route::post('/carrinho/adicionar', [PedidoController::class, 'adicionar'])->name('carrinho.adicionar');
        Route::delete('/carrinho/remover', [PedidoController::class, 'remover'])->name('carrinho.remover');


        Route::get('/carrinho/adicionar', function() {
            return redirect()->route('index');
        });

    }

    public function routeApi(): void
    {
    }
}

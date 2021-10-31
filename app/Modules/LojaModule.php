<?php

namespace App\Modules;

use App\Business\Loja\Repository\Loja\LojaRepository;
use App\Business\Loja\Repository\Loja\LojaRepositoryInterface;
use App\Http\Controllers\Web\Loja\LojaController;
use App\Modules\Actions\GroupActionResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;

class LojaModule extends Module
{
    public function getName(): string
    {
        return "Loja";
    }

    public function getIcon(): string
    {
        return "fa fa-store";
    }

    public function boot(Application $app){
        $app->bind(
            LojaRepositoryInterface::class,
            LojaRepository::class
        );
    }

    public function groupActions(): ?Collection
    {
        $group = new Collection();

        $group->add(new GroupActionResource('loja', LojaController::class));

        return $group;
    }

    public function routeWeb(): void
    {
        Route::resource('/loja', LojaController::class);

    }

    public function routeApi(): void
    {
    }
}

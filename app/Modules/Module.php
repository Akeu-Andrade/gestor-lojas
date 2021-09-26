<?php
namespace App\Modules;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Collection;

abstract class Module
{
    /**
     * Nome do module
     *
     * @return String
     */
    abstract public function getName(): String;

    /**
     * Nome do Icon desse Module
     *
     * @return String
     */
    abstract public function getIcon(): String;

    /**
     * O "booted" método desse module.
     *
     * @param Application $app
     */
    public function boot(Application $app) {}

    /**
     * Defina a programação de comandos
     *
     * @param Schedule $schedule
     */
    public function schedule(Schedule $schedule) {}

    /**
     * @param Application $app
     */
    public function register(Application $app): void {}

    /**
     * Todas as rotas do Module são definidas nesse método
     * Essas rotas  são para sua interface da web
     */
    public function routeWeb(): void {}

    /**
     * Todas as rotas do Module para a API são definidas nesse método
     */
    public function routeApi(): void {}


    /**
     * Deve retornar uma collection de GroupAction
     * @return Collection|null
     */
    public function groupActions(): ?Collection
    {
        return null;
    }

    /**
     * Deve retornar uma collection de GroupAction
     * @return Collection|null
     */
    public function groupActionsApi(): ?Collection
    {
        return null;
    }
}

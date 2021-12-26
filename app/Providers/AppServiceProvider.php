<?php

namespace App\Providers;
use App\Modules\Module;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        if ($this->app->environment() !== 'production') {
//            $this->app->register(IdeHelperServiceProvider::class);
//
//            $this->app->singleton(FakerGenerator::class, function () {
//                return FakerFactory::create('pt_BR');
//            });
//        }

        foreach (config('modules') as $module) {
            /**
             * @var Module $objModule
             */
            $objModule = new $module();

            $objModule->register($this->app);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        \URL::forceScheme('https');

        foreach (config('modules') as $module) {
            /**
             * @var Module $objModule
             */
            $objModule = new $module();

            $objModule->boot($this->app);
        }
    }
}

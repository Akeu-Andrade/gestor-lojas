<?php


namespace App\Modules\Admin\Administracao;

use App\Business\Seguranca\Repository\PerfilRepository;
use App\Business\Seguranca\Repository\PerfilRepositoryInterface;
use App\Http\Controllers\Web\Seguranca\PerfilController;
use App\Modules\Actions\Action;
use App\Modules\Actions\GroupAction;
use App\Modules\Actions\GroupActionResource;
use App\Modules\Module;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;


class AdministracaoModule extends Module
{

    public function getName(): string
    {
        return "Administração";
    }

    public function getIcon(): string
    {
        return "fa fa-gear";
    }

    public function boot(Application $app)
    {

        $app->bind(
            PerfilRepositoryInterface::class,
            PerfilRepository::class
        );

    }

    public function routeWeb(): void
    {
        Route::prefix('administracao')->group(function () {
            Route::resource('perfil', PerfilController::class);
        });
    }

    /**
     * @return Collection|null
     */
    public function groupActions(): ?Collection
    {
        $groups = new Collection();
        $groups->add(new GroupActionResource("Perfil", PerfilController::class));

        $relatorioGroup = new GroupAction("Relatório configuração");
        $relatorioGroup->addAction(new Action('Visualizar', 'relatoriocontroller@index'));

        $groups->add($relatorioGroup);

        return $groups;
    }

    public function groupActionsApi(): ?Collection
    {
        $groups = new Collection();
        $groups->add(new GroupActionResource("Usuário", "perfilcontroller"));

        return $groups;
    }

}

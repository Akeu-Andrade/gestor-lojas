<?php


namespace App\Modules;

use App\Business\Seguranca\Repository\PerfilRepository;
use App\Business\Seguranca\Repository\PerfilRepositoryInterface;
use App\Http\Controllers\Web\Administracao\PerfilController;
use App\Modules\Actions\Action;
use App\Modules\Actions\GroupAction;
use App\Modules\Actions\GroupActionResource;
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
        return "🤵‍♂";
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
        Route::resource('perfil', PerfilController::class);
    }

    /**
     * @return Collection|null
     */
    public function groupActions(): ?Collection
    {
        $groups = new Collection();
        $groups->add(new GroupActionResource("Perfil", PerfilController::class));

        $logAcessoGroup = new GroupAction("Log Acesso");
        $logAcessoGroup->addAction(new Action('Visualizar', 'logacessocontroller@index'));

        $groups->add($logAcessoGroup);

        return $groups;
    }

    public function groupActionsApi(): ?Collection
    {
        $groups = new Collection();
        $groups->add(new GroupActionResource("Usuário", "perfilcontroller"));

        return $groups;
    }

}

<?php


namespace App\Http\Controllers\Web\Seguranca;

use App\Business\Seguranca\Models\Perfil;
use App\Business\Seguranca\Repository\PerfilRepositoryInterface;
use App\Business\Seguranca\Requests\SavePerfilRequest;
use App\Http\Controllers\BaseController;
use App\Modules\Module;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class PerfilController extends BaseController
{
    /**
     * UserController constructor.
     * @param PerfilRepositoryInterface $perfilRepository
     */
    public function __construct(PerfilRepositoryInterface $perfilRepository)
    {
        parent::__construct($perfilRepository);

        $this->setPages(10);
        $this->setFolderView("seguranca.perfil");
        $this->setName("Perfil");
        $this->setUrl("administracao/perfil");
    }


    /**
     * @param Request $request
     * @return Application|Factory|View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        return parent::indexBase($request, 'perfis');
    }

    /**
     * Método para pegar os modules com ações
     *
     * @return Collection
     */
    public function getModulesComAcoes(): Collection
    {
        $modules = config("modules");
        $modulesComAcoes = collect();

        /**
         * @var Module $module
         */
        foreach ($modules as $moduleClass) {
            $module = new $moduleClass();
            if ($module->groupActions() != null) {
                $modulesComAcoes->add($module);
            }
        }

        return $modulesComAcoes;
    }

    /**
     * Método para exibi o formulário de cadastro de um perfil
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view($this->getFolderView() . ".create", [
            'url' => $this->getUrl(),
            'modulesComAcoes' => $this->getModulesComAcoes(),
        ]);
    }

    /**
     * Método para cadastrar um perfil
     *
     * @param SavePerfilRequest $request
     * @return RedirectResponse
     */
    public function store(SavePerfilRequest $request): RedirectResponse
    {
        return parent::storeBase($request);
    }

    /**
     * Método para exibi o formulário de edição
     *
     * @param Perfil $perfil
     * @return Application|Factory|View
     */
    public function edit(Perfil $perfil)
    {
        return view($this->getFolderView() . ".edit", [
            'perfil' => $perfil,
            'modulesComAcoes' => $this->getModulesComAcoes(),
        ]);
    }

    /**
     * Método para atualizar um perfil
     *
     * @param SavePerfilRequest $request
     * @param Perfil $perfil
     * @return RedirectResponse
     */
    public function update(SavePerfilRequest $request, Perfil $perfil): RedirectResponse
    {
        return parent::updateBase($request, $perfil);
    }

    /**
     * Método para deletar um perfil
     *
     * @param Request $request
     * @param Perfil $perfil
     * @return RedirectResponse
     */
    public function destroy(Request $request, Perfil $perfil): RedirectResponse
    {
        return parent::destroyBase($request, $perfil);
    }
}

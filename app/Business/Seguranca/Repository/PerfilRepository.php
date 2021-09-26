<?php


namespace App\Business\Seguranca\Repository;

use App\Business\Repository;
use App\Business\Seguranca\Models\Perfil;
use App\Business\Seguranca\Requests\SavePerfilRequest;

/**
 * Class PerfilRepository
 * @package App\Business\Seguranca\Repository
 */
class PerfilRepository extends Repository implements PerfilRepositoryInterface
{
    /**
     * PerfilRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Perfil();
    }

    /**
     * @param SavePerfilRequest $request
     */
    public function store(SavePerfilRequest $request)
    {
        $this->create($this->tratarInput($request));
    }

    /**
     * @param int $id
     * @param SavePerfilRequest $request
     */
    public function replace(int $id, SavePerfilRequest $request)
    {
        $this->update($id, $this->tratarInput($request));
    }

    /**
     * @param SavePerfilRequest $request
     * @return array
     */
    private function tratarInput(SavePerfilRequest $request): array
    {
        $inputs = $request->all();
        $inputs["actions"] = json_encode($inputs["actions"] ?? []);
        $inputs["actions_api"] = json_encode($inputs["actions_api"] ?? []);
        $inputs["reports"] = json_encode($inputs["reports"] ?? []);
        return $inputs;
    }
}

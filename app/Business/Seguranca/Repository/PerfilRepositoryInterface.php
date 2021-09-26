<?php

namespace App\Business\Seguranca\Repository;

use App\Business\Seguranca\Requests\SavePerfilRequest;

/**
 * @method paginate(int $PAGES)
 * @method delete(mixed $id)
 */
interface PerfilRepositoryInterface
{
    public function store(SavePerfilRequest $request);

    public function replace(int $id, SavePerfilRequest $request);
}

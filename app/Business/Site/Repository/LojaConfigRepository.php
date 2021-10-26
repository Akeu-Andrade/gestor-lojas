<?php

namespace App\Business\Site\Repository;

use App\Business\Produto\Models\Produto;
use App\Business\Repository;
use App\Business\Site\Models\LojaConfig;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Ramsey\Uuid\Uuid;

class LojaConfigRepository extends Repository implements LojaConfigRepositoryInterface
{

    /**
     * ProdutoRepository constructor.
     */
    public function __construct()
    {
        $this->model = new LojaConfig();
    }

    /**
     * @param Request $request
     * @return mixed|void
     */
    public function store(Request $request): LojaConfig
    {
        /**
         * @var LojaConfig $lojaconfig
         */
        $lojaconfig = $this->create($request->request->all());
        $this->saveImagem($request->logo, $lojaconfig);
        $this->saveImagem($request->banner, $lojaconfig);

        return $lojaconfig;
    }

    /**
     * @param int $id
     * @param Request $request
     * @return mixed|void
     */
    public function replace(int $id, Request $request)
    {
        /**
         * @var LojaConfig $lojaconfig
         */

        $lojaconfig = $this->update($id, $request->all());
        if (!empty($request->logo)) {
            $this->saveImagem($request->logo, $lojaconfig);
        }

        if (!empty($request->banner)) {
            $this->saveImagem($request->banner, $lojaconfig);
        }

    }

    /**
     * @param UploadedFile $foto
     * @param Produto $produto
     */
    public function saveImagem(UploadedFile $foto, LojaConfig $lojaconfig): void
    {
        $name = Uuid::uuid4() . '.jpeg';
        \Storage::disk("public")->putFileAs(LojaConfig::DIR_FOTO, $foto, $name);
        $lojaconfig->logo = $name;
        $lojaconfig->touch();
    }

}

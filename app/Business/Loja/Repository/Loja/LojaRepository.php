<?php

namespace App\Business\Loja\Repository\Loja;

use App\Business\Repository;
use App\Business\Site\Models\LojaConfig;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Ramsey\Uuid\Uuid;

class LojaRepository extends Repository implements LojaRepositoryInterface
{

    /**
     * LojaRepository constructor.
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
         * @var LojaConfig $loja
         */
        $loja = $this->create($request->request->all());
        $this->saveImagem($request->imagem, $loja);
        $this->saveLogo($request->logo, $loja);

        return $loja;
    }

    /**
     * @param int $id
     * @param Request $request
     * @return mixed|void
     */
    public function replace(int $id, Request $request)
    {
        /**
         * @var LojaConfig $loja
         */

        $loja = $this->update($id, $request->all());
        if (!empty($request->imagem)) {
            $this->saveImagem($request->imagem, $loja);
        }
        if (!empty($request->logo)) {
            $this->saveLogo($request->logo, $loja);
        }

    }

    /**
     * @param UploadedFile $foto
     * @param LojaConfig $loja
     */
    public function saveImagem(UploadedFile $foto, LojaConfig $loja): void
    {
        $name = Uuid::uuid4() . '.jpeg';
        \Storage::disk("public")->putFileAs(LojaConfig::DIR_FOTO, $foto, $name);
        $loja->imagem = $name;
        $loja->touch();
    }

    /**
     * @param UploadedFile $foto
     * @param LojaConfig $loja
     */
    public function saveLogo(UploadedFile $foto, LojaConfig $loja): void
    {
        $name = Uuid::uuid4() . '.jpeg';
        \Storage::disk("public")->putFileAs(LojaConfig::DIR_FOTO, $foto, $name);
        $loja->logo = $name;
        $loja->touch();
    }

}

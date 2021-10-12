<?php

namespace App\Business\Produto\Repository\Produto;

use App\Business\Produto\Models\Produto;
use App\Business\Repository;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Ramsey\Uuid\Uuid;

class ProdutoRepository extends Repository implements ProdutoRepositoryInterface
{

    /**
     * ProdutoRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Produto();
    }

    /**
     * @param Request $request
     * @return mixed|void
     */
    public function store(Request $request): Produto
    {
        /**
         * @var Produto $produto
         */
        $produto = $this->create($request->request->all());
        $this->saveImagem($request->imagem, $produto);

        return $produto;
    }

    /**
     * @param int $id
     * @param Request $request
     * @return mixed|void
     */
    public function replace(int $id, Request $request)
    {
        /**
         * @var Produto $produto
         */

        $produto = $this->update($id, $request->all());
        if (!empty($request->imagem)) {
            $this->saveImagem($request->imagem, $produto);
        }

    }

    /**
     * @param UploadedFile $foto
     * @param Produto $produto
     */
    public function saveImagem(UploadedFile $foto, Produto $produto): void
    {
        $name = Uuid::uuid4() . '.jpeg';
        \Storage::disk("public")->putFileAs(Produto::DIR_FOTO, $foto, $name);
        $produto->imagem = $name;
        $produto->touch();
    }

}

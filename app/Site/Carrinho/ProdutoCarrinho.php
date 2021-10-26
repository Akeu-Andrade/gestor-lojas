<?php
namespace App\Site\Carrinho;

use App\Business\Produto\Models\Produto;

class ProdutoCarrinho
{
    /**
     * @var Produto $produto
     */
    private $produto;

    /**
     * @var int $quantidade
     */
    private $quantidade;

    /**
     * ProdutoCarrinho constructor.
     * @param Produto $carrinho
     * @param int $quantidade
     */
    public function __construct(Produto $carrinho, int $quantidade)
    {
        $this->produto = $carrinho;
        $this->quantidade = $quantidade;
    }

    /**
     * @return Produto
     */
    public function getProduto(): Produto
    {
        return $this->produto;
    }

    /**
     * @return int
     */
    public function getQuantidade(): int
    {
        return $this->quantidade;
    }
}

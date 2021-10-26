<?php
namespace App\Site\Carrinho;

use App\Business\Produto\Models\Produto;
use Illuminate\Session\SessionManager;
use Illuminate\Session\Store;
use Illuminate\Support\Collection;

class Carrinho
{

    /**
     * @var SessionManager|Store
     */
    private $session;

    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    public function adicionarProduto(Produto $produto, int $quantidade)
    {
        $carrinho = $this->getCarrinhoAtual();

        $carrinho[$produto->id] = $quantidade;

        $this->atualizarCarrinho($carrinho);
    }

    public function removerProduto(Produto $produto)
    {
        $carrinho = $this->getCarrinhoAtual();

        unset($carrinho[$produto->id]);

        $this->atualizarCarrinho($carrinho);
    }

    public function limpar()
    {
        $this->atualizarCarrinho([]);
    }

    /**
     * @return Collection
     */
    public function getProdutos(): Collection
    {
        $produtos = new Collection();

        $carrinho = $this->getCarrinhoAtual();
        foreach ($carrinho as $produtoId => $quantidade) {
            /**
             * @var Produto $produto
             */
            $produto = Produto::find($produtoId);
            if ($produto == null) {
                continue;
            }

            $produtos->add(new ProdutoCarrinho($produto, $quantidade));
        }

        return $produtos;
    }

    /**
     * @return array
     */
    private function getCarrinhoAtual()
    {
        $carrinho = $this->session->get("carrinho");
        if (empty($carrinho)) {
            $carrinho = [];
        }
        return $carrinho;
    }

    private function atualizarCarrinho(array $carrinho)
    {
        $this->session->put("carrinho", $carrinho);
    }
}

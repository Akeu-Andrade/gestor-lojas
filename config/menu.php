<?php

use App\View\Menu\Administracao\PerfilLink;
use App\View\Menu\HomeLink;
use App\View\Menu\Produto\CategoriaLink;
use App\View\Menu\Produto\ItemVariacaoProdutoLink;
use App\View\Menu\Produto\ProdutoLink;

return [
    "headers" => [
        HomeLink::class,
        ProdutoLink::class,
        CategoriaLink::class,
//        ItemVariacaoProdutoLink::class,
        PerfilLink::class
    ]
];

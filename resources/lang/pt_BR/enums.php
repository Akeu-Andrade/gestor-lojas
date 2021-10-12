<?php

use App\Business\Produto\Enums\StatusCompraEnum;

return [
    StatusCompraEnum::class => [
        StatusCompraEnum::CARRINHO => "Carrinho",
        StatusCompraEnum::COMPRADO => "Comprado",
        StatusCompraEnum::PREPARACAO => "Em preparação",
        StatusCompraEnum::CANCELADO => "Cancelado"
    ],
];

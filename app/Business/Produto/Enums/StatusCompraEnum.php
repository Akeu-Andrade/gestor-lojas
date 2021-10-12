<?php


namespace App\Business\Produto\Enums;


use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

class StatusCompraEnum extends Enum implements LocalizedEnum
{
    const CARRINHO = 1;
    const COMPRADO = 2;
    const PREPARACAO = 3;
    const CANCELADO = 4;

    /**
     * Método para retonar a cor do status
     *
     * @param string $key
     * @return string
     */
    public function getBackground(): string
    {
        switch ($this->value)
        {
            case self::CARRINHO:
                return "default";
            case self::COMPRADO:
                return "primary";
            case self::PREPARACAO:
                return "warning";
            case self::CANCELADO:
                return "danger";
            default:
                return "";
        }
    }

}

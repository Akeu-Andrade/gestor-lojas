<?php


namespace App\Business\Seguranca\Enums;


use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

class MethodEnum extends Enum implements LocalizedEnum
{
    const GET = "GET";
    const PATCH = "PATCH";
    const POST = "POST";
    const DELETE = "DELETE";

    /**
     * Método para pegar o nome do style para os buttons
     *
     * @return string
     */
    public function getCor(): string
    {
        switch ($this->value){
            case self::GET: {
                return 'success';
            }
            case self::POST: {
                return 'primary';
            }
            case self::DELETE: {
                return 'danger';
            }
            case self::PATCH: {
                return 'warning';
            }
            default: {
                return '';
            }
        }
    }
}

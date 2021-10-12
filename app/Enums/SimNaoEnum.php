<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class SimNaoEnum extends Enum implements LocalizedEnum
{
    const Sim = 1;
    const Nao = 2;

    public static function getClasseBadge(int $status): string
    {
        switch ($status) {
            case SimNaoEnum::Sim:
                return "success";
                break;
            case SimNaoEnum::Nao:
                return "danger";
                break;
            default:
                return "";
                break;
        }
    }
}

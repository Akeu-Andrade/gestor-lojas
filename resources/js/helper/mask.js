"use strict";

import { createMask, createAllMaskFromDataInput } from './MaskHelper'

const createMasks = () => {
    /**
     * Mark: Para o número de uma OS
     */
    createMask(document.querySelector('.mask-numero-os'), {
        mask: '***00000000',
        prepare: function (str) {
            return str.toUpperCase();
        },
    });

    /**
     * Mark: Para o código do local
     */
    createMask(document.querySelector('.mask-codigo-local'), {
        mask: '000.000.000',
    });

    /**
     * Mark: Para o código do local
     */
    createMask(document.querySelector('.mask-codigo-supervisor'), {
        mask: '0000',
    });

    /**
     * Mark: Para o código do local
     */
    createMask(document.querySelector('.mask-id'), {
        mask: '00000',
    });

    /**
     * Função para criar um mask pelo data-mask
     */
    createAllMaskFromDataInput();
}

export { createMasks }

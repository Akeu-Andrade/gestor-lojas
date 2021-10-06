"use strict";

import IMask from 'imask';

const createMask = (selectors, opts) => {
    /**
     * Mark: Para o número de uma OS
     */
    try{
        return IMask(selectors, opts);
    } catch (e) {

        if(e.message !== 'el is null')
        {
            console.log("MaskHelper: O elemento é null");
        }
        return null;
    }
}

const createAllMaskFromDataInput = () => {
    const elementos = document.querySelectorAll('[data-mask]');
    Array.from(elementos).map(item => {
       createMask(item, {
           mask: item.dataset.mask,
       })
    });
}

export { createMask, createAllMaskFromDataInput }

"use strict";

import {enableAutoComplete} from "./autocomplete";

class Modal {

    constructor(id) {
        this.id = id;
    }

    openUrl(url) {
        this.url = url;
        const modal = document.querySelector(this.id);

        axios.get(this.url).then(r => {
            Array.from(document.querySelectorAll('script[ismodelscript]')).map((item) => {
                item.remove()
            })

            /**
             * Atualizando as informações da modal
             */
            modal.querySelector(".modal-title").innerHTML = r.data.title;
            modal.querySelector(".modal-body").innerHTML = '';

            const modalBody = modal.querySelector(".modal-body");

            modalBody.insertAdjacentHTML("beforeend", r.data.body);
            let scripts = modalBody.getElementsByTagName("script");
            while (scripts.length) {
                var script = scripts[0];
                script.parentNode.removeChild(script);
                var newScript = document.createElement("script");
                if (script.src) {
                    newScript.src = script.src;
                } else if (script.textContent) {
                    newScript.textContent = script.textContent;
                } else if (script.innerText) {
                    newScript.innerText = script.innerText;
                }
                newScript.setAttribute('isModelScript', 'true')
                document.body.appendChild(newScript);
            }

            $(this.id).modal({});
            enableAutoComplete();

        }).catch(error => {
            console.error(error);
            swal("Ocorreu um erro inesperado ao abrir a modal");
        });
    }

    refresh() {
        this.openUrl(this.url);
    }
}

const modalAjax = new Modal("#modal_open_ajax");
const modalAjaxAuxiliar = new Modal("#modal_auxiliar_open_ajax");
const modalAjaxSmall = new Modal("#modal_sm_open_ajax");

/**
 * Método para inicializar eventos da modal
 */
const inicializarModal = () => {
    /**
     * Isso está em JQuery porque não deu para fazer a alteração para o Javascript nativo
     */
    $('.modal').on('hidden.bs.modal', function (e) {
        /**
         * Ao fechar um modal, se houver outro modal aberto o body receberá a classe modal-open para não perder referência do scroll
         */
        if ($('.modal:visible').length) {
            $('body').addClass('modal-open');
        }
    });

    /**
     * Loop por todas as class open_modal_ajax
     */
    activeModalEvent(".open_modal_ajax", openModalAjax);
    activeModalEvent(".open_modal_auxiliar_ajax", openModalAuxiliarAjax);
    activeModalEvent(".open_modal_sm_ajax", openModalSmAjax);
}

/**
 * Loop para ativar o evento do click
 */
const activeModalEvent = (select, action) => {
    document.querySelectorAll(select).forEach(item => {
        item.addEventListener('click', event => {
            action(event, item);
        })
    });
}

/**
 * Método para abrir uma modal
 *
 * @param event
 * @param elemento
 */
const openModalAjax = (event, elemento) => {
    event.preventDefault();
    const url = elemento.getAttribute("open-modal");
    modalAjax.openUrl(url);
}

/**
 * Método para abrir uma modal small
 *
 * @param event
 * @param elemento
 */
const openModalSmAjax = (event, elemento) => {
    event.preventDefault();
    const url = elemento.getAttribute("open-modal");
    modalAjaxSmall.openUrl(url);
}

/**
 * Método para abrir uma modal small
 *
 * @param event
 * @param elemento
 */
const openModalAuxiliarAjax = (event, elemento) => {
    event.preventDefault();
    const url = elemento.getAttribute("open-modal");
    modalAjaxAuxiliar.openUrl(url);
}

export { Modal, inicializarModal };

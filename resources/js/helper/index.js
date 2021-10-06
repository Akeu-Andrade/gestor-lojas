"use strict";
import {inicializarModal} from "./modal";
import {createMasks} from './mask';
import {enableAutoComplete} from "./autocomplete";

export default {
    onLoad(event){
        inicializarModal();
        createMasks();
        enableAutoComplete();
    },
    confirmationForm(form, title, text) {
        return swal({
            title: title,
            text: text,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Aguarde um momento!", {
                        icon: "success",
                    });

                    return form.submit();
                }
            });
    },
    confirmationDeleteWithAjax(url, title, text){
        return swal({
            title: title,
            text: text,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Aguarde um momento!", {
                        icon: "success",
                    });

                    return axios.delete(url).then(() => {
                        document.location.reload(true);
                    }).catch(error => {
                        swal(error.message);
                    });
                }
            });
    }
};

"use strict";

import SlimSelect from "slim-select";

const enableAutoComplete = () => {
    document.querySelectorAll('select.autocomplete').forEach(select => {
        new SlimSelect({
            select: select,
            searchPlaceholder: 'Pesquisar',
            placeholder: "Selecione uma opção",
        })
    });
}

export { enableAutoComplete }

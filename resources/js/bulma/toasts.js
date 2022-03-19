import * as bulmaToast from 'bulma-toast'
//import {toast} from 'bulma-toast'

function createToast(message, type="is-success") {
    bulmaToast.toast({
        message: message,
        type: type,
        dismissible: true,
        animate: { in: 'fadeInDown', out: 'fadeOutDown' },
        closeOnClick: true,
        duration: 2500,
    })
}

export {createToast};


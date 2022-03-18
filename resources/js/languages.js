import Api from "./apis";
import {toast} from 'bulma-toast'

try {
    var deleteButton =  document.querySelectorAll(".delete-lang");

    var method = "LanguagesUser";

    //TODO: keep working on this shit, add create functionality, add edit

    [].forEach.call(deleteButton, function(elem) {
        elem.addEventListener('click', function(e) {
            let id = this.getAttribute("data-id");
            Api.delete(method, id)
                .then((e)=>{
                    console.log(e)
                    if (e.data.status === "success") {
                        document.querySelector("#language-panel-"+id).remove()
                        toast({
                            message: "Deleted",
                            type: 'is-success',
                            dismissible: true,
                            animate: { in: 'fadeIn', out: 'fadeOut' },
                        })
                    }
                })
                .catch((e)=>{
                    toast({
                        message: e.message,
                        type: 'is-danger',
                        dismissible: true,
                        animate: { in: 'fadeIn', out: 'fadeOut' },
                    })
                })
        }, false);
    });

    var addButton = document.querySelector("#addLanguage");
    if (addButton !== null) {
        addButton.addEventListener("click", (e)=>{
            console.log(e)

        })
    }
} catch (e) {}

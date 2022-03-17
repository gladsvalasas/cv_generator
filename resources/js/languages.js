import Api from "./apis";

try {
    var deleteButton =  document.querySelectorAll(".delete-lang");

    var method = "LanguagesUser";

    //TODO: keep working on this shit, add create functionality, add edit

    [].forEach.call(deleteButton, function(elem) {
        elem.addEventListener('click', function(e) {
            let id = this.getAttribute("data-id");
            console.log(this);
            alert(id);
            Api.delete(method, id).then((e)=>{
                console.log(e);
            })
        }, false);
    });
} catch (e) {}

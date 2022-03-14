import {strToBool} from "./functions";

const editButton = document.querySelector("#openEdit");

if (editButton !== null) {
    editButton.onclick = (event) => {
        event.preventDefault();
        let form = document.querySelector("form[name=editProfile]");
        let isAct = strToBool(document.querySelector("#openEdit").getAttribute("data-active"))

        console.log(isAct)

        form.querySelectorAll("input[name]").forEach((e) => {
            if (e.name !== "_token" && e.name !== "submitEdit") {
                e.disabled = isAct;
                //e.setAttribute("disabled");
                console.log(e.disabled)

            }
        })

        document.querySelector("textarea[name=about]").disabled = isAct;
        document.querySelector("select[name=country]").disabled = isAct;
        document.querySelector("input[type=submit]").disabled = isAct;

        let dis = "true";
        if (isAct) { // сука сраный джаваскрипт блять, ебись ты лошадью сука
            dis = "false";
        }

        document.querySelector("#openEdit").removeAttribute("data-active")
        document.querySelector("#openEdit").setAttribute("data-active", dis)
    }
}

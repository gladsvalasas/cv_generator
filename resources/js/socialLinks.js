import {addEvent, deleteEvent, updateEvent} from "./baseEvents";
import {resetAttribute, SKILLS_LEVEL_CLASSES, strToBool} from "./functions";
import {createToast} from "./bulma/toasts";

try {
    var method = "SocialLinks";

    function resetBlockDefault(id) {
        resetAttribute(document.querySelector("#editLink-"+id), "data-edit", "false");
        let buttonUpdate = document.querySelector("#updateLink-"+id);
        buttonUpdate.style.display = "none";
        buttonUpdate.disabled = true;
        document.querySelector("#linkName-"+id).disabled = true;
        document.querySelector("#linkLink-"+id).disabled = true;
    }

    function deleteClickEvent(e) {
        let id = this.getAttribute("data-id");
        deleteEvent(method, id, (e)=>{
            document.querySelector("#link-element-"+id).remove()
        })
    }

    function updateClickEvent(e) {
        let id = this.getAttribute("data-id");
        let linkName = document.querySelector("#linkName-"+id);
        let linkValue = document.querySelector("#linkLink-"+id);

        let linkData = new FormData();

        linkData.append("name", linkName.value);
        linkData.append("link", linkValue.value);
        this.disabled = true;

        updateEvent(method, linkData, id, (e)=>{
            linkName.value = e.data.data.newFields.name;
            linkValue.value = e.data.data.newFields.link;
            resetBlockDefault(id);
            createToast("Updated!");
        })
    }

    function editClickEvent(e) {
        let id = this.getAttribute("data-id");
        let isEdit = strToBool(this.getAttribute("data-edit"));
        let buttonUpdate = document.querySelector("#updateLink-"+id);
        buttonUpdate.style.display = isEdit ? "none" : "block";
        buttonUpdate.disabled = document.querySelector("#linkName-"+id).disabled = document.querySelector("#linkLink-"+id).disabled = isEdit;

        resetAttribute(this, "data-edit", !isEdit)
    }

    window.addEventListener("DOMContentLoaded",() => {

        [].forEach.call(document.querySelectorAll(".deleteLink"), (elem)=>{
            elem.addEventListener("click", deleteClickEvent);
        });

        [].forEach.call(document.querySelectorAll(".editLink"), (elem)=>{
            elem.addEventListener("click", editClickEvent);
        });

        [].forEach.call(document.querySelectorAll(".updateLink"), (elem)=>{
            elem.addEventListener("click", updateClickEvent);
        })

        var addLink = document.querySelector("#addLink");

        if (addLink !== null) {
            addLink.addEventListener("click", (e)=>{

            })
        }

    });

} catch (e) {}

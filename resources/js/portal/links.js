import {addEvent, allEvent, deleteEvent, updateEvent} from "../baseEvents";
import {resetAttribute, SKILLS_LEVEL_CLASSES, strToBool} from "../functions";
import {createToast} from "../bulma/toasts";
import Preloader from "../components/preloader";

try {
    const method = "SocialLinks";
    var preloader = new Preloader();

    function startup(data) {
        var template = document.querySelector('#linkTemplate').content.cloneNode(true);
        template.querySelector("#link-element-ID").setAttribute("id", "link-element-"+data.id);

        let nameElem = template.querySelector("#linkName-ID");
        nameElem.setAttribute("id", "linkName-"+data.id);
        nameElem.value = data.name;

        let linkValue = template.querySelector("#linkLink-ID");
        linkValue.setAttribute("id", "linkLink-"+data.id);
        linkValue.value = data.link;

        let deleteButton = template.querySelector(".deleteLink");
        deleteButton.setAttribute("data-id", data.id);

        let editButton = template.querySelector("#editLink-ID");
        editButton.setAttribute("id", "editLink-"+data.id);
        editButton.setAttribute("data-id", data.id);

        let updateButton = template.querySelector("#updateLink-ID");
        updateButton.setAttribute("id", "updateLink-"+data.id);
        updateButton.setAttribute("data-id", data.id);

        deleteButton.addEventListener("click", deleteClickEvent);
        editButton.addEventListener("click", editClickEvent);
        updateButton.addEventListener("click", updateClickEvent);

        document.querySelector("#socialLinksList").appendChild(template);
    }


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

    window.onload = (e) => {
        allEvent(method, (e)=>{
            e.data.data.forEach((link)=>{
                startup(link);
            })
            preloader.dispatch();
        })
    }

    window.addEventListener("DOMContentLoaded",() => {

        preloader.render("#socialLinksList");

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
                let name = document.querySelector("#addLinkName");
                let link = document.querySelector("#addLinkLink");

                let linksData = new FormData();
                linksData.append("name", name.value);
                linksData.append("link", link.value);

                addEvent(method, linksData, (e)=>{
                    startup(e.data.data);

                    name.value = link.value = "";

                    createToast("Done!");
                })
            })
        }

    });

} catch (e) {console.log(e)}

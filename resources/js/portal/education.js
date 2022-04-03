import Preloader from "../components/preloader";
import {addEvent, allEvent, deleteEvent} from "../baseEvents";
import {addBaseCardToDom, baseCardElement, formatDate, getFormData, resetFormData} from "../templates/baseCard";
import {createToast} from "../bulma/toasts";

try {
    const method = "Educations";

    const preloader = new Preloader();

    const fieldsNames = [
        "name",
        "speciality",
        "start_at",
        "ended",
        "country",
        "city",
    ];

    function getFormattedObject(response) {
        let dateStart = formatDate(response.start_at, response.ended);

        return {
            id: response.id,
            mainText: response.name,
            submainText: response.country+", "+response.city,
            otherText: response.speciality,
            date: dateStart
        }
    }

    function deleteClickEvent(e) {
        let id = this.getAttribute("data-id");
        deleteEvent(method, id, (e)=>{
            document.querySelector("#card-element-"+id).remove()
        })
    }

    window.onload = (e) => {
        allEvent(method, (e)=>{
            e.data.data.forEach((element)=>{
                addBaseCardToDom(getFormattedObject(element), "#universityList", deleteClickEvent)
            })
            preloader.dispatch();
        })
    }

    window.addEventListener("DOMContentLoaded", ()=>{
        preloader.render("#universityList");

        let universityAdd = document.querySelector("#baseAdd");
        if (universityAdd !== null) {
            universityAdd.addEventListener("click", (e)=>{
                let universityData = getFormData(fieldsNames);

                addEvent(method, universityData, (response)=>{
                    addBaseCardToDom(getFormattedObject(response.data.data), "#universityList", deleteClickEvent)

                    resetFormData();

                    createToast("Done")
                })
            })
        }
    })

} catch (e) {}

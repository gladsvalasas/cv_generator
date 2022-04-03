import Preloader from "../components/preloader";
import {addBaseCardToDom, formatDate, getFormData, resetFormData} from "../templates/baseCard";
import {addEvent, allEvent, deleteEvent} from "../baseEvents";
import {createToast} from "../bulma/toasts";

const fieldsNames = [
    "name",
    "position",
    "start_at",
    "ended",
    "country",
    "city",
];

try {
    const method = "Employments";

    const preloader = new Preloader();

    function getFormattedObject(response) {
        let date = formatDate(response.start_at, response.ended);

        return {
            id: response.id,
            mainText: response.name,
            submainText: response.country+", "+response.city,
            otherText: response.position,
            date: date
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
                addBaseCardToDom(getFormattedObject(element), "#employmentsList", deleteClickEvent)
            })
            preloader.dispatch();
        })
    }

    window.addEventListener("DOMContentLoaded", ()=>{
        preloader.render("#employmentsList");

        let employmentsAdd = document.querySelector("#baseAdd");
        if (employmentsAdd !== null) {
            employmentsAdd.addEventListener("click", (e)=>{
                let employmentsData = getFormData(fieldsNames);

                addEvent(method, employmentsData, (response)=>{
                    addBaseCardToDom(getFormattedObject(response.data.data), "#employmentsList", deleteClickEvent)

                    resetFormData();

                    createToast("Done")
                })
            })
        }
    })
} catch (e){}

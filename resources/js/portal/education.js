import Preloader from "../components/preloader";
import {allEvent, deleteEvent} from "../baseEvents";
import {baseCardElement} from "../templates/baseCard";

try {
    const method = "Educations";

    const preloader = new Preloader();

    function deleteClickEvent(e) {
        let id = this.getAttribute("data-id");
        deleteEvent(method, id, (e)=>{
            document.querySelector("#card-element-"+id).remove()
        })
    }

    window.onload = (e) => {
        allEvent(method, (e)=>{
            e.data.data.forEach((element)=>{
                let dateStart = (new Date(element.start_at).toLocaleDateString())
                    + " - " + (element.ended !== null ? (new Date(element.ended).toLocaleDateString()) : "now");

                let template = baseCardElement({
                    id: element.id,
                    mainText: element.name,
                    submainText: element.country+", "+element.city,
                    otherText: element.speciality,
                    date: dateStart
                }, deleteClickEvent);

                document.querySelector("#universityList").appendChild(template);
            })
            preloader.dispatch();
        })
    }

    window.addEventListener("DOMContentLoaded", ()=>{
        preloader.render("#universityList");

    })

} catch (e) {}

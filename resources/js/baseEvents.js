import Api from "./apis";
import {createToast} from "./bulma/toasts";

function catchResponse(e) {
    createToast(e.message, "is-danger")
}

function deleteEvent(method, id, callback) {
    Api.delete(method, id)
        .then((e)=>{
            if (e.data.status === "success") {
                callback(e);
                createToast("Deleted")
            }
        })
        .catch((e)=>{
            catchResponse(e);
        })
}

function addEvent(method, data, callback) {
    Api.add(method, data)
        .then((e)=>{
            if (e.data.status === "error") {
                createToast(e.data.message, "is-danger")
                return false;
            }

            callback(e);
        })
        .catch((e)=>{
            catchResponse(e);
        })
}

function updateEvent(method, data, id, callback) {
    Api.update(method, data, id)
        .then((e)=>{
            if (e.data.status === "error") {
                createToast(e.data.message, "is-danger")
                return false;
            }

            callback(e);
        })
        .catch((e)=>{
            catchResponse(e);
        })
}

export {deleteEvent, addEvent, updateEvent};

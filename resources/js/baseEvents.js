import Api from "./apis";
import {createToast} from "./bulma/toasts";

const goodStatus = "success";
const badStatus = "error";

function catchResponse(e) {
    createToast(e.message, "is-danger")
}

function deleteEvent(method, id, callback) {
    Api.delete(method, id)
        .then((e)=>{
            if (e.data.status === goodStatus) {
                callback(e);
                createToast("Deleted")
            }
        })
        .catch((e)=>{
            catchResponse(e);
        })
}

function allEvent(method, callback, sub = ()=>{}) {
    Api.all(method)
        .then((e)=>{
            if (e.data.status === goodStatus ) {
                callback(e);
            }
        })
        .then((e)=>{
            sub();
        })
        .catch((e)=>{
            catchResponse(e);
        })
}

function addEvent(method, data, callback) {
    Api.add(method, data)
        .then((e)=>{
            if (e.data.status === badStatus) {
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
            if (e.data.status === badStatus) {
                createToast(e.data.message, "is-danger")
                return false;
            }

            callback(e);
        })
        .catch((e)=>{
            catchResponse(e);
        })
}

export {deleteEvent, addEvent, updateEvent, allEvent};

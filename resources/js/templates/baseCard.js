function getFormData(formDateFields) {
    let baseFormData = new FormData();
    document.querySelectorAll(".baseField").forEach((elem, i)=>{
        baseFormData.append(formDateFields[i], elem.value);
    })

    return baseFormData;
}

function formatDate(start, end) {
    return (new Date(start).toLocaleDateString())
        + " - " + (end !== null ? (new Date(end).toLocaleDateString()) : "now");
}

function resetFormData() {
    document.querySelectorAll(".baseField").forEach((elem, i)=>{
        elem.value = "";
    })
}

function baseCardElement(data, deleteClickHandler) {
    var template = document.querySelector('#baseCardTemplate').content.cloneNode(true);
    template.querySelector("#card-element-template").setAttribute("id", "card-element-"+data.id);

    let button = template.querySelector(".deleteCard");
    button.setAttribute("data-id", data.id);
    button.addEventListener("click", deleteClickHandler);

    template.querySelector(".mainInfo").textContent = data.mainText;
    template.querySelector(".submainInfo").textContent = data.submainText;

    template.querySelector(".dateInfo").textContent = data.date;
    template.querySelector(".otherInfo").textContent = data.otherText;

    return template;
}

function addBaseCardToDom(element, addTo, deleteClickEvent ) {
    let dateStart = formatDate(element.start_at, element.ended);

    let template = baseCardElement({
        id: element.id,
        mainText: element.name,
        submainText: element.country+", "+element.city,
        otherText: element.speciality,
        date: dateStart
    }, deleteClickEvent);

    document.querySelector(addTo).appendChild(template);
}

export {baseCardElement, formatDate, getFormData, addBaseCardToDom, resetFormData};

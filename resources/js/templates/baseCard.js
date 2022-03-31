

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

export {baseCardElement};

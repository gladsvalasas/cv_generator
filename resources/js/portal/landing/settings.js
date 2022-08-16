import {badStatus, deleteFromCustomEndpoint, saveWithFileEvent} from "../../baseEvents";
import {createToast} from "../../bulma/toasts";
import Api from "../../apis";

function getLandingApiEndpoint(method, action) {
    return `/api/landing/${method}/${action}`;
}

function deleteStack(e) {
    let id = this.getAttribute("data-id");

    deleteFromCustomEndpoint(getLandingApiEndpoint("stack", "delete"), id, (e)=>{
        document.querySelector("#stackElement-"+e.data.data.id).remove();
        createToast("Deleted")
    })
}

function deleteProject(e) {
    let id = this.getAttribute("data-id");

    deleteFromCustomEndpoint(getLandingApiEndpoint("portfolio", "delete"), id, (e)=>{
        document.querySelector("#portfolioElement-"+e.data.data.id).remove();
        createToast("Deleted")
    })
}

function updateStackTemplate(data) {
    let template = document.querySelector('#stackTemplate').content.cloneNode(true);
    template.querySelector("#stackElement-1").setAttribute("id", "stackElement-"+data.id);
    let rows = template.querySelectorAll("td");
    rows[0].textContent = data.id;
    rows[1].querySelector("img").setAttribute("src", data.logo_path);
    rows[2].querySelector("a").setAttribute("href", data.link);
    rows[2].querySelector("a").textContent = data.link;

    rows[3].querySelector("button").setAttribute("data-id", data.id);
    rows[3].querySelector("button").addEventListener("click", deleteStack);

    document.querySelector("#stackList").appendChild(template);
}

window.onload = ()=>{
    if (window.FROM_DB_DATA.stackList.length >= 10) {
        document.querySelector("#stackSave").disabled = true;
    }

    window.FROM_DB_DATA.stackList.forEach((element)=>{
        updateStackTemplate(element);
    })
}

window.addEventListener("DOMContentLoaded", ()=>{

    let stackSave = document.querySelector("#stackSave");

    stackSave.addEventListener("click", (e)=>{
        let link = document.querySelector("#stackLink").value;
        let logo = document.querySelector("#stackLogo").files[0];

        let stackUploadState = document.querySelector("#stackUploadState");

        stackUploadState.value = 0;

        let stackData = new FormData();
        stackData.append("tech_link", link);
        stackData.append("logotype_path", logo);

        saveWithFileEvent(getLandingApiEndpoint("stack", "save"), stackData, (e)=>{
            updateStackTemplate({
                id: e.data.data.id,
                logo_path: e.data.data.logotype_path,
                link: e.data.data.tech_link
            })

            createToast("Done")
        }, stackUploadState)
    });

    let mainSave = document.querySelector("#mainSave");
    mainSave.addEventListener("click", (e)=>{
        let title = document.querySelector("#mainTitle").value;
        let mainText = document.querySelector("#mainText").value;
        let subText = document.querySelector("#mainSubText").value;

        let config = new FormData();
        config.append("title", title);
        config.append("mainText", mainText);
        config.append("subText", subText);

        axios.post(getLandingApiEndpoint("main", "save"), config, Api.headersOption)
            .then((response)=>{
                if (response.data.status === badStatus) {
                    createToast(response.data.message, "is-danger");
                    return false;
                }

                createToast("Saved!");
            })
            .catch((e)=>{
                createToast(e.message, "is-danger");
            })

    });

    let portfolioSave = document.querySelector("#portfolioSave");
    portfolioSave.addEventListener("click", (e)=>{
        let name = document.querySelector("#portfolioName").value;
        let link = document.querySelector("#portfolioLink").value;
        let description = document.querySelector("#portfolioDescription").value;
        let logo = document.querySelector("#portfolioPreview").files[0];

        let portfolioUploadState = document.querySelector("#portfolioUploadState");

        portfolioUploadState.value = 0;

        let stackData = new FormData();
        stackData.append("name", name);
        stackData.append("link", link);
        stackData.append("description", description);
        stackData.append("preview_path", logo);

        saveWithFileEvent(getLandingApiEndpoint("portfolio", "save"), stackData, (e)=>{
            document.querySelector("#portfolioList").innerHTML += `
                <tr id="portfolioElement-${e.data.data.id}">
                                                        <td>${e.data.data.id}</td>
                                                        <td>
                                                            <img src="${e.data.data.preview_path}" style="height: 50px; width: 50px" alt="">
                                                        </td>
                                                        <td>
                                                            <a href="${e.data.data.link}">${e.data.data.link}</a>
                                                        </td>
                                                        <td>
                                                            ${e.data.data.description}
                                                        </td>
                                                        <td>
                                                            <button class="delete portfolioDelete" data-id="${e.data.data.id}"></button>
                                                        </td>
                                                    </tr>
            `;
            createToast("Done")
        }, portfolioUploadState)
    });

    (function () {
        let tabs = document.querySelectorAll('.tabs li');
        let tabsContent = document.querySelectorAll('.tab-content');

        let deactvateAllTabs = function () {
            tabs.forEach(function (tab) {
                tab.classList.remove('is-active');
            });
        };

        let hideTabsContent = function () {
            tabsContent.forEach(function (tabContent) {
                tabContent.classList.remove('is-active');
            });
        };

        let activateTabsContent = function (tab) {
            tabsContent[getIndex(tab)].classList.add('is-active');
        };

        let getIndex = function (el) {
            return [...el.parentElement.children].indexOf(el);
        };

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                deactvateAllTabs();
                hideTabsContent();
                tab.classList.add('is-active');
                activateTabsContent(tab);
            });
        })

        tabs[0].click();
    })();

    //func
})


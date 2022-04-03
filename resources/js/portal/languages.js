import Api from "../apis";
import {createToast} from "../bulma/toasts";
import {addEvent, allEvent, deleteEvent} from "../baseEvents";

import Preloader from "../components/preloader";

try {
    function deleteClickEvent(e) {
        let id = this.getAttribute("data-id");
        deleteEvent(method, id, (e)=>{
            document.querySelector("#language-panel-"+id).remove()
        })
    }

    function startupCreate(data) {
        var template = document.querySelector('#blockTemplate').content.cloneNode(true);
        template.querySelector("#language-panel-").setAttribute("id", "language-panel-"+data.id);
        let button = template.querySelector(".delete-lang");

        button.setAttribute("data-id", data.id);
        button.addEventListener("click", deleteClickEvent);

        let lang = template.querySelector(".lang_name");
        lang.setAttribute("data-id", data.langId);
        lang.textContent = data.langName;

        let level = template.querySelector(".lang_level");
        level.setAttribute("data-id", data.levelId);
        level.textContent = data.CEFR+` (${data.cambridge})`;

        document.querySelector("#languagesList").appendChild(template);
    }

    var deleteButton =  document.querySelectorAll(".delete-lang");

    const method = "LanguagesUser";
    const preload = new Preloader();

    window.onload = (e) =>{
        /*allEvent(method, (e)=>{
            e.data.data.forEach((lang)=>{
                let newLanguage = Api.get("Languages", lang.languages_id);
                let newLevel = Api.get("LanguageLevel", lang.language_level_id);

                Promise.all([newLanguage, newLevel])
                    .then((res)=>{
                        startupCreate({
                            id: lang.id,
                            langId: res[0].data.data.id,
                            langName: res[0].data.data.name,
                            levelId: res[1].data.data.id,
                            CEFR: res[1].data.data.CEFR,
                            cambridge: res[1].data.data.cambridge,
                        })

                    })
            })
        })*/

        window.langList.forEach((lang)=>{
            startupCreate(lang);
        })

        preload.dispatch();
    }

    document.addEventListener("DOMContentLoaded", ()=>{

        preload.render("#languagesList");


        [].forEach.call(deleteButton, function(elem) {
            elem.addEventListener('click', deleteClickEvent, false);
        });
    });

    var addButton = document.querySelector("#addLanguage");
    if (addButton !== null) {
        addButton.addEventListener("click", (e)=>{
            let languageId = document.querySelector("#languageId").value;
            let levelId = document.querySelector("#levelId").value;

            addButton.disabled = true;

            let languagesData = new FormData();

            languagesData.append("languages_id", languageId);
            languagesData.append("language_level_id", levelId);

            /*ПРИМЕР КАК ДЕЛАТЬ НЕ НАДО!*/
            addEvent(method, languagesData, (e)=>{
                let newLangId = e.data.data.id;
                let newLanguage = Api.get("Languages", languageId);
                let newLevel = Api.get("LanguageLevel", levelId);

                Promise.all([newLanguage, newLevel])
                    .then((res)=>{
                        startupCreate({
                            id: newLangId,
                            langId: res[0].data.data.id,
                            langName: res[0].data.data.name,
                            levelId: res[1].data.data.id,
                            CEFR: res[1].data.data.CEFR,
                            cambridge: res[1].data.data.cambridge,
                        })
                        addButton.disabled = false;
                        createToast("Done");
                    })
            })
        })
    }
} catch (e) {}

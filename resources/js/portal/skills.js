import {addEvent, allEvent, deleteEvent, updateEvent} from "../baseEvents";
import {resetAttribute, SKILLS_LEVEL_CLASSES, strToBool} from "../functions";
import {createToast} from "../bulma/toasts";
import Preloader from "../components/preloader";

try {
    const method = "Skills";
    var preloader = new Preloader();


    function startupCreate(data)
    {
        let newSkillId = data.id;
        let newSkillName = data.name;
        let newSkillLevel = data.level;

        let classNameForLevel = SKILLS_LEVEL_CLASSES[newSkillLevel-1];

        var template = document.querySelector('#blockTemplate').content.cloneNode(true);
        template.querySelector("#skill-element-ID").setAttribute("id", "skill-element-"+newSkillId);

        let nameInput = template.querySelector("#skillName-ID");
        nameInput.setAttribute("id", "skillName-"+newSkillId);
        nameInput.value = newSkillName;

        let levelProgress = template.querySelector("#skillLevelDisplay-ID");
        levelProgress.setAttribute("id", "skillLevelDisplay-"+newSkillId);
        levelProgress.value = newSkillLevel;
        levelProgress.className = "progress "+classNameForLevel;

        let levelRange = template.querySelector("#skillLevel-ID");
        levelRange.setAttribute("id", "skillLevel-"+newSkillId);
        levelRange.value = newSkillLevel;

        let deleteButton = template.querySelector(".deleteSkill");
        deleteButton.setAttribute("data-id", newSkillId);

        let editButton = template.querySelector("#editSkill-ID");
        editButton.setAttribute("id", "editSkill-"+newSkillId);
        editButton.setAttribute("data-id", newSkillId);

        let updateButton = template.querySelector("#updateSkill-ID");
        updateButton.setAttribute("id", "updateSkill-"+newSkillId);
        updateButton.setAttribute("data-id", newSkillId);

        deleteButton.addEventListener("click", deleteClickEvent);
        editButton.addEventListener("click", editClickEvent);
        updateButton.addEventListener("click", updateClickEvent);

        document.querySelector("#skillsList").appendChild(template);

    }

    function resetBlockDefault(id) {
        resetAttribute(document.querySelector("#editSkill-"+id), "data-edit", "false");
        let buttonUpdate = document.querySelector("#updateSkill-"+id);
        /*buttonUpdate.disabled = true;*/
        buttonUpdate.style.display = "none";
        document.querySelector("#skillName-"+id).disabled = true;
        document.querySelector("#skillLevelDisplay-"+id).style.display = "block";
        let skillLevel = document.querySelector("#skillLevel-"+id);
        skillLevel.disabled = true;
        skillLevel.style.display = "none";
    }

    function deleteClickEvent(e) {
        let id = this.getAttribute("data-id");
        deleteEvent(method, id, (e)=>{
            document.querySelector("#skill-element-"+id).remove()
        })
    }

    function updateClickEvent(e) {
        let id = this.getAttribute("data-id");
        let skillName = document.querySelector("#skillName-"+id);
        let skillLevel = document.querySelector("#skillLevel-"+id);

        let skillsData = new FormData();

        skillsData.append("name", skillName.value);
        skillsData.append("level", skillLevel.value);
        this.disabled = true;

        updateEvent(method, skillsData, id, (e)=>{
            //let currentId = e.data.data.id;
            let progressBarLevel = document.querySelector("#skillLevelDisplay-"+id);
            progressBarLevel.className = "progress "+SKILLS_LEVEL_CLASSES[e.data.data.newFields.level-1];

            skillLevel.value = progressBarLevel.value =  e.data.data.newFields.level;
            skillName.value = e.data.data.newFields.name;
            resetBlockDefault(id);
            createToast("Updated!");
        })
    }

    function editClickEvent(e) {

        let id = this.getAttribute("data-id");
        let isEdit = strToBool(this.getAttribute("data-edit"));
        let buttonUpdate = document.querySelector("#updateSkill-"+id);
        let skillName = document.querySelector("#skillName-"+id);
        let skillLevelDisplay = document.querySelector("#skillLevelDisplay-"+id);
        let skillLevel = document.querySelector("#skillLevel-"+id);

        buttonUpdate.style.display = skillLevel.style.display = isEdit ? "none" : "block";
        skillLevelDisplay.style.display = !isEdit ? "none" : "block";
        buttonUpdate.disabled = skillName.disabled = skillLevel.disabled = isEdit;

        resetAttribute(this, "data-edit", !isEdit)
    }


    window.onload = (e)=>{
        allEvent(method, (e)=>{
            e.data.data.forEach((skill)=>{
                startupCreate(skill);
            })
            preloader.dispatch();
        });
    }

    window.addEventListener("DOMContentLoaded",() => {

        preloader.render("#skillsList");

        [].forEach.call(document.querySelectorAll(".deleteSkill"), (elem)=>{
            elem.addEventListener("click", deleteClickEvent);
        });

        [].forEach.call(document.querySelectorAll(".editSkill"), (elem)=>{
            elem.addEventListener("click", editClickEvent);
        });

        [].forEach.call(document.querySelectorAll(".updateSkill"), (elem)=>{
            elem.addEventListener("click", updateClickEvent);
        })

        var addSkill = document.querySelector("#addSkill");

        if (addSkill !== null) {
            addSkill.addEventListener("click", (e)=>{
                let skillName = document.querySelector("#addSkillName");
                let skillLevel = document.querySelector("#addSkillLevel");

                let skillData = new FormData();
                skillData.append("name", skillName.value);
                skillData.append("level", skillLevel.value);

                addSkill.disabled = true;

                addEvent(method, skillData, (e)=>{

                    startupCreate(e.data.data);
                    skillName.value = "";
                    skillLevel.value = 1;
                    createToast("Done");
                })
                addSkill.disabled = false;
            })
        }

    });

} catch (e) {
    console.log(e)
}

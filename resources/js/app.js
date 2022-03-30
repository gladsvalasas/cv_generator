require('./bootstrap');
require('./bulma/modals');
import Choices from "choices.js";
/*import 'animate.css';*/
import IMask from 'imask';

var lozad = require('lozad')

const observer = lozad(); // lazy loads elements with default selector as '.lozad'
observer.observe();

try {
    [].forEach.call(document.querySelectorAll(".js-choice"), function(elem) {
        new Choices(elem);
    });

    [].forEach.call(document.querySelectorAll(".notification > button"), function(e){
        e.addEventListener('click', function(e) {
            document.querySelectorAll(".notification").forEach((e)=>e.remove())
        })
    });

    var number = document.getElementById("phone_number")
    if (number !== null) {
        var mask = IMask(document.getElementById("phone_number"), {
            mask: '+375 (00) 000-00-00'
        });
    }

    const fileInput = document.querySelector('#avatar-upload input[type=file]');
    if (fileInput !== null) {
        fileInput.onchange = () => {
            if (fileInput.files.length > 0) {
                const fileName = document.querySelector('#avatar-upload .file-name');
                fileName.textContent = fileInput.files[0].name;
            }
        }
    }

    /*window.GLOBAL_SCRIPTS = [
        "/admin/register",
        "/portal/home",
        "/portal/languages",
        "/portal/links",
        "/portal/skills",
    ];

    require("./admin/register");
    require("./portal/home");
    require("./portal/languages");
    require("./portal/links");
    require("./portal/skills");*/


/*    window.GLOBAL_SCRIPTS.forEach((script)=>{
        import("."+script)
            .then(module=>{

            })
            .catch(error=>{
                console.error(error)
            });
    })*/

} catch (e) {}

/*
document.addEventListener("DOMContentLoaded", function() {


});
*/


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


    require("./home");
    require("./languages");
    require("./skills");

    require('./filer');

    var number = document.getElementById("phone_number")
    if (number !== null) {
        var mask = IMask(document.getElementById("phone_number"), {
            mask: '+375 (00) 000-00-00'
        });
    }

} catch (e) {}

/*
document.addEventListener("DOMContentLoaded", function() {


});
*/


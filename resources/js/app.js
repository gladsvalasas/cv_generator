import Api from "./apis";

const $ = require( "jquery" ) (window);

require('./bootstrap');
require('./bulma/modals');
import Choices from "choices.js";

import IMask from 'imask';
import {toast} from "bulma-toast";
var lozad = require('lozad')

const observer = lozad(); // lazy loads elements with default selector as '.lozad'
observer.observe();

try {
    [].forEach.call(document.querySelectorAll(".js-choice"), function(elem) {
        new Choices(elem);
    });


    require("./home");
    require("./languages");

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


const $ = require( "jquery" ) (window);

require('./bootstrap');
require('./bulma/modals');

import IMask from 'imask';
var lozad = require('lozad')

const observer = lozad(); // lazy loads elements with default selector as '.lozad'
observer.observe();


require("./home");

var mask = IMask(document.getElementById("phone_number"), {
    mask: '+375 (00) 000-00-00'
})
require('./filer');


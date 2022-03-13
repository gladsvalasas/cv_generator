require('./bootstrap');

var lozad = require('lozad')

const observer = lozad(); // lazy loads elements with default selector as '.lozad'
observer.observe();

require('./filer');

import IMask from 'imask';
var mask = IMask(document.getElementById("phone_number"), {
    mask: '+375 (00) 000-00-00'
})

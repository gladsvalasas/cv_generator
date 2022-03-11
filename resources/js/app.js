require('./bootstrap');
require('./filer');

import IMask from 'imask';
var mask = IMask(document.getElementById("phone_number"), {
    mask: '+375 (00) 000-00-00'
})

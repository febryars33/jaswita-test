/*
Import the jQuery
*/

import jQuery from "jquery";
import select2 from "select2";
import Vue from 'vue/dist/vue.common';

window.$ = window.jQuery = jQuery;
window.Vue = Vue;
select2();

/*
Import the Tabler Js with Demo theme
*/
import '../../node_modules/@tabler/core/dist/js/tabler';
import '../../vendor/takielias/tablar/assets/demo-theme.js';


// Tablar Kit components' JavaScript dependencies.
// Uncomment the required dependencies and run npm run build to include them.

 // Filepond components' JavaScript dependencies.
import '../../vendor/takielias/tablar-kit/resources/js/plugins/filepond.js';

 // Editor components' JavaScript dependencies.
//import '../../vendor/takielias/tablar-kit/resources/js/plugins/jodit-editor.js';

 // Select/DropDown components' JavaScript dependencies.
//import '../../vendor/takielias/tablar-kit/resources/js/plugins/tom-select.js';

 // Date & Time Picker components' JavaScript dependencies.
//import '../../vendor/takielias/tablar-kit/resources/js/plugins/flat-picker.js';
//import '../../vendor/takielias/tablar-kit/resources/js/plugins/lite-picker.js';

 // Table components' JavaScript dependencies.
//import '../../vendor/takielias/tablar-kit/resources/js/plugins/tabulator.js';
//import '../../vendor/takielias/tablar-kit/resources/js/plugins/xlsx.js';
//import '../../vendor/takielias/tablar-kit/resources/js/plugins/jspdf.js';

 // Modal components' JavaScript dependencies.
//import '../../vendor/takielias/tablar-kit/resources/js/plugins/modal.js';

 // Common JavaScript dependencies.
import '../../vendor/takielias/tablar-kit/resources/js/plugins/common.js';

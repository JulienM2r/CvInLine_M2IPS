// assets/js/app.js

require('../scss/global.scss');

//console.log('Hello Webpack Encore');

// loads the jquery package from node_modules
const $ = require('jquery');
global.$ = global.jQuery = $;
require('bootstrap');




document.addEventListener("DOMContentLoaded", function () {
  "use strict";
 
  var button = document.getElementById("btnMessage");  
  button.addEventListener("click", function (event) {
    document.getElementById("BlocMessage").style.display = "none";
  });
});
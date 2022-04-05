/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/landing/app.js":
/*!*************************************!*\
  !*** ./resources/js/landing/app.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

eval("var lozad = __webpack_require__(/*! lozad */ \"./node_modules/lozad/dist/lozad.min.js\");\n\nvar observer = lozad();\nobserver.observe();//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvbGFuZGluZy9hcHAuanMuanMiLCJtYXBwaW5ncyI6IkFBQUEsSUFBSUEsS0FBSyxHQUFHQyxtQkFBTyxDQUFDLHFEQUFELENBQW5COztBQUVBLElBQU1DLFFBQVEsR0FBR0YsS0FBSyxFQUF0QjtBQUNBRSxRQUFRLENBQUNDLE9BQVQiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvbGFuZGluZy9hcHAuanM/MzhhMSJdLCJzb3VyY2VzQ29udGVudCI6WyJ2YXIgbG96YWQgPSByZXF1aXJlKCdsb3phZCcpXG5cbmNvbnN0IG9ic2VydmVyID0gbG96YWQoKTtcbm9ic2VydmVyLm9ic2VydmUoKTtcbiJdLCJuYW1lcyI6WyJsb3phZCIsInJlcXVpcmUiLCJvYnNlcnZlciIsIm9ic2VydmUiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/landing/app.js\n");

/***/ }),

/***/ "./node_modules/lozad/dist/lozad.min.js":
/*!**********************************************!*\
  !*** ./node_modules/lozad/dist/lozad.min.js ***!
  \**********************************************/
/***/ (function(module) {

eval("/*! lozad.js - v1.16.0 - 2020-09-06\n* https://github.com/ApoorvSaxena/lozad.js\n* Copyright (c) 2020 Apoorv Saxena; Licensed MIT */\n!function(t,e){ true?module.exports=e():0}(this,function(){\"use strict\";\n/**\n   * Detect IE browser\n   * @const {boolean}\n   * @private\n   */var g=\"undefined\"!=typeof document&&document.documentMode,f={rootMargin:\"0px\",threshold:0,load:function(t){if(\"picture\"===t.nodeName.toLowerCase()){var e=t.querySelector(\"img\"),r=!1;null===e&&(e=document.createElement(\"img\"),r=!0),g&&t.getAttribute(\"data-iesrc\")&&(e.src=t.getAttribute(\"data-iesrc\")),t.getAttribute(\"data-alt\")&&(e.alt=t.getAttribute(\"data-alt\")),r&&t.append(e)}if(\"video\"===t.nodeName.toLowerCase()&&!t.getAttribute(\"data-src\")&&t.children){for(var a=t.children,o=void 0,i=0;i<=a.length-1;i++)(o=a[i].getAttribute(\"data-src\"))&&(a[i].src=o);t.load()}t.getAttribute(\"data-poster\")&&(t.poster=t.getAttribute(\"data-poster\")),t.getAttribute(\"data-src\")&&(t.src=t.getAttribute(\"data-src\")),t.getAttribute(\"data-srcset\")&&t.setAttribute(\"srcset\",t.getAttribute(\"data-srcset\"));var n=\",\";if(t.getAttribute(\"data-background-delimiter\")&&(n=t.getAttribute(\"data-background-delimiter\")),t.getAttribute(\"data-background-image\"))t.style.backgroundImage=\"url('\"+t.getAttribute(\"data-background-image\").split(n).join(\"'),url('\")+\"')\";else if(t.getAttribute(\"data-background-image-set\")){var d=t.getAttribute(\"data-background-image-set\").split(n),u=d[0].substr(0,d[0].indexOf(\" \"))||d[0];// Substring before ... 1x\nu=-1===u.indexOf(\"url(\")?\"url(\"+u+\")\":u,1===d.length?t.style.backgroundImage=u:t.setAttribute(\"style\",(t.getAttribute(\"style\")||\"\")+\"background-image: \"+u+\"; background-image: -webkit-image-set(\"+d+\"); background-image: image-set(\"+d+\")\")}t.getAttribute(\"data-toggle-class\")&&t.classList.toggle(t.getAttribute(\"data-toggle-class\"))},loaded:function(){}};function A(t){t.setAttribute(\"data-loaded\",!0)}var m=function(t){return\"true\"===t.getAttribute(\"data-loaded\")},v=function(t){var e=1<arguments.length&&void 0!==arguments[1]?arguments[1]:document;return t instanceof Element?[t]:t instanceof NodeList?t:e.querySelectorAll(t)};return function(){var r,a,o=0<arguments.length&&void 0!==arguments[0]?arguments[0]:\".lozad\",t=1<arguments.length&&void 0!==arguments[1]?arguments[1]:{},e=Object.assign({},f,t),i=e.root,n=e.rootMargin,d=e.threshold,u=e.load,g=e.loaded,s=void 0;\"undefined\"!=typeof window&&window.IntersectionObserver&&(s=new IntersectionObserver((r=u,a=g,function(t,e){t.forEach(function(t){(0<t.intersectionRatio||t.isIntersecting)&&(e.unobserve(t.target),m(t.target)||(r(t.target),A(t.target),a(t.target)))})}),{root:i,rootMargin:n,threshold:d}));for(var c,l=v(o,i),b=0;b<l.length;b++)(c=l[b]).getAttribute(\"data-placeholder-background\")&&(c.style.background=c.getAttribute(\"data-placeholder-background\"));return{observe:function(){for(var t=v(o,i),e=0;e<t.length;e++)m(t[e])||(s?s.observe(t[e]):(u(t[e]),A(t[e]),g(t[e])))},triggerLoad:function(t){m(t)||(u(t),A(t),g(t))},observer:s}}});\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9ub2RlX21vZHVsZXMvbG96YWQvZGlzdC9sb3phZC5taW4uanMuanMiLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBLG9DQUFvQztBQUNwQyxlQUFlLEtBQW9ELG9CQUFvQixDQUEyRCxDQUFDLGlCQUFpQjtBQUNwSztBQUNBO0FBQ0EsYUFBYTtBQUNiO0FBQ0Esa0VBQWtFLDhDQUE4Qyx5Q0FBeUMsa0NBQWtDLHFNQUFxTSxnRkFBZ0Ysa0NBQWtDLGNBQWMsb0RBQW9ELFNBQVMsNk5BQTZOLFVBQVUsK09BQStPLHFEQUFxRCxvR0FBb0c7QUFDNXFDLDhKQUE4Siw0Q0FBNEMscUNBQXFDLDZGQUE2RixzQkFBc0IsY0FBYyxpQ0FBaUMsa0JBQWtCLDZDQUE2QyxlQUFlLHNFQUFzRSwrRUFBK0Usa0JBQWtCLHFJQUFxSSxtQkFBbUIseUVBQXlFLDRHQUE0RyxzQkFBc0Isc0hBQXNILEVBQUUsR0FBRyxnQ0FBZ0MsR0FBRyx1QkFBdUIsV0FBVyw2SEFBNkgsT0FBTyxtQkFBbUIscUJBQXFCLFdBQVcsMkRBQTJELHlCQUF5Qix1QkFBdUIsY0FBYyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9sb3phZC9kaXN0L2xvemFkLm1pbi5qcz83YWFmIl0sInNvdXJjZXNDb250ZW50IjpbIi8qISBsb3phZC5qcyAtIHYxLjE2LjAgLSAyMDIwLTA5LTA2XG4qIGh0dHBzOi8vZ2l0aHViLmNvbS9BcG9vcnZTYXhlbmEvbG96YWQuanNcbiogQ29weXJpZ2h0IChjKSAyMDIwIEFwb29ydiBTYXhlbmE7IExpY2Vuc2VkIE1JVCAqL1xuIWZ1bmN0aW9uKHQsZSl7XCJvYmplY3RcIj09dHlwZW9mIGV4cG9ydHMmJlwidW5kZWZpbmVkXCIhPXR5cGVvZiBtb2R1bGU/bW9kdWxlLmV4cG9ydHM9ZSgpOlwiZnVuY3Rpb25cIj09dHlwZW9mIGRlZmluZSYmZGVmaW5lLmFtZD9kZWZpbmUoZSk6dC5sb3phZD1lKCl9KHRoaXMsZnVuY3Rpb24oKXtcInVzZSBzdHJpY3RcIjtcbi8qKlxuICAgKiBEZXRlY3QgSUUgYnJvd3NlclxuICAgKiBAY29uc3Qge2Jvb2xlYW59XG4gICAqIEBwcml2YXRlXG4gICAqL3ZhciBnPVwidW5kZWZpbmVkXCIhPXR5cGVvZiBkb2N1bWVudCYmZG9jdW1lbnQuZG9jdW1lbnRNb2RlLGY9e3Jvb3RNYXJnaW46XCIwcHhcIix0aHJlc2hvbGQ6MCxsb2FkOmZ1bmN0aW9uKHQpe2lmKFwicGljdHVyZVwiPT09dC5ub2RlTmFtZS50b0xvd2VyQ2FzZSgpKXt2YXIgZT10LnF1ZXJ5U2VsZWN0b3IoXCJpbWdcIikscj0hMTtudWxsPT09ZSYmKGU9ZG9jdW1lbnQuY3JlYXRlRWxlbWVudChcImltZ1wiKSxyPSEwKSxnJiZ0LmdldEF0dHJpYnV0ZShcImRhdGEtaWVzcmNcIikmJihlLnNyYz10LmdldEF0dHJpYnV0ZShcImRhdGEtaWVzcmNcIikpLHQuZ2V0QXR0cmlidXRlKFwiZGF0YS1hbHRcIikmJihlLmFsdD10LmdldEF0dHJpYnV0ZShcImRhdGEtYWx0XCIpKSxyJiZ0LmFwcGVuZChlKX1pZihcInZpZGVvXCI9PT10Lm5vZGVOYW1lLnRvTG93ZXJDYXNlKCkmJiF0LmdldEF0dHJpYnV0ZShcImRhdGEtc3JjXCIpJiZ0LmNoaWxkcmVuKXtmb3IodmFyIGE9dC5jaGlsZHJlbixvPXZvaWQgMCxpPTA7aTw9YS5sZW5ndGgtMTtpKyspKG89YVtpXS5nZXRBdHRyaWJ1dGUoXCJkYXRhLXNyY1wiKSkmJihhW2ldLnNyYz1vKTt0LmxvYWQoKX10LmdldEF0dHJpYnV0ZShcImRhdGEtcG9zdGVyXCIpJiYodC5wb3N0ZXI9dC5nZXRBdHRyaWJ1dGUoXCJkYXRhLXBvc3RlclwiKSksdC5nZXRBdHRyaWJ1dGUoXCJkYXRhLXNyY1wiKSYmKHQuc3JjPXQuZ2V0QXR0cmlidXRlKFwiZGF0YS1zcmNcIikpLHQuZ2V0QXR0cmlidXRlKFwiZGF0YS1zcmNzZXRcIikmJnQuc2V0QXR0cmlidXRlKFwic3Jjc2V0XCIsdC5nZXRBdHRyaWJ1dGUoXCJkYXRhLXNyY3NldFwiKSk7dmFyIG49XCIsXCI7aWYodC5nZXRBdHRyaWJ1dGUoXCJkYXRhLWJhY2tncm91bmQtZGVsaW1pdGVyXCIpJiYobj10LmdldEF0dHJpYnV0ZShcImRhdGEtYmFja2dyb3VuZC1kZWxpbWl0ZXJcIikpLHQuZ2V0QXR0cmlidXRlKFwiZGF0YS1iYWNrZ3JvdW5kLWltYWdlXCIpKXQuc3R5bGUuYmFja2dyb3VuZEltYWdlPVwidXJsKCdcIit0LmdldEF0dHJpYnV0ZShcImRhdGEtYmFja2dyb3VuZC1pbWFnZVwiKS5zcGxpdChuKS5qb2luKFwiJyksdXJsKCdcIikrXCInKVwiO2Vsc2UgaWYodC5nZXRBdHRyaWJ1dGUoXCJkYXRhLWJhY2tncm91bmQtaW1hZ2Utc2V0XCIpKXt2YXIgZD10LmdldEF0dHJpYnV0ZShcImRhdGEtYmFja2dyb3VuZC1pbWFnZS1zZXRcIikuc3BsaXQobiksdT1kWzBdLnN1YnN0cigwLGRbMF0uaW5kZXhPZihcIiBcIikpfHxkWzBdOy8vIFN1YnN0cmluZyBiZWZvcmUgLi4uIDF4XG51PS0xPT09dS5pbmRleE9mKFwidXJsKFwiKT9cInVybChcIit1K1wiKVwiOnUsMT09PWQubGVuZ3RoP3Quc3R5bGUuYmFja2dyb3VuZEltYWdlPXU6dC5zZXRBdHRyaWJ1dGUoXCJzdHlsZVwiLCh0LmdldEF0dHJpYnV0ZShcInN0eWxlXCIpfHxcIlwiKStcImJhY2tncm91bmQtaW1hZ2U6IFwiK3UrXCI7IGJhY2tncm91bmQtaW1hZ2U6IC13ZWJraXQtaW1hZ2Utc2V0KFwiK2QrXCIpOyBiYWNrZ3JvdW5kLWltYWdlOiBpbWFnZS1zZXQoXCIrZCtcIilcIil9dC5nZXRBdHRyaWJ1dGUoXCJkYXRhLXRvZ2dsZS1jbGFzc1wiKSYmdC5jbGFzc0xpc3QudG9nZ2xlKHQuZ2V0QXR0cmlidXRlKFwiZGF0YS10b2dnbGUtY2xhc3NcIikpfSxsb2FkZWQ6ZnVuY3Rpb24oKXt9fTtmdW5jdGlvbiBBKHQpe3Quc2V0QXR0cmlidXRlKFwiZGF0YS1sb2FkZWRcIiwhMCl9dmFyIG09ZnVuY3Rpb24odCl7cmV0dXJuXCJ0cnVlXCI9PT10LmdldEF0dHJpYnV0ZShcImRhdGEtbG9hZGVkXCIpfSx2PWZ1bmN0aW9uKHQpe3ZhciBlPTE8YXJndW1lbnRzLmxlbmd0aCYmdm9pZCAwIT09YXJndW1lbnRzWzFdP2FyZ3VtZW50c1sxXTpkb2N1bWVudDtyZXR1cm4gdCBpbnN0YW5jZW9mIEVsZW1lbnQ/W3RdOnQgaW5zdGFuY2VvZiBOb2RlTGlzdD90OmUucXVlcnlTZWxlY3RvckFsbCh0KX07cmV0dXJuIGZ1bmN0aW9uKCl7dmFyIHIsYSxvPTA8YXJndW1lbnRzLmxlbmd0aCYmdm9pZCAwIT09YXJndW1lbnRzWzBdP2FyZ3VtZW50c1swXTpcIi5sb3phZFwiLHQ9MTxhcmd1bWVudHMubGVuZ3RoJiZ2b2lkIDAhPT1hcmd1bWVudHNbMV0/YXJndW1lbnRzWzFdOnt9LGU9T2JqZWN0LmFzc2lnbih7fSxmLHQpLGk9ZS5yb290LG49ZS5yb290TWFyZ2luLGQ9ZS50aHJlc2hvbGQsdT1lLmxvYWQsZz1lLmxvYWRlZCxzPXZvaWQgMDtcInVuZGVmaW5lZFwiIT10eXBlb2Ygd2luZG93JiZ3aW5kb3cuSW50ZXJzZWN0aW9uT2JzZXJ2ZXImJihzPW5ldyBJbnRlcnNlY3Rpb25PYnNlcnZlcigocj11LGE9ZyxmdW5jdGlvbih0LGUpe3QuZm9yRWFjaChmdW5jdGlvbih0KXsoMDx0LmludGVyc2VjdGlvblJhdGlvfHx0LmlzSW50ZXJzZWN0aW5nKSYmKGUudW5vYnNlcnZlKHQudGFyZ2V0KSxtKHQudGFyZ2V0KXx8KHIodC50YXJnZXQpLEEodC50YXJnZXQpLGEodC50YXJnZXQpKSl9KX0pLHtyb290Omkscm9vdE1hcmdpbjpuLHRocmVzaG9sZDpkfSkpO2Zvcih2YXIgYyxsPXYobyxpKSxiPTA7YjxsLmxlbmd0aDtiKyspKGM9bFtiXSkuZ2V0QXR0cmlidXRlKFwiZGF0YS1wbGFjZWhvbGRlci1iYWNrZ3JvdW5kXCIpJiYoYy5zdHlsZS5iYWNrZ3JvdW5kPWMuZ2V0QXR0cmlidXRlKFwiZGF0YS1wbGFjZWhvbGRlci1iYWNrZ3JvdW5kXCIpKTtyZXR1cm57b2JzZXJ2ZTpmdW5jdGlvbigpe2Zvcih2YXIgdD12KG8saSksZT0wO2U8dC5sZW5ndGg7ZSsrKW0odFtlXSl8fChzP3Mub2JzZXJ2ZSh0W2VdKToodSh0W2VdKSxBKHRbZV0pLGcodFtlXSkpKX0sdHJpZ2dlckxvYWQ6ZnVuY3Rpb24odCl7bSh0KXx8KHUodCksQSh0KSxnKHQpKX0sb2JzZXJ2ZXI6c319fSk7XG4iXSwibmFtZXMiOltdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./node_modules/lozad/dist/lozad.min.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./resources/js/landing/app.js");
/******/ 	
/******/ })()
;
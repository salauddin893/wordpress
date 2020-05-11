/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/assets/js/bundle.js":
/*!*********************************!*\
  !*** ./src/assets/js/bundle.js ***!
  \*********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_navigation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/navigation */ "./src/assets/js/components/navigation.js");
/* harmony import */ var _components_navigation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_components_navigation__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components_slider__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./components/slider */ "./src/assets/js/components/slider.js");
/* harmony import */ var _components_slider__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_components_slider__WEBPACK_IMPORTED_MODULE_1__);



/***/ }),

/***/ "./src/assets/js/components/navigation.js":
/*!************************************************!*\
  !*** ./src/assets/js/components/navigation.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var $ = jQuery;
$('.c-navigation').on('mouseenter', '.menu-item-has-children', function (e) {
  if (!$(e.currentTarget).parents('.sub-menu').length) {
    $('.menu > .menu-item.open').find('> a > .menu-button').trigger('click');
  }

  $(e.currentTarget).addClass('open');
}).on('mouseleave', '.menu-item-has-children', function (e) {
  $(e.currentTarget).removeClass('open');
});
$('.c-navigation').on('click', '.menu .menu-button', function (e) {
  e.preventDefault();
  e.stopPropagation();
  var menuButton = $(e.currentTarget);
  var menuLink = menuButton.parent();
  var menuItem = menuLink.parent();

  if ($(menuItem).hasClass('open')) {
    menuItem.add(menuItem.find('.menu-item.open > a > .menu-button').trigger('click')).removeClass('open');
    menuLink.attr('aria-haspopup', 'true');
    menuLink.attr('aria-expanded', 'false');
    menuButton.find('.menu-button-show').attr('aria-hidden', 'false');
    menuButton.find('.menu-button-hide').attr('aria-hidden', 'true');
  } else {
    menuItem.siblings('.open').find('> a > .menu-button').trigger('click');
    menuItem.addClass('open');
    menuLink.attr('aria-haspopup', 'false');
    menuLink.attr('aria-expanded', 'true');
    menuButton.find('.menu-button-show').attr('aria-hidden', 'true');
    menuButton.find('.menu-button-hide').attr('aria-hidden', 'false');
  }
});
$(document).on('click', function (e) {
  if ($('.menu-item.open').length) {
    $('.menu > .menu-item.open > a > .menu-button').trigger('click');
  }
});

/***/ }),

/***/ "./src/assets/js/components/slider.js":
/*!********************************************!*\
  !*** ./src/assets/js/components/slider.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

console.log('kdjkfaafj');

/***/ }),

/***/ 0:
/*!***************************************!*\
  !*** multi ./src/assets/js/bundle.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\firsttheme\wp-content\themes\themename\src\assets\js\bundle.js */"./src/assets/js/bundle.js");


/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAiLCJ3ZWJwYWNrOi8vLy4vc3JjL2Fzc2V0cy9qcy9idW5kbGUuanMiLCJ3ZWJwYWNrOi8vLy4vc3JjL2Fzc2V0cy9qcy9jb21wb25lbnRzL25hdmlnYXRpb24uanMiLCJ3ZWJwYWNrOi8vLy4vc3JjL2Fzc2V0cy9qcy9jb21wb25lbnRzL3NsaWRlci5qcyJdLCJuYW1lcyI6WyIkIiwialF1ZXJ5Iiwib24iLCJlIiwiY3VycmVudFRhcmdldCIsInBhcmVudHMiLCJsZW5ndGgiLCJmaW5kIiwidHJpZ2dlciIsImFkZENsYXNzIiwicmVtb3ZlQ2xhc3MiLCJwcmV2ZW50RGVmYXVsdCIsInN0b3BQcm9wYWdhdGlvbiIsIm1lbnVCdXR0b24iLCJtZW51TGluayIsInBhcmVudCIsIm1lbnVJdGVtIiwiaGFzQ2xhc3MiLCJhZGQiLCJhdHRyIiwic2libGluZ3MiLCJkb2N1bWVudCIsImNvbnNvbGUiLCJsb2ciXSwibWFwcGluZ3MiOiI7UUFBQTtRQUNBOztRQUVBO1FBQ0E7O1FBRUE7UUFDQTtRQUNBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7O1FBRUE7UUFDQTs7UUFFQTtRQUNBOztRQUVBO1FBQ0E7UUFDQTs7O1FBR0E7UUFDQTs7UUFFQTtRQUNBOztRQUVBO1FBQ0E7UUFDQTtRQUNBLDBDQUEwQyxnQ0FBZ0M7UUFDMUU7UUFDQTs7UUFFQTtRQUNBO1FBQ0E7UUFDQSx3REFBd0Qsa0JBQWtCO1FBQzFFO1FBQ0EsaURBQWlELGNBQWM7UUFDL0Q7O1FBRUE7UUFDQTtRQUNBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7UUFDQTtRQUNBLHlDQUF5QyxpQ0FBaUM7UUFDMUUsZ0hBQWdILG1CQUFtQixFQUFFO1FBQ3JJO1FBQ0E7O1FBRUE7UUFDQTtRQUNBO1FBQ0EsMkJBQTJCLDBCQUEwQixFQUFFO1FBQ3ZELGlDQUFpQyxlQUFlO1FBQ2hEO1FBQ0E7UUFDQTs7UUFFQTtRQUNB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LENBQUQsQ0FBZ0RRLE9BQWhELENBQXdELE9BQXhEO0FBQ0g7QUFDSixDQUpELEU7Ozs7Ozs7Ozs7O0FDckNBYyxPQUFPLENBQUNDLEdBQVIsQ0FBWSxXQUFaLEUiLCJmaWxlIjoiYnVuZGxlLmpzIiwic291cmNlc0NvbnRlbnQiOlsiIFx0Ly8gVGhlIG1vZHVsZSBjYWNoZVxuIFx0dmFyIGluc3RhbGxlZE1vZHVsZXMgPSB7fTtcblxuIFx0Ly8gVGhlIHJlcXVpcmUgZnVuY3Rpb25cbiBcdGZ1bmN0aW9uIF9fd2VicGFja19yZXF1aXJlX18obW9kdWxlSWQpIHtcblxuIFx0XHQvLyBDaGVjayBpZiBtb2R1bGUgaXMgaW4gY2FjaGVcbiBcdFx0aWYoaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0pIHtcbiBcdFx0XHRyZXR1cm4gaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0uZXhwb3J0cztcbiBcdFx0fVxuIFx0XHQvLyBDcmVhdGUgYSBuZXcgbW9kdWxlIChhbmQgcHV0IGl0IGludG8gdGhlIGNhY2hlKVxuIFx0XHR2YXIgbW9kdWxlID0gaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0gPSB7XG4gXHRcdFx0aTogbW9kdWxlSWQsXG4gXHRcdFx0bDogZmFsc2UsXG4gXHRcdFx0ZXhwb3J0czoge31cbiBcdFx0fTtcblxuIFx0XHQvLyBFeGVjdXRlIHRoZSBtb2R1bGUgZnVuY3Rpb25cbiBcdFx0bW9kdWxlc1ttb2R1bGVJZF0uY2FsbChtb2R1bGUuZXhwb3J0cywgbW9kdWxlLCBtb2R1bGUuZXhwb3J0cywgX193ZWJwYWNrX3JlcXVpcmVfXyk7XG5cbiBcdFx0Ly8gRmxhZyB0aGUgbW9kdWxlIGFzIGxvYWRlZFxuIFx0XHRtb2R1bGUubCA9IHRydWU7XG5cbiBcdFx0Ly8gUmV0dXJuIHRoZSBleHBvcnRzIG9mIHRoZSBtb2R1bGVcbiBcdFx0cmV0dXJuIG1vZHVsZS5leHBvcnRzO1xuIFx0fVxuXG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlcyBvYmplY3QgKF9fd2VicGFja19tb2R1bGVzX18pXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm0gPSBtb2R1bGVzO1xuXG4gXHQvLyBleHBvc2UgdGhlIG1vZHVsZSBjYWNoZVxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5jID0gaW5zdGFsbGVkTW9kdWxlcztcblxuIFx0Ly8gZGVmaW5lIGdldHRlciBmdW5jdGlvbiBmb3IgaGFybW9ueSBleHBvcnRzXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmQgPSBmdW5jdGlvbihleHBvcnRzLCBuYW1lLCBnZXR0ZXIpIHtcbiBcdFx0aWYoIV9fd2VicGFja19yZXF1aXJlX18ubyhleHBvcnRzLCBuYW1lKSkge1xuIFx0XHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBuYW1lLCB7IGVudW1lcmFibGU6IHRydWUsIGdldDogZ2V0dGVyIH0pO1xuIFx0XHR9XG4gXHR9O1xuXG4gXHQvLyBkZWZpbmUgX19lc01vZHVsZSBvbiBleHBvcnRzXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLnIgPSBmdW5jdGlvbihleHBvcnRzKSB7XG4gXHRcdGlmKHR5cGVvZiBTeW1ib2wgIT09ICd1bmRlZmluZWQnICYmIFN5bWJvbC50b1N0cmluZ1RhZykge1xuIFx0XHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBTeW1ib2wudG9TdHJpbmdUYWcsIHsgdmFsdWU6ICdNb2R1bGUnIH0pO1xuIFx0XHR9XG4gXHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCAnX19lc01vZHVsZScsIHsgdmFsdWU6IHRydWUgfSk7XG4gXHR9O1xuXG4gXHQvLyBjcmVhdGUgYSBmYWtlIG5hbWVzcGFjZSBvYmplY3RcbiBcdC8vIG1vZGUgJiAxOiB2YWx1ZSBpcyBhIG1vZHVsZSBpZCwgcmVxdWlyZSBpdFxuIFx0Ly8gbW9kZSAmIDI6IG1lcmdlIGFsbCBwcm9wZXJ0aWVzIG9mIHZhbHVlIGludG8gdGhlIG5zXG4gXHQvLyBtb2RlICYgNDogcmV0dXJuIHZhbHVlIHdoZW4gYWxyZWFkeSBucyBvYmplY3RcbiBcdC8vIG1vZGUgJiA4fDE6IGJlaGF2ZSBsaWtlIHJlcXVpcmVcbiBcdF9fd2VicGFja19yZXF1aXJlX18udCA9IGZ1bmN0aW9uKHZhbHVlLCBtb2RlKSB7XG4gXHRcdGlmKG1vZGUgJiAxKSB2YWx1ZSA9IF9fd2VicGFja19yZXF1aXJlX18odmFsdWUpO1xuIFx0XHRpZihtb2RlICYgOCkgcmV0dXJuIHZhbHVlO1xuIFx0XHRpZigobW9kZSAmIDQpICYmIHR5cGVvZiB2YWx1ZSA9PT0gJ29iamVjdCcgJiYgdmFsdWUgJiYgdmFsdWUuX19lc01vZHVsZSkgcmV0dXJuIHZhbHVlO1xuIFx0XHR2YXIgbnMgPSBPYmplY3QuY3JlYXRlKG51bGwpO1xuIFx0XHRfX3dlYnBhY2tfcmVxdWlyZV9fLnIobnMpO1xuIFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkobnMsICdkZWZhdWx0JywgeyBlbnVtZXJhYmxlOiB0cnVlLCB2YWx1ZTogdmFsdWUgfSk7XG4gXHRcdGlmKG1vZGUgJiAyICYmIHR5cGVvZiB2YWx1ZSAhPSAnc3RyaW5nJykgZm9yKHZhciBrZXkgaW4gdmFsdWUpIF9fd2VicGFja19yZXF1aXJlX18uZChucywga2V5LCBmdW5jdGlvbihrZXkpIHsgcmV0dXJuIHZhbHVlW2tleV07IH0uYmluZChudWxsLCBrZXkpKTtcbiBcdFx0cmV0dXJuIG5zO1xuIFx0fTtcblxuIFx0Ly8gZ2V0RGVmYXVsdEV4cG9ydCBmdW5jdGlvbiBmb3IgY29tcGF0aWJpbGl0eSB3aXRoIG5vbi1oYXJtb255IG1vZHVsZXNcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubiA9IGZ1bmN0aW9uKG1vZHVsZSkge1xuIFx0XHR2YXIgZ2V0dGVyID0gbW9kdWxlICYmIG1vZHVsZS5fX2VzTW9kdWxlID9cbiBcdFx0XHRmdW5jdGlvbiBnZXREZWZhdWx0KCkgeyByZXR1cm4gbW9kdWxlWydkZWZhdWx0J107IH0gOlxuIFx0XHRcdGZ1bmN0aW9uIGdldE1vZHVsZUV4cG9ydHMoKSB7IHJldHVybiBtb2R1bGU7IH07XG4gXHRcdF9fd2VicGFja19yZXF1aXJlX18uZChnZXR0ZXIsICdhJywgZ2V0dGVyKTtcbiBcdFx0cmV0dXJuIGdldHRlcjtcbiBcdH07XG5cbiBcdC8vIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbFxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5vID0gZnVuY3Rpb24ob2JqZWN0LCBwcm9wZXJ0eSkgeyByZXR1cm4gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iamVjdCwgcHJvcGVydHkpOyB9O1xuXG4gXHQvLyBfX3dlYnBhY2tfcHVibGljX3BhdGhfX1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5wID0gXCJcIjtcblxuXG4gXHQvLyBMb2FkIGVudHJ5IG1vZHVsZSBhbmQgcmV0dXJuIGV4cG9ydHNcbiBcdHJldHVybiBfX3dlYnBhY2tfcmVxdWlyZV9fKF9fd2VicGFja19yZXF1aXJlX18ucyA9IDApO1xuIiwiaW1wb3J0ICcuL2NvbXBvbmVudHMvbmF2aWdhdGlvbic7XHJcbmltcG9ydCAnLi9jb21wb25lbnRzL3NsaWRlcic7XHJcblxyXG5cclxuIiwiY29uc3QgJCA9IGpRdWVyeTtcclxuXHJcbiQoJy5jLW5hdmlnYXRpb24nKS5vbignbW91c2VlbnRlcicsICcubWVudS1pdGVtLWhhcy1jaGlsZHJlbicsIChlKSA9PiB7XHJcbiAgICBpZighJChlLmN1cnJlbnRUYXJnZXQpLnBhcmVudHMoJy5zdWItbWVudScpLmxlbmd0aCkge1xyXG4gICAgICAgICQoJy5tZW51ID4gLm1lbnUtaXRlbS5vcGVuJykuZmluZCgnPiBhID4gLm1lbnUtYnV0dG9uJykudHJpZ2dlcignY2xpY2snKTtcclxuICAgIH1cclxuXHJcbiAgICAkKGUuY3VycmVudFRhcmdldCkuYWRkQ2xhc3MoJ29wZW4nKTtcclxufSkub24oJ21vdXNlbGVhdmUnLCAnLm1lbnUtaXRlbS1oYXMtY2hpbGRyZW4nLCAoZSkgPT4ge1xyXG4gICAgJChlLmN1cnJlbnRUYXJnZXQpLnJlbW92ZUNsYXNzKCdvcGVuJyk7XHJcbn0pO1xyXG5cclxuXHJcbiQoJy5jLW5hdmlnYXRpb24nKS5vbignY2xpY2snLCAnLm1lbnUgLm1lbnUtYnV0dG9uJywgKGUpID0+IHtcclxuICAgIGUucHJldmVudERlZmF1bHQoKTtcclxuICAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7XHJcbiAgICBsZXQgbWVudUJ1dHRvbiA9ICQoZS5jdXJyZW50VGFyZ2V0KTtcclxuICAgIGxldCBtZW51TGluayA9IG1lbnVCdXR0b24ucGFyZW50KCk7XHJcbiAgICBsZXQgbWVudUl0ZW0gPSBtZW51TGluay5wYXJlbnQoKTtcclxuXHJcbiAgICBpZigkKG1lbnVJdGVtKS5oYXNDbGFzcygnb3BlbicpKXtcclxuICAgICAgICBtZW51SXRlbS5hZGQobWVudUl0ZW0uZmluZCgnLm1lbnUtaXRlbS5vcGVuID4gYSA+IC5tZW51LWJ1dHRvbicpLnRyaWdnZXIoJ2NsaWNrJykpLnJlbW92ZUNsYXNzKCdvcGVuJyk7XHJcbiAgICAgICAgbWVudUxpbmsuYXR0cignYXJpYS1oYXNwb3B1cCcsICd0cnVlJyk7XHJcbiAgICAgICAgbWVudUxpbmsuYXR0cignYXJpYS1leHBhbmRlZCcsICdmYWxzZScpO1xyXG4gICAgICAgIG1lbnVCdXR0b24uZmluZCgnLm1lbnUtYnV0dG9uLXNob3cnKS5hdHRyKCdhcmlhLWhpZGRlbicsICdmYWxzZScpO1xyXG4gICAgICAgIG1lbnVCdXR0b24uZmluZCgnLm1lbnUtYnV0dG9uLWhpZGUnKS5hdHRyKCdhcmlhLWhpZGRlbicsICd0cnVlJyk7XHJcbiAgICB9ZWxzZXsgICAgICBcclxuICAgICAgICBtZW51SXRlbS5zaWJsaW5ncygnLm9wZW4nKS5maW5kKCc+IGEgPiAubWVudS1idXR0b24nKS50cmlnZ2VyKCdjbGljaycpOyAgXHJcbiAgICAgICAgbWVudUl0ZW0uYWRkQ2xhc3MoJ29wZW4nKTtcclxuICAgICAgICBtZW51TGluay5hdHRyKCdhcmlhLWhhc3BvcHVwJywgJ2ZhbHNlJyk7XHJcbiAgICAgICAgbWVudUxpbmsuYXR0cignYXJpYS1leHBhbmRlZCcsICd0cnVlJyk7XHJcbiAgICAgICAgbWVudUJ1dHRvbi5maW5kKCcubWVudS1idXR0b24tc2hvdycpLmF0dHIoJ2FyaWEtaGlkZGVuJywgJ3RydWUnKTtcclxuICAgICAgICBtZW51QnV0dG9uLmZpbmQoJy5tZW51LWJ1dHRvbi1oaWRlJykuYXR0cignYXJpYS1oaWRkZW4nLCAnZmFsc2UnKTtcclxuICAgIH1cclxufSk7XHJcblxyXG5cclxuJChkb2N1bWVudCkub24oJ2NsaWNrJywgKGUpID0+IHtcclxuICAgIGlmKCQoJy5tZW51LWl0ZW0ub3BlbicpLmxlbmd0aCkge1xyXG4gICAgICAgICQoJy5tZW51ID4gLm1lbnUtaXRlbS5vcGVuID4gYSA+IC5tZW51LWJ1dHRvbicpLnRyaWdnZXIoJ2NsaWNrJyk7XHJcbiAgICB9XHJcbn0pOyIsImNvbnNvbGUubG9nKCdrZGprZmFhZmonKTsiXSwic291cmNlUm9vdCI6IiJ9
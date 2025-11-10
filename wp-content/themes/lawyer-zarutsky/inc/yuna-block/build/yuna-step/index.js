/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/yuna-step/edit.js":
/*!*******************************!*\
  !*** ./src/yuna-step/edit.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Edit)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./block.json */ "./src/yuna-step/block.json");

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */


/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */



// беремо enum прямо з block.json


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
/*import '../main-block/editor.scss';*/

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
function Edit({
  attributes,
  setAttributes
}) {
  const {
    blockTitle,
    blockSubTitle,
    blockSubText,
    anchorId,
    topIndent,
    bottomIndent,
    btnContactText,
    btnContactAnchor,
    btnContactColor,
    animationType,
    animationEasing,
    animationDuration,
    animationDelay
  } = attributes;
  const blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.useBlockProps)({
    className: topIndent + ' ' + bottomIndent
  });

  //Inner block
  const cardTemplate = [['yuna-blocks/step-inner', {}]];
  const ALLOWED_BLOCKS = ['yuna-blocks/step-inner'];

  // Отримуємо enum animationType з block.json
  const animationOptions = _block_json__WEBPACK_IMPORTED_MODULE_4__.attributes.animationType["enum"].map(value => ({
    label: value,
    value: value
  }));

  // Отримуємо enum animationEasing з block.json
  const animationEasingOptions = _block_json__WEBPACK_IMPORTED_MODULE_4__.attributes.animationEasing["enum"].map(value => ({
    label: value,
    value: value
  }));
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: 'Settings'
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: 'Якір блоку',
    help: 'Це ідентеуфікатор блоку, він має бути унікальним. За його допомогою можна звернутися до блоку в меню тощо',
    value: anchorId || '',
    onChange: value => setAttributes({
      anchorId: value
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: "\u0412\u0435\u0440\u0445\u043D\u0456\u0439 \u0432\u043D\u0443\u0442\u0440\u0456\u0448\u043D\u0456\u0439 \u0432\u0456\u0434\u0441\u0442\u0443\u043F:",
    onChange: value => setAttributes({
      topIndent: value
    }),
    value: attributes.topIndent,
    options: [{
      label: "Великий",
      value: "indent-top-big"
    }, {
      label: "Малий",
      value: "indent-top-small"
    }]
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: "\u041D\u0438\u0436\u043D\u0456\u0439 \u0432\u043D\u0443\u0442\u0440\u0456\u0448\u043D\u0456\u0439 \u0432\u0456\u0434\u0441\u0442\u0443\u043F:",
    onChange: value => setAttributes({
      bottomIndent: value
    }),
    value: attributes.bottomIndent,
    options: [{
      label: "Великий",
      value: "indent-bottom-big"
    }, {
      label: "Малий",
      value: "indent-bottom-small"
    }]
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: 'Анімація'
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Тип анімації'),
    value: animationType,
    options: animationOptions,
    onChange: value => setAttributes({
      animationType: value
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Тип руху анімації в часі'),
    value: animationEasing,
    options: animationEasingOptions,
    onChange: value => setAttributes({
      animationEasing: value
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: 'Час анімації',
    help: 'В мілісекундах, 1 секунда = 1000 мілісекунд',
    value: animationDuration || '',
    type: "number",
    onChange: value => setAttributes({
      animationDuration: value
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: 'Час затримки анімації між елементами анімації',
    help: 'В мілісекундах, 1 секунда = 1000 мілісекунд',
    value: animationDelay || '',
    type: "number",
    onChange: value => setAttributes({
      animationDelay: value
    })
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: 'Кнопка'
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: "\u041A\u043E\u043B\u0456\u0440 \u043A\u043D\u043E\u043F\u043A\u0438:",
    onChange: value => setAttributes({
      btnContactColor: value
    }),
    value: attributes.btnContactColor,
    options: [{
      label: "Золотий",
      value: "golden-btn"
    }, {
      label: "Прозорий",
      value: "transparent-btn"
    }]
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: 'ID якоря',
    help: 'ID блоку чи модального вікна на які має вести кнопка',
    value: btnContactAnchor || '',
    onChange: value => setAttributes({
      btnContactAnchor: value
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: 'Текст кнопки',
    value: btnContactText || '',
    onChange: value => setAttributes({
      btnContactText: value
    })
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("section", {
    ...blockProps
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "container"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "row"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText, {
    tagName: "h2",
    className: 'block-title',
    value: attributes.blockTitle,
    placeholder: 'Заголовок блоку',
    onChange: value => setAttributes({
      blockTitle: value
    }),
    allowedFormats: ['core/text-color']
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText, {
    tagName: "h3",
    className: 'block-subtitle',
    value: attributes.blockSubTitle,
    placeholder: 'Підзаголовок блоку',
    onChange: value => setAttributes({
      blockSubTitle: value
    }),
    allowedFormats: ['core/bold', 'core/text-color']
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText, {
    tagName: "p",
    className: 'block-text',
    value: attributes.blockSubText,
    placeholder: 'Текст блоку',
    onChange: value => setAttributes({
      blockSubText: value
    }),
    allowedFormats: ['core/bold', ['core/link'], 'core/text-color']
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "row card-list"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InnerBlocks, {
    template: cardTemplate,
    allowedBlocks: ALLOWED_BLOCKS
  })))));
}

/***/ }),

/***/ "./src/yuna-step/index.js":
/*!********************************!*\
  !*** ./src/yuna-step/index.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./style.scss */ "./src/yuna-step/style.scss");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./edit */ "./src/yuna-step/edit.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./block.json */ "./src/yuna-step/block.json");

/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */



/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


/**
 * Internal dependencies
 */



/*const blockIcon = (
	<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 122.88 118.3" style="enable-background:new 0 0 122.88 118.3" ><g><path class="st0" d="M7.51,0h107.85c2.05,0,3.93,0.85,5.29,2.21v0l0.01,0.01l0.01,0.01l0.01,0.01c1.36,1.37,2.2,3.24,2.2,5.29 v103.28c0,2.07-0.85,3.95-2.21,5.31c-1.36,1.36-3.24,2.21-5.31,2.21H7.51c-2.05,0-3.93-0.84-5.3-2.21l-0.01-0.01l-0.01-0.01 l-0.01-0.01c-1.36-1.37-2.2-3.24-2.2-5.29V7.51C0,5.44,0.84,3.56,2.2,2.2c0.08-0.08,0.16-0.16,0.25-0.23C3.79,0.75,5.57,0,7.51,0 L7.51,0z M65.79,98.75c-1.58,0-2.86-1.39-2.86-3.11c0-1.72,1.28-3.11,2.86-3.11h35.22c1.58,0,2.86,1.39,2.86,3.11 c0,1.72-1.28,3.11-2.86,3.11H65.79L65.79,98.75z M20.82,98.75c-1.56,0-2.83-1.39-2.83-3.11c0-1.72,1.27-3.11,2.83-3.11h32.65 c1.56,0,2.83,1.39,2.83,3.11c0,1.72-1.27,3.11-2.83,3.11H20.82L20.82,98.75z M19.69,85.16c-1.56,0-2.83-1.39-2.83-3.11 c0-1.72,1.27-3.11,2.83-3.11h32.65c1.56,0,2.83,1.39,2.83,3.11c0,1.72-1.27,3.11-2.83,3.11H19.69L19.69,85.16z M65.79,85.16 c-1.58,0-2.86-1.39-2.86-3.11c0-1.72,1.28-3.11,2.86-3.11h35.22c1.58,0,2.86,1.39,2.86,3.11c0,1.72-1.28,3.11-2.86,3.11H65.79 L65.79,85.16z M17.59,34.77h85.94v33.65H17.59V34.77L17.59,34.77z M116.09,26.93c-0.24,0.04-0.48,0.06-0.72,0.06H7.51 c-0.25,0-0.49-0.02-0.72-0.06v83.86c0,0.2,0.08,0.38,0.2,0.51l0,0l0.01,0.01c0.13,0.13,0.3,0.2,0.51,0.2h107.85 c0.19,0,0.37-0.08,0.51-0.22c0.13-0.13,0.22-0.31,0.22-0.51V26.93L116.09,26.93z M50.12,9.7c2.7,0,4.88,2.19,4.88,4.88 s-2.19,4.88-4.88,4.88s-4.88-2.19-4.88-4.88S47.43,9.7,50.12,9.7L50.12,9.7z M33.05,9.7c2.7,0,4.88,2.19,4.88,4.88 s-2.19,4.88-4.88,4.88c-2.7,0-4.88-2.19-4.88-4.88S30.36,9.7,33.05,9.7L33.05,9.7z M15.99,9.7c2.7,0,4.88,2.19,4.88,4.88 s-2.19,4.88-4.88,4.88c-2.7,0-4.88-2.19-4.88-4.88S13.29,9.7,15.99,9.7L15.99,9.7z"/></g></svg>
);*/

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockType)(_block_json__WEBPACK_IMPORTED_MODULE_5__.name, {
  /**
   * @see ./edit.js
   */
  /*icon: blockIcon,*/
  edit: _edit__WEBPACK_IMPORTED_MODULE_4__["default"],
  save: props => {
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InnerBlocks.Content, null);
  }
});

/***/ }),

/***/ "./src/yuna-step/style.scss":
/*!**********************************!*\
  !*** ./src/yuna-step/style.scss ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

module.exports = window["React"];

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "./src/yuna-step/block.json":
/*!**********************************!*\
  !*** ./src/yuna-step/block.json ***!
  \**********************************/
/***/ ((module) => {

module.exports = /*#__PURE__*/JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"yuna-blocks/step","version":"0.1.0","title":"Блок з перліком","icon":"index-card","category":"yuna-block-category","description":"Блок з перліком","example":{},"attributes":{"anchorId":{"type":"string"},"blockName":{"type":"string"},"topIndent":{"enum":["indent-top-big","indent-top-small"],"default":"indent-top-big","type":"string"},"bottomIndent":{"enum":["indent-bottom-big","indent-bottom-small"],"default":"indent-bottom-big","type":"string"},"blockTitle":{"type":"string"},"blockSubTitle":{"type":"string"},"blockSubText":{"type":"string"},"btnContactColor":{"enum":["golden-btn","transparent-btn"],"default":"golden-btn","type":"string"},"btnContactText":{"type":"string"},"btnContactAnchor":{"type":"string"},"animationType":{"enum":["fade","fade-up","fade-down","fade-left","fade-right","fade-up-right","fade-up-left","fade-down-right","fade-down-left","flip-up","flip-down","flip-left","flip-right","slide-up","slide-down","slide-left","slide-right","zoom-in","zoom-in-up","zoom-in-down","zoom-in-left","zoom-in-right","zoom-out","zoom-out-up","zoom-out-down","zoom-out-left","zoom-out-right"],"default":"fade-up","type":"string"},"animationEasing":{"enum":["linear","ease","ease-in","ease-out","ease-in-out","ease-in-back","ease-out-back","ease-in-out-back","ease-in-sine","ease-out-sine","ease-in-out-sine","ease-in-quad","ease-out-quad","ease-in-out-quad","ease-in-cubic","ease-out-cubic","ease-in-out-cubic","ease-in-quart","ease-out-quart","ease-in-out-quart"],"default":"ease-out","type":"string"},"animationDuration":{"type":"number","default":300},"animationDelay":{"type":"number","default":100}},"providesContext":{"yuna/steps:btnContactColor":"btnContactColor","yuna/steps:btnContactText":"btnContactText","yuna/steps:btnContactAnchor":"btnContactAnchor","yuna/steps:animationType":"animationType","yuna/steps:animationEasing":"animationEasing","yuna/steps:animationDuration":"animationDuration","yuna/steps:animationDelay":"animationDelay"},"supports":{"color":{"background":true,"text":true,"heading":true,"gradients":true},"spacing":{"padding":true,"margin":true},"html":false},"textdomain":"yuna","editorScript":"file:./index.js","editorStyle":"file:./index.css","style":"file:./style-index.css","render":"file:./render.php","viewScript":"file:./view.js"}');

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
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"yuna-step/index": 0,
/******/ 			"yuna-step/style-index": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = globalThis["webpackChunkyuna_gb"] = globalThis["webpackChunkyuna_gb"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["yuna-step/style-index"], () => (__webpack_require__("./src/yuna-step/index.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map
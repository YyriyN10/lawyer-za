/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/our-steps-inner/edit.js":
/*!*************************************!*\
  !*** ./src/our-steps-inner/edit.js ***!
  \*************************************/
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
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./editor.scss */ "./src/our-steps-inner/editor.scss");

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





/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


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
  setAttributes,
  clientId
}) {
  var _attributes$blockInde;
  const {
    itemName,
    itemDescription,
    itemIconUrl,
    itemIconId,
    itemIconAlt
  } = attributes;

  //Block index
  const {
    blockIndexAttr
  } = {
    blockIndexAttr: (_attributes$blockInde = attributes.blockIndex) !== null && _attributes$blockInde !== void 0 ? _attributes$blockInde : 0
  };
  const index = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_4__.useSelect)(select => {
    const be = select('core/block-editor');
    const rootId = be.getBlockRootClientId(clientId); // батьківський блок
    const idx = be.getBlockIndex(clientId, rootId); // 0-based індекс
    return typeof idx === 'number' ? idx : 0;
  }, [clientId]);
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_5__.useEffect)(() => {
    if (index !== blockIndexAttr) {
      setAttributes({
        blockIndex: index
      });
    }
  }, [index]);
  const blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.useBlockProps)();

  //Select icon
  const onSelectImage = media => {
    setAttributes({
      itemIconUrl: media?.url || '',
      itemIconId: media?.id || 0,
      itemIconAlt: media?.alt || ''
    });
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    ...blockProps
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "image-block"
  }, itemIconUrl ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
    src: itemIconUrl,
    alt: itemIconAlt,
    style: {
      maxWidth: '50%'
    }
  }) : (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, "\u0417\u043E\u0431\u0440\u0430\u0436\u0435\u043D\u043D\u044F \u043D\u0435 \u0432\u0438\u0431\u0440\u0430\u043D\u043E"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.MediaUploadCheck, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.MediaUpload, {
    onSelect: onSelectImage,
    allowedTypes: ['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'],
    render: ({
      open
    }) => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
      onClick: open,
      variant: "primary"
    }, itemIconUrl ? 'Змінити зображення' : 'Завантажити зображення')
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText, {
    tagName: "p",
    className: 'item-name',
    value: attributes.itemName,
    placeholder: 'Назва блоку',
    style: {
      maxWidth: '50%'
    },
    onChange: value => setAttributes({
      itemName: value
    }),
    allowedFormats: ['core/bold', 'core/italic', 'core/text-color']
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText, {
    tagName: "p",
    className: 'item-description',
    value: attributes.itemDescription,
    placeholder: 'Кроткий опис',
    style: {
      maxWidth: '50%'
    },
    onChange: value => setAttributes({
      itemDescription: value
    }),
    allowedFormats: []
  })));
}

/***/ }),

/***/ "./src/our-steps-inner/index.js":
/*!**************************************!*\
  !*** ./src/our-steps-inner/index.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./style.scss */ "./src/our-steps-inner/style.scss");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./edit */ "./src/our-steps-inner/edit.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./block.json */ "./src/our-steps-inner/block.json");

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


const blockIcon = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  "shape-rendering": "geometricPrecision",
  "text-rendering": "geometricPrecision",
  "image-rendering": "optimizeQuality",
  "fill-rule": "evenodd",
  "clip-rule": "evenodd",
  viewBox: "0 0 444 511.89"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  d: "m141.96 202.46 74.34-41.56v-50.41c-12.75-7.47-25.72-14.71-38.4-22.26-.17.13-.34.26-.53.37L99.7 133.52v43.32l.08.05 42.18 25.57zm36.25 220.13 38.09-21.3v-49.97l-76.57-44.46-40.07 23.13c.03.74.04 1.58.04 2.56v44.62l78.51 45.42zm48.63-21.85 37.29 21.59.95.52 79.22-45.81.02-45.91-41.28-23.83-76.2 44.31v49.13zm44.61 30.24.03 2.21v48.4c0 1.42-.66 2.69-1.94 3.35l-43.69 25.42c-3.2 1.86-3.58 2.12-6.77.23-14.38-8.47-29.07-16.62-43.36-25.2-3.33-1.92-4.01-2.08-3.93-5.95l.01-48.75-76.91-44.49-.19-.12-40.63 23.63c-3.2 1.86-3.58 2.12-6.77.24-14.38-8.48-29.07-16.62-43.36-25.2-3.33-1.93-4.01-2.09-3.93-5.96l.01-51.35c0-1.84 1.33-2.64 2.66-3.41l.17-.09 1.32-.74 41.55-23.22v-89.47c-13.88-8.14-28.02-16-41.78-24.26-3.33-1.93-4.01-2.09-3.93-5.96l.01-51.35c0-1.84 1.33-2.64 2.66-3.41l.17-.09 1.32-.74 44.01-24.6c1.92-1.06 2.51-1.01 4.39.05l39.78 23.03 2.45 1.36 76.99-44.52.01-50.41c0-1.84 1.33-2.64 2.66-3.41l.17-.09 1.32-.74L219.96.77c1.92-1.06 2.51-1.01 4.39.06l39.78 23.03 2.52 1.39c4.23 2.26 4.83 2.58 4.83 9.47v45.17l76.58 44.28.16.1 43.24-24.17c1.91-1.06 2.51-1.01 4.39.05l39.78 23.03 2.52 1.4c4.22 2.26 4.83 2.58 4.83 9.47v48.39c0 1.42-.66 2.69-1.95 3.35l-43.01 25.03-.03 88.49 38.66 22.38 2.52 1.39c4.22 2.26 4.83 2.59 4.83 9.47v48.39c0 1.43-.66 2.69-1.95 3.36l-43.69 25.41c-3.2 1.86-3.57 2.12-6.76.24-13.88-8.18-28.03-16.05-41.85-24.3l-.46.32-77.84 45.01zm-86.81-2.56 37.65 22.68 36.17-21.96.07-.42-35.52-22.12c-.46.13-.94.2-1.44.2-.23 0-.47-.01-.69-.05l-36.24 21.67zm34.01 73.78v-44.84l-38.01-22.62c-.53.08-1.07.06-1.61-.06v44.24l39.62 23.28zm44.26-67-37.02 22.18v44.87l38.35-22.65v-44.58c-.44.13-.88.19-1.33.18zm-36.07-323.9v49.67l74.1 42.94 42.1-24.33.24-.14.02-46.21-76.18-44.06c-.35-.2-.68-.45-.96-.74l-39.32 22.87zm-42.2-81.36 37.65 22.68 36.55-22.19-36.75-22.88-37.45 22.39zm34.01 73.79V58.88l-39.62-23.57v45.13l39.62 23.29zm45.59-67.8L225.89 58.9v44.87l38.35-22.65V35.93zm124.53 264.74c-.03-.25-.04-.49-.04-.74l.05-89.54c-13.02-7.64-26.27-15.03-39.22-22.74-.35.39-.78.74-1.26 1.02l-41.95 24.24v84.19l43.69 25.22 38.73-21.65zm-35.06 33.76c-.68.24-1.43.34-2.16.28v43.56l39.62 23.29v-44.85l-37.46-22.28zm3.45-6.66 37.64 22.68 36.56-22.19-36.76-22.88-37.44 22.39zm79.6 5.99-38.36 22.97v44.87l38.36-22.65v-45.19zM92.7 321.88l42.38-24.47v-86.86l-39.11-23.72-40.99 23.85v89.37l37.37 21.64.35.19zm-42.12-16.33-.23.01-.32-.01-37.17 22.22 37.65 22.68 36.55-22.19-36.48-22.71zm-3.71 96.01v-44.85L7.25 333.14v45.13l39.62 23.29zm45.59-67.8-38.35 22.97v44.87l38.35-22.65v-45.19zm-.61-152.95c.07-.67.28-1.32.61-1.94v-43.61l-38.35 22.97v44.87l37.74-22.29zm-78.99-51.54 37.65 22.68 36.55-22.19-36.75-22.88-37.45 22.39zm34.01 73.79v-44.85L7.25 134.64v45.13l39.62 23.29zm309.27-73.79 37.64 22.68 36.56-22.19-36.76-22.88-37.44 22.39zm34.01 73.79v-44.85l-39.62-23.57v45.13l39.62 23.29zm45.59-67.8-38.36 22.97v44.87l38.36-22.65v-45.19zM217.32 341.93v-82.99l-73.25-43.58v83.52l73.25 43.05zm80.02-125.5-71.02 42.56v83.02l71.02-41.95v-83.63zm-75.81-48.7-69.33 41.45 69.65 41.97 67.68-41.09-68-42.33z"
}));

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockType)(_block_json__WEBPACK_IMPORTED_MODULE_5__.name, {
  /**
   * @see ./edit.js
   */
  icon: blockIcon,
  edit: _edit__WEBPACK_IMPORTED_MODULE_4__["default"],
  save: props => {
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InnerBlocks.Content, null);
  }
});

/***/ }),

/***/ "./src/our-steps-inner/editor.scss":
/*!*****************************************!*\
  !*** ./src/our-steps-inner/editor.scss ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/our-steps-inner/style.scss":
/*!****************************************!*\
  !*** ./src/our-steps-inner/style.scss ***!
  \****************************************/
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

/***/ "@wordpress/data":
/*!******************************!*\
  !*** external ["wp","data"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["data"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "./src/our-steps-inner/block.json":
/*!****************************************!*\
  !*** ./src/our-steps-inner/block.json ***!
  \****************************************/
/***/ ((module) => {

module.exports = /*#__PURE__*/JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"yuna-blocks/our-steps-inner","version":"0.1.0","title":"Внутрішня картка","category":"yuna-inner-block-category","icon":"dashicons-block-default","description":"Внутрішня картка","example":{},"attributes":{"itemIconUrl":{"type":"string","default":""},"itemIconId":{"type":"number","default":0},"itemIconAlt":{"type":"number","default":0},"itemName":{"type":"string"},"itemDescription":{"type":"string"},"blockIndex":{"type":"number","default":0}},"supports":{"color":{"background":true,"text":true},"html":false},"parent":["yuna-blocks/our-steps"],"textdomain":"yuna","editorScript":"file:./index.js","editorStyle":"file:./index.css","style":"file:./style-index.css","render":"file:./render.php"}');

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
/******/ 			"our-steps-inner/index": 0,
/******/ 			"our-steps-inner/style-index": 0
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
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["our-steps-inner/style-index"], () => (__webpack_require__("./src/our-steps-inner/index.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map
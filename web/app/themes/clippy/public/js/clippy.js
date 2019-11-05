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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./css/clippy-admin.scss":
/*!*******************************!*\
  !*** ./css/clippy-admin.scss ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./css/clippy.scss":
/*!*************************!*\
  !*** ./css/clippy.scss ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./js/Components/SubmitIssue.ts":
/*!**************************************!*\
  !*** ./js/Components/SubmitIssue.ts ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

Object.defineProperty(exports, "__esModule", { value: true });
var SubmitIssue = /** @class */ (function () {
    function SubmitIssue() {
        var _this = this;
        document.querySelectorAll('a.submit-issue').forEach(function (ele) {
            ele.addEventListener('click', function (e) {
                e.preventDefault();
                _this.show();
                return false;
            });
        });
        this.modal = document.getElementById('submit-issue-modal');
        this.form = this.modal.querySelector('form');
        this.form.addEventListener('submit', function (e) {
            e.preventDefault();
            _this.submitIssue();
            return false;
        });
        this.modal.querySelector('a.cancel-modal').addEventListener('click', function (e) {
            e.preventDefault();
            _this.hide();
            return false;
        });
    }
    SubmitIssue.prototype.show = function () {
        document.body.classList.add('no-scroll');
        grecaptcha.reset();
        this.form.reset();
        this.modal.classList.remove('hidden');
    };
    SubmitIssue.prototype.hide = function () {
        document.body.classList.remove('no-scroll');
        this.modal.classList.add('hidden');
    };
    SubmitIssue.prototype.submitIssue = function () {
        var formData = new FormData(this.form);
        jQuery.ajax({
            url: '/issues/submit',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: this.submitSuccess.bind(this),
            error: this.submitError.bind(this)
        });
    };
    SubmitIssue.prototype.submitSuccess = function (response) {
        alert("Thanks for submitting your question or issue!  All follow up will be via email.");
        this.hide();
    };
    SubmitIssue.prototype.submitError = function () {
        alert("There was an error submitting your question or issue.  Please wait a few minutes and then try again.");
    };
    return SubmitIssue;
}());
exports.default = SubmitIssue;


/***/ }),

/***/ "./js/Nav/AutoScroller.ts":
/*!********************************!*\
  !*** ./js/Nav/AutoScroller.ts ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

Object.defineProperty(exports, "__esModule", { value: true });
var AutoScroller = /** @class */ (function () {
    function AutoScroller() {
    }
    AutoScroller.init = function () {
        console.log(location.hash);
        if (location.hash) {
            var anchorTarget = document.querySelector('[name="' + location.hash.replace('#', '') + '"]');
            if (anchorTarget == null) {
                anchorTarget = document.querySelector('[id="' + location.hash.replace('#', '') + '"]');
            }
            console.log(anchorTarget);
            if (anchorTarget != null) {
                setTimeout(function () {
                    jQuery('html, body').scrollTop(0).show();
                    jQuery("html, body").animate({
                        scrollTop: jQuery(anchorTarget).offset().top
                    }, 1500, 'swing');
                }, 0);
            }
        }
        document.querySelectorAll('a[href*="#"]').forEach(function (anchor) {
            if ((anchor.hostname == document.location.hostname) && (anchor.pathname == document.location.pathname)) {
                var anchorParts = anchor.href.split('#');
                if (anchorParts.length == 2) {
                    var anchorTarget = document.querySelector('[name="' + anchorParts[1] + '"]');
                    if (anchorTarget == null) {
                        anchorTarget = document.querySelector('[id="' + anchorParts[1] + '"]');
                    }
                    if (anchorTarget) {
                        anchor.addEventListener('click', function (e) {
                            e.preventDefault();
                            document.body.classList.remove('snap');
                            jQuery("html, body").animate({
                                scrollTop: jQuery(anchorTarget).offset().top
                            }, 1500, 'swing');
                            history.pushState(null, null, anchor.href);
                            return false;
                        });
                    }
                }
            }
        });
    };
    return AutoScroller;
}());
exports.default = AutoScroller;


/***/ }),

/***/ "./js/Nav/TOC/TOC.ts":
/*!***************************!*\
  !*** ./js/Nav/TOC/TOC.ts ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

Object.defineProperty(exports, "__esModule", { value: true });
var TOCEntry_1 = __webpack_require__(/*! ./TOCEntry */ "./js/Nav/TOC/TOCEntry.ts");
var TOC = /** @class */ (function () {
    function TOC(toc) {
        var _this = this;
        this.entries = [];
        this.animTimer = null;
        this.windowHeight = null;
        this.currentEntry = null;
        this.toc = toc;
        this.toc.querySelectorAll('li[data-tracks]').forEach(function (li) {
            var tracked = document.getElementById(li.dataset.tracks);
            if (tracked != null) {
                var entry = new TOCEntry_1.default(li, tracked);
                _this.entries.push(entry);
                if (entry.current()) {
                    _this.currentEntry = entry;
                }
            }
        });
        this.windowHeight = window.innerHeight;
        window.addEventListener('scroll', function () {
            cancelAnimationFrame(_this.animTimer);
            _this.animTimer = requestAnimationFrame(_this.processScroll.bind(_this));
        });
        window.addEventListener('resize', function () {
            _this.windowHeight = window.innerHeight;
        });
    }
    TOC.prototype.processScroll = function () {
        var _this = this;
        this.entries.forEach(function (entry) {
            if (entry.test(_this.windowHeight)) {
                if (entry != _this.currentEntry) {
                    _this.currentEntry.li.classList.remove('current');
                    _this.currentEntry = entry;
                }
            }
        });
    };
    TOC.bind = function () {
        document.querySelectorAll('ul[data-tracked]').forEach(function (ul) {
            new TOC(ul);
        });
    };
    return TOC;
}());
exports.default = TOC;


/***/ }),

/***/ "./js/Nav/TOC/TOCEntry.ts":
/*!********************************!*\
  !*** ./js/Nav/TOC/TOCEntry.ts ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

Object.defineProperty(exports, "__esModule", { value: true });
var TOCEntry = /** @class */ (function () {
    function TOCEntry(li, tracked) {
        this.li = li;
        this.tracked = tracked;
    }
    TOCEntry.prototype.test = function (windowHeight) {
        var top = this.tracked.getBoundingClientRect().top;
        if ((top > -10) && (top < windowHeight * 0.25)) {
            this.li.classList.add('current');
            return true;
        }
        return false;
    };
    TOCEntry.prototype.current = function () {
        return this.li.classList.contains('current');
    };
    return TOCEntry;
}());
exports.default = TOCEntry;


/***/ }),

/***/ "./js/Tools/Breakpoints.ts":
/*!*********************************!*\
  !*** ./js/Tools/Breakpoints.ts ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

Object.defineProperty(exports, "__esModule", { value: true });
var Breakpoints = /** @class */ (function () {
    function Breakpoints() {
        this.debug = false;
        this.next = null;
        this.active = null;
        this.breakpoints = null;
        this.debugDiv = null;
        this.listeners = [];
        this.debug = false;
        this.next = null;
        this.active = null;
        var breakpointEle = document.getElementById('breakpoints');
        if (!breakpointEle) {
            return;
        }
        var data = null;
        if (breakpointEle != null) {
            data = window.getComputedStyle(breakpointEle, '::after').content;
            data = data.replace(/[']/g, '"').replace(/\\|^[\s\S]{0,1}|[\s\S]$/g, '');
        }
        if (data && (data != 'on') && !(/^\s*$/.test(data))) {
            this.breakpoints = JSON.parse(data);
        }
        else {
            this.breakpoints = [];
        }
        if (document.body.classList.contains('debug')) {
            this.debug = true;
            this.debugDiv = document.getElementById('breakpoint-debug');
        }
        if (this.breakpoints.length > 0) {
            window.addEventListener('resize', function () {
                this.update();
            }.bind(this));
            this.update();
        }
    }
    Breakpoints.prototype.addListener = function (listener) {
        this.listeners.push(listener);
    };
    Breakpoints.prototype.update = function () {
        var iw = window.innerWidth;
        var changed = false;
        var lastActiveName = (this.active != null) ? this.active.name : null;
        this.active = null;
        this.next = null;
        if (iw >= this.breakpoints[this.breakpoints.length - 1].size) {
            this.active = this.breakpoints[this.breakpoints.length - 1];
            changed = (lastActiveName != this.active.name);
        }
        else {
            for (var i = 0; i < this.breakpoints.length; i++) {
                if (iw < this.breakpoints[i].size) {
                    if (i > 0) {
                        this.active = this.breakpoints[i - 1];
                        changed = (lastActiveName != this.active.name);
                    }
                    this.next = this.breakpoints[i];
                    break;
                }
            }
        }
        if (changed) {
            this.listeners.forEach(function (listener) {
                listener.breakpointChanged();
            }.bind(this));
            // let event:Event = new Event('breakpointChanged');
            // document.dispatchEvent(event);
        }
        if (this.debug && this.debugDiv) {
            var text = '';
            if (this.active && this.next) {
                text = text + ' ≥ ' + this.active.name + ' (' + this.active.size + 'px)' + '  and  < ' + this.next.name + ' (' + this.next.size + 'px)';
            }
            else if (!this.next) {
                text = text + ' ≥ ' + this.breakpoints[this.breakpoints.length - 1].name + ' (' + this.breakpoints[this.breakpoints.length - 1].size + 'px)';
            }
            text = text + ' — ' + window.innerWidth + 'px';
            this.debugDiv.innerText = text;
        }
    };
    return Breakpoints;
}());
exports.default = Breakpoints;


/***/ }),

/***/ "./js/clippy.ts":
/*!**********************!*\
  !*** ./js/clippy.ts ***!
  \**********************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

Object.defineProperty(exports, "__esModule", { value: true });
var Breakpoints_1 = __webpack_require__(/*! ./Tools/Breakpoints */ "./js/Tools/Breakpoints.ts");
var AutoScroller_1 = __webpack_require__(/*! ./Nav/AutoScroller */ "./js/Nav/AutoScroller.ts");
var TOC_1 = __webpack_require__(/*! ./Nav/TOC/TOC */ "./js/Nav/TOC/TOC.ts");
var SubmitIssue_1 = __webpack_require__(/*! ./Components/SubmitIssue */ "./js/Components/SubmitIssue.ts");
var breakpoints = null;
document.addEventListener('DOMContentLoaded', function () {
    breakpoints = new Breakpoints_1.default();
    new SubmitIssue_1.default();
    TOC_1.default.bind();
});
AutoScroller_1.default.init();


/***/ }),

/***/ 0:
/*!**********************************************************************!*\
  !*** multi ./js/clippy.ts ./css/clippy.scss ./css/clippy-admin.scss ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/jong/Projects/iLAB/MediaCloudSite/helpdesk/site/web/app/themes/clippy/assets/js/clippy.ts */"./js/clippy.ts");
__webpack_require__(/*! /Users/jong/Projects/iLAB/MediaCloudSite/helpdesk/site/web/app/themes/clippy/assets/css/clippy.scss */"./css/clippy.scss");
module.exports = __webpack_require__(/*! /Users/jong/Projects/iLAB/MediaCloudSite/helpdesk/site/web/app/themes/clippy/assets/css/clippy-admin.scss */"./css/clippy-admin.scss");


/***/ })

/******/ });
//# sourceMappingURL=clippy.js.map
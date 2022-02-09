(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

(function () {
  "use strict";
  // breakpoint where swiper will be destroyed
  // and switches to a dual-column layout

  var breakpoint = window.matchMedia("(min-width:31.25em)");
  // keep track of swiper instances to destroy later
  var mySwiper;
  var firstSlider = mySwiper;

  var breakpointChecker = function breakpointChecker() {
    // if larger viewport and multi-row layout needed
    if (breakpoint.matches === true) {
      // clean up old instances and inline styles when available
      if (firstSlider !== undefined) firstSlider.destroy(true, true);
      // or/and do nothing
      return;
      // else if a small viewport and single column layout needed
    } else if (breakpoint.matches === false) {
      // fire small viewport version of swiper
      return firstslider();
    }
  };

  var firstslider = function firstslider() {
    firstSlider = new Swiper(".js-howit-Works", {
      loop: false,
      slidesPerView: 1.2,
      // a11y: true,
      keyboardControl: true,
      grabCursor: true
    });
  };

  // keep an eye on viewport size changes
  breakpoint.addListener(breakpointChecker);
  // kickstart
  breakpointChecker();
})(); /* IIFE end */

(function () {
  "use strict";
  // breakpoint where swiper will be destroyed
  // and switches to a dual-column layout

  var breakpoint = window.matchMedia("(min-width: 992px)");
  // keep track of swiper instances to destroy later
  var mySwiper12;
  var secondSlider = mySwiper12;

  var breakpointChecker = function breakpointChecker() {
    // if larger viewport and multi-row layout needed
    if (breakpoint.matches === true) {
      // clean up old instances and inline styles when available
      if (secondSlider !== undefined) secondSlider.destroy(true, true);
      // or/and do nothing
      return;
      // else if a small viewport and single column layout needed
    } else if (breakpoint.matches === false) {
      // fire small viewport version of swiper
      return Secondslider();
    }
  };

  var Secondslider = function Secondslider() {
    secondSlider = new Swiper(".js-ourNumbers", {
      loop: false,
      slidesPerView: 1.2,
      spaceBetween: 15,
      // a11y: true,
      keyboardControl: true,
      grabCursor: true,
      breakpoints: {
        320: {
          slidesPerView: 1.2
        },
        769: {
          slidesPerView: 2.2
        }
      }
    });
  };

  // keep an eye on viewport size changes
  breakpoint.addListener(breakpointChecker);
  // kickstart
  breakpointChecker();
})(); /* IIFE end */

(function () {
  "use strict";
  // breakpoint where swiper will be destroyed
  // and switches to a dual-column layout

  var breakpoint = window.matchMedia("(min-width:31.25em)");
  // keep track of swiper instances to destroy later
  var mySwiper13;
  var thirdsecondSlider = mySwiper13;

  var breakpointChecker = function breakpointChecker() {
    // if larger viewport and multi-row layout needed
    if (breakpoint.matches === true) {
      // clean up old instances and inline styles when available
      if (thirdsecondSlider !== undefined) thirdsecondSlider.destroy(true, true);
      // or/and do nothing
      return;
      // else if a small viewport and single column layout needed
    } else if (breakpoint.matches === false) {
      // fire small viewport version of swiper
      return Thirdslider();
    }
  };

  var Thirdslider = function Thirdslider() {
    thirdsecondSlider = new Swiper(".js-manufacturing", {
      loop: false,
      slidesPerView: 1.2,
      // a11y: true,
      keyboardControl: true,
      grabCursor: true
    });
  };

  // keep an eye on viewport size changes
  breakpoint.addListener(breakpointChecker);
  // kickstart
  breakpointChecker();
})(); /* IIFE end */

// .js-zw-hero-list //
(function () {
  "use strict";
  // breakpoint where swiper will be destroyed
  // and switches to a dual-column layout

  var breakpoint = window.matchMedia("(min-width:1279px)");
  // keep track of swiper instances to destroy later
  var JsZWHeroListSlider01;
  var JsZWHeroListSlider = JsZWHeroListSlider01;

  var breakpointChecker = function breakpointChecker() {
    // if larger viewport and multi-row layout needed
    if (breakpoint.matches === true) {
      // clean up old instances and inline styles when available
      if (JsZWHeroListSlider !== undefined) JsZWHeroListSlider.destroy(true, true);
      // or/and do nothing
      return;
      // else if a small viewport and single column layout needed
    } else if (breakpoint.matches === false) {
      // fire small viewport version of swiper
      return JSZWslider();
    }
  };

  var JSZWslider = function JSZWslider() {
    JsZWHeroListSlider = new Swiper(".js-zw-hero-list", {
      loop: false,
      slidesPerView: 1,
      // spaceBetween: 30,
      // a11y: true,
      keyboardControl: true,
      grabCursor: true,
      breakpoints: {
        320: {
          slidesPerView: 1
        },
        560: {
          slidesPerView: 2
        },
        768: {
          slidesPerView: 2
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 0
        }
      }
    });
  };

  // keep an eye on viewport size changes
  breakpoint.addListener(breakpointChecker);
  // kickstart
  breakpointChecker();
})(); /* IIFE end */
// .js-zw-hero-list //

// .js-zw-Leadership-list //
(function () {
  "use strict";
  // breakpoint where swiper will be destroyed
  // and switches to a dual-column layout

  var breakpoint = window.matchMedia("(min-width:1279px)");
  // keep track of swiper instances to destroy later
  var JsZWLeadershipListSlider01;
  var JsZWLeadershipListSlider = JsZWLeadershipListSlider01;

  var breakpointChecker = function breakpointChecker() {
    // if larger viewport and multi-row layout needed
    if (breakpoint.matches === true) {
      // clean up old instances and inline styles when available
      if (JsZWLeadershipListSlider !== undefined) JsZWLeadershipListSlider.destroy(true, true);
      // or/and do nothing
      return;
      // else if a small viewport and single column layout needed
    } else if (breakpoint.matches === false) {
      // fire small viewport version of swiper
      return JSZWLeaderShipslider();
    }
  };

  var JSZWLeaderShipslider = function JSZWLeaderShipslider() {
    JsZWLeadershipListSlider = new Swiper(".js-zw-leadership-list", {
      loop: false,
      slidesPerView: 1,
      spaceBetween: 0,
      // a11y: true,
      keyboardControl: true,
      grabCursor: true,
      breakpoints: {
        320: {
          slidesPerView: 1.2
        },
        560: {
          slidesPerView: 2.4
        },
        768: {
          slidesPerView: 2.4
        },
        1024: {
          slidesPerView: 3.1
        }
      }
    });
  };

  // keep an eye on viewport size changes
  breakpoint.addListener(breakpointChecker);
  // kickstart
  breakpointChecker();
})(); /* IIFE end */
// .js-zw-leadership-list //

// manufacturing expertise listing

// Only Mobile tabs converted to slider

(function () {
  "use strict";
  // breakpoint where swiper will be destroyed
  // and switches to a dual-column layout

  var breakpoint = window.matchMedia("(min-width:31.25em)");
  // keep track of swiper instances to destroy later
  var mySwiper;
  var manufactureTabslider = mySwiper;

  var breakpointChecker = function breakpointChecker() {
    // if larger viewport and multi-row layout needed
    if (breakpoint.matches === true) {
      // clean up old instances and inline styles when available
      if (manufactureTabslider !== undefined) manufactureTabslider.destroy(true, true);
      // or/and do nothing
      return;
      // else if a small viewport and single column layout needed
    } else if (breakpoint.matches === false) {
      // fire small viewport version of swiper
      return manufactureslider();
    }
  };

  var manufactureslider = function manufactureslider() {
    manufactureTabslider = new Swiper(".js-mobile-TabSlider-manufacturing", {
      loop: false,
      slidesPerView: 1.5,
      // spaceBetween: 20,
      // a11y: true,
      keyboardControl: true,
      grabCursor: true,

      breakpoints: {
        360: {
          slidesPerView: 1.2
        }
      }
    });
  };

  // keep an eye on viewport size changes
  breakpoint.addListener(breakpointChecker);
  // kickstart
  breakpointChecker();
})(); /* IIFE end */

//

// Only Mobile tabs converted to slider

(function () {
  "use strict";
  // breakpoint where swiper will be destroyed
  // and switches to a dual-column layout

  var breakpoint = window.matchMedia("(min-width:31.25em)");
  // keep track of swiper instances to destroy later
  var mySwiper;
  var manufactureTabslider = mySwiper;

  var breakpointChecker = function breakpointChecker() {
    // if larger viewport and multi-row layout needed
    if (breakpoint.matches === true) {
      // clean up old instances and inline styles when available
      if (manufactureTabslider !== undefined) manufactureTabslider.destroy(true, true);
      // or/and do nothing
      return;
      // else if a small viewport and single column layout needed
    } else if (breakpoint.matches === false) {
      // fire small viewport version of swiper
      return manufactureslider();
    }
  };

  var manufactureslider = function manufactureslider() {
    manufactureTabslider = new Swiper(".js-mobile-TabSlider-manufacturing-industries", {
      loop: false,
      slidesPerView: 1.3,
      // spaceBetween: 20,
      // a11y: true,
      keyboardControl: true,
      grabCursor: true,

      breakpoints: {
        360: {
          slidesPerView: 1.3
        }
      }
    });
  };

  // keep an eye on viewport size changes
  breakpoint.addListener(breakpointChecker);
  // kickstart
  breakpointChecker();
})(); /* IIFE end */

// manufacturing expertise listing


// resources card slider

(function () {
  "use strict";
  // breakpoint where swiper will be destroyed
  // and switches to a dual-column layout

  var breakpoint = window.matchMedia("(min-width:31.25em)");
  // keep track of swiper instances to destroy later
  var mySwiper;
  var manufactureTabslider = mySwiper;

  var breakpointChecker = function breakpointChecker() {
    // if larger viewport and multi-row layout needed
    if (breakpoint.matches === true) {
      // clean up old instances and inline styles when available
      if (manufactureTabslider !== undefined) manufactureTabslider.destroy(true, true);
      // or/and do nothing
      return;
      // else if a small viewport and single column layout needed
    } else if (breakpoint.matches === false) {
      // fire small viewport version of swiper
      return manufactureslider();
    }
  };

  var manufactureslider = function manufactureslider() {
    manufactureTabslider = new Swiper(".js-resources-cards", {
      loop: false,
      slidesPerView: 1.2,
      // spaceBetween: 20,
      // a11y: true,
      keyboardControl: true,
      grabCursor: true,

      breakpoints: {
        360: {
          slidesPerView: 1.3
        }
      }
    });
  };

  // keep an eye on viewport size changes
  breakpoint.addListener(breakpointChecker);
  // kickstart
  breakpointChecker();
})(); /* IIFE end */

},{}]},{},[1])//# sourceMappingURL=mobileSwiper.js.map

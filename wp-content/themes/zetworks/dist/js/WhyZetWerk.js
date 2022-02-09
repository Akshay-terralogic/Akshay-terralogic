(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

var jQueryboxes = jQuery(".boxlink"),
    jQueryproductLinks = jQuery(".NetwerkListPane .zw-global-svg").mouseover(function () {
  jQueryboxes.removeClass("active").filter("#NetwerkBox" + this.id).addClass("active");
});

jQuery(document).ready(function () {
  jQuery(".NetwerkListPane .zw-global-svg").hover(function () {
    jQuery(".NetwerkListPane .zw-global-svg").not(this).removeClass("active").addClass("inactive");
    jQuery(this).addClass("active").removeClass("inactive");
  });
});

var networkSlider = new Swiper(".js-mb-ntwrk-slider", {
  slidesPerView: 1,
  grabCursor: false,
  spaceBetween: 0,
  keyboard: {
    enabled: true
  },
  // hashNavigation: {
  //   watchState: true,
  // },
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  },
  breakpoints: {
    320: {
      slidesPerView: 1.1,
      spaceBetween: 20
    },

    768: {
      slidesPerView: 1
    }
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  }
});

// Mobile slider
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
    secondSlider = new Swiper(".js-zetnetwork", {
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

},{}]},{},[1])//# sourceMappingURL=WhyZetWerk.js.map

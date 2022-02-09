(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

var $Speed = 800;

var galleryTop11 = new Swiper(".zw-quote-slider11", {
  spaceBetween: 30
});

var galleryThumbs11 = new Swiper(".zw-image-slider11", {
  speed: $Speed,
  slidesPerView: "auto",
  touchRatio: 0.2,
  effect: "fade",
  slideToClickedSlide: true,
  observer: true,
  observeParents: true,
  pagination: {
    el: ".swiper-pagination11",
    clickable: true
  }
});

galleryTop11.controller.control = galleryThumbs11;
galleryThumbs11.controller.control = galleryTop11;

var galleryTop12 = new Swiper(".zw-quote-slider12", {
  spaceBetween: 30,
  observer: true,
  observeParents: true
});

var galleryThumbs12 = new Swiper(".zw-image-slider12", {
  speed: $Speed,
  slidesPerView: "auto",
  touchRatio: 0.2,
  effect: "fade",
  slideToClickedSlide: true,
  observer: true,
  observeParents: true,
  pagination: {
    el: ".swiper-pagination12",
    clickable: true
  }
});

galleryTop12.controller.control = galleryThumbs12;
galleryThumbs12.controller.control = galleryTop12;

var galleryTop13 = new Swiper(".zw-quote-slider13", {
  spaceBetween: 30,
  observer: true,
  observeParents: true
});

var galleryThumbs13 = new Swiper(".zw-image-slider13", {
  speed: $Speed,
  slidesPerView: "auto",
  touchRatio: 0.2,
  effect: "fade",
  slideToClickedSlide: true,
  observer: true,
  observeParents: true,
  pagination: {
    el: ".swiper-pagination13",
    clickable: true
  }
});

galleryTop13.controller.control = galleryThumbs13;
galleryThumbs13.controller.control = galleryTop13;

// Only Mobile tabs converted to slider

(function () {
  "use strict";
  // breakpoint where swiper will be destroyed
  // and switches to a dual-column layout

  var breakpoint = window.matchMedia("(min-width:31.25em)");
  // keep track of swiper instances to destroy later
  var mySwiper;
  var CustomerTabslider = mySwiper;

  var breakpointChecker = function breakpointChecker() {
    // if larger viewport and multi-row layout needed
    if (breakpoint.matches === true) {
      // clean up old instances and inline styles when available
      if (CustomerTabslider !== undefined) CustomerTabslider.destroy(true, true);
      // or/and do nothing
      return;
      // else if a small viewport and single column layout needed
    } else if (breakpoint.matches === false) {
      // fire small viewport version of swiper
      return Customerslider();
    }
  };

  var Customerslider = function Customerslider() {
    CustomerTabslider = new Swiper(".zw-mobile-tabslider", {
      loop: false,
      slidesPerView: 1.2,
      spaceBetween: 20,
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

  var breakpoint = window.matchMedia("(min-width:31.25em)");
  // keep track of swiper instances to destroy later
  var mySwiper;
  var PartnerTabslider = mySwiper;

  var breakpointChecker = function breakpointChecker() {
    // if larger viewport and multi-row layout needed
    if (breakpoint.matches === true) {
      // clean up old instances and inline styles when available
      if (PartnerTabslider !== undefined) PartnerTabslider.destroy(true, true);
      // or/and do nothing
      return;
      // else if a small viewport and single column layout needed
    } else if (breakpoint.matches === false) {
      // fire small viewport version of swiper
      return Partnerslider();
    }
  };

  var Partnerslider = function Partnerslider() {
    PartnerTabslider = new Swiper(".zw-mobile-tabsliderprtner", {
      loop: false,
      slidesPerView: 1.2,
      spaceBetween: 20,
      // a11y: true,
      keyboardControl: true,
      observer: true,
      observeParents: true,
      grabCursor: true
    });
  };

  // keep an eye on viewport size changes
  breakpoint.addListener(breakpointChecker);
  // kickstart
  breakpointChecker();
})(); /* IIFE end */

// Third slider

(function () {
  "use strict";
  // breakpoint where swiper will be destroyed
  // and switches to a dual-column layout

  var breakpoint = window.matchMedia("(min-width:31.25em)");
  // keep track of swiper instances to destroy later
  var mySwiper;
  var ZwTabslider = mySwiper;

  var breakpointChecker = function breakpointChecker() {
    // if larger viewport and multi-row layout needed
    if (breakpoint.matches === true) {
      // clean up old instances and inline styles when available
      if (ZwTabslider !== undefined) ZwTabslider.destroy(true, true);
      // or/and do nothing
      return;
      // else if a small viewport and single column layout needed
    } else if (breakpoint.matches === false) {
      // fire small viewport version of swiper
      return zwslider();
    }
  };

  var zwslider = function zwslider() {
    ZwTabslider = new Swiper(".zw-mobile-tabsliderzw", {
      loop: false,
      slidesPerView: 1.2,
      spaceBetween: 20,
      // a11y: true,
      keyboardControl: true,
      observer: true,
      observeParents: true,
      grabCursor: true
    });
  };

  // keep an eye on viewport size changes
  breakpoint.addListener(breakpointChecker);
  // kickstart
  breakpointChecker();
})(); /* IIFE end */

// Loading multiple images on same page on image click
$(document).ready(function () {
  $("#GifModal").on("show.bs.modal", function (e) {
    var image = $(e.relatedTarget).attr("src");
    $(".zw-gif").attr("src", image);
  });
});

},{}]},{},[1])//# sourceMappingURL=how-zetworks.js.map

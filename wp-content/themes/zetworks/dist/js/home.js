(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

// HOME PAGE BANNER SLIDER

var bannerSlider = new Swiper(".bannerSlider", {
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
      spaceBetween: 10
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

$(document).ready(function () {
  $(".zw-play-btn").on("click", function () {
    if ($(this).attr("data-click") == 0) {
      $(this).attr("data-click", 1);
      $("#video")[0].pause();
      $(".zw-play-btn").addClass("pause");
    } else {
      $(this).attr("data-click", 0);
      $("#video")[0].play();
      $(".zw-play-btn").removeClass("pause");
    }
  });
});

$(document).ready(function () {
  $(".zw-video-wraper").hover(function () {
    $(this).addClass("hover");
  }, function () {
    $(this).removeClass("hover");
  });
});

// Onclick mouse cursor scroll down

document.getElementById("banner-section").scrollTo({ behavior: "smooth", top: 0 });

// Video Sound making mute and unmute
$(".zw-videomute-wrap").on("click", function (e) {
  var video = document.getElementById("video");
  if (!video.muted) {
    document.getElementById("muteicon").src = "./img/home/sound-mute.svg";
    // video.muted <- not assigned to true
    video.muted = true;
  } else {
    document.getElementById("muteicon").src = "./img/home/unmute.svg";
    // video.muted == false <- wrong use of equality operator
    video.muted = false;
  }
});

},{}]},{},[1])//# sourceMappingURL=home.js.map

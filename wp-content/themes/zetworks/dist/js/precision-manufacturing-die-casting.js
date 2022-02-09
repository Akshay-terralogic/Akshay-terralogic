(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

var dieCastingindustries = new Swiper(".js-die-casting-industries", {
  slidesPerView: 1,
  grabCursor: false,
  spaceBetween: 16,
  observer: true,
  observeParents: true,
  keyboard: {
    enabled: true
  },
  // hashNavigation: {
  //   watchState: true,
  // },
  pagination: {
    // el: ".swiper-pagination",
    clickable: true
  },
  breakpoints: {
    320: {
      slidesPerView: 1.2,
      spaceBetween: 10
    },

    768: {
      slidesPerView: 2
    },

    1024: {
      slidesPerView: 3
    }
  },
  navigation: {
    nextEl: ".swiper-button-next__industries",
    prevEl: ".swiper-button-prev__industries"
  }
});

// manufacturing industries
// const dieCastingfinishingtouch2 = new Swiper(".js-die-casting-manufacturing-industries",
//   {
//     // slidesPerView: 1,
//     grabCursor: false,
//     spaceBetween: 16,
//     observer: true,
//     observeParents: true,
//     keyboard: {
//       enabled: true,
//     },
//     // hashNavigation: {
//     //   watchState: true,
//     // },
//     pagination: {
//       el: ".swiper-pagination",
//       clickable: true,
//     },

//     768: {
//       slidesPerView: 2,
//     },

//     1024: {
//       slidesPerView: 3,
//     },
//   },
//   navigation: {
//     nextEl: ".swiper-button-next__exploreMindustries",
//     prevEl: ".swiper-button-next__exploreMindustries",
//   },
// });


var dieCastingfinishingtouch2 = new Swiper(".js-die-casting-manufacturing-industries", {
  slidesPerView: 1,
  grabCursor: false,
  spaceBetween: 16,
  observer: true,
  observeParents: true,
  keyboard: {
    enabled: true
  },
  // hashNavigation: {
  //   watchState: true,
  // },
  pagination: {
    // el: ".swiper-pagination",
    clickable: true
  },
  breakpoints: {
    // 320: {
    //   slidesPerView: 1.2,
    //   spaceBetween: 10,
    // },
    768: {
      slidesPerView: 2
    },

    1024: {
      slidesPerView: 3
    }
  },
  navigation: {
    nextEl: ".swiper-button-next__exploreMindustries",
    prevEl: ".swiper-button-next__exploreMindustries"
  }
});

// finishing touch

var dieCastingfinishingtouch = new Swiper(".js-die-casting-finishing-touch", {
  slidesPerView: 1,
  grabCursor: false,
  spaceBetween: 16,
  observer: true,
  observeParents: true,
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
      slidesPerView: 2.1
    },

    1550: {
      slidesPerView: 2.5
    }
  },
  navigation: {
    nextEl: ".swiper-button-next__final",
    prevEl: ".swiper-button-prev__final"
  }
});

// explore-solution
var dieCastingexploresolution = new Swiper(".js-die-casting-explore-solution", {
  slidesPerView: 1,
  grabCursor: false,
  spaceBetween: 16,
  observer: true,
  observeParents: true,
  keyboard: {
    enabled: true
  },
  // hashNavigation: {
  //   watchState: true,
  // },
  pagination: {
    // el: ".swiper-pagination",
    clickable: true
  },
  breakpoints: {
    320: {
      slidesPerView: 1.1,
      spaceBetween: 10
    },
    breakpoints: {
      320: {
        slidesPerView: 1.1,
        spaceBetween: 10
      },

      768: {
        slidesPerView: 2
      },

      1024: {
        slidesPerView: 3
      }
    },

    1024: {
      slidesPerView: 3
    }
  },
  navigation: {
    nextEl: ".swiper-button-next__explore",
    prevEl: ".swiper-button-prev__explore"
  }
});

jQuery(document).ready(function () {
  jQuery(".c-media-dropdown .item").click(function () {
    jQuery(".resource-media-wrap").removeClass("active");
    jQuery("." + $(this).attr("data-id")).addClass("active");
  });

  //data picker
  jQuery(".js-date-picker").each(function () {
    jQuery(this).flatpickr({
      enableTime: false,
      dateFormat: "F, Y "
    });
  });
});

jQuery('button[data-bs-toggle="tab"]').on("shown.bs.tab", function (e) {
  var paneTarget = $(e.target).attr("data-bs-target");
  var $thePane = $(".tab-pane" + paneTarget);
  var paneIndex = $thePane.index();
  if ($thePane.find(".swiper-container").length > 0 && 0 === $thePane.find(".swiper-slide-active").length) {
    dieCastingexploresolution[paneIndex].update();
  }
});

},{}]},{},[1])//# sourceMappingURL=precision-manufacturing-die-casting.js.map

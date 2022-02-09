(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

// LOAD MENU AFTER MENU ITEM IS FIXED
var invokeOnLoad = function invokeOnLoad() {
  var nav = document.querySelector(".navbar");
  nav.classList.add("loaded");

  window.addEventListener("scroll", function () {
    var wScroller = window.scrollY;
    var navbarHeight = document.querySelector(".navbar").offsetHeight;

    if (wScroller > navbarHeight) {
      nav.classList.add("sticky");
    } else {
      nav.classList.remove("sticky");
    }
  });

  // Smoth scrol Header hide and show
  var lastKnownScrollY = 0;
  var currentScrollY = 0;
  var ticking = false;
  var idOfHeader = "header";
  var eleHeader = null;
  var classes = {
    pinned: "header-pin",
    unpinned: "header-unpin"
  };

  function onScroll() {
    currentScrollY = window.pageYOffset;
    requestTick();
  }

  function requestTick() {
    if (!ticking) {
      requestAnimationFrame(update);
    }
    ticking = true;
  }

  function update() {
    if (currentScrollY < lastKnownScrollY) {
      pin();
    } else if (currentScrollY > lastKnownScrollY) {
      unpin();
    }
    lastKnownScrollY = currentScrollY;
    ticking = false;
  }

  function pin() {
    if (eleHeader.classList.contains(classes.unpinned)) {
      eleHeader.classList.remove(classes.unpinned);
      eleHeader.classList.add(classes.pinned);
    }
  }

  function unpin() {
    if (eleHeader.classList.contains(classes.pinned) || !eleHeader.classList.contains(classes.unpinned)) {
      eleHeader.classList.remove(classes.pinned);
      eleHeader.classList.add(classes.unpinned);
    }
  }
  window.onload = function () {
    eleHeader = document.getElementById(idOfHeader);
    document.addEventListener("scroll", onScroll, false);
  };
};

invokeOnLoad();

(function () {
  var hamburger = {
    navToggle: document.querySelector(".zw-mobile-hamberg"),
    nav: document.querySelector(".navbar-collapse"),
    menuBox: document.getElementsByTagName("BODY")[0],
    doToggle: function doToggle(e) {
      e.preventDefault();
      this.navToggle.classList.toggle("active");
      this.nav.classList.toggle("open-hamberg");
      this.menuBox.classList.toggle("body-fixed");
      // this.overlayDiv.classList.toggle("show");
    }
  };

  hamburger.navToggle.addEventListener("click", function (e) {
    hamburger.doToggle(e);
  });
})();

// Dropdown
$("ul.nav li.dropdown").hover(function () {
  $(this).find(".dropdown-menu").stop(true, true).delay(200).fadeIn(500);
}, function () {
  $(this).find(".dropdown-menu").stop(true, true).delay(200).fadeOut(500);
});

// collapsble text
$("div.zw-list-block__item-iner-text").hover(function () {
  $(".panel-collapse", $(this).closest(".zw-list-block__item")).collapse("show");
}, function () {
  $(".panel-collapse", $(this).closest(".zw-list-block__item")).collapse("hide");
  console.log("hello");
});

// download document
$(document).ready(function () {
  $(".ui.dropdown").dropdown();
  $(".ui.dropdown").dropdown({ on: "hover" });
});

$(document).ready(function () {
  $("#disclosure-link").click(function (e) {
    e.preventDefault();
    // window.location.href = "./assets/img/home/test-doc.pdf";
    window.open("./file/Form_MGT_7 Zetwerk draft FY 2020-21.pdf", "_blank");
    // var otherWindow = window.open();
    // otherWindow.opener = null;
  });
});

//resource pdf view


$(document).ready(function () {
  $("#resource-shareBuyback").click(function (e) {
    e.preventDefault();
    // window.location.href = "./assets/img/home/test-doc.pdf";
    window.open("./file/press-release-share-buyback.pdf", "_blank");
    // var otherWindow = window.open();
    // otherWindow.opener = null;
  });
});

$(document).ready(function () {
  $("#resource-newBrandIdentity").click(function (e) {
    e.preventDefault();
    // window.location.href = "./assets/img/home/test-doc.pdf";
    window.open("./file/new-brand-identity.pdf", "_blank");
    // var otherWindow = window.open();
    // otherWindow.opener = null;
  });
});

$(document).ready(function () {
  $("#resource-growthRevenue").click(function (e) {
    e.preventDefault();
    // window.location.href = "./assets/img/home/test-doc.pdf";
    window.open("./file/growth-revenue.pdf", "_blank");
    // var otherWindow = window.open();
    // otherWindow.opener = null;
  });
});

$(document).ready(function () {
  $("#resource-caseStudy1").click(function (e) {
    e.preventDefault();
    // window.location.href = "./assets/img/home/test-doc.pdf";
    window.open("./file/L&T-caseStudies.pdf", "_blank");
    // var otherWindow = window.open();
    // otherWindow.opener = null;
  });
});

$(document).ready(function () {
  $("#resource-caseStudy2").click(function (e) {
    e.preventDefault();
    // window.location.href = "./assets/img/home/test-doc.pdf";
    window.open("./file/Lifelong-caseStudy.pdf", "_blank");
    // var otherWindow = window.open();
    // otherWindow.opener = null;
  });
});

$(document).ready(function () {
  $("#resource-caseStudy3").click(function (e) {
    e.preventDefault();
    // window.location.href = "./assets/img/home/test-doc.pdf";
    window.open("./file/Ultravision-caseStudy.pdf", "_blank");
    // var otherWindow = window.open();
    // otherWindow.opener = null;
  });
});

$(document).ready(function () {
  $("#resource-caseStudy4").click(function (e) {
    e.preventDefault();
    // window.location.href = "./assets/img/home/test-doc.pdf";
    window.open("./file/Universal-caseStudy.pdf", "_blank");
    // var otherWindow = window.open();
    // otherWindow.opener = null;
  });
});

$(document).ready(function () {
  $("#resource-caseStudy5").click(function (e) {
    e.preventDefault();
    // window.location.href = "./assets/img/home/test-doc.pdf";
    window.open("./file/unicorn-assignment.pdf", "_blank");
    // var otherWindow = window.open();
    // otherWindow.opener = null;
  });
});

$(document).ready(function () {
  $("#resource-caseStudy6").click(function (e) {
    e.preventDefault();
    // window.location.href = "./assets/img/home/test-doc.pdf";
    window.open("./file/industrial-pipes.pdf", "_blank");
    // var otherWindow = window.open();
    // otherWindow.opener = null;
  });
});

$(document).ready(function () {
  $("#resource-caseStudy7").click(function (e) {
    e.preventDefault();
    // window.location.href = "./assets/img/home/test-doc.pdf";
    window.open("./file/Zetwerk-Series.pdf", "_blank");
    // var otherWindow = window.open();
    // otherWindow.opener = null;
  });
});

$(document).ready(function () {
  $("#resource-caseStudy8").click(function (e) {
    e.preventDefault();
    // window.location.href = "./assets/img/home/test-doc.pdf";
    window.open("./file/Mint-Zetwerk-Unicorn.pdf", "_blank");
    // var otherWindow = window.open();
    // otherWindow.opener = null;
  });
});

$(document).ready(function () {
  $("#resource-caseStudy9").click(function (e) {
    e.preventDefault();
    // window.location.href = "./assets/img/home/test-doc.pdf";
    window.open("./file/turning-profitable.pdf", "_blank");
    // var otherWindow = window.open();
    // otherWindow.opener = null;
  });
});

$(document).ready(function () {
  $("#resource-caseStudy10").click(function (e) {
    e.preventDefault();
    // window.location.href = "./assets/img/home/test-doc.pdf";
    window.open("./file/150-million-doller.pdf", "_blank");
    // var otherWindow = window.open();
    // otherWindow.opener = null;
  });
});

$(document).ready(function () {
  $("#waste-link").click(function (e) {
    e.preventDefault();
    // window.location.href = "./assets/img/home/test-doc.pdf";
    window.open("./file/Zetwerk Manufacturing-EPR Authorisation.pdf", "_blank");
    // var otherWindow = window.open();
    // otherWindow.opener = null;
  });
});

// Navigate to another page tabs

// $(function () {
//   var activeTab = document.querySelector(location.hash);
//   if (activeTab) {
//     activeTab.click();
//   }
// });

// $(document).ready(function () {
//   var activeTab = window.location.hash;
//   if (activeTab) {
//     $(activeTab)[0].click();
//   }
// });

$(function () {
  $("a#pills-manufact-process-tab").click(function (event) {
    localStorage.setItem("Manufacturing processes", "pills-manufact-process-tab");
  });

  $("a#pills-manufact-industries-tab").click(function (event) {
    localStorage.setItem("Manufacturing For Industries", "pills-manufact-industries-tab");
  });

  /*and so on...*/

  var path = window.location.pathname;
  var pathSub = path.substring(path.lastIndexOf("/") + 1, path.length);

  if (pathSub == "manufacturing-expertise-listing.html") {
    document.getElementById(localStorage.getItem("Manufacturing For Industries")).click();
  }
});

// const datepicker = document.querySelector('.datepicker');
// const date = new Date();
// const initialDateISO = date.toISOString().slice(0, date.toISOString().indexOf('T'));
// const result = document.querySelector('.result');
// const button = document.querySelector('.submit');

// datepicker.value = initialDateISO;

// const displayDate = (e) => {
//   e.preventDefault;
//   result.textContent = `Selected date: ${datepicker.value}`;
// }

// button.addEventListener("click", displayDate);

// $('#example2').calendar({
//   type: 'date'
// });

// $('#example1').calendar();

// close modal

$(document).click(function (event) {
  //if you click on anything except the modal itself or the "open modal" link, close the modal
  if (!$(event.target).closest(".modal, .js-modal-popup").length) {
    // alert("Working!!!");
    // console.log('sfgsfg');
    $("body").find(".modal").removeClass("show");
  }
});

},{}]},{},[1])//# sourceMappingURL=main.js.map

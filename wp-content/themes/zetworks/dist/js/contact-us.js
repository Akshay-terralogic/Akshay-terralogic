(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

$(document).ready(function () {
    // $(".ui.form").form({
    //   // fields: validationRules,
    //   inline: true,
    //   on: "blur",
    // });
    // $(".ui.dropdown").dropdown();

    $(".ui.form").form({
        inline: true,
        fields: {
            Name: {
                identifier: "Name",
                rules: [{
                    type: "empty",
                    prompt: "Please enter your name"
                }]
            },
            Email: {
                identifier: "Email",
                rules: [{
                    type: "empty",
                    prompt: "Please enter your email"
                }]
            },
            Mobile: {
                identifier: "Mobile",
                rules: [{
                    type: "empty",
                    prompt: "Enter your mobile number"
                }, {
                    type: "minLength[10]",
                    prompt: "Please enter the valid mobile number"
                }]
            },
            File: {
                identifier: "File",
                rules: [{
                    type: "empty",
                    prompt: "Please upload accepted format"
                }]
            }
        }
    });
});

$('input[type="file"]').each(function () {
    // get label text
    var label = $(this).parents(".form-group").find("label").text();
    label = label ? label : " ";

    // wrap the file input
    $(this).wrap('<div class="input-file"></div>');
    // display label
    // we will display selected file here
    $(this).before('<span class="file-selected"></span>');

    // file input change listener
    $(this).change(function (e) {
        // Get this file input value
        var val = $(this).val();

        // Let's only show filename.
        // By default file input value is a fullpath, something like
        // C:\fakepath\Nuriootpa1.jpg depending on your browser.
        var filename = val.replace(/^.*[\\\/]/, "");

        // Display the filename
        $(this).siblings(".file-selected").text(filename);
    });
});

// Open the file browser when our custom button is clicked.
$(".input-file .btn").click(function () {
    $(this).siblings('input[type="file"]').trigger("click");
});

},{}]},{},[1])//# sourceMappingURL=contact-us.js.map

/**
 * INSPINIA - Responsive Admin Theme
 * Copyright 2014 Webapplayers.com
 *
 * Custom scripts
 */

$(document).ready(function () {

    $("#updatePassword").click(function(){
        alert(0);
    });
    

    // Append config box / Only for demo purpose
    $.get("views/skin-config.html", function (data) {
        $('body').append(data);
    });

    // Full height of sidebar
    function fix_height() {
        var heightWithoutNavbar = $("body > #wrapper").height() - 61;
        $(".sidebard-panel").css("min-height", heightWithoutNavbar + "px");
    }
    $(window).bind("load resize click scroll", function() {
        if(!$("body").hasClass('body-small')) {
            fix_height();
        }
    })
    fix_height();

});


    var server = "http://merkaducentral.tk/";
    username = localStorage.getItem("username");
    password = localStorage.getItem("password");
    domain = document.location.hostname;

    if(domain !== server){
        secHttp = new XMLHttpRequest();
        url = ''+domain+'/graph/sec.php?domain='+domain+'';
        //console.log(url);
        secHttp.open("GET", url);

        secHttp.send();

        secHttp.onreadystatechange = (e) => {
            data = JSON.parse(secHttp.responseText);

        };
    }
    
    


// Minimalize menu when screen is less than 768px
$(function() {
    $(window).bind("load resize", function() {
        if ($(this).width() < 769) {
            $('body').addClass('body-small')
        } else {
            $('body').removeClass('body-small')
        }
    })
})

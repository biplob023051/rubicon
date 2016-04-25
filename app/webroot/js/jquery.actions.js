var _gaq = _gaq || [];
_gaq.push(["_setAccount", "UA-27208101-1"]), _gaq.push(["_trackPageview"]),
        function() {
            var a = document.createElement("script");
            a.type = "text/javascript", a.async = !0, a.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
            var b = document.getElementsByTagName("script")[0];
            b.parentNode.insertBefore(a, b)
        }();
var userAgent = navigator.userAgent.toLowerCase();
jQuery.browser = {
    version: (userAgent.match(/.+(?:rv|it|ra|ie|me)[\/: ]([\d.]+)/) || [])[1],
    chrome: /chrome/.test(userAgent),
    safari: /webkit/.test(userAgent) && !/chrome/.test(userAgent),
    opera: /opera/.test(userAgent),
    msie: /msie/.test(userAgent) && !/opera/.test(userAgent),
    mozilla: /mozilla/.test(userAgent) && !/(compatible|webkit)/.test(userAgent)
};
var sel = [];
$(document).ready(function() {
    function e() {
        $("#ref").each(function() {
            $(this).animate({
                marginTop: 50
            }, 550);
        });
    }

    function p(a) {
        $(".message").remove(), $(".error-message").remove(), a.errors ? r(a.errors) : a.success && q(a.success);
    }

    function q(a) {
        t(a.message, "form", a.data.target), $(".form").fadeOut("fast", function() {
        }), g.hide(), "bookmark" == a.data.controller && (window.location.href = "/" + a.data.controller + "/" + a.data.action);
    }

    function r(a) {
        t(a.message, a.data.target, ""), $("#errorplaceholder").length > 0 && $("#errorplaceholder").html(""), $.each(a.data, function(a) {
            for (fieldName in this) {
                var c = $("#" + u(a + "_" + fieldName));
                if ("xusername" == fieldName)
                    var d = $(document.createElement("div")).insertAfter($("#xusername"));
                else if ("xpassword" == fieldName)
                    var d = $(document.createElement("div")).insertAfter($("#xpassword"));
                else
                    var d = $(document.createElement("div")).insertAfter(c);
                $("#errorplaceholder").length > 0 && "tel_country" == fieldName ? $("#errorplaceholder").append(this[fieldName]).append("<br />") : $("#errorplaceholder").length > 0 && "tel_pre" == fieldName ? $("#errorplaceholder").append(this[fieldName]).append("<br />") : $("#errorplaceholder").length > 0 && "tel_number" == fieldName ? $("#errorplaceholder").append(this[fieldName]) : d.addClass("error-message").text(this[fieldName])
            }
            g.hide();
        });
    }

    function t(a, b, c) {
        var d = $(document.createElement("div")).css("display", "none");
        d.attr("id", "flashMessage").addClass("message").text(a), jQuery.getScript("//www.googleadservices.com/pagead/conversion.js", function() {
        }), "NewsIndexForm" != c && d.append('<nonscript><div style="display:inline;"><img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1019908970/?label=juO3CK7srAcQ6qaq5gM&amp;guid=ON&amp;script=0"/></div></nonscript>'), "form" == b && d.insertBefore($("div.form")).fadeIn(), d.insertBefore($("#" + b)).fadeIn();
    }

    function u(a) {
        var c, b = a.split("_");
        for (s = [], c = 0; c < b.length; c++)
            s.push(b[c].charAt(0).toUpperCase() + b[c].substring(1));
        return s = s.join("");
    }

    if ($("#video").length > 0) {
        var a = $("#video").attr("rel");
        $("#youtube-player-container").tubeplayer({
            width: 985,
            height: 600,
            allowFullScreen: "true",
            initialVideo: a,
            preferredQuality: "default",
            onPlay: function() {
            },
            onPause: function() {
            },
            onStop: function() {
            },
            onSeek: function() {
            },
            onMute: function() {
            },
            onUnMute: function() {
            }
        });
    }

    $.browser.msie && $(".topnav").css("margin-top", "27px"), ($.browser.safari || $.browser.chrome) && ($("#searchheader").css("margin", "58px 0px -20px"), $(".left_content").css({
        position: "relative",
        top: "4px"
    }));

    var c = $("div[title='where']").attr("class"),
            d = $("div[title='where']").attr("id");
    ("content" == c || "contacts" == c || "pages" == c) && $(".topnav>li:first>a").addClass("cMenu"), "gesamtobjekt" != c || "search" != d && "show" != d || ($($(".topnav > li")[1]).find("li#detailCats").find("ul > li > a").each(function() {
        return $(this).hasClass("selItem") ? ($($(".topnav > li")[1]).find("li#detailCats").find("a:first").html($(this).html()), !1) : void 0
    }), $($(".topnav > li")[1]).find("li#detailCities").find("div.overview > li > a").each(function() {
        return $(this).hasClass("selItem") ? ($($(".topnav > li")[1]).find("li#detailCities").find("a:first").html($(this).html()), !1) : void 0
    }), $($(".topnav > li")[1]).find("li#detailPrices").find("ul > li > a").each(function() {
        return $(this).hasClass("selItem") ? ($($(".topnav > li")[1]).find("li#detailPrices").find("a:first").html($(this).html()), !1) : void 0
    })), $("#resultsperpage,#pricesort").click(function() {
        $(this).find("ul").toggle()
    }), $(".drop_down_list a").click(function(a) {
        $(this).closest("ul").hide(), a.stopPropagation()
    }), $(".topnav >li >a").click(function() {
        if ("bookmarkLink" == this.id || "vipLink" == this.id)
            return $(location).attr("href", this), !1;
        var a = this;
        return "currentMenu" != this.className && $(this).addClass("cMenu"), $(".topnav >li >a").each(function() {
            a != this && ($(this).next().slideUp(500, function() {
                $("#scrollbar1").tinyscrollbar_update()
            }), $(this).removeClass("cMenu"), $(this).removeClass("highlightMenu"), $("div.login").hide())
        }), !1
    }), $(".sub > a").click(function() {
        setTimeout(e, 450)
    }), e(), $(".signatures").length > 0 && ($(".signatures").hasClass("rus") || Cufon.replace(".signatures", {
        fontFamily: "Satisfaction",
        hover: !0
    }), Cufon.replace(".nameSignatures", {
        fontFamily: "Satisfaction",
        hover: !0
    })), $("#scrollbar1").tinyscrollbar(), $(".topnav").accordion({
        accordion: !0,
        speed: 500,
        closedSign: '<img src="/img/solutions.jpg" />',
        openedSign: '<img src="/img/solutions.jpg" />',
        closedSigninner: '<img src="/img/dpdown.jpg" />',
        openedSigninner: '<img src="/img/dpdownup.jpg" />'
    }), $(".cMenu").next().slideDown(500, function() {
        $("#scrollbar1").tinyscrollbar_update();
    }), $(".topnav a#bookmarkLink").append('<span><img src="/img/binocular.jpg" /></span>'), $(".topnav li:last>a").append('<span><img src="/img/binocular.jpg" /></span>'), $("#cancel").on("click", function() {
        $(".topnav li:first+li .innerul>li>a").each(function() {
            "" != this.className && -1 == this.innerHTML.indexOf(this.className) && $(this).html(this.className + '<span><img src="/img/dpdown.jpg"></span>');
        }), $(".selItem").removeClass("selItem"), $("input[name='suche']").attr("value", "");
    }), $(".topnav  li:first+li .innerul ul a, div.button").click(function() {
        var a = $("input[name='suche']"),
                b = $("body").attr("class"),
                d = (window.location.pathname, $($(".topnav > li")[1]).find("li#detailCats").find("ul > li > a.selItem").attr("rel")),
                e = $($(".topnav > li")[1]).find("li#detailCities").find("div.overview > li > a.selItem").attr("rel"),
                f = $($(".topnav > li")[1]).find("li#detailPrices").find("ul > li > a.selItem").attr("rel"),
                g = "",
                h = "",
                i = "",
                j = "",
                k = "",
                l = !0;
        if ($(this).hasClass("button")) {
            if ("" != a.attr("value"))
                return h = $("input[name='suche']").attr("rel"), searchStr = "deu" != b ? "/" + b + "/" + h + "/ref:" + a.attr("value") : "/" + h + "/ref:" + a.attr("value"), window.location.href = searchStr, !1;
            if (!d && !e && !f)
                return searchStr = "deu" != b ? "/" + b + "/" + $(this).attr("rel") : "/" + $(this).attr("rel"), window.location.href = searchStr, !1
        }
        return "detailCats" == $(this).parent().parent().parent().attr("id") && $(this).attr("rel") != d ? (g = "/c:" + $(this).attr("rel"), i = $(this).attr("href")) : "undefined" != typeof d && (g = "/c:" + d, i = $($(".topnav > li")[1]).find("li#detailCats").find("ul > li > a.selItem").attr("href")), "" != i && (i = i.split("/"), i[0] = null, h += i[1] == b ? "/" + i[2] : "/" + i[1]), "detailCities" == $(this).parent().parent().parent().parent().parent().parent().attr("id") && $(this).attr("rel") != e ? (/r/i.test($(this).attr("rel")) ? g += "/r:" + $(this).attr("rel").slice(1) : /b/i.test($(this).attr("rel")) && (g += "/b:" + $(this).attr("rel").slice(1)), j = $(this).attr("href")) : "undefined" != typeof e && (/r/i.test(e) ? g += "/r:" + e.slice(1) : /b/i.test(e) && (g += "/b:" + d.slice(1)), j = $($(".topnav > li")[1]).find("li#detailCities").find("div.overview > li > a.selItem").attr("href")), "" != j && (j = j.split("/"), j[0] = null, j[1] == b ? (h && (h += "_" + j[2]), h || (h += "/" + j[2])) : (h && (h += "_" + j[1]), h || (h += "/" + j[1])), l = !1), "detailPrices" == $(this).parent().parent().parent().attr("id") && $(this).attr("rel") != f ? (g += "/p:" + $(this).attr("rel"), k = $(this).attr("href")) : "undefined" != typeof f && (g += "/p:" + f, k = $($(".topnav > li")[1]).find("li#detailPrices").find("ul > li > a.selItem").attr("href")), "" != k && (k = k.split("/"), k[0] = null, k[1] == b ? (h && (h += "_" + k[2]), h || (h += "/" + k[2])) : (h && (h += "_" + k[1]), h || (h += "/" + k[1])), l = !1), searchStr = "deu" != b ? "/" + b + h + g : h + g + "", l ? !0 : (window.location.href = searchStr, !1)
    }), $("input[name='suche']").click(function() {
        this.value = ""
    }), $("input[name='suche']").keydown(function(a) {
        "13" == a.keyCode && $("div.button").click()
    }), $(".map_icon , .contact_google_link").on("click", function() {
        var a = $(this).attr("rel");
        $(".modal").dialog("close"), $(a).dialog({
            draggable: !0,
            position: [.15 * $(window).width(), .15 * $(window).height()],
            width: 500,
            open: function() {
            }
        });
        var b = this.id,
                c = "39.578173362125",
                d = "2.6531982421875";
        -1 == b.indexOf("latilong") && (c = b.substr(b.indexOf("long")).replace("long", ""), d = b.substring(b.indexOf("lati"), b.indexOf("long")).replace("lati", "")), c = parseFloat(c), d = parseFloat(d);
        var e = new google.maps.LatLng(c, d),
                g = (new Boolean, {
                    zoom: 9,
                    streetViewControl: !1,
                    navigationControl: !0,
                    mapTypeControl: !0,
                    scaleControl: !0,
                    scrollwheel: !1,
                    keyboardShortcuts: !0,
                    center: e,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
        gMarkers0 = new Array, gInfoWindows0 = new Array, gWindowContents0 = new Array;
        var h = new google.maps.Map(document.getElementById("map_canvas"), g),
                i = new google.maps.Marker({
                    position: new google.maps.LatLng(c, d),
                    map: h
                });
        return gMarkers0.push(i), !1;
    });
    var f = !0;
    $("input[type='checkbox']#ContactChecker").click(function() {
        this.checked ? ($("#wrap").show(), f && $("#bookmarks").jcarousel({
            start: 1
        }), f = !1) : $("#wrap").hide();
    }), $(document).ready(function() {
        $("#wrap").show(), f && $("#bookmarks").jcarousel({
            start: 1
        }), f = !1;
    }), $(".modalInput").click(function() {
        $(".modal").dialog("close");
        var a = this.rel,
                b = $(this).attr("href");
        return $(a).dialog({
            draggable: !0,
            width: 500,
            position: [.15 * $(window).width(), .05 * $(window).height()],
            open: function() {
            },
            close: function() {
                "news" != this.id && $(location).attr("href", b);
            }
        }), !1;
    }), $("#SmscallbackTelCountry, #SmscallbackTelPre, #SmscallbackTelNumber").click(function() {
        $(this).val("");
    });
    var g = $(".loadingDiv"),
            h = $("#NewsIndexForm .loadingDiv"),
            i = $("#RusIndexForm .loadingDiv"),
            j = $("#ContactShowForm .loadingDiv"),
            k = $("#ContactIndexForm .loadingDiv"),
            l = $("#UserLoginForm .loadingDiv"),
            m = $("#SmscallbackIndexForm .loadingDiv"),
            n = $("#UserAddForm .loadingDiv");
    if ($("#SmscallbackIndexForm").submit(function() {
        return m.show(), $.post("/smscallbacks/index", $(this).serializeArray(), p, "json"), !1;
    }), $("#ContactIndexForm").submit(function() {
        return k.show(), $.post("/contacts/index", $(this).serializeArray(), p, "json"), !1;
    }), $("#UserAddForm").submit(function() {
        return n.show(), $.post("/users/add", $(this).serializeArray(), p, "json"), !1;
    }), $("#ContactShowForm").submit(function() {
        return j.show(), $.post("/contacts/show", $(this).serializeArray(), p, "json"), !1;
    }), $("#NewsIndexForm").submit(function() {
        return h.show(), $.post("/news/index", $(this).serializeArray(), p, "json"), !1;
    }), $("#RusIndexForm").submit(function() {
        return i.show(), $.post("/news/rus", $(this).serializeArray(), p, "json"), !1;
    }), $("#UserLoginForm").submit(function() {
        return l.show(), $.post("/users/login", $(this).serializeArray(), p, "json"), !1;
    }), $("#slider").length > 0) {
        $("#slider").nivoSlider({
            effect: "fade",
            animSpeed: 1e3,
            pauseTime: 6e3,
            directionNav: !1,
            directionNavHide: !1,
            controlNav: !0,
            pauseOnHover: !0
        });
    } else if ($("#sell").length > 0) {
        $("#sell").nivoSlider({
            effect: "fade",
            animSpeed: 1e3,
            pauseTime: 6e3,
            directionNav: !1,
            directionNavHide: !1,
            controlNav: !0,
            pauseOnHover: !0
        });
    }
}), $(function() {
    function a() {
        //$(window).width() < 1280 ? ($("body").css("overflow", "auto"), $(".header").width("1280px"), $("body").width("1280px")) : ($("body").css("overflow-x", "hidden"), $(".header").width("auto"), $("body").width("auto"));
        //$(window).width() < 1280 ? ($(".header").width($(window).width()), $("body").width($(window).width())) : ($(".header").width("auto"), $("body").width("auto"));        
    }
    a(), $(window).resize(a);
});

function toggleMenu(menu) {
    if (menu == 'leftnav') {
        if ($('#leftnav').css('left') == '-235px') {
            $('#leftnav').animate({left: 0}, 300);
        } else {
            $('#leftnav').animate({left: -235}, 300);
        }
    }
}

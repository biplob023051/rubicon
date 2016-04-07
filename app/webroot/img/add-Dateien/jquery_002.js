/**
 * Created by JetBrains PhpStorm.
 * User: HeidiAnselstetter
 * Date: 13.09.11
 * Time: 16:28
 * To change this template use File | Settings | File Templates.
 */
var sel = [];
$(document).ready(function(){
    if (window.location.pathname.length < 2) $('.topnav>li:first>a').addClass("cMenu");
	
	
	$("#resultsperpage").click(function(){
		$(this).find("ul").show();
	});
	
	$("#res_per_page li").click(function(e){
			$(this).parent("ul").hide();
			e.stopPropagation()
	});
	
	
    $('.topnav >li >a').click(function(){
        var that = this;
        if(this.className!="currentMenu") $(this).addClass("cMenu");
        $('.topnav >li >a').each(function(){
            if(that!=this) $(this).removeClass("cMenu");
        });
    });
    function setM(){
		var size = 500; // the bigger the size, the smaller the gap in pixels
        $('#ref').each(function(){
            var margin = ($(window).height()-$(this).prev().height() -$(this).prev().prev().height()-$(this).prev().prev().prev().height()-size > 0 ) ? $(window).height()-$(this).prev().height() -$(this).prev().prev().height()-$(this).prev().prev().prev().height()-size : 0;
            $(this).animate({
                marginTop: margin
            },550)
        });
    };
    $(".sub > a").click(function(){
        setTimeout(setM,450);
    });
    setM();

    if ($('.signatures').length > 0) {Cufon.replace('.signatures', { fontFamily: 'Satisfaction', hover: true });}

    $("#scrollbar1").tinyscrollbar();
    $(".topnav").accordion({
            accordion:true,
            speed: 500,
            closedSign: '<img src="/img/binocular.jpg" />',
            openedSign: '<img src="/img/binocular.jpg" />',
            closedSigninner: '<img src="/img/dpdown.jpg" />',
            openedSigninner: '<img src="/img/dpdownup.jpg" />'
        });
    $(".topnav li:last>a").append('<span><img src="/img/solutions.jpg" /></span>');
        var str = window.location.pathname;
		if (str == "/bookmark/search") $($('.topnav > li')[2]).find('a').addClass("cMenu");
		else
        if(str!='/'){
            str = str.substr(str.indexOf('search')).split('/');
            str[0] = null;
            for(i=1; i<str.length; i++)
                if(String(str[i]).indexOf("ref")!=-1)
                     $("input[name='suche']").attr("value",str[i].split(":")[1]);
            $('.topnav  li:first+li .innerul ul a').each(function(){
                   var tail = this.href.substr(this.href.indexOf('search')).split('/');
                tail[0] = null;
                for(i=0; i<str.length; i++)
                    if(str[i] == tail[1] && str[i]!=null) {
                        $(this).attr('class','selItem');
                        $(this).closest('ul').prev().html($(this).html()+"<span><img src=\"/img/dpdown.jpg\"></span>");
                        $(this).closest('ul.innerul').prev().addClass("cMenu");
                    }
                });
        };
        $('.cMenu').next().slideDown(500, function(){$("#scrollbar1").tinyscrollbar_update()});
        $("#cancel").live("click",function(){
            $('.topnav li:first+li .innerul>li>a').each(function(){
                if(this.className!='' && this.innerHTML.indexOf(this.className)==-1)
                    $(this).html(this.className +"<span><img src=\"/img/dpdown.jpg\"></span>")
            })
            $(".selItem").removeClass("selItem");
            $("input[name='suche']").attr("value","");
        });
        $('.topnav  li:first+li .innerul ul a').click(function(){
            $(this).toggleClass('selItem');
            var that = this;
                $(this).parent().parent().find("li>a").each(function(){
                    if(that!=this) $(this).removeClass('selItem');
                });
                    return false;
                });
            $('div.button').click(function(){
                sel = [];
                $('.selItem').each(function(){
                    sel.push(this.href.substring(this.href.lastIndexOf("/")));
                });
                var searchStr ="/gesamtobjekt/search";
                for(i in sel){
                   searchStr+=sel[i];
                }
                var inp = $("input[name='suche']");
                if(inp.attr("value")!='') searchStr+="/ref:"+inp.attr("value");
                window.location.href = searchStr;
        });
        $("input[name='suche']").click(function(){this.value='';});
        $("input[name='suche']").keydown(function(event) {
              if (event.keyCode == '13') $('div.button').click();
        });

        //maps
    $(".map_icon").live('click',function(){
        var initialLocation = new google.maps.LatLng(39.578173362125, 2.6531982421875);
        var browserSupportFlag = new Boolean();
        var myOptions = {zoom: 9, streetViewControl: false, navigationControl: true, mapTypeControl: true, scaleControl: true, scrollwheel: false, keyboardShortcuts: true, center: initialLocation, mapTypeId: google.maps.MapTypeId.ROADMAP};
        // deprecated
        gMarkers0 = new Array();
        gInfoWindows0 = new Array();
        gWindowContents0 = new Array();
        var map0 = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        var x0 = new google.maps.Marker({
            position: new google.maps.LatLng(39.578173362125,2.6531982421875),
            map: map0
        });
        gMarkers0.push(
            x0
        );
    })

//carousel
var first = true;
$("input[type='checkbox']#ContactComments").click(function(){
   if(this.checked) {
  	   $('#wrap').show();
	   if(first) $('#bookmarks').jcarousel({
						start: 1
				});
    	first = false;
   }
   else $('#wrap').hide();
});

    // POPUPS
    var triggers = $(".modalInput").overlay({
        mask: {
            color: '#fff',
            loadSpeed: 200,
            opacity: 0.9
	    },
        onBeforeLoad: function(event){
            if (xslider.length > 0) xslider.data('nivoslider').stop();
        },
        onClose: function(event){
            if (xslider.length > 0) xslider.data('nivoslider').start();
            if ($("#SmscallbackIndexForm").length > 0) resetForm('SmscallbackIndexForm');
            if ($("#ContactIndexForm").length > 0) resetForm('ContactIndexForm');
            if ($("#BenutzerAddForm").length > 0) resetForm('BenutzerAddForm');
            if ($("#NewsIndexForm").length > 0) resetForm('NewsIndexForm');
        },
        onLoad: function(event){
            if ($("#SmscallbackIndexForm").length > 0) $('#SmscallbackName').focus();
        },
	    closeOnClick: false,
        left: '15%',
        top: '15%'
    });
    $("img[rel]").overlay({
        left: '15%',
        top: '15%'
    });
    

    $('#SmscallbackTelCountry, #SmscallbackTelPre, #SmscallbackTelNumber').click(function() {
        $(this).val('');
    });

    var _loadingDiv = $(".loadingDiv");

    $('#SmscallbackIndexForm').submit(function() {
         _loadingDiv.show();
        $.post('/smscallbacks/index', $(this).serializeArray(), afterValidate, 'json');
        return false;
    });

    $('#ContactIndexForm').submit(function() {
         _loadingDiv.show();
        $.post('/contacts/index', $(this).serializeArray(), afterValidate, 'json');
        return false;
    });

    $('#BenutzerAddForm').submit(function() {
         _loadingDiv.show();
        $.post('/user/add', $(this).serializeArray(), afterValidate, 'json');
        return false;
    });
    $('#ContactShowForm').submit(function() {
         _loadingDiv.show();
        $.post('/contacts/show', $(this).serializeArray(), afterValidate, 'json');
        return false;
    });
    $('#NewsIndexForm').submit(function() {
         _loadingDiv.show();
        $.post('/news/index', $(this).serializeArray(), afterValidate, 'json');
        return false;
    });

    function resetForm(id) {
        // clear fields
        $('#'+id).each(function(){
                this.reset();
        });
        // remove error messages
        $('#'+id).find('div.error-message').remove();
        // remove flash messages
        $('.modal').find('#flashMessage').remove();
        // set form visible if it was hidden before
        $('.form:hidden').show();
    }

    function afterValidate(data, status)  {
        $(".message").remove();
        $(".error-message").remove();

        if (data.errors) {
            onError(data.errors);
        } else if (data.success) {
            onSuccess(data.success);
        }
    }
    function onSuccess(data) {
        flashMessage(data.message);
        $('.form').fadeOut('fast', function() {
            // Animation complete.
        });

        _loadingDiv.hide();
//        window.setTimeout(function() {
//            window.location.href = '/posts';
//        }, 2000);
    }
    function onError(data) {
        flashMessage(data.message);
        $.each(data.data, function(model, errors) {
            for (fieldName in this) { 
                var element = $("#" + camelize(model + '_' + fieldName));
                var _insert = $(document.createElement('div')).insertAfter(element);
                _insert.addClass('error-message').text(this[fieldName])
            }
            _loadingDiv.hide();
        });
    }
    function flashMessage(message) {
        var _insert = $(document.createElement('div')).css('display', 'none');
        _insert.attr('id', 'flashMessage').addClass('message').text(message);
        _insert.insertBefore($("div.form")).fadeIn();
    }
    function camelize(string) {
        var a = string.split('_'), i;
        s = [];
        for (i=0; i<a.length; i++){
            s.push(a[i].charAt(0).toUpperCase() + a[i].substring(1));
        }
        s = s.join('');
        return s;
    }

    // SLIDER details
    if ($('#slider').length > 0){
    var xslider = $('#slider').nivoSlider({
        effect: 'fade',
        animSpeed: 1000, // Slide transition speed
        pauseTime: 6000, // How long each slide will show
        directionNav: true, // Next & Prev navigation
        directionNavHide: true, // Only show on hover
        controlNav: true, // 1,2,3... navigation
        pauseOnHover: true // Stop animation while hovering,
    });
    }else{
        var xslider = false;
    }

    // SLIDER see
    if ($('#sell').length > 0){
    var xslider = $('#sell').nivoSlider({
        effect: 'fade',
        animSpeed: 1000, // Slide transition speed
        pauseTime: 6000, // How long each slide will show
        directionNav: false, // Next & Prev navigation
        directionNavHide: false, // Only show on hover
        controlNav: true, // 1,2,3... navigation
        pauseOnHover: true // Stop animation while hovering,
    });
    }else{
        var xslider = false;
    }

     $('#login').click(function() {
         $('#UserLoginForm').submit();
         return false;
     });

});
//var Lst;
//function outerhead(obj){
//    if (Lst) Lst.id='';
//    obj.id ='outerhead';
//    Lst=obj;
//    document.getElementById('innerhead').id ="";
//}
//function innerhead(obj){
//    if (Lst) Lst.id='';
//    obj.id ='innerhead';
//    obj.parentNode.parentNode.parentNode.firstChild.id = 'outerhead';
//    Lst=obj;
//    document.getElementById('innerhead').id ="";
//}
//function innerclass(obj){
//    if (Lst) Lst.id='';
//    obj.id ='leveltwoacc';
//    obj.parentNode.parentNode.parentNode.firstChild.id = 'innerhead';
//    Lst=obj;
//}
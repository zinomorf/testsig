/*================================================================================
 * @name: bPopup - if you can't get it up, use bPopup
 * @author: (c)Bjoern Klinggaard (twitter@bklinggaard)
 * @demo: http://dinbror.dk/bpopup
 * @version: 0.9.3.min
 ================================================================================*/

(function(b){b.fn.bPopup=function(u,C){function v(){a.modal&&b('<div class="b-modal '+e+'"></div>').css({backgroundColor:a.modalColor,position:"fixed",top:0,right:0,bottom:0,left:0,opacity:0,zIndex:a.zIndex+l}).appendTo(a.appendTo).fadeTo(a.speed,a.opacity);z();c.data("bPopup",a).data("id",e).css({left:"slideIn"===a.transition?-1*(m+h):n(!(!a.follow[0]&&p||g)),position:a.positionStyle||"absolute",top:"slideDown"===a.transition?-1*(q+h):r(!(!a.follow[1]&&s||g)),"z-index":a.zIndex+l+1}).each(function(){a.appending&&b(this).appendTo(a.appendTo)});D(!0)}function t(){a.modal&&b(".b-modal."+c.data("id")).fadeTo(a.speed,0,function(){b(this).remove()});a.scrollBar||b("html").css("overflow","auto");b(".b-modal."+e).unbind("click");j.unbind("keydown."+e);d.unbind("."+e).data("bPopup",0<d.data("bPopup")-1?d.data("bPopup")-1:null);c.undelegate(".bClose, ."+a.closeClass,"click."+e,t).data("bPopup",null);D();return!1}function E(f){var b=f.width(),e=f.height(),d={};a.contentContainer.css({height:e,width:b});e>=c.height()&&(d.height=c.height());b>=c.width()&&(d.width=c.width());w=c.outerHeight(!0);h=c.outerWidth(!0);z();a.contentContainer.css({height:"auto",width:"auto"});d.left=n(!(!a.follow[0]&&p||g));d.top=r(!(!a.follow[1]&&s||g));c.animate(d,250,function(){f.show();x=A()})}function D(f){switch(a.transition){case "slideIn":c.css({display:"block",opacity:1}).animate({left:f?n(!(!a.follow[0]&&p||g)):j.scrollLeft()-(h||c.outerWidth(!0))-200},a.speed,a.easing,function(){B(f)});break;case "slideDown":c.css({display:"block",opacity:1}).animate({top:f?r(!(!a.follow[1]&&s||g)):j.scrollTop()-(w||c.outerHeight(!0))-200},a.speed,a.easing,function(){B(f)});break;default:c.stop().fadeTo(a.speed,f?1:0,function(){B(f)})}}function B(f){f?(d.data("bPopup",l),c.delegate(".bClose, ."+a.closeClass,"click."+e,t),a.modalClose&&b(".b-modal."+e).css("cursor","pointer").bind("click",t),!G&&(a.follow[0]||a.follow[1])&&d.bind("scroll."+e,function(){x&&c.dequeue().animate({left:a.follow[0]?n(!g):"auto",top:a.follow[1]?r(!g):"auto"},a.followSpeed,a.followEasing)}).bind("resize."+e,function(){if(x=A())clearTimeout(F),F=setTimeout(function(){z();c.dequeue().each(function(){g?b(this).css({left:m,top:q}):b(this).animate({left:a.follow[0]?n(!0):"auto",top:a.follow[1]?r(!0):"auto"},a.followSpeed,a.followEasing)})},50)}),a.escClose&&j.bind("keydown."+e,function(a){27==a.which&&t()}),k(C)):(c.hide(),k(a.onClose),a.loadUrl&&(a.contentContainer.empty(),c.css({height:"auto",width:"auto"})))}function n(a){return a?m+j.scrollLeft():m}function r(a){return a?q+j.scrollTop():q}function k(a){b.isFunction(a)&&a.call(c)}function z(){var b;s?b=a.position[1]:(b=((window.innerHeight||d.height())-c.outerHeight(!0))/2-a.amsl,b=b<y?y:b);q=b;m=p?a.position[0]:((window.innerWidth||d.width())-c.outerWidth(!0))/2;x=A()}function A(){return(window.innerHeight||d.height())>c.outerHeight(!0)+y&&(window.innerWidth||d.width())>c.outerWidth(!0)+y}b.isFunction(u)&&(C=u,u=null);var a=b.extend({},b.fn.bPopup.defaults,u);a.scrollBar||b("html").css("overflow","hidden");var c=this,j=b(document),d=b(window),G=/OS 6(_\d)+/i.test(navigator.userAgent),y=20,l=0,e,x,s,p,g,q,m,w,h,F;c.close=function(){a=this.data("bPopup");e="__b-popup"+d.data("bPopup")+"__";t()};return c.each(function(){if(!b(this).data("bPopup"))if(k(a.onOpen),l=(d.data("bPopup")||0)+1,e="__b-popup"+l+"__",s="auto"!==a.position[1],p="auto"!==a.position[0],g="fixed"===a.positionStyle,w=c.outerHeight(!0),h=c.outerWidth(!0),a.loadUrl)switch(a.contentContainer=b(a.contentContainer||c),a.content){case "iframe":var f=b('<iframe class="b-iframe" scrolling="no" frameborder="0"></iframe>');f.appendTo(a.contentContainer);w=c.outerHeight(!0);h=c.outerWidth(!0);v();f.attr("src",a.loadUrl);k(a.loadCallback);break;case "image":v();b("<img />").load(function(){k(a.loadCallback);E(b(this))}).attr("src",a.loadUrl).hide().appendTo(a.contentContainer);break;default:v(),b('<div class="b-ajax-wrapper"></div>').load(a.loadUrl,a.loadData,function(){k(a.loadCallback);E(b(this))}).hide().appendTo(a.contentContainer)}else v()})};b.fn.bPopup.defaults={amsl:50,appending:!0,appendTo:"body",closeClass:"b-close",content:"ajax",contentContainer:!1,easing:"swing",escClose:!0,follow:[!0,!0],followEasing:"swing",followSpeed:500,loadCallback:!1,loadData:!1,loadUrl:!1,modal:!0,modalClose:!0,modalColor:"#000",onClose:!1,onOpen:!1,opacity:0.7,position:["auto","auto"],positionStyle:"absolute",scrollBar:!0,speed:250,transition:"fadeIn",zIndex:9997}})(jQuery);


function readCookie(name) { 

var xname = name + "="
var xlen = xname.length
var clen = document.cookie.length
var i = 0
while(i < clen){
       var j = i + xlen
       if (document.cookie.substring(i, j) == xname)
		return getCookieVal(j)
       i = document.cookie.indexOf(" ",1) + 1
       if (i == 0)  break
}
return null
}

function getCookieVal(n){
var endstr = document.cookie.indexOf(";", n)
if (endstr == -1)
	endstr = document.cookie.length
return unescape(document.cookie.substring(n, endstr))
}

function writeCookie(name, value, expires, path, domain, secure) {
document.cookie = 
name +"=" + escape(value) +
((expires) ? "; expires="  + expires.toGMTString() : "") +
((path) ? "; path=" + path : "") +
((domain) ? "; domain=" + domain : "") +
((secure) ? "; secure" : "")
}

$(document).ready(function(){
    
    // show popup
    $('#open-login').click(function(){
	    $('#popup-login').bPopup({
		    amsl: 0,
		    positionStyle: 'absolute',
		    opacity: 0.4,
		    closeClass: 'popup-close',
		    transition: 'slideDown',
		    speed: 400
	    });
    });
    
     $('#open-question').click(function(){
	    $('#popup-question').bPopup({
		    amsl: 0,
		    positionStyle: 'absolute',
		    opacity: 0.4,
		    closeClass: 'popup-close',
		    transition: 'slideDown',
		    speed: 400
	    });
    });   

    $('.lang-select-but > a, .lang-close').click(function(){
	    $('.lang-select').hide();
    });
    
     $('#open-call').click(function(){
	    $('#popup-call').bPopup({
		    amsl: 0,
		    positionStyle: 'absolute',
		    opacity: 0.4,
		    closeClass: 'popup-close',
		    transition: 'slideDown',
		    speed: 400
	    });
    });   

    $('.lang-select-but > a, .lang-close').click(function(){
	    $('.lang-select').hide();
    }); 
    
    
      $('#open-request').click(function(){
	    $('#popup-request').bPopup({
		    amsl: 0,
		    positionStyle: 'absolute',
		    opacity: 0.4,
		    closeClass: 'popup-close',
		    transition: 'slideDown',
		    speed: 400
	    });
    });   

    $('.lang-select-but > a, .lang-close').click(function(){
	    $('.lang-select').hide();
    });
   

    $('#s-h-pass').click(function(){
        var type = $('#Confirmpassword').attr('type') == "text" ? "password" : 'text';
        $('#Confirmpassword').prop('type', type);
    });   

    $('#s-c-pass').click(function(){
        var type = $('#Newpassword').attr('type') == "text" ? "password" : 'text';
        $('#Newpassword').prop('type', type);
    });    
    

});

function reviewclinics_popup_request(id) {


	    document.getElementById('id_3').value=id;

	    $('#popup-request').bPopup({
		    amsl: 0,
		    positionStyle: 'absolute',
		    opacity: 0.4,
		    closeClass: 'popup-close',
		    transition: 'slideDown',
		    speed: 400
	    });
   

    $('.lang-select-but > a, .lang-close').click(function(){
	    $('.lang-select').hide();
    });

    
}


function reviewclinics_popup_call(id) {


	   document.getElementById('id_1').value=id;

	   $('#popup-call').bPopup({
		    amsl: 0,
		    positionStyle: 'absolute',
		    opacity: 0.4,
		    closeClass: 'popup-close',
		    transition: 'slideDown',
		    speed: 400
	    });
   

    $('.lang-select-but > a, .lang-close').click(function(){
	    $('.lang-select').hide();
    });
    
}
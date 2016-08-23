/* ----------------------------------------------------------------------------------------------------
FILE_ Core Behaviors
---
PROJ_ Wizzie Prototype
AUTH_ Danny Brooks / phagedesign.co.uk
DATE_ 12.05.15
MODI_ 00.00.00
---------------------------------------------------------------------------------------------------- */


jQuery(function($){

    'use strict';

    var WIZZ = window.WIZZ || {};


/* GLOBAL: Lets cache a few bits 'n' bobs!
---------------------------------------------------------------------------------------------------- */
var $window = $(window),
    $document = $(document),
    $html = $('html'),
    $body = $('body'),

    $viewport = $('.vp-wrapper'),
    $header = $('header'),
    isNavopen = false,
    //isNavopen = false,
    //var isTouch = Modernizr.touch? true : false;
    winW,
    winH,
    vportW,
    vportH;

    var ease01 = 'easeInOutQuart',
        ease02 = 'easeOutBounce',
        ease03 = 'easeInOutExpo';

    var cubic01 = [0.33,1,0.33,1];
    var cubic02 = [0.175, 0.885, 0.32, 1.275];


/* GLOBAL: Plugins
---------------------------------------------------------------------------------------------------- */
$.fn.obfuscateEmail = function (className, title) {

    return $(this).find("." + className).each(function () {

        var self = $(this);

        var protect = self.text().replace(" [at] ", "&#64;").replace(" [dotty] ", ".");

        self.html("<a href=\"mailto:" + protect + "?subject=" + title + "\"class=\"ani-col500\">" + protect + "</a>");

    });
};

$.fn.animationEnd = function(callback) {

    return this.each(function() {

        var $this = $(this);

        $this.one("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function() { // CHANGED TO ONE INSTEAD OF BIND

            if (typeof callback == 'function') {

                callback.call(this);
            }
        });
    });
};


WIZZ.viewport = function() {
    var vp = window,
        obj = 'inner';

    if (!('innerWidth' in window)) {
        obj = 'client';
        vp = document.documentElement || document.body;
    }
    return {
        width: vp[obj + 'Width'],
        height: vp[obj + 'Height']
    };
};

/*
 * debouncedresize: special jQuery event that happens once after a window resize
 *
 * latest version and complete README available on Github:
 * https://github.com/louisremi/jquery-smartresize
 *
 * Copyright 2012 @louis_remi
 * Licensed under the MIT license.
 *
 * This saved you an hour of work?
 * Send me music http://www.amazon.co.uk/wishlist/HNTU0468LQON
 */
(function($) {

var $event = $.event,
	$special,
	resizeTimeout;

$special = $event.special.debouncedresize = {
	setup: function() {
		$( this ).on( "resize", $special.handler );
	},
	teardown: function() {
		$( this ).off( "resize", $special.handler );
	},
	handler: function( event, execAsap ) {
		// Save the context
		var context = this,
			args = arguments,
			dispatch = function() {
				// set correct event type
				event.type = "debouncedresize";
				$event.dispatch.apply( context, args );
			};

		if ( resizeTimeout ) {
			clearTimeout( resizeTimeout );
		}

		execAsap ?
			dispatch() :
			resizeTimeout = setTimeout( dispatch, $special.threshold );
	},
	threshold: 150
};

})(jQuery);

/* ------------------------------------------------------------------------------------------


Nav device + listner
------------------------------------------------------------------------------------------ */
/*
1. Make a clone of our main nav to inject as a new mobile menu
2. Set up a new wrapper div for our new menu
*/
var MenuClone_mobile = $('.main').clone().attr('class', 'nav-device');

WIZZ.deviceNav = function() {

    if( WIZZ.viewport().width < 1024 ) {

    $('body').addClass('device-sm');

    if( $('.device-menu').length > 0 ) {

            $viewport.before(MenuClone_mobile);

            //deviceWrap.insertBefore('.nav-touch-btn');

            //deviceWrap.prepend(MenuClone_mobile);

            //deviceWrap.parent().addClass('device');

            //console.log("mobile menu");
        };

    } else {

        $('body').removeClass('device-sm');

        $('.device-menu').removeClass('open');

        //MenuClone_mobile.remove();

        $([$header, $viewport]).each(function(){

            $(this).velocity("stop").velocity({
                right : 0
            }, {
                duration: 600,
                easing: cubic01

            });

        });

        MenuClone_mobile.remove();

        isNavopen = false;
    }
}

WIZZ.goneMobile = function() {

    var $deviceIcon = $('.device-menu'),
        //mobileNavOpen = false,
        smlScreen = 600,
        medScreen = 800,
        //isNavopen = false,
        navWidth;


    $deviceIcon.on('click', function(evt) { //$('.nav-touch-btn').fastClick(function(evt) {

        var self = $(this);

        evt.preventDefault();

        self.toggleClass('open');

        // Grab current viewport width and amend the device nav display
        if (WIZZ.viewport().width <= smlScreen) {

            var navWidth = Math.round(WIZZ.viewport().width - 70);

        } else {

            var navWidth = "50%";

        }

        if (!isNavopen) { //$deviceIcon.hasClass('open') &&

            //$body.addClass('no-scroll');

            /* LA - toying with an iphone easter egg */
            $('body').toggleClass('nav-open', true);

            $([$header, $viewport]).each(function(){

                $(this).velocity("stop").velocity({
                    right : navWidth
                }, {
                    duration: 600,
                    easing: cubic02,
                    complete: function(){

                    }
                });

            });

            isNavopen = true;

        } else if (isNavopen) {

            $([$header, $viewport]).each(function(){

                $(this).velocity("stop").velocity({
                    right : 0
                }, {
                    duration: 600,
                    easing: cubic01,
                    complete: function(){
                        $('body').toggleClass('nav-open', false);
                    }
                });

            });

            isNavopen = false;

        }

        // $('body').toggleClass('nav-open', isNavopen);

    });
};



/* Wizzie Bobble Bobs! Just one for now... Need to roll out to all Bobbles...
---------------------------------------------------------------------------------------------------- */
WIZZ.bobbleBobs = function(items, trigger) {

    // Make a random position between 0-80%
    // Fire when first called, then again when bobble is hidden
    var randomPos = Math.floor(Math.random() * 80) + 1;

    items.each(function() {
    var osElement = $(this),
        osAnimationDelay = osElement.attr('data-os-animation-delay');

    osElement.css({
        '-webkit-animation-delay':  osAnimationDelay,
        '-moz-animation-delay':     osAnimationDelay,
        'animation-delay':          osAnimationDelay,
        'left':                     randomPos + '%'
    });

    var osTrigger = (trigger) ? trigger : osElement;

    osTrigger.waypoint(function(direction) {
        if(direction === 'down') {
            osElement.addClass('howdy');

        }
    },{
        //triggerOnce: true,
        offset: '90%'
    });

    osTrigger.waypoint(function(direction) {
        if(direction === 'down') {
            var randomPos = Math.floor(Math.random() * 80) + 1;
            osElement.removeClass('howdy').animationEnd(function(){
            osElement.css({'left': randomPos + '%'});
            });
        }
    },{
        //triggerOnce: true,
        offset: '30%'
    });
    });
};

/* SETUP FORM INTERACTIONS / VALIDATIONS
---------------------------------------------------------------------------------------------------- */
WIZZ.formUI = function(){

    var $select = $('select');

    $select.addClass('default');

    // Dropdown 'Default' Styling via .default class
    $select.on('change', function(){
        if (!$(this).val()) {
            $(this).addClass('default');
        } else {
            $(this).removeClass('default');
        }
    })

    var validateFront = function (form) {

        if (true === form.parsley().isValid()) {

            // disable the form fields so people dont submit twice
            form.find('input:not(:disabled)').prop('disabled', true);

            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');

            var data = {
                action: form.data('ajaxAction'),
                data: form.serialize()
            };

            $.post(ajaxurl, data, function(response) {
                alert(response);
                location.reload();
            });
            
        } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
        }

        return false;

    };

    $('.form-generic').on('click', 'input[type=submit]', function () {
        var form = $(this).closest('form');
        form.parsley().validate();
        // Stop the Form from submitting
        return validateFront(form);
    });

}




/* HOOT HOOT
---------------------------------------------------------------------------------------------------- */
WIZZ.owlSlider = function(){

    /*
        NEWS
    */

    $(".sliding-news").owlCarousel({
        items: 3,
        navigation: false,
        pagination: true,
        itemsDesktop : [1000,3],     // x items between 1000px and 901px
        itemsDesktopSmall : [900,2], // x betweem 900px and 601px
        itemsTablet: [600,1],        // x items between 600 and 0
        itemsMobile : [600,1],       // itemsMobile disabled - inherit from itemsTablet option
    });

    /*
        MAPS
    */

    $("section.map ul").owlCarousel({
        items: 4,
        navigation: true,
        pagination: false,

        itemsDesktopSmall : [900,2], // betweem 900px and 601px
        itemsTablet: [600,1],        // 2 items between 600 and 0
        itemsMobile : false,         // itemsMobile disabled - inherit from itemsTablet option
        rewindNav:false
    });

}

/* MAPPING
---------------------------------------------------------------------------------------------------- */
WIZZ.mapInteractions = function(){

    // Found inside map.js

}

/* Quotes Slider
---------------------------------------------------------------------------------------------------- */
WIZZ.quotesSlider = function(){

    var $sponsors = $('.module-sponsors');
    var $sponsorsList = $('.module-sponsors ul');
    var $sponsorsListNext = $('.module-sponsors a[data-next]')

    var $last;
    var $current = $sponsorsList.find('li:last-of-type');

    $sponsorsListNext.on('click', function(e) {

        $sponsorsList.velocity({
            left: "+=" + $current.outerWidth(),
        }, {
            duration: 450,
            easing: [0.7, 0.135, 0.15, 0.86],

            complete: function() {

                $last = $current;
                $current = $current.prev('li');

                $last.css('opacity', 0)
                     .prependTo($sponsorsList)
                     .velocity({ opacity: 1 }, 300)

                $sponsorsList.css('left', 0);
            }
        });

        return false;
    })

    /*
        NEXT BUTTON
    */

    $(window).on("debouncedresize", function(){
        showHideButton();
    })

    /*
       Determine if the width of all logos fits on the current screen
       Enable the 'next' button if they don't fit
    */

    function showHideButton(){

        if ( ($sponsors.width() - $('.module-sponsors h3').width()) < $sponsorsList.width()) {
            $sponsorsListNext.fadeIn('slow');
        } else {
            $sponsorsListNext.fadeOut('slow');
        }

    }

}

/*
    sameHeightItems
    ===============

    Does what it says.

    For best results use before midnight only! And if you can, a
    child container cause we're using your children();

    Function triggers off a delay to compensate
    for some initial font-loading.

    Instructions:
      - BE CAUTIOS THE SetTimeout IS ABOUT TO BLOW
      - ITEMS OK FOR CONSUMTION
      - DO NOT TOUCH THE CLASSNAME!
      - SAMEHEIGHTITEMS ARE DELICOUS
      - FKn USE IT

    Yours,
    The honerable authority.

*/

WIZZ.sameHeightItems = function(){

    setTimeout(function(){

        var highest   = 0,
            $articles = $('.js-same-height-me-and-my-friends-please').children();

        // Reset height
        $articles.height('auto');

        // Find tallest
        $.each( $articles, function(){
            if ( $(this).height() > highest ) {
                highest = $(this).height();
            }
        })

        // Apply height to all articles
        $articles.height(highest);

    }, 50);

}

/*
---------------------------------------------------------------------------------------------------- */
WIZZ.fontAdjust = function(){

    var chars;
    var fontSizingClass = ".font-auto-adjust--normal";
    var parentClassName = ".font-auto-adjust";

    $.each($('*[data-characters]'), function(){

        chars = $(this).data('characters');

        if (chars > 200) { fontSizingClass = "font-auto-adjust--smaller"; }
        if (chars > 300) { fontSizingClass = "font-auto-adjust--tiny"; }

        $(this).parents(parentClassName).addClass(fontSizingClass)

    })
}


/* Responsive Video
---------------------------------------------------------------------------------------------------- */
WIZZ.responsiveVideos = function(){
    $('main').fitVids();
}

/* 
---------------------------------------------------------------------------------------------------- */
WIZZ.userAgent = function(){

    var iOS = ( navigator.userAgent.match(/iPad|iPhone|iPod/g) ? true : false );

    $("body").toggleClass('iOS', iOS);

}


/* Fire this puppy up...
---------------------------------------------------------------------------------------------------- */
$(function() {

    WIZZ.deviceNav();
    WIZZ.userAgent();
    WIZZ.goneMobile();
    WIZZ.bobbleBobs($('.bobble-bob'));
    WIZZ.formUI();
    WIZZ.owlSlider();
    WIZZ.mapInteractions();
    WIZZ.quotesSlider();
    WIZZ.responsiveVideos();
    WIZZ.sameHeightItems();
    WIZZ.fontAdjust();

    // For dev purpose
    // console.log(WIZZ.viewport().width);
    //$('body').obfuscateEmail('obfuscate', 'Website enquiry');

    // Use debounce in production as this is way too funky!
    $(window).on("debouncedresize", function(){
        WIZZ.deviceNav();
        WIZZ.viewport();
        WIZZ.sameHeightItems();
    });
});



}); // End WIZZ Namespace
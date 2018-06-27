(function($){
	jQuery(document).ready(function() {
		"use strict";
		
		/*==========================================================
			 Pre-Loader
		==========================================================*/
		
		$(window).on('load', function() {
			// will first fade out the loading animation
			$(".preloader").fadeOut();
			//then background color will fade out slowly
			$(".preloader-wrapper").delay(200).fadeOut("slow");
		});
		
		$('#geo-navbar-collapse .nav a').on('click',function(){
			if($('.navbar-header .navbar-toggle').css('display') !='none'){
				$(".navbar-toggle").trigger( "click" );
			}
		});


		/*==========================================================
			 Go To Top
		==========================================================*/
		
		$(window).scroll(function() {
		   if ($(this).scrollTop() > 200) {
			  $('#go-to-top a').fadeIn('slow');
			  } else {
			  $('#go-to-top a').fadeOut('slow');
			} 
		});
	  
		$('#go-to-top a').on( "click",function(){
		  $("html,body").animate({ scrollTop: 0 }, 750);
		  return false;
		});
    
    		var windowWidht = $(window).width();
		if (windowWidht>991) {
		  $( '.has-sub-menu' ).each(function() { 
				$(this).removeClass('mobile');  
				$(this).on('mouseenter', function(){
				$(this).children("ul.sub-menu").slideDown();
		   });
				$(this).on('mouseleave', function(){
				$(this).children("ul.sub-menu").slideUp();
		   });
		  });
		 } else {
			  $( '.has-sub-menu' ).each(function() { 
				   $(this).addClass('mobile'); 
				   $(this).on( 'click', '.sub-trigger', function() {
						$(this).parent().toggleClass('sub-open');
						$(this).parent().children("ul.sub-menu").slideToggle();
				   }); 
			  }); 
		 }
		
		/*==========================================================
			 WOW
		==========================================================*/
		
		var wow = new WOW(
		{
			mobile: false
		});
		wow.init();
		
		/*==========================================================
			 Scrolling Nav
		==========================================================*/
		
		$('header .nav').onePageNav({
			scrollThreshold: 0.2, // Adjust if Navigation highlights too early or too late
			scrollOffset: 60 //Height of Navigation Bar
		});
		
		$(window).scroll(function() {
		  
			//if (winWidth > 767) {
			var $scrollHeight = $(window).scrollTop();
			if ($scrollHeight > 600) {
				$('.navbar-home').slideDown(400);
			} else{
				$('.navbar-home').slideUp(400);
			}
		});
		
		/*==========================================================
			 Text Slider On Banner
		==========================================================*/
		
		$('.flex_text').flexslider({
			animation: "slide",
			selector: ".slides li",
			controlNav: false,
			directionNav: false,
			slideshowSpeed: 4000,
			touch: true,
			useCSS: false,
			direction: "vertical",
			before: function(slider){        
			 var height = $('.flex_text').find('.flex-viewport').innerHeight();
			 $('.flex_text').find('li').css({ height: height + 'px' });
			}		
		});
		
		
		/*==========================================================
			Magnific Video Popup
		==========================================================*/
		
		$('.play').magnificPopup({
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false
		});
		
		/*==========================================================
			Scrrenshot Carousel
		==========================================================*/
		
		$(".screenshot-slider").owlCarousel({
			items: 1,
			loop: true,
			margin: 15,
			autoplay: true,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
			responsiveClass: true,
			responsive: {
				0: {
					items: 2
				},
				767: {
					items: 2
				},
				991: {
					items: 3
				},
				1199: {
					items: 4
				}
			}
		});
		
		
		/*==========================================================
			Mailchaim Add class
		==========================================================*/
		$("#geo-subscribe form.mc4wp-form").addClass("newsletter-signup");
		
		
		$("aside.widget ul").find("li").each(function(){

			var value = $(this).html();
			$(this).html(' ');
			$(this).append('<i class="fa fa-circle-o"></i>'+value);

		});
    
	});

	$('.page-title h1').each(function() {
		var word = $(this).html();
		var index = word.indexOf(' ');
		if(index == -1) {
			index = word.length;
		}
		$(this).html('<span class="first-word">' + word.substring(0, index) + '</span>' + word.substring(index, word.length));
	});
	
})(jQuery);
axios.defaults.baseURL = window.location.origin+'/api/';

(function($) {
	'use strict';
	// Navbar Menu JS
	// $('.scroll-btn, .navbar .navbar-nav li a').on('click', function(e){
	// 	var anchor = $(this);
	// 	$('html, body').stop().animate({
	// 		scrollTop: $(anchor.attr('href')).offset().top - 65
	// 	}, 1000);
	// 	e.preventDefault();
	// });
	$('.navbar .navbar-nav li a').on('click', function(){
		$('.navbar-collapse').collapse('hide');
	});

	// Menu Icon JS
	$(".menu-icon").on('click', function(){
		$(".menu-icon").toggleClass("active");
	})

	// $(".menu-icon").on('click', function(){
	// 	$(".header").toggleClass("active");
	// })

	// Preloader JS
	$(window).on('load', function() {
		$('.preloader').fadeOut();
	});



	// WOW Animation JS
	if($('.wow').length){
		var wow = new WOW({
			mobile: false
		});
		wow.init();
	};

	$('.slider-carousel').owlCarousel({
		margin:10,
		loop:true,
		autoWidth:true,
		items:4
	});

	$('.info-slider').owlCarousel({
		margin:0,
		loop:true,
		dots:false,
		nav:true,
		items:1
	});

	$('.banner-slider').owlCarousel({
		margin:0,
		loop:false,
		autoplay:true,
		dots:true,
		nav:false,
		items:1
	});

	$('.logo-slider').owlCarousel({
		margin:0,
		loop:true,
		autoWidth:true,
		autoplay:true,
		responsive:{
			0:{
				items:1.5,
			},
			600:{
				items:4.5,
			},
			1000:{
				items:8,
			}
		}
	});


	$(document).scroll(function(e){
		var scrollTop = $(document).scrollTop();
		if(scrollTop > 10){
			console.log(scrollTop);
			$('.header').removeClass('').addClass('fixed');
		} else {
			$('.header').removeClass('fixed').addClass('');
		}
	});


    $("#menu-btn").click(function(){
        $(".side-menu").toggleClass('intro');
    });
    $(".CloseBtn").click(function(){
        $(".side-menu").removeClass('intro');
    });

})(jQuery);



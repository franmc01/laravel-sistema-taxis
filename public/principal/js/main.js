$(document).ready(function () {
    'use strict';
    
    //********* page loader js

	setTimeout(function () {
		$('.loader_bg').fadeToggle(); 
	}, 2000);

	//********** menu background color change while scroll

	$(window).on('scroll', function () {
		var menu_area = $('.nav-area');
		if ($(window).scrollTop() > 200) {
			menu_area.addClass('sticky_navigation');
		} else {
			menu_area.removeClass('sticky_navigation');
		}
	});


	//********** menu hides after click (mobile menu)

	$(document).on('click', '.navbar-collapse.in', function (e) {
		if ($(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle') {
			$(this).collapse('hide');
		}
	});


	//*********** scrollspy js

	$('body').scrollspy({
		target: '.navbar-collapse',
		offset: 195
	});


	//************ smooth scroll js

	$('a.smooth-menu,a.banner-btn').on("click", function (e) {
		e.preventDefault();
		var anchor = $(this);
		$('html, body').stop().animate({
			scrollTop: $(anchor.attr('href')).offset().top - 50
		}, 1000);
	});

	//*********** Animated headline js

	$('.animate-scale').animatedHeadline({
		animationType: 'clip'
	});

	//***** Skill bar js

	var skillbar = $(".skillbar");

	skillbar.waypoint(function () {
		skillbar.each(function () {
			$(this).find(".skillbar-child").animate({
				width: $(this).data("percent")
			}, 1000);
		});
	}, {
		offset: "80%"
	});

	//*** Services carousel

	$("#services-carousel").owlCarousel({
		navigation: false,
		pagination: true,
		slideSpeed: 800,
		paginationSpeed: 800,
		smartSpeed: 500,
		autoplay: true,
		singleItem: true,
		loop: true,
		responsive:{
			0:{
				items:1
			},
			680:{
				items:2
			},
			1000:{
				items:3
			}
		}
	});	
    
    
    //************ Magnific Popup

    $('.video-play').magnificPopup({
        type: 'video',
    });

    $('.zoom,.zoom1').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });
	
    $('.counter').counterUp({
        delay: 50,
        time: 8000
    });
    
    //*************** Isotope filter

    var $Container = $('#img-filter');
    if( $Container.length>0 ) {
        $Container.isotope({
            itemSelector: '.single-port',
            transitionDuration: '0.8s'
        });
        $(".img-filter").on("click", function (e){
            $(".img-filter.active").removeClass("active");
            $(this).addClass("active");
            var selector = $(this).attr('data-filter');
            $Container.isotope({
                filter: selector
            });
            return false;
        });

        $(window).resize(function(){
            setTimeout(function(){
                $Container.isotope();
            },1000);
        }).trigger('resize');
    }
	
	
    //********* Video testimonial

    $('.video-play').magnificPopup({
        type: 'video',
	});
	
	$('.openVideo').magnificPopup({
		type: 'inline',
		callbacks: {
		  open: function() {
			$('html').css('margin-right', 0);
			// Play video on open:
			$(this.content).find('video')[0].play();
			},
		  close: function() {
			// Reset video on close:
			$(this.content).find('video')[0].load();
			}
		  }
		});

		//************* Owl Carousel

		$('.testimonial_owlCarousel').owlCarousel({
			loop:true,
			margin:10,
			dots:false,
			nav:true,
			autoplay:false,   
			smartSpeed: 3000, 
			autoplayTimeout:4000,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1000:{
					items:1 
				}
			}
		}) 	
    
});
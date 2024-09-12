
function main() {

(function () {
   'use strict';

   /* ==============================================
  	Testimonial Slider
  	=============================================== */ 

  	jQuery('a.page-scroll').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = jQuery(this.hash);
          target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            jQuery('html,body').animate({
              scrollTop: target.offset().top - 40
            }, 900);
            return false;
          }
        }
      });

    /*====================================
    Preloader
    ======================================*/
	
  	jQuery(window).load(function() {

   	// will first fade out the loading animation 
    	jQuery("#status").fadeOut("slow"); 

    	// will fade out the whole DIV that covers the website. 
    	jQuery("#preloader").delay(500).fadeOut("slow").remove();      

  	}) 
    /*====================================
    Show Menu on Book
    ======================================*/
    jQuery(window).bind('scroll', function() {
        var navHeight = jQuery(window).height() - 100;
         if (jQuery(window).scrollTop() > navHeight) {
              jQuery('.navbar-default').addClass('on');
          } else {
              jQuery('.navbar-default').removeClass('on');
          }
    });

    jQuery('body').scrollspy({ 
        target: '.navbar-default',
        offset: 80
    })

  	jQuery(document).ready(function() {
  	  jQuery("#team").owlCarousel({
  	 
  	      navigation : false, // Show next and prev buttons
  	      slideSpeed : 300,
  	      paginationSpeed : 400,
  	      autoHeight : true,
  	      itemsCustom : [
				        [0, 1],
				        [450, 2],
				        [600, 2],
				        [700, 2],
				        [1000, 4],
				        [1200, 4],
				        [1400, 4],
				        [1600, 4]
				      ],
  	  });

  	  jQuery("#clients").owlCarousel({
  	 
  	      navigation : false, // Show next and prev buttons
  	      slideSpeed : 300,
  	      paginationSpeed : 400,
  	      autoHeight : true,
  	      itemsCustom : [
				        [0, 1],
				        [450, 2],
				        [600, 2],
				        [700, 2],
				        [1000, 4],
				        [1200, 5],
				        [1400, 5],
				        [1600, 5]
				      ],
  	  });

      jQuery("#testimonial").owlCarousel({
        navigation : false, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true
        });

        jQuery("#about-qoutes").owlCarousel({
        navigation : false, // Show next and prev buttons
         autoplay:true,
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true
        });
  	});

  	/*====================================
    Portfolio Isotope Filter
    ======================================*/
    jQuery(window).load(function() {
        var $container = jQuery('.portfolio-items');
        $container.isotope({
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        jQuery('.cat a').click(function() {
            jQuery('.cat .active').removeClass('active');
            jQuery(this).addClass('active');
            var selector = jQuery(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            return false;
        });

    });

  	/*====================================
    WOW JS
    ======================================*/	

	new WOW().init();
	//smoothScroll
	//smoothScroll.init();


	
}());


}
main();
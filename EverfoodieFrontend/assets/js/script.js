(function ($) {
	"use strict";

	//testimonials slider



 $(document).ready(function() {



      // restaurant_slider 
      $('.restaurant_slider').owlCarousel({
        items:4,
        loop:true,
        nav:true,
        navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
        dots:true,
         margin:30,
        });



        //restaurant search and filter
        $(".search").on("click", function() {
          $(".search").css({"width":"80%"});
           $(".filter").css({"width":"20%"});
            $(".filter_cont").css({"display":"none"});
        });
          $(".filter").on("click", function() {
            $(".search").css({"width":"20%"});
            $(".filter").css({"width":"80%"});
          });

         $(".filter").on("click", function() {
            $(".filter_cont").toggle('fast');
        });



         // Reservation Payment Modal
      $('.restaurant_details_meal_item').click(function() {
              $(".addtocart_area").addClass("addtocart_modal_show");
              $(".addtocart_area_overlay").addClass("addtocart_modal_fadeIn");
          });
          $(".addtocart_toggle").click(function(e) {
              e.preventDefault();
              $(".addtocart_area").removeClass("addtocart_modal_show");
              $(".addtocart_area_overlay").removeClass("addtocart_modal_fadeIn");
          });




 });



   $(document).on('scroll', function() {
        var scrollPos = $(this).scrollTop();

        if( scrollPos > 10 ) {
            $('.header_area').addClass('navbar-home');
        }

        else {
            $('.header_area').removeClass('navbar-home');
        }
    });

   

}(jQuery));
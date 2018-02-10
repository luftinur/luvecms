;(function ($) {
	$(window).on("scroll",function(){
		
		if($("#hero.parallax").length){
			$("#hero.parallax > .inner-hero").css({
				"transform":"translateY(-" + ($(this).scrollTop() / 3) + "px)"
				
			});
		//	$("#hero.parallax").css("background-position", "50% " +  ($(this).scrollTop() / 2) + "%");	
		}
		
		
	});
	
	// background image wrap
	// var parentBgwrap = $(".bgwrap").parent().height();
	// $(".bgwrap").css("height",parentBgwrap);
	
	
	$(document).ready(function(){
		if($(".clients").length){
			$(".clients").owlCarousel({
				loop:true,
			    margin:10,
			    responsiveClass:true,
			    responsive:{
		        0:{
		            items:1,
		            nav:true
		        },
		        600:{
		            items:3,
		            nav:false
		        },
		        1000:{
		            items:5,
		            nav:true,
		            loop:false
		        }
		    }
			});
		}
	});
	
	
	var yourNavigation = $(".nav");
	    stickyDiv = "sticky";
	    header = $('#header').height();
	
	$(window).scroll(function() {
	  if( $(this).scrollTop() > header ) {
	    $('#header').addClass(stickyDiv);
	  } else {
	    $('#header').removeClass(stickyDiv);
	  }
	});
	
	
	
	
})(jQuery);
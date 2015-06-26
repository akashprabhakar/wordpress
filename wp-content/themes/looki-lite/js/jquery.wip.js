jQuery.noConflict()(function($){

/* ===============================================
   Scroll sidebar
   =============================================== */

	$( window ).load(function() {

		var sidebar_width = $('.scroll-sidebar').outerWidth();
		var header_height = $('header#header').outerHeight();
		var adminbar_height = $('#wpadminbar').outerHeight();
		
		$('#wrapper').css({
			'top' : header_height + 40,
		});

		$('#header').css({
			'top' : adminbar_height,
		});

		$('.scroll-sidebar').css({
			'top' : header_height + adminbar_height,
		});
		
		$('.scroll-sidebar .post-article:last-of-type').css({
			'padding-bottom' : header_height + adminbar_height + 40,
		});


		$(".navigation").click(function() {
		
			if($('.scroll-sidebar').css('right') < '0px' ) {	
				$('.scroll-sidebar').animate({'right':'0px'});
				$('#wrapper').animate({'right':sidebar_width}).addClass('open-sidebar');
				$(this).html('<i class="fa fa-times open"></i>');
			} 
				
			else if($('.scroll-sidebar').css('right') == '0px'){	
				$('.scroll-sidebar').animate({'right':-sidebar_width});
				$('#wrapper').animate({'right':'0px'}).removeClass('open-sidebar');
				$(this).html('<i class="fa fa-bars"></i>');
			} 
					
		});

	});

	$( window ).resize(function() {
			
		sidebar_width = $('.scroll-sidebar').outerWidth();
		header_height = $('header#header').outerHeight();
		adminbar_height = $('#wpadminbar').outerHeight();
		
		$('#wrapper').css({
			'top' : header_height + 40,
		});

		$('#header').css({
			'top' : adminbar_height,
		});

		$('.scroll-sidebar').css({
			'top' : header_height + adminbar_height,
		});
		
		$('.scroll-sidebar .post-article:last-of-type').css({
			'padding-bottom' : header_height + adminbar_height + 40,
		});

		if($('.scroll-sidebar').css('right') < '0px' ) {	
			$('.scroll-sidebar').css({'right':-sidebar_width});
		} 

	});

		
/* ===============================================
   Scroll to Top Plugin
   =============================================== */

	$('.back-to-top i').click(function(){
		$.scrollTo(0,'slow');
		return false;
	});


/* ===============================================
   Portfolio code
   =============================================== */

	$('.filterable-grid li').live('mouseover',function(){
			
		var imgw = $('.overlay',this).prev().width();
		var imgh = $('.overlay',this).prev().height();
			
		$('.overlay',this).css({'width':imgw,'height':imgh});	
			
		$('.overlay',this).animate({ opacity : 0.6 },{queue:false});
	
	});

	$('.filterable-grid li').live('mouseout',function(){
		
		$('.overlay', this).animate({ opacity: 0}, { queue:false });
		
	});

/* ===============================================
   Menu code
   =============================================== */

	$('nav#mainmenu ul > li').each(function(){
    	if( $('ul', this).length > 0 )
        $(this).children('a').append('<span class="sf-sub-indicator"> &raquo;</span>').removeAttr("href");
	}); 

	$('nav#mainmenu ul > li ul').click(function(e){
		e.stopPropagation();
    })
	
    .filter(':not(:first)')
    .hide();
    
	$('nav#mainmenu ul > li, nav#mainmenu ul > li > ul > li').click(function(){

		var selfClick = $(this).find('ul:first').is(':visible');
		if(!selfClick) {
		  $(this).parent().find('> li ul:visible').slideToggle('low');
		  
		
		}
		
		$(this).find('ul:first').stop(true, true).slideToggle();
	
	});

/* ===============================================
   Overlay code
   =============================================== */
	
	$('.overlay-image.shortcode-thumb').hover(function(){
		
		var imgwidth = $(this).children('img').width();
		var imgheight = $(this).children('img').height();
		$(this).children('.zoom').css({'width':imgwidth,'height':imgheight});	
		$(this).children('.link').css({'width':imgwidth,'height':imgheight});		
		$(this).css({'width':imgwidth+10});		
		
		$('.overlay',this).animate({ opacity : 0.6 },{queue:false});
		}, 
		function() {
		$('.overlay',this).animate({ opacity: 0.0 },{queue:false});
	
	});
	
	
	$('.overlay-image.blog-thumb').hover(function(){
		
		var imgwidth = $(this).children('img').width();
		var imgheight = $(this).children('img').height();
		
		$(this).children('.link').css({'width':imgwidth,'height':imgheight});		
		$(this).css({'width':imgwidth, 'height':imgheight});		
		
		$('.overlay',this).animate({ opacity : 0.4 },{queue:false});
		}, 
		function() {
		$('.overlay',this).animate({ opacity: 0.0 },{queue:false});
	
	});

	$('.gallery img').hover(function(){
		$(this).animate({ opacity: 0.50 },{queue:false});
	}, 
	function() {
		$(this).animate({ opacity: 1.00 },{queue:false});
	});
	
/* ===============================================
   Prettyphoto code
   =============================================== */

	$("a[data-rel^='prettyPhoto']").prettyPhoto({
	
				animationSpeed:'fast',
				slideshow:5000,
				theme:'pp_default',
				show_title:false,
				overlay_gallery: false,
				social_tools: false
	});

});          
jQuery.noConflict()(function($){

/* ===============================================
   Message, after save options
   =============================================== */

	$('.wip_message').delay(1000).fadeOut(1000);

/* ===============================================
   On off
   =============================================== */

	$('.on-off').live("change",function() {
		
		if ($(this).val() == "on" ) { 
			$('.hidden-element').css({'display':'none'});
		} 
		else { 
			$('.hidden-element').slideDown("slow");
		} 
	
	}); 

	$('input[type="checkbox"].on_off').live("change",function() { 
	
		if (!this.checked) { 
			$(this).parent('.iPhoneCheckContainer').parent('.wip_inputbox').next('.hidden-element').slideUp("slow");
		} else { 
			$(this).parent('.iPhoneCheckContainer').parent('.wip_inputbox').next('.hidden-element').slideDown("slow");
		} 
	
	});
	
/* ===============================================
   Option panel
   =============================================== */

	$('.wip_mainbox').css({'display':'none'});
	$('.inactive').next('.wip_mainbox').css({'display':'block'});

	$('.wip_container h5.element').each(function(){
	
		if($(this).next('.wip_mainbox').css('display')=='none') {	
			$(this).next('input[name="element-opened"]').remove();	
		}
						
		else {	
			$(this).next().append('<input type="hidden" name="element-opened" value="'+$(this).attr('id')+'" />');
				
		}
						
	});

	$('.wip_container h5.element').live("click", function(){
	
		if($(this).next('.wip_mainbox').css('display')=='none') {	
		
			$(this).addClass('inactive');
			$(this).children('img').addClass('inactive');
			$('input[name="element-opened"]').remove();	
			$(this).next().append('<input type="hidden" name="element-opened" value="'+$(this).attr('id')+'" />');
		}
						
		else {	
		
			$(this).removeClass('inactive');
			$(this).children('img').removeClass('inactive');
			$(this).next('input[name="element-opened"]').remove();	
				
		}
						
		$(this).next('.wip_mainbox').stop(true,false).slideToggle('slow');
	
	});

	$( "#tabs.metaboxes" ).tabs();
	
});
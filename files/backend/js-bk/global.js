$(function() 
{
	// Remove No JS Class
	$('html').removeClass('no-js');

	// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

	// Convert each css based drop menu into a JS drop menu.
	$('.css_nav_dropmenu').each(function(){
		// Save menu height to enable dropmenu animation
		var menu_height = $(this).find('ul').height();
		$(this).attr('data-menu-height', menu_height);
		
		// Remove fallback css hover effect on JS load
		$(this).attr('class','js_nav_dropmenu'); // Removes existing CSS class	
	});

	// Position Menus for IE6-7 Bug
	$('.js_nav_dropmenu').each(function()
	{
		var pos = $(this).position();
		$(this).find('ul').css('left',pos.left);
	});

	// Toggle Menus
	// $('.js_nav_dropmenu').live({mouseover:function()
	// {	
	// 	var menu_height = $(this).attr('data-menu-height');		
	// 	$(this).find('ul').stop().animate({'height':menu_height}, 400);
	// },
	// mouseleave:function()
	// {
	// 	$(this).find('ul').stop().animate({'height':'0'}, 400);
	// }});

	$('body').on('mouseover', '.js_nav_dropmenu', function(){
		var menu_height = $(this).attr('data-menu-height');		
		$(this).find('ul').stop().animate({'height':menu_height}, 400);
	});
	$('body').on('mouseleave', '.js_nav_dropmenu', function(){
		$(this).find('ul').stop().animate({'height':'0'}, 400);
	});
	
	// Fix uneven div heights
	$('.parallel').each(function()
	{
		var tallest_elem = 0;
		$(this).find('.parallel_target').each(function(i)
		{
			tallest_elem = ($(this).height() > tallest_elem)?$(this).height():tallest_elem;
		});
		
		$(this).find('.parallel_target').css({'min-height':tallest_elem});
	});	
	
	// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

	// Animate flexi auth ribbon
	$('#flexi_auth_ribbon').hover(
		function()
		{
			$(this).addClass('hover');
			$(this).clearQueue().animate({top:0}, 250);
		},
		function()
		{
			$(this).removeClass('hover');
			$(this).clearQueue().animate({top:-60}, 500);
		}
	);

	// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //
	
	// Fade out status messages, but ensure error messages stay visable.
	if ($('.status_msg').length > 0 && $('.error_msg').length == 0)
	{
		$('#message').delay(4000).fadeTo(1000,0.01).slideUp(500);
	}

	// Tooltip helpers.
	// $('.tooltip_trigger[title]').tooltip({effect:'slide', predelay:500});

	// Toggle show/hide next html tag.
	$('body').on('click', '.toggle', function(){
		$(this).parent().find('.hide_toggle').slideToggle('medium', function() {
			if ($(this).is(':visible'))
				$(this).css('display','block');
		});
	});
	
	// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //
	
	// Show hidden help in user guide.
	$('.help_link').click(function(){
		$('#help_guide').show();
	});
	
	// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //
	
	$('body').on('keypress', '.validate_alpha', function(e){
		return validate_alpha(e);
	});
	
	$('body').on('keypress', '.validate_integer', function(e){
		return validate_numbers($(this), e, false, false);
	});
	
	$('body').on('keypress', '.validate_decimal', function(e){
		return validate_numbers($(this), e, true, false);
	});
});

// http://www.mredkj.com/tutorials/validate2.html
function validate_alpha(e)
{
	var key = window.event ? e.keyCode : e.which;
	var keychar = String.fromCharCode(key);
	reg = /\d/;
	return !reg.test(keychar);
}

// http://www.mredkj.com/tutorials/validate2.html
function validate_numbers(obj, e, allowDecimal, allowNegative)
{
	var key;
	var isCtrl = false;
	var keychar;
	var reg;
		
	if (window.event) 
	{
		key = e.keyCode;
		isCtrl = window.event.ctrlKey
	}
	else if (e.which) 
	{
		key = e.which;
		isCtrl = e.ctrlKey;
	}
	
	if (isNaN(key)) 
	{
		return true; 
	}
	
	keychar = String.fromCharCode(key);
	
	// Check for backspace or delete, or if Ctrl was pressed
	if (key == 8 || isCtrl)
	{
		return true;
	}

	reg = /\d/;
	var isFirstN = allowNegative ? keychar == '-' && obj.value.indexOf('-') == -1 : false;
	var isFirstD = allowDecimal ? keychar == '.' && obj.value.indexOf('.') == -1 : false;
	
	return isFirstN || isFirstD || reg.test(keychar);
}
// main JS file for GTST Wordpress theme by STADTKREATION 01/2019

var $ = jQuery;
var mainNaviContent = '';
var topNaviContent = '';

$(document).ready(function(){
	// get navi contents for mobile menu manipulation
	$('.top-navigation li').addClass('topnavi');
	mainNaviContent = $('.main-navigation > div > ul').html();
	topNaviContent = $('.top-navigation > div > ul').html();
	mobileNaviContent = mainNaviContent + topNaviContent;
	
	menuManipulations();
	
	// move header slider to respective wrapper
	if($('.gtst-header-slideshow').length) {
		var headerSlideshow = $('.gtst-header-slideshow').first();
		$('.gtst-header-slideshow').first().remove();
		$('.header-slider').append(headerSlideshow);
		$('.gtst-header-slideshow .gallery').slick({
			vertical: true,
			autoplay: true,
			dots: true,
			autoplaySpeed: 6000,
			infinite: true,
			verticalSwiping: true,
			pauseOnHover: false
		});
		$('.gtst-header-slideshow .slick-slide').each(function(){
			var slideSrc = $(this).find('img').attr('src');
			$(this).find('img').remove();
			$(this).closest('.slick-slide').css('background-image','url('+slideSrc+')');
		});
	}
	
	// textslides
	$('.gtst-textslides .inner > p').remove();
	$('.gtst-textslides .inner').slick({
		infinite: false
	});
	$('.gtst-textslides .textslides-navigation .prev').hide();
	$('.gtst-textslides .textslides-navigation .prev').on('click',function(e){
		e.preventDefault();
		$(this).blur();
		$(this).closest('.gtst-textslides').find('.slick-prev').trigger('click');
		$(this).closest('.textslides-navigation').find('.next').show();
		if($(this).closest('.gtst-textslides').find('.slick-slide').first().hasClass('slick-active')) $(this).hide();
	});
	$('.gtst-textslides .textslides-navigation .next').on('click',function(e){
		e.preventDefault();
		$(this).blur();
		$(this).closest('.gtst-textslides').find('.slick-next').trigger('click');
		$(this).closest('.textslides-navigation').find('.prev').show();
		if($(this).closest('.gtst-textslides').find('.slick-slide').last().hasClass('slick-active')) $(this).hide();
	});
	
	// wrap submit fields
	$('input[type="submit"], button[type="submit"]').each(function(){
		if(!$(this).closest('#wpadminbar').length) {
			var className = $(this).attr('class');
			if(!className) className = 'submit-field';
			$(this).wrap('<span class="'+className+'-wrap submit-wrap"></span>');
			$(this).closest('.submit-wrap').on('click',function(){
				$(this).closest('form').submit();
			});
		}
	});
	
	// click event for accordion tabs
	$('.accordion .accordion-title a').on('click',function(e){
		e.preventDefault();
		if(!$(this).closest('.accordion-part').hasClass('active')) {
			$(this).closest('.accordion').find('.accordion-part.active').animate({width: '35px'},300);
			$(this).closest('.accordion').find('.accordion-part').removeClass('active');
			$(this).closest('.accordion-part').animate({width: ($(this).closest('.accordion-part').find('.accordion-content').innerWidth())+'px'},300,function(){
				$(this).closest('.accordion-part').addClass('active');
			});
		}
	});
	
	// click event for tabs
	$('.tabnav a').bind('click', function(e) {
		e.preventDefault();
		$(this).closest('.tabnav').find('a').removeClass('active');
		$(this).closest('.tabnav').find('li').eq($(this).closest('li').index()).find('a').addClass('active');
		$(this).closest('.tabnav').parent().find('.tabbox').css('visibility','hidden');
		$(this).closest('.tabnav').parent().find('.tabbox').eq($(this).closest('li').index()).css('visibility','visible');
	});
	$('.tabnav').each(function(){
		$(this).find('a').first().trigger('click');
	});
	
	// blur menu toggle on click
	$('.menu-toggle').on('click',function(){
		$(this).blur();
	});
	
	// print page 
	$('.print-page a').on('click',function(e){
		e.preventDefault();
		$(this).blur();
		window.print();
		
	});
	
	// gtst accordion
	$('.gtst-accordion-section-title').click(function(){
		$(this).closest('.gtst-accordion-section').toggleClass('open');
		$(this).closest('.gtst-accordion-section').find('.gtst-accordion-section-content').slideToggle();
	});
	
	cssManipulations();
});

$(window).resize(function(){
	cssManipulations();
	menuManipulations();
});

function cssManipulations() {
	// adjust accordions
	setTimeout(function(){
		$('.accordion').each(function(){
			var countAccordionElements = $(this).find('.accordion-part').length;
			var accordionContentWidth = $(this).innerWidth()-$(this).find('.accordion-part').length*$(this).find('.accordion-title').first().innerWidth() + 5;
			$(this).find('.accordion-part .accordion-content').css('width',accordionContentWidth+'px');
			$(this).find('.accordion-part .teaser-content').css('width',accordionContentWidth+'px');
			$(this).find('.accordion-part.active').css('width',(accordionContentWidth)+35+'px');
		});
	},500);
	
	// tabbox height
	$('.teaser:not(.accordion):not(.tabs2)').each(function(){
		var maxHeight = 0;
		$(this).find('.tabbox').each(function(){
			if($(this).innerHeight()>maxHeight) maxHeight = $(this).innerHeight();
		});
		$(this).find('.teaser-content').css('height',maxHeight+'px');
	});
	
	// teaser content height
	$('.teaser.tabs2 .teaser-content').each(function(){
		$(this).css('height','calc(100% - '+$(this).closest('.teaser').find('.tabnav').innerHeight()+'px)');
	});
	
}

function menuManipulations() {
	if($(window).innerWidth()>=768) {
		$('.main-navigation > div > ul').html(mainNaviContent);
		$('.home-hide').removeClass('home-hide');
	}
	else {
		$('.main-navigation > div > ul').html(mobileNaviContent);
		$('.main-navigation a').each(function(){
			if($(this).attr('href')==$('.site-title a').attr('href')) $(this).closest('li').addClass('home-hide');
		});
	}
}
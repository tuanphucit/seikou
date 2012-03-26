////////////////////////////////////////////////////////////////////////////////////
// Custom Functions For: Krisp | HTML/CSS Portfolio template
////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////////////////////// 
// variables start
var $ = jQuery.noConflict(); 
// variables end
////////////////////////////////////////////////////////////////////////////////////




////////////////////////////////////////////////////////////////////////////////////
// document ready starts
$(document).ready(function() {
			
			// initial settings start
			$(".mainMenu > li").each(function(){
											  
              if ($(this).find("ul").length > 0){
              $(this).addClass("hasSubMenu");
              }
			  
            });
			
			$(".nivo-directionNav").css({opacity:0});
			
			$(".logosWrap > a").css({opacity:0.4});
			
			$(".faqWrap").hide();
			
			$(".portfolioItemDetailsBtn").css({opacity:0});
			
			$(".socialLink").css({opacity:0.4});
			
			$(".postShare").css({opacity:0.4});
			// initial settings end
			
			
			// animate sub menus start
			$(".mainMenu > li").hover(function() { 
											   
               $(this).find("> ul").stop(true, true).animate({ 
                                 height: "show"
                                 },250,"easeOutCubic");// set the speed for the drop-down menu
               },function(){
               $(this).find("> ul").stop(true, true).animate({
                                 height:"hide"
                                 },250,"easeOutCubic");// set the speed for the drop-down menu
			  
            });
            // animate sub menus end
			
			
			// animate sub menu items start
			$(".mainMenu > li > ul > li").hover(function() { 
											   
               $(this).stop().find("> a").animate({ 
                                 marginLeft: "15px"
                                 },150,"easeOutCubic");// set the speed for the drop-down menu
               },function(){
               $(this).stop().find("> a").animate({
                                 marginLeft:"10px"
                                 },150,"easeOutCubic");// set the speed for the drop-down menu
			  
            });
            // animate sub menu items end
			
			
			// animate logos start
			$(".logosWrap > a").hover(function() { 
											   
               $(this).stop().animate({ 
                                 opacity: 1
                                 },250,"easeOutCubic");// set the speed for the drop-down menu
               },function(){
               $(this).stop().animate({
                                 opacity: 0.4
                                 },250,"easeOutCubic");// set the speed for the drop-down menu
			  
            });
            // animate logos items end
			
			
			// animate alert messages start
			$('.errorMessage span, .warningMessage span, .infoMessage span, .okMessage span').click(function() {
               $(this).parent().animate({
                                 opacity: 0
                                 }, 300, function() {
                                 $(this).css({"display":"none"})
                                 });
            });
			// animate alert message end
			
			
			// animate faqs starts
			$('.faqTitle').click(function(){
			   if( $(this).is(':visible') ) { 
		       $(this).removeClass('faqActive').next().slideUp(); 
	           }
			   
	           if( $(this).next().is(':hidden') ) { 
		       $('.faqTitle').removeClass('faqActive').next().slideUp(); 
		       $(this).toggleClass('faqActive').next().slideDown(); 
	           }
	        return false; 
            });
			// animate faqs ends
			
			
			// animate portfolio item details btn start
			$(".portfolio3ItemImage, .portfolio2ItemImage, .portfolio1ItemImage, .recentProjectImageWrap").hover(function() { 
											   
               $(this).stop().find(".portfolioItemDetailsBtn").animate({ 
                                 opacity: 1
                                 },150,"easeOutCubic");// set the speed for the drop-down menu
               },function(){
               $(this).stop().find(".portfolioItemDetailsBtn").animate({
                                 opacity:0
                                 },150,"easeOutCubic");// set the speed for the drop-down menu
			  
            });
			// animate portfolio item details btn start
			
			
			// animate social links start
			$(".socialLink, .postShare").hover(function() { 
											   
               $(this).stop().animate({ 
                                 opacity: 1
                                 },250,"easeOutCubic");// set the speed for the drop-down menu
               },function(){
               $(this).stop().animate({
                                 opacity: 0.4
                                 },250,"easeOutCubic");// set the speed for the drop-down menu
			  
            });
            // animate social links end
			
			
			// animate categories links start
			$(".categoriesList li > a").hover(function() { 
											   
               $(this).stop().animate({ 
                                 marginLeft: "5px"
                                 },250,"easeOutCubic");// set the speed for the drop-down menu
               },function(){
               $(this).stop().animate({
                                 marginLeft: "0px"
                                 },250,"easeOutCubic");// set the speed for the drop-down menu
			  
            });
            // animate categories links end
			
	        
			// colorbox starts
			$(".zoomInBtn").colorbox();
			// colorbox ends 
			
			
			// portfolio tabs start
            $(".pageNumbers > ul").tabs("div.portfolioWrap > div",{
			   effect: 'fade',
			   fadeSpeed: 300
			});
			// portfolio tabs end
			
			
			// project slider starts
            $('.projectSliderWrap').cycle({

	           fx:     'scrollLeft',  // effect
               easing: 'linear', // set the easing you want , easeInElastic, easeOutBack  ...
	           speed:  700,    // speed of transition
	           timeout: 3200,    // timeout of the slide
               pause:       false,     // true to enable "pause on hover"
               pauseOnPagerHover: false, // true to pause when hovering over pager link
	           pager:  '#sliderNavList',
		   
	           pagerAnchorBuilder: function(idx, slideModule) {
	            return '#sliderNavList li:eq(' + (idx) + ') a';
	           },
               cleartypeNoBg: true,  // fix cleartype inside slides
               cleartype: true  // fix cleartype inside slides
	        });
			// project slider ends 
			
			
			// change background starts
            $('.bgSw').click(function(e){
               e.preventDefault();
		       $("body").css("background", "#fff url('" + $(this).attr("href") + "')");
            });
			// change background ends 
			
			
}); 
// document ready ends
////////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////////////////
// window load starts

            // nivo slider starts
            $(window).load(function() {
              $('#mainSlider').nivoSlider();
            });
			//nivo slider ends
			
// window load ends
////////////////////////////////////////////////////////////////////////////////////
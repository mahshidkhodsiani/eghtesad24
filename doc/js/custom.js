var W3CRM  = function(){
	
	var screenWidth = $( window ).width();
	
	var handleSidebarCollapse = function(){
		if(jQuery('#sidebarCollapse').length > 0){
			$('#sidebarCollapse').on('click', function () {
				$('#nevbarleft').toggleClass('active');
				$('#content').toggleClass('active');
				$(this).toggleClass('active');
				
				$('#mobileCloseBtn').on('click', function () {
					$('#nevbarleft').removeClass('active');
				});
			});
		}		
	}
	
	var handleScrollTop = function (){
		var scrollTop = jQuery(".scroltop");
		
		/* page scroll top on click function */	
		scrollTop.on('click',function() {
			jQuery("html, body").animate({
				scrollTop: 0
			}, 1000);
			return false;
		})

		jQuery(window).bind("scroll", function() {
			var scroll = jQuery(window).scrollTop();
			if (scroll > 900) {
				jQuery(".scroltop").fadeIn(1000);
			} else {
				jQuery(".scroltop").fadeOut(1000);
			}
		});
		/* page scroll top on click function end*/
	}
	
	var handleNavbarNav = function(){
		if(jQuery('.navbar-nav').length > 0){
			$(".navbar-nav a").on('click', function(event) {
				// Make sure this.hash has a value before overriding default behavior
				if (this.hash !== "") {
					// Prevent default anchor click behavior
					event.preventDefault();
					
					// Store hash
					var hash = this.hash;

					// Using jQuery's animate() method to add smooth page scroll
					// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
					$('html, body').animate({
						scrollTop: $(hash).offset().top
					});
				} // End if
			});
		}
	}
	
	var handleDZTree = function(){
		if(jQuery('#dz_tree').length > 0){
			$("#dz_tree").jstree({
				"core": {
					"themes": {
						"responsive": false
					}
				},
				"types": {
					"default": {
						"icon": "fa fa-folder"
					},
					"file": {
						"icon": "fa fa-file-text"
					}
				},
				"plugins": ["types"]
			});
		}
	}
	
	var handleDeznavScroll = function(){
		if(jQuery('.deznav-scroll').length > 0){
			const qs = new PerfectScrollbar('.deznav-scroll');
			qs.isRtl = false;
		}
	}
	
	function handleSupport(){	
		var dzscript = '<script id="DZScript" src="https://dzassets.s3.amazonaws.com/w3-global.js?btn_dir=right"></script>';
		jQuery('body').append(dzscript);
	}
	
	/* Function ============ */
	return {
		init:function(){
			handleSidebarCollapse();
			handleScrollTop();
			handleNavbarNav();
			handleDZTree();
			handleDeznavScroll();
			handleSupport();
		},
	}

}();

jQuery(document).ready(function() {
    'use strict';
	
	W3CRM.init();
	
});
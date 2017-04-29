//Dynamic footer utility to ensure footer stays at bottom
jQuery(document).ready(function() {
	jQuery('#js-heightControl').css('height', jQuery(window).height() - jQuery('html').height() +'px');
});

//Add the faq functionality
jQuery("#faq dd").hide();
jQuery("#faq dt").click(function () {
    jQuery(this).next("#faq dd").slideToggle();
    jQuery(this).toggleClass("expanded");
});

//Dropdown on hover
jQuery('ul.navbar-nav li.dropdown').hover(function() {
	jQuery(this).find('.dropdown-menu').stop(true, true).delay(150).fadeIn(250);
}, function() {
	jQuery(this).find('.dropdown-menu').stop(true, true).delay(150).fadeOut(250);
});

//Hide the tooltips for the menu links
jQuery('.nav-link').removeAttr('title');
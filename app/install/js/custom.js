// JavaScript Document

// cufon font replacement class/id
Cufon.replace('h1,h2,h3,h4,h5,#header_top p,.button_1 a,.sub_header a,form.contact_form label,form#loginform label',{textShadow: '0px 1px 0px #ffffff'});   
Cufon.replace('#footer h4');    
  
$(document).ready(function(){

//subscribe form
$(function(){
	$('#subform').validate({
	    submitHandler: function(form) {
			    $(form).ajaxSubmit({
				    url: 'http://tanshcreative.com/fluence-lp-preview/php/subscribe-form.php',
					clearForm: true,
				    success: function() {
				    	$('.sub_inner').hide();
				    	$('.subscribe').append("<p>Thank you for subscribing with us!</p>")
				    }
			    });
		    }
	});         
});

$('#subform #email').val('');

//Contact form
$(function(){
	$('form').validate({
	    submitHandler: function(form) {
			    $(form).ajaxSubmit({
				    url: 'post.setup.php',
					clearForm: false,
				    success: function(r) {
						var r = JSON.parse(r);
						console.log(r);
						alert(r.message);

						if(r.success){
							location.reload();
						}
						/*
				    	$('.contact_inner').hide();
				    	$('.contact').append("<h2>Thank You...!</h2><p>You have successfullly registered for 10 days free trial of fluence!</p><p>Eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitamquod ii legunt. Complete the form below.</p>")
						*/
				    }
			    });
		    }
	});  
});
$('#form #message').val('');
$('#form #email').val('');

//Fancybox for feature image / gallery
$("a[rel=next]").fancybox({
		'opacity'		: true,
		'overlayShow'	       : true,
		'overlayColor': '#000000',
		'overlayOpacity'     : 0.9,
		'titleShow':true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic'
});

//On Hover Event for gallery / feature image
$('ul.features li img').hover(function(){
			$(this).animate({opacity: 0.6}, 300);
		}, function () {
			$(this).animate({opacity: 1}, 300);
});

//Slideshow for testimonial
$('.testimonial').cycle({
		fx: 'fade', // choose your transition type, ex: fade, scrollUp, scrollLeft etc... 
   		speed: 1000,
		timeout: 4000,  // milliseconds between slide transitions (0 to disable auto advance)
		cleartypeNoBg:   true, // set to true to disable extra cleartype fixing (leave false to force background color setting on slides)
		pause:  1
});

}); // close document.ready

<!--
	getTwitters('twitter', {
        id: 'envato', 
        count: 2, 
        enableLinks: true, 
        ignoreReplies: false,
        template: '<span class="twitterPrefix" style=" padding-bottom: 10px;"><span class="twitterStatus">%text%</span> <span class="username"><a href="http://twitter.com/%user_screen_name%"><br/></span>',
        newwindow: true
});
-->
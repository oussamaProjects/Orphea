jQuery(document).ready(function(){

	jQuery(window).scroll(function () {

		$scrollTop = jQuery(this).scrollTop();
		
		if ($scrollTop >= 40) { jQuery(".seconde-site-branding").addClass("scroll"); }
		else{ jQuery('.seconde-site-branding').removeClass("scroll"); }

	});
	
	jQuery("#menu_burger").click(function(){   
		jQuery("#site-navigation").slideToggle("slow");
		jQuery(this).toggleClass("open");
	});

	jQuery('.hook a[href^="#"]').click(function(){
		var the_id = jQuery(this).attr("href");

		jQuery('html, body').animate({
			scrollTop:jQuery(the_id).offset().top - 60
		}, 'slow');
		return false;
	});

	jQuery('.Go_up a[href^="#"]').click(function(){ 

		jQuery('html, body').animate({
			scrollTop:0
		}, 'slow');
		return false;
	});

	jQuery("#primary-menu li").each(function() {
		$li = jQuery( this );
		$ulNiv1 = $li.children("ul");

		if ($ulNiv1.length) {
			$a = $li.children('a');
			$a.addClass('bullet');
 

			$a.click(function(evt){
				evt.preventDefault();

				$currentUl = jQuery(this).next('ul');
				console.log($currentUl);
				jQuery("#primary-menu li>ul").not($currentUl).removeClass('showAll');
				jQuery("#primary-menu li>a").not(jQuery(this)).removeClass('up');
				jQuery("#primary-menu li").not(jQuery(this).parent()).removeClass('_show_li');

				$currentUl.toggleClass('showAll');
				jQuery(this).toggleClass('up');
				jQuery(this).parent().toggleClass('_show_li');
			});

		}else 
		jQuery( this ).children("ul").removeClass('showAll')



	});

	jQuery('#showMore').click(function(){
		jQuery(this).toggleClass('open');
		jQuery('.suite').slideToggle();
	});


	jQuery('#slider_site').owlCarousel({
		loop:true,
		margin:0,
		dots: true,
		nav:false,	 
		navText: ['<i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>','<i class="fa fa-angle-right fa-lg" aria-hidden="true"></i>'],
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		}
	});

	jQuery('#slider_clients').owlCarousel({
		loop:true,
		margin:0,
		dots: false,
		nav: true,	 
		navText: ['<img src="http://cloudces.myds.me/badr.b/vocaza/wp-content/themes/vocaza/images/prev.png">','<img src="http://cloudces.myds.me/badr.b/vocaza/wp-content/themes/vocaza/images/next.png">'],
		responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},
			1000:{
				items:4
			}
		}
	});

	jQuery('#slider_articles').owlCarousel({
		loop:true,
		margin:20,
		dots: false,
		nav: true,	 
		navText: ['<img src="http://cloudces.myds.me/badr.b/vocaza/wp-content/themes/vocaza/images/prev.png">','<img src="http://cloudces.myds.me/badr.b/vocaza/wp-content/themes/vocaza/images/next.png">'],
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:4
			}
		}
	});



	jQuery('#webinaires_slider').owlCarousel({
		loop:true,
		margin:0,
		dots: false,
		nav:true,	
		margin: 20, 
		navText: ['<img src="http://cloudces.myds.me/badr.b/vocaza/wp-content/themes/vocaza/images/prev.png">','<img src="http://cloudces.myds.me/badr.b/vocaza/wp-content/themes/vocaza/images/next.png">'],
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:2
			}
		}
	});


	jQuery('#home_clients_slider').owlCarousel({
		loop:true,
		margin:0,
		dots: false,
		nav:true,	
		margin: 20, 
		navText: ['<img src="http://cloudces.myds.me/badr.b/vocaza/wp-content/themes/vocaza/images/prev.png">','<img src="http://cloudces.myds.me/badr.b/vocaza/wp-content/themes/vocaza/images/next.png">'],
		responsive:{
			0:{
				items:1
			},
			600:{
				items:3
			},
			1000:{
				items:6
			}
		}
	});



	if (window.matchMedia("(max-width: 767px)").matches) {

	}else{

	}



	jQuery('.partage a.btn').click(function(e){
		e.preventDefault();
		var $link   = jQuery(this);
		var href    = $link.attr('href');
		var network = $link.attr('data-network');

		var networks = {
			facebook : { width : 600, height : 300 },
			twitter  : { width : 600, height : 254 },
			google   : { width : 515, height : 490 },
			linkedin : { width : 600, height : 473 }
		};

		var popup = function(network){
			var options = 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,';
			window.open(href, '', options+'height='+networks[network].height+',width='+networks[network].width);
		}

		popup(network);
	});



});
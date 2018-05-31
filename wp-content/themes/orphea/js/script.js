jQuery(document).ready(function() {

    jQuery(window).scroll(function() {

        $scrollTop = jQuery(this).scrollTop();

        if ($scrollTop >= 160) {
            jQuery('.Go_up').show();
        } else {
            jQuery('.Go_up').hide();
        }

    });

    jQuery('#print-link').click(function(e) {
        e.preventDefault();
        window.print();
    });

    jQuery("#menu_burger").click(function() {
        jQuery("#site-navigation").slideToggle("slow");
        jQuery(this).toggleClass("open");
    });

    jQuery('.hook a[href^="#"]').click(function() {
        var the_id = jQuery(this).attr("href");

        jQuery('html, body').animate({
            scrollTop: jQuery(the_id).offset().top - 60
        }, 'slow');
        return false;
    });

    jQuery('.Go_up a[href^="#"]').click(function() {

        jQuery('html, body').animate({
            scrollTop: 0
        }, 'slow');
        return false;
    });

    jQuery("#primary-menu li").each(function() {
        $li = jQuery(this);
        $ulNiv1 = $li.children("ul");

        if ($ulNiv1.length) {
            $a = $li.children('a');
            $a.addClass('bullet');


            $a.click(function(evt) {
                evt.preventDefault();

                $currentUl = jQuery(this).next('ul');
                jQuery("#primary-menu li>ul").not($currentUl).removeClass('showAll');
                jQuery("#primary-menu li>a").not(jQuery(this)).removeClass('up');
                jQuery("#primary-menu li").not(jQuery(this).parent()).removeClass('_show_li');

                $currentUl.toggleClass('showAll');
                jQuery(this).toggleClass('up');
                jQuery(this).parent().toggleClass('_show_li');
            });

        } else
            jQuery(this).children("ul").removeClass('showAll')



    });

    jQuery('#showMore').click(function() {
        jQuery(this).toggleClass('open');
        jQuery('.suite').slideToggle();
    });


    jQuery('#slider_site').owlCarousel({
        loop: true,
        margin: 0,
        dots: true,
        nav: false,
        navText: ['<i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>', '<i class="fa fa-angle-right fa-lg" aria-hidden="true"></i>'],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    jQuery('#slider_clients').owlCarousel({
        loop: true,
        margin: 0,
        dots: false,
        nav: true,
        navText: ['<img src="/wp-content/themes/orphea/img/prev.png">', '<img src="/wp-content/themes/orphea/img/next.png">'],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });

    jQuery('#slider_articles').owlCarousel({
        loop: true,
        margin: 20,
        dots: false,
        nav: true,
        navText: ['<img src="/wp-content/themes/orphea/img/prev.png">', '<img src="/wp-content/themes/orphea/img/next.png">'],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 4
            }
        }
    });



    jQuery('#slider_temoignages').owlCarousel({
        loop: true,
        margin: 20,
        dots: false,
        nav: true,
        navText: ['<img src="/wp-content/themes/orphea/img/prev-w.png">', '<img src="/wp-content/themes/orphea/img/next-w.png">'],
        responsive: {
            0: {
                items: 1
            }
        }
    });



    jQuery('#webinaires_slider').owlCarousel({
        loop: true,
        margin: 0,
        dots: false,
        nav: true,
        margin: 20,
        navText: ['<img src="/wp-content/themes/orphea/img/prev.png">', '<img src="/wp-content/themes/orphea/img/next.png">'],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 2
            }
        }
    });


    jQuery('#home_clients_slider').owlCarousel({
        loop: true,
        dots: false,
        nav: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        margin: 20,
        navText: ['<img src="/wp-content/themes/orphea/img/prev.png">', '<img src="/wp-content/themes/orphea/img/next.png">'],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 6
            }
        }
    });



    if (window.matchMedia("(max-width: 767px)").matches) {

    } else {

    }



    jQuery('.partage a.btn').click(function(e) {
        e.preventDefault();
        var $link = jQuery(this);
        var href = $link.attr('href');
        var network = $link.attr('data-network');

        var networks = {
            facebook: { width: 600, height: 300 },
            twitter: { width: 600, height: 254 },
            google: { width: 515, height: 490 },
            linkedin: { width: 600, height: 473 }
        };

        var popup = function(network) {
            var options = 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,';
            window.open(href, '', options + 'height=' + networks[network].height + ',width=' + networks[network].width);
        }

        popup(network);
    });

    jQuery('#search-link').click(function(e) {
        e.preventDefault();
        jQuery('#ajaxsearchlite1').slideToggle('fast');
    });

    jQuery('figure.gallery-item .gallery-icon.landscape a img').before('<div class="galerie-loupe"></div>');

    jQuery('input[type=number]').on('input', function(){
        var num = Math.abs(Number(jQuery(this)[0].value));
        var min = Number(jQuery(this).attr('min'));
        var max = Number(jQuery(this).attr('max'));

        if (num < min) {
            num = min;
        } else if (num > max) {
            num = max;
        }

        jQuery(this)[0].value = num;
    });
});

jQuery(function($) {

    var canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
        bottomOffset = 500; // the distance (in px) from the page bottom when you want to load more posts

    var $_GET = $_GET(),
        trierPar = $_GET['trierPar'],
        term_pub = $_GET['term_pub'],
        term_client = $_GET['term'],
        type = $_GET['type'],
        category = $_GET['category'];

    $(".misha_loadmore").click(function() {

        $(this).after('<i class="fa fa-circle-o-notch fa-spin fa-fw" id="ajax_loading_icon"></i>');

        var data = {
            'action': 'loadmore',
            'query': misha_loadmore_params.posts,
            'page': misha_loadmore_params.current_page,
            'trierPar': trierPar,
            'term_pub': term_pub,
            'term_client': term_client,
            'type': type,
            'category': category
        };

        $.ajax({
            url: misha_loadmore_params.ajaxurl,
            data: data,
            type: 'POST',
            beforeSend: function(xhr) {
                // you can also add your own preloader here
                // you see, the AJAX call is in process, we shouldn't run it again until complete
                canBeLoaded = false;
            },
            success: function(data) {
                if (data) {
                    $('.site-content').find('div.thearticle').last().after(data); // where to insert posts
                    canBeLoaded = true; // the ajax is completed, now we can run it again
                    misha_loadmore_params.current_page++;
                } else {
                    $(".misha_loadmore").css("display", "none");
                }
                $('#ajax_loading_icon').remove();
            }
        });
    });



    function $_GET(param) {
        var vars = {};
        window.location.href.replace(location.hash, '').replace(
            /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
            function(m, key, value) { // callback
                vars[key] = value !== undefined ? value : '';
            }
        );

        if (param) {
            return vars[param] ? vars[param] : null;
        }
        return vars;
    }


});

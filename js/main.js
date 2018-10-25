/*
    * responsiveMenu
    * responsiveMenuMega
    * searchButton
    * slider
    * slideProduct
    * slideCounter
    * slideMostViewer
    * slideMostViewer_s2
    * slideMostViewer_s3
    * slideMostViewer_s4
    * slideBrand
    * slideAccessories
    * slideTeam
    * slideBrand_s2
    * slideProduct_s2
    * slider_s2
    * slideProduct_s3
    * slideProduct_s4
    * slideProduct_s5
    * slideProduct_s6
    * slideTestimonial
    * tabImagebox
    * tabImagebox_s2
    * tabProductDetail
    * tabElement
    * tabSortproduct
    * overlay
    * FilterPrice();
    * toggleWidget
    * toggleCatlist
    * toggleDropdown
    * toggleLocation
    * showSuggestions
    * showAllcat
    * accordionToggle
    * flexProduct
    * progressBar
    * detectViewport
    * progressCircle
    * BrandsIsotope
    * scrollbarCheckbox
    * scrollbarLocation
    * scrollbarTableCart
    * scrollbarWishlist
    * scrollbarCategories
    * scrollbarSearch
    * googleMap
    * googleMap_s2
    * goTop
    * popup
    * cate li
    * btn-up
    * btn-down
    * total2
    * subtotal2
    * taxRate
    * radio-lab
    * radio-lab2
    * price-total
**/

$(function() {

   'use strict'
        var isMobile = {
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function() {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i);
            },
            any: function() {
                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
            }
        }; // is Mobile

        var responsiveMenu = function() {
            var menuType = 'desktop';

            $(window).on('load resize', function() {
                var currMenuType = 'desktop';

                if ( matchMedia( 'only screen and (max-width: 991px)' ).matches ) {
                    currMenuType = 'mobile';
                }

                if ( currMenuType !== menuType ) {
                    menuType = currMenuType;

                    if ( currMenuType === 'mobile' ) {
                        var $mobileMenu = $('#mainnav').attr('id', 'mainnav-mobi').hide();
                        var hasChildMenu = $('#mainnav-mobi').find('li:has(ul)');
                        var hasChildMenuMega = $('#mainnav-mobi').find('li:has(div.submenu)');

                        $('#header').after($mobileMenu);
                        hasChildMenu.children('ul').hide();
                        hasChildMenu.children('a').after('<span class="btn-submenu"></span>');
                        hasChildMenuMega.children('div.submenu').hide();
                        $('ul.submenu-child').hide();
                        hasChildMenuMega.find('h3').append('<span class="btn-submenu-child"></span>');
                        $('.btn-menu').removeClass('active');

                    } else {
                        var $desktopMenu = $('#mainnav-mobi').attr('id', 'mainnav').removeAttr('style');
                        $desktopMenu.find('.submenu').removeAttr('style');
                        $('#header').find('.nav-wrap').append($desktopMenu);
                        $('.btn-submenu').remove();
                        $('ul.submenu-child').show();
                        $('h3').children('span').removeClass('btn-submenu-child');
                    }
                }
            });

            $('.btn-menu').on('click', function() {         
                $('#mainnav-mobi').slideToggle(300);
                $(this).toggleClass('active');
                return false;
            });

            $(document).on('click', '#mainnav-mobi li.has-mega-menu .row .btn-submenu-child', function(e) {
                $(this).toggleClass('active').parent('h3.cat-title').next('.submenu-child').slideToggle(400);
                e.stopImmediatePropagation();
                return false;
            });

            $(document).on('click', '#mainnav-mobi li .btn-submenu', function(e) {
                $(this).toggleClass('active').next('.submenu').slideToggle(400);
                e.stopImmediatePropagation();
                return false;
            });

        }; // Responsive Menu       

        var responsiveMenuMega_S2 = function() {
            var menuType = 'desktop';

            $(window).on('load resize', function() {
                var currMenuType = 'desktop';

                if ( matchMedia( 'only screen and (max-width: 991px)' ).matches ) {
                    currMenuType = 'mobile';
                }

                if ( currMenuType !== menuType ) {
                    menuType = currMenuType;

                    if ( $('body').hasClass('grid') ) {
                        if (currMenuType === 'mobile') {
                            var $mobileMenuMegaV2 = $('#mega-menu').attr('id', 'mega-mobile').hide();
                            var ChildMenuMegaV2 = $('.header-bottom').find('.grid-right');
                            var ChildDropmenuV2 = $('.drop-menu').children('.one-third');

                            $('.btn-mega').hide();
                            $('#header').after($mobileMenuMegaV2);
                            ChildMenuMegaV2.append('<div class="btn-menu-mega"><span></span></div>');

                            $('.drop-menu').hide();
                            $mobileMenuMegaV2.find('.dropdown').append('<span class="btn-dropdown"></span>');

                            ChildDropmenuV2.children('ul').hide();
                            $('.drop-menu').find('.cat-title').append('<span class="btn-dropdown-child"></span>');

                        } else {
                            var $desktopMenuMegaV2 = $('#mega-mobile').attr('id', 'mega-menu').removeAttr('style');

                            $desktopMenuMegaV2.find('.drop-menu').removeAttr('style');
                            $('.header-bottom.style1').find('.grid-left').append($desktopMenuMegaV2);
                        }
                    };

                };
                
            });


            $(document).on('click', '#mega-mobile ul.menu li a .btn-dropdown', function(e) {
                $(this).toggleClass('active').closest('li').children('.drop-menu').slideToggle(400);
                e.stopImmediatePropagation();
                return false;
            });

            $(document).on('click', '#mega-mobile .btn-dropdown-child', function(e) {
                $(this).toggleClass('active').closest('.one-third').children('ul').slideToggle(400);
                e.stopImmediatePropagation();
                return false;
            });

        }; // Responsive Menu Mega S2

        var responsiveMenuMega = function() {
            var menuType = 'desktop';

            $(window).on('load resize', function() {
                var currMenuType = 'desktop';

                if ( matchMedia( 'only screen and (max-width: 991px)' ).matches ) {
                    currMenuType = 'mobile';
                }

                if ( currMenuType !== menuType ) {
                    menuType = currMenuType;

                    if ( currMenuType === 'mobile' ) {
                        var $mobileMenuMega = $('#mega-menu').attr('id', 'mega-mobile').hide();
                        var ChildMenuMega = $('.header-bottom').find('.col-2');
                        var ChildDropmenu = $('.drop-menu').children('.one-third');

                        $('.btn-mega').hide();
                        $('#header').after($mobileMenuMega);
                        ChildMenuMega.append('<div class="btn-menu-mega"><span></span></div>');

                        $('.drop-menu').hide();
                        $mobileMenuMega.find('.dropdown').append('<span class="btn-dropdown"></span>');

                        ChildDropmenu.children('ul').hide();
                        $('.drop-menu').find('.cat-title').append('<span class="btn-dropdown-child"></span>');

                    } else {
                        var $desktopMenuMega = $('#mega-mobile').attr('id', 'mega-menu').removeAttr('style');

                        $('.btn-mega').show();
                        $desktopMenuMega.find('.drop-menu').removeAttr('style');
                        $('.header-bottom').find('.col-2').append($desktopMenuMega);
                        $('.btn-menu-mega').remove();
                        $('.btn-dropdown-child').remove();
                        $('.drop-menu').children('.one-third').children('ul').show();
                    }
                }
            });

            $(document).on('click', '.btn-menu-mega', function() {       
                $('#mega-mobile').slideToggle(300);
                $(this).toggleClass('active');
                return false;
            });

            $(document).on('click', '#mega-mobile ul.menu li a .btn-dropdown', function(e) {
                $(this).toggleClass('active').closest('li').children('.drop-menu').slideToggle(400);
                e.stopImmediatePropagation();
                return false;
            });

            $(document).on('click', '#mega-mobile .btn-dropdown-child', function(e) {
                $(this).toggleClass('active').closest('.one-third').children('ul').slideToggle(400);
                e.stopImmediatePropagation();
                return false;
            });

            
        }; // Responsive Menu Mega

        var searchButton = function() {
            var showsearch = $('.show-search button');
            showsearch.on('click',function() {
                $('.show-search').parent('div').children('.top-search.style1').toggleClass('active');
                showsearch.toggleClass('active');
            });
        }; // Show Search

        var searchFilterbox = function(){
			var buttonFilter=$('.filter');
				buttonFilter.on('click',function(){
					$('.box-filter').toggleClass('active');
				});
			};

        var waveButton = function () {
            Waves.attach('.button', ['waves-button', 'waves-float']);
            Waves.init();
        };

        var slider = function() {
            $(".owl-carousel").owlCarousel({
                autoplay:true,
                nav: false,
                responsive: true,
                margin:0,
                loop:true,
                items:1
            });
        };// slider

        var slideProduct = function() {
            $(".owl-carousel-1").owlCarousel({
                autoplay: true,
                nav: true,
                dots: false,
                responsive: true,
                margin:0,
                loop:true,
                items:1,
            });
        };// slide Product


        var slideMostViewer = function() {
            $(".owl-carousel-3").owlCarousel({
                autoplay:true,
                nav: true,
                dots: true,
                responsive: true,
                margin:30,
                loop:true,
                items:5,
                responsive:{
                    0:{
                        items: 2,
                        dots: false,
                        margin:10,
                    },
                    479:{
                        items: 2,
                        dots: false
                    },
                    600:{
                        items: 3,
                        dots: false
                    },
                    768:{
                        items: 4,
                         margin:20,
                    },
                    991:{
                        items: 4
                    },
                    1200: {
                        items: 5
                    }
                }
            });
        };// slide Most Viewer

        var slideMostViewer_s2 = function() {
            $(".owl-carousel-4").owlCarousel({
                autoplay:true,
                nav: false,
                dots: true,
                responsive: true,
                margin:20,
                loop:true,
                items:4,
                responsive:{
                    0:{
                        items: 1,
                        dots: false,
                        nav: true,
                    },

                    479:{
                        items: 3
                    },
                    768:{
                        items: 3
                    },
                    991:{
                        items: 3
                    },
                    1200: {
                        items: 4
                    }
                }
            });
        };// slide Most Viewer s2

        var slideMostViewer_s3 = function() {
            $(".owl-carousel-6").owlCarousel({
                autoplay:true,
                nav: true,
                dots: true,
                responsive: true,
                margin:25,
                loop:true,
                items:7,
                responsive:{
                    0:{
                        items: 1,
                        dots: false
                    },

                    479:{
                        items: 2,
                         dots: false
                    },
                    768:{
                        items: 4,
                         dots: false
                    },
                    991:{
                        items: 4
                    },
                    1200: {
                        items: 5
                    },
                    1900: {
                        items: 7
                    }
                }
            });
        };// slide Most Viewer s3

        var slideBrand = function() {
            $(".owl-carousel-5").owlCarousel({
                autoplay:true,
                nav: false,
                dots: false,
                responsive: true,
                margin:20,
                loop:true,
                items:5,
                responsive:{
                    0:{
                        items: 2
                    },

                    479:{
                        items: 4
                    },
                    768:{
                        items: 4
                    },
                    991:{
                        items: 5
                    },
                    1200: {
                        items: 5
                    }
                }
            });
        };// slide Brand

        var slideAccessories = function() {
            $(".owl-carousel-7").owlCarousel({
                autoplay:true,
                nav: true,
                dots: false,
                responsive: true,
                margin:0,
                loop:true,
                items:1
            });
        };// slide Accessories

        var slideTeam = function() {
            $(".owl-carousel-8").owlCarousel({
                autoplay:true,
                nav: false,
                dots: true,
                responsive: true,
                margin:30,
                loop:true,
                items:4,
                responsive:{
                    0:{
                        items: 1,
                        dots: false,
                        nav: true,
                    },
                    479:{
                        items: 2,
                    },
                    599:{
                        items: 2,
                    },
                    768:{
                        items: 3
                    },
                    991:{
                        items: 4
                    },
                    1200: {
                        items: 4
                    }
                }
            });
        };// slide Team

        var slideBrand_s2 = function() {
            $(".owl-carousel-9").owlCarousel({
                autoplay:true,
                nav: false,
                dots: true,
                responsive: true,
                margin:30,
                loop:true,
                items:6,
                responsive:{
                    0:{
                        items: 1,
                        dots: false,
                        nav: true,
                    },
                    479:{
                        items: 2,
                        dots: false,
                        nav: true,
                    },
                    599:{
                        items: 3,
                         dots: false,
                        nav: true,
                    },
                    768:{
                        items: 4
                    },
                    991:{
                        items: 5
                    },
                    1200: {
                        items: 6
                    }
                }
            });
        };// slide Brand s2

        var slideProduct_s2 = function() {
            $(".owl-carousel-10").owlCarousel({
                autoplay:true,
                nav: false,
                dots: true,
                responsive: true,
                margin:30,
                loop:true,
                items:3,
                responsive:{
                    0:{
                        items: 1,
                        dots: false
                    },
                    479:{
                        items: 1,
                        dots: false
                    },
                    599:{
                        items: 1,
                        dots: false
                    },
                    768:{
                        items: 2,
                        dots: false
                    },
                    991:{
                        items: 3
                    },
                    1200: {
                        items: 3
                    }
                }
            });
        };// slide Product s2

        var slider_s2 = function() {
            $(".owl-carousel-11").owlCarousel({
                autoplay:true,
                nav: false,
                dots: true,
                responsive: true,
                margin:20,
                loop:true,
                items:1
            });
        };// slider s2

        var slideProduct_s3 = function() {
            $(".owl-carousel-12").owlCarousel({
                autoplay:true,
                nav: true,
                dots: false,
                responsive: true,
                margin:20,
                loop:true,
                items:1
            });
        };// slide Product s3

        var slideMostViewer_s4 = function() {
            $(".owl-carousel-13").owlCarousel({
                autoplay:true,
                nav: true,
                dots: false,
                responsive: true,
                margin:5,
                loop:true,
                items:5,
                responsive:{
                    0:{
                        items: 1,
                        dots: false
                    },
                    479:{
                        items: 2,
                        dots: false
                    },
                    599:{
                        items: 3,
                        dots: false
                    },
                    768:{
                        items: 3,
                        dots: false
                    },
                    991:{
                        items: 4
                    },
                    1200: {
                        items: 5
                    }
                }
            });
        };// slide Most Viewer s4

        var slideProduct_s4 = function() {
            $(".owl-carousel-14").owlCarousel({
                autoplay:true,
                nav: true,
                dots: false,
                responsive: true,
                margin:20,
                loop:true,
                items:1
            });
        };// slide Product s4

        var slideProduct_s5 = function() {
            $(".owl-carousel-15").owlCarousel({
                autoplay:true,
                nav: true,
                dots: true,
                responsive: true,
                margin:20,
                loop:true,
                items:1
            });
        };// slide Product s5

        var slideProduct_s6 = function() {
            $(".owl-carousel-16").owlCarousel({
                autoplay:true,
                nav: false,
                dots: true,
                responsive: true,
                margin:0,
                loop:true,
                items:1
            });
        };// slide Product s6

        var slideTestimonial = function() {
            $(".owl-carousel-17").owlCarousel({
                autoplay:true,
                nav: false,
                responsive: true,
                margin:0,
                loop:true,
                items:1
            });
        };// slide Testimonial

        var slideProduct_s7 = function() {
            $(".owl-carousel-18").owlCarousel({
                autoplay:true,
                nav: false,
                responsive: true,
                margin:0,
                loop:true,
                items:1
            });
        };// slide Product s7

        var slideProduct_s8 = function() {
            $(".owl-carousel-19").owlCarousel({
                autoplay:true,
                nav: false,
                dots: true,
                responsive: true,
                margin:30,
                loop:true,
                items:3,
                responsive:{
                    0:{
                        items: 1,
                        dots: false
                    },
                    479:{
                        items: 1,
                        dots: false
                    },
                    599:{
                        items: 1,
                        dots: false
                    },
                    768:{
                        items: 2,
                        dots: false
                    },
                    991:{
                        items: 3
                    },
                    1200: {
                        items: 4
                    }
                }
            });
        };// slide Product s8

       

        var tabImagebox = function() {
            var speed = 1000;
            $('.flat-imagebox').each(function() {
                $(this).find('.tab-list').children().first().addClass('active'),
                $(this).find('.box-product').children('.row').first().show().siblings().hide(),
                $(this).find('.tab-list').children('li').on('click', function(e){
                    var liActive = $(this).index();
                    $(this).addClass('active').siblings().removeClass('active');
                    $(this).addClass('active').closest('.flat-imagebox').find('.box-product').children('.row').eq(liActive).fadeIn(1000).show().siblings().hide();
                    e.preventDefault();
                });
            });
        }; // Tab Imagebox

        var tabImagebox_s2 = function() {
            var speed = 1000;
            $('.flat-imagebox').each(function() {
                $(this).find('.tab-list').children().first().addClass('active'),
                $(this).find('.tab-item').children('.row').first().show().siblings().hide(),
                $(this).find('.tab-list').children('li').on('click', function(e){
                    var liActive = $(this).index();
                    $(this).addClass('active').siblings().removeClass('active');
                    $(this).addClass('active').closest('.flat-imagebox').find('.tab-item').children('.row').eq(liActive).fadeIn(1000).show().siblings().hide();
                    e.preventDefault();
                });
            });
        }; // Tab Imagebox

        var tabProductDetail = function() {
            $('.flat-product-content').each(function() {
                $(this).find('ul.product-detail-bar').children().first().addClass('active');
                $(this).find('.container').children('.row').first().show().siblings().hide();
                $(this).find('ul.product-detail-bar').children('li').on('click', function(e) {
                    var liActive = $(this).index();
                    $(this).addClass('active').siblings().removeClass('active');
                     $(this).closest('.flat-product-content').find('.container').children('.row').eq(liActive).fadeIn(1000).show().siblings().hide();
                    e.preventDefault();
                });
            });
            $('.flat-product-content.style2').each(function() {
                $(this).find('ul.product-detail-bar').children().first().addClass('active');
                $(this).find('.col-md-12').children('div.row').first().show().siblings().hide();
                $(this).find('ul.product-detail-bar').children('li').on('click', function(e) {
                    var liActive = $(this).index();
                    $(this).addClass('active').siblings().removeClass('active');
                     $(this).closest('.flat-product-content.style2').find('.col-md-12').children('div.row').eq(liActive).fadeIn(1000).show().siblings().hide();
                    e.preventDefault();
                });
            });
        }; // Tab Productdetail

        var tabSortproduct = function() {
            $('.wrap-imagebox').each(function() {
                $(this).find('ul.icons').children('li').first().addClass('active');
                $(this).find('.tab-product').children('.sort-box').first().show().siblings().hide();
                $(this).find('ul.icons').children('li').on('click', function(e) {
                    var liActive = $(this).index();
                    $(this).addClass('active').siblings().removeClass('active');
                     $(this).closest('.wrap-imagebox').find('.tab-product').children('.sort-box').eq(liActive).fadeIn(1000).show().siblings().hide();
                    e.preventDefault();
                });
            });
        }; // Tab Sort Product

        var tabElement = function() {
            $('.flat-tab').each(function() {
                $(this).find('ul.tab-list').children().first().addClass('active');
                $(this).find('.tab-content').children('.tab-item').first().show().siblings().hide();
                $(this).find('ul.tab-list').children('li').on('click', function(e) {
                    var liActive = $(this).index();
                    $(this).addClass('active').siblings().removeClass('active');
                     $(this).closest('.flat-tab').find('.tab-content').children('.tab-item').eq(liActive).fadeIn(1000).show().siblings().hide();
                    e.preventDefault();
                });
            });
        }; // Tab Element

        var FilterPrice = function() {
            if( $().slider ) {
                $( function() {
                    $( "#slider-range" ).slider({
                      range: true,
                      min: 18,
                      max: 1000,
                      values: [ 18, 500 ],
                      slide: function( event, ui ) {
                        $( "#amount" ).val( ui.values[ 0 ] + "$" + " - " + ui.values[ 1 ] + "$" );
                      }
                    });
                    $( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ) + "$" + " - " + $( "#slider-range" ).slider( "values", 1 ) + "$" );
                });
            }
        }; // Filter Price

        var scrollbarCheckbox = function() {
            if ( $().mCustomScrollbar ) {
               $(".box-checkbox").mCustomScrollbar({
                scrollInertia:400,
                theme:"light-3",
               });
            }
        }; // Scrollbar Checkbox

        var scrollbarTableCart = function() {
            $(".table-cart").mCustomScrollbar({
                axis:"x",
                advanced:{autoExpandHorizontalScroll:true},
                scrollInertia:400,
            });
        }; // Scrollbar Table Cart

        var scrollbarWishlist = function() {
           $(".wishlist-content").mCustomScrollbar({
                axis:"x",
                theme:"light-3",
                advanced:{autoExpandHorizontalScroll:true},
                scrollInertia:400,
            });
        }; // Scrollbar Compare

        var scrollbarCategories = function() {
            if ( $().mCustomScrollbar ) {
               $(".all-categories").mCustomScrollbar({
                scrollInertia:400,
                theme:"light-3",
               });
            }
        }; // Scrollbar Categories

        var scrollbarSearch = function() {
            if ( $().mCustomScrollbar ) {
               $(".search-suggestions .box-cat").mCustomScrollbar({
                scrollInertia:400,
                theme:"light-3",
               });
            }
        }; // Scrollbar Search

        var toggleWidget = function() {
            $( ".widget .widget-title h3 span" ).on('click', function() {
                $(this).toggleClass('active');
              $(this).closest('.widget').children('.widget-content').slideToggle(300);
            });
        }; // Toggle Widget

        var toggleCatlist = function() {
            $('.cat-list.style1').each(function() {
                $(this).children('li').children('ul.cat-child').hide();
                // $(this).children('li').children('ul.cat-child').first().show()
                $( ".cat-list.style1 li span" ).on('click', function() {
                    $(this).parent('li').toggleClass('active');
                    $(this).toggleClass('active');
                    $(this).parent('li').children('ul.cat-child').slideToggle(300);
                    // var liActive = $(this).index(),
                    // contentActive = $(this).parent('li').siblings().removeClass('active').children('ul-cat-child').eq(liActive);
                    // contentActive.addClass('active').parent('li').fadeIn("slow");
                    // contentActive.parent('li').siblings().removeClass('active');
                    // $(this).parent('li').addClass('active').children('.ul-cat-child').eq(liActive).siblings().hide();
                });
            })
        }; // Toggle Cat List

        var toggleDropdown = function() {
            $( ".form-box .form-box-content .dropdown-title" ).on('click', function() {
                $(this).toggleClass('active');
                $(this).parent('.form-box-content').children('ul').slideToggle(300);
            });
        }; // Toggle Dropdown

        var toggleLocation = function() {
            $( ".location .location-content .select-location select" ).on('click', function() {
                $(this).toggleClass('active');
                $(this).closest('.location-content').children('ul.location-list').slideToggle(300);
            });
        }; // Toggle Location

        var showSuggestions = function() {
            $( ".top-search form.form-search .box-search" ).each(function() {
                $( "form.form-search .box-search input" ).on('focus', (function() {
                    $(this).closest('.boxed').children('.overlay').css({
                        opacity: '1',
                        display: 'block'
                    });
                    $(this).parent('.box-search').children('.search-suggestions').css({
                        opacity: '1',
                        visibility: 'visible',
                        top: '77px'
                    });
                }));
                $( "form.form-search .box-search input" ).on('blur', (function() {
                    $(this).closest('.boxed').children('.overlay').css({
                        opacity: '0',
                        display: 'none'
                    });
                    $(this).parent('.box-search').children('.search-suggestions').css({
                        opacity: '0',
                        visibility: 'hidden',
                        top: '100px'
                    });
                }));
            });

            $( ".top-search.style1 form.form-search .box-search" ).each(function() {
                $( "form.form-search .box-search input" ).on('focus', (function() {
                    $(this).closest('.boxed').children('.overlay').css({
                        opacity: '1',
                        display: 'block'
                    });
                    $(this).parent('.box-search').children('.search-suggestions').css({
                        opacity: '1',
                        visibility: 'visible',
                        top: '50px'
                    });
                }));
            });
        }; // Toggle Location

        var showAllcat = function() {
            $('.cat-wrap').each(function() {
                $(this).on('click', function() {
                    $(this).children('.all-categories').toggleClass('show');
                });
            });
        };

        var popup = function() {
            $('.popup-newsletter').each( function() {
                $(this).closest('.boxed').children('.overlay').css({
                    opacity: '1',
                    display: 'block',
                    zIndex: '89999'
                });
                $(".popup span" ).on('click', function() {
                    $(this).closest('.popup-newsletter').hide(400);
                    $(this).closest('.boxed').children('.overlay').css({
                        opacity: '0',
                        display: 'none',
                         zIndex: '909'
                    });
                });
            });
        }; // Popup

        var accordionToggle = function() {
            var speed = {duration: 400};
            $('.toggle-content').hide();
            $('.accordion-toggle .toggle-title.active').siblings('.toggle-content').show();
            $('.accordion').find('.toggle-title').on('click', function() {
                $(this).toggleClass('active');
                $(this).next().slideToggle(speed);
                $(".toggle-content").not($(this).next()).slideUp(speed);
                if ($(this).is('.active')) {
                    $(this).closest('.accordion').find('.toggle-title.active').toggleClass('active')
                    $(this).toggleClass('active');
                };
            });
        }; // Accordion Toggle

        var flexProduct = function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        }; // Flex Product

        var progressBar = function(){
            $('.progress-item').waypoint(function() {
                $('.progress-bar').each( function() {
                    var percent = $(this).data('percent');
                     $(this).find('.progress-animate').animate({
                        "width": percent + '%'
                    },2000);
                    $(this).parent('.progress-item').find('.perc').addClass('show').animate({
                        "width": percent + '%'
                    },2000);
                });
            }, {offset: '100%'});
        };// Progress Bar

        var progressCircle = function() {
            $('.progress-circle').waypoint(function() {
                $('.demo').percentcircle({
                    coverBg: '#e1e1e4',
                    bgColor: '#e1e1e4',
                    fillColor: '#f28b00'
                });
                $('.demo').children('div:not(:first-child)').css({
                    display: 'none'
                });
            }, {offset: '100%'});
        }; // Progress Circle

        var detectViewport = function() {
            $('[data-waypoint-active="yes"]').waypoint(function() {
                $(this).trigger('on-appear');
            }, { offset: '100%', triggerOnce: true });
            $(window).on('load', function() {
                setTimeout(function() {
                    $.waypoints('refresh');
                }, 100);
            });
        }; // Detect Viewport

        var BrandsIsotope = function() { 
            if ( $().isotope ) {           
                var $container = $('.brands-list');
                var selector = $(this).attr('data-filter');
                $container.imagesLoaded(function(){
                    $container.isotope({
                        itemSelector: '.ipsotope',
                        transitionDuration: '1s'
                    });
                   
                     $container.isotope({ filter: '*' })
                });

                $('.brands-tablist li').on('click',function() {                           
                    var selector = $(this).attr('data-filter');
                    $('.brands-tablist li').removeClass('active');
                    $(this).addClass('active');
                    $container.isotope({ filter: selector });
                    return false;
                });            
            };
        }; // Brands Isotope

        var scrollbarLocation = function() {
            if ( $().mCustomScrollbar ) {
               $(".location .location-content .scroll").mCustomScrollbar({
                scrollInertia:400,
               });
            }
        }; // Scrollbar Location

        var goTop = function(){
            var gotop = $('.btn-scroll');
            gotop.on('click', function() {
                $('html, body').animate({ scrollTop: 0}, 800, 'easeInOutExpo');
                return false;
            });
        }; // Go Top

        var overlay = function(){
            var megaMenu = $('ul.menu li');
            megaMenu.on('mouseover', function() {
                $(this).closest('.boxed').children('.overlay').css({
                    opacity: '1',
                    display: 'block',
                });
            });
            megaMenu.on('mouseleave', function() {
                $(this).closest('.boxed').children('.overlay').css({
                    opacity: '0',
                    display: 'none',
                });
            });
        }; // Overlay

        var removePreloader = function() { 
            $(window).on('load', function() {
                setTimeout(function() {
                    $('.preloader').hide(); }, 300           
                ); 
            });  
        }; //remove Preloader
        
        
        
        //倒计时
        var countdown=function(){
	       	var SysSecond;
	        var InterValObj;
	        SysSecond = parseInt($("#remainSeconds").html());
	        InterValObj = window.setInterval(SetRemainTime, 1000);
	        function SetRemainTime() {
	        if (SysSecond > 0) {
			        SysSecond = SysSecond - 1;
			        var second = Math.floor(SysSecond % 60);  
			        var minite = Math.floor((SysSecond / 60) % 60); 
			        var hour = Math.floor((SysSecond / 3600) % 24);  
			        var day = Math.floor((SysSecond / 3600) / 24); 
			        $(".day").html(day);
			        $(".time").html(hour);
			        $(".branch").html(minite);
			        $(".second").html(second);
		        } else {
		        	window.clearInterval(InterValObj);
		        }
	        }
        }
        
        var slideCounter = function() {    
            $(".owl-carousel-2").owlCarousel({
                autoplay:true,
                nav: true,
                dots: false,
                responsive: true,
                margin:0,
                loop:true,
                items:1
            });
        };// slide Counter
        
        var countdown2=function(){
	       	var SysSecond2;
	        var InterValObj2;
	        SysSecond2 = parseInt($("#remainSeconds2").html());
	        InterValObj2 = window.setInterval(SetRemainTime2, 1000);
	        function SetRemainTime2() {
	        if (SysSecond2 > 0) {
			        SysSecond2 = SysSecond2 - 1;
			        var second2 = Math.floor(SysSecond2 % 60);
			        var minite2 = Math.floor((SysSecond2 / 60) % 60);
			        var hour2 = Math.floor((SysSecond2 / 3600) % 24);
			        var day2 = Math.floor((SysSecond2 / 3600) / 24);
			        $(".day2").html(day2);
			        $(".time2").html(hour2);
			        $(".branch2").html(minite2);
			        $(".second2").html(second2);
		        } else {
		        	window.clearInterval(InterValObj2);
		        }
	        }
        }
       

    // Dom Ready
    $(function() {
    	countdown();
    	countdown2();
        responsiveMenu();
        responsiveMenuMega_S2();
        responsiveMenuMega();
        searchButton();
        searchFilterbox();
        waveButton();
        slider();
        slider_s2();
        slideProduct();
        slideCounter();
        slideMostViewer();
        slideMostViewer_s2();
        slideMostViewer_s3();
        slideMostViewer_s4();
        slideBrand();
        slideAccessories();
        slideTeam();
        slideBrand_s2();
        slideProduct_s2();
        slideProduct_s3();
        slideProduct_s4();
        slideProduct_s5();
        slideProduct_s6();
        slideProduct_s7();
        slideProduct_s8();
        slideTestimonial();
        tabImagebox();
        tabImagebox_s2();
        tabProductDetail();
        tabElement();
        tabSortproduct();
        overlay();
        FilterPrice();        
        toggleWidget();
        toggleCatlist();
        toggleDropdown();
        toggleLocation();
        showSuggestions();
        showAllcat();
        accordionToggle();
        flexProduct();
        progressBar();
        detectViewport();
        progressCircle();
        BrandsIsotope();
        scrollbarCheckbox();
        scrollbarLocation();
        scrollbarTableCart();
        scrollbarWishlist();
        scrollbarCategories();
        scrollbarSearch();
        goTop();
        popup();
        removePreloader();
    });
    
    
    //头部搜索类别切换
	$("#cate li").click(function(){
  		$("#all").html($(this).text());
 	});
 	
	//判断按钮输出总和(为加减做铺垫)
	/*function setTotal3(){
    var sum = 0;  
    $("#tab tr").each(function(){
        var subtotal = parseFloat($(".subtotal2").text());
        sum = subtotal;
    })  
        $(".price-total").html(sum.toFixed(2));  
    }
    setTotal3();
    
	function setTotal4(){  
    var sum = 0;  
    $("#tab tr").each(function(){
        var subtotal = parseFloat($(".subtotal2").text());
        var taxRate = parseFloat($(".taxRate").text());
        sum = subtotal+taxRate;
    })  
        $(".price-total").html(sum.toFixed(2));  
    }  
	setTotal4();

 	//加
	$(".btn-up").click(function(){
		var t=$(this).parent().find('.text_box').eq(0);
		var num = Number(t.text())+1;
		t.text(parseInt(t.text())+1);
		prices(num,$(this));
		setTotal();
		setTotal2();
 		
 		if($(".radio-lab2 input").is(':checked')){
    		setTotal3();
   	 	}else{
   	 		setTotal4();
   	 	}
	})
	//减
	$(".btn-down").click(function(){
		var t=$(this).parent().find('.text_box').eq(0);
		if (parseInt(t.text())>1) {
            t.text(parseInt(t.text())-1);
        }else{  
            $(".btn-down").attr("disabled","disabled");
            //t.text(1);
        }
		var num =  Number(t.text());
		prices(num,$(this));
		setTotal();
		setTotal2();
 		if($(".radio-lab2 input").is(':checked')){
    		setTotal3();
   	 	}else{
   	 		setTotal4();
   	 	}
	})
	//单个商品合计
	function prices(num,that){
		var prices = that.parents("tr").find(".price2").eq(0).html();
		var sum = num*Number(prices);
		that.parents("tr").find(".total2").eq(0).html(sum.toFixed(2));
	}
	
	//购物车主体小计
    function setTotal(){  
        var sum = 0;  
        $("#tab tr").each(function(){  
	        var price = parseFloat($(this).find("span[class*=total2]").text());  
	        sum += price;  
        })  
        $(".subtotal2").html(sum.toFixed(2));  
    }  
    setTotal();
 	
 	//判断按钮输出总和
 	function setTotal2(){  
    var sum = 0;  
    $("#tab tr").each(function(){
        var subtotal = parseFloat($(".subtotal2").text());
        var taxRate = parseFloat($(".taxRate").text());
        sum = subtotal+taxRate;
    })  
        $(".price-total").html(sum.toFixed(2));  
    }  
	setTotal2();
	
	$(".radio-lab").click(function(){
 		function setTotal5(){  
        var sum = 0;  
        $("#tab tr").each(function(){
	        var subtotal = parseFloat($(".subtotal2").text());
	        var taxRate = parseFloat($(".taxRate").text());
	        sum = subtotal+taxRate;
        })  
	        $(".price-total").html(sum.toFixed(2));  
	    }  
		setTotal5();
 	})
 	$(".radio-lab2").click(function(){
 		function setTotal6(){
        var sum = 0;  
        $("#tab tr").each(function(){
	        var subtotal = parseFloat($(".subtotal2").text());
	        sum = subtotal;
        })  
	        $(".price-total").html(sum.toFixed(2));  
	    }
	    setTotal6();
 	})*/
 	
 	//头部小计
    /*function setTotal_head(){  
        var sum = 0;
        $(".dropdown-box ul li").each(function(){  
	        var price = parseFloat($(this).find("span[class*=total-head]").text());  
	        sum += price;  
        })  
        $(".subtotal-head").html(sum.toFixed(2));  
    }  
    setTotal_head();*/
	
	
	//购物车 全选/取消全选
    var counter=0;  
	$('#checkAll').bind("click", function() {  
	    counter++ % 2 ?   
	        (function() { $('[name=need_inv]').parent().addClass("on_checks"); }()) :  
	        (function() { $('[name=need_inv]').parents().removeClass("on_checks"); }());
	});
	//购物车 复选按钮
	$(".piaochecked").on("click",function(){
	    $(this).hasClass("on_checks")? $(this).removeClass("on_checks"):$(this).addClass("on_checks");
	   //或者这么写
	  // $(this).toggleClass( "on_check" );
	});
	
	
	//购物车 全选/取消全选2
	$("#check").click(function(){
		if(this.checked==true){
			$(".check2").each(function(){
				this.checked=true;
			})
		}else{
			$(".check2").each(function(){
				this.checked=false;
			})	
		}
    });
  	
  	//头部小计
  	function setTotal_head(){  
        var sum = 0;
        var i=0;
        $(".dropdown-box ul li").each(function(){  
	       if($("#price").text()>0){
	        	sum+=parseFloat($(this).find("span[class*=total-head]").text())*Number($(this).find("span[id*=price]").text());
	        	i++;
	       }
        });
        $(".header_num").text(i);
        $("#head-money").html(sum.toFixed(2));  
    }  
    setTotal_head();
    
    /*$(".btn-search").click(function(){
		$("#myForm").submit();
	})*/
	
	$(".checkout").click(function(){
		$("#myForm").submit();
	})
		   	 	

});
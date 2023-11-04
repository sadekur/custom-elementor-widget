/*

[Main Script]

Project: OrDomain - Responsive HTML5 WHMCS Hosting Template
Version: 2.2
Author : themelooks.com

*/

(function ($) {
    "use strict";
    
    $(function () {
        /* -------------------------------------------------------------------------*
         * NAVIGATION AREA
         * -------------------------------------------------------------------------*/
        var navigation = $('#navigation')
        ,   wn = $(window)
        ,   navigationSticky = function () {
                return (wn.scrollTop() > 1) ? navigation.addClass('sticky') : navigation.removeClass('sticky');
            };
            
        navigationSticky();
        
        navigation.find('.navbar').css('top', navigation.find('.contact-bar').outerHeight());

        /* ------------------------------------------------------------------------- *
         * CUSTOM BACKGROUND IMAGE
         * ------------------------------------------------------------------------- */
        var dataBgImg = $('[data-bg-img]');
        
        dataBgImg.each(function () {
            $(this).css('background-image', 'url('+ $(this).data('bg-img') +')').removeAttr('data-bg-img');
        });

        /* ------------------------------------------------------------------------- *
         * BANNER HEIGHT
         * ------------------------------------------------------------------------- */
        var banner = $('#banner')
        ,   bannerContent = $('.banner-content')
        ,   bannerSecondary = $('.banner--secondary');
        
        bannerSecondary.css('margin-top', (navigation.outerHeight() + navigation.find('.navbar').outerHeight()) + 100);

        /* ------------------------------------------------------------------------- *
         * PAGE HEADER SLIDER HEIGHT
         * ------------------------------------------------------------------------- */
        var pageHsliderEl = $('#pageHslider');
        
        if ( wn.width() > 767 ) {
            pageHsliderEl.css('height', wn.outerHeight());
        }

        /* ------------------------------------------------------------------------- *
         * 404 PAGE HEIGHT
         * ------------------------------------------------------------------------- */
        var f0f = $('#f0f');
        
        f0f.css('height', wn.outerHeight());

        /* ------------------------------------------------------------------------- *
         * OWL CAROUSEL
         * ------------------------------------------------------------------------- */
        var pageHslider = $('.pageHslider-slider');
        
        if ( pageHslider.length ) {
            pageHslider.owlCarousel({
                items: 1,
                smartSpeed: 1200,
                loop: true,
                autoplay: true
            });
        }
        
        var clientsSlider = $('.clients-slider')
        ,   feedbackSlider = $('.feedback-slider');
        
        if ( clientsSlider.length ) {
            clientsSlider.owlCarousel({
                items: 1,
                smartSpeed: 1200,
                autoplay: true,
                loop: true,
                dots: false,
                onChanged: function (e) {
                    var tIndx = $(e.target).find('.owl-item').eq(e.item.index).children('.item').data('id'), tIndx = tIndx - 1;
                    
                    feedbackSlider.trigger('to.owl.carousel', [tIndx, 500, true]);
                }
            }).on('click', '.owl-item', function (e) {
                var tIndx = $(e.currentTarget).children('.item').data('id') - 1;
                
                clientsSlider.trigger('to.owl.carousel', [tIndx, 500, true]);
            });
        }
        

        if ( feedbackSlider.length ) {
            feedbackSlider.owlCarousel({
                items: 1,
                smartSpeed: 1200,
                autoplay: false,
                loop: true,
                dots: false,
                mouseDrag: false,
                touchDrag: false
            });
        }
        
        var extensionSlider = $('.extension-slider');
        
        if ( extensionSlider.length ) {
            var extensionSliderItems = extensionSlider.data('items');
            
            extensionSlider.owlCarousel({
                items: extensionSliderItems,
                smartSpeed: 1200,
                loop: true,
                autoplay: true,
                dots: false,
                responsive:{
                    0:{
                        items: 1
                    },
                    480:{
                        items: 3
                    },
                    768:{
                        items: 4
                    },
                    992:{
                        items: extensionSliderItems
                    }
                }
            });
        }
        
        /* -------------------------------------------------------------------------*
         * VERTICAL SLIDER
         * -------------------------------------------------------------------------*/
        var serviceSlider = $('.service-slider')
        ,   serviceSliderMode = function () {
            return ( wn.width() < 991 ) ? 'horizontal' : 'vertical';
        };
        
        if ( serviceSlider.length ) {
            serviceSlider.bxSlider({
                mode: serviceSliderMode(),
                speed: 1200,
                infiniteLoop: true,
                controls: false,
                auto: true
            });
            
            wn.on('resize', function () {
                serviceSlider.reloadSlider();
            });
        }

        /* ------------------------------------------------------------------------- *
         * BACK TO TOP BUTTON
         * ------------------------------------------------------------------------- */
        var backToTop = $('.back-to-top')
        ,   backToTopBtn = $('.back-to-top button')
        ,   backToTopShow = function () {
                return ( wn.scrollTop() > 1 ) ? backToTop.addClass('show') : backToTop.removeClass('show');
            };
        
        backToTopBtn.on('click', function() {
            $("html, body").animate({scrollTop: 0}, 500);
        });
        
        /* -------------------------------------------------------------------------*
         * ON SCROLL
         * -------------------------------------------------------------------------*/
        wn.on('scroll', function () {
            /* NAVIGATION AREA BG */
            navigationSticky();
            
            /* BACK TO TOP */
            backToTopShow();
        });
        
        /* ------------------------------------------------------------------------- *
         * TWITTER WIDGET
         * ------------------------------------------------------------------------- */
        var $footerTwitter = $('#footerTwitter');
        
        if ( $footerTwitter.length && typeof twttr !== "undefined" ) {
            twttr.widgets.createTimeline({
                sourceType: "profile",
                screenName: $footerTwitter.data('user-name')
            }, document.getElementById('footerTwitter'));
        }
        
        var $sidebarTwitter = $('#sidebarTwitter');
        
        if ( $sidebarTwitter.length && typeof twttr !== "undefined" ) {
            twttr.widgets.createTimeline({
                sourceType: "profile",
                screenName: $sidebarTwitter.data('user-name')
            }, document.getElementById('sidebarTwitter'));
        }
        
        /* ------------------------------------------------------------------------- *
         * LIVE CHAT WIDGET
         * ------------------------------------------------------------------------- */
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date(),
            $tawk = document.createElement("script");
            
        $tawk.async=true;
        $tawk.src='https://embed.tawk.to/57dfd4b85dc7a25e92808cf6/default';
        $tawk.charset='UTF-8';
        $tawk.setAttribute('crossorigin','*');
        
        $($tawk).appendTo('body');
        
        /* ------------------------------------------------------------------------- *
         * FORM VALIDATION
         * ------------------------------------------------------------------------- */
        var $formValidation = $('[data-form-validation]');

        $formValidation.each(function () {
            $(this).find('form').validate({
                errorPlacement: function (error, element) {
                    return false;
                }
            });
        });
        
        var contactForm = $('#contactForm')
        ,   contactFormStatus = $('.contact-form-status');
        
        if ( contactForm.length ) {
            contactForm.validate({
                rules: {
                    contactName: "required",
                    contactEmail: {
                        required: true,
                        email: true
                    },
                    contactSubject: "required",
                    contactMessage: "required"
                },
                errorPlacement: function (error, element) {
                    return false;
                },
                submitHandler: function(e) {
                    var formData = contactForm.serialize(); // Serialize the form data
                    
                    // Submit the form using AJAX
                    $.ajax({
                        type: 'POST',
                        url: contactForm.attr('action'),
                        data: formData
                    })
                    .done(function(response) {
                        contactFormStatus.show().html(response).delay(1000).fadeOut("slow");
                    });
                }
            });
        }
        
        /* -------------------------------------------------------------------------*
         * TEXTAREA
         * -------------------------------------------------------------------------*/
        var bulkdomains = $('#bulkdomains')
        ,   bulkdomainsPlaceholder = 'Enter up to 20 domain names.\nEach name must be on a separate line.\n\nExamples:\nexample.com\nexample.net';
        
        bulkdomains.attr('placeholder', bulkdomainsPlaceholder);
        
        /* -------------------------------------------------------------------------*
         * COUNTER
         * -------------------------------------------------------------------------*/
        var counterNum = $('.counter-number');
            
        if ( counterNum.length ) {
            counterNum.counterUp({
                delay: 10,
                time: 1000
            });
        }
        
        /* -------------------------------------------------------------------------*
         * RESPONSIVE PRICING DETAILS
         * -------------------------------------------------------------------------*/
        if ( wn.width() < 992 ) {
            $('.pricing-details-item.body li').each(function () {
                var $this = $(this)
                ,   $thisIndx = $this.index()
                ,   $text = $this.parents('.pricing-details-item').siblings('.pricing-details-item.head').find('li').eq($thisIndx).text();

                $this.prepend('<span class="labelText">'+ $text +'</span>');
            });
        }
        
        /* -------------------------------------------------------------------------*
         * MAP
         * -------------------------------------------------------------------------*/
        var map, marker, myLatLng;
        
        var initMap = function () {
            myLatLng = {lat: 23.790546, lng: 90.375583};
            
            map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 16,
                scrollwheel: false,
                disableDefaultUI: true,
                zoomControl: true
            });
            
            marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                animation: google.maps.Animation.DROP,
                draggable: true
            });
            
            if ( wn.width() < 767 ) {
                map.setOptions({draggable: false});
            }
        };
        
        if ( $("#map").length ) {
            initMap();
        }
        
        var initMap2 = function () {
            var locations = [
                ['Hanota Sagar', 23.737385, 78.757671, 4],
                ['গুলশান, ঢাকা', 23.789747, 90.3929248, 5],
                ['Gannan, Gansu, China', 34.9862056, 102.8388954, 3],
                ['মুম্বই, মহারাষ্ট্র, India', 19.0825223, 72.7411178, 2],
                ['Mahaoya, Sri Lanka', 7.8784551, 81.2146297, 4]
            ];
            
            var styleArray = [
                {
                    featureType: "all",
                    stylers: [
                        { saturation: -80 }
                    ]
                }, {
                    featureType: "road.arterial",
                    elementType: "geometry",
                    stylers: [
                        { hue: "#00ffee" },
                        { saturation: 50 }
                    ]
                }, {
                    featureType: "poi.business",
                    elementType: "labels",
                    stylers: [
                        { visibility: "off" }
                    ]
                }
            ];
            
            map = new google.maps.Map(document.getElementById('map2'), {
                center: new google.maps.LatLng(20.9124975, 73.7479053),
                zoom: 5,
                styles: styleArray,
                scrollwheel: false,
                disableDefaultUI: true,
                zoomControl: true
            });

            var marker, i;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map
                });
            }
            
            if ( wn.width() < 767 ) {
                map.setOptions({draggable: false});
            }
        };
        
        if ( $("#map2").length ) {
            initMap2();
        }
        
        /* -------------------------------------------------------------------------*
         * ACCORDION
         * -------------------------------------------------------------------------*/
        $('.panel-heading a').on('click', function(e){
            if($(this).parents('.panel').children('.panel-collapse').hasClass('in')) {
                e.stopPropagation();
                e.preventDefault();
            }
        });
        
        /* -------------------------------------------------------------------------*
         * DOMAIN PRICING AREA
         * -------------------------------------------------------------------------*/
        if ( wn.width() < 992 ) {
            $('#dedicatedPricing table td, #domainPricing table td').each(function () {
                $(this).prepend('<span class="labelText">'+ $(this).data('label') + '</span>');
            });
        }

        /* ------------------------------------------------------------------------- *
         * VPS SLIDER
         * ------------------------------------------------------------------------- */
        var vpsSlider = $('#vpsSlider')
        ,   vpsItemCPUel
        ,   vpsItemRAMel
        ,   vpsItemSPACEel
        ,   vpsItemBANDWIDTHel
        ,   vpsItemPriceEl
        ,   vpsItemSetupEl
        ,   vpsItemIpEl
        ,   vpsActionBtn;

        if ( vpsSlider.length ) {
            vpsItemCPUel = $('.vps-item-cpu');
            vpsItemRAMel = $('.vps-item-ram');
            vpsItemSPACEel = $('.vps-item-space');
            vpsItemBANDWIDTHel = $('.vps-item-bandwidth');
            vpsItemPriceEl = $('.vps-total-price span');
            vpsItemSetupEl = $('.vps-item-setup');
            vpsItemIpEl = $('.vps-item-ip');
            vpsActionBtn = $('.VpsActionBtn');
        
            vpsSlider.slider({
                animate: "fast",
                range: "min",
                min: 0,
                max: 4,
                value: 1,
                step: 1,
                create: function () {
                    vpsActionBtn.attr('href', 'http://billing.ywhmcs.com/cart.php?systpl=OrDomainCV1&a=add&pid=12');
                },
                slide: function( event, ui ) {
                    var vpsItemCPU, vpsItemRAM, vpsItemSPACE, vpsItemBANDWIDTH, vpsItemPrice, vpsItemSetup, vpsItemIp, vpsUrl;

                    switch (ui.value) {
                        case 0:
                            vpsItemCPU = '1 CORE';
                            vpsItemRAM = '1 GB';
                            vpsItemSPACE = '100 GB';
                            vpsItemBANDWIDTH = '1000 GB';
                            vpsItemPrice = '$9.99';
                            vpsItemSetup = 'FREE';
                            vpsItemIp = 'UP TO 1';
                            vpsUrl = 'http://billing.ywhmcs.com/cart.php?systpl=EcoHostingV1C1&a=add&pid=12';
                            break;
                        case 1:
                            vpsItemCPU = '2 CORES';
                            vpsItemRAM = '2 GB';
                            vpsItemSPACE = '200 GB';
                            vpsItemBANDWIDTH = '2000 GB';
                            vpsItemPrice = '$29.99';
                            vpsItemSetup = 'FREE';
                            vpsItemIp = 'UP TO 2';
                            vpsUrl = 'http://billing.ywhmcs.com/cart.php?systpl=EcoHostingV1C1&a=add&pid=13';
                            break;
                        case 2:
                            vpsItemCPU = '3 CORES';
                            vpsItemRAM = '3 GB';
                            vpsItemSPACE = '300 GB';
                            vpsItemBANDWIDTH = '3000 GB';
                            vpsItemPrice = '$59.99';
                            vpsItemSetup = 'FREE';
                            vpsItemIp = 'UP TO 3';
                            vpsUrl = 'http://billing.ywhmcs.com/cart.php?systpl=EcoHostingV1C1&a=add&pid=14';
                            break;
                        case 3:
                            vpsItemCPU = '4 CORES';
                            vpsItemRAM = '4 GB';
                            vpsItemSPACE = '400 GB';
                            vpsItemBANDWIDTH = '4000 GB';
                            vpsItemPrice = '$89.99';
                            vpsItemSetup = 'FREE';
                            vpsItemIp = 'UP TO 4';
                            vpsUrl = 'http://billing.ywhmcs.com/cart.php?systpl=EcoHostingV1C1&a=add&pid=15';
                            break;
                        case 4:
                            vpsItemCPU = '5 CORES';
                            vpsItemRAM = '5 GB';
                            vpsItemSPACE = '500 GB';
                            vpsItemBANDWIDTH = '5000 GB';
                            vpsItemPrice = '$99.99';
                            vpsItemSetup = 'FREE';
                            vpsItemIp = 'UP TO 5';
                            vpsUrl = 'http://billing.ywhmcs.com/cart.php?systpl=EcoHostingV1C1&a=add&pid=16';
                            break;
                    }
                    vpsItemCPUel.text(vpsItemCPU);
                    vpsItemRAMel.text(vpsItemRAM);
                    vpsItemSPACEel.text(vpsItemSPACE);
                    vpsItemBANDWIDTHel.text(vpsItemBANDWIDTH);
                    vpsItemPriceEl.text(vpsItemPrice);
                    vpsItemSetupEl.text(vpsItemSetup);
                    vpsItemIpEl.text(vpsItemIp);
                    vpsActionBtn.attr('href', vpsUrl);
                }
            });

            $('#vpsSlider .ui-slider-handle').append('<i class="fa fa-map-marker"></i>');
        }

        /* ------------------------------------------------------------------------- *
         * VPS SLIDER 2
         * ------------------------------------------------------------------------- */
        var vpsSlider2 = $('#vpsSlider2');

        if ( vpsSlider2.length ) {
            vpsItemCPUel = $('.vps-item-cpu');
            vpsItemRAMel = $('.vps-item-ram');
            vpsItemSPACEel = $('.vps-item-space');
            vpsItemBANDWIDTHel = $('.vps-item-bandwidth');
            vpsItemPriceEl = $('.vps-total-price span');
            vpsItemSetupEl = $('.vps-item-setup');
            vpsItemIpEl = $('.vps-item-ip');
            vpsActionBtn = $('.VpsActionBtn');

            vpsSlider2.slider({
                animate: "fast",
                range: "min",
                min: 0,
                max: 4,
                value: 0,
                step: 1.2,
                create: function () {
                    vpsActionBtn.attr('href', 'http://billing.ywhmcs.com/cart.php?systpl=OrDomainCV1&a=add&pid=12');
                },
                slide: function( event, ui ) {
                    var vpsNameTag, vpsItemCPU, vpsItemRAM, vpsItemSPACE, vpsItemBANDWIDTH, vpsItemPrice, vpsItemSetup, vpsItemIp, vpsUrl;

                    switch (ui.value) {
                        case 0:
                            //vpsNameTag = 'VPS 1';
                            vpsItemCPU = '1 CORE';
                            vpsItemRAM = '1 GB';
                            vpsItemSPACE = '100 GB';
                            vpsItemBANDWIDTH = '1000 GB';
                            vpsItemPrice = '$9.99';
                            vpsItemSetup = 'FREE';
                            vpsItemIp = 'UP TO 1';
                            vpsUrl = 'http://billing.ywhmcs.com/cart.php?systpl=OrDomainCV1&a=add&pid=12';
                            break;
                        case 1.2:
                            //vpsNameTag = 'VPS 2';
                            vpsItemCPU = '2 CORES';
                            vpsItemRAM = '2 GB';
                            vpsItemSPACE = '200 GB';
                            vpsItemBANDWIDTH = '2000 GB';
                            vpsItemPrice = '$29.99';
                            vpsItemSetup = 'FREE';
                            vpsItemIp = 'UP TO 2';
                            vpsUrl = 'http://billing.ywhmcs.com/cart.php?systpl=OrDomainCV1&a=add&pid=13';
                            break;
                        case 2.4:
                            //vpsNameTag = 'VPS 3';
                            vpsItemCPU = '3 CORES';
                            vpsItemRAM = '3 GB';
                            vpsItemSPACE = '300 GB';
                            vpsItemBANDWIDTH = '3000 GB';
                            vpsItemPrice = '$59.99';
                            vpsItemSetup = 'FREE';
                            vpsItemIp = 'UP TO 3';
                            vpsUrl = 'http://billing.ywhmcs.com/cart.php?systpl=OrDomainCV1&a=add&pid=14';
                            break;
                        case 3.6:
                            //vpsNameTag = 'VPS 4';
                            vpsItemCPU = '4 CORES';
                            vpsItemRAM = '4 GB';
                            vpsItemSPACE = '400 GB';
                            vpsItemBANDWIDTH = '4000 GB';
                            vpsItemPrice = '$89.99';
                            vpsItemSetup = 'FREE';
                            vpsItemIp = 'UP TO 4';
                            vpsUrl = 'http://billing.ywhmcs.com/cart.php?systpl=OrDomainCV1&a=add&pid=15';
                            break;
                    }
                    vpsItemCPUel.text(vpsItemCPU);
                    vpsItemRAMel.text(vpsItemRAM);
                    vpsItemSPACEel.text(vpsItemSPACE);
                    vpsItemBANDWIDTHel.text(vpsItemBANDWIDTH);
                    vpsItemPriceEl.text(vpsItemPrice);
                    vpsItemSetupEl.text(vpsItemSetup);
                    vpsItemIpEl.text(vpsItemIp);
                    vpsActionBtn.attr('href', vpsUrl);
                }
            });

            $('#vpsSlider2 .ui-slider-handle').append('<i class="fa fa-map-marker"></i>');
        }

        /* ------------------------------------------------------------------------- *
         * COLOR SWITCHER
         * ------------------------------------------------------------------------- */
        if ( typeof $.cColorSwitcher !== "undefined" ) {
            $.cColorSwitcher({
                'switcherTitle': 'Main Colors:',
                'switcherColors': [{
                    bgColor: '#8bc34a',
                    filepath: 'css/main-color-1.css'
                }, {
                    bgColor: '#03a9f4',
                    filepath: 'css/main-color-2.css'
                }, {
                    bgColor: '#ff5252',
                    filepath: 'css/main-color-3.css'
                }, {
                    bgColor: '#ff9600',
                    filepath: 'css/main-color-4.css'
                }, {
                    bgColor: '#e91e63',
                    filepath: 'css/main-color-5.css'
                }, {
                    bgColor: '#00BCD4',
                    filepath: 'css/main-color-6.css'
                }, {
                    bgColor: '#FC5143',
                    filepath: 'css/main-color-7.css'
                }, {
                    bgColor: '#00B249',
                    filepath: 'css/main-color-8.css'
                }, {
                    bgColor: '#D48B91',
                    filepath: 'css/main-color-9.css'
                }, {
                    bgColor: '#8CBEB2',
                    filepath: 'css/main-color-10.css'
                }],
                'switcherTarget': $('#mainColorScheme')
            });
        }
    });
    
    $(window).on('load', function () {
        /* ------------------------------------------------------------------------- *
         * ADJUST ROW
         * ------------------------------------------------------------------------- */
        var $adjustRow = $('.AdjustRow');
        
        if ( $adjustRow.length ) {
            $adjustRow.isotope({layoutMode: 'fitRows'});
        }

        /* ------------------------------------------------------------------------- *
         * PRELOADER
         * ------------------------------------------------------------------------- */
        $('#preloader').fadeOut('slow');
    });
})(jQuery);

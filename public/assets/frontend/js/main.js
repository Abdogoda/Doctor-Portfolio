(function ($) {
    "use strict";

    // Sticky Navbar
    $(window).scroll(function () {
        // Check if the scroll position is greater than 40px
        if ($(this).scrollTop() > 40) {
            $('.navbar').addClass('sticky-top'); // Add sticky class to navbar
        } else {
            $('.navbar').removeClass('sticky-top'); // Remove sticky class from navbar
        }
    });

    // Back to Top Button
    $(window).scroll(function () {
        // Show or hide back-to-top button based on scroll position
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow'); // Fade in the button
        } else {
            $('.back-to-top').fadeOut('slow'); // Fade out the button
        }
    });

    $('.back-to-top').click(function () {
        // Smoothly scroll to the top when the button is clicked
        $('html, body').animate({ scrollTop: 0 }, 1000, 'easeInOutExpo');
        return false; // Prevent default link behavior
    });
    
    // Dropdown Menu on Hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";

    $(window).on("load resize", function () {
        if (this.matchMedia("(min-width: 992px)").matches) {
            // Enable dropdown hover behavior for large screens
            $dropdown.hover(
                function () {
                    // Show dropdown menu on hover
                    const $this = $(this);
                    $this.addClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "true");
                    $this.find($dropdownMenu).addClass(showClass);
                },
                function () {
                    // Hide dropdown menu when not hovering
                    const $this = $(this);
                    $this.removeClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "false");
                    $this.find($dropdownMenu).removeClass(showClass);
                }
            );
        } else {
            // Remove hover behavior for small screens
            $dropdown.off("mouseenter mouseleave");
        }
    });

    // Initiate WOW.js for animations
    new WOW().init();

    // Spinner Function
    var spinner = function () {
        setTimeout(function () {
            // Hide the spinner element after a brief delay
            if ($('#loader-container').length > 0) {
                $('#loader-container').removeClass('show');
            }
        }, 500);
    };
    spinner();

    // Image Comparison Initialization
    if($(".twentytwenty-container").length)$(".twentytwenty-container").twentytwenty({});

    if($(".owl-carousel.media-carousel").length){
        $('.owl-carousel.media-carousel').owlCarousel({
            rtl:true,
            loop:true,
            smartSpeed:1000,
            animateOut: 'fadeOut',
            animateIn: 'flipInY',
            dots:true,
            margin:10,
            items:1,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            navText: [
                '<i class="bi bi-arrow-right"></i>',
                '<i class="bi bi-arrow-left"></i>'
            ],
            responsive:{
                0:{
                    items:1
                },
                800:{
                    items:2
                }
            }
        })
    }
        
})(jQuery);

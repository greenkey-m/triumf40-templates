jQuery(document).ready(function () {
    "use strict";

    jQuery('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

    jQuery('table.pricetable tr').on('click', function () {
        jQuery('table.pricetable tr').removeClass('selected');
        jQuery(this).toggleClass('selected');
    })

});


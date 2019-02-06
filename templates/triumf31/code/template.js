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

    jQuery('table.pricetable tr.selectable').on('click', function () {
        //jQuery('table.pricetable tr').removeClass('selected');
        //jQuery(this).toggleClass('selected');
        console.log("click");
    });

    jQuery('.btn.sizeprice').on('click', function () {
        jQuery('.btn.sizeprice').removeClass('selected');
        jQuery(this).toggleClass('selected');
        console.log("click");
    });


    jQuery('.dropdown-menu a').click(function() {
        console.log(jQuery(this).attr('data-value'));
        jQuery(this).closest('.dropdown').find('input.countrycode')
            .val('(' + jQuery(this).attr('data-value') + ')');
    });
});


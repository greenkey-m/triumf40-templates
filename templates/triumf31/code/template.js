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

    function calc_price() {
        let price = 0;
        if (jQuery("input#s[type='radio']:checked").val() == '100') {
            price = Number(jQuery('#price-100 span').text());
        } else {
            price = Number(jQuery('#price-65 span').text());
        }
        if (jQuery('input[name="c-tground"]').is(':checked')) price = price + Number(jQuery('#price-tground span').text());
        if (jQuery('input[name="c-brus"]').is(':checked')) price = price + Number(jQuery('#price-brus span').text());
        if (jQuery('input[name="c-montage"]').is(':checked')) price = price + Number(jQuery('#price-montage span').text());
        jQuery('#calc').text(price);
    }

    jQuery('.dropdown-menu a').click(function(e) {
        //console.log(jQuery(this).attr('data-value'));
        e.preventDefault();
        jQuery(this).closest('.dropdown').find('input.form-control')
            .val('(' + jQuery(this).attr('data-value') + ')');
        jQuery('#price-100 span').text(jQuery(this).attr('data-100'));
        jQuery('#price-65 span').text(jQuery(this).attr('data-65'));
        jQuery('#price-tground span').text(jQuery(this).attr('data-tground'));
        jQuery('#price-brus span').text(jQuery(this).attr('data-brus'));
        jQuery('#price-montage span').text(jQuery(this).attr('data-montage'));
        calc_price(2);
    });


    jQuery('.thumbs a').on('click', function (e) {
        e.preventDefault();
        let x = jQuery(this).data("slide");
        jQuery('.slides').css('margin-left', '-'+(x-1)*100+'%');
        jQuery('.slides .slider').removeClass('active');
        jQuery('.slides'+' #slide'+x).addClass('active');
    })

    jQuery('.flexcon input').on('click', function (e) {
        jQuery(this).closest('.flexcon').toggleClass('active');
    });

});


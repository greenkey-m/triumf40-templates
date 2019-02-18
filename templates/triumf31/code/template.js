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

    jQuery(function () {
        jQuery('[data-toggle="tooltip"]').tooltip()
    })

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

        if( jQuery("span").is("#calc")) {
            let price = 0;
            if (jQuery('.flexcon.active input').val() == '100') {
                price = Number(jQuery('#price-100 span').text());
            } else {
                price = Number(jQuery('#price-65 span').text());
            }
            let option = '';
            if (jQuery('input[name="c-tground"]').is(':checked')) {
                price = price + Number(jQuery('#price-tground span').text());
                option += 'гр-зац '
            }
            if (jQuery('input[name="c-brus"]').is(':checked')) {
                price = price + Number(jQuery('#price-brus span').text());
                option += 'брус '

            }
            if (jQuery('input[name="c-montage"]').is(':checked')) {
                price = price + Number(jQuery('#price-montage span').text());
                option += 'монтаж '
            }

            if (jQuery('input[name="c-window"]').is(':checked')) {
                price = price + Number(jQuery('#price-window span').text());
                option += 'форточка '
            }
            if (jQuery('input[name="c-divide"]').is(':checked')) {
                price = price + Number(jQuery('#price-divide span').text());
                option += 'перегор '
            }

            price = price + Number(jQuery('#delivery').attr('data-price'));

            jQuery('#calc').text(price);

            jQuery('#flength').text(jQuery('#buttondropdown').val());
            jQuery('#fstep').text(jQuery('.flexcon.active input').val()+' см');
            jQuery('#foptions').text(option);
            jQuery('#fdelivery').text(jQuery('#delivery').val().split(" ")[0]);
            jQuery('#fsum').text(price);

            jQuery('#glength').attr('value', jQuery('#buttondropdown').val());
            jQuery('#gstep').attr('value', jQuery('.flexcon.active input').val()+' см');
            jQuery('#goptions').attr('value',option);
            jQuery('#gdelivery').attr('value', jQuery('#delivery').val().split(" ")[0]);
            jQuery('#gsum').attr('value', price);

        }
    }

    jQuery('form.form-order .dropdown-menu a.step').click(function(e) {
        //console.log(jQuery(this).attr('data-value'));
        e.preventDefault();
        jQuery(this).closest('.dropdown').find('input.form-control')
            .val(jQuery(this).attr('data-value') + ' м');
        jQuery('#price-100 span').text(jQuery(this).attr('data-100'));
        jQuery('#price-65 span').text(jQuery(this).attr('data-65'));
        if (jQuery(this).attr('data-65') == '0') {
            jQuery('#price-65 span').parents('.form-group').addClass('inactive')
            jQuery('.s100').addClass('active');
            jQuery('.s100 input').prop('checked', true);;
            jQuery('.s65').removeClass('active');
        }
        else jQuery('#price-65 span').parents('.form-group').removeClass('inactive');
        jQuery('#price-tground span').text(jQuery(this).attr('data-tground'));
        jQuery('#price-brus span').text(jQuery(this).attr('data-brus'));
        jQuery('#price-montage span').text(jQuery(this).attr('data-montage'));
        calc_price();
    });

    jQuery('form.form-order .dropdown-menu a.delivery').click(function(e) {
        //console.log(jQuery(this).attr('data-value'));
        e.preventDefault();
        jQuery(this).closest('.dropdown').find('input.form-control')
            .val(jQuery(this).attr('data-value')).attr('data-price', jQuery(this).attr('data-price'));
        calc_price();
    });


    jQuery('.thumbs a').on('click', function (e) {
        e.preventDefault();
        let x = jQuery(this).data("slide");
        jQuery('.slides').css('margin-left', '-'+(x-1)*100+'%');
        jQuery('.slides .slider').removeClass('active');
        jQuery('.slides'+' #slide'+x).addClass('active');
    })

    jQuery('.flexcon input').on('click', function (e) {
        jQuery('.flexcon input').each(function(ind, el) {
            if (jQuery(el).is(':checked')) jQuery(el).closest('.flexcon').addClass('active');
            else jQuery(el).closest('.flexcon').removeClass('active');
        })
        calc_price();
    });

    // Устанавливаем начальный статус всех переключателей
    jQuery('.flexcon input').each(function(ind, el) {
        if (jQuery(el).is(':checked')) jQuery(el).closest('.flexcon').addClass('active');
        else jQuery(el).closest('.flexcon').removeClass('active');
    })


    let el = jQuery('a.step')[0];
    jQuery(el).closest('.dropdown').find('input.form-control')
        .val(jQuery(el).attr('data-value') + ' м');
    jQuery('#price-100 span').text(jQuery(el).attr('data-100'));
    jQuery('#price-65 span').text(jQuery(el).attr('data-65'));
    if (jQuery(el).attr('data-65') == '0') jQuery('#price-65 span').parents('.form-group').addClass('inactive');
    jQuery('#price-tground span').text(jQuery(el).attr('data-tground'));
    jQuery('#price-brus span').text(jQuery(el).attr('data-brus'));
    jQuery('#price-montage span').text(jQuery(el).attr('data-montage'));

    calc_price();


});


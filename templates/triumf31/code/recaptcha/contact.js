jQuery(function () {

    window.verifyRecaptchaCallback = function (response) {
        jQuery('input[data-recaptcha]').val(response).trigger('change');
    }

    window.expiredRecaptchaCallback = function () {
        jQuery('input[data-recaptcha]').val("").trigger('change');
    }

    //jQuery('#contact-form').validator();

    jQuery('#contact-form').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            var url = "/templates/triumf31/code/recaptcha/contact.php";

            jQuery.ajax({
                type: "POST",
                url: url,
                data: jQuery(this).serialize(),
                success: function (data) {
                    var messageAlert = 'alert-' + data.type;
                    //data.message = "Спасибо за заказ! Мы свяжемся с вами в ближайшее время!"
                    var messageText = data.message;

                    var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
                    if (messageAlert && messageText) {
                        jQuery('#contact-form').find('.messages').html(alertBox);
                        jQuery('#contact-form')[0].reset();
                        grecaptcha.reset();
                        setTimeout( () => {
                            jQuery('#orderform').modal('hide');
                        }, 1500)
                    }
                }
            });
            return false;
        }
    })
});
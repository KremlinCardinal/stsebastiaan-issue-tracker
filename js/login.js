$(document).ready(function () {
    $('#registration-form').validate({
        lang: 'nl',
        rules: {
            first_name: {
                required: true,
                minlength: 2
            },
            between_name: {
                required: false
            },
            last_name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
            password2: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });

    $('#login-form').validate({
        lang: 'nl',
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });
});
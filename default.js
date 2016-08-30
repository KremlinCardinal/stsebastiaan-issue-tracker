$(document).ready(function() {
    $('.modal-trigger').leanModal();
    $(".button-collapse").sideNav({
        menuWidth: 180
    });

    //set moment.js locale to 'nl'
    moment.locale('nl');

    getAll();

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
                minlength: 5,
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
        },
        submitHandler: function (form) {
            var formdata = $(form).serialize();
            register(formdata);
        }
    });
});
$(document).ready(function() {
    $('.modal-trigger').leanModal();
    $(".button-collapse").sideNav({
        menuWidth: 180
    });

    //set moment.js locale to 'nl'
    moment.locale('nl');

    getAll();

    $('#modal-register-submit').click(function () {
        var formdata = $('#registration-form').serialize();
        console.log(formdata);
        register();
    });
});
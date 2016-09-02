$(document).ready(function() {
    $('.modal-trigger').leanModal();
    $('select').material_select();
    $(".button-collapse").sideNav({
        menuWidth: 180
    });
    $('.datepicker').pickadate({
        selectMonths: false,
        selectYears: 5
    });

    //set moment.js locale to 'nl'
    moment.locale('nl');

    getAll();

    $('.js-modal-new-issue').click(function () {
        openNewIssueModal();
    });

    $('#add-issue-form').validate({
        lang: 'nl',
        rules: {
            issue_deadline: {
                required: false
            },
            issue_title: {
                required: true
            },
            issue_description: {
                required: false,
                minlength: 5
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
            var issueData = $(form).serialize();
            if(!checkSelectedValue($('#issue_category').val())) {
                var errorElement = '<div id="issue_category-title" class="error">Kies een categorie.</div>';
                var placementElement = '#add-issue-form .select-wrapper';
                $(errorElement).insertAfter(placementElement);
                $('#issue-category-label').removeClass('active').addClass('active');
            } else {
                newIssue(issueData);
                $('#modal-new-issue').closeModal();
            }
        }
    });
});
function getAll() {
    $.ajax({
        url: 'api.php',
        data: 'action=getAll',
        type: 'POST',
        dataType: 'json',
        success: function (result) {
            showTable(result);
        },
        error: function (xhr, status, errorThrown) {
            alert("Sorry, there was a problem!");
            console.log("Error: "+errorThrown);
            console.log("Status: "+status);
            console.log(xhr);
        }
    });
}

function register(formdata) {
    $('#modal-register').closeModal();

    $.ajax({
        url: 'api.php',
        data: 'action=registerUser&'+formdata,
        type: 'POST',
        success: function (result) {
            processRegisterResults(result);
        },
        error: function (xhr, status, errorThrown) {
            alert("Sorry, there was a problem!");
            console.log("Error: "+errorThrown);
            console.log("Status: "+status);
            console.log(xhr);
        }
    });
}

function showTable(data) {
    var tableHead = '<table class="striped responsive-table">' +
                        '<thead>' +
                            '<tr>' +
                                '<th class="firstcol">ID</th>' +
                                '<th>Titel</th>' +
                                '<th>Categorie</th>' +
                                '<th>Toegewezen aan</th>' +
                                '<th>Deadline</th>' +
                                '<th>Status</th>' +
                                '<th class="lastcol">Info</th>' +
                            '</tr>' +
                        '</thead>' +
                        '<tbody>';

    var tableFoot = '</tbody>' +
                '</table>';

    var tableBody = '';

    for(var i = 0; i < data.length; i++) {

        var deadline = data[i].deadline;

        if(data[i].deadline !== '-') {
            deadline =  moment(data[i].deadline, "YYYY-MM-DD").format('L');
        }

        tableBody += '<tr data-issue=\'' + JSON.stringify(data[i]) + '\'>' +
                         '<td class="firstcol">' + data[i].id + '</td>' +
                         '<td>' + capitalizeFirstLetter(data[i].title) + '</td>' +
                         '<td>' + capitalizeFirstLetter(data[i].cat_name) + '</td>' +
                         '<td>' + capitalizeFirstLetter(data[i].assigned_to) + '</td>' +
                         '<td>' + deadline + '</td>' +
                         '<td><span class="c-badge u-new u-badge-' + data[i].status_name + '">' + capitalizeFirstLetter(data[i].status_name) + '</span></td>' +
                         '<td class="lastcol"><i class="fa fa-info-circle u-modal-link js-modal-info" aria-hidden="true"></i></td>' +
                     '</tr>';
    }

    var htm = tableHead + tableBody + tableFoot;
    $('#result').html(htm);

    $('.js-modal-info').click(function () {
        var issuedata = $(this).parent().parent().data('issue');
       openInfoModal(issuedata);
    });
}

function openInfoModal(issuedata) {
    $('#modal-info .u-infomodal-id').html(issuedata.id);
    $('#modal-info .u-infomodal-deadline').html(moment(issuedata.deadline, "YYYY-MM-DD").format('L'));
    $('#modal-info .u-infomodal-title').html(capitalizeFirstLetter(issuedata.title));
    $('#modal-info .u-infomodal-description').html(issuedata.description);
    $('#modal-info .u-infomodal-category').html(capitalizeFirstLetter(issuedata.cat_name));
    $('#modal-info .u-infomodal-status').html('<span class="c-badge u-new u-badge-' + issuedata.status_name + '">' + capitalizeFirstLetter(issuedata.status_name) + '</span>');
    $('#modal-info .u-infomodal-lastedit').html(moment(issuedata.last_edit, "YYYY-MM-DD").format('L'));
    $('#modal-info .u-infomodal-createdon').html(moment(issuedata.created_on, "YYYY-MM-DD").format('L'));
    $('#modal-info .u-infomodal-createdby').html(capitalizeFirstLetter(issuedata.created_by));
    $('#modal-info .u-infomodal-supervisor').html(capitalizeFirstLetter(issuedata.supervisor));
    $('#modal-info .u-infomodal-assignedto').html(capitalizeFirstLetter(issuedata.assigned_to));

    $("#modal-info").openModal();
}

function capitalizeFirstLetter(text) {
    return text.charAt(0).toUpperCase() + text.slice(1);
}

function processRegisterResults(result) {
    switch(result) {
        case 'bot_detected':
            Materialize.toast('Something went wrong!', 4000);
            break;
        case 'user_already_exists':
            Materialize.toast('Er is al een gebruiker met uw e-mail adres!', 4000);
            break;
        case 'success':
            Materialize.toast('Account succesvol geregistreerd!', 4000);
            break;
        default:
            Materialize.toast('Something went wrong!', 4000);
            break;
    }
}

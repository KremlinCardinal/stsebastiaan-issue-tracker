function getAll() {
    $.ajax({
        url: 'api.php',
        data: 'action=getall',
        type: 'POST',
        dataType: 'json',
        success: function (result) {
            console.log(result);
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
                         '<td>' + data[i].title + '</td>' +
                         '<td class="u-capitalize">' + data[i].cat_name + '</td>' +
                         '<td class="u-capitalize">' + data[i].assigned_to + '</td>' +
                         '<td>' + deadline + '</td>' +
                         '<td class="u-capitalize"><span class="c-badge u-new u-badge-' + data[i].status_name + '">' + data[i].status_name + '</span></td>' +
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
    $('#modal-info .u-infomodal-id').text(issuedata.id);
    $('#modal-info .u-infomodal-deadline').text(issuedata.deadline);
    $('#modal-info .u-infomodal-title').text(capitalizeFirstLetter(issuedata.title));
    $('#modal-info .u-infomodal-description').text(issuedata.description);
    $('#modal-info .u-infomodal-category').text(capitalizeFirstLetter(issuedata.cat_name));
    $('#modal-info .u-infomodal-status').text(capitalizeFirstLetter(issuedata.status_name));
    $('#modal-info .u-infomodal-lastedit').text(issuedata.last_edit);
    $('#modal-info .u-infomodal-createdon').text(issuedata.created_on);
    $('#modal-info .u-infomodal-createdby').text(capitalizeFirstLetter(issuedata.created_by));
    $('#modal-info .u-infomodal-supervisor').text(capitalizeFirstLetter(issuedata.supervisor));
    $('#modal-info .u-infomodal-assignedto').text(capitalizeFirstLetter(issuedata.assigned_to));

    $("#modal-info").openModal();
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
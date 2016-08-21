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
        tableBody += '<tr>' +
                         '<td class="firstcol">' + data[i].id + '</td>' +
                         '<td>' + data[i].title + '</td>' +
                         '<td class="u-capitalize">' + data[i].cat_name + '</td>' +
                         '<td>' + data[i].assigned_to + '</td>' +
                         '<td>' + data[i].deadline + '</td>' +
                         '<td class="u-capitalize"><span class="c-badge u-new u-badge-' + data[i].status_name + '">' + data[i].status_name + '</span></td>' +
                         '<td class="lastcol"><i class="fa fa-info-circle u-modal-link js-modal-info" aria-hidden="true"></i></td>' +
                     '</tr>';
    }

    var htm = tableHead + tableBody + tableFoot;
    $('#result').html(htm);

    $('.js-modal-info').click(function () {
       openInfoModal();
    });
}

function openInfoModal() {
    $("#modal-info").openModal();
}
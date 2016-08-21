$('.js-modal-info').click(function () {
    $("#modal-info").openModal();
});

function getAll() {
    $.ajax({
        url: 'api.php',
        data: 'action=getall',
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

function showTable(data) {
    console.log(data);

    var tableHead = '<table class="striped responsive-table">' +
                        '<thead>' +
                            '<tr>' +
                                '<th>ID</th>' +
                                '<th>Titel</th>' +
                                '<th>Toegewezen aan</th>' +
                                '<th>Deadline</th>' +
                                '<th>Status</th>' +
                                '<th>Info</th>' +
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
                         '<td>' + data[i].assigned_to + '</td>' +
                         '<td>' + data[i].deadline + '</td>' +
                         '<td>' + data[i].status_name + '</td>' +
                         '<td class="lastcol"><i class="fa fa-info-circle u-modal-link js-modal-info" aria-hidden="true"></i></td>' +
                     '</tr>';
    }

    var htm = tableHead + tableBody + tableFoot;
    $('#result').html(htm);
}
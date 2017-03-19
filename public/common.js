/**
 * Created by Jeremy Avid on 04/08/2016.
 */

function searchClientByTicket(val) {
    $.ajax({
        type: "POST",
        url: '/administration/clients/rechercher-client/calls',
        data: 'val=' + encodeURIComponent(val),
        success: function (data) {
            $('#results').html(data);
        },
        error: function(data) {
            $('#results').html('Erreur...Merci de ré-essayer');
        }
    });
}

function setClientToTicket(name, id) {
    if(confirm('Êtes vous sûr(e) de vouloir attribuer cet appel à ' + name + ' ?')) {
        $('#client_id').val(id);
        $('#submit').click();
    }
}

function searchClientByName(val, ifNull) {
    if($.trim(val) == '' && ifNull == '0') {
        $('#results').html('');
        return;
    }

    if($.trim(val) == '' && ifNull != '0') {
        val = '*';
    }

    $.ajax({
        type: "POST",
        url: '/administration/clients/rechercher-client/clients',
        data: 'val=' + encodeURIComponent(val),
        success: function (data) {
            $('#results').html(data);
        },
        error: function (data) {
            $('#results').html('Erreur...Merci de ré-essayer');
        }
    });

}

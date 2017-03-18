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

function searchClientByCustomerService(val) {
    $.ajax({
        type: "POST",
        url: '/administration/clients/rechercher-client/customer-service',
        data: 'val=' + encodeURIComponent(val),
        success: function (data) {
            $('#results').html(data);
        },
        error: function(data) {
            $('#results').html('Erreur...Merci de ré-essayer');
        }
    });
}

function searchPneumopharmaKey(val) {

    if($.trim(val) == '') {
        val = '*';
    }

    $.ajax({
        type: "POST",
        url: '/administration/formules/licences-pneumopharma/rechercher',
        data: 'val=' + encodeURIComponent(val),
        success: function (data) {
            $('#accordion1').html(data);
        },
        error: function (data) {
            $('#accordion1').html('Erreur...Merci de ré-essayer');
        }
    });

}

function getPneumoPharmaActivationKey()
{
    var pin = prompt('Merci d\'entrer le code PIN');

    if(pin != '' && pin != null) {
        $.ajax({
            type: "POST",
            url: '/administration/formules/licences-pneumopharma/cle-activation',
            data: 'val=' + encodeURIComponent(pin),
            success: function (data) {
                alert(data);
            },
            error: function (data) {
                alert('Erreur...Merci de ré-essayer');
            }
        });
    }
}

function searchDoctorGsk(val) {
    if(val != '') {

        $.ajax({
            type: "POST",
            url: '/administration/gsk/rechercher-medecin',
            data: 'val=' + encodeURIComponent(val),
            success: function (data) {
                $('#results').html(data);
            },
            error: function (data) {
                $('#results').html('Erreur...Merci de ré-essayer');
            }
        });
        $('#card_results').show();
    }
    else {
        $('#card_results').hide();
    }
}

function searchDoctorAsalee(val) {
    if(val != '') {

        $.ajax({
            type: "POST",
            url: '/administration/asalee/rechercher-cabinet',
            data: 'val=' + encodeURIComponent(val),
            success: function (data) {
                $('#results').html(data);
            },
            error: function (data) {
                $('#results').html('Erreur...Merci de ré-essayer');
            }
        });
        $('#card_results').show();
    }
    else {
        $('#card_results').hide();
    }
}

var loadCountriesInField = function() {
	$.ajax({
        type: 'GET',
        url: '/api/select/countries',
        dataType:'json',
        success: function(response) {
            //console.log(response);
            if (response.success == true) {
                jQuery('#countries_register').html('');
                jQuery('#countries_register').append('<option value=\"\"></option>');
                $.each(response.countries,function (k,v){
                    jQuery('#countries_register').append('<option value=\"'+k+'\">'+v+'</option>');
                });
            }else{
                jQuery('#countries_register').html('');
                jQuery('#countries_register').append('<option value=\"\"></option>');
            }
        }
    });
}

var loadClassificationsProductsInField = function() {
    $.ajax({ 
        type: 'GET',
        url: '/api/select/classifications',
        dataType:'json',
        success: function(response) {
            //console.log(response);
            if (response.success == true) {
                jQuery('#classification_product').html('');
                jQuery('#classification_product').append('<option value=\"\"></option>');
                $.each(response.countries,function (k,v){
                    jQuery('#classification_product').append('<option value=\"'+k+'\">'+v+'</option>');
                });
            }else{
                jQuery('#classification_product').html('');
                jQuery('#classification_product').append('<option value=\"\"></option>');
            }
        }
    });
}

var getAttributeIdActionSelect = function (id) {
    var action = new Object();
    action.typeAction = id ? id.split('_')[0] : '';
    action.view = id ? id.split('_')[1] : '';
    action.number = id ? id.split('_')[2] : '';
    return action;
}

var reloadDatatable = function (table) {
    var table = typeof table !== 'undefined' ? table : '#datatable';
    if($(table).length) {
        var table = $(table).DataTable();
        table.search('').draw();
    }
}

var deleteClassificationItem = function() {
    $(".table").delegate(".delete-classification", "click", function() {
        event.preventDefault();
        action = getAttributeIdActionSelect($(this).attr('id'));
        bootbox.confirm("Sure to remove the classification ?", function(result) {
            if (result == true)
            {
                 $.ajax({
                    type: 'GET',
                    url: '/classification/delete/' + action.number,
                    //data: {'competitionId': idCompetition},
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response);
                        if (response.success == true) {
                            $('#delete_classification_' + action.number).parent().parent().remove();
                            bootbox.dialog({
                                message:" ¡Removed classification!",
                                title: "Success",
                                buttons: {
                                    success: {
                                        label: "Success!",
                                        className: "btn-success",
                                        callback: function () {
                                            reloadDatatable('#classification-table');
                                        }
                                    }
                                }
                            });
                        };
                    }
                });
            };
        });
    });
}



jQuery(document).ready( function() 
{
	loadCountriesInField();
    deleteClassificationItem();
    loadClassificationsProductsInField();
});

var loadCountriesInField= function() {
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

var getAttributeIdActionSelect = function (id) {
    var action = new Object();
    action.typeAction = id ? id.split('_')[0] : '';
    action.view = id ? id.split('_')[1] : '';
    action.number = id ? id.split('_')[2] : '';
    return action;
}

var deleteClassificationItem = function() {
    $(".table").delegate(".delete-classification", "click", function() {
        event.preventDefault();
        console.log('Delete Classification');
    });
}


jQuery(document).ready( function() 
{
	loadCountriesInField();
    deleteClassificationItem();
});

var loadCountriesInField= function() {
	$.ajax({
        type: 'GET',
        url: '/api/select/countries',
        dataType:'json',
        success: function(response) {
            console.log(response);
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

jQuery(document).ready( function() 
{
	loadCountriesInField();
});
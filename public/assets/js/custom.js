
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
                $.each(response.classifications,function (k,v){
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


var showProductForm = function() {
    $('.table').delegate(".show-product","click",function() {
        event.preventDefault();
        action = getAttributeIdActionSelect($(this).attr('id'));
        //console.log(action);
        $.ajax({
            type: 'GET',
            url: '/api/show/info/product/' + action.number,
            //data: {'competitionId': idCompetition},
            dataType: "JSON",
            success: function(response) 
            {
                //console.log(response);
                var product = $('#show-infon-product');
                var data = {
                    urlFirtsPhoto: response.urlFirtsPhoto,
                    photos: response.photos,
                    id: response.product.id,
                    name: response.product.name,
                    price: response.product.price,
                    description: response.product.description,
                    quantity: response.product.quantity,
                    mark: response.product.mark,
                    classification: response.classification
                };
                var template = $('#show-infon-product-tpl').html();
                //console.log(template);
                var html = Mustache.to_html(template, data);
                product.html(html);
            }
        });

        bootbox.dialog({
            message: $('#show-product-form-div'),
            show: false // We will show it manually later
        })
        .on('shown.bs.modal', function() {
            $('#show-product-form-div')
                .show();    // Show the form
        })
        .on('hide.bs.modal', function(e) {
            // Bootbox will remove the modal (including the body which contains the form)
            // after hiding the modal
            // Therefor, we need to backup the form

            $('#show-product-form-div').hide().appendTo('#show-product-form');
        })
        .modal('show');
    });
}


var deleteProductItem = function() {
    $('.table').delegate(".delete-products","click",function() {
        event.preventDefault();
        action = getAttributeIdActionSelect($(this).attr('id'));
        //console.log(action);
        bootbox.confirm("Sure to remove the product ?", function(result) {
            if (result == true)
            {
                 $.ajax({
                    type: 'GET',
                    url: '/api/delete/product/' + action.number,
                    //data: {'competitionId': idCompetition},
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response);
                        if (response.success) 
                        {
                            $('#delete_products_' + action.number).parent().parent().remove();
                            bootbox.dialog({
                                message:" ¡Removed product!",
                                title: "Success",
                                buttons: {
                                    success: {
                                        label: "Success!",
                                        className: "btn-success",
                                        callback: function () {
                                            reloadDatatable('#products-table');
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

var createCartProductToUser = function() {
    $(document.body).on("click", "[class^=add_cart]", function(event)
    {
        var url = jQuery(this).attr('href');
        jQuery.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function(response) 
            {
                if (response.success) 
                {
                    console.log(response);
                    var cart = jQuery('#products-cart');
                    var product = response.product;
                    var template = jQuery('#cart-tpl').html();
                    var html = Mustache.to_html(template, product);
                    cart.prepend(html);
                    addCountTocart();
                    bootbox.dialog({
                        message:" ¡Product added to your shopping cart!",
                        title: "Success",
                        buttons: {
                            success: {
                                label: "Success!",
                                className: "btn-success"
                            }
                        }
                    });
                }else{
                    bootbox.dialog({
                        message:" ¡Could not add the product to the shopping cart!",
                        title: "Danger",
                        buttons: {
                            success: {
                                label: "Danger!",
                                className: "btn-danger"
                            }
                        }
                    });
                }
            }
        });
    });
}


var initTouchspin = function() {
    jQuery(".product-quantity .form-control").TouchSpin({
        buttondown_class: "btn quantity-down",
        buttonup_class: "btn quantity-up",
        min: 0,
        max: 100,
        step: 1,
        decimals: 0,
        boostat: 5,
        maxboostedstep: 10
    });

    jQuery(".quantity-down").html("<i class='fa fa-angle-down'></i>");
    jQuery(".quantity-up").html("<i class='fa fa-angle-up'></i>");

    jQuery('.product-quantity-change').on('touchspin.on.stopspin', function () {
        $.ajax({
            type: 'GET',
            url: jQuery(this).attr('data-url') + '/' + jQuery(this).val(),
            //data: { 'quantity': jQuery(this).val() },
            dataType: "JSON",
            success: function(response) {
                if(!response.success)
                {
                    bootbox.dialog({
                        message:" There was an error trying to change the amount , try again!",
                        title: "Danger",
                        buttons: {
                            success: {
                                label: "Danger!",
                                className: "btn-danger"
                            }
                        }
                    });
                }
            }
        });
    });
}


var removeFromCart = function() {
    jQuery(document).on('click', '.delete-from-cart', function() {
        var element = jQuery(this);
        var url = element.attr('href');
        jQuery.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function(response) {
                if (response != null) {
                    if (response.success) {
                        element.closest('.li').remove();
                        discountFromcart();
                    } else {
                        bootbox.dialog({
                            message:" There was an error trying to delete product , try again!",
                            title: "Danger",
                            buttons: {
                                success: {
                                    label: "Danger!",
                                    className: "btn-danger"
                                }
                            }
                        });
                    }
                }
            }
        });
        return false;
    });

     jQuery(document).on('click', '.delete-from-cart-list', function() {
        var element = jQuery(this);
        var url = element.attr('href');
        jQuery.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function(response) {
                if (response != null) {
                    if (response.success) {
                        element.closest('tr').remove();
                        discountFromcart();
                        jQuery('#sub-total').text(response.total);
                        //jQuery('#total').text(response.total);
                    } else {
                        console.log(response);
                        bootbox.dialog({
                            message:" There was an error trying to delete product , try again!",
                            title: "Danger",
                            buttons: {
                                success: {
                                    label: "Danger!",
                                    className: "btn-danger"
                                }
                            }
                        });
                    }
                }
            }
        });
        return false;
    });

}


var addWishlistProductToUser = function() {
    $(document.body).on("click", "[class^=add_wishlist]", function(event)
    {
        var url = jQuery(this).attr('href');
        console.log(url);
        jQuery.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function(response) 
            {
                if (response.success) 
                {
                    console.log(response);
                    var wishlist = jQuery('#products-wishlist');
                    var product = response.product;
                    var template = jQuery('#wishlist-tpl').html();
                    var html = Mustache.to_html(template, product);
                    wishlist.prepend(html);
                    addCountToWishlit();
                    bootbox.dialog({
                        message:" ¡Product added to your wishlist!",
                        title: "Success",
                        buttons: {
                            success: {
                                label: "Success!",
                                className: "btn-success"
                            }
                        }
                    });
                }else{
                    bootbox.dialog({
                        message:" ¡Could not add the product to the wishlist!",
                        title: "Danger",
                        buttons: {
                            success: {
                                label: "Danger!",
                                className: "btn-danger"
                            }
                        }
                    });
                }
            }
        });
    });
}


var removeFromWishlist = function() {
    jQuery(document).on('click', '.delete-from-wishlist', function() {
        var element = jQuery(this);
        var url = element.attr('href');
        jQuery.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function(response) {
                if (response != null) {
                    if (response.success) {
                        element.closest('.li').remove();
                        discountFromcart();
                    } else {
                        bootbox.dialog({
                            message:" There was an error trying to delete product , try again!",
                            title: "Danger",
                            buttons: {
                                success: {
                                    label: "Danger!",
                                    className: "btn-danger"
                                }
                            }
                        });
                    }
                }
            }
        });
        return false;
    });


var addCountTocart = function() {
    var cartCount = parseInt(jQuery('#cart-count').html());
    if (isNaN(cartCount)) cartCount = 0;
    jQuery('#cart-count').html(cartCount + 1);
}

var addCountToWishlit = function() {
    var wishlist = parseInt(jQuery('#wishlist-count').html());
    if (isNaN(wishlist)) wishlist = 0;
    jQuery('#wishlist-count').html(wishlist + 1);
}

var discountFromcart = function() {
    var cartCount = parseInt(jQuery('#cart-count').html());
    if (isNaN(cartCount)) cartCount = 0;
    if (cartCount > 0)
        cartCount--;
    jQuery('#cart-count').html(cartCount);
}

jQuery(document).ready( function() 
{
	loadCountriesInField();
    deleteClassificationItem();
    loadClassificationsProductsInField();
    showProductForm();
    deleteProductItem();
    createCartProductToUser();
    initTouchspin();
    removeFromCart();
    addWishlistProductToUser();
});
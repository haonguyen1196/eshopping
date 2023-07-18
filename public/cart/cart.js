function addToCart(e) {
    e.preventDefault();
    let url = $(this).data('url');
    let id = $(this).data('id');
    let quantity = $(this).parents('span.product_info_item').find('input.quantity').val();
    $.ajax({
        type: "GET",
        url: url,
        dataType: "json",
        data: {'id': id, 'quantity': quantity},
        success: function(data) {
            if(data.code === 200) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 2000
                  })
            }
        },
        error: function() {

        }
    })
}

function quantityUp(e) {
    e.preventDefault();
    $inputVal = +$(this).parents('div.cart_quantity_button').find('input.input_quantity').val();
    $inputValNew = $inputVal + 1;
    $(this).parents('div.cart_quantity_button').find('input.input_quantity').val($inputValNew);
}

function quantityDown(e) {
    e.preventDefault();
    $inputVal = +$(this).parents('div.cart_quantity_button').find('input.input_quantity').val();
    if ($inputVal === 1){
        $inputValNew = $inputVal;
    } else {
        $inputValNew = $inputVal - 1;
    }
    $(this).parents('div.cart_quantity_button').find('input.input_quantity').val($inputValNew);
}

function updateCart(e) {
    e.preventDefault();
    $url = $(this).data('url');
    $id = $(this).data('id');
    $quantity = $(this).parents('tr.wrap_cart_product').find('input.input_quantity').val();
    $.ajax({
        type: "GET",
        url: $url,
        dataType: "json",
        data: {'id': $id, 'quantity': $quantity},
        success: function(data) {
            if(data.code === 200) {
                $('.cart_content').html(data.cartView);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        },
        error: function (data) {
            if(data.code === 500) {
                alert(data.message);
            }
        }
    })
}

function deleteCart(e) {
    e.preventDefault();
    $url = $(this).data('url');
    $.ajax({
        type: "GET",
        url: $url,
        dataType: "json",
        success: function(data) {
            if(data.code === 200) {
                $('.cart_content').html(data.viewCart);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        },
        error: function() {

        }
    })
}

//payment

function updatePayment(e) {
    e.preventDefault();
    $url = $(this).data('url');
    $id = $(this).data('id');
    $quantity = $(this).parents('tr.wrap_cart_product').find('input.input_quantity').val();
    $.ajax({
        type: "GET",
        url: $url,
        dataType: "json",
        data: {'id': $id, 'quantity': $quantity},
        success: function(data) {
            if(data.code === 200) {
                $('.cart_content').html(data.cartView);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        },
        error: function (data) {
            if(data.code === 500) {
                alert(data.message);
            }
        }
    })
}

function deletePayment(e) {
    e.preventDefault();
    $url = $(this).data('url');
    $.ajax({
        type: "GET",
        url: $url,
        dataType: "json",
        success: function(data) {
            if(data.code === 200) {
                $('.cart_content').html(data.viewCart);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        },
        error: function() {

        }
    })
}



$(function() {
    $(document).on('click', '.btn_add_to_cart', addToCart);
    $(document).on('click', '.btn_quantity_up', quantityUp);
    $(document).on('click', '.btn_quantity_down', quantityDown);
    $(document).on('click', '.cart_quantity_update', updateCart);
    $(document).on('click', '.cart_quantity_delete', deleteCart);

    //payment
    $(document).on('click', '.payment_update', updatePayment);
    $(document).on('click', '.payment_delete', deletePayment);
})

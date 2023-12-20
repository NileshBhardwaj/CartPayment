setTimeout(function() {
    document.getElementById("loading").classList.add("none");
}, 3000);
// Select the button element and attach a click event handler
$('.button-pill').on('click', function() {
    // Use $(this) to refer to the current button
    // Find the nearest ancestor element that has the class .product-box
    var productBox = $(this).closest('.product-box');
    // Find the child elements that contain the price and id information
    var price = productBox.find('.product-item-price').text();
    var id = productBox.find('.id').text();

    var user = $('#user').val();

    $.ajax({
        type: 'POST',
        url: '/shop/addtocart',
        data: {
            price: price,
            id: id,
            user_id: user,
            quantity: 1,
        },
        success: function(response) {
            // Handle the response from the server
            console.log(response);
            if (response) {
                $("#msg").show();
                $('#msg').delay(5000).fadeOut('slow');
            }
        }
    });
});


$(document).ready(function() {

    $.ajax({
        type: 'GET',
        url: '/cart_data',
        success: function(data) {
            console.log(data);
            if (data != "") {
                $("#empty_cart").hide();
                console.log(data);
                var table = "<table id='id'>";

                table +=
                    "<tr><th>Sr.No</th><th>Product Name</th><th>Price</th><th>Quantity</th><th>Total Price</th><th>Add/Remove</th></tr>";
                var total_price = 0;
                var total_quantity = 0;
                var srNo = 1;
                $.each(data, function(index, data) {
                    var id = data.product_id;
                    var quantity = data.quantity;
                    var price = data.price;
                    var product_name = data.name;
                    // var image = data.image;
                    total_price += quantity * price;
                    total_quantity += Number(quantity);
                    console.log('The total quantity for all rows is: ' +
                        total_quantity);
                    //console.log('The total price for all rows is: ' + total_price);
                    table += "<tr>";
                    table += "<td style='display:none;'>" + id + "</td>";
                    table += "<td>" + srNo + "</td>";
                    table += "<td>" + product_name + "</td>";
                    table += "<td>$" + price + "</td>";

                    table += "<td>" + quantity + "</td>";

                    table += "<td>" + price * quantity + "</td>";
                    // table += "<td>" + image + "</td>";

                    table += '<td class="button-container">';
                    table += '<button class="edit-button">+</button>';
                    table += '<button class="delete-button"id="remove">-</button>';
                    table += '<button class=row ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                    table += "</tr>";
                    srNo++;
                });
                table += "<tr>";
                table += "<td colspan='3'>Total</td>";
                table += "<td>" + total_quantity + "</td>"; // Total quantity
                table += "<td>$" + total_price + "</td>";
                table += "<td></td>";
                table += "</tr>";



                // console.log('The total price for all rows is: ' + total_price);
                table += "</table>";

                $('#responseContainer').html(table);

                $('#subtotal').html('$' + total_price);
                $('#grand').html('$' + total_price);



                $('#checkout').on('click', function() {

                    $.ajax({
                        type: 'get',
                        data: {
                            price: total_price
                        },
                        url: '/paypal/payment',
                        dataType: "json",
                        success: function(response) {
                            if (response.message == "success") {
                                window.location = response.location
                            }
                        }
                    })
                })

                $('.row').on('click', function() {
                    var row = $(this).closest("tr");
                    var quantity = row.find("td:eq(4)").text();
                    var id = row.find("td:eq(0)").text();
                    console.log(id);


                    $.ajax({
                        type: 'get',
                        data: {
                           id:id,
                           quantity:quantity,
                        },
                        url: 'fetch_data',
                        dataType: "json",
                        success: function(response) {
                            console.log(response);
                            if(response){
                                location.reload();
                            }
                        }
                    })
                })

            }
            else{
                $('#main').hide();
                
            }
        }

    })

});
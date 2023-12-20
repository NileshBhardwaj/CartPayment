$(document).ready(function () {
    var id = $("#user_id").val();
    console.log(id);

    //    let order_id,payment,paypal,payee_email,payee_account_id,purchase_units,
    //    payer,payer_email,payer_id;

    $.ajax({
        type: "GET",
        data: { id: id },
        url: "cart_empty",
        success: function (response) {
            var data = response;
            var order_id = data.id;

            var payment = data.payment_source;

            var paypal = payment.paypal;

            var payee_email = paypal.email_address;

            var payee_account_id = paypal.account_id;


            var purchase_units = data.purchase_units;

            var payer = data.payer;

            var payer_email = payer.email_address;

            var payer_id = payer.payer_id;

            console.log(payer_id);
            if (data) {
                $.ajax({
                    type: "GET",
                    data: {
                        order_id: order_id,
                        payee_email: payee_email,
                        payee_account_id: payee_account_id,
                        payer_email: payer_email,
                        payer_id: payer_id,
                    },
                    url: "fetch_data",
                    success: function (response) {
                        console.log(response);
                    },
                });
            }
        },
    });
});

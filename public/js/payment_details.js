setTimeout(function () {
    document.getElementById("loading").classList.add("none");
}, 3000);

$(document).ready(function () {
    $("#chart").hide();
    // console.log("wdsbvsdb");
    // var data =  $("#data").val();

    // console.log(data);

    $.ajax({
        url: "/payment_data",
        type: "GET",
        success: function (data) {
            // console.log(data);
            if (data) {
                var table = $("#responsecontainer").html();
                var srNo = data.from;
                // $("th").css("color", "blue");
                var transaction_details = data.transaction_details;

                // console.log(transaction_details);

                var transactions = []; // Array to store all transactions
                var srNo = 1;
                var partnerTransactions = [];
                var charges = [];
                var value;
                var positive;
                var templateRow = $("#responseContainer .bho").detach();
                var childrow1 = $("#responseContainer .child-row").detach();
                var childRow;
                $.each(transaction_details, function (index, transaction) {
                    var transaction_info = transaction.transaction_info;
                    var payer_info = transaction.payer_info;
                    // console.log(payer_info);
                    var transaction_id = transaction_info.transaction_id;
                    var transaction_status =
                        transaction_info.transaction_status;
                    var transaction_updated_date =
                        transaction_info.transaction_updated_date;
                    var transaction_amount =
                        transaction_info.transaction_amount;
                    var amount = transaction_amount.value;
                    var number = amount;
                    var positiveNumber = Math.abs(number);

                    var account_id = payer_info.account_id;
                    var email_address = payer_info.email_address;
                    var alternate_full_name =
                        payer_info.payer_name.alternate_full_name;

                    // Check if alternate_full_name is undefined
                    if (typeof alternate_full_name === "undefined") {
                        alternate_full_name = "Partner"; // Set a default value
                    }
                    if (typeof email_address === "undefined") {
                        email_address = "sb-mnlme28649302@business.example.com"; // default value
                    }
                    if (typeof account_id === "undefined") {
                        account_id = "xxxxxxxxxxx"; // Set a default value
                    }
                    var reference_id = transaction_info.paypal_reference_id;
                    var formatted = new Date(transaction_updated_date);

                    // console.log(formatted);

                    var correct = formatted.toDateString();
                    // console.log(correct);

                    // Create an object for the current transaction
                    var currentTransaction = {
                        id: transaction_id,
                        status: transaction_status,
                        updatedDate: correct,
                        amount: positiveNumber,
                        accountId: account_id,
                        emailAddress: email_address,
                        alternateFullName: alternate_full_name,
                        reference: reference_id,
                    };
                    if (alternate_full_name != "Partner") {
                        var fees = transaction_info.fee_amount;
                        $.each(fees, function () {
                            value = fees.value;
                            positive = Math.abs(value);
                        });
                    }
                    // var fees = transaction_info.fee_amount;

                    // Add the current transaction to the transactions array
                    transactions.push(currentTransaction);

                    // Determine the payment type
                    var paymentType =
                        alternate_full_name === "Partner"
                            ? "Withdraw to"
                            : "Payment from";

                    if (alternate_full_name === "Partner") {
                        partnerTransactions.push(currentTransaction);
                    }

                    charges.push(currentTransaction);

                    // console.log(partnerTransactions);
                    // Only add the row to the table if alternate_full_name is not 'Partner'

                    if (alternate_full_name != "Partner") {
                        // Clone the template row
                        var newRow = templateRow.clone();

                        newRow.find(".srno").text(srNo + ".");
                        newRow.find(".name").text(alternate_full_name);
                        newRow.find(".payment").text(paymentType);
                        newRow.find(".email").text(email_address);
                        newRow.find(".transaction").text(transaction_id);
                        newRow.find(".status").text("Completed");
                        newRow.find(".date").text(correct);
                        newRow.find(".paypal").text("-$" + positive);
                        newRow.find(".amount").text("$" + positiveNumber);
                        childRow = childrow1.clone();

                        // Append the child row to the table
                        $("#responseContainer").append(childRow);
                        srNo++;
                        $("#responseContainer").append(newRow);
                    }
                });
                // console.log(charges);

                // table += "</table>";
                // Add the table to the page

                $("#responseContainer").append(table);

                // Add a click event listener to the "+" buttons
                $(document).on("click", ".toggle-rows", function () {
                    var row = $(this).closest("tr");
                    var trans_id = row.find("td:eq(5)").text();
                    var childRow = row.next(".child-row");

                    var icon = $(this).children("i");
                    if (icon.hasClass("fa-plus")) {
                        icon.removeClass("fa-plus");
                        icon.addClass("fa-minus");
                    } else {
                        icon.removeClass("fa-minus");
                        icon.addClass("fa-plus");
                    }
                    //i want to check this change in the code 
                    // Toggle the visibility of the child row
                    childRow.toggle();
                    for (var i = 0; i < partnerTransactions.length; i++) {
                        // If the trans_id matches the id of the current transaction
                        if (trans_id === partnerTransactions[i].reference) {
                            childRow
                                .find("#name")
                                .text(partnerTransactions[i].alternateFullName);
                            childRow.find("#payment").text("Withdraw to");
                            childRow
                                .find("#email")
                                .text(partnerTransactions[i].emailAddress);
                            childRow
                                .find("#transaction")
                                .text(partnerTransactions[i].id);
                            childRow.find("#status").text("Completed");
                            childRow
                                .find("#date")
                                .text(partnerTransactions[i].updatedDate);
                            childRow.find("#paypal").text("$0.00");
                            childRow
                                .find("#amount")
                                .text("$" + partnerTransactions[i].amount);

                            break;
                        }
                    }
                });
            }
        },
    });
});

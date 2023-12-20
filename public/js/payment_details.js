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
                var table = "<table>";
                
                table +=
                    "<tr><th></th><th>Sr.No</th><th>Name</th><th>Payment</th><th>Email</th><th>Transaction Id</th><th>Status</th><th>Date</th><th>PayPal Fee</th><th>Amount</th></tr>";
                var srNo = data.from;
                // $("th").css("color", "blue");
                var transaction_details = data.transaction_details;

                // console.log(transaction_details);

                var transactions = []; // Array to store all transactions
                var srNo = 1;
                var partnerTransactions =[];
                var charges = [];
                var value;
                var positive;
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
                        reference:reference_id,

                    };
                    if (alternate_full_name != "Partner") {

                        var fees = transaction_info.fee_amount;
                        $.each(fees,function(){
                            value = fees.value;
                             positive = Math.abs(value);
                            console.log(positive);
                        })
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
                            

                            charges.push(currentTransaction)

                            // console.log(partnerTransactions);
                            // Only add the row to the table if alternate_full_name is not 'Partner'
                    if (alternate_full_name !== "Partner") {
                        table += "<tr>";
                        table +=
                            "<td><button class='toggle-rows'>+</button></td>"; 
                        table += "<td>" + srNo + ".</td>";
                        table +=
                            "<td class='alternate_full_name'>" +
                            alternate_full_name +
                            "</td>";
                        table += "<td>" + paymentType + "</td>";
                        table += "<td>" + email_address + "</td>";
                        table += "<td>" + transaction_id + "</td>";
                        // table += "<td>" + account_id + "</td>";
                        table += "<td>" + "Completed" + "</td>";
                        table += "<td>" + correct + "</td>";
                        table += "<td> - $" + positive + "</td>";
                        table += "<td> $" + positiveNumber + "</td>";
                        table += "</tr>";
                        table +=
                            "<tr class='child-row' style='display: none;'>";
                        table +=
                            "<td colspan='8'>Child row content goes here</td>";
                            table +=
                            "<td class='alternate_full_name'>" +
                            alternate_full_name +
                            "</td>";
                            table += "</tr>";
                        srNo++;
                    }
                    
                   
                });
                console.log(charges);

                table += "</table>";
                // Add the table to the page 
                var currentToggle = null;
                $("#responseContainer").append(table);

                // Add a click event listener to the "+" buttons
                $(".toggle-rows").click(function () {
                    var row = $(this).closest("tr");
                    var trans_id = row.find('td:eq(5)').text();
                    var nextRow = row.next(".child-row");
                    if (currentToggle && currentToggle != nextRow) {
                        currentToggle.hide();
                    }
                
                    // Show/hide the clicked toggle
                    nextRow.toggle();
                
                    // Update the current toggle
                    currentToggle = nextRow.is(":visible") ? nextRow : null;
                    // console.log(trans_id);
                    for (var i = 0; i < partnerTransactions.length; i++) {
                        // If the trans_id matches the id of the current transaction
                        if (trans_id === partnerTransactions[i].reference) {
                            console.log(partnerTransactions[i]);
                
                            // Get the child row
                            var childRow = $(this).closest("tr").next(".child-row");
                
                            // Create the HTML for the child row content
                            var childRowContent ;
                            childRowContent += "<td>" + "" +" </td>";
                            childRowContent += "<td>" + "" +" </td>";
                            childRowContent += "<td>" + partnerTransactions[i].alternateFullName +" </td>";
                            childRowContent +="<td>" + "Withdraw to" + "</td>";
                            childRowContent += "<td>" + partnerTransactions[i].emailAddress + "</td>";
                            childRowContent += "<td>" + partnerTransactions[i].id + "</td>";
                            childRowContent += "<td>" + "Completed" + "</td>";
                            childRowContent += "<td>" + partnerTransactions[i].updatedDate;
                            childRowContent += "<td>" + "$0.00" +"</td>";
                            childRowContent += "<td>$" + partnerTransactions[i].amount + "</td>";
                            
                
                            // Set the child row content
                            childRow.html(childRowContent);
                
                            break; // Exit the loop
                        }
                    }
                });
            }
            // $("#responseContainer").html(table);
        },
    });
});

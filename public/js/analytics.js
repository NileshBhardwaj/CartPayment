setTimeout(function () {
    document.getElementById("loading").classList.add("none");
}, 3000);

$(document).ready(function () {
    $.ajax({
        url: "/analytics_data",
        type: "GET",
        success: function (data) {
            // console.log(data);
            if (data) {
                var srNo = data.from;

                var transaction_details = data.transaction_details;

                // console.log(transaction_details);

                var transactions = []; // Array to store all transactions
                var srNo = 1;
                var counts;
                var dateOccurrences = {};

                var dat = [];
                var occurrence = [];
                $.each(transaction_details, function (index, transaction) {
                    var transaction_info = transaction.transaction_info;
                    var payer_info = transaction.payer_info;
                    // console.log(payer_info);
                    var transaction_id = transaction_info.transaction_id;
                    var transaction_status =
                        transaction_info.transaction_status;
                    var transaction_updated_date =
                        transaction_info.transaction_updated_date;

                    let date = new Date(transaction_updated_date);

                    // Extract the year, month, and day
                    let year = date.getFullYear();
                    let month = date.getMonth() + 1; // getMonth() is zero-based
                    let day = date.getDate();

                    // Format the date in 'YYYY-MM-DD' format
                    var formattedDate = year + "-" + month + "-" + day;

                    // Find the index of the date in the dates array
                    var index = dat.indexOf(formattedDate);

                    // If the date is already in the array, increment its count in the occurrences array
                    if (index !== -1) {
                        occurrence[index]++;
                    }
                    // Otherwise, add the date to the dates array and add a count of 1 to the occurrences array
                    else {
                        dat.push(formattedDate);
                        occurrence.push(1);
                    }
                    // console.log(dat);
                    // console.log(occurrence);

                    counts = new Array(31).fill(0);

                    // Your dates and their occurrences
                    let dates = dat;
                    let occurrences = occurrence;

                    for (let i = 0; i < dates.length; i++) {
                        // Parse the date
                        let date = new Date(dates[i]);

                        // console.log(date);

                        // Get the day of the month (getDate() returns the day of the month from 1-31)
                        let day = date.getDate();

                        // Increment the count at the index corresponding to the day of the month

                        counts[day - 1] = occurrences[i];
                    }

                    // console.log(counts);

                    var transaction_amount =
                        transaction_info.transaction_amount;
                    var amount = transaction_amount.value;
                    var number = amount;
                    var positiveNumber = Math.abs(number);

                    var account_id = payer_info.account_id;
                    var email_address = payer_info.email_address;
                    var alternate_full_name =
                        payer_info.payer_name.alternate_full_name;

                    var currentTransaction = {
                        id: transaction_id,
                        status: transaction_status,
                        updatedDate: transaction_updated_date,
                        amount: positiveNumber,
                        accountId: account_id,
                        emailAddress: email_address,
                        alternateFullName: alternate_full_name,
                    };

                    transactions.push(currentTransaction);
                });
            }
            // $("#responseContainer").html(table);

            var date = new Date();
            var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);

            var correct = firstDay.toISOString();

            var fd = correct.toString();

            var maxDate = new Date("2023-12-12");
            var currentDate = new Date();
            var currentmonth = new Date();
            currentDate.setDate(currentDate.getDate() - 1);
            currentmonth.setMonth(currentmonth.getMonth() - 1);

            // console.log((currentmonth));
            // console.log((currentDate));

            let startDate = currentmonth;

            let endDate = currentDate;
            // console.log(endDate);

            let dates = [];

            for (
                let dt = startDate;
                dt <= endDate;
                dt.setDate(dt.getDate() + 1)
            ) {
                let formattedDate = dt.toISOString().split("T")[0];
                dates.push(formattedDate);
            }

            // console.log(dates);
            // var data =[
            //     0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            //     0, 0, 0, 0, 6, 0, 0, 34, 52, 8, 0, 0, 0, 0,
            // ];

            var ctx = document.getElementById("myChart").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: dates,
                    datasets: [
                        {
                            label: "My Dataset",
                            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 0, 0, 34, 52, 8, 0, 0, 0, 0, 0, 0, 0, 0],
                            borderColor: "rgba(75, 192, 192, 1)",
                            borderWidth: 4,
                            tension: 0.4,
                        },
                    ],
                },
                options: {
                    plugins: {
                        legend: false, // Hide legend
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false,
                            },
                        },
                        y: {
                            grid: {
                                display: false,
                            },
                        },
                    },
                },
            });
        },
    });
    $(function () {
        var sd = new Date(),
            ed = new Date();

        $("#startDate")
            .datepicker({
                pickTime: false,
                format: "YYYY/MM/DD",
                defaultDate: sd,
                maxDate: ed,
            })
            .keydown(function (e) {
                e.preventDefault();
            });

        $("#endDate")
            .datepicker({
                pickTime: false,
                format: "YYYY/MM/DD",
                defaultDate: ed,
                maxDate: ed,
            })
            .keydown(function (e) {
                e.preventDefault();
            });

        var start_date;
        $("#startDate").change(function () {
            var st = $(this).val();
            start_date = moment(st, "MM/DD/YYYY").format(
                "YYYY-MM-DDTHH:mm:ss.SSS[Z]"
            );
            // console.log(start_date);
        });

        var end_date;
        $("#endDate").change(function () {
            var item = $(this).val();
            end_date = moment(item, "MM/DD/YYYY").format(
                "YYYY-MM-DDTHH:mm:ss.SSS[Z]"
            );
            // console.log(end_date);
        });

        $("#apply").on("click", function () {
            var date1 = new Date(start_date);
            var date2 = new Date(end_date);

            var differenceInTime = date2.getTime() - date1.getTime();

            // To calculate the difference in days, divide the difference in time by the number of milliseconds in one day (24*60*60*1000)
            var differenceInDays = differenceInTime / (1000 * 3600 * 24);

            console.log(differenceInDays);
            var check1 = $("#startDate").val();
            var check2 = $("#endDate").val();

            if (check1 == "") {
                $("#chartjs").empty();
                $("#chartjs").append(
                    '<div class="alert alert-danger" id="error" role="alert">Please set the start date !</div>'
                );
                return false;
            } else {
                $("#start_error").remove();
            }
            if (check2 == "") {
                $("#chartjs").empty();
                $("#chartjs").append(
                    '<div class="alert alert-danger" id="error" role="alert">Please set the end date !</div>'
                );
                return false;
            } else {
                $("#end_error").remove();
            }
            console.log(check1);

            if (differenceInDays < 0) {
                console.log("error");
                $("#chartjs").empty();
                $("#chartjs").append(
                    '<div class="alert alert-danger" id="error" role="alert">Invalid request: The start date cannot be later than the end date.</div>'
                );
                return false;
            }
            if (start_date == end_date) {
                console.log("error");
                $("#chartjs").empty();
                $("#chartjs").append(
                    '<div class="alert alert-danger" id="error" role="alert">Please Select a range of dates!</div>'
                );
                return false;
            }

            if (start_date && end_date && differenceInDays <= 30) {
                $("#myChart").remove();
                // $("#Chart").remove();

                // $("#chart").append('<canvas id="myChart" width="400" height="200"></canvas>');
                $.ajax({
                    url: "/analytics_data",
                    type: "GET",
                    data: { start_date: start_date, end_date: end_date },
                    success: function (data) {
                        // console.log(data);
                        // $("#chart").empty();

                        // if(data.details[0].issue == "Date range is greater than 31 days"){

                        //     $("#chart").append('<div class="alert alert-danger" id="error" role="alert">Invalid request: The maximum allowed duration is 31 days.</div>');
                        //     return false;
                        // }else if(data.details[0].field == 'end_date'){
                        //     console.log("jhvscjvc");
                        //     $("#chart").append('<div class="alert alert-danger" id="error" role="alert">Invalid request: The start date cannot be later than the end date.</div>');
                        //     return false;

                        // }
                        if (data) {
                            $("#error").remove();
                            $("#chartjs").append(
                                '<canvas id="myChart"></canvas>'
                            );
                            var srNo = data.from;

                            var transaction_details = data.transaction_details;

                            // console.log(transaction_details);

                            var transactions = []; // Array to store all transactions
                            var srNo = 1;
                            var counts;
                            var dateOccurrences = {};

                            var dat = [];
                            var occurrence = [];

                            var date1 = new Date(start_date);
                            var date2 = new Date(end_date);

                            var differenceInTime =
                                date2.getTime() - date1.getTime();

                            // To calculate the difference in days, divide the difference in time by the number of milliseconds in one day (24*60*60*1000)
                            var differenceInDays =
                                differenceInTime / (1000 * 3600 * 24);

                            // console.log(differenceInDays);
                            var counts = new Array(
                                Math.ceil(differenceInDays)
                            ).fill(0);
                            $.each(
                                transaction_details,
                                function (index, transaction) {
                                    var transaction_info =
                                        transaction.transaction_info;
                                    var payer_info = transaction.payer_info;
                                    // console.log(payer_info);
                                    var transaction_id =
                                        transaction_info.transaction_id;
                                    var transaction_status =
                                        transaction_info.transaction_status;
                                    var transaction_updated_date =
                                        transaction_info.transaction_updated_date;

                                    let date = new Date(
                                        transaction_updated_date
                                    );

                                    // Format the date in 'YYYY-MM-DD' format
                                    var formattedDate = date
                                        .toISOString()
                                        .split("T")[0];

                                    // Find the index of the date in the dates array
                                    var index = dat.indexOf(formattedDate);

                                    // If the date is already in the array, increment its count in the occurrences array
                                    if (index !== -1) {
                                        occurrence[index]++;
                                    }
                                    // Otherwise, add the date to the dates array and add a count of 1 to the occurrences array
                                    else {
                                        dat.push(formattedDate);
                                        occurrence.push(1);
                                    }

                                    var transaction_amount =
                                        transaction_info.transaction_amount;
                                    var amount = transaction_amount.value;
                                    var number = amount;
                                    var positiveNumber = Math.abs(number);

                                    var account_id = payer_info.account_id;
                                    var email_address =
                                        payer_info.email_address;
                                    var alternate_full_name =
                                        payer_info.payer_name
                                            .alternate_full_name;

                                    var currentTransaction = {
                                        id: transaction_id,
                                        status: transaction_status,
                                        updatedDate: transaction_updated_date,
                                        amount: positiveNumber,
                                        accountId: account_id,
                                        emailAddress: email_address,
                                        alternateFullName: alternate_full_name,
                                    };

                                    transactions.push(currentTransaction);
                                }
                            );
                            let dates = dat;
                            let occurrences = occurrence;

                            for (let i = 0; i < dates.length; i++) {
                                // Parse the date
                                let date = new Date(dates[i]);

                                // Calculate the difference in days between the transaction date and the start date
                                let diffInDays = Math.floor(
                                    (date - new Date(start_date)) /
                                        (1000 * 3600 * 24)
                                );

                                // Increment the count at the index corresponding to the difference in days
                                counts[diffInDays] = occurrences[i];
                            }

                            // console.log(counts);

                            // Now, the transactions array contains all the transaction data
                            // console.log(transactions);
                        }

                        var date = new Date();
                        var firstDay = new Date(
                            date.getFullYear(),
                            date.getMonth(),
                            1
                        );

                        var correct = firstDay.toISOString();

                        var fd = correct.toString();

                        // console.log();

                        var startDate = new Date(start_date);
                        var endDate = new Date(end_date);

                        let dates = [];

                        for (
                            let dt = new Date(startDate);
                            dt <= endDate;
                            dt.setDate(dt.getDate() + 1)
                        ) {
                            let formattedDate = dt.toISOString().split("T")[0];
                            dates.push(formattedDate);
                        }

                        console.log(counts);

                        var ctx = document
                            .getElementById("myChart")
                            .getContext("2d");

                        var ctx = document
                            .getElementById("myChart")
                            .getContext("2d");
                        var myChart = new Chart(ctx, {
                            type: "line",
                            data: {
                                labels: dates,
                                datasets: [
                                    {
                                        label: "My Dataset",
                                        data: counts,
                                        borderColor: "rgba(75, 192, 192, 1)",
                                        borderWidth: 4,
                                        tension: 0.4,
                                    },
                                ],
                            },
                            options: {
                                plugins: {
                                    legend: false, // Hide legend
                                },
                                scales: {
                                    x: {
                                        grid: {
                                            display: false,
                                        },
                                    },
                                    y: {
                                        grid: {
                                            display: false,
                                        },
                                    },
                                },
                            },
                        });
                    },
                });
            } else {
                $("#chartjs").empty();
                $("#chartjs").append(
                    '<div class="alert alert-danger" id="error" role="alert">Invalid request: The maximum allowed duration is 30 days.</div>'
                );
            }
        });
    });
});

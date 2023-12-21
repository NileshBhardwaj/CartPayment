<x-app-layout>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="{{ asset('css/payment.css') }}" rel="stylesheet">
        <link href="{{ asset('css/product.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <style>
            .icon-minus:before {
                content: "\f068";
            }

            .icon-plus:before {
                content: "\f067";
            }
        </style>
    </head>

    <body>
        <div class="spinner-wrapper" id="loading">
            <div class="spinner"></div>
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>

        <div id="header">
            <h1>Payments Details</h1>
        </div>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{-- <div id="responseContainer"> --}}
                <table id="responseContainer">
                    <tr>
                        <th></th>
                        <th>Sr.No</th>
                        <th>Name</th>
                        <th>Payment</th>
                        <th>Email</th>
                        <th>Transaction Id</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>PayPal Fee</th>
                        <th>Amount</th>
                    </tr>
                    <tr class="bho">
                        <td><button class='toggle-rows'><i class="fa-solid fa-plus"
                                    style="color: #000000;"></i></button></td>
                        <td class="srno"></td>
                        <td class="name"></td>
                        <td class="payment"></td>
                        <td class="email"></td>
                        <td class="transaction"></td>
                        <td class="status"></td>
                        <td class="date"></td>
                        <td class="paypal"></td>
                        <td class="amount"></td>
                    </tr>
                    <tr class='child-row' style='display: none;'>
                        <td></td>
                        <td></td>

                        <td id="name"></td>
                        <td id="payment"></td>
                        <td id="email"></td>
                        <td id="transaction"></td>
                        <td id="status"></td>
                        <td id="date"></td>
                        <td id="paypal"></td>
                        <td id="amount"></td>

                    </tr>
                </table>
            </div>

        </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('js/payment_details.js') }}"></script>

    </html>
</x-app-layout>

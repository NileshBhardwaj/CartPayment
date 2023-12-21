<x-app-layout>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
            rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="{{ asset('css/payment.css') }}" rel="stylesheet">
        <link href="{{ asset('css/product.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <style>
            #chartjs {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 70vh;
                background-color: #f5f5f5;
                border: 2px black;
                width: 1200px;
                margin-top: 54px;
            }

            canvas {
                width: 600px;
                height: 400px;
            }

            #chart {
                display: flex;
                flex-direction: row;
                justify-content: center;
            }

            #box {
                flex-direction: row;
                justify-content: space-evenly;
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
        
        {{-- <div id="header"><h1>Payments Details</h1></div> --}}

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div id="box">
                    <div id="page">
                        <div class="container1">
                            <div class="box box-full">
                                <div>
                                    <h1 style="margin-right: 500px;font-size: 22px; color: white;">Analytics of received Payments
                                    </h1>
                                </div>
                                <div id="start"><label for="startDate">Start Date</label>
                                    <input id="startDate" name="startDate" type="text" class="form-control"
                                        placeholder="MM/DD/YYYY" />
                                        <span id="start_error" style="color:red"></span>
                                </div>

                                <div id="end"><label for="endDate">End Date</label>
                                    <input id="endDate" name="endDate" type="text" class="form-control"
                                        placeholder="MM/DD/YYYY" />
                                        <span id="end_error"style="color:red"></span>
                                    <button id="apply" class="btn btn-success"><span>Apply</span></button>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <div id="chart">

                    <div id="chartjs" style="border:2px solid;     border-radius: 5px;">
                        <canvas id="myChart"></canvas>
                    </div>

                </div>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
        integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="{{ asset('js/analytics.js') }}"></script>

    </html>
</x-app-layout>
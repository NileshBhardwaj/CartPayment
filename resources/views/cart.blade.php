<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    </head>

    <body>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100" style="margin-top: 60px;height: 600px;">
                <div class="empty"><span id="empty"></span></div>
                <div>
                    <h1 id="cart"></h1>
                </div>
                <div id="main">
                    <div id="responseContainer"
                        style="display: flex;
                    flex-direction: row;
                    justify-content: center;
                ">
                    </div>
                    <div id="checkout">

                        <div class="col-lg-4 offset-lg-4">
                            <div class="checkout">
                                <ul
                                    style="
                            margin-top: 82px;
                            border-radius: 6px;
                        ">
                                    <li class="subtotal">subtotal
                                        <span id="subtotal">$</span>
                                    </li>
                                    <li class="cart-total">Total
                                        <span id="grand"></span>
                                    </li>
                                </ul>
                                <button type="button" id="checkout" class="btn btn-primary"
                                    style="
                            width: 595px;
                            margin-bottom: 51px;
                            font-size: 20px;
                            background-color: cornflowerblue;
                            ">CheckOut</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div id="empty_cart">
                    <div class="container-fluid  mt-100">
                        <div class="row">

                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-header"
                                        style="
                                            display: flex;
                                            flex-direction: row;
                                            justify-content: center;
                                            font-size: 28px;
                                        ">
                                        <h5 style="
                                                display: flex;
                                            ">Your Cart is empty !</h5>
                                    </div>
                                    <div class="card-body cart">
                                        <div class="col-sm-12 empty-cart-cls text-center">
                                            <img src="{{ URL::asset('/images/cart.avif') }}"" width="130"
                                                height="130" class="img-fluid mb-4 mr-3" style="margin-left: 46%;">
                                            <h3><strong>Your Cart is Empty</strong></h3>
                                            <h4>Add something to make me happy :)</h4>
                                            <a href="{{ route('products') }}" class="btn btn-primary cart-btn-transform m-3"
                                                data-abc="true">continue shopping</a>


                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="{{ asset('js/cart.js') }}"></script>

    </html>


</x-app-layout>

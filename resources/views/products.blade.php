<x-app-layout>
    <!doctype html>
    <html>

    <head>
        <title>Product</title>
        <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link href="{{ asset('css/product.css') }}" rel="stylesheet">
        <style>
        
        </style>
    </head>

    <body>
        <input id="user" type="hidden" name="" value="{{ Auth::user()->id }}">
        <!-- Preloader -->
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
        <br>
        <br>
        <br>
        <br>
        <div class="py-12" id="demo"
            style="
                 background-color: #ffffff57;
                 padding-top: 1rem;
                 padding-bottom: 1rem;
                ">
            <div id="msg" style="display: none">
                <div class="success-msg">
                    <i class="fa fa-check"></i>
                  Product Added To cart !
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid-container">
                        <div class="grid-x grid-margin-x small-up-1 medium-up-2 large-up-4 grid-x-wrapper">
                            @foreach ($product as $products)
                                <div class="product-box column">
                                    <a href="#" class="product-item">
                                        <div class="product-item-image">
                                            <img src="https://modernaweb.net/__data/img/products/apple-watch.png"
                                                alt="Stadium Full Exterior">
                                            <div class="product-item-image-hover">
                                            </div>
                                        </div>



                                        <div class="product-item-content">
                                            <div class="product-item-category">
                                                Base Item
                                            </div>
                                            <div class="product-item-title">
                                                {{ $products->name }}

                                            </div>
                                            <div class="product-item-price"><i class="fa-solid fa-dollar-sign"></i>
                                                {{ $products->price }}
                                            </div>
                                            <div class="button-pill">
                                                <span>Add To Cart</span>
                                            </div>
                                            <div class="">
                                                <span class="id" style="display: none">{{ $products->id }}</span>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <div class="grid-container">
                        <div class="grid-x grid-margin-x small-up-1 medium-up-1 large-up-1 grid-x-wrapper">
                            <div class="product-box column" style="text-align: center;  margin: 50px 0 50px;">
                                <a href="http://modernaweb.net" target="_blank"
                                    style="color: #0719a3; font-weight: 700; text-transform: uppercase;">w w w . m o d e
                                    r n a w
                                    e b . n e t</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </body>
<script src="{{ asset('js/product.js') }}"></script>
   

    </html>
</x-app-layout>

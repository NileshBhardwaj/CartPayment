<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* default css start */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
            font-weight: 400;
            line-height: 20px;
        }

        .container {
            width: 100%;
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .header-area {
            background: linear-gradient(rgba(0, 0, 0, .3), rgba(0, 0, 0, .5)),

                background-position: center center;
            background-size: cover;
        }

        /* default css end */


        /* navbar regular css start */
        .navbar-area {
            background: rgba(0, 0, 0, .6);
            border-bottom: 1px solid #000;
        }

        .site-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        a.site-logo {
            font-size: 26px;
            font-weight: 800;
            text-transform: uppercase;
            color: #fff;
            text-decoration: none;
        }

        .site-navbar ul {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
        }

        .site-navbar ul li a {
            color: #fff;
            padding: 20px;
            display: block;
            text-decoration: none;
            text-transform: uppercase;
        }

        .site-navbar ul li a:hover {
            background: rgba(255, 255, 255, .1);
        }

        /* navbar regular css end */


        /* nav-toggler css start */
        .nav-toggler {
            border: 3px solid #fff;
            padding: 5px;
            background-color: transparent;
            cursor: pointer;
            height: 39px;
            display: none;
        }

        .nav-toggler span,
        .nav-toggler span:before,
        .nav-toggler span:after {
            width: 28px;
            height: 3px;
            background-color: #fff;
            display: block;
            transition: .3s;
        }

        .nav-toggler span:before {
            content: '';
            transform: translateY(-9px);
        }

        .nav-toggler span:after {
            content: '';
            transform: translateY(6px);
        }

        .nav-toggler.toggler-open span {
            background-color: transparent;
        }

        .nav-toggler.toggler-open span:before {
            transform: translateY(0px) rotate(45deg);
        }

        .nav-toggler.toggler-open span:after {
            transform: translateY(-3px) rotate(-45deg);
        }

        /* nav-toggler css start */


        /* intro-area css start */
        .intro-area {
            height: calc(100vh - 61px);
            display: flex;
            align-items: center;
            text-align: center;
            color: #fff;
        }

        .intro-area h2 {
            font-size: 50px;
            font-weight: 300;
            line-height: 50px;
            margin-bottom: 25px;
        }

        .intro-area p {
            font-size: 18px;
        }

        /* intro-area css end */


        /* mobile breakpoint start */
        @media screen and (max-width: 767px) {
            .container {
                max-width: 720px;
            }

            /* navbar css for mobile start */
            .nav-toggler {
                display: block;
            }

            .site-navbar {
                min-height: 60px;
            }

            .site-navbar ul {
                position: absolute;
                width: 100%;
                height: calc(100vh - 60px);
                left: 0;
                top: 60px;
                flex-direction: column;
                align-items: center;
                border-top: 1px solid #444;
                background-color: rgba(0, 0, 0, .75);
                max-height: 0;
                overflow: hidden;
                transition: .3s;
            }

            .site-navbar ul li {
                width: 100%;
                text-align: center;
            }

            .site-navbar ul li a {
                padding: 25px;
            }

            .site-navbar ul li a:hover {
                background-color: rgba(255, 255, 255, .1);
            }

            .site-navbar ul.open {
                max-height: 100vh;
                overflow: visible;
            }

            .intro-area h2 {
                font-size: 36px;
                margin-bottom: 15px;
            }

            #image {
                max-width: 40%;
                height: auto;
            }

            /* navbar css for mobile end */
        }

        /* mobile breakpoint end */
    </style>
    <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
        <!-- Primary Navigation Menu -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <header class="header-area">
            <!-- site-navbar start -->
            <div class="navbar-area">
                <div class="container">
                    <nav class="site-navbar">
                        <!-- site logo -->
                        <a href="{{ route('dashboard') }}" class="site-logo"><img id="image"
                                src="{{ URL::asset('/images/1.png') }}" style="max-width: 40%;"></a>

                        <!-- site menu/nav -->
                        <ul>
                            <li><a href="{{ route('dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i>home</a></li>
                            <li><a href="{{ route('products') }}"><i class="fab fa-product-hunt"></i>Product</a></li>
                            @role('admin')
                            <li><a href="{{ route('payment') }}"><i class="fa-solid fa-user"></i>DashBoard</a></li>
                            <li><a href="{{ route('analytics') }}"><i class="far fa-analytics"></i>Analytics</a></li>
                            @endrole


                            <li><a href="{{ route('profile.edit') }}"><i class="fa-solid fa-user"></i>Profile</a></li>
                            <li><a href="{{ route('cart') }}"><i class="fa-solid fa-cart-shopping"></i>Cart</a></li>
                            <li style="margin-top: 11px;">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                  this.closest('form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>Log Out
                                    </x-dropdown-link>
                                </form>
                            </li>

                        </ul>

                        <!-- nav-toggler for mobile version only -->
                        <button class="nav-toggler">
                            <span></span>
                        </button>
                    </nav>
                </div>

        </header>
    </nav>
</head>

<body>

</body>
<script>
    // define all UI variable
    const navToggler = document.querySelector('.nav-toggler');
    const navMenu = document.querySelector('.site-navbar ul');
    const navLinks = document.querySelectorAll('.site-navbar a');

    // load all event listners
    allEventListners();

    // functions of all event listners
    function allEventListners() {
        // toggler icon click event
        navToggler.addEventListener('click', togglerClick);
        // nav links click event
        navLinks.forEach(elem => elem.addEventListener('click', navLinkClick));
    }

    // togglerClick function
    function togglerClick() {
        navToggler.classList.toggle('toggler-open');
        navMenu.classList.toggle('open');
    }

    // navLinkClick function
    function navLinkClick() {
        if (navMenu.classList.contains('open')) {
            navToggler.click();
        }
    }
    // $('#admin').on('click',function(){


    //       $.ajax({
    //          type:'POST',
    //          url:'/ajax',
    //          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //          success:function(data){
    //             $("#msg").html(data.msg);
    //          }
    //       });


    // });
   
</script>

</html>

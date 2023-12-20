@role('admin')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        div#welcome {
            font-size: 33px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            margin-top: 104px;
        }

        /* .container {
                display: flex;
            }
            .div1 {
                width: 200px;
                height: 100vh;
                background-color: rgb(227, 225, 225);
            }
            .div2 {
                flex-grow: 1;
                height: 100vh;
                background-color: rgb(189, 193, 189);
                margin-left: 20px;
                margin-right: 20px;
            } */

        #table-container {
            width: 40%;
            max-height: 400px;
            background-color: rgb(243 243 243 / 41%);
            /* border: 4px solid black; */
            border-radius: 6px;
            background-color: white;
            margin-top: 66px;
            margin-bottom: 23px;
        }

        div#main-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            height: 382px;
            background-color: aliceblue;
        }

        div#header {
            display: flex;
            flex-direction: row;
            justify-content: center;
            background-color: rgb(243 243 243 / 41%);
            margin-bottom: 91px;
        }

        td {
            font-size: 20px;
        }

        th {
            font-size: 20px;
        }

        body {
            margin-top: 20px;
            font-family: Montserrat, sans-serif;
        }

        h4 {
            text-transform: uppercase;
        }

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            height: 76%;
            width: 85%;
            margin-top: 15px;
            border-radius: 9px;
        }

        .panel-footer {
            padding: 5px;
            height: 40px;
        }

        .col-lg-5 {
            flex: 0 0 auto;
            width: 50.66666667%;
            margin-left: 110px;
        }

        #name {
            margin-top: 51px;
            font-size: 24px;
        }
        .banner-text{
    font-size: 31px;
    margin-top: 50px;
    display: flex;
    flex-direction: row;
    justify-content: center;
    margin-bottom: 10px;
}
    </style>

    <x-app-layout>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <div id="banner">
                <div class="banner-text">Welcome Admin</div>
            
        </div>
        <div id="list">
            <div class="banner-text">All Active Users List</div>
        
    </div>
        @foreach ($users as $user)
            <div id="main-container">
                <div id="table-container">
                    <div class="container">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title"></h3>
                            </div>
                            <!-- Panel-Body -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12 col-md-3 col-lg-3" align="center">
                                        <div id="qrcode0" style="margin-top: 58px;">
                                            {!! QrCode::size(100)->generate('http://localhost:8000/qr_content?token=' . $user->token) !!}
                                        </div>
                                    </div><!-- /.col-xs-12 -->
                                    <!-- User Information -->
                                    <div class="col-xs-12 col-md-5 col-lg-5">
                                        <h3 id="name">{{ $user->name }}</h3>

                                        <div class="table-responsive">
                                            <table class="table table-responsive table-user-information">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <strong>
                                                                <span class="glyphicon glyphicon-home"></span>
                                                            </strong>
                                                        </td>
                                                        <td class="text-primary">

                                                        </td>
                                                    </tr><!--/home -->
                                                    <tr>
                                                        <td>
                                                            <strong>
                                                                <span class="glyphicon glyphicon-envelope"></span>
                                                            </strong>
                                                        </td>
                                                        <td class="text-primary">
                                                            {{ $user->email }}
                                                        </td>
                                                    </tr><!--/email -->
                                                    <tr>
                                                        <td>
                                                            <strong>
                                                                <span class="glyphicon glyphicon-envelope"></span>
                                                            </strong>
                                                        </td>
                                                        <td class="text-primary">
                                                            {{ $user->address }}
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div> <!-- /.table-responsive -->
                                        <!-- Social Buttons -->
                                        <div class="button-group">
                                            <button class="btn">
                                                <a href="#" class="social-icon si-border si-github si-border-round">
                                                    <i class="fa fa-github"></i></a></button>
                                            <button class="btn"><a href="#"
                                                    class="social-icon si-border si-g-plus si-border-round">
                                                    <i class="fa fa-google-plus"></i>
                                                </a></button>
                                            <button class="btn"><a href="#"
                                                    class="social-icon si-border si-linkedin si-border-round">
                                                    <i class="fa fa-linkedin"></i>
                                                </a></button>
                                            <button class="btn"><a href="#"
                                                    class="social-icon si-border si-facebook si-border-round">
                                                    <i class="fa fa-facebook"></i>
                                                </a></button>

                                        </div><!-- /.button-group -->

                                    </div><!-- /.col-xs-12 -->
                                </div><!-- /.row -->
                            </div><!-- /.panel-body -->
                            <!-- Panel-Footer -->
                            <div class="panel-footer">
                                <h5 style="
                            margin-top: 11px;
                        "
                                    class="pull-left">&copy; Practice makes perfect</h5>
                                <div class="pull-right">
                                    <a href="#" data-original-title="Follow" data-toggle="tooltip" type="button"
                                        class="btn btn-sm btn-success"><i class="glyphicon glyphicon-heart"></i></a>
                                    <a data-original-title="Message" data-toggle="tooltip" type="button"
                                        class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-pencil"></i></a>
                                </div>
                            </div>
                        </div><!-- /.panel panel-info -->
                    </div><!-- /.container -->
                </div>
            </div>
        @endforeach

        </body>
        
        <script>
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
        <script src="{{ asset('js/admin.js') }}"></script>
    </x-app-layout>
@endrole

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR Code Content</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        #table-container {
            width: 40%;
            max-height: 400px;
            background-color: rgb(243 243 243 / 41%);
            /* border: 4px solid black; */
            border-radius: 6px;
        }

        div#main-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            /* height: 382px; */
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
            width: 41.66666667%;
            margin-left: 110px;
        }
    </style>
</head>

<body>
    <div id="header">
        <h1>QR Code Results</h1>
    </div>
    <div id="main-container">
        <div id="table-container">
            <div class="container">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">User Profile</h3>
                    </div>
                    <!-- Panel-Body -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-3 col-lg-3" align="center">
                                <img src="https://picsum.photos/seed/picsum/200/300">
                            </div><!-- /.col-xs-12 -->
                            <!-- User Information -->
                            <div class="col-xs-12 col-md-5 col-lg-5">
                                <h3>{{ $users->name }}</h3>

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
                                                    {{ $users->email }}
                                                </td>
                                            </tr><!--/email -->

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
                        <h5 class="pull-left">&copy; Practice makes perfect</h5>
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

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

</html>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Departement GIM - Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('css/boostrap3.css') !!}" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="{!! asset('css/sb-admin-2.css') !!}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{!! asset('css/font-awesome.css') !!}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row" style="position: relative; top: 60px;">
            <div class="col-md-4 col-md-offset-4">
                            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Bonjour Admin PPP | Log in please</h3>
                    </div>

                    <div class="panel-body">
                        <form method="post" action="{!! action('Auth\AuthAdminPPPController@postLogin') !!}" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" value="" name="nom" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-danger btn-block">
                                  {{ csrf_field() }}
                            </fieldset>
                            <span class="col-md-12">
                           <strong style="color:#e20404">{{$errors->first('nom')}}</strong>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{!! asset('js/jquery.js') !!}"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="{!! asset('js/bootstrap.js') !!}"></script>

</body>

</html>

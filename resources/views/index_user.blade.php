<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gestinnaire Departement GIM</title>

    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('css/bootstrap.css') !!}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{!! asset('css/sb-admin-2.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/uniquify.css') !!}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{!! asset('css/font-awesome.css') !!}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="icon" href="{!! asset('img/favoicon.png') !!}" />
</head>

<body>

<div id="wrapper">

  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{URL::to('/')}}"><img  src="{!! asset('img/WizzCasterwhite.png') !!}" /></a>


      </div>

      <div class="navbar-default sidebar" role="navigation">
          <div class="sidebar-nav navbar-collapse">
            <div id="MainMenu">
  <div class="list-group panel">
    <a class="list-group-item" href="{{URL::to('/')}}" data-parent="#MainMenu"><i class="fa fa-home"></i>Accueil</a>
    <a class="list-group-item" href="{{URL::to('/user/profile/update')}}" data-parent="#MainMenu"><i class="fa fa-user"></i>  Modifier Profil</a>
  <a class="list-group-item" href="{{ route('user_module.index') }}" data-parent="#MainMenu"><i class="fa fa-calendar"></i>  Consulter Plannig</a>

    <a class="list-group-item" href="#demo6" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-file-code-o"></i>PPP<span class="caret">  </span> </a>
    <div class="collapse" id="demo6">
        <a class="list-group-item" href="{{URL::to('/user/ppp/list')}}"><i class="fa fa-list"></i> Liste des PPP</a>
      <a class="list-group-item" href="{{ URL::to('/user/ppp/choix') }}"><i class="fa fa-plus-square-o"></i>Choix PPP</a>
    </div>


    <a class="list-group-item" href="#demo7" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-users" aria-hidden="true"></i>Binomage <span class="caret">  </span> </a>
    <div class="collapse" id="demo7">
          <a class="list-group-item" href="{{URL::to('user/binome/choix')}}"><i class="fa fa-list"></i>Choix Binome/Trinome</a>
      <a class="list-group-item" href="{{URL::to('user/binome/list')}}"><i class="fa fa-plus-square-o"></i>Liste Binome/Trinome</a>
    </div>

  </div>
</div>
          </div>
          <!-- /.sidebar-collapse -->
      </div>
      <!-- /.navbar-static-side -->

      <ul class="nav navbar-nav navbar-right">
        <li><a class="white-color" href="{{ URL::to('auth/logout') }}">Logout</a></li>
      </ul>

  </nav>
  <div id="page-wrapper">

    @yield('content')
  </div>
  <footer class="footer">
    <p>© 2016 <a href="#" target="_blank">INSAT</a></p>
  </footer>
</div>
    <!-- jQuery -->
<script src="{!! asset('js/jquery.js') !!}"></script>


<!-- Bootstrap Core JavaScript -->
<script src="{!! asset('js/bootstrap.js') !!}"></script>
<!--<script src="{!! asset('js/main.js') !!}"></script> -->
<script src="https://code.jquery.com/jquery-1.11.3.min.js">  </script>
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js ">  </script>
</body>

</html>

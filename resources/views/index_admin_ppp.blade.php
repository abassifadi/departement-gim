<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Espace Adminstrateur des PPP</title>

    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('css/boostrap3.css') !!}" rel="stylesheet">

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
          <a class="navbar-brand" href="{{URL::to('/AdminPPP')}}"><img  src="{!! asset('img/WizzCasterwhite.png') !!}" /></a>


      </div>

      <div class="navbar-default sidebar" role="navigation">
          <div class="sidebar-nav navbar-collapse">
            <div id="MainMenu">
  <div class="list-group panel">
    <a class="list-group-item" href="{{URL::to('/AdminPPP')}}" data-parent="#MainMenu"><i class="fa fa-home"></i>Accueil</a>
    <a class="list-group-item" href="#demo6" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-file-code-o"></i>Critere Encadrant<span class="caret">  </span> </a>
    <div class="collapse" id="demo6">
        <a class="list-group-item" href="{{URL::to('/AdminPPP/Critere')}}"><i class="fa fa-list"></i>Liste des criteres</a>
        <a class="list-group-item" href="{{URL::to('/AdminPPP/Critere/Add')}}"><i class="fa fa-plus-square-o"></i>Ajouter des criteres</a>
    </div>

    <a class="list-group-item" href="#demo12" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-file-code-o"></i>Critere Examinateur<span class="caret">  </span> </a>
    <div class="collapse" id="demo12">
        <a class="list-group-item" href="{{URL::to('/AdminPPP/Critere/Examinateur')}}"><i class="fa fa-list"></i>Liste des criteres</a>
        <a class="list-group-item" href="{{URL::to('/AdminPPP/Critere/Examinateur/Add')}}"><i class="fa fa-plus-square-o"></i>Ajouter des criteres</a>
    </div>

    <a class="list-group-item" href="#demo7" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-user"></i>Etudiants<span class="caret">  </span> </a>
    <div class="collapse" id="demo7">
        <a class="list-group-item" href="{{URL::to('/AdminPPP/Etudiant/Add')}}"><i class="fa fa-list"></i>Ajouter Etudiants</a>
        <a class="list-group-item" href="/AdminPPP/Etudiant/List"><i class="fa fa-plus-square-o"></i>Liste des Etudiant</a>
    </div>

    <a class="list-group-item" href="#demo8" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-users"></i>Enseignant<span class="caret">  </span> </a>
    <div class="collapse" id="demo8">
        <a class="list-group-item" href="{{URL::to('/AdminPPP/Professeur/Add')}}"><i class="fa fa-list"></i>Ajouter Enseignant</a>
        <a class="list-group-item" href="{{URL::to('/AdminPPP/Professeur/List')}}"><i class="fa fa-plus-square-o"></i>Liste des Enseignants</a>
    </div>
       <a class="list-group-item" href="{{URL::to('/AdminPPP/ListeBinome/Rang')}}" data-parent="#MainMenu"><i class="fa fa-bar-chart" aria-hidden="true"></i> Liste De Binome Rangé</a>
       <a class="list-group-item" href="#demo88" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-file-code-o"></i>Modules<span class="caret">  </span> </a>
       <div class="collapse" id="demo88">
           <a class="list-group-item" href="{{ route('admin_module.create')}}"><i class="fa fa-list"></i>Ajouter Module</a>
         <a class="list-group-item" href="{{ route('admin_module.index')}}"><i class="fa fa-plus-square-o"></i>Liste Des Modules</a>
       </div>

  </div>
</div>
          </div>
          <!-- /.sidebar-collapse -->
      </div>
      <!-- /.navbar-static-side -->

      <ul class="nav navbar-nav navbar-right">
        <li><a class="white-color" href="{{ URL::to('/AdminPPP/logout') }}">Logout</a></li>
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

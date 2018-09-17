<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cariin App</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">


</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper" id="app">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>C</b>App</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Cariin</b>App</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{asset('images/avatar5.png')}}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{Auth::user()->name}}</p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">HEADER</li>
          <!-- Optionally, you can add icons to the links -->
          <li><a href="{{url('/cariin/user')}}"><i class="fa fa-users"></i> <span>User</span></a></li>
          <li><a href="{{url('/cariin/recipe')}}"><i class="fa fa-file"></i> <span>Recipe</span></a></li>

          @can('isAdmin')
          <li class="active"><a href="{{url('category')}}"><i class="fa fa-microchip"></i> <span>Category</span></a></li>
          @endcan

          @can('isAdmin')
          <li><a href="#"><i class="fa fa-users"></i> <span>Manage User</span></a></li>
          <li><a href="#"><i class="fa fa-gears"></i> <span>Settings</span></a></li>
          @endcan
          <li class="">

            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fa fa-power-off text-red"></i> <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>

        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


      <!-- Main content -->
      <section class="content container-fluid">
        @yield('content')

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="pull-right hidden-xs">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
    </footer>
  </div>


  <script src="{{asset('js/app.js')}}"></script>

  <script>
    $('#editUser').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget)
      var name = button.data('myname')
      var username = button.data('myusername')
      var email = button.data('myemail')
      var user_id = button.data('myuserid')
      var modal = $(this)

      modal.find('.modal-body #cariin_name').val(name);
      modal.find('.modal-body #cariin_email').val(email);
      modal.find('.modal-body #cariin_uname').val(username);
      modal.find('.modal-body #user_id').val(user_id);
    })

    $('#editRecipe').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget)
      var bahan = button.data('recipebahan')
      var recipe = button.data('recipe')
      var iduser = recipe.user.id
      var recipe_id = recipe.id
      var cara_masak = recipe.cara_masak
      var namarecipe = recipe.nama
      var modal = $(this)
      var name = recipe.user.name

      modal.find('.modal-body #select_user > option').each(function(){
        if($(this).text()==name)
          $(this).parent('select').val($(this).val())
      });
      modal.find('.modal-body #nama_recipe').val(namarecipe);
      modal.find('.modal-body #cara_masak').val(cara_masak);
      modal.find('.modal-body #recipe_id').val(recipe_id);
      modal.find('.modal-body #user_id').val(iduser);
      modal.find('.modal-body #bahan_0').val(bahan[0].nama_bahan);
      modal.find('.modal-body #bahan_1').val(bahan[1].nama_bahan);
      modal.find('.modal-body #bahan_2').val(bahan[2].nama_bahan);
      modal.find('.modal-body #bahan_3').val(bahan[3].nama_bahan);
      modal.find('.modal-body #bahan_4').val(bahan[4].nama_bahan);
    })


    $('#edit').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget)
      var title = button.data('mytitle')
      var description = button.data('mydescription')
      var cat_id = button.data('catid')
      var modal = $(this)

      modal.find('.modal-body #title').val(title);
      modal.find('.modal-body #des').val(description);
      modal.find('.modal-body #cat_id').val(cat_id);
    })


    $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget)

      var cat_id = button.data('catid')
      var modal = $(this)

      modal.find('.modal-body #cat_id').val(cat_id);
    })
  </script>

</body>

</html>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>DISKOMINFO SITUBONDO</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap-theme.min.css" integrity="sha384-jzngWsPS6op3fgRCDTESqrEJwRKck+CILhJVO5VvaAZCq8JYf8HsR/HPpBOOPZfR" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" integrity="sha384-vhJnz1OVIdLktyixHY4Uk3OHEwdQqPppqYR8+5mjsauETgLOcEynD9oPHhhz18Nw" crossorigin="anonymous">
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <!-- {{ config('app.name', 'Laravel') }} -->
                        DISKOMINFO SITUBONDO
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('admin.login') }}">Login</a></li>
                            <li><a href="{{ route('admin.register') }}">Register</a></li>

                        @else
                            <li><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>Project<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('post.AdminProject') }}">All Project</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('post.AdminCalendar') }}">Calendar</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>Notification<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('post.AdminNotification') }}">Task</a>
                                    </li>
                                    <li>
                                        <a href="">Laporan</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="{{ route('post.AdminMember') }}">User</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('post.AdminProfil') }}">Edit Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @include('layouts.partials._alerts')
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        $('#detail_user').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var name = button.data('name')
          var status = button.data('status')  
          var email = button.data('email') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #name').val(name);
          modal.find('.modal-body #status').val(status);
          modal.find('.modal-body #email').val(email);
        })
        $('#detail_task').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var judul_task = button.data('judul_task') 
          var user = button.data('user')
          var isi_task = button.data('isi_task')  
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #judul_task').val(judul_task);
          modal.find('.modal-body #user').val(user);
          modal.find('.modal-body #isi_task').val(isi_task);
        })
        $('#edit_profiladmin').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var name = button.data('name') 
          var email = button.data('email') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #name').val(name);
          modal.find('.modal-body #email').val(email);
        })
        $('#edit_project').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var title = button.data('title') 
          var content = button.data('content') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #title').val(title);
          modal.find('.modal-body #content').val(content);
        })
        $('#edit_task').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var judul_task = button.data('judul_task') 
          var status = button.data('status')
          var isi_task = button.data('isi_task')
          var due_date = button.data('due_date')  
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #judul_task').val(judul_task);
          modal.find('.modal-body #status').val(status);
          modal.find('.modal-body #isi_task').val(isi_task);
          modal.find('.modal-body #due_date').val(due_date);
        })
        $('#edit_user').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var name = button.data('name')
          var status = button.data('status')  
          var email = button.data('email') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #name').val(name);
          modal.find('.modal-body #status').val(status);
          modal.find('.modal-body #email').val(email);
        })
        $('#hapus_project').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })
        $('#hapus_task').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })
        $('#hapus_user').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })
    </script>
</body>
</html>

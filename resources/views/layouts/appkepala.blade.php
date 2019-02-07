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

                        @else
                            <li><a href="{{ route('kepala.home') }}">Home</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>Laporan<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('post.KepalaProject') }}">Project</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('post.KepalaTask') }}">Task</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('post.KepalaLaporan') }}">Laporan</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('post.KepalaMember') }}">User</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('post.KepalaProfil') }}">Edit Profile</a>
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
        $('#detail_laporan').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var skpd = button.data('skpd') 
          var subjek = button.data('subjek')
          var lokasi = button.data('lokasi')
          var isi = button.data('isi')  
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #skpd').val(skpd);
          modal.find('.modal-body #subjek').val(subjek);
          modal.find('.modal-body #lokasi').val(lokasi);
          modal.find('.modal-body #isi').val(isi);
        })
        $('#detail_task').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var judul_task = button.data('judul_task') 
          var status = button.data('status')
          var isi_task = button.data('isi_task')
          var start = button.data('start') 
          var due_date = button.data('due_date') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #judul_task').val(judul_task);
          modal.find('.modal-body #status').val(status);
          modal.find('.modal-body #isi_task').val(isi_task);
          modal.find('.modal-body #start').val(start);
          modal.find('.modal-body #due_date').val(due_date);
        })
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
        $('#edit_profil').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var name = button.data('name') 
          var email = button.data('email') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #name').val(name);
          modal.find('.modal-body #email').val(email);
        })
        $('#edit_admin').on('show.bs.modal', function (event) {
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
        $('#edit_member').on('show.bs.modal', function (event) {
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
        $('#edit_skpd').on('show.bs.modal', function (event) {
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
        $('#hapus_admin').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })
        $('#hapus_member').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })
        $('#hapus_skpd').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })
    </script>
</body>
</html>

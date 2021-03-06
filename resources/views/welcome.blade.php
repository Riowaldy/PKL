<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url(../img/black.png );
                color: white;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 65px;
            }

            .links > a {
                color: white;
                padding: 10px 30px;
                font-size: 10px;
                border: solid white 1px;
                font-weight: 1000;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <h5>APLIKASI LAPORAN MANAGEMENT PROYEK</h5>
                </div>

                <div class="links">
                    <a href="{{ route('kepala.login') }}">Login as Kepala</a>
                    <a href="{{ route('admin.login') }}">Login as Admin</a>
                    <a href="{{ route('member.login') }}">Login as Member</a>
                    <a href="{{ route('skpd.login') }}">Login as SKPD</a>
                </div>
            </div>
        </div>
    </body>
</html>

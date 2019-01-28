@extends('layouts.appmember')

@section('content')
<style>
    
</style>
<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
<!-- jumbotron -->
    <div class="jumbotron text-center page-scroll">
      <img src="img/diskominfo.png" class="img-circle">
      <h3>DINAS KOMUNIKASI INFORMATIKA DAN PERSANDIAN</h3>
      <h3>KABUPATEN SITUBONDO</h3>
      <p>Aplikasi Laporan Managemen Proyek</p>
      <p>Tampilan MEMBER</p>
    </div>
    <!-- akhir jumbotron -->

    <div class="container text-center">
        @component('components.who')
        @endcomponent
    </div>

    <!-- footer -->
    <footer>
      <div class="container text-center">
        <div class="row">
          <div class="col-sm-12">
            <p>&copy; copyright 2019 by Riowaldy Indrawan.</p>
          </div>
        </div>
      </div>
    </footer>
      
    <!-- Akhir footer -->
@endsection

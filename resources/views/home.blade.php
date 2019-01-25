@extends('layouts.app')

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
    </div>
    <!-- akhir jumbotron -->

    <!-- about -->
      <section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>About</h2>
              <hr>
            </div> 
          </div>
          <div class="row">
            <div class="col-sm-4 col-sm-offset-2 ">
              <p class="pKiri text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="col-sm-4">
              <p class="pKanan text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>
        </div>
      </section>
    <!-- akhir about -->

    <!-- contact -->
      <section class="contact" id="contact">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Masukan Pengguna</h2>
              <hr>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
              <form action="{{route('postmail')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email">
                </div>
                <select class="form-control" id="subject" name="subject">
                  <option>-- Pilih Kategori</option>
                  <option>About Diskominfo</option>
                  <option>Kritik Saran</option>
                </select>
                <div class="form-group">
                  <label for="pesan">Message</label>
                  <textarea class="form-control" rows="10" placeholder="Masukkan Pesan" id="message" name="message"></textarea>
                </div>
                <button class="btn-primary" type="submit">Kirim Pesan</button>
                
              </form>
            </div>
          </div>
        </div>
      </section>
    <!-- akhir contact -->

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

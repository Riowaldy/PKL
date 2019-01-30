@extends('layouts.appskpd')

@section('content')
<style>
    
</style>
<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- contact -->
      <section class="contact" id="contact">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Form Pengaduan</h2>
              <hr>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
              <form action="{{route('post.SkpdStore')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                  <label for='subject'>Subject</label>
                  <input type="text" id="subjek" name="subjek" class="form-control" placeholder="Masukkan Subject">
                </div>
                <div class="form-group">
                  <label for="lokasi">Lokasi</label>
                  <input type="text" id="lokasi" name="lokasi" class="form-control" placeholder="Masukkan Lokasi">
                </div>
                <div class="form-group">
                  <label for="pesan">Isi Pengaduan</label>
                  <textarea class="form-control" rows="10" placeholder="Masukkan Pengaduan" id="isi" name="isi">
                  </textarea>
                </div>
                <button class="btn-primary" type="submit">Kirim Pengaduan</button>
                
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
            <p>&copy; copyright 2019 by Tim PKN UMM.</p>
          </div>
        </div>
      </div>
    </footer>
      
    <!-- Akhir footer -->
@endsection
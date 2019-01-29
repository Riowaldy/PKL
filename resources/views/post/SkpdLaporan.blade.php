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
              <h2>Laporan SKPD</h2>
              <hr>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
              <form action="{{route('post.SkpdStore')}}" method="post">
                {{csrf_field()}}
                
                <div class="form-group has-feedback{{ $errors->has('subjek') ? ' has-error ' : '' }}">
                  <label for="subjek">Subjek</label>
                  <input type="text" id="subjek" name="subjek" class="form-control" placeholder="Masukkan Subjek" value="{{ old('subjek') }}">
                  @if ($errors->has('subjek'))
                    <span class="help-block">
                      <p>{{ $errors->first('subjek') }}</p>
                    </span>
                  @endif
                </div>
                <div class="form-group has-feedback{{ $errors->has('lokasi') ? ' has-error ' : '' }}">
                  <label for="lokasi">Lokasi</label>
                  <input type="lokasi" id="lokasi" name="lokasi" class="form-control" placeholder="Masukkan Lokasi" value="{{ old('lokasi') }}">
                  @if ($errors->has('lokasi'))
                    <span class="help-block">
                      <p>{{ $errors->first('lokasi') }}</p>
                    </span>
                  @endif
                </div>
                <div class="form-group has-feedback{{ $errors->has('isi') ? ' has-error ' : '' }}">
                  <label for="isi">Message</label>
                  <textarea class="form-control" rows="10" placeholder="Masukkan Pesan" id="isi" name="isi" value="{{ old('isi') }}"></textarea>
                  @if ($errors->has('isi'))
                    <span class="help-block">
                      <p>{{ $errors->first('isi') }}</p>
                    </span>
                  @endif
                </div>
                <button class="btn-primary" type="submit">Kirim Laporan</button>
                
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

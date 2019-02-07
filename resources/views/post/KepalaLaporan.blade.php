@extends('layouts.appkepala')

@section('content')
	<section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Keluhan</h2>
              <hr>
            </div> 
          </div>
          <div class="row">
            <div class="container">
	    <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="panel-heading">
              <div class="pull-right">
                <form action="{{ route('post.LaporanPDF') }}">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-xs btn-danger">Cetak PDF</button> &nbsp;
                      </form>
              </div>
            </div>
            <div class="panel-heading">
            </div>
          </div>
	        <div class="col-md-8 col-md-offset-2">
	            @foreach ($laporans as $laporan)
	            	<div class="panel panel-default">
		                <div class="panel-heading">
		                	Subjek Keluhan : {{ $laporan->subjek }}
                      <div class="pull-right">
                        <input type="submit" class="btn btn-xs btn-primary" data-id="{{$laporan->id}}" data-skpd="{{$laporan->skpd->name}}" data-subjek="{{$laporan->subjek}}" data-lokasi="{{$laporan->lokasi}}" data-isi="{{$laporan->isi}}" data-toggle="modal" data-target="#detail_laporan" value="Detail"> &nbsp;
                      </div>
		                	<div class="pull-right">
		                		{{ $laporan->created_at->diffForHumans() }} &nbsp;
		                	</div>
		                </div>
	            	</div>
	            @endforeach

	            {!! $laporans->render() !!}
		    </div>
		</div>
			</div>

          </div>
        </div>
    </section>

    <!-- Modal -->
  <div class="modal fade" id="detail_laporan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Laporan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                
  <!--Form Dalam Modal -->
          <form role="form" action="" enctype="multipart/form-data" method="post">{{csrf_field()}}
            <div class="box-body">
              <div class="form-group">
                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
              </div>
                  <div class="form-group">
                      <label for="input_nama">Pengirim</label>
                      <input type="text" name="skpd" id="skpd" class="form-control" value="" readonly>
                  </div>
                  <div class="form-group">
                      <label for="input_nama">Subjek</label>
                      <input type="text" name="subjek" id="subjek" class="form-control" value="" readonly>
                  </div>

                  <div class="form-group">
                      <label for="input_nama">Lokasi</label>
                      <input type="text" name="lokasi" id="lokasi" class="form-control" value="" readonly>
                  </div>

                  <div class="form-group">
                      <label for="input_nama">Isi Laporan</label>
                      <input type="text" name="isi" id="isi" class="form-control" value="" readonly>
                  </div>

              <div class="box-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
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





	
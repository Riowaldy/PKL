@extends('layouts.appadmin')

@section('content')
	<section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>All User</h2>
              <hr>
            </div> 
          </div>
          <div class="row">
            <div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">

              @foreach ($kepalas as $kepala)
              <div class="panel panel-default">
                  <div class="panel-heading">
                      {{ $kepala->name }}
                      <div class="pull-right">
                        <button type="submit" class="btn btn-xs btn-danger" data-id="{{$kepala->id}}" data-toggle="modal" data-target="#hapus_user">Hapus</button> &nbsp;
                      </div>
                      <div class="pull-right">
                        <button type="submit" class="btn btn-xs btn-info" data-id="{{$kepala->id}}" data-name="{{$kepala->name}}" data-status="{{$kepala->status}}" data-email="{{$kepala->email}}" data-toggle="modal" data-target="#edit_user">Edit</button> &nbsp;
                      </div>
                      <div class="pull-right">
                        <button type="submit" class="btn btn-xs btn-primary" data-id="{{$kepala->id}}" data-name="{{$kepala->name}}" data-status="{{$kepala->status}}" data-email="{{$kepala->email}}" data-toggle="modal" data-target="#detail_user">Detail</button> &nbsp;
                      </div>
                  </div>
              </div>
              @endforeach
	            @foreach ($members as $member)
              <div class="panel panel-default">
                  <div class="panel-heading">
                      {{ $member->name }}
                      <div class="pull-right">
                        <button type="submit" class="btn btn-xs btn-danger" data-id="{{$member->id}}" data-toggle="modal" data-target="#hapus_user">Hapus</button> &nbsp;
                      </div>
                      <div class="pull-right">
                        <button type="submit" class="btn btn-xs btn-info" data-id="{{$member->id}}" data-name="{{$member->name}}" data-status="{{$member->status}}" data-email="{{$member->email}}" data-toggle="modal" data-target="#edit_user">Edit</button> &nbsp;
                      </div>
                      <div class="pull-right">
                        <button type="submit" class="btn btn-xs btn-primary" data-id="{{$member->id}}" data-name="{{$member->name}}" data-status="{{$member->status}}" data-email="{{$member->email}}" data-toggle="modal" data-target="#detail_user">Detail</button> &nbsp;
                      </div>
                  </div>
              </div>
	            @endforeach
              @foreach ($skpds as $skpd)
              <div class="panel panel-default">
                  <div class="panel-heading">
                      {{ $skpd->name }}
                      <div class="pull-right">
                        <button type="submit" class="btn btn-xs btn-danger" data-id="{{$skpd->id}}" data-toggle="modal" data-target="#hapus_user">Hapus</button> &nbsp;
                      </div>
                      <div class="pull-right">
                        <button type="submit" class="btn btn-xs btn-info" data-id="{{$skpd->id}}" data-name="{{$skpd->name}}" data-status="{{$skpd->status}}" data-email="{{$skpd->email}}" data-toggle="modal" data-target="#edit_user">Edit</button> &nbsp;
                      </div>
                      <div class="pull-right">
                        <button type="submit" class="btn btn-xs btn-primary" data-id="{{$skpd->id}}" data-name="{{$skpd->name}}" data-status="{{$skpd->status}}" data-email="{{$skpd->email}}" data-toggle="modal" data-target="#detail_user">Detail</button> &nbsp;
                      </div>
                  </div>
                  
              </div>
              
              @endforeach
		    </div>
		</div>
			</div>

          </div>
        </div>
    </section>

    <!-- Modal Delete -->
    <div class="modal fade" id="hapus_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          
          <div class="modal-body">
                  
    <!--Form Dalam Modal Delete -->
            <form role="form" action="{{ route('AdminDeleteUser') }}" enctype="multipart/form-data" method="post">
              {{csrf_field()}}
              {{ method_field('DELETE') }}
                <div class="form-group">
                  <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                </div>
                <div class="modal-body">
                  <p class="text-center">Are you sure wanna delete this member?</p>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Delete</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Modal Delete -->

    <!-- Modal Update-->
  <div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Edit User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                
  <!--Form Dalam Modal Update-->
        <form role="form" action="{{route('AdminUpdateUser')}}" enctype="multipart/form-data" method="post">
        {{csrf_field()}}
          <div class="box-body">
            <div class="form-group">
              <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
            </div>
            <div class="form-group">
              <label for="input_nama">Nama User</label>
              <input type="text" name="name" id="name" class="form-control" value="">
            </div>
            
            <div class="form-group">
              <label for="">Pilih Status</label>
              <input type="text" name="status" id="status" class="form-control" value="" readonly>
            </div>
            <div class="form-group">
              <label for="input_nama">Email</label>
              <input type="text" name="email" id="email" class="form-control" value="">
            </div>    
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Save</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Modal Update -->

  <!-- Modal Detail-->
  <div class="modal fade" id="detail_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Detail User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                
  <!--Form Dalam Modal Detail-->
        <form role="form" action="" enctype="multipart/form-data" method="post">
        {{csrf_field()}}
          <div class="box-body">
            <div class="form-group">
              <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
            </div>
            <div class="form-group">
              <label for="input_nama">Nama User</label>
              <input type="text" name="name" id="name" class="form-control" value="" readonly>
            </div>
            
            <div class="form-group">
              <label for="">Status</label>
              <input type="text" name="status" id="status" class="form-control" value="" readonly>
            </div>
            <div class="form-group">
              <label for="input_nama">Email</label>
              <input type="text" name="email" id="email" class="form-control" value="" readonly>
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
  <!-- Akhir Modal Detail -->
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





	
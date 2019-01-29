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

	            @foreach ($users as $user)
              <div class="panel panel-default">
                  <div class="panel-heading">
                      {{ $user->name }}
                      <div class="pull-right">
                        <button type="submit" class="btn btn-xs btn-danger" data-id="{{$user->id}}" data-toggle="modal" data-target="#hapus_user">Hapus</button> &nbsp;
                      </div>
                      <div class="pull-right">
                        <button type="submit" class="btn btn-xs btn-info" data-id="{{$user->id}}" data-name="{{$user->name}}" data-status="{{$user->status}}" data-email="{{$user->email}}" data-toggle="modal" data-target="#edit_user">Edit</button> &nbsp;
                      </div>
                      <div class="pull-right">
                        <button type="submit" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#detail_user">Detail</button> &nbsp;
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

  <!-- Modal -->
  <div class="modal fade" id="detail_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                
  <!--Form Dalam Modal -->
          <form role="form" action="" enctype="multipart/form-data" method="post">{{csrf_field()}}
            <div class="box-body">
              <div class="form-group">
                Id User : {{$user->id}}
              </div>
              <div class="form-group">
                Nama User : {{$user->name}}
              </div>
              <div class="form-group">
                Email : {{$user->email}}
              </div>
              <div class="form-group">
                Status : {{$user->status}}
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





	
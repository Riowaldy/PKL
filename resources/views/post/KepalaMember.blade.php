@extends('layouts.appkepala')

@section('content')
  <section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>User</h2>
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
                        <button type="submit" class="btn btn-xs btn-primary" data-id="{{$user->id}}" data-name="{{$user->name}}" data-status="{{$user->status}}" data-email="{{$user->email}}" data-toggle="modal" data-target="#detail_user">Detail</button> &nbsp;
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






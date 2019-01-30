@extends('layouts.appadmin')

@section('content')
	<section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>All Task</h2>
              	<form class="navbar-form" role="search" method="post" action="">
              		{{ csrf_field() }}
              		<div class="input-group">
              			<input type="text" class="form-control" placeholder="Search" name="cari">
              			<div class="input-group-btn">
              				<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              			</div>
              		</div>
              	</form>
              <hr>
            </div> 
          </div>
          <div class="row">
            <div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">

	            @foreach ($tasks as $task)
	            	<div class="panel panel-default">
		                <div class="panel-heading">
		                	Nama Task : {{ $task->judul_task }}
                      <div class="pull-right">
                          <button type="submit" class="btn btn-xs btn-danger" data-id="{{$task->id}}" data-toggle="modal" data-target="#hapus_task">Hapus</button> &nbsp;
                      </div>
                      <div class="pull-right">
                          <button type="submit" class="btn btn-xs btn-info" data-id="{{$task->id}}" data-judul_task="{{$task->judul_task}}" data-status="{{$task->status}}" data-isi_task="{{$task->isi_task}}" data-due_date="{{$task->due_date}}" data-toggle="modal" data-target="#edit_task">Edit</button> &nbsp;
                      </div>
                      <div class="pull-right">
                        <form action="{{ route('post.AdminShowTask', $task) }}">
                          {{csrf_field()}}
                          <button type="submit" class="btn btn-xs btn-primary">Detail</button> &nbsp;
                        </form>
                      </div>
		                	<div class="pull-right">
		                		{{ $task->created_at->diffForHumans() }} &nbsp;
		                	</div>
		                </div>
		                
		                <div class="panel-body">
		                	<p>Nama Project : {{ $task->post->title }}</p>
                      <p>Due Date : {{ $task->due_date }}</p>
		                	<p>To : {{ $task->user->name }}</p>
		                	<p>Keterangan Project : {{ str_limit($task->isi_task, 100, '...') }}</p>
		                </div>
	            	</div>
	            @endforeach

	            {!! $tasks->render() !!}
		    </div>
		</div>
			</div>

          </div>
        </div>
    </section>

  <!-- Modal Delete -->
    <div class="modal fade" id="hapus_task" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        
        <div class="modal-body">
                
  <!--Form Dalam Modal Delete -->
          <form role="form" action="{{ route('AdminDeleteTask') }}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            {{ method_field('DELETE') }}
              <div class="form-group">
                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
              </div>
              <div class="modal-body">
                <p class="text-center">Are you sure wanna delete this task?</p>
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
  <div class="modal fade" id="edit_task" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Edit Task</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                
  <!--Form Dalam Modal Update-->
        <form role="form" action="{{route('AdminUpdateTask')}}" enctype="multipart/form-data" method="post">
        {{csrf_field()}}
          <div class="box-body">
              <div class="form-group">
                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
              </div>

              <div class="form-group">
                  <label for="input_nama">Nama Task</label>
                  <input type="text" name="judul_task" id="judul_task" class="form-control" value="">
              </div>

              <div class="form-group">
                  <label for="input_nama">Status</label>
                  <input type="text" name="status" id="status" class="form-control" value="" readonly="">
              </div>

              <div class="form-group">
                  <label for="input_nama">Isi Task</label>
                  <input type="text" name="isi_task" id="isi_task" class="form-control" value="">
              </div>

              <div class="form-group">
                  <label for="input_nama">Due Date</label>
                  <input type="date" name="due_date" id="due_date" class="form-control" value="">
              </div>
                    
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Modal Update -->
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





	
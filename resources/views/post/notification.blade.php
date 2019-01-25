@extends('layouts.app')

@section('content')
	<section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Notification</h2>
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
		                		
		                			{{ csrf_field() }}
		                			<input type="button" class="btn btn-xs btn-danger" data-id="{{$task->id}}" data-status="{{$task->status}}" data-toggle="modal" data-target="#edit_status" value="{{ $task->status }}"> &nbsp;
		                		
		                	</div>
		                	<div class="pull-right">
		                		{{ $task->created_at->diffForHumans() }} &nbsp;
		                	</div>
		                </div>
		                
		                <div class="panel-body">
		                	<p>Nama Project : {{ $task->post->title }}</p>
		                	<p>To : {{ $task->user->name }}</p>
		                	<p>Keterangan Project : {{ str_limit($task->isi_task, 100, '...') }}</p>
		                </div>
	            	</div>
	            @endforeach

	            
		    </div>
		</div>
			</div>

          </div>
        </div>
    </section>

    <!-- Modal -->
	<div class="modal fade" id="edit_status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Apakah task sudah selesai?</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					      
	<!--Form Dalam Modal -->
					<form role="form" action="{{route('status')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
						<div class="box-body">
							<div class="form-group">
								<input type="hidden" name="id" id="id" class="form-control" value="" readonly>
							</div>

							<div class="form-group">
				              	<label for="">Pilih Status</label>
				              	<select name="status" id="status" class="form-control">
				                  		<option> sudah selesai </option>
				                  		<option> belum selesai </option>
				              	</select>
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





	
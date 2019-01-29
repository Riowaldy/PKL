@extends('layouts.appadmin')

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
	                          	<button type="submit" class="btn btn-xs btn-primary" data-id="{{$task->id}}" data-toggle="modal" data-target="#detail_task">Detail</button> &nbsp;
		                    </div>
		                	<div class="pull-right">
		                		<input type="button" class="btn btn-xs btn-default" value="{{ $task->status }}"> &nbsp;
		                	</div>
		                	<div class="pull-right">
		                		{{ $task->created_at->diffForHumans() }} &nbsp;
		                	</div>
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

    <!-- Modal -->
	<div class="modal fade" id="detail_task" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Task</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					      
	<!--Form Dalam Modal -->
					<form role="form" action="" enctype="multipart/form-data" method="post">{{csrf_field()}}
						<div class="box-body">
							<div class="form-group">
								Id Task : {{$task->id}}
							</div>
							<div class="form-group">
								Nama Task : {{$task->judul_task}}
							</div>
							<div class="form-group">
								To : {{$task->user->name}}
							</div>
							<div class="form-group">
								Keterangan Project : {{$task->isi_task}}
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





	
@extends('layouts.appkepala')

@section('content')
	<section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>All Task</h2>
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
                        <input type="submit" class="btn btn-xs btn-primary" data-id="{{$task->id}}" data-judul_task="{{$task->judul_task}}" data-status="{{$task->status}}" data-isi_task="{{$task->isi_task}}" data-start="{{$task->start}}" data-due_date="{{$task->due_date}}" data-toggle="modal" data-target="#detail_task" value="Detail"> &nbsp;
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
          <form role="form" action="{{ route('DetailTask') }}" enctype="multipart/form-data" method="post">{{csrf_field()}}
            <div class="box-body">
              <div class="form-group">
                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
              </div>
                  <div class="form-group">
                      <label for="input_nama">Nama Task</label>
                      <input type="text" name="judul_task" id="judul_task" class="form-control" value="" readonly>
                  </div>
                  <div class="form-group">
                      <label for="input_nama">Status</label>
                      <input type="text" name="status" id="status" class="form-control" value="" readonly>
                  </div>

                  <div class="form-group">
                      <label for="input_nama">Isi Task</label>
                      <input type="text" name="isi_task" id="isi_task" class="form-control" value="" readonly>
                  </div>

                  <div class="form-group">
                      <label for="input_nama">Start</label>
                      <input type="date" name="start" id="start" class="form-control" value="" readonly>
                  </div>

                  <div class="form-group">
                      <label for="input_nama">Due Date</label>
                      <input type="date" name="due_date" id="due_date" class="form-control" value="" readonly>
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





	
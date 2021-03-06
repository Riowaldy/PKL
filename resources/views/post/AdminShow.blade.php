@extends('layouts.appadmin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">{{ $post->title }} | <small>{{ $post->category->name }}</small>
	                	<div class="pull-right">
	                			{{ csrf_field() }}
	                			<button type="button" class="btn btn-xs btn-info" data-id="{{$post->id}}" data-toggle="modal" data-target="#create_task" >Tambah Task</button> &nbsp;
	                	</div>
					</div>
					<div class="panel-body"><p>{{ $post->content }}</p>
					</div>

				</div>
			</div>

			
			<div class="col-md-8 col-md-offset-2">
				@foreach ($tasks as $task)
				@if($task->post_id === $post->id)
	        	<div class="panel panel-default">
	                <div class="panel-heading">
	                	<STRONG>{{ $task->judul_task }}</STRONG>  | {{ $task->post->title }}
	                	<div class="pull-right">
                          <button type="submit" class="btn btn-xs btn-danger" data-id="{{$task->id}}" data-toggle="modal" data-target="#hapus_task">Hapus</button> &nbsp;
                      </div>
                      <div class="pull-right">
                          <button type="submit" class="btn btn-xs btn-info" data-id="{{$task->id}}" data-judul_task="{{$task->judul_task}}" data-status="{{$task->status}}" data-isi_task="{{$task->isi_task}}" data-start="{{$task->start}}" data-due_date="{{$task->due_date}}" data-toggle="modal" data-target="#edit_task">Edit</button> &nbsp;
                      </div>
                      <div class="pull-right">
                      	  {{ csrf_field() }}
                          <button type="button" class="btn btn-xs btn-warning" data-id="{{$task->id}}" data-toggle="modal" data-target="#add_user" >Add User</button> &nbsp;
                      </div>
                      <div class="pull-right">
                          <input type="submit" class="btn btn-xs btn-primary" data-id="{{$task->id}}" data-judul_task="{{$task->judul_task}}" data-status="{{$task->status}}" data-isi_task="{{$task->isi_task}}" data-start="{{$task->start}}" data-due_date="{{$task->due_date}}" data-user="@foreach ($task->member as $all){{ $all->name }}, @endforeach" data-toggle="modal" data-target="#detail_task" value="Detail"> &nbsp;
                      </div>
	                </div>
	            </div>
	            @else
	            @endif
	            @endforeach
	            {!! $tasks->render() !!}
        	</div>

	        
	        

			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Tambahkan Komentar</div>
					
					@foreach ($post->comments()->get() as $comment)
						<div class="panel-body">	

							@if($comment->member === null)

								<h4>{{ $comment->admin->name }} - {{ $comment->created_at->diffForHumans() }}</h4>

								<p>{{ $comment->message }}</p>

							@else

								<h4>{{ $comment->member->name }} - {{ $comment->created_at->diffForHumans() }}</h4>

								<p>{{ $comment->message }}</p>
							
							@endif
						</div>
					@endforeach
					<div class="panel-body">
						<form action="{{ route('post.AdminComment', $post) }}" method="post" class="form-horizontal">
							{{ csrf_field() }}
							<textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Berikan Komentar"></textarea>
							<input type="submit" value="Komentar" class="btn btn-primary">							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Add User-->
	<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Add User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					      
	<!--Form Dalam Modal Add User -->
					<form role="form" action="{{route('post.AdminAddStore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
						<div class="box-body">
							<div class="form-group">
								<input type="text" name="task_id" id="task_id" class="form-control" value="{{$task->id}}" readonly>
							</div>
							<div class="form-group">
								<label for="">Pilih User</label>
								<select name="member_id" id="" class="form-control">
									@foreach ($members as $member)
										<option value="{{ $member->id }}">{{ $member->name }}</option>
									@endforeach
								</select>
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
	<!-- Akhir Modal Add User -->

	<!-- Modal Create Task-->
	<div class="modal fade" id="create_task" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Create Task</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					      
	<!--Form Dalam Modal Create Task -->
					<form role="form" action="{{route('post.AdminTaskStore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
						<div class="box-body">
							<div class="form-group">
								<input type="hidden" name="post_id" id="post_id" class="form-control" value="{{$post->id}}">
							</div>
							<div class="form-group">
								<label for="input_nama">Judul Task</label>
								<input type="text" name="judul_task" id="judul_task" class="form-control" placeholder="Tulis Judul Task">
							</div>
							<div class="form-group">
								<label for="input_nama">Isi Task</label>
								<textarea name="isi_task" id="isi_task" rows="5" class="form-control" placeholder="Tulis Isi Task"></textarea>
							</div>	
							<div class="form-group">
								<label for="input_nama">Start</label>
								<input type="date" name="start" id="start" class="form-control">
							</div>
							<div class="form-group">
								<label for="input_nama">Due Date</label>
								<input type="date" name="due_date" id="due_date" class="form-control">
							</div>
							<div class="form-group">
								<label for="input_user">Pilih User</label>
								<select class="form-control select2-multi" name="members[]" multiple="multiple">
									@foreach($members as $member)
										<option value='{{ $member->id }}'>{{ $member->name }}</option>
									@endforeach
								</select>
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
	<!-- Akhir Modal Create Task -->

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
				  <label for="input_nama">Start</label>
				  <input type="date" name="start" id="start" class="form-control" value="">
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

							<div class="form-group">
					          	<label for="input_nama">Dikerjakan Oleh</label>
					          	<input type="text" name="user" id="user" class="form-control" value="" readonly>
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
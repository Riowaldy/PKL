@extends('layouts.app')

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
					<div class="panel-body"><p>{{ $post->content }}</p></div>
						
				</div>
			</div>

			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Tambahkan Komentar</div>
					
					@foreach ($post->comments()->get() as $comment)
						<div class="panel-body">
							<h4>{{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}</h4>

							<p>{{ $comment->message }}</p>
						</div>
					@endforeach
					<div class="panel-body">
						<form action="{{ route('post.comment.store', $post) }}" method="post" class="form-horizontal">
							{{ csrf_field() }}
							<textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Berikan Komentar"></textarea>
							<input type="submit" value="Komentar" class="btn btn-primary">							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
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
					      
	<!--Form Dalam Modal -->
					<form role="form" action="{{route('post.taskstore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
						<div class="box-body">
							<div class="form-group">
								<input type="hidden" name="post_id" id="post_id" class="form-control" value="{{$post->id}}">
							</div>
							<div class="form-group">
								<label for="input_nama">User</label>
								<input type="text" name="user_id" id="user_id" class="form-control">
							</div>
							<div class="form-group">
								<label for="input_nama">Judul Task</label>
								<input type="text" name="judul_task" id="judul_task" class="form-control">
							</div>
							<div class="form-group">
								<label for="input_nama">Isi Task</label>
								<textarea name="isi_task" id="isi_task" rows="5" class="form-control" placeholder="Tulis Isi Task"></textarea>
							</div>	
							<div class="form-group">
								<label for="input_nama">Due Date</label>
								<input type="date" name="due_date" id="deadline" class="form-control">
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

	<!-- Modal -->
	<div class="modal fade" id="create_task" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Tambah Task</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					      
	<!--Form Dalam Modal -->
					<form role="form" action="{{route('post.taskstore')}}" enctype="multipart/form-data" method="post">
						{{csrf_field()}}
						<div class="box-body">
							<div class="form-group">
								<input type="hidden" name="post_id" id="post_id" class="form-control" value="{{$post->id}}">
							</div>
							<div class="form-group">
								<label for="input_nama">User</label>
								<input type="text" name="user_id" id="user_id" class="form-control">
							</div>
							<div class="form-group">
								<label for="input_nama">Judul Task</label>
								<input type="text" name="judul_task" id="judul_task" class="form-control">
							</div>
							
							<div class="form-group">
								<label for="input_nama">Isi Task</label>
								<textarea name="isi_task" id="isi_task" rows="5" class="form-control" placeholder="Tulis Isi Task"></textarea>
							</div>	
							<div class="form-group">
								<label for="input_nama">Due Date</label>
								<input type="date" name="due_date" id="deadline" class="form-control">
							</div>	
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
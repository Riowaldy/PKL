@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">{{ $post->title }} | <small>{{ $post->category->name }}</small>
	                	<div class="pull-right">
	                		<form class="" action="{{ route('post.createtask', $post) }}">
	                			{{ csrf_field() }}
	                			<button type="submit" class="btn btn-xs btn-primary">Tambah Task</button> &nbsp;
	                		</form>
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
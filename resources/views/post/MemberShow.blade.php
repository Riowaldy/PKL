@extends('layouts.appmember')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">{{ $post->title }} | <small>{{ $post->category->name }}</small>
					</div>
					<div class="panel-body"><p>{{ $post->content }}</p></div>
				</div>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Tambahkan Komentar</div>
					
					@foreach ($post->comments()->get() as $comment)
						<div class="panel-body">
							@if($comment->user === null)

								@if($comment->member === null)

								<h4>{{ $comment->admin->name }} - {{ $comment->created_at->diffForHumans() }}</h4>

								<p>{{ $comment->message }}</p>

								@else

								<h4>{{ $comment->member->name }} - {{ $comment->created_at->diffForHumans() }}</h4>

								<p>{{ $comment->message }}</p>

								@endif
							@else
								<h4>{{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}</h4>

								<p>{{ $comment->message }}</p>
							@endif
						</div>
					@endforeach
					<div class="panel-body">
						<form action="{{ route('post.MemberComment', $post) }}" method="post" class="form-horizontal">
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
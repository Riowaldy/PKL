@extends('layouts.appmember')

@section('content')
	<section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>All Project</h2>
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

	            @foreach ($posts as $post)
	            	<div class="panel panel-default">
		                <div class="panel-heading">
		                	{{ $post->title }}  | {{ $post->category->name }}
		                	<div class="pull-right">
		                		<form action="{{ route('post.MemberShow', $post) }}">
		                			{{csrf_field()}}
		                			<button type="submit" class="btn btn-xs btn-primary">Detail</button> &nbsp;
		                		</form>
		                	</div>
		                	<div class="pull-right">
		                		{{ $post->created_at->diffForHumans() }} &nbsp;
		                	</div>
		                </div>
		                <div class="panel-body">
		                	<p>{{ str_limit($post->content, 100, '...') }}</p>
		                </div>
	            	</div>
	            @endforeach

	            {!! $posts->render() !!}
		    </div>
		</div>
			</div>

          </div>
        </div>
    </section>

    
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





	
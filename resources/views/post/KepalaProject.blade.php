@extends('layouts.appkepala')

@section('content')
	<section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Project</h2>
              <hr>
            </div> 
          </div>
          <div class="row">
            <div class="container">
	    <div class="row">
	    	<div class="col-md-8 col-md-offset-2">
		    	<div class="panel-heading">
		    		<div class="pull-right">
		    			<form action="{{ route('post.ProjectPDF') }}">
                			{{csrf_field()}}
                			<button type="submit" class="btn btn-xs btn-danger">Cetak PDF</button> &nbsp;
                		</form>
		    		</div>
		    	</div>
		    	<div class="panel-heading">
		    	</div>
		    </div>
	        <div class="col-md-8 col-md-offset-2">
	            @foreach ($posts as $post)
	            	<div class="panel panel-default">
		                <div class="panel-heading">
		                	{{ $post->title }}  | {{ $post->category->name }}
		                	<div class="pull-right">
		                		<form action="{{ route('post.KepalaShow', $post) }}">
		                			{{csrf_field()}}
		                			<button type="submit" class="btn btn-xs btn-primary">Detail</button> &nbsp;
		                		</form>
		                	</div>
		                	<div class="pull-right">
		                		{{ $post->created_at->diffForHumans() }} &nbsp;
		                	</div>
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





	
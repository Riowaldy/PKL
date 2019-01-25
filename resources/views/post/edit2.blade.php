@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row-col-md-8 col-md-offset-2">
			<div class="panel panel-default">
		        <div 
		        	class="panel-heading">Edit Member
		        </div>
		        <div class="panel-body">
		            <form class="" action="{{ route('post.update2', $post) }}" method="post">
						{{ csrf_field() }}
						{{ method_field('PATCH') }}
						<div class="form-group">
							<label for="">Name</label>
							<input type="text" class="form-control" name="name" placeholder="Name" value="{{ $post->name }}">
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" class="form-control" name="email" placeholder="Email" value="{{ $post->email }}">
						</div>

						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Save">
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
@extends('layouts.appadmin')

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
	    	<div class="panel-heading">
	    		<div class="pull-right">
	    			<button type="submit" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#create_project">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create Project&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button> &nbsp;
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
		                		<button type="submit" class="btn btn-xs btn-danger" data-id="{{$post->id}}" data-toggle="modal" data-target="#hapus_project">Hapus</button> &nbsp;
		                	</div>
		                	<div class="pull-right">
		                		<button type="submit" class="btn btn-xs btn-info" data-id="{{$post->id}}" data-title="{{$post->title}}" data-content="{{$post->content}}" data-toggle="modal" data-target="#edit_project">Edit</button> &nbsp;
		                	</div>
		                	<div class="pull-right">
		                		<form action="{{ route('post.AdminShow', $post) }}">
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

    <!-- Modal Delete -->
    <div class="modal fade" id="hapus_project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				
				<div class="modal-body">
					      
	<!--Form Dalam Modal Delete -->
					<form role="form" action="{{ route('AdminDeleteProject') }}" enctype="multipart/form-data" method="post">
						{{csrf_field()}}
						{{ method_field('DELETE') }}
							<div class="form-group">
								<input type="hidden" name="id" id="id" class="form-control" value="" readonly>
							</div>
							<div class="modal-body">
								<p class="text-center">Are you sure wanna delete this project?</p>
							</div>
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Delete</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Akhir Modal Update -->

	<!-- Modal Update-->
	<div class="modal fade" id="edit_project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Edit Project</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					      
	<!--Form Dalam Modal Update-->
				<form role="form" action="{{route('AdminUpdatePost')}}" enctype="multipart/form-data" method="post">
				{{csrf_field()}}
					<div class="box-body">
						<div class="form-group">
							<input type="hidden" name="id" id="id" class="form-control" value="" readonly>
						</div>
						<div class="form-group">
							<label for="input_nama">Nama Project</label>
							<input type="text" name="title" id="title" class="form-control" value="">
						</div>
						
						<div class="form-group">
							<label for="input_nama">Content</label>
							<input type="text" name="content" id="content" class="form-control" value="">
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
	<!-- Akhir Modal Update -->

	<!-- Modal Create Project-->
	<div class="modal fade" id="create_project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Create Project</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					      
	<!--Form Dalam Modal Create Project -->
					<form role="form" action="{{route('post.AdminStore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
						<div class="box-body">
							<div class="form-group">
								<label for="">Nama Project</label>
								<input type="text" name="title" id="title" class="form-control" placeholder="Tulis Judul Project">
							</div>
							<div class="form-group">
								<label for="">Category</label>
								<select name="category_id" id="" class="form-control">
									@foreach ($categories as $category)
										<option value="{{ $category->id }}"> {{ $category->name }} </option>
									@endforeach
								</select>
							</div>	
							<div class="form-group">
								<label for="input_nama">Content</label>
								<textarea name="content" id="content" rows="5" class="form-control" placeholder="Tulis Isi Project"></textarea>
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
	<!-- Akhir Modal Create Project -->

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





	
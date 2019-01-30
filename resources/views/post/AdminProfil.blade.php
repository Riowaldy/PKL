@extends('layouts.appadmin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
		                <div class="panel-heading">
		                	Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ Auth::user()->name }}
		                	<div class="pull-right">
	                			{{ csrf_field() }}
	                			<button type="button" class="btn btn-xs btn-info" data-id="{{$ulog->id}}" data-name="{{$ulog->name}}" data-email="{{$ulog->email}}" data-toggle="modal" data-target="#edit_profiladmin" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button> &nbsp;
	                		</div>
		                </div>
		                <div class="panel-body">
			            	Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ Auth::user()->email }}   	
		                </div>
		                
	            </div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="edit_profiladmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					      
	<!--Form Dalam Modal -->
					<form role="form" action="{{route('AdminUpdate')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
						<div class="box-body">
							<div class="form-group">
								<input type="hidden" name="id" id="id" class="form-control" value="">
							</div>
							<div class="form-group">
								<label for="input_nama">Name</label>
								<input type="text" name="name" id="name" class="form-control">
							</div>
							<div class="form-group">
								<label for="input_nama">Email</label>
								<input type="text" name="email" id="email" class="form-control">
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





	
@extends('layouts.appmember')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">{{ $task->judul_task }} | Project : {{ $task->post->title }}
						<div class="pull-right">
	                		{{ $task->status }}
	                	</div>
					</div>
					<div class="panel-body"><p>{{ $task->isi_task }}</p></div>
						
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
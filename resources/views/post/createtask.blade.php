@extends('layouts.app')

@section('content')
	<section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Create New Task</h2>
              <hr>
            </div> 
          </div>
          <div class="row">
            <div class="container">
			<form class="" action="{{ route('post.storetask') }}" method="post">
				{{ csrf_field() }}

				<div class="form-group has-feedback{{ $errors->has('title') ? ' has-error ' : '' }}">
					<label for="">Nama Project</label>
					<input type="text" class="form-control" name="post_id" placeholder="{{ $post->title }}" value="{{ $post->id }}" readonly>
					@if ($errors->has('title'))
						<span class="help-block">
							<p>{{ $errors->first('title') }}</p>
						</span>
					@endif
				</div>

				<div class="form-group has-feedback{{ $errors->has('judul_task') ? ' has-error ' : '' }}">
					<label for="">Judul Task</label>
					<input type="text" class="form-control" name="judul_task" placeholder="Judul Task" value="{{ old('judul_task') }}">
					@if ($errors->has('judul_task'))
						<span class="help-block">
							<p>{{ $errors->first('judul_task') }}</p>
						</span>
					@endif
				</div>

				<div class="form-group">
					<label for="">Pilih User</label>
					<select name="user_id" id="" class="form-control">
						@foreach ($users as $user)
							<option value="{{ $user->id }}"> {{ $user->name }} </option>
						@endforeach
					</select>
				</div>

				<div class="form-group has-feedback{{ $errors->has('isi_task') ? ' has-error ' : '' }}">
					<label for="">Isi Task</label>
					<textarea name="isi_task" rows="5" class="form-control" placeholder="Isi Task">{{ old('isi_task') }}</textarea>
					@if ($errors->has('isi_task'))
						<span class="help-block">
							<p>{{ $errors->first('isi_task') }}</p>
						</span>
					@endif
				</div>

				<div class="form-group has-feedback{{ $errors->has('due_date') ? ' has-error ' : '' }}">
					<label for="">Due Date</label>
					<input type="text" class="form-control" name="due_date" placeholder="Due Date" value="{{ old('due_date') }}">
					@if ($errors->has('due_date'))
						<span class="help-block">
							<p>{{ $errors->first('due_date') }}</p>
						</span>
					@endif
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Save">
				</div>
			</form>
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
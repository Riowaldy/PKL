@extends('layouts.app')

@section('content')
	<section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Create New Project</h2>
              <hr>
            </div> 
          </div>
          <div class="row">
            <div class="container">
			<form class="" action="{{ route('post.store') }}" method="post">
				{{ csrf_field() }}
				<div class="form-group has-feedback{{ $errors->has('title') ? ' has-error ' : '' }}">
					<label for="">Nama Project</label>
					<input type="text" class="form-control" name="title" placeholder="Project Title" value="{{ old('title') }}">
					@if ($errors->has('title'))
						<span class="help-block">
							<p>{{ $errors->first('title') }}</p>
						</span>
					@endif
				</div>

				<div class="form-group">
					<label for="">Category</label>
					<select name="category_id" id="" class="form-control">
						@foreach ($categories as $category)
							<option value="{{ $category->id }}"> {{ $category->name }} </option>
						@endforeach
					</select>
				</div>

				<div class="form-group has-feedback{{ $errors->has('content') ? ' has-error ' : '' }}">
					<label for="">Keterangan</label>
					<textarea name="content" rows="5" class="form-control" placeholder="Keterangan">{{ old('title') }}</textarea>
					@if ($errors->has('content'))
						<span class="help-block">
							<p>{{ $errors->first('content') }}</p>
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
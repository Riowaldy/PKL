@if (session('success'))
	<div class="alert-success">
		{{ session('success') }}
	</div>
@endif

@if (session('info'))
	<div class="alert-success">
		{{ session('info') }}
	</div>
@endif

@if (session('danger'))
	<div class="alert-success">
		{{ session('danger') }}
	</div>
@endif
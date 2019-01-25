@if(Auth::guard('web')->check())
	<p class="text-success">
		You are Logged in as a <strong>USER</strong> 
	</p>
	@else
	<p class="tetx-danger">
		You are Logged out as a <strong>USER</strong> 
	</p>
@endif

@if(Auth::guard('admin')->check())
	<p class="text-success">
		You are Logged in as a <strong>ADMIN</strong> 
	</p>
	@else
	<p class="tetx-danger">
		You are Logged out as a <strong>ADMIN</strong> 
	</p>
@endif
@if (Auth::guard('web')->check())
	<p class="text-success">
		You are logged in as a <strong> User</strong>
	</p>
@else
	<p class="text-danger">
		You are not LOG IN as a <strong> User</strong>
	</p>
@endif

@if (Auth::guard('admin')->check())
	<p class="text-success">
		You are logged in as a <strong> Admin</strong>
	</p>
	@else
	<p class="text-danger">
		You are not LOG IN as a <strong> Admin</strong>
	</p>
@endif

@if (Auth::guard('client')->check())
	<p class="text-success">
		You are logged in as a <strong> Client</strong>
	</p>
	@else
	<p class="text-danger">
		You are not LOG IN as a <strong> Client</strong>
	</p>
@endif

@if (Auth::guard('lawyer')->check())
	<p class="text-success">
		You are logged in as a <strong> Lawyer</strong>
	</p>
@else
	<p class="text-danger">
		You are not LOG IN as a <strong> Lawyer</strong>
	</p>
@endif

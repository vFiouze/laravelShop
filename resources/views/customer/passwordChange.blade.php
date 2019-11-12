<form id= "changePassword" method="POST" action={{ route('password.change') }}>
	@csrf
	@method('PATCH')
	<div class="form-row align-items-center">
		<div class="col-md-3">
		    <label for="password">New password</label>
		    <input type="password" class="form-control form-control-sm" id="password" name="password">
		</div>
		<div class="col-md-3">
		    <label for="repass">Repeat password</label>
		    <input type="password" class="form-control form-control-sm" id="repass" name="repass">
		</div>
	</div>
</form>
<button onclick="checkPassword()" class="btn btn-success mt-2">Update Password<i class="fa fa-refresh ml-2" aria-hidden="true"></i></button>
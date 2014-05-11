<div id="auth">
	<div class="container">
		<div class="row">
			<div class="col-sm-2 col-md-3"></div>
			<div class="col-sm-7 col-md-5">
				<div class="panel panel-default main-box">
					<div class="panel-heading">
						<div class="clearfix">
							<h3 class="panel-title pull-left">เปลี่ยนรหัสผ่านใหม่</h3>
							<h4 class="panel-title pull-right">
								<a href="{{ url('auth/login') }}">
									<i class="glyphicon glyphicon-lock"></i> เข้าสู่ระบบ
								</a>
							</h4>
						</div>
					</div>
					<div class="panel-body">
						<form action="{{ url('auth/reset') }}" method="post" class="auth-form" role="form" accept-charset="utf-8">
							<div class="form-group">
								<label>รหัสผ่านเดิม (Old Password)</label>
								<input type="password" name="old_password" id="old_password" class="form-control" value="">
								<div class="error-validation"></div>
							</div>
							<div class="form-group">
								<label>รหัสผ่านใหม่ (New Password)</label>
								<input type="password" name="new_password" id="new_password" class="form-control" value="">
								<div class="error-validation"></div>
							</div>
							<div class="form-group">
								<label>ยืนยันรหัสผ่านใหม่ (Confirm New Password)</label>
								<input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control" value="">
								<div class="error-validation"></div>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-lg btn-primary btn-block" name="change" value="ตกลง" />
							</div>
							<input type="hidden" name="token" value="{{ security.getToken() }}">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
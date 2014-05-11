{% include "modules/nav" with ['user': user] %}

<div id="settings">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div>{{ flash.output() }}</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">แก้ไขข้อมูลรหัสผ่าน</h3>
					</div>
					<div class="panel-body">
						<form action="{{ url('settings/password') }}" method="post" class="auth-form" role="form" accept-charset="utf-8">
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
							<input type="hidden" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}">
							<input type="hidden" name="id" value="{{ user.id }}">
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-4">{{ partial("modules/settings_menu") }}</div>
		</div>
	</div>
</div>
{{ partial("modules/footer") }}
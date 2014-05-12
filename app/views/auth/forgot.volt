{% include "modules/nav" with ['user': false ] %}
<div id="auth">
	<div class="container">
		<div class="row">
			<div class="col-sm-2 col-md-3"></div>
			<div class="col-sm-7 col-md-5">
				<div class="panel panel-default main-box">
					<div class="panel-heading">
						<div class="clearfix">
							<h3 class="panel-title pull-left">ลืมรหัสผ่าน</h3>
							<h4 class="panel-title pull-right">
								<a href="{{ url('auth/login') }}">
									<i class="glyphicon glyphicon-lock"></i> เข้าสู่ระบบ
								</a>
							</h4>
						</div>
					</div>
					<div class="panel-body">
						<form action="{{ url('auth/forgot') }}" method="post" class="auth-form" role="form" accept-charset="utf-8">
							<div class="form-group">
								<label for="login">กรอกอีเมล์ของคุณ (E-mail)</label>
								{{ text_field("email", "class":"form-control", "maxlength":"80") }}
							</div>
							<div class="form-group">
								<input type="submit" name="reset" value="ตกลง" class="btn btn-lg btn-primary btn-block">
							</div>
							<input type="hidden" name="token" value="{{ security.getToken() }}">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
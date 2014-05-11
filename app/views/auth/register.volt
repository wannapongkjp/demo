<div id="auth">
	<div class="container">
		<div class="row">
			<div class="col-sm-2 col-md-3"></div>
			<div class="col-sm-8 col-md-6">
				<div class="panel panel-default main-box">
					<div class="panel-heading">
						<div class="clearfix">
							<h3 class="panel-title pull-left">ลงทะเบียนใหม่</h3>
							<h4 class="panel-title pull-right">
								<a href="{{ url('auth/login') }}">
									<i class="glyphicon glyphicon-lock"></i> เข้าสู่ระบบ
								</a>
							</h4>
						</div>
					</div>
					<div class="panel-body">
						<form action="{{ url('auth/register') }}" method="post">
							{{ messages }}
							<div class="form-group">
								{{ form.label('account_type') }}
								{{ form.render('account_type') }}
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										{{ form.label('firstname') }}
										{{ form.render('firstname') }}
										{{ form.messages('firstname') }}
									</div>
									<div class="col-md-6">
										{{ form.label('lastname') }}
										{{ form.render('lastname') }}
										{{ form.messages('lastname') }}
									</div>
								</div>
							</div>
							<div class="form-group">
								{{ form.label('sex') }}
								{{ form.render('sex') }}
							</div>
							<div class="form-group">
								{{ form.label('username') }}
								{{ form.render('username') }}
								{{ form.messages('username') }}
							</div>
							<div class="form-group">
								{{ form.label('email') }}
								{{ form.render('email') }}
								{{ form.messages('email') }}
							</div>
							<div class="form-group">
								{{ form.label('password') }}
								{{ form.render('password') }}
								{{ form.messages('password') }}
							</div>
							<div class="form-group">
								{{ form.label('confirm_password') }}
								{{ form.render('confirm_password') }}
								{{ form.messages('confirm_password') }}
							</div>
							<div class="form-group">
								{{ form.render('terms') }} {{ form.label('terms') }}
								{{ form.messages('terms') }}
							</div>
							<div class="form-group">
								{{ form.render('csrf', ['value': security.getToken()]) }}
								{{ form.messages('csrf') }}
							</div>
							<div class="form-group">
								{{ form.render('Sign Up') }}
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-2 col-md-3"></div>
		</div>
	</div>
</div>
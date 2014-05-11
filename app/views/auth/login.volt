<div id="auth">
	<div class="container">
		<div class="row">
			<div class="col-sm-2 col-md-3"></div>
			<div class="col-sm-7 col-md-5">
				<div class="panel panel-default main-box">
					<div class="panel-heading">
						<div class="clearfix">
						<h3 class="panel-title pull-left">ลงชื่อเข้าสู่ระบบ</h3>
						<h4 class="panel-title pull-right">
							<a href="{{ url('auth/register') }}">
								<i class="glyphicon glyphicon-plus"></i> ลงทะเบียนใหม่
							</a>
						</h4>
						</div>
					</div>
					<div class="panel-body">
						<form action="{{ url('auth/login') }}" method="post" accept-charset="utf-8">
							<div>{{ messages }}</div>
							<div class="form-group">
								{{ form.label('email') }}
								{{ form.render('email') }}
								{{ form.messages('email') }}
							</div>
							<div class="form-group">
								<div class="clearfix">
									<div class="pull-left">
										{{ form.label('password') }}
									</div>
									<div class="pull-right">
										<a href="{{ url('auth/forgot') }}">ลืมรหัสผ่าน?</a>
									</div>
								</div>
								<div>
									{{ form.render('password') }}
									{{ form.messages('password') }}
								</div>
							</div>
							{{ hidden_field("remember", "value": "1") }}
							<div class="form-group">
								{{ form.render('csrf', ['value': security.getToken()]) }}
								{{ form.messages('csrf') }}
							</div>
							<div class="form-group">
								{{ form.render('Sign In') }}
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-2 col-md-3"></div>
		</div>
	</div>
</div>
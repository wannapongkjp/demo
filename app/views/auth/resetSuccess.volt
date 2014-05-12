{% include "modules/nav" with ['user': false ] %}
<div id="auth">
	<div class="container">
		<div class="row">
			<div class="col-sm-2 col-md-3"></div>
			<div class="col-sm-7 col-md-5">
				<div class="panel panel-default main-box">
					<div class="panel-body">
						<div class="text-center">
							{{ message }}
							<h4>
								<a href="{{ url('auth/login') }}">
									<i class="glyphicon glyphicon-lock"></i> คลิกที่นี่ เข้าสู่ระบบ
								</a>
							</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
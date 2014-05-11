<div id="auth">
	<div class="container">
		<div class="row">
			<div class="col-sm-2 col-md-3"></div>
			<div class="col-sm-7 col-md-5">
				<div class="panel panel-default main-box">
					<div class="panel-body">
						<div class="text-center">
							{{ message }}
							{% if status==true %}
							<h4>
								<a href="{{ url('auth/login') }}">
									<i class="glyphicon glyphicon-lock"></i> เข้าสู่ระบบ
								</a>
							</h4>
							{% else %}
							<h4>
								<a href="{{ url('') }}">
									<i class="glyphicon glyphicon-home"></i> กลับหน้าหลัก
								</a>
							</h4>
							{% endif %}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
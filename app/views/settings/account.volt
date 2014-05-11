{% include "modules/nav" with ['user': user] %}

<div id="settings">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div>{{ flash.output() }}</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">แก้ไขข้อมูลบัญชีผู้ใช้</h3>
					</div>
					<div class="panel-body">
						<form action="{{ url('settings/account') }}" method="post">
							<div class="form-group">
								<label for="username">ชื่อผู้ใช้ (Username)</label>
								<input type="text" name="username" id="username" class="form-control" value="{{ user.username }}">
								<div class="error-validation"></div>
							</div>
							<div class="form-group">
								<label for="email">อีเมล์ (E-mail)</label>
								<input type="text" name="email" id="email" class="form-control" value="{{ user.email }}">
								<div class="error-validation"></div>
							</div>
							<div class="form-group">
								<button class="btn btn-lg btn-primary btn-block" type="submit">ตกลง</button>
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
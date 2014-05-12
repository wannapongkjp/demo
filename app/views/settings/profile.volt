{% include "modules/nav" with ['user': user] %}

<div id="settings">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div>{{ messages }}</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">แก้ไขข้อมูลส่วนตัว</h3>
					</div>
					<div class="panel-body">
						<form action="{{ url('settings/profile') }}" method="post">
							<div class="form-group">
								<label for="firstname">ชื่อ (Firstname)</label>
								<input type="text" name="firstname" id="firstname" class="form-control" value="{{ user.firstname }}">
								<div class="error-validation"></div>
							</div>
							<div class="form-group">
								<label for="lastname">นามสกุล (Lastname)</label>
								<input type="text" name="lastname" id="lastname" class="form-control" value="{{ user.lastname }}">
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
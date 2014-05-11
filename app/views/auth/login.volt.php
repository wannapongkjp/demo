<div id="auth">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form action="http://dev.backoffice.kitjarern.com/auth/login?r=566552" method="post" class="auth-form" role="form" accept-charset="utf-8">
					<div style="display: none">
						<input type="hidden" name="csrf_cyp_token" value="0d74544c66ed6749288cb96ce713730d">
					</div>
					<div class="clearfix">
						<h2 class="form-heading pull-left">ลงชื่อเข้าสู่ระบบ</h2>
					</div>
					<hr>
					<div>
						<label for="login">อีเมล์ (E-mail)</label>
						<div>
							<input type="text" name="login" value="" id="inputEmail" class="form-control">
						</div>
					</div>
					<div>
						<div class="clearfix">
							<div style="float: left;">
								<label for="password">รหัสผ่าน (Password)</label>
							</div>
							<div style="float: right;">
								<a href="<?php echo $this->url->get('auth/forgot'); ?>">ลืมรหัสผ่าน?</a>
							</div>
						</div>
						<div>
							<input type="password" name="password" value="" id="inputPassword" class="form-control">
						</div>
					</div>
					<button class="btn btn-lg btn-primary btn-block" type="submit">เข้าสู่ระบบ</button>
					<div style="display: none">
						<input type="hidden" name="csrf_cyp_token" value="0d74544c66ed6749288cb96ce713730d">
					</div>
					<input type="hidden" name="remember" value="1"> <input type="hidden" name="redirect" value="">
				</form>
			</div>
		</div>
	</div>
</div>
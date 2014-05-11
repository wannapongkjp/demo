<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ url('') }}">eStudent</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="{{ url('') }}">หน้าหลัก</a></li>
				<li><a href="{{ url('news') }}">ข่าวประกาศ</a></li>
				{% if user %}
				<li><a href="{{ url('homework') }}">การบ้าน</a></li>
				{% endif %}
			</ul>
			<ul class="nav navbar-nav navbar-right">
				{% if user %}
				<li><a href="{{ url('profile') }}">{{ user.firstname }} {{ user.lastname }}</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ url('settings/profile') }}">การตั้งค่า</a></li>
						<li class="divider"></li>
						<li><a href="{{ url('auth/logout') }}">ออกจากระบบ</a></li>
					</ul>
				</li>
				{% else %}
				<li><a href="{{ url('auth/login') }}">เข้าสู่ระบบ</a></li>
				<li><a href="{{ url('auth/register') }}">ลงทะเบียนใหม่</a></li>
				{% endif %}
			</ul>
		</div>
		<!--/.nav-collapse -->
	</div>
</div>
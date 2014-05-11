{% include "modules/nav" with ['user': user] %}

<div id="profile">
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<div class="thumbnail">
							<img src="{{ static_url('assets/imgs/demo/featured1.jpg') }}" />
						</div>
						<div>
							<h2>5 Can't-Miss Apps: LiveLens and More</h2>
							<h4>This week's list includes an app for easily watermarking photos, a messaging app just for couples and the newest T-shirt creation app from Threadless.</h4>
						</div>
					</div>
					<div class="col-md-4">
						<div class="thumbnail">
							<img src="{{ static_url('assets/imgs/demo/featured2.jpg') }}" />
						</div>
						<div>
							<h2>Can Fujifilm Bring Instant Film Cameras Into the Selfie Era?</h2>
							<h4>The Fujifilm Instax Mini 90 offers the convenience of instant photos with a dash of style.</h4>
						</div>
					</div>
					<div class="col-md-4">
						<div class="thumbnail">
							<img src="{{ static_url('assets/imgs/demo/featured3.jpg') }}" />
						</div>
						<div>
							<h2>10 Questions on the Deadly Middle Eastern Virus</h2>
							<h4>A deadly Middle East virus that has killed more than 100 people made a surprising appearance in Indiana this week.</h4>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-7">
				<div class="activities_items">
					{% set robots = ['1','2','3'] %} 
					{% for robot in robots %}
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="media">
								<a class="pull-left" href="#">
									<img class="media-object" src="{{ static_url('assets/imgs/demo/student1.jpg') }}" style="width: 64px; height: 64px;">
								</a>
								<div class="media-body">
									<h4 class="media-heading">Wannapong Kumjumpon</h4>
									<div style="font-size: 1em; color: #aaa;">4 พฤษภาคม 2014 เวลา 22:47 น.</div>
									<div>“สร้างมืออาชีพ ด้วยมืออาชีพ” สถาบันการจัดการปัญญาภิวัฒน์ (PIM) สถาบันอุดมศึกษาเพื่ออนาคตที่มั่นคง ในกลุ่ม บมจ.ซีพี ออลล์ โทร.02-832 0200</div>
								</div>
							</div>
						</div>
					</div>
					{% endfor %}
				</div>
			</div>
			<div class="col-md-5">
				<div class="panel panel-default user-online">
					<div class="panel-heading">
						<h3 class="panel-title">สมาชิกออนไลน์ล่าสุด</h3>
					</div>
					<div class="panel-body">
						<img class="thumbnail" src="{{ static_url('assets/imgs/demo/teacher1.jpg') }}">
						<img class="thumbnail" src="{{ static_url('assets/imgs/demo/teacher2.jpg') }}">
						<img class="thumbnail" src="{{ static_url('assets/imgs/demo/student1.jpg') }}">
						<img class="thumbnail" src="{{ static_url('assets/imgs/demo/student2.jpg') }}">
						<img class="thumbnail" src="{{ static_url('assets/imgs/demo/student3.jpg') }}">
						<img class="thumbnail" src="{{ static_url('assets/imgs/demo/student4.jpg') }}">
						<img class="thumbnail" src="{{ static_url('assets/imgs/demo/student5.jpg') }}">
						<img class="thumbnail" src="{{ static_url('assets/imgs/demo/student6.jpg') }}">
						<img class="thumbnail" src="{{ static_url('assets/imgs/demo/student7.jpg') }}">
						<img class="thumbnail" src="{{ static_url('assets/imgs/demo/student8.jpg') }}">
						<img class="thumbnail" src="{{ static_url('assets/imgs/demo/student9.jpg') }}">
						<img class="thumbnail" src="{{ static_url('assets/imgs/demo/student10.jpg') }}">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{{ partial("modules/footer") }}
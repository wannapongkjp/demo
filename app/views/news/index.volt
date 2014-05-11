{% include "modules/nav" with ['user': user] %}

<div id="news">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="activities_items">
					{% set robots = ['1','2','3','4','5','6','7','8','9','10'] %} {% for robot in robots %}
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="media">
								<div class="media-body">
									<h4 class="media-heading">สร้างมืออาชีพ ด้วยมืออาชีพ</h4>
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
				<div class="panel panel-default">
					<div class="panel-body">
						<div>
							<div class="thumbnail">
								<img src="{{ static_url('assets/imgs/demo/featured1.jpg') }}"/>
							</div>
							<div>
								<h2>5 Can't-Miss Apps: LiveLens and More</h2>
								<h4>This week's list includes an app for easily watermarking photos, a messaging app just for couples and the newest T-shirt creation app from Threadless.</h4>
							</div>
						</div>
						<div>
							<div class="thumbnail">
								<img src="{{ static_url('assets/imgs/demo/featured2.jpg') }}"/>
							</div>
							<div>
								<h2>Can Fujifilm Bring Instant Film Cameras Into the Selfie Era?</h2>
								<h4>The Fujifilm Instax Mini 90 offers the convenience of instant photos with a dash of style.</h4>
							</div>
						</div>
						<div>
							<div class="thumbnail">
								<img src="{{ static_url('assets/imgs/demo/featured3.jpg') }}"/>
							</div>
							<div>
								<h2>10 Questions on the Deadly Middle Eastern Virus That Showed Up in Indiana</h2>
								<h4>A deadly Middle East virus that has killed more than 100 people made a surprising appearance in Indiana this week.</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{{ partial("modules/footer") }}
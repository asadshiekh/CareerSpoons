@extends('client_views.master')
@section('content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url(public/client_assets/img/banner-12.jpg);">
	<div class="container" style="margin-bottom: 120px;">
	</div>
</section>
<div class="clearfix"></div>




<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="page-header">
				<br>
				Frequently Asked Questions
				<br>
			</h1>

			<div id="myTabContent" class="tab-content">
				<div class="tab-pane fade in active" id="home">
					<div class="content_accordion">
						<div class="panel-group" id="accordion">
							<?php 

							if($faq=="0"){?>

								<h4 style="color:red;text-align:center;font-size:17px">  Sorry! No FAQ Found Yet</h4>
							<?php }else{

							foreach($faq as $value){?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#faq{{$value->random_key}}">{{$value->id}}. {{$value->question}}</a>
									</h4>
								</div>
								<div id="faq{{$value->random_key}}" class="panel-collapse collapse">
									<div class="panel-body">
										<p>{{$value->solution}}</p>
									</div>
								</div>
							</div>

							<?php }} ?>


								
								<!-- <div class="panel">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#ca">5. Current Affairs</a>
										</h4>
									</div>
									<div id="ca" class="panel-collapse collapse">
										<div class="panel-body">
											<p> <a href="" target="_blank">Learn more.</a></p>
										</div>
									</div>
								</div>

 -->

							</div>
						</div>
						<!--accordion end-->
					</div>
				</div>
				<!--accordion end-->
			</div>
		</div>
	</div>



	@endsection
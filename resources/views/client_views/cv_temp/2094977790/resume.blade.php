<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

	<title>Curriculum Vitae</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
	
<link type="text/css" rel="stylesheet" href="{{url('public/client_assets/css/cv_temp')}}/{{$data->template_folder}}/{{$data->css_page}}">

</head>
<body>


<nav id="top-nav" class="navbar navbar-light" style="background-color:#35434E">

  <a class="navbar-brand" href="#">
    <img src="{{url('public/client_assets/img/logo-white.png')}}" class="d-inline-block align-top">
  </a>

  <form class="form-inline">
  		<a class="btn btn-outline-primary my-2 my-sm-0"  onclick="print_cv();" style="color:white;margin-right:5px">Download PDF</a>
  	 <a href="{{url('download-candidate-pdf')}}/{{$data->temp_id}}">link</a>
  	
  	<a  href="{{url('user-profile')}}" class="btn btn-outline-primary my-2 my-sm-0" style="color:white">Go Back</a>
  </form>

</nav>
<div id="doc2" class="yui-t7">
	<div id="inner">
	
		<div id="hd">
			<div class="yui-gc">
				<div class="yui-u first">
					<h1>{{$general_info->candidate_name}}</h1>
					<h2>{{$general_info->candidate_profession}}</h2>

				</div>

				<div class="yui-u">
					<div class="contact-info">
						<h3><a href="mailto:name@yourdomain.com">{{$user_register->user_email}}</a></h3>
						<h3>{{$user_register->phone_number}}</h3>
					</div><!--// .contact-info -->

				</div>
			</div><!--// .yui-gc -->
		</div><!--// hd -->

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">
					<div class="yui-gf">
						<ul>

							<li style="border-bottom:0px;"><i class="fas fa-transgender"></i><span style="font-weight: bold; padding-right: 5px;">Gender :</span>{{$general_info->candidate_gender}}</li>
							<li style="border-bottom:0px;"><i class="fas fa-birthday-cake"></i><span style="font-weight: bold; padding-right: 5px;">Age :</span> {{$general_info->candidate_age}}</li>
							<li style="border-bottom:0px;"><i class="fas fa-address-card"></i><span style="font-weight: bold;padding-right: 5px;">Address :</span>{{$general_info->candidate_location}}</li>
							<li style="border-bottom:0px;"><i class="fas fa-address-card"></i><span style="font-weight: bold;padding-right: 5px;">City :</span>{{$general_info->candidate_city}}</li>
							
						</ul>
					</div><!--// .yui-gf -->
					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Profile</h2>
						</div>
						<div class="yui-u">

							<p class="enlarge">
								{{$general_info->candidate_resume_details}} 
							</p>
						</div>
					</div><!--// .yui-gf -->
                    
                   
					<div class="yui-gf">

						<div class="yui-u first">
							<h2>Education</h2>
						</div><!--// .yui-u -->

						<div class="yui-u">
							<?php 
							if($candidate_eductions===0){ ?>
								<h3 style="color:red;">  Dont Have Any Eduction Yet!</h3>
							<?php }else{ 	
								foreach ($candidate_eductions as $value) { ?>
									<div class="job last">
										<h2>{{$value->degree_level}}</h2>
										<h3>{{$value->degree_title}} | 
											<?php if($value->selected_result=='Percentage'){
												echo $value->percentage;	
											}	
											else{
												echo $value->cgpa.' '.'CPGA';
											}?></h3>
											<h4><?php echo date('Y',strtotime($value->edu_start)) ?> - <?php echo date('Y',strtotime($value->edu_end)) ?></h4>
											<p>{{$value->edu_description}} </p>
										</div>
									<?php }} ?>

						</div><!--// .yui-u -->
					</div>
					<div class="yui-gf">
	
						<div class="yui-u first">
							<h2>Experience</h2>
						</div><!--// .yui-u -->

						<div class="yui-u">
                           <?php 
		                    if($candidate_experience===0){ ?>
		                   <h3 style="color:red;">  Dont Have Any Experience Yet!</h3>
		                 <?php }else{ 	
		                 	foreach ($candidate_experience as $value) { ?>
							<div class="job last">
								<h2>{{$value->job_title}}</h2>
								<h3>Your Postion in {{$value->company_name}} as a {{$value->your_position}}</h3>
								<h4><?php echo date('Y',strtotime($value->exp_start)) ?> - <?php echo date('Y',strtotime($value->exp_end)) ?></h4>
								<p>{{$value->exp_description}}.</p>
							</div>
						<?php }} ?>

							
						</div><!--// .yui-u -->
					</div><!--// .yui-gf -->

					

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Skills</h2>
						</div>
						<div class="yui-u">
							<?php 
		                    if($candidate_skill===0){ ?>
		                   <h3 style="color:red;"> Dont Have Any Skill Yet!</h3>
		                  <?php } else{ ?> 
		                <?php foreach ($candidate_skill as $value) { ?>
							<ul class="talent">
								<li style="margin-right: 15%; text-align: center;">{{ $value->skill_name }}</li>
							</ul>
						<?php }} ?>

							
						</div>
					</div><!--// .yui-gf-->
                     
                      <div class="yui-gf">
						<div class="yui-u first">
							<h2>Hobbies</h2>
						</div>
						<div class="yui-u">
						<?php 
		                    if($hobb===0){ ?>
		                   <h3 style="color:red;"> Dont Have Any Skill Yet!</h3>
		                  <?php } else{ 
							
						foreach($hobb as $hobbies){
							?>
							<span style="background-color:#e0e0e0;padding: 2%;">{{$hobbies->user_hobbies}}</span>
						<?php }} ?>
							

						</div>
					</div>

					<!--// .yui-gf -->
					<div class="yui-gf last">
						<div class="yui-u first">
							<h2>Languages</h2>
						</div>
						<div class="yui-u">
							<?php 
		                    if($languages===0){ ?>
		                   <h3 style="color:red;"> Dont Have Any Skill Yet!</h3>
		                  <?php } else{ 
							
						foreach($languages as $value){
							?>
							<span style="background-color:#e0e0e0;padding: 2%;">{{$value->user_language}}</span>
							<?php }} ?>
						</div>
					</div>


				</div><!--// .yui-b -->
			</div><!--// yui-main -->
		</div><!--// bd -->

		<div id="ft">
			<p>{{$general_info->candidate_name}} &mdash; <a href="mailto:name@yourdomain.com">{{$user_register->user_email}}</a> &mdash; {{$user_register->phone_number}}</p>
		</div><!--// footer -->

	</div><!-- // inner -->


</div><!--// doc -->


<script type="text/javascript">
function print_cv() {
  window.print();
}
</script>

</body>
</html>


<!DOCTYPE html>
<html>
<head>
<title>CareerSpoons - Curriculum Vitae (Standard)</title>

<meta name="viewport" content="width=device-width"/>
<meta name="description" content="The Curriculum Vitae of Joe Bloggs."/>
<meta charset="UTF-8"> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link type="text/css" rel="stylesheet" href="{{url('public/client_assets/css/cv_temp')}}/{{$data->template_folder}}/{{$data->css_page}}">
<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Lato:400,300' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body id="top">


<nav id="top-nav" class="navbar navbar-light" style="background-color:#35434E">

  <a class="navbar-brand" href="#">
    <img src="{{url('public/client_assets/img/logo-white.png')}}" class="d-inline-block align-top">
  </a>

  <form class="form-inline">
  	<!-- <a class="btn btn-outline-primary my-2 my-sm-0" href="{{url('download-candidate-pdf')}}/{{$data->temp_id}}" style="color:white;margin-right:5px">Download PDF</a>
  	<a  href="{{url('user-profile')}}" class="btn btn-outline-primary my-2 my-sm-0" style="color:white">Go Back</a> -->
  </form>

</nav>

<div id="cv" class="instaFade">
	<div class="mainDetails">
	<!-- 	<div id="headshot" class="quickFade">
			<img src="headshot.jpg" alt="Alan Smith" />
		</div> -->
		
		<div id="name">
			<h1 class="quickFade delayTwo">{{$general_info->candidate_name}}</h1>
			<h2 class="quickFade delayThree">({{$general_info->candidate_profession}})</h2>
		</div>
		<div id="intro">

			<p style="margin-bottom:0px;"><i class="fas fa-envelope"></i>{{$user_register->user_email}}</p>
			<?php
			if($user_register->current_number_status == '1'){?>

				<p><i class="fas fa-phone"></i>{{$user_register->phone_number}}</p>

			<?php }else{  ?>
				<p><i class="fas fa-city"></i>{{$general_info->candidate_city}}</p>
			<?php } ?>

		</div>	
		<div id="contactDetails" class="quickFade delayFour">
			<ul>
				
				<li><i class="fas fa-transgender"></i><span style="font-weight: bold; padding-right: 5px;">Gender :</span>{{$general_info->candidate_gender}}</li>
				<li><i class="fas fa-birthday-cake"></i><span style="font-weight: bold; padding-right: 5px;">Age :</span> {{$general_info->candidate_age}}</li>
				<li><i class="fas fa-address-card"></i><span style="font-weight: bold;padding-right: 5px;">Address :</span>{{$general_info->candidate_location}}</li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
	
	<div id="mainArea" class="quickFade delayFive" style="border-bottom:solid 2px #cf8a05;padding-bottom:5%; ">
		<section>
			<article>
				<div class="sectionTitle">
					<h1><u style="text-decoration: none;border-bottom:2px double #cf8a05;">Personal Profile:</u></h1>
				</div>
				
				<div class="sectionContent">
					<p>{{$general_info->candidate_resume_details}}</p>
				</div>
			</article>
			<div class="clear"></div>
		</section>
		

		<section>
			<div class="sectionTitle">
				<h1><u style="text-decoration: none;border-bottom:2px double #cf8a05;">Education:</u></h1>
			</div>
			
			<div class="sectionContent">
				<?php 
                    if($candidate_eductions===0){ ?>
                   <h3 style="color:red;">  Dont Have Any Eduction Yet!</h3>
                 <?php }else{ 	
                 	foreach ($candidate_eductions as $value) { ?>
				<article>
					<h2>{{$value->degree_level}}</h2>
					<p class="subDetails">{{$value->degree_title}} | 
						<?php if($value->selected_result=='Percentage'){
							echo $value->percentage;	
						}	
						else{
							echo $value->cgpa.' '.'CPGA';
						}?>
					  | <?php echo date('Y',strtotime($value->edu_start)) ?> - <?php echo date('Y',strtotime($value->edu_end)) ?></p>
					<p class="subDetails">{{$value->degree_title}} With the Major in <?php
						 $value->majors= str_replace("_"," ",$value->majors);
				                      	 echo $value->majors;
					 ?></p>
					<p>{{$value->edu_description}}</p>
				</article>	
				<?php }} ?>
				
			</div>

			<div class="clear"></div>
		</section>


		<section>
			<div class="sectionTitle">
				<h1><u style="text-decoration: none;border-bottom:2px double #cf8a05;">Experience:</u></h1>
			</div>
			
			<div class="sectionContent">
				<?php 
                    if($candidate_experience===0){ ?>
                   <h3 style="color:red;">  Dont Have Any Experience Yet!</h3>
                 <?php }else{ 	
                 	foreach ($candidate_experience as $value) { ?>

				<article>
					<h2>{{$value->job_title}}</h2>
					<p class="subDetails">Your Postion in {{$value->company_name}} as a {{$value->your_position}}</p>
					<p class="subDetails"><?php echo date('Y',strtotime($value->exp_start)) ?> - <?php echo date('Y',strtotime($value->exp_end)) ?></p>
					<p>{{$value->exp_description}}.</p>
				</article>

			<?php }} ?>
				
			</div>
			<div class="clear"></div>
		</section>

		
		<section>
			<div class="sectionTitle">
				<h1><u style="text-decoration: none;border-bottom:2px double #cf8a05;">Project Exp:</u></h1>
			</div>
			
			<div class="sectionContent">

				<?php 
                    if($candidate_project===0){ ?>
                   <h3 style="color:red;">  No Project Experience!</h3>
                 <?php }else{ 	
                 	foreach ($candidate_project as $value) { ?>

				<article>
					<h2>{{$value->project_title}}</h2>
					<p class="subDetails">{{$value->project_company_name}}</p>
					<p class="subDetails"><?php echo date('Y',strtotime($value->pro_start)) ?> - <?php echo date('Y',strtotime($value->pro_end)) ?></p>
					<p>{{$value->project_description}}</p>
				</article>

			<?php }} ?>

			</div>
			<div class="clear"></div>
		</section>
		
		
		<section>
			<div class="sectionTitle">
				<h1><u style="text-decoration: none;border-bottom:2px double #cf8a05;">Key Skills:</u></h1>
			</div>
			
			<div class="sectionContent">
				<?php 
                    if($candidate_skill===0){ ?>
                   <h3 style="color:red;"> Dont Have Any Skill Yet!</h3>
                  <?php } else{ ?> 
				<ul class="keySkills">
                <?php foreach ($candidate_skill as $value) { ?>
					<li>{{ $value->skill_name }}</li>
				<?php }} ?>
					
				</ul>
			</div>
			<div class="clear"></div>
		</section>
		
		

		
	</div>
</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-3753241-1");
pageTracker._initData();
pageTracker._trackPageview();
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>
</html>
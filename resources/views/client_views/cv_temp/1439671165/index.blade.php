<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>CareerSpoons - Resume</title>
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="{{url('public/client_assets/css/cv_temp')}}/{{$data->template_folder}}/{{$data->css_page}}">
        <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700|Source+Sans+Pro:400,400i" rel="stylesheet">

    <body>
<nav class="navbar navbar-light" style="background-color:#35434E;">

  <a class="navbar-brand" href="#" style="width:75%;padding-top: 1%;padding-left: 1%;">
    <img src="{{url('public/client_assets/img/logo-white.png')}}" class="d-inline-block align-top">
  </a>
    <a class="btn btn-outline-primary my-2 my-sm-0" href="#" style="color:white; margin-right:5px;width:10%;border:solid 1px blue;padding:1%;margin:1%;margin-top: 0px;">Download PDF</a>
    <a  href="{{url('user-profile')}}" class="btn btn-outline-primary my-2 my-sm-0" style="color:white;width:10%;border:solid 1px blue;padding:1%;margin:1%;text-align: center;margin-top: 0px;">Go Back</a>

<style type="text/css">
    .navbar-brand{
        text-decoration: none;
    }
    .navbar-brand:hover,.btn-outline-primary:hover{
        background-color: #35434E;
    }
</style>

</nav>
        <div class="page" style="border:solid 1px #ba0018;">
            <div class="section row">
                <?php $name = explode(" ",$general_info->candidate_name)?>
                <h1 class="col"><span style="font-weight:700">{{$name[0]}}</span> {{$name[1]}}</h1>
                <div class="contact-info col-right">
                    <div><a href="mailto:jugalm@nyu.edu"><i class="fas fa-envelope" style="padding-right: 4px;"></i>{{$user_register->user_email}}</a></div>
                    <div><a href="http://jugalm.com"><i class="fas fa-phone" style="padding-right: 4px;"></i>{{$user_register->phone_number}}</a></div>
                </div>
        
            </div>
            <div class="section row">
                <h2 class="col">Personal Details</h2>
                <div class="section-text col-right">
                   <ul style="font-family:'Merriweather', serif;font-size: 14px;">
                
                <li><span style="padding-right: 5px;color:#ba0018;">Gender :</span>{{$general_info->candidate_gender}}</li>
                <li><span style="padding-right: 5px;color:#ba0018;">Age :</span>{{$general_info->candidate_age}}</li>
                <li><span style="padding-right: 5px;color:#ba0018;">Address :</span>{{$general_info->candidate_location}}</li>
                <li><span style="padding-right: 5px;color:#ba0018;">City :</span>{{$general_info->candidate_city}}</li>
            </ul>
                </div>
            </div>
            <div class="section row">
                <h2 class="col">Personal Bio</h2>
                <div class="section-text col-right">
                    <p style="margin-top:4px;font-family:Merriweather Serif;">{{$general_info->candidate_resume_details}}</p>
                </div>
            </div>
           
            <div class="section row">
                <h2 class="col">Skills</h2>
                <div class="section-text col-right row">
                    <?php 
                    if($candidate_skill===0){ ?>
                    <h3 style="color:red;"> Dont Have Any Skill Yet!</h3>
                    <?php } else{ ?> 
                    <?php foreach ($candidate_skill as $value) { ?>
                    
                        <span class="key">{{ $value->skill_name }}</span>

                <?php }} ?>
                    
                </div>
            </div>
            <div class="section row">
                <h2 class="col">Education</h2>
                <?php 
                if($candidate_eductions===0){ ?>
                <h3 style="color:red;">  Dont Have Any Eduction Yet!</h3>
                <?php }else{    
                foreach ($candidate_eductions as $value) { ?>
                <div class="section-text col-right">
                    <h3><span class="emph">{{$value->degree_title}}</span> in {{$value->degree_level}}</h3>
                    <div>Having <?php if($value->selected_result=='Percentage'){
                        echo $value->percentage;    
                        }   
                        else{
                        echo $value->cgpa.' '.'CPGA';
                        }?> | {{$value->edu_description}}</div>
                    <div class="row">
                        <div class="col light">From {{$value->Institute_name}}</div>
                        <div class="col-right light"><?php echo date('Y',strtotime($value->edu_start)) ?> - <?php echo date('Y',strtotime($value->edu_end)) ?></div>
                    </div>
                </div>
                <?php }} ?>
                
            </div>
            <div class="section row">
                <h2 class="col">Experience</h2>
                 <?php 
                    if($candidate_experience===0){ ?>
                    <h3 style="color:red;">  Dont Have Any Experience Yet!</h3>
                    <?php }else{   
                    foreach ($candidate_experience as $value) { ?>
                <div class="section-text col-right">
                    <div class="row">
                        <div class="col">
                            <h3>{{$value->job_title}}</h3>
                        </div>
                    </div>
                    <div class="row subsection">
                        <div class="emph col light" style="font-family:'Merriweather', serif;">{{$value->your_position}} in {{$value->company_name}} </div>
                        <div class="col-right light"><?php echo date('Y',strtotime($value->exp_start)) ?> - <?php echo date('Y',strtotime($value->exp_end)) ?></div>
                    </div>
                    <div class="key">{{$value->exp_description}}
                    </div>
                          
                </div>
            <?php }} ?>
                

            </div>
            <div class="section row">
                <h2 class="col">Project Experience</h2>
                <?php 
                    if($candidate_project===0){ ?>
                   <h3 style="color:red;">  No Project Experience!</h3>
                 <?php }else{   
                foreach ($candidate_project as $value) { ?>
                <div class="section-text col-right">
                    <div class="row">
                        <div class="col">
                            <h3>{{$value->project_title}}</h3>
                        </div>
                    </div>
                    <div class="row subsection">
                        <div class="emph col light">Project of {{$value->project_company_name}}</div>
                        <div class="col-right light"><?php echo date('Y',strtotime($value->pro_start)) ?> - <?php echo date('Y',strtotime($value->pro_end)) ?></div>
                    </div>
                    <div class="key">{{$value->project_description}}
                        
                    </div>
                </div>
            <?php }} ?>
               
            </div>

            <div class="section row">
                <h2 class="col">Hobbies</h2>
                <div class="section-text col-right">
                    <?php 
                    if($hobb===0){ ?>
                    <h3 style="color:red;"> Dont Have Any Skill Yet!</h3>
                    <?php } else{ 
                    foreach($hobb as $hobbies){
                    ?>
                    <span class="key">{{$hobbies->user_hobbies}}</span>
                    <?php }} ?>
                </div>
            </div>
             <div class="section row" style="margin-bottom: 10%;">
                <h2 class="col">Languages</h2>
                <div class="section-text col-right">
                    <?php 
                    if($languages===0){ ?>
                    <h3 style="color:red;"> Dont Have Any Skill Yet!</h3>
                    <?php } else{ 
                            
                    foreach($languages as $value){
                    ?>
                    <span class="key">{{$value->user_language}}</span>
                <?php }} ?>
                </div>
            </div>
        </div>
    </body>
</html>

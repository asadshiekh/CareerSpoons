<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Career Spoons | Admin-Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="{{url('public/admin_assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('public/admin_assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{url('public/admin_assets/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{url('public/admin_assets/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{url('public/admin_assets/build/css/custom.min.css')}}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <form  method="post">
            @csrf
              <h1>Enter An Email for Update Password</h1>
              <div>
                <input type="email" class="form-control" placeholder="Enter an email" required=""  id="user-email"/>
              </div>
              
              <div>
                <input type="button" class="btn btn-default submit" value="Log in" onclick="check_mail();" />
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1> Career Spoons <i class="fa fa-spoon"></i></h1>
                  <p>© All Rights Reserved. Career Spoons! is a Step Toward our Career and tthis step helps to find a best job or placement for us. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      <!--   <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>For Update Account</h1>
              
              <div>
                <input type="Enter Your email" class="form-control" placeholder="Email" required="" />
              </div>
              
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div> -->
      </div>
    </div>
  </body>
</html>

<script type="text/javascript">
function check_mail(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var email = $("#user-email").val();
  
  // $.post("reset-email-check",{_token:CSRF_TOKEN,email:email},function(data){
  //     if(data){
  //       //window.location.replace("admin-dashboard");
  //       alert(data);
  //     }
  //   });
alert(email);
  }
</script>
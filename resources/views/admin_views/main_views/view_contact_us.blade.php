@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Organization Preview <i class="fa fa-building-o"></i></h3>
      </div>
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2 style="font-family:'italic',bold">All Contact Requests<small style="font-family:'italic',bold">Here... </small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class=""><i class="fa fa-dashboard"></i></a>
              </li>
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <!-- Start Content-->

            <p class="text-muted font-13 m-b-30">

            </p>
            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
              <thead>
                <tr>
                 <th><input type="checkbox" id="check-all" class="flat"> Select All </th>  
                 <th>Candidate Name</th>
                 <th>Email</th>
                 <th>Phone No</th>
                 <th>Reply Status</th>               
                 <th>Action</th>
               </tr>
             </thead>
             <tbody>
              @foreach($contact as $contact)
            <tr id="user-tr"> 
               <th><input type="checkbox" id="check-all" class="flat"></th> 

               <td>{{$contact->candidate_name}}</td>
               <td>{{$contact->candidate_email}}</td>
               <td>{{$contact->candidate_phone}}</td>
               <td style="color: red;">Waiting for Reply
              </td>
           
            <td><a type="button" onclick="view_message('{{$contact->id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="View Message" data-pt-animate="flipInX" data-pt-size="small"><i class="glyphicon glyphicon-eye-open"></i></span></a> | <a type="button" onclick="reply_message('{{$contact->id}}','{{$contact->candidate_name}}','{{$contact->candidate_email}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Reply" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-mail-reply"></i></span></a></td>
          </tr>
          @endforeach
          

        </tbody>
      </table>

    <br/><hr style="border:1px solid #E6E9ED;" /><br/>
       <h2 style="font-family:Georgia regular;font-size: 18px;">All Contact And Message<small style="font-family:'italic',bold"> Here... </small></h2>
       <br/><br/>
      <!--  -->
      <table id="myQual" class="table table-striped table-bordered bulk_action">
              <thead>
                <tr>
                 <th><input type="checkbox" id="check-all" class="flat"> Select All </th>  
                 <th>Candidate Name</th>
                 <th>Email</th>
                 <th>Phone No</th>
                 <th>Reply Status</th>               
                 <th>Action</th>
               </tr>
             </thead>
             <tbody>
              @foreach($contact1 as $contact1)
            <tr id="user-tr"> 
               <th><input type="checkbox" id="check-all" class="flat"></th> 

               <td>{{$contact1->candidate_name}}</td>
               <td>{{$contact1->candidate_email}}</td>
               <td>{{$contact1->candidate_phone}}</td>
               <td style="color: green;">Replied</td>
           
            <td style="text-align: center;"><a type="button" onclick="view_message('{{$contact1->id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="View Message" data-pt-animate="flipInX" data-pt-size="small"><i class="glyphicon glyphicon-eye-open"></i></span></a></td>
          </tr>
          @endforeach
          

        </tbody>
      </table>

      <!-- End Content-->


    </div>
  </div>
</div>
</div>
</div>
</div>
<!--model-->
<div id="model_view_message"></div>
<div id="model_reply_message"></div>
<div id="view_user_model"></div>
<div  id="exampleModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="edit_text">
      </div>

    </div>
  </div>
</div>
<!--/model-->
<style type="text/css">
    #job-detail-des{
    text-decoration: none;
    margin: 5%;
    /*font-family: 'Montserrat', sans-serif;*/
  }
  #job-detail-des li{
    text-decoration: none;
    padding-bottom: 8px;
    padding-top: 7px;
    border-bottom: solid 1px #e0e0e0;
    padding-left: 1%;
  }
  /*#job-detail-des li:nth-child(even){
    background-color: #F9F9F9;
  }*/
  #job-detail-des li{
    background-color:none;
  }
  #job-detail-des li:first-child{
    border-top: solid 2px #e0e0e0;
  }
  #job-detail-des li:nth-child(4){
    border-bottom: none;
  }
  #job-detail-des li:last-child{
    border-bottom: solid 2px #e0e0e0;
  }
  #job-detail-des li span{
    font-size: 14px;
    padding-right: 3%;
    font-weight: bold;
  }
</style>
<script>

</script>
@endsection





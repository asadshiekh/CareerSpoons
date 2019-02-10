@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>FAQ <i class="fas fa-question-circle"></i></h3>
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
            <h2 style="font-family:'italic',bold">All FAQ Settings<small style="font-family:'italic',bold"> Here... </small></h2>
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
            <div class="box-header">
                
              </div>


            <!-- Start Content-->
            <form id="faq_form" action="do_post_faq">
              
            <div class="form-group col-sm-12 col-md-8 col-md-offset-2">
              <label>Your Question:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-asterisk"></i>
                </div>
                <input type="text" class="form-control" name="question" id="question" placeholder="Enter Question">
              </div>
            </div>
            <div class="form-group col-sm-12 col-md-8 col-md-offset-2">
              <label>Your Solution:</label>
              <div class="input-group col-sm-12">
                <textarea type="text" class="form-control" name="answer" id="answer">
                  Witre Your Answer
                </textarea>
              </div>
            </div>
            <div class="form-group col-sm-12 col-md-2 col-md-offset-5">
             
              <div class="input-group col-sm-12">
                <input type="submit" class="btn btn-success" value="Post Question">
              </div>
            </div>

            </form>

            <hr>
           <!-- End Content -->
            <br>
        <table id="faq_datatable" class="table table-striped table-bordered bulk_action responsive no-wrap" style="width: 100%">
              <thead>
                <tr>
                 <th><input type="checkbox" id="check-all" class="flat"> Select All </th>  
                 <th>ID</th>
                 <th>Question</th>
                 <th>Random Key</th>               
                 <th>Action</th>
               </tr>
             </thead>
             <tbody>
            @foreach($faq as $value)         
            <tr> 
               <th><input type="checkbox" id="check-all" class="flat"></th>
                 <td>{{$value->id}}</td>
                 <td>{{$value->question}}</td>
                 <td>faq{{$value->random_key}}</td>      
                 <td><a href="#view_faq" data-toggle="modal" onclick="viewFAQ('{{$value->question}}','{{$value->solution}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="View FAQ" data-pt-animate="flipInX" data-pt-size="small"><i class="glyphicon glyphicon-eye-open"></i></span></a> | <a type="button"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update FAQ" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-pencil"></i></span></a> | <a href="{{url('delete-faq')}}/{{$value->id}}"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete FAQ" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-trash"></i></span></a></td> 
            </tr>
             @endforeach
        
        </tbody>
      </table>


    </div>
  </div>
</div>
</div>
</div>
</div>


<!-- Modal window for add City-->
<div id="view_faq" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form>
     <!--  @csrf -->
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View FAQ?</h4>
        <div class="col-sm-6 col-md-offset-4" id="loading-spin">
          <i id="i" style="font-size:100px"></i>
        </div>
        <div class="col-sm-6 col-md-offset-4" id="loading-true">
          <i id="tru" style="font-size:100px; color: #38b75e"></i>
        </div>
      </div>
      <div class="modal-body" id="modal-content">

      <div class="form-group">
        <label>Question:</label>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-yelp"></i>
          </div>
          <input type="text" class="form-control" name="view_question" id="view_question" readonly="readonly">
        </div>
      </div>


      
      <div class="form-group">
        <label>Solution:</label>
        <div class="input-group col-md-12">
          
          <textarea type="text" class="form-control" name="view_solution" id="view_solution" disabled="disabled">hello</textarea>
        </div>
      </div>
      
        
        <!-- <i class="fa fa-spinner fa-spin" style="font-size:24px"></i> --> 

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
        </div>
      </div>

    </div>
  </form>

</div>
</div>



<script type="text/javascript">
  
function viewFAQ(a,b){
$("#view_question").val(a);
$("#view_solution").val(b);

}

</script>

@endsection





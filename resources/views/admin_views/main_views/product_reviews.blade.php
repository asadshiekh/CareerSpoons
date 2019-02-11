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
          <div class="x_content" style="min-height:500px;">


            <!-- Start Content-->

            <p class="text-muted font-13 m-b-30">

            </p>
           <form>
              <div class="form-group col-sm-12 col-md-8 col-md-offset-2">
              <label>Choose Reviews:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-asterisk"></i>
                </div>
                <select id="choose_review" name="choose_review" class="form-control" onchange="do_change(this.value);">
                   <option hidden selected disabled>Choose Category</option>
                  <option value="candidates">Candidates</option>
                  <option value="organizations">Organizations</option>
                </select>
              </div>
            </div>
           </form>

          <div id="candidate_review">
            <p class="text-muted font-13 m-b-30" style="font-size: 20px;font-weight: 400;font-family: Georgia,Regular;margin-bottom: 2%;margin-top: 3%;">
             Candidate Reviews
           </p>

            <table id="candidate-review-table" class="table table-striped table-bordered bulk_action responsive no-wrap" style="width: 100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Candidate Name</th>
                  <th>Rating</th>
                  <th>Rating Description</th>
                  <th>Visibility Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               @foreach ($candidate_reviews as $value)
                <tr>
                  <td>{{$value->id}}</td>
                  <td>{{$value->candidate_name}}</td>
                  <td>
                    <?php $n=5-$value->rating_points; ?>
                   <?php for($i=1;$i<=$value->rating_points;$i++){ ?>
                   <span class="glyphicon glyphicon-star"></span>
                   <?php }for($i=1;$i<=$n;$i++){?>
                   <span class="glyphicon glyphicon-star-empty"></span>
                    <?php } ?>

                 
                 </td>
                  <td><?php

                    if(empty($value->review_description)){
                        echo "No Review Description";
                    }

                    else{
                      echo $value->review_description;
                    }
                    
                  ?></td>
                  <td id="status-td-candidate-review">
                    <?php 
                        if($value->review_status=="1"){

                          echo "<span style='color:green'>Active</span>";
                        }

                        else{

                          echo "<span style='color:red'>Block</span>";
                        }
                    ?>


                  </td>
                  <td><select id="candidate_review_status" onchange="change_candidate_review_status(this.value,{{$value->candidate_id}});">
                      <option selected="selected" disabled="disabled" hidden="hidden">Select Status</option>
                       <option value="1">Active</option>
                       <option value="0">Block</option>
                     </select></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>


          <div id="organization_review">
            <p class="text-muted font-13 m-b-30" style="font-size: 20px;font-weight: 400;font-family: Georgia,Regular;margin-bottom: 2%;margin-top: 3%;">
             Organization Reviews
           </p>

            <table id="organization-review-table"  class="table table-striped table-bordered bulk_action">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Organization Name</th>
                  <th>Rating</th>
                  <th>Rating Description</th>
                  <th>Visibility Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               @foreach ($organization_reviews as $value)
                <tr>
                  <td>{{$value->id}}</td>
                  <td>{{$value->company_name}}</td>
                  <td>
                    <?php $n=5-$value->rating_points; ?>
                   <?php for($i=1;$i<=$value->rating_points;$i++){ ?>
                   <span class="glyphicon glyphicon-star"></span>
                   <?php }for($i=1;$i<=$n;$i++){?>
                   <span class="glyphicon glyphicon-star-empty"></span>
                    <?php } ?>
                  </td>
                  <td>
                    <?php

                    if(empty($value->review_description)){
                        echo "No Review Description";
                    }

                    else{
                      echo $value->review_description;
                    }
                    
                  ?>
                  </td>
                  <td id="status-td-organization-review">
                      
                      <?php 
                        if($value->review_status=="1"){

                          echo "<span style='color:green'>Active</span>";
                        }

                        else{

                          echo "<span style='color:red'>Block</span>";
                        }
                    ?>

                  </td>
                   <td>
                     <select id="organization_review_status" onchange="change_orgization_review_status(this.value,{{$value->organization_id}});">
                      <option selected="selected" disabled="disabled" hidden="hidden">Select Status</option>
                       <option value="1">Active</option>
                       <option value="0">Block</option>
                     </select>
                   </td>
                </tr>
                 @endforeach
           
              </tbody>
            </table>
          </div>
      <!--  -->
    
      <!-- End Content-->


    </div>
  </div>
</div>
</div>
</div>
</div>


<script>
function do_change(x){

  if(x=="candidates"){
   $("#organization_review").hide();
   $("#candidate_review").show();
 }

 else if(x=="organizations"){

   $("#organization_review").show();
   $("#candidate_review").hide();
 }

}


function change_candidate_review_status(val,id){

 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$.post("candidate-reviews-change-status",{_token:CSRF_TOKEN,val:val,id:id},function(data){

      if(data=="yes"){

      if(val=="1"){

        setTimeout(
          function(){

            swal('Review Status is Visible On Site!','','success');

          },
          500
          );

         $("#status-td-candidate-review").html("<span style='color:green;text-align:center'>Active</span>");

      }else{

        setTimeout(
          function(){

            swal('Review Status is Blocked!','','success');

          },
          500
          );
        $("#status-td-candidate-review").html("<span style='color:red;text-align:center'>Block</span>");

      }

      }
      else{

        setTimeout(
          function(){

            swal({
              type: 'error',
              title: 'Oops...',
              text: 'Connection Failed!!',
              footer: '<a href>Why do I have this issue?</a>'
            })
          },
          1000
          );

      }

  });

}

function change_orgization_review_status(val,id){


   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$.post("organization-reviews-change-status",{_token:CSRF_TOKEN,val:val,id:id},function(data){

      if(data=="yes"){

      if(val=="1"){

        setTimeout(
          function(){

            swal('Review Status is Visible On Site!','','success');

          },
          500
          );

         $("#status-td-organization-review").html("<span style='color:green;text-align:center'>Active</span>");
      }else{

        setTimeout(
          function(){

            swal('Review Status is Blocked!','','success');

          },
          500
          );
        $("#status-td-organization-review").html("<span style='color:red;text-align:center'>Block</span>");

      }

      }
      else{

        setTimeout(
          function(){

            swal({
              type: 'error',
              title: 'Oops...',
              text: 'Connection Failed!!',
              footer: '<a href>Why do I have this issue?</a>'
            })
          },
          1000
          );

      }

  });

}


</script>
@endsection





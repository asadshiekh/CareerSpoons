@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form <small>Sessions</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <!-- Smart Wizard -->
            <p>form for data.</p> 
            <button onclick="clickme();">click me</button>    
            @foreach($posts as $post) 

              <p>{{$post->job_title}}</p>
            @endforeach
              <div id="grid"></div>
                 <button type="button" onclick="loadMoreData();">btn</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- /page content -->

  <script type="text/javascript">
    function clickme(){
      alert("yes");
    var notyf = new Notyf();
    notyf.confirm('Your changes have been successfully saved!');
    notyf.alert('Something Went Worng Plz Try Again');

    }

  </script>
  <script type="text/javascript">
    var pageNumber = 1;

    $(document).ready(function() {
            $.ajax({
                type : 'GET',
                url: "admin-register1?page=" +pageNumber,
                success : function(data){
                    pageNumber +=1;
                        if(data.length == 0){
                        }else{
                            $('#grid').append(data.html);
                        }
                },error: function(data){

                },
            })  
    });

    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            $.ajax({
                type : 'GET',
                url: "admin-register1?page=" +pageNumber,
                success : function(data){
                    pageNumber +=1;
                        if(data.length == 0){
                        }else{
                            $('#grid').append(data.html);
                        }
                },error: function(data){

                },
            })  
        }
    });

    function loadMoreData(){
            $.ajax({
                type : 'GET',
                url: "admin-register1?page=" +pageNumber,
                success : function(data){
                    pageNumber +=1;
                        if(data.length == 0){
                            // :( no more articles
                        }else{
                            $('#grid').append(data.html);
                        }
                },error: function(data){
                      alert("no");
                },
            })  
    }
</script>



  @endsection
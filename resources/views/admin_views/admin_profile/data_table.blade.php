<table id="employee" class="table table-striped table-bordered bulk_action">
                  <thead>
                    <tr>
                     <th><input type="checkbox" id="select-all" class="flat"> Select All </th>  
                     <th>Employee Name</th>
                     <th>Employee Phone No</th>
                     <th>Employee Email</th>     
                     <th>Account</th>            
                     <th>Action</th>
                   </tr>
                 </thead>
                 <tbody>
                  <!-- <tr id="employee-tr"></tr> -->
                  <?php $info = DB::table('Admin_account')->where('account_right','!=', 'superadmin')->get(); ?>
                  @foreach($info as $em_info)
                  <tr id="employee-tr{{$em_info->account_id}}" class="employee-tr"> 
                   <th><input type="checkbox" name="check_all_org[]" class="flat" value="{{$em_info->account_id}}"></th> 
                   <td id="{{$em_info->account_id}}">{{$em_info->admin_fullname}}</td>
                   <td id="{{$em_info->account_id}}">{{$em_info->admin_phone}}</td>
                   <td id="{{$em_info->account_id}}">{{$em_info->admin_email}}</td>
                   <td>
                    <?php if($em_info->account_activation == 'true'){?>
                    <input type="checkbox" id="toggle-account" data-toggle="toggle" data-on="Active" data-off="Block" data-size="normal" data-width="null" checked data-offstyle="danger" value="{{$em_info->account_id}}">
                    
                  <?php }else if($em_info->account_activation == 'false'){ ?>
                    <input type="checkbox" id="toggle-account-b" data-toggle="toggle" data-on="Active" data-off="Block" data-size="normal" data-width="null"  data-offstyle="danger" value="{{$em_info->account_id}}">
                  <?php }?>
                  </td>

                    <td><a><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update Organization" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-pencil"></i></span></a> | <a onclick="delete_employee('{{$em_info->account_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete Employee Account" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-trash"></i></span></a> | <a href=""><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="View Employee Details" data-pt-animate="flipInX" data-pt-size="small"><i class="glyphicon glyphicon-eye-open"></i></span></a></a></td>
                  </tr>
              @endforeach
                </tbody>
                <tfoot>
                  <!-- <tr id="employee-tr"></tr> -->
                  
                </tfoot>

              </table>
<script>
$('#employee').DataTable();
$('#toggle-account').bootstrapToggle();
$('#toggle-account-b').bootstrapToggle();
</script>
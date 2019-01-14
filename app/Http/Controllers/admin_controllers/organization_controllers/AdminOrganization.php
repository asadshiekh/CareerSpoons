<?php

namespace App\Http\Controllers\admin_controllers\organization_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use validator;

class AdminOrganization extends Controller
{
	/* Organization type Operations functions*/

	public function viewCompanyType(Request $request)
	{
		$types=DB::table('company_types')->get();
		// echo $v=count($types);
		// $view=array('recods' => $v );
		// $request->session()->put($view);
		return view('admin_views/organization_views/view_organization_type',['types'=>$types]);
	}
	public function addCompanyType(Request $request)
	{

		$company_type = $request->post('company_type');
		$current_date = date("Y.m.d h:i:s");
		$data = array(
			"company_type_name" => str_replace(" ","_",$company_type),
			"created_at" => $current_date,
			"updated_at" => $current_date
		);

		if(DB::table('company_types')->insert($data)){
       //return "yes";
			$id=DB::getPdo()->lastInsertId();
			echo '<option id="type-option" value="'.$company_type.'">'.$company_type.'</option>';

		}
	}

	public function deleteCompanyType(Request $request){
		$type_id = $request->post('x');
		if(DB::table('company_types')->where(['company_type_id' => $type_id])->delete()){
			echo "yes";
		}
	}

	public function addTableCompanyType(Request $request){
		$company_type = $request->post('company_type');
		$current_date = date("Y.m.d h:i:s");
		$data = array(
			"company_type_name" => str_replace(" ","_",$company_type),
			"created_at" => $current_date,
			"updated_at" => $current_date
		);

		if(DB::table('company_types')->insert($data)){
			$id=DB::getPdo()->lastInsertId();
			echo $id;

		}
	}


	public function deleteCheckCompanyType(Request $request){

		$ids=count($_POST['check_all']);

		if(count($_POST['check_all'])>0){
			foreach ($_POST['check_all'] as $row) {
				echo $chk_all[]=$row;
				DB::table('company_types')->where(['company_type_id' => $row])->delete();   

			}
			$request->session()->flash('success', $ids);
			return redirect('company-type');

			$request->session()->flash('Access', true);
		}
	}

	
	public function updateModelType(Request $request){
		$type_name=$request->post('name');
		$type_id=$request->post('id');
		$data=DB::table('Company_types')->where(['company_type_id'=>$type_id])->first();
		echo '<div id="myModal3" class="modal fade" role="dialog">
		<div class="modal-dialog">
		<!-- Modal content-->
		<form>
		<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Update City ?</h4>
		</div>
		<div class="modal-body" id="modal-content">
		<label>Enter Updated Name:</label>
		<div class="input-group">
		<div class="input-group-addon">
		<i class="fa fa-yelp"></i>
		</div>
		<input type="hidden" value="'.$type_id.'" id="type_id">
		<input type="text" placeholder="Update industry name here" class="form-control" name="up_company_type" id="up_company_type" value="'.$data->company_type_name.'">
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-default" onclick="edit_type();">Update</button>
		</div>
		</div>
		</div>
		</form>

		</div>
		</div>';
	}
	public function updateType(Request $request){
		$current_date = date("Y.m.d h:i:s");
		$type=$request->post('type');
		$id=$request->post('id');
		$type_up=array(
			'company_type_name'=>$type,
			'updated_at'=>$current_date
		);
		if(DB::table('Company_types')->where(['company_type_id'=>$id])->update($type_up)){
			echo "yes";
		}
	}


//organization all work done here
	public function addOrganizationForm()
	{
		$rows=DB::table('company_types')->get();
		$city=DB::table('Add_cities')->get();
		$industry=DB::table('Company_industries')->get();
		return view('admin_views/organization_views/add_organization',['row'=>$rows,'city'=>$city,'industry'=>$industry]);

	}
	
	public function viewRegistedOrganization()
	{
		$organizations=DB::table('Add_organizations')->get();
		return view('admin_views/organization_views/view_organization',['organizations'=>$organizations]);

	}
	public function addCompanyForm(Request $request)
	{

		$company_name = $request->post('company_name');
		$company_type = $request->post('selected_company_type');
		$company_city = $request->post('selected_city');
		$company_branch = $request->post('company_branch_name');
		$company_phone = $request->post('company_phone');
		$company_website = $request->post('company_website');
		$company_employees = $request->post('selected_employees');
		$company_industry = $request->post('selected_industry');
		$company_since = $request->post('company_since');
		$company_location = $request->post('company_location');
		$company_email = $request->post('company_email');
		$company_password = $request->post('company_password');
		$company_cnic = $request->post('company_cnic');
		$company_info = $request->post('company_info');
		$current_date = date("Y.m.d h:i:s");
		$file=$request->file('company_doc');

		$new_name = rand().'.'.$file->getClientOriginalExtension();
		$destination='uploads/organization_documents';
		if($file->move($destination,$new_name)){

			$organization = array(
				"company_name" => $company_name,
				"company_type" => $company_type,
				"company_city" => $company_city,
				"company_branch" => $company_branch,
				"company_phone" => $company_phone,
				"company_website" => $company_website,
				"company_employees" => $company_employees,
				"company_industry" => $company_industry,
				"company_since" => $company_since,
				"company_location" => $company_location,
				"company_email" => $company_email,
				"company_password" => $company_password,
				"org_activation" => "Active",
				"company_cnic" => $company_cnic,
				"company_info" => $company_info,
				"company_document" => $new_name,
				"created_at" => $current_date,
				"updated_at" => $current_date
			);
			DB::table('add_organizations')->insert($organization);
			echo $id=DB::getPdo()->lastInsertId();
			$picture_up=array(
				'company_img'=>"user.png",
				'company_id'=>$id
			);
			DB::table('upload_org_img')->insert($picture_up);
		}
		


	}
	public function deleteCheckOrg(Request $request){
		echo $ids=count($_POST['check_all_org']);

		if(count($_POST['check_all_org'])>0){
			foreach ($_POST['check_all_org'] as $row) {
				echo $chk_all[]=$row;
				DB::table('add_organizations')->where(['company_id' => $row])->delete();   

			}
			$request->session()->flash('success', $ids);
			return redirect('view-organization');

			$request->session()->flash('Access', true);
		}

	}
	public function deleteOrganization(Request $request)
	{
		$org_id = $request->post('o');
		if(DB::table('add_organizations')->where(['company_id' => $org_id])->delete()){
			echo "yes";
		}
	}

	public function updateOrganization(Request $request){
		$id=$request->post('id');
		$data=DB::table('add_organizations')->where(['company_id' => $id])->first();
		echo '
		<div id="mymodal5" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
		<div class="modal-content">

		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		</button>
		<h4 class="modal-title" id="myModalLabel">Alter Organization Information</h4>
		</div>
		<div class="modal-body">

		<form id="data">
		<!-- Company Name-->
		<div class="form-group col-sm-5 col-md-offset-1">
		<label>Company Name:</label>
		<div class="input-group">
		<div class="input-group-addon">
		<i class="fa fa-optin-monster"></i>
		</div>
		<input type="text" class="form-control" placeholder="Enter Company Name" name="new_company_name" id="new_company_name" value="'.$data->company_name.'">
		</div>     
		</div>
		<!-- Company Type-->
		<div class="form-group col-sm-5">
		<label>Company Type:</label>
		<div class="input-group">
		<div class="input-group-addon">
		<i class="fa fa-building"></i>
		</div>
		<select name="new_selected_company_type" class="form-control" placeholder="select no of Employees" id="new_selected_company_type">
		<option id="type-option" value="'.$data->company_type.'" selected="selected">'.$data->company_type.'</option>
		<option id="type-option" value=""></option>
		</select>
		<span class="input-group-btn">
		<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-default">Add Type</button>
		</span>
		</div>

		</div>

		<!-- City-->
		<div class="form-group col-sm-5 col-md-offset-1">
		<label>City:</label>
		<div class="input-group">
		<div class="input-group-addon">
		<i class="fa fa-flag-o"></i>
		</div>
		<select name="new_selected_city" class="form-control" placeholder="select city" id="new_selected_city">
		<option id="city-option" value="'.$data->company_city.'"  selected="selected">'.$data->company_city.'</option>
		<option id="city-option" value=""></option>
		</select>
		<span class="input-group-btn">
		<button type="button" data-toggle="modal" data-target="#myModal1" class="btn btn-default">Add City</button>
		</span>
		</div>
		</div>
		<!-- Branch Name -->
		<div class="form-group col-sm-5">
		<label>Branch Name or Code:</label>
		<div class="input-group">
		<div class="input-group-addon">
		<i class="fa fa-barcode"></i>
		</div>
		<input type="text" class="form-control" placeholder="Enter Branch Name or Code" name="new_company_branch_name" id="new_company_branch_name" value="'.$data->company_branch.'">
		</div>     
		</div>

		<!-- Phone No-->
		<div class="form-group col-sm-5 col-md-offset-1">
		<label>Phone No:</label>
		<div class="input-group">
		<div class="input-group-addon">
		<i class="fa fa-phone"></i>
		</div>
		<input type="text" placeholder="Enter Phone No" class="form-control" name="new_company_phone" id="new_company_phone" value="'.$data->company_phone.'">
		</div>
		</div>
		<!-- Website link -->
		<div class="form-group col-sm-5">
		<label>Website Link:</label>
		<div class="input-group">
		<div class="input-group-addon">
		<i class="fa fa-external-link"></i>
		</div>
		<input type="link" placeholder="Insert Website Link Here" class="form-control" name="new_company_website" id="new_company_website" value="'.$data->company_website.'">
		</div>
		</div>
		<!-- No of Employees-->
		<div class="form-group col-sm-5 col-md-offset-1">
		<label>No of Employees:</label>
		<div class="input-group">
		<div class="input-group-addon">
		<i class="fa fa-users"></i>
		</div>
		<select class="form-control" id="new_selected_employees" name="new_selected_employees">
		<option value="'.$data->company_employees.'" selected="selected">'.$data->company_employees.'</option>
		<option value="Start Up">Start Up</option>
		<option value="1 to 15">1 to 15</option>
		<option value="15 to 25">15 to 25</option>
		<option value="25 to 50">25 to 50</option>
		<option value="50 to 100">50 to 100</option>
		<option value="100 to 200">100 to 200</option>
		<option value="more then 200">more then 200</option>
		</select>
		</div>
		</div>
		<!-- Industry -->
		<div class="form-group col-sm-5">
		<label>Industry:</label>
		<div class="input-group">
		<div class="input-group-addon">
		<i class="fa fa-industry"></i>
		</div>
		<select name="new_selected_industry" class="form-control" placeholder="select industry" id="new_selected_industry">
		<option id="industry-option" selected="selected" value="'.$data->company_industry.'">'.$data->company_industry.'</option>

		<option id="industry-option" value=""></option>

		</select>
		<span class="input-group-btn">
		<button type="button" data-toggle="modal" data-target="#myModal2" class="btn btn-default">Add Industry</button>
		</span>
		</div>
		</div>
		<!-- Operating Since -->
		<div class="form-group col-sm-5 col-md-offset-1">
		<label>Operating Since:</label>
		<div class="input-group">
		<div class="input-group-addon">
		<i class="fa fa-history"></i>
		</div>
		<input type="date" class="form-control" placeholder="Enter Email OR Username" name="new_company_since" id="new_company_since" value="'.$data->company_since.'">
		</div>
		</div>
		<!-- Cnic-->
		<div class="form-group col-sm-5">
		<label>CNIC No:</label>
		<div class="input-group">
		<div class="input-group-addon">
		<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
		</div>
		<input type="cnic" class="form-control" name="new_company_cnic" id="new_company_cnic" placeholder="35201-2345678-7" value="'.$data->company_cnic.'">
		</div>
		</div>


		<!-- Address-->
		<div class="form-group col-sm-8 col-md-offset-2">
		<label>Location or Address:</label>
		<div class="input-group">
		<div class="input-group-addon">
		<i class="fa fa-map-marker"></i>
		</div>
		<input id="new_company_location" name="new_company_location" class="form-control" placeholder="Enter Address Here" value="'.$data->company_location.'"/>

		</div>
		</div>


		<!-- About Company -->
		<div class="form-group col-sm-8 col-md-offset-2">
		<label>About Company (atleast  20 words):</label>
		<div class="input-group col-sm-12">

		<textarea name="post_info" id="post_info" class="form-control" rows="4" placeholder="Enter Some Info About Your Company Here...." >'.$data->company_info.'</textarea>

		</div>
		</div>


		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary" onclick="update_org_info('.$id.');">Save Changes</button>
		</div>
		</form>

		</div>
		</div>
		</div>';

	}  
	public function updateCompanyData(Request $request){
		$current_date = date("Y.m.d h:i:s");
		$id= $request->post('x');
		$up_organization=array(
			"company_name" => $request->post('a'),
			"company_type" => $request->post('b'),
			"company_city" => $request->post('c'),
			"company_branch" => $request->post('d'),
			"company_phone" => $request->post('e'),
			"company_website" => $request->post('f'),
			"company_employees" => $request->post('g'),
			"company_industry" => $request->post('h'),
			"company_since" => $request->post('i'),
			"company_location" => $request->post('k'),
			"company_cnic" => $request->post('j'),
			"company_info" => $request->post('l'),
			"updated_at" => $current_date
		);
	if(DB::table('Add_organizations')->where(['company_id'=>$id])->update($up_organization)){
		echo "yes";
	}
	}

	public function changeOrgStatus(Request $request){
		$status=$request->post('x');
		$id=$request->post('id');

		$org_status=array(
			'org_activation'=>$status
		);
		if(DB::table('Add_organizations')->where(['company_id'=>$id])->update($org_status)){
         echo $id;
		}
		

	}


}






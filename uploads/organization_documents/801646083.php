<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin_Model");
		
		if(!$this->session->userdata('Admin_Logged_In')){
			redirect("Welcome/login");
		}
	}


	public function index()
	{	
		$data['content']="admin/index";
		$data['total_orders'] = $this->Admin_Model->fetch_total_orders();
		$data['total_user'] = $this->Admin_Model->fetch_total_users();
		$data['total_coupon'] = $this->Admin_Model->fetch_total_coupon();				
		$this->load->view("template",$data);

	}

	public function profile(){

		$data['content']="admin/Profile";
		$this->load->view("template",$data);
	}

	public function Add_Product()
	{				
		$data['content']="admin/Add_Product";
		$data['fetch_size'] =$this->Admin_Model->Show_Size();
		$data['fetch_gender'] =$this->Admin_Model->Show_gerders();
		$data['fetch_category'] =$this->Admin_Model->Show_Category();
		$data['fetch_color'] =$this->Admin_Model->Show_Color();
		$this->load->view("template",$data);
	}
	
	/*public function Show_Data()
	{	
		$data['fetch'] =$this->Admin_Model->Show_All_items();			
		$this->load->view('Admin/Show_Data',$data);
	}*/

	public function Stocks()
	{	
		$data['content']="admin/Stocks";
		$data['fetch_product_data'] =$this->Admin_Model->Show_All_Stocks();
		$data['fetch_sizes_data']=$this->Admin_Model->Show_Size();
		$data['fetch_gender_data'] =$this->Admin_Model->Show_gerders();
		$data['fetch_category_data'] =$this->Admin_Model->Show_Category();
		$data['fetch_color_data'] =$this->Admin_Model->Show_Color();
		$this->load->view('template',$data);
	}

	public function insert_Product(){

		$name=$this->input->post("name");
		$p1=$this->input->post("p1");
		$p2=$this->input->post("p2");
		$this->Admin_Model->insert_prodct($name,$p1,$p2);
	}

	public function Add_stuff(){

	//	$path  = './uploads/Admin/Add_Product/';
		$name=$this->input->post("name");
		$code=$this->input->post("code");
		$gender= $this->input->post("select_gender");
		$category= $this->input->post("select_category");
		$description= $this->input->post("description");
		$old_price= $this->input->post("old_price");
	//	$img = $this->do_upload($path);
		$total_sizes = count($_POST["select_size"]);
		$total_color = count($_POST["color"]);


		if(count($_POST['select_size'])>0){
			foreach($_POST['select_size'] as $row){
				//echo "Value".$row."<br/>\n";
				$size_items[] = $row;
			}
		}

		if(count($_POST['price'])>0){
			foreach ($_POST['price'] as $row) {
     	//	echo "Value".$row."<br/>\n";
				$price_items[] = $row;
			}
		}

		if(count($_POST['color'])>0){
			foreach ($_POST['color'] as $row) {
     	//	echo "Value".$row."<br/>\n";
				$color_items[] = $row;
			}
		}

		/*echo "<pre>";
		print_r($size_items);
		echo "</pre>";

		echo "<pre>";
		print_r($price_items);
		echo "</pre>";*/
		
		/*$res = $this->Admin_Model->Add_Staff($name,$code,$size,$price,$gender,$category,$color,$description,$img);
		if($res){echo 1;}
		else{echo 0;}*/

		/*if(count($_POST['price'])>0){
			foreach ($_POST['price'] as $row) {
     //	echo "Value".$row."<br/>\n";
				$price_items[] = $row;
			}
		}
   //  print_r($size_items);
  // print_r($price_items);*/


		$last_inserted_id	= $this->Admin_Model->Add_Staff($name,$code,$gender,$category,$description,$size_items,$price_items,$color_items,$old_price,$total_sizes,$total_color);


		$imgCount = count($_FILES['image']['name']);

		for($i = 0; $i < $imgCount; $i++){

			$_FILES['userFile']['name'] = $_FILES['image']['name'][$i];
			$_FILES['userFile']['type'] = $_FILES['image']['type'][$i];
			$_FILES['userFile']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
			$_FILES['userFile']['size'] = $_FILES['image']['size'][$i];

			$config['upload_path'] = './uploads/Admin/Add_Product/';
			$config['allowed_types'] = 'gif|jpg|png|jpge';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('userFile')){ 
				$fileData = $this->upload->data(); 	
				$uploadData[$i]['file_name'] = $fileData['file_name'];  
				
				if($i<2){

					$this->db->set("Image_name$i",$uploadData[$i]['file_name']);
					$this->db->where('Product_id',$last_inserted_id);
					$this->db->update('product'); 

				}

				$all_images=array(
					"Image_name"=>$uploadData[$i]['file_name'],
					"Product_id"=>$last_inserted_id						
					);			
				$this->db->insert("product_image",$all_images); //Active Record Method

				 //$this->Admin_Model->Add_Images($all_images,$i);

			}

		}


	}


	public function Add_Single_Size(){

		$size=$this->input->post("size");
		$res = $this->Admin_Model->Add_Size($size);
		if ($res){echo 1;}
		else {echo 0;}
	}

	public function Add_Single_Gender(){

		$gender=$this->input->post("gender");
		$res = $this->Admin_Model->Add_Gender($gender);
		if ($res){echo 1;}
		else {echo 0;}
	}


	public function Add_Single_Category(){

		$category=$this->input->post("category");
		$res = $this->Admin_Model->Add_Category($category);
		if ($res){echo 1;}
		else {echo 0;}
	}

	public function Add_Single_Color(){

		$color=$this->input->post("color");
		$res = $this->Admin_Model->Add_Color($color);
		if ($res){echo 1;}
		else {echo 0;}
	}

	public function Add_field(){
		echo $this->input->post("x");
		$result=$this->db->get("product_sizes")->result(); 
		foreach($result as $row){
			echo '<option id="opt_size" value="'.$row->Size_name.'" selected="selected">'.$row->Size_name.'</option>';	
		}
	}

	public function Add_More_Color(){
		
		echo '<input type="text" class="form-control my-colorpicker1" name="color[]" id="select_color" placeholder="Select color">';
	}

	public function Delete_Record_From_Stocks(){

		$id=$this->input->post("id");
		$res = $this->Admin_Model->Delete_Record_From_Stocks($id);
		if($res){echo 1;}
		else{echo 0;}
	}

	public function fetch_price(){

		$id=$this->input->post("id");
		$result = $this->Admin_Model->getPrice($id);

		foreach ($result->result() as $row) {
			$price[] = $row->price; 
		}
		
		echo implode(",",$price);
		//echo implode(",",$price);

	}

	public function fetch_sizes(){

		$id = $this->input->post("id");
		$result = $this->Admin_Model->getSize($id);
		
		foreach ($result->result() as $row) {
			$size[] = $row->Sizes_id;
		}
		
		echo implode(",",$size);

	}


	public function fetch_colors(){

		$id = $this->input->post("id");

		$result = $this->Admin_Model->getcolor($id);
		echo  $result->Color_name;


	}


	public function Coupon(){

		$data['content']="admin/Add_Coupon";
		$data['fetch_coupon'] = $this->Admin_Model->fetch_coupon();
		$this->load->view('template',$data);
	}

	public function Add_Coupon(){

		$discount = $this->input->post("discount");
		$coupon_number = $this->input->post("coupon_number");
		$cop_date = $this->input->post("cop_date");
		$coupon_availability = $this->input->post("coupon_availability");
		$Product_code = $this->input->post("Product_code");
		$result = $this->Admin_Model->Add_Coupon($coupon_number,$discount,$cop_date,$coupon_availability,$Product_code);

		if($result){

			echo $result; 
		}

		else{

			echo 0;
		}
	}

	public function rand_number(){

		//$coupon_number = $this->input->post("coupon_number");
		echo $coupon_number=rand(999999,9999999);

	}

	public function Delete_Coupon_Record(){

		$id = $this->input->post("id");
		$result = $this->Admin_Model->Delete_Coupon_Record($id);

		if($result){

			echo 1;
		}

		else{

			echo 0;
		}
	}
	
	public function Update_Coupon_Record(){

		$id = $this->input->post("id");
		$coupon_number = $this->input->post("coupon_number");
		$discount = $this->input->post("discount");
		$coupon_availability = $this->input->post("coupon_availability");
		$coupon_date = $this->input->post("coupon_date");
		$Product_code = $this->input->post("Product_code");

		$result = $this->Admin_Model->Update_Coupon_Records($id,$coupon_number,$discount,$coupon_availability,$coupon_date,$Product_code);

		if($result){

			echo "yes";
		}

		else{

			echo "false";
		}
	}

	public function formbuilder(){

		$data['content']="admin/formbuilder";
		$this->db->select('*'); 
		$data['fetch_category']=$this->db->get('product_categories')->result();
		$this->load->view("template",$data);
	}

	public function Orders(){

		$data['content']="admin/Orders";
		$data['fetch_orders'] = $this->Admin_Model->fetch_orders();			
		$this->load->view("template",$data);
	}

	public function Manage_Slider(){

		$data['content']="admin/Manage_Slider";	
		$data['fetch_slider_data']=$this->Admin_Model->fetch_slider_data();		
		$this->load->view("template",$data);
	}
	
	public function image($address,$id){
		$imgCount = count($_FILES['img']['name']);
		for($i = 0; $i < $imgCount; $i++){
			$_FILES['userFile']['name'] = $_FILES['img']['name'][$i];
			$_FILES['userFile']['type'] = $_FILES['img']['type'][$i];
			$_FILES['userFile']['tmp_name'] = $_FILES['img']['tmp_name'][$i];
			$_FILES['userFile']['size'] = $_FILES['img']['size'][$i];

			$config['upload_path'] = $address;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('userFile')){

				$fileData = $this->upload->data();
				$uploadData[$i]['file_name'] = $fileData['file_name'];

				if($i<2){
					$this->db->set("image_name$i",$uploadData[$i]['file_name']);
					$this->db->where('id',$id);
					$this->db->update('manage_slider'); 
				} 

			}
		}

	}

	public function Add_Slider(){

		$main_heading = $this->input->post("main_heading");
		$f_title = $this->input->post("f_title");
		$f_des = $this->input->post("f_des");
		$s_title = $this->input->post("s_title");
		$s_des = $this->input->post("s_des");
		$id = $this->Admin_Model->Add_Slider($main_heading,$f_title,$f_des,$s_title,$s_des);
		$address='./uploads/Admin/Slider_Images/';
		$image=$this->image($address,$id);

	}

	public function dynamic_forms(){

		//$other_db = "clothesshop";

		
		$category = $this->input->post("category");
		$x = $this->input->post("x");
		$x	 = trim($x);
		$dynamic_data = array(
			'category'	=> $category,
			'dynamic_fields' => $x
			);

		$this->db->insert("dynamic_forms",$dynamic_data);
		
		//$this->create_table($category);
		
	}



	// 1st Try
	/*public function create_table($category){

		$result = $this->Admin_Model->create_new_table($category);

	}*/

	// 2nd Try
	/*public function file_handeling(){

		$txt = $this->input->post("lable");
		//$txt2 = "LastName varchar(255)";
		//$txt3 = $txt.$txt2;
		if(file_exists("text.txt")){

			The existing data in file is preserved. File pointer starts at the end of the file. Creates a new file if the file doesn't exist
			$myfile = fopen("test.txt","r+");
			fwrite($myfile,$txt3);
			fclose($myfile);
			echo "yes";
		}
		else{

			Erases the contents of the file or creates a new file if it doesn't exist. File pointer starts at the beginning of the file
			$myfile = fopen("test.txt","a+");
			fwrite($myfile, $txt3);
			fclose($myfile);
			echo "yes";
		}


	}*/


	public function dynamic_structure(){

		$field = $this->input->post("lable");
		$result = $this->Admin_Model->Add_Field($field);

		if($result){

			echo "yes";
		}

		else{

			echo "no";
		}
	}

	public function dynamic_structure_delete(){

		$field = $this->input->post("x");

		$result = $this->Admin_Model->Delete_Field($field);

		if($result){

			echo "yes";
		}

		else{

			echo "no";
		}

	}


	public function fetch_form_against_category(){

		$category = $this->input->post("x");

		$result = $this->Admin_Model->fetch_form($category);
		
		echo $result->dynamic_fields;

	}



/*	public function file()
	{
		$this->load->view("file");
	}



	public function do_upload($x)
	{   
   		
   		proper image uploading fucntion working.

		$config=array(
			"upload_path"=>$x,
			"allowed_types"=>'gif|jpg|png',
			"max_size"=>10000,
			"max_width"=>12504,
			"max_height"=>1542,
			"encrypt_name"=>true
			);
               $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload',$config);
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('image')) // nayab said move wala 
                {
                	$error = $this->upload->display_errors();
                	print_r($error);
                }
                else
                {
                	$data = $this->upload->data();
                	return $data["file_name"];
                }
            }*/


            public function Add_menu(){

            	$data['content']="admin/Add_menu";	
            	$data['fetch_menu']= $this->Admin_Model->fetch_menu(); 
            	$this->load->view("template",$data);
            }

            public function asad(){

            	echo "asad";
            }

            public function Add_parent(){

            	$Add_menu = $this->input->post("Add_menu1");
            	$result = $this->Admin_Model->insert_Menu($Add_menu);

            	if($result){

            		$this->session->set_flashdata("Success",'<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><strong>Success!</strong> Menu is Added Successfully</div>');
            	}

            	else{

            		$this->session->set_flashdata("Error_Msg","<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Fail!</strong>Something Wrong Data is not Insert into Database</div>");

            	}

            	redirect ('Admin/Add_menu');

            }

            public function Sub_menu(){

            	$select_menu = $this->input->post("select_menu");
            	$Add_sub_menu = $this->input->post("Add_sub_menu");
            	$result = $this->Admin_Model->insert_sub_Menu($select_menu,$Add_sub_menu);



            	if($result){

            		$this->session->set_flashdata("Success",'<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><strong>Success!</strong> Sub Menu is Added Successfully</div>');
            	}

            	else{

            		$this->session->set_flashdata("Error_Msg","<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Fail!</strong>Something Wrong Data is not Insert into Database</div>");

            	}

            	redirect ('Admin/Add_menu');

            }

        }
        ?>
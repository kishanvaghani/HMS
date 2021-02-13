<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Store_student extends MX_Controller
{

function __construct() {
parent::__construct();
$this->load->library('form_validation');
 
$this->load->helper('captcha');
}

function aboutus()
{

	$this->load->view('aboutus1');
} 
function homepage()
{

	$this->load->view('website_home');
}
 public function index()
 {
 	$this->load->view('dashboard.php');
 }
function getRoom()
 {

	$floor_id=$this->input->get("floor_id");
	$hostel_id=$this->input->get("hostel_id");

	$this->db->select("floor_name,hostel_id,room_number");
	$this->db->where("floor_name",$floor_id);
	$this->db->where("hostel_id",$hostel_id);
	$res=$this->db->get("room_details");
	
    $mydata='<option value disabled selected>--Select Your Room--</option>';
   foreach ($res->result() as $row)
    {
   		
    	$mydata=$mydata.'<option value="'.$row->room_number.'">Room No. '.$row->room_number.'</option>';
    	
    }
    $data["showdata"]=$mydata;
	echo json_encode($data);
}



 function getFloor()
 {

	$hostel_id=$this->input->get("hostel_id");
	$this->db->where("id",$hostel_id);
	$res=$this->db->get("hostel_details");
	$totfloor=$res->row();
	$floor=$totfloor->hostel_floor;

    $mydata='<option value disabled selected>--Select Hostel Floor--</option>';
    for($i=0;$i<$floor;$i++)
    {
    	$myf="";
    	if($i==0)
    	{
    		$myf="0-Ground Floor";
    	}
    	if($i==1)
    	{
    		$myf="1-First Floor";
    	}
    	if($i==2)
    	{
    		$myf="2-Second Floor";
    	}
    	if($i==3)
    	{
    		
    		$myf="3-Third Floor";
    	}
    	if($i==4)
    	{
    		$myf="4-Fourth Floor";
    	}
    	if($i==5)
    	{
    		$myf="5-Fifth Floor";
    	}
    	$mydata=$mydata.'<option value="'.$i.'">'.$myf.'</option>';
    	
    	
    }
    $data["showdata"]=$mydata;
	echo json_encode($data);
}



                     

function checkDateFormat($date) {
if (preg_match("/[0-31]{2}/[0-12]{2}/[0-9]{4}/", $date)) {
if(checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4)))
return true;
else
return false;
} else {
return false;
}
}
 
function change_password()
{
	$submit=$this->input->post('submit');
	 
	$student_id = ($this->session->userdata['student_logged_in']['student_id']);
	$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);

	$submit= $this->input->post('submit',TRUE);
    if($submit == "Change Password")
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('oldpassword','Old Password','required');
		$this->form_validation->set_rules('newpassword','Password','required|min_length[04]|max_length[20]');
		$this->form_validation->set_rules('cnewpassword','Re enter Password','required|min_length[04]|max_length[20]|matches[newpassword]');

		if($this->form_validation->run()==TRUE)
		{	
				
				$oldp=$this->input->post('oldpassword',TRUE);
				$this->db->select('password');
				$this->db->where('enrollment',$student_enroll);
				$query=$this->db->get('student_data');
				foreach($query->result() as $row)
				{
					if($oldp==$row->password)
					{
						$data['password']=$this->input->post('newpassword',TRUE);
						$data['rpassword']=$this->input->post('newpassword',TRUE);
						$this->db->where('enrollment',$student_enroll);
						$this->db->update('student_data',$data);
						$this->session->set_flashdata('ok','New Password Successfully Changed!');
						redirect('store_student/change_password');
					}else
					{
						 $this->session->set_flashdata('error','Your Current Password is Not Correct!');
						 redirect('store_student/change_password');
					}
				}

		}


	}


	$this->db->where("id",$student_id);
	$data['student']=$this->db->get("student_data");
    $this->load->view('change_password',$data);
}



function change_password1()
{
	$submit=$this->input->post('submit');
	 
	$student_id = ($this->session->userdata['student_logged_in']['student_id']);
	$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);
	$this->db->where("id",$student_id);
	$data['student']=$this->db->get("student_data");
	$this->load->view('change_password',$data);	


	$submit= $this->input->post('submit',TRUE);
    if($submit == "Change Password")
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('oldpassword','Old Password','required');
		$this->form_validation->set_rules('newpassword','Password','required|min_length[04]|max_length[20]');
		$this->form_validation->set_rules('cnewpassword','Re enter Password','required|min_length[04]|max_length[20]|matches[newpassword]');

		if($this->form_validation->run()==TRUE)
		{	
				
				$oldp=$this->input->post('oldpassword',TRUE);
				$this->db->select('password');
				$this->db->where('enrollment',$student_enroll);
				$query=$this->db->get('student_data');
				foreach($query->result() as $row)
				{
					if($oldp==$row->password)
					{    
						$data['password']=$this->input->post('newpassword',TRUE);
						$this->db->where('enrollment',$student_enroll);
						$this->db->update('student_data',$data);
						$this->session->set_flashdata('ok','New Password Successfully Changed!');
						redirect('store_student/change_password');
					}else
					{
						 $this->session->set_flashdata('error','Your Current Password is Not Correct!');
						 redirect('store_student/change_password');
					}
				}

		}


	}


	$data ="";	
    $this->load->view('change_password',$data);
}

function register_basic_details()
{
	$submit=$this->input->post('submit');
	if($submit=="Register")
	{   
		$this->form_validation->set_rules('dob','Date of Birth','required');
		$this->form_validation->set_rules('admission_date','Hostel Admission Date','required'); 
		$this->form_validation->set_rules('first_name','Firstname','required');
		$this->form_validation->set_rules('middle_name','Middlename','required');
		$this->form_validation->set_rules('last_name','Lastname','required');
		$this->form_validation->set_rules('email',' Email Id','valid_email|required');
		$this->form_validation->set_rules('mobile','Student Mobile Number','required|numeric|exact_length[10]');
		$this->form_validation->set_rules('parent_mobile','Parent Mobile Number','required|numeric|exact_length[10]');
		$this->form_validation->set_rules('department','Select Department','required');
		$this->form_validation->set_rules('hostel_name','Select Hostel','required');
		$this->form_validation->set_rules('floor_name','Floor Name','required');
		$this->form_validation->set_rules('room_number','Room Number','required|numeric');
		$this->form_validation->set_rules('semester','Select Semester','required');
		$this->form_validation->set_rules('enrollment','Enter Enrollment','required|numeric|exact_length[12]');
		$this->form_validation->set_rules('category','Select Category','required');
		$this->form_validation->set_rules('ph','Select PH','required');
		$this->form_validation->set_rules('gender','Select Gender','required');
		$this->form_validation->set_rules('permenent_address','Enter Home Town Address','required');
		$this->form_validation->set_rules('taluko','Select Taluko','required');
		$this->form_validation->set_rules('district','Select Distric','required');
		$this->form_validation->set_rules('pin_code','Enter Pincode','required|numeric|exact_length[6]');
		$this->form_validation->set_rules('password','Password','required|min_length[04]|max_length[20]');
		$this->form_validation->set_rules('rpassword','Re-enter Password','required|min_length[04]|max_length[20]|matches[password]');

			if($this->form_validation->run()==TRUE)
			{
			    $data['dob'] = $this->input->post('dob',TRUE);
				$data['first_name'] = $this->input->post('first_name',TRUE);
				$data['middle_name'] = $this->input->post('middle_name',TRUE);
				$data['last_name'] = $this->input->post('last_name',TRUE);
				$data['email'] = $this->input->post('email',TRUE);
				$data['mobile'] = $this->input->post('mobile',TRUE);	
				$data['parent_mobile'] = $this->input->post('parent_mobile',TRUE);
				$data['department'] = $this->input->post('department',TRUE);
				$data['semester'] = $this->input->post('semester',TRUE);
				$data['enrollment'] = $this->input->post('enrollment',TRUE);
				$data['category'] = $this->input->post('category',TRUE);
				$data['gender'] = $this->input->post('gender',TRUE);
				$data['ph'] = $this->input->post('ph',TRUE);
				$data['parmenent_address'] = $this->input->post('permenent_address',TRUE);
				$data['taluko'] = $this->input->post('taluko',TRUE);
				$data['district'] = $this->input->post('district',TRUE);
				$data['pin_code'] = $this->input->post('pin_code',TRUE);
				$data['password'] = $this->input->post('password',TRUE);
				$data['rpassword'] = $this->input->post('rpassword',TRUE);
				$data['status']='P';
				$data['photo']='user.jpg';
		         $flash_msg="You are Registered Successfully !!";
			   	 $value= '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>'.$flash_msg.'</strong></div>';

			   	 $this->db->insert("student_data",$data);
			   	$data1["student_id"] = $this->db->insert_id();
			   	$data1['hostel_id'] = $this->input->post('hostel_name',TRUE);
				$data1['floor_name'] = $this->input->post('floor_name',TRUE);
				$data1['room_number'] = $this->input->post('room_number',TRUE);
				$data1['admission_date'] = $this->input->post('admission_date',TRUE);
			   	$this->db->insert("student_room",$data1);
			   	$this->session->set_flashdata('Success', 'You are Registered Successfully !!'); 
			   	$this->mail_student($this->input->post('email',TRUE),'<p>Dear '.$this->input->post('first_name',TRUE).'</p><br/><p>Thank you for your Registartion !</p><p>You can maintain your profile via portal to participate in recruitement of companies. </p><p>You can apply for company after approve by your college </p><br/><br/>Email:'.$this->input->post('email',TRUE).'<br/>Mobile Number:'.$this->input->post('mobile',TRUE).'<br/>Department Name:'.$this->input->post('department',TRUE).'<br/>Password:'.$this->input->post('password',TRUE));
				 redirect('store_student/stu_login');		       
			}
		    

	}
	$this->load->view('register_basic_details');	


	
}
function fetch_department()
{
	 $college=$this->input->post('college');
	 $this->db->where("college_name",$college);

	 $result=$this->db->get('department_list');
	 $myview='';
	 foreach($result->result() as $row)
	{
		$myview=$myview.'<option>'.$row->department_name.'</option>';
	}
	$data['myview']=$myview;
    echo json_encode($data);
}
function student_newlogin()
{
	$this->load->view('student_newlogin');
}
function student_homenew()
{
	$this->load->view('student_home');
}
function getphoto()
{
	 		$student_name = ($this->session->userdata['student_logged_in']['student_name']);
			$student_id = ($this->session->userdata['student_logged_in']['student_id']);
			$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);

			$this->db->where('stu_enroll',$student_enroll);
			$query = $this->db->get('student_accounts');

			foreach($query->result() as $row)
			{
				$data['myphoto'] = $row->stu_photo;
			}
			return $data;
	
}
function delete_vehicle()
{        
		$del_id = ($this->session->userdata['student_logged_in']['student_id']);
		$this->db->where('student_id', $del_id);
		$this->db->delete('vehicle_name');
		$this->session->set_flashdata('flashSuccess', 'Vehicle Deleted Successfully');  
		redirect('store_student/myvehicle');

}


function myvehicle()
{
	$this->load->library('session');
	$student_id = ($this->session->userdata['student_logged_in']['student_id']);
    $submit= $this->input->post('submit',TRUE);
    if($submit == "Cancel")
	{			
		redirect('store_student/dashboard');
	}           
	if($submit == "Save")
	{				               
		$this->load->library('form_validation');
		$this->form_validation->set_rules('v_type','Vehicle Type','required');
		$this->form_validation->set_rules('v_name','Vehicle Name','required');
		$this->form_validation->set_rules('v_number','Vehicle Number','required');
		
		if($this->form_validation->run()==TRUE)
		{
					$data['v_type'] = $this->input->post('v_type',TRUE);
					$data['v_name'] = $this->input->post('v_name',TRUE);
					$data['v_number']=$this->input->post('v_number',TRUE);
					$data['v_status']= 'P';	
					$data['student_id'] = $student_id;

					if(is_numeric($student_id))
	   				{			   				 	
	   				 	 $this->db->insert('vehicle_name', $data);
	   		 			 $this->session->set_flashdata('flashSuccess', 'Vehicle Details successfully updated');
	   		 			redirect('store_student/myvehicle');
	   				}
		}
	}
	 
	$this->db->select('photo');
	$this->db->where('id',$student_id);
	$sdata= $this->db->get('student_data');
	$srow = $sdata->row();
	$data['photo']=$srow->photo;
	 
	$this->db->where("student_id",$student_id);
	$data['vehicle']=$this->db->get("vehicle_name");
	$this->load->view('myvehicle',$data);

}

public function warden_logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata("message","Successfully Logout");
		redirect('store_student/warden_login');
	}
  	public function warden_login() 
	{ 
		 $Login=$this->input->post('login');
		 if($Login=="logindata")		 
		{ 

			$u_id=$this->input->post('email');
			$pass=$this->input->post('password');



			$this->form_validation->set_rules('email', 'Username', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password ', 'required');


			if($this->form_validation->run() == TRUE)
			{

				
			     
			     $this->db->where('email',$u_id);
			      
			     $data=$this->db->get('hostel_details'); 
			     $nrow=$data->num_rows();
			     if($nrow=='1')
			     {    
			     
			     	foreach($data->result() as $row)
			     	{
			     		$dbpass=$row->password;
			     		if($dbpass==$pass)
			     		{    
					     	$session_data = array(
							'hostel_id' => $row->id,
							'hostel_name' => $row->hostel_name		
							);
							$this->session->set_userdata('warden_logged_in', $session_data); 
			     			 redirect('warden/home');
					        
								 
			     		}else
			     		{ 
			     			$this->session->set_flashdata("message","Kindly enter valid password !");
			     			redirect('store_student/warden_login');
			     		}
			     	}
			     }
			    

			   }
			   $this->session->set_flashdata("message","Kindly enter valid username !");
			   redirect('store_student/warden_login');

			    
			     			   				
		}
		
		$this->load->view('warden_login');

	} 


function stu_login()
{		
	$submit = $this->input->post('submit',TRUE);
	if($submit=="Stulogin")
	{ 
		    $this->load->library('form_validation');           
			$this->form_validation->set_rules('stu_enroll',' Enrollment','required|trim');
			$this->form_validation->set_rules('stu_password','Password','required|trim');
			if($this->form_validation->run()==TRUE)
			{					
				$value1=$this->input->post('stu_enroll',TRUE);
				$col1="enrollment"; 
				$col2="email";
                $value2=$this->input->post('stu_enroll',TRUE);
                $pass=$this->input->post('stu_password',TRUE);

                $this->db->where($col1,$value1);
                $this->db->or_where($col2,$value2);
                $query = $this->db->get('student_data');
                if($query->num_rows()=='1')
                {
                	foreach($query->result() as $row)
                	{
                		$user_id = $row->id;
                		$student_id = $row->enrollment;
                		$student_sem = $row->semester;
                		$got_password=$row->password;
                		$photo=$row->photo;
                	
                	}
                	if($pass==$got_password)
                	{

                	 $session_data = array(
					'student_id' => $user_id,
					'student_enroll' => $student_id,
					'student_sem' => $student_sem,
					'photo' => $photo			
					);
					$this->session->set_userdata('student_logged_in', $session_data);              
		        	redirect('store_student/dashboard');
		        	}else
		        	{
		        		$this->session->set_flashdata('flashSuccess', 'Sorry! password is not correct');
          				redirect('store_student/stu_login');
		        	}
                }else
                {
                	$this->session->set_flashdata('flashSuccess', 'Sorry! Username is not correct');
          				redirect('store_student/stu_login');	
                }
                
	        }else
	        {
	        $this->session->set_flashdata('flashSuccess', 'Sorry! Username or password is not correct');
          				redirect('store_student/stu_login');		
			}
	 }
		
	$data="";
	$this->load->view('student_login',$data);
}
function profilephoto()
{
	$student_id = ($this->session->userdata['student_logged_in']['student_id']);
	$this->db->select("id,photo");
	$this->db->where("id",$student_id);
	$query=$this->db->get("student_data");
	$mydata=$query->row();
	$data['photo']=$mydata->photo;
    $this->load->view('profilephoto',$data);
}
function dashboard()
{
	$student_id = ($this->session->userdata['student_logged_in']['student_id']);
	$this->db->where("id",$student_id);
	$data['student']=$this->db->get("student_data");
	$this->load->view('dashboard',$data);
}
function myhostel()
{
	$student_id = ($this->session->userdata['student_logged_in']['student_id']);
	$this->db->where("student_id",$student_id);
	$data['student']=$this->db->get("student_room");
	$this->load->view('myhostel',$data);
}
function mycomplaint()
{   
    date_default_timezone_set("Asia/Kolkata");
	$student_id = ($this->session->userdata['student_logged_in']['student_id']);
	$submit=$this->input->post('submit');
		    if($submit=="Submit")
		    {
		    	$this->form_validation->set_rules('c_type','Complain Type','required');
				$this->form_validation->set_rules('c_name','Complain Description','required'); 
				if($this->form_validation->run()==TRUE)
					{
					     $data['c_date1'] = date('d/m/Y');
						$data['c_type'] = $this->input->post('c_type',TRUE);
						$data['c_name'] = $this->input->post('c_name',TRUE); 
						$data['c_status']='P';
						$data['student_id']=$student_id;
					   	 $this->db->insert("complain_data",$data);
					     $this->session->set_flashdata('flashSuccess', 'Your Complain are Register successfully.');  
						 redirect('store_student/mycomplaint');		       
					}
					else{
						 
						$this->session->set_flashdata('error','Please Select Complain Type.'); 
                	 redirect('store_student/mycomplaint');
					}
		    }
		$this->db->where("id",$student_id);
	$data['student']=$this->db->get("student_data");
	$this->load->view('mycomplaint',$data);    
	 
}
 
 function add_vehicle()
	{	 
       		$submit=$this->input->post('submit');
		    if($submit=="save")
		    {
		    	 $this->form_validation->set_rules('v_type','Vehicle Type','required');
				$this->form_validation->set_rules('v_name','Vehicle Name','required'); 
				$this->form_validation->set_rules('v_number','Vehicle Number','required');

				if($this->form_validation->run()==TRUE)
					{
					     
						$data['v_type'] = $this->input->post('hostel_name',TRUE);
						$data['v_name'] = $this->input->post('floor_name',TRUE);
						$data['v_number'] = $this->input->post('room_number',TRUE);
						 
						$data['v_status']='P';
				         $flash_msg="Your Vehicle are Registered Successfully !!";
					   	 $value= '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>'.$flash_msg.'</strong></div>';

					   	 $this->db->insert("vehicle_name",$data);
					   	 $this->session->set_flashdata('Success',$value); 
						 redirect('store_student/myvehicle');		       
					}
					else{
						
					}
		    }
		    
	}

function myvehicle1()
{   
	$student_id = ($this->session->userdata['student_logged_in']['student_id']);
	$this->db->where("id",$student_id);
	$data['student']=$this->db->get("student_data");
	$this->load->view('myvehicle',$data);	
}


function college_login()
{			
	$submit = $this->input->post('submit',TRUE);

	if($submit=="Collegelogin")
	{ 

		    $this->load->library('form_validation');           
			$this->form_validation->set_rules('college_username',' Username','required|callback_checkcollegelogin');			 
			$this->form_validation->set_rules('college_password','Password','required');	

			if($this->form_validation->run()==TRUE)
			{	
				
				$value1=$this->input->post('college_username',TRUE);
				
				$col1="principal_mobile";
				$col2="principal_email";		
                $value2=$this->input->post('college_username',TRUE);
                $this->db->where($col1,$value1);
                $this->db->or_where($col2,$value2);
                $query = $this->db->get('college_accounts');

                
                foreach($query->result() as $row)
                {
					$college_id = $row->id;
                	$college_name = $row->college_name;
                	$college_logo = $row->college_logo;	
                	$college_status=$row->college_status;				                		
                }
                if($college_name=='admin')
                {
                	 $session_data = array(
				'college_id' => '123456',
				'college_name' => 'adminpower',
				);
                $this->session->set_userdata('admin_logged_in', $session_data);   
	        	redirect('admin/admin_dashboard');
				
                }
                if($college_status=='NotApproved')
                {
                	 $this->session->set_flashdata('msg','Sorry !! Your Account is not Approved by Authority. Thank you for your support.'); 
                	 redirect('store_student/college_login');
                }
                $session_data = array(
				'college_id' => $college_id,
				'college_name' => $college_name,
				'college_logo' => $college_logo,

				);
				
				$this->session->set_userdata('logged_in', $session_data);   

	        	redirect('index.php/college/college_home');         	   		
			}
			
	}

	$data="";
	$this->load->view('college_login',$data);


}

function mail_student($to,$content)
{
	//Load email library
$this->load->library('email');
//SMTP & mail configuration
$config = array(
    'protocol'  => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'kishan@lecollege.ac.in',
    'smtp_pass' => 'kishan1999',
    'mailtype'  => 'html',
    'charset'   => 'utf-8'
);
$this->email->initialize($config);
$this->email->set_mailtype("html");
$this->email->set_newline("\r\n");
$htmlContent = $content;
$this->email->to($to);
$this->email->from('kishan@lecollege.ac.in','HMS');
$this->email->subject('Welcome to HMS');
$this->email->message($htmlContent);
//Send email
$this->email->send();
}

function mail_student1($to, $content)
{

	//Load email library
$this->load->library('email');


//SMTP & mail configuration
$config = array(
    'protocol'  => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'keshwala.rahul@gmail.com',
    'smtp_pass' => 'keshwala*rahul24',
    'mailtype'  => 'html',
    'charset'   => 'utf-8'
);
$this->email->initialize($config);
$this->email->set_mailtype("html");
$this->email->set_newline("\r\n");

 $htmlContent = $content;

$this->email->to($to);
$this->email->from('keshwala.rahul@gmail.com','TPO');
$this->email->subject('Welcome to TPO Cell');
$this->email->message($htmlContent);

//Send email
$this->email->send();

}



function forget_password()
{
	$submit = $this->input->post('submit',TRUE);

	if($submit=="Getpassword")
	{ 
		    $this->load->library('form_validation');           
			$this->form_validation->set_rules('email_id',' Email ID','required');			

			if($this->form_validation->run()==TRUE)
			{
				$email = $this->input->post('email_id',TRUE);
				$this->db->where('email',$email);
				$query=$this->db->get('student_data');
				$row=$query->num_rows();
				if($row>0)
				{
					foreach($query->result() as $row)
                	{
                		$got_password = $row->password;
                		$email_id = $row->email;
                		$this->mail_student($email_id,'Your Password is '. $got_password);
		                $this->session->set_flashdata('flashSuccess', 'We have send your Password on your registered mail ID.');
		                redirect('store_student/forget_password');
                	}
				}
				 $this->session->set_flashdata('flashSuccess', 'Your Email Id is not registered');
		         redirect('store_student/forget_password');				
				
			}
	}
	$this->load->view('forget_password');

}


 public function my_fees()
 {
  $student_id = ($this->session->userdata['student_logged_in']['student_id']);
  $student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);
  $student_sem = ($this->session->userdata['student_logged_in']['student_sem']);
  $submit = $this->input->post('submit',TRUE);
  if($submit=="submit")
  { 
      $this->load->library('form_validation');           
      $this->form_validation->set_rules('tid',' Enter your tid','required|exact_length[12]|is_unique[student_fees.ref_number]');
      if($this->form_validation->run()==TRUE)
      {         
            $tid=$this->input->post('tid',TRUE);
            $this->db->where('student_ref_number',$tid);                
                $query = $this->db->get('student_fees_data');
                if ($query->num_rows()=='1')
                {
                  $data['ref_number']=$this->input->post('tid',TRUE);
                  $data['student_id']=$student_id;
                  $data['student_enroll']=$student_enroll;
                  $data['student_sem']=$student_sem;
                  $this->db->insert('student_fees',$data);
                  $this->session->set_flashdata('flashSuccess', ' Your Fees Verification is Complated. Please Meet Your Hostel Warden and Confirmed your Renewal Addmision.');
                  redirect('store_student/my_fees');
                }else
               {
                    $this->session->set_flashdata('flashSuccess', 'Sorry! Enter Correct Reference Number');
                    redirect('store_student/my_fees');        
               }
      }
        
   }
    $this->db->where("id",$student_id);
	$data['student']=$this->db->get("student_data");
	$this->load->view('my_fees',$data);  
  
}


public function student_logout()
{

		// Removing session data
		$sess_array = array(
		'student_id' => '',
		'student_enroll' => ''
		);
		$this->session->unset_userdata('student_logged_in', $sess_array);
		$this->session->set_flashdata('flashSuccess', 'Successfully Logout');
		redirect(base_url() .'index.php/store_student/stu_login');
}
function checkenroll($str)
{
	
	$error_msg="Your username or password is not correct";

	$value1=$str;
	$col1="enrollment";
	$col2="email";
    $value2=$str;
   
     $this->db->where($col1,$value1);
     $this->db->or_where($col2,$value2);
     $query = $this->db->get('student_data');

     $num_rows = $query->num_rows();
     echo $num_rows; die();
     if($num_rows!='1')
     {
     	$this->form_validation->set_message('checkenroll',$error_msg);
     	return FALSE;
     }
      foreach($query->result() as $row)
        {
        	$got_password = $row->password;
        	//$salt = $row->salt;
        }
   $eps=$this->input->post('stu_password',TRUE);      
   if($eps === $got_password)
   {
   		return TRUE;
   }else
   {
   	$this->form_validation->set_message('checkenroll',$error_msg);
   	return FALSE;


   }

}
function check_college_name($str)
{
	
	$error_msg="Select your college and Department name";

   
   $college=$this->input->post('stu_college',TRUE);
    $dept=$this->input->post('stu_department',TRUE);      

    if($college ==='--Select College--' || $dept ==='--Select Department--')
   {
   	    $this->form_validation->set_message('check_college_name',$error_msg);
   		return FALSE;
   }else
   {
   	
   	return TRUE;


   }

}
function checkcollegelogin($str)
{
	
	$error_msg="Your username or password is not correct";

	$value1=$str;
	$col1="principal_email";
	$col2="principal_mobile";
    $value2=$str;
   
     $this->db->where($col1,$value1);
     $this->db->or_where($col2,$value2);
     $query = $this->db->get('college_accounts');

     $num_rows = $query->num_rows();
     if($num_rows<1)
     {

     	$this->form_validation->set_message('checkcollegelogin',$error_msg);
     	return FALSE;
     }

      foreach($query->result() as $row)
	    {

	    	$got_password = $row->principal_password;
	    	$salt=$row->salt;
	    }
	   $epassword=$this->input->post('college_password',TRUE); 


	   if($this->encryptUserPwd($epassword,$salt) == $got_password)
	   {
	   		return TRUE;
	   }else
	   {
	   	$this->form_validation->set_message('checkcollegelogin',$error_msg);
	   	return FALSE;

   }

}
function get_with_double_condition($col1,$value1,$col2,$value2)
{

}

function stu_register()
{
			$submit = $this->input->post('submit',TRUE);

			if($submit=="Stusubmit")
			{ 
				    $this->load->library('form_validation');
		            
					$this->form_validation->set_rules('stu_enroll',' Enrollment','required|exact_length[12]|unique[student_accounts.stu_enroll,student_accounts.id]');
					$this->form_validation->set_rules('stu_name',' name','required|min_length[4]|max_length[50]');
					$this->form_validation->set_rules('stu_mobile','Mobile number','required|exact_length[10]|unique[student_accounts.stu_mobile,student_accounts.id]');
					$this->form_validation->set_rules('stu_email','Email','required|valid_email|unique[student_accounts.stu_email,student_accounts.id]');
					$this->form_validation->set_rules('stu_password','Password','required|min_length[04]|max_length[20]');
					$this->form_validation->set_rules('stu_repassword','Re enter Password','required|min_length[04]|max_length[20]|matches[stu_password]');
					$this->form_validation->set_rules('stu_college','College Name','required');
				

				if($this->form_validation->run()==TRUE)
				{
					$data['stu_name'] = $this->input->post('stu_name',TRUE);
					$data['stu_enroll'] = $this->input->post('stu_enroll',TRUE);
					$data['stu_email']=$this->input->post('stu_email',TRUE);
					$data['stu_mobile']=$this->input->post('stu_mobile',TRUE);
					$data['stu_college'] = $this->input->post('stu_college',TRUE);
					$data['stu_department'] = $this->input->post('stu_department',TRUE);
					$data['stu_password']=$this->input->post('stu_password',TRUE);
					$data['stu_repassword']=$this->input->post('stu_repassword',TRUE);	
					$data['stu_status']='0';		
					unset($data['stu_repassword']);
		            $this->db->insert('student_accounts', $data);	
		            $this->mail_student($this->input->post('stu_email',TRUE),'<p>Dear '.$this->input->post('stu_name',TRUE).'</p><br/><p>Thank you for your Registartion !</p><p>You can maintain your profile via portal to participate in recruitement of companies. </p><p>You can apply for company after approve by your college </p><br/><br/>Email:'.$this->input->post('stu_email',TRUE).'<br/>Mobile Number:'.$this->input->post('stu_mobile',TRUE).'<br/>College Name:'.$this->input->post('stu_college',TRUE).'<br/>Department Name:'.$this->input->post('stu_department',TRUE).'<br/>Password:'.$this->input->post('stu_password',TRUE));
		            redirect('student/student_register_success');
				}

				
			  }
            $data=$this->fetch_data_from_post();
            $this->db->select("college_name");
			$this->db->from('college_accounts');
			$data['college_list'] = $this->db->get();			
			$this->load->view('student_register',$data);
}




function profile_upload()
{
	          
				$student_id = ($this->session->userdata['student_logged_in']['student_id']);
				
	 			$config['upload_path']          = './images/';
                $config['allowed_types']        = 'gif|jpg|png';
               
                $config['file_name']            = $student_id.time();
                $config['overwrite']            = TRUE;

                $this->load->library('upload', $config);
                $stu_id = $this->uri->segment(3);

                $submit= $this->input->post('submit',TRUE);
			    if($submit == "Upload Photo")

				{
					 
					 if (!$this->upload->do_upload('stu_photo'))
                	{
                        $data['error'] = $this->upload->display_errors(); 
                        $student_id = ($this->session->userdata['student_logged_in']['student_id']);
						$this->db->where("id",$student_id);
						$mydata=$this->db->get("student_data");
						$myrow=$mydata->row();
						$data['photo']=$myrow->photo;
                        $this->load->view('profilephoto',$data);	
                	}
                	else
                	{
                		
                		$data = $this->upload->data();    					
                	    $mydata['photo']=$data['file_name'];
                        $this->db->where("id",$student_id);
                        $this->db->update("student_data",$mydata);
		   		 		$this->session->set_flashdata('flashSuccess', 'Profile Photo successfully updated');       
                        redirect('store_student/profilephoto');	

                	}
					
				}  


               
}
 
 function download($id)
{    $student_id = ($this->session->userdata['student_logged_in']['student_id']);
    # load download helper
    $this->load->helper('download');
    # search for filename by id
    $this->db->select('rc_book_photo');
    $this->db->where('student_id', $student_id);
    $q = $this->db->get('vehicle_name');
    # if exists continue
    if($q->num_rows() > 0)
    {
        $row  = $q->row();
        $file = FCPATH . 'vehicle/'. $row->rc_book_photo;
        if(file_exists($file))
            force_download($file, NULL);
    }
    else
        alert('error_404');
}

function rc_book_upload()
{
	          
				$student_id = ($this->session->userdata['student_logged_in']['student_id']);
				
	 			$config['upload_path']          = './vehicle/';
                $config['allowed_types']        = 'gif|jpg|png|pdf';
                $config['max_size']             = 20000;
                $config['file_name']            = $student_id.time();
                $config['overwrite']            = TRUE;
                $this->load->library('upload', $config);
                 $submit= $this->input->post('submit',TRUE);	
			    if($submit == "Upload RC BOOK")

				{  

					if ($this->upload->do_upload('rc_book'))
                	{
				     $data = $this->upload->data();    					
                	    $mydata['rc_book_photo']=$data['file_name'];
                        $this->db->where("student_id",$student_id);
                        $this->db->update("vehicle_name",$mydata);
		   		 		$this->session->set_flashdata('flashSuccess', 'RC Book successfully updated');       
                        redirect('store_student/myvehicle');
                      }
				}  


               
}

 
function sign_upload()
{
	            $student_name = ($this->session->userdata['student_logged_in']['student_name']);
				$student_id = ($this->session->userdata['student_logged_in']['student_id']);
				$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);
	 			$config['upload_path']          = './student_signs/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 250;
                $config['max_height']           = 250;
                $config['file_name']            = $student_enroll;
                $config['overwrite']            = TRUE;

                $this->load->library('upload', $config);
                $submit= $this->input->post('submit',TRUE);	
                 $signname= $this->input->post('signname',TRUE);		
				if($submit == "Upload Sign")

				{
					
					 if ( ! $this->upload->do_upload('stu_sign'))
                	{
                        $data['error'] = $this->upload->display_errors(); 
                        $this->db->where('stu_enroll',$student_enroll);
						$data1=$this->db->get('student_accounts');
                         
                         foreach($data1->result() as $row)
						{
								$data['stu_photo'] = $row->stu_photo;
								$data['stu_sign'] = $row->stu_sign;

						}	             
                        $this->load->view('profile_photo',$data);		
                	}
                	else
                	{   
                	   		
                	    $data = $this->upload->data();     					
                	    $mydata['stu_sign']=$data['file_name'];
                        $this->_update($student_enroll,$mydata);
		   		 		$this->session->set_flashdata('flashSuccess', 'Sign successfully updated');          
                        redirect('store_student/student_photo');	
                	}
					
				}  


               
} 
function student_photo()
{
			    $student_name = ($this->session->userdata['student_logged_in']['student_name']);
				$student_id = ($this->session->userdata['student_logged_in']['student_id']);
				$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);

				
				$data = $this->fetch_data_from_db($student_enroll);	
					
	        
			   $this->load->view('profile_photo',$data);
}




function get($order_by)
{
$this->load->model('mdl_perfectcontroller');
$query = $this->mdl_perfectcontroller->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
$this->load->model('mdl_perfectcontroller');
$query = $this->mdl_perfectcontroller->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id) 
{
$this->load->model('mdl_store_student');
$query = $this->mdl_store_student->get_where($id);
return $query;
}

function get_where_custom($col, $value) 
{
$this->load->model('mdl_perfectcontroller');
$query = $this->mdl_perfectcontroller->get_where_custom($col, $value);
return $query;
}

function _insert($data) 
{
$this->load->model('mdl_store_student');
$this->mdl_store_student->_insert($data);
}

function _update($id, $data) 
{
$this->load->model('mdl_store_student');
$this->mdl_store_student->_update($id, $data);
}

function _delete($id) 
{
$this->load->model('mdl_perfectcontroller');
$this->mdl_perfectcontroller->_delete($id);
}

function count_where($column, $value) 
{
$this->load->model('mdl_perfectcontroller');
$count = $this->mdl_perfectcontroller->count_where($column, $value);
return $count;
}

function get_max() 
{
$this->load->model('mdl_store_student');
$max_id = $this->mdl_store_student->get_max();
return $max_id;
}

function _custom_query($mysql_query) 
{
$this->load->model('mdl_perfectcontroller');
$query = $this->mdl_perfectcontroller->_custom_query($mysql_query);
return $query;
}



 function date_valid($date)
  {
    $parts = explode("/", $date);
    if (count($parts) == 3)
     {      
      if (checkdate($parts[1], $parts[0], $parts[2]))
      {
        return TRUE;
      }
    }
    $this->form_validation->set_message('date_valid', 'The Date field must be dd/mm/yyyy');
    return false;
  }


	// Generate Random Salt for Password encryption
function genRndSalt() {
return $this->genRndDgt(8, true);
}

// Encrypt User Password
function encryptUserPwd($pwd, $salt) {
return sha1(md5($pwd) . $salt);
}

// Generate Random Digit
function genRndDgt($length = 8, $specialCharacters = true) 
{
$digits = '';
$chars = "abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789";
if($specialCharacters === true)
$chars .= "!?=/&+,.";
for($i = 0; $i < $length; $i++) {
$x = mt_rand(0, strlen($chars) -1);
$digits .= $chars{$x};
}
return $digits;
}


}
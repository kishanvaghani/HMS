<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Store_student extends MX_Controller
{

function __construct() {
parent::__construct();
$this->load->library('form_validation');
$this->form_validation->CI=& $this;
$this->load->helper('captcha');
}

function change_password()
{
	$submit=$this->input->post('submit');
	$student_name = ($this->session->userdata['student_logged_in']['student_name']);
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
				$this->db->select('stu_password');
				$this->db->where('stu_enroll',$student_enroll);
				$query=$this->db->get('student_accounts');
				foreach($query->result() as $row)
				{
					if($oldp==$row->stu_password)
					{
						$data['stu_password']=$this->input->post('newpassword',TRUE);
						$this->db->where('stu_enroll',$student_enroll);
						$this->db->update('student_accounts',$data);
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


	$data = $this->fetch_data_from_db($student_enroll);	
    $this->load->view('change_password',$data);
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

function stu_login()
{		
	$submit = $this->input->post('submit',TRUE);
	if($submit=="Stulogin")
	{ 
		    $this->load->library('form_validation');           
			$this->form_validation->set_rules('stu_enroll',' Enrollment','required|callback_checkenroll|trim|required');
			$this->form_validation->set_rules('stu_password','Password','required|trim|required');
			if($this->form_validation->run()==TRUE)
			{					
				$value1=$this->input->post('stu_enroll',TRUE);
				$col1="stu_enroll";
				$col2="stu_email";
                $value2=$this->input->post('stu_enroll',TRUE);

                $this->db->where($col1,$value1);
                $this->db->or_where($col2,$value2);
                $query = $this->db->get('student_accounts');
                foreach($query->result() as $row)
                {
                	$user_id = $row->id;
                	$student_id = $row->stu_enroll;
                	$student_name = $row->stu_name;
                	$student_college = $row->stu_college;
                	$student_status = $row->stu_status;
                }
                 $session_data = array(
				'student_id' => $user_id,
				'student_name' => $student_name,
				'student_enroll' => $student_id,
				'student_college' => $student_college
				);
				
				if($student_status=='1')
				{
				$this->session->set_userdata('student_logged_in', $session_data);              
	        	redirect('store_student/dashboard');
	        	}else
	        	{
	        		    $this->session->set_flashdata('flashSuccess', 'Sorry! Your Profile is not Approved by your College');
          				redirect('store_student/stu_login');	   		
				}
	       }
		
	}
	$data="";
	$this->load->view('student_login',$data);
}
function profilephoto()
{
    $student_name = ($this->session->userdata['student_logged_in']['student_name']);
	$student_id = ($this->session->userdata['student_logged_in']['student_id']);
	$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);	
	$data = $this->fetch_data_from_db($student_enroll);	
    $this->load->view('profilephoto',$data);
}
function dashboard()
{
	$student_name = ($this->session->userdata['student_logged_in']['student_name']);
	$student_id = ($this->session->userdata['student_logged_in']['student_id']);
	$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);	
	       
   	$data = $this->fetch_data_from_db($student_enroll);	
   	
	$this->db->where('stu_enroll',$student_enroll);
	$data['experience'] = $this->db->get('student_experience');
	$this->db->where('stu_enroll',$student_enroll);
	$data['projects'] = $this->db->get('student_projects');
   	$this->db->where('stu_enroll',$student_enroll);
	$data['applications'] = $this->db->get('company_applications');
	$this->db->where('stu_enroll',$student_enroll);
	$data['sturesult'] = $this->db->get('student_result');
	$this->db->where('stu_enroll',$student_enroll);
	$data['details'] = $this->db->get('student_accounts');

	$this->load->view('dashboard',$data);

}
function experience()
{
	$this->load->library('session');	
    $student_name = ($this->session->userdata['student_logged_in']['student_name']);
	$student_id = ($this->session->userdata['student_logged_in']['student_id']);
	$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);  
    $submit= $this->input->post('submit',TRUE);
    if($submit == "Cancel")
	{			
		redirect('store_student/dashboard');
	}           
	if($submit == "Save")
	{				               
		$this->load->library('form_validation');
		$this->form_validation->set_rules('companyname','Company Name','required');
		$this->form_validation->set_rules('designation','Designation','required');
		$this->form_validation->set_rules('date_from','Date From','required');
		$this->form_validation->set_rules('date_to','Date To','required');

		if($this->form_validation->run()==TRUE)
		{
			
					$data['companyname'] = $this->input->post('companyname',TRUE);
					$data['designation'] = $this->input->post('designation',TRUE);
					$data['date_from']=$this->input->post('date_from',TRUE);
					$data['date_to']=$this->input->post('date_to',TRUE);	
					$data['stu_enroll'] =  $student_enroll ;

					if(is_numeric($student_enroll))
	   				{			   				 	
	   				 	 $this->db->insert('student_experience', $data);
	   		 			 $this->session->set_flashdata('flashSuccess', 'Experience Details successfully updated');
	   		 			redirect('store_student/experience');
	   				}
		}
	}
	$data = $this->fetch_data_from_db($student_enroll);
	$this->db->where('stu_enroll',$student_enroll);
	$data['exp'] = $this->db->get('student_experience');
	$data['companyname'] = $this->input->post('companyname',TRUE);
	$data['designation'] = $this->input->post('designation',TRUE);
	$data['date_from']=$this->input->post('date_from',TRUE);
	$data['date_to']=$this->input->post('date_to',TRUE);	
							   	
	$this->load->view('experience',$data);

}
function activities()
{
	$this->load->library('session');	
    $student_name = ($this->session->userdata['student_logged_in']['student_name']);
	$student_id = ($this->session->userdata['student_logged_in']['student_id']);
	$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);
    $submit= $this->input->post('submit',TRUE);
    if($submit == "Cancel")
	{		
		redirect('store_company/dashboard');
	}           
	if($submit == "Save")
	{				
		//process the form                 
		$this->load->library('form_validation');
		$this->form_validation->set_rules('stu_achivements','Student achivements','required');
		$this->form_validation->set_rules('stu_activities','Student activities','required');
		$this->form_validation->set_rules('stu_hobbies','Student Hobbies','required');
		$this->form_validation->set_rules('stu_courses','Student Courses','required');
		$this->form_validation->set_rules('stu_computer','Student Computer Literacy ','required');
		if($this->form_validation->run()==TRUE)
		{
				$data['stu_achivements'] = $this->input->post('stu_achivements',TRUE);
				$data['stu_activities'] = $this->input->post('stu_activities',TRUE);
				$data['stu_courses'] = $this->input->post('stu_courses',TRUE);
				$data['stu_hobbies'] = $this->input->post('stu_hobbies',TRUE);
				$data['stu_computer'] = $this->input->post('stu_computer',TRUE);					                  
				 if(is_numeric($student_enroll))
   				 {
				 	//update the company details
   				 	 
   		 			$this->_update($student_enroll,$data);
   		 			$this->session->set_flashdata('flashSuccess', 'Others Details successfully updated');  
   		 			redirect('store_student/activities');   					
   				 }
		}
	}
    if((is_numeric($student_enroll)) && ($submit!='Submit'))
	{			 
	   	$this->db->where('stu_enroll',$student_enroll);
		$query1=$this->db->get('student_accounts');
		foreach($query1->result() as $row)
		{
			$data['stu_activities'] = $row->stu_activities;
			$data['stu_achivements'] = $row->stu_achivements;
			$data['stu_courses'] = $row->stu_courses;
			$data['stu_hobbies'] = $row->stu_hobbies;
			$data['stu_computer'] = $row->stu_computer;
	    }
	    if(!isset($data))
	    {
	    	$data="";
	    }
	}else
	{			 
   		$data['stu_achivements'] = $this->input->post('stu_achivements',TRUE);
		$data['stu_activities'] = $this->input->post('stu_activities',TRUE);
		$data['stu_courses'] = $this->input->post('stu_courses',TRUE);
		$data['stu_hobbies'] = $this->input->post('stu_hobbies',TRUE);
		$data['stu_computer'] = $this->input->post('stu_computer',TRUE);
   	}
   	$data = $this->fetch_data_from_db($student_enroll);
	$this->load->view('activities',$data);

}
function delete_project()
{
		$del_id = $this->uri->segment(3);
		$this->db->where('id', $del_id);
		$this->db->delete('student_projects');
		redirect('store_student/projects');

}
function projects()
{
	$this->load->library('session');	
    $student_name = ($this->session->userdata['student_logged_in']['student_name']);
	$student_id = ($this->session->userdata['student_logged_in']['student_id']);
	$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);  
    $submit= $this->input->post('submit',TRUE);
              
	if($submit == "Saveproject")
	{				               
		$this->load->library('form_validation');
		$this->form_validation->set_rules('project_title','Project Name','required');
		$this->form_validation->set_rules('project_description','Project Description','required');
		
		if($this->form_validation->run()==TRUE)
		{
			
					$data['project_title'] = $this->input->post('project_title',TRUE);
					$data['project_description'] = $this->input->post('project_description',TRUE);
					$data['stu_enroll'] = $student_enroll;
					
					if(is_numeric($student_enroll))
	   				{			   				 	
	   				 	 $this->db->insert('student_projects', $data);
	   		 			 $this->session->set_flashdata('flashSuccess', 'Experience Details successfully updated');
	   		 			redirect('store_student/projects');
	   				}
		}
	}
	$data = $this->fetch_data_from_db($student_enroll);
	$this->db->where('stu_enroll',$student_enroll);
	$data['myproject'] = $this->db->get('student_projects');
	$data['project_title'] = $this->input->post('project_title',TRUE);
	$data['project_description'] = $this->input->post('project_description',TRUE);
						   	
	$this->load->view('projects',$data);

}
function no_result_error()
{
	$this->load->library('session');
	$student_name = ($this->session->userdata['student_logged_in']['student_name']);
	$student_id = ($this->session->userdata['student_logged_in']['student_id']);
	$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);	
	       
   	$data = $this->fetch_data_from_db($student_enroll);	
	$this->load->view('no_result_error',$data);
}
function jobs()
{
	$this->load->library('session');	
    $student_name = ($this->session->userdata['student_logged_in']['student_name']);
	$student_id = ($this->session->userdata['student_logged_in']['student_id']);
	$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);		  
    $submit= $this->input->post('submit',TRUE);
    $data = $this->fetch_data_from_db($student_enroll);
    

	$this->db->where('stu_enroll',$student_enroll);
    $this->db->limit(1);
	$this->db->order_by('stu_semester', 'DESC');
	$query2  = $this->db->get('student_result');
	$resultrow=$query2->num_rows();

	if($resultrow==0)
	{
		redirect('store_student/no_result_error');
	}

	if($resultrow>0)
	{
		foreach($query2->result() as $row)
		{	
			$stucpi = $row->stu_cpi;
			$stuspi = $row->stu_spi;
			$stucgpi = $row->stu_cgpi;
			$totalbacklog=$row->stu_total_backlog;
			$currentbacklog=$row->stu_current_backlog;

		}			
	}else
	{
			$stucpi = 'NORESULT';
			$stuspi = 'NORESULT';
			$stucgpi = 'NORESULT';
	}
		            
    $this->db->where('stu_enroll',$student_enroll);
	$clist = $this->db->get('company_applications');

	$cnames = array('');	
	foreach($clist->result() as $row)
	{	
		array_push($cnames,$row->company_name);
	}
	$this->db->where('company_status','Active');
	$this->db->where_not_in('id', $cnames);
	$data['query']=$this->db->get('company_list');	
	$data['totalbacklog'] = $totalbacklog;	
	$data['currentbacklog'] = $currentbacklog;	
	$data['stucpi'] = $stucpi;
	$data['stuspi'] = $stuspi;
	$data['stucgpi'] = $stucgpi;
	$this->load->view('jobs',$data);

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
function college_register()
{		   
	$submit = $this->input->post('submit',TRUE);

	if($submit=="Collegesubmit")
	{ 
		    $this->load->library('form_validation');
            
			$this->form_validation->set_rules('college_name',' College Name','required|unique[college_accounts.college_name,college_accounts.id]');
			$this->form_validation->set_rules('college_code',' College Code','required|unique[college_accounts.college_code,college_accounts.id]');
			$this->form_validation->set_rules('principal_name',' Principal Name','required');
			$this->form_validation->set_rules('principal_mobile','Mobile number','required|exact_length[10]|unique[college_accounts.principal_mobile,college_accounts.id]');
			$this->form_validation->set_rules('principal_email','Email','required|valid_email|unique[college_accounts.principal_email,college_accounts.id]');
			$this->form_validation->set_rules('principal_password','Password','required|min_length[04]|max_length[20]');
			$this->form_validation->set_rules('principal_repassword','Re enter Password','required|min_length[04]|max_length[20]|matches[principal_password]');
		 

		if($this->form_validation->run()==TRUE)
		{
			$data['college_name'] = $this->input->post('college_name',TRUE);
			$data['principal_name'] = $this->input->post('principal_name',TRUE);
			$data['college_code'] = $this->input->post('college_code',TRUE);
			$data['principal_email']=$this->input->post('principal_email',TRUE);
			$data['principal_mobile']=$this->input->post('principal_mobile',TRUE);
			//$data['principal_password']=$this->input->post('principal_password',TRUE);	
			$rand_salt = $this->genRndSalt();
			$encrypt_pass = $this->encryptUserPwd( $this->input->post('principal_password'),$rand_salt);
			$data['principal_password']=$encrypt_pass;
			$data['salt'] = $rand_salt;				
			$data['college_status'] = 'NotApproved';
			$data=$this->security->xss_clean($data);	
			$this->mail_student($this->input->post('principal_email',TRUE),'<p>Dear '.$this->input->post('principal_name',TRUE).'</p><p>Thank you for your College Registartion !</p><p>You can Maintain your college profile after approval by authority.<br/> You will receive mail of approval soon. You can login by using email ID or Mobile number and password.<br/><br/>College Email ID :'.$this->input->post('principal_email',TRUE).'<br/>Mobile Number :'.$this->input->post('principal_mobile',TRUE).'<br/>College Code:'.$this->input->post('college_name',TRUE).'<br/>College Code:'.$this->input->post('college_code',TRUE).'<br/><br/><br/>Thanking You');
			
            $this->db->insert('college_accounts', $data);	
           // echo 'hm'; die();
            redirect('student/college_register_success');
		}
		
	}

	$data['college_name'] = $this->input->post('college_name',TRUE);
	$data['college_code'] = $this->input->post('college_code',TRUE);
	$data['principal_email']=$this->input->post('principal_email',TRUE);
	$data['principal_mobile']=$this->input->post('principal_mobile',TRUE);
	$data['principal_name'] = $this->input->post('principal_name',TRUE);
		
	$this->load->view('college_register',$data);

}

function mail_student($to, $content)
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

//Email content
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
				$this->db->where('stu_email',$email);
				$query=$this->db->get('student_accounts');
				$row=$query->num_rows();
				if($row>0)
				{
					foreach($query->result() as $row)
                	{
                		$got_password = $row->stu_password;
                		$email_id = $row->stu_email;
                		$this->mail_student($email_id,'Your Password is '. $got_password);
		                $this->session->set_flashdata('flashSuccess', 'We have send email on registered mail ID.');
		                redirect('store_student/forget_password');
                	}
				}
				 $this->session->set_flashdata('flashSuccess', 'Your Email Id is not registered');
		         redirect('store_student/forget_password');				
				
			}
	}
	$this->load->view('forget_password');

}

function student_company()
{				

				$stu_id = $this->uri->segment(3);
				$this->db->where('stu_enroll',$stu_id);
				$data['query'] = $this->db->get('company_applications');
				$data['stu_id'] = $stu_id;
				$this->load->view('profile_company',$data);

}

public function student_logout()
{

		// Removing session data
		$sess_array = array(
		'student_id' => '',
		'student_name' => '',
		'student_enroll' => ''
		);
		$this->session->unset_userdata('student_logged_in', $sess_array);
		$this->session->set_flashdata('flashSuccess', 'Successfully Logout');
		redirect(base_url() .'student');
}
function checkenroll($str)
{
	
	$error_msg="Your username or password is not correct";

	$value1=$str;
	$col1="stu_enroll";
	$col2="stu_email";
    $value2=$str;
   
     $this->db->where($col1,$value1);
     $this->db->or_where($col2,$value2);
     $query = $this->db->get('student_accounts');

     $num_rows = $query->num_rows();
     if($num_rows<1)
     {
     	$this->form_validation->set_message('checkenroll',$error_msg);
     	return FALSE;
     }
              foreach($query->result() as $row)
                {
                	$got_password = $row->stu_password;
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

function register()
{
			$submit = $this->input->post('submit',TRUE);

			if($submit=="Sturegister")
			{ 
				    $this->load->library('form_validation');
		            
					$this->form_validation->set_rules('stu_enroll',' Enrollment','required|exact_length[12]|unique[student_accounts.stu_enroll,student_accounts.id]');
					$this->form_validation->set_rules('stu_surname','SurName','required');
					$this->form_validation->set_rules('stu_name',' name','required');
					$this->form_validation->set_rules('stu_mobile','Mobile number','required|exact_length[10]|unique[student_accounts.stu_mobile,student_accounts.id]');
					$this->form_validation->set_rules('stu_email','Email','required|valid_email|unique[student_accounts.stu_email,student_accounts.id]');
					$this->form_validation->set_rules('stu_password','Password','required|min_length[04]|max_length[20]');
					$this->form_validation->set_rules('stu_confirm_password','Re enter Password','required|min_length[04]|max_length[20]|matches[stu_password]');
					$this->form_validation->set_rules('stu_college','College Name','required');
					$this->form_validation->set_rules('stu_department','Department Name','required');
					$this->form_validation->set_rules('stu_alternate_mobile','Alternate Mobile','required');
					$this->form_validation->set_rules('stu_category','Category Name','required');
					$this->form_validation->set_rules('stu_gender','Gender Name','required');
					$this->form_validation->set_rules('stu_ph','PH Status','required');
					$this->form_validation->set_rules('stu_minority','Minority Status','required');
					$this->form_validation->set_rules('stu_dob','Date of Birth','required');
					$this->form_validation->set_rules('stu_address','Address','required');
					$this->form_validation->set_rules('stu_district','District Name','required');
					$this->form_validation->set_rules('stu_pincode','Pin code','required');
					$this->form_validation->set_rules('science','12th OR DIPLOMA RESULT ','required');
					$this->form_validation->set_rules('stu_10th_medium','10th Medium Name','required');
					$this->form_validation->set_rules('stu_10th_board','10th School Name','required');
					$this->form_validation->set_rules('stu_10th_result','10th Result ','required|numeric');
					$this->form_validation->set_rules('stu_10th_passing','10th Passing Year','required');

				 // echo $this->input->post('stu_12th_result',TRUE); die();

					if($this->input->post('science',TRUE)=='1')
					{
						
						$this->form_validation->set_rules('stu_12th_passing','12th Passing Year','required');
						$this->form_validation->set_rules('stu_12th_board','12th Board Name','required');
						$this->form_validation->set_rules('stu_12th_school','12th School Name','required');
						$this->form_validation->set_rules('stu_12th_result','12th Result','required|numeric');
					}else if($this->input->post('science',TRUE)=='2')
					{
						
					$this->form_validation->set_rules('stu_diploma_passing','Diploma Passing Year','required');
					$this->form_validation->set_rules('stu_diploma_college','Diploma College Name','required');
					$this->form_validation->set_rules('stu_diploma_result','Diploma REsult','required|numeric');
					$this->form_validation->set_rules('stu_diploma_branch','Diploma Branch Name','required');
					}
				if($this->form_validation->run()==TRUE)
				{
					$data= $this->fetch_data_from_post();

					if($this->input->post('science',TRUE)=='1')
					{
					
					$data['stu_12th_result']=$this->input->post('stu_12th_result',TRUE);
					$data['stu_12th_board']=$this->input->post('stu_12th_board',TRUE);
					$data['stu_12th_school']=$this->input->post('stu_12th_school',TRUE);
					$data['stu_12th_passing']=$this->input->post('stu_12th_passing',TRUE);
					$data['stu_12th_status']='1';
				}else
				{
					$data['stu_diploma_branch']=$this->input->post('stu_diploma_branch',TRUE);
					$data['stu_diploma_college']=$this->input->post('stu_diploma_college',TRUE);
					$data['stu_diploma_result']=$this->input->post('stu_diploma_result',TRUE);
					$data['stu_diploma_passing']=$this->input->post('stu_diploma_passing',TRUE);
					$data['stu_diploma_status']='1';
				}
					$data['stu_status']='0';		
					
		            $this->db->insert('student_accounts', $data);	
		            $this->mail_student($this->input->post('stu_email',TRUE),'<p>Dear '.$this->input->post('stu_name',TRUE).'</p><p>Thank you for your Registartion ! You can maintain your profile via portal to participate in recruitement of companies. You can apply for company after approve by your college </p><br/>Email: '.$this->input->post('stu_email',TRUE).'<br/>Mobile Number:'.$this->input->post('stu_mobile',TRUE).'<br/>College Name: '.$this->input->post('stu_college',TRUE).'<br/>Department Name: '.$this->input->post('stu_department',TRUE).'<br/>Password: '.$this->input->post('stu_password',TRUE));
		            $this->session->set_flashdata('flashSuccess', 'Your registration submitted successfully. Kindly meet college TPO Cell with original documents and results for approval of your profile data');
		            redirect('store_student/stu_login');
				}

				
			  }
            $data=$this->fetch_data_from_post();
            
            $data['science']=$this->input->post('science',TRUE);
         
            $data['stu_12th_result']=$this->input->post('stu_12th_result',TRUE);
			$data['stu_12th_board']=$this->input->post('stu_12th_board',TRUE);
			$data['stu_12th_school']=$this->input->post('stu_12th_school',TRUE);
			$data['stu_12th_passing']=$this->input->post('stu_12th_passing',TRUE);
			$data['stu_diploma_branch']=$this->input->post('stu_diploma_branch',TRUE);
			$data['stu_diploma_college']=$this->input->post('stu_diploma_college',TRUE);
			$data['stu_diploma_result']=$this->input->post('stu_diploma_result',TRUE);
			$data['stu_diploma_passing']=$this->input->post('stu_diploma_passing',TRUE);
            $this->db->select("college_name");
             $this->db->where("college_status",'Approved');
			$this->db->from('college_accounts');
			$data['college_list'] = $this->db->get();			
			$this->load->view('student_newregister',$data);
}


function fetch_data_from_post()
{
			
					//get basic details
					$data['stu_name'] = $this->input->post('stu_name',TRUE);
					$data['stu_surname']=$this->input->post('stu_surname',TRUE);
					$data['stu_father_name']=$this->input->post('stu_father_name',TRUE);
					$data['stu_enroll'] = $this->input->post('stu_enroll',TRUE);
					$data['stu_email']=$this->input->post('stu_email',TRUE);
					$data['stu_mobile']=$this->input->post('stu_mobile',TRUE);
					$data['stu_college'] = $this->input->post('stu_college',TRUE);
					$data['stu_department'] = $this->input->post('stu_department',TRUE);
					
				//	$rand_salt = $this->genRndSalt();
				//	$encrypt_pass = $this->encryptUserPwd($this->input->post('stu_password'),$rand_salt);
					$data['stu_password']=$this->input->post('stu_password',TRUE);
				//	$data['salt'] = $rand_salt;	

					//get personal details
					$data['stu_alternate_mobile']=$this->input->post('stu_alternate_mobile',TRUE);
					$data['stu_category']=$this->input->post('stu_category',TRUE);
					$data['stu_gender']=$this->input->post('stu_gender',TRUE);
					$data['stu_ph']=$this->input->post('stu_ph',TRUE);
					$data['stu_minority']=$this->input->post('stu_minority',TRUE);
					$data['stu_dob']=$this->input->post('stu_dob',TRUE);
					$data['stu_address']=$this->input->post('stu_address',TRUE);
					$data['stu_district']=$this->input->post('stu_district',TRUE);
					$data['stu_pincode']=$this->input->post('stu_pincode',TRUE);

					$data['stu_10th_passing']=$this->input->post('stu_10th_passing',TRUE);
					$data['stu_10th_medium']=$this->input->post('stu_10th_medium',TRUE);
					$data['stu_10th_result']=$this->input->post('stu_10th_result',TRUE);
					$data['stu_10th_board']=$this->input->post('stu_10th_board',TRUE);
					

					return $data;
}

function fetch_data_from_db($stu_id)
{
			$this->db->where('stu_enroll',$stu_id);
			$query1=$this->db->get('student_accounts');

			foreach($query1->result() as $row)
			{
				$data['stu_name'] = $row->stu_name;
				$data['stu_enroll'] = $row->stu_enroll;
				$data['stu_email'] = $row->stu_email;
				$data['stu_mobile'] = $row->stu_mobile;
				$data['stu_name'] = $row->stu_name;
				$data['stu_altnumber'] = $row->stu_alternate_mobile;
				$data['stu_college'] = $row->stu_college;
				$data['stu_department'] = $row->stu_department;
				$data['stu_category'] = $row->stu_category;
				$data['stu_dob'] = $row->stu_dob;
				$data['stu_ph'] = $row->stu_ph;
				$data['stu_zipcode'] = $row->stu_pincode;
				$data['stu_address'] = $row->stu_address;
				$data['stu_gender'] = $row->stu_gender;
				$data['stu_activities'] = $row->stu_activities;
				$data['stu_achivements'] = $row->stu_achivements;
				$data['stu_courses'] = $row->stu_courses;
				$data['stu_hobbies'] = $row->stu_hobbies;
				$data['stu_computer'] = $row->stu_computer;
				$data['stu_photo'] = $row->stu_photo;
				$data['stu_sign'] = $row->stu_sign;
				$data['stu_id'] = $row->id;
				$data['stu_10th_medium'] = $row->stu_10th_medium;
				$data['stu_10th_board'] = $row->stu_10th_board;
				$data['stu_10th_result'] = $row->stu_10th_result;
				$data['stu_10th_passing'] = $row->stu_10th_passing;
				$data['stu_12th_board'] = $row->stu_12th_board;
				$data['stu_12th_school'] = $row->stu_12th_school;
				$data['stu_12th_result'] = $row->stu_12th_result;
				$data['stu_12th_passing'] = $row->stu_12th_passing;
				$data['stu_12th_status'] = $row->stu_12th_status;
				$data['stu_diploma_branch'] = $row->stu_diploma_branch;
				$data['stu_diploma_college'] = $row->stu_diploma_college;
				$data['stu_diploma_result'] = $row->stu_diploma_result;
				$data['stu_diploma_passing'] = $row->stu_diploma_passing;
				$data['stu_diploma_status'] = $row->stu_diploma_status;
		    }
		    if(!isset($data))
		    {
		    	$data="";
		    }
		    return $data;

}

		

function student_home()
{
	        $student_name = ($this->session->userdata['student_logged_in']['student_name']);
			$student_id = ($this->session->userdata['student_logged_in']['student_id']);
			$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);	
			       
		   	$data = $this->fetch_data_from_db($student_enroll);	
		   	$this->db->where('stu_enroll',$student_enroll);
			$data['degree'] = $this->db->get('student_academic');
			$this->db->where('stu_enroll',$student_enroll);
			$data['experience'] = $this->db->get('student_experience');
		   	$this->db->where('stu_enroll',$student_enroll);
			$data['applications'] = $this->db->get('company_applications');
		   	
			$this->load->view('profile_home',$data);
}

function profile_upload()
{
	             $student_name = ($this->session->userdata['student_logged_in']['student_name']);
				$student_id = ($this->session->userdata['student_logged_in']['student_id']);
				$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);

	 			$config['upload_path']          = './student_photos/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 250;
                $config['max_height']           = 250;
                $config['file_name']            = $student_enroll;
                $config['overwrite']            = TRUE;

                $this->load->library('upload', $config);
                $stu_id = $this->uri->segment(3);

                $submit= $this->input->post('submit',TRUE);
                $photoname= $this->input->post('photoname',TRUE);
                
			    if($submit == "Upload Photo")

				{

					 
					 if ( ! $this->upload->do_upload('stu_photo'))
                	{
                        $data['error'] = $this->upload->display_errors(); 
                        $this->db->where('stu_enroll',$student_enroll);
						$data1=$this->db->get('student_accounts');
                         
                         foreach($data1->result() as $row)
						{
								$data['stu_photo'] = $row->stu_photo;
								$data['stu_sign'] = $row->stu_sign;

						}	              
                        
                        $this->load->view('profilephoto',$data);	
                	}
                	else
                	{
                		
                		$data = $this->upload->data();    					
                	    $mydata['stu_photo']=$data['file_name'];
                        $this->_update($student_enroll,$mydata);
		   		 		$this->session->set_flashdata('flashSuccess', 'Profile Photo successfully updated');       
                        redirect('store_student/profilephoto');	

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

function student_query()
{	   	
		    $this->load->library('session');	
		    $stu_id = $this->uri->segment(3);	  
		    $submit= $this->input->post('submit',TRUE);
		    if($submit == "Cancel")
			{
				
				 redirect('index.php/store_student/student_home/'.$stu_id);
			}           
			if($submit == "Send")
			{				              
				$this->load->library('form_validation');
				$this->form_validation->set_rules('stu_query','Student Query','required');
				if($this->form_validation->run()==TRUE)
				{
					
						$data['stu_name'] = $this->input->post('stu_name',TRUE);
						$data['stu_enroll'] = $stu_id;
						$data['stu_mobile'] = $this->input->post('stu_mobile',TRUE);
						$data['stu_email'] = $this->input->post('stu_email',TRUE);
						$data['stu_query'] = $this->input->post('stu_query',TRUE);	
						$data['stu_reply'] = 'Reply Pending';
						
						if(is_numeric($stu_id))
		   				 {	 
		   		 			 $this->db->insert('student_query', $data);
		   		 			 $flash_msg="Student details was successfully added";
		   		 			 $value= '<div class="callout callout-success">'.$flash_msg.'</div>';
		   		 			 $this->session->set_flashdata('company',$value);
		   		 			 redirect('index.php/store_student/student_query/'.$stu_id);
		   				 }
				}
			}

	        if((is_numeric($stu_id)) && ($submit!='Send'))
 			{ 
		   		$data = $this->fetch_data_from_db($stu_id);
		   		$this->db->where('stu_enroll',$stu_id);
				$data['query'] = $this->db->get('student_query');

 			}
		   	$data['stu_id'] = $stu_id;
			$this->load->view('profile_query',$data);
}
function student_personal()
{
			$this->load->library('session');	
		    $student_name = ($this->session->userdata['student_logged_in']['student_name']);
			$student_id = ($this->session->userdata['student_logged_in']['student_id']);
			$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);

		  
		    $submit= $this->input->post('submit',TRUE);
		    if($submit == "Cancel")
			{
				
				redirect('store_company/profile_home');
			}           
			if($submit == "Save")
			{				

				//process the form                 
				$this->load->library('form_validation');
				$this->form_validation->set_rules('stu_name','Student Name','required');				
				$this->form_validation->set_rules('stu_altnumber','Student Alt Number','required');
				$this->form_validation->set_rules('stu_category','Student Category','required');
				$this->form_validation->set_rules('stu_dob','Student Date of birth','required');
				$this->form_validation->set_rules('stu_zipcode','Student Zipcode','required');
				$this->form_validation->set_rules('stu_gender','Student Gender','required');
				$this->form_validation->set_rules('stu_address','Student Address','required');


				if($this->form_validation->run()==TRUE)
				{
					
							$data['stu_name'] = $this->input->post('stu_name',TRUE);
							$data['stu_ph'] = $this->input->post('stu_ph',TRUE);							
							$data['stu_altnumber'] = $this->input->post('stu_altnumber',TRUE);							
							$data['stu_category'] = $this->input->post('stu_category',TRUE);
							$data['stu_dob'] = $this->input->post('stu_dob',TRUE);
							$data['stu_zipcode'] = $this->input->post('stu_zipcode',TRUE);
							$data['stu_address'] = $this->input->post('stu_address',TRUE);
							$data['stu_gender'] = $this->input->post('stu_gender',TRUE);
							$data['stu_url']=url_title($student_enroll);
						
                   
						 if(is_numeric($student_enroll))
		   				 {
	   				 	//update the company details
		   				 	 
		   		 			 $this->_update($student_enroll,$data);
		   		 			$this->session->set_flashdata('flashSuccess', 'Personal data successfully updated');  
		   		 			 redirect('store_student/student_personal');
		   					
		   				 }
				}
			}

	        if((is_numeric($student_enroll)) && ($submit!='Submit'))
 			{
 				
 				 
		   		$data = $this->fetch_data_from_db($student_enroll);
 			}else
 			{
 				 
		   		$data=$this->fetch_data_from_post();
		   	}
		    $data = $this->fetch_data_from_db($student_enroll);	
			$this->load->view('profile_personal',$data);
}

function delete_degree()
{
		$del_id = $this->uri->segment(3);
		$this->db->where('id', $del_id);
		$this->db->delete('student_academic');
		redirect('store_student/student_academic');

}

function student_academic()
{
	       	$this->load->library('session');	
		    $student_name = ($this->session->userdata['student_logged_in']['student_name']);
			$student_id = ($this->session->userdata['student_logged_in']['student_id']);
			$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);		  
		    $submit= $this->input->post('submit',TRUE);
		    if($submit == "Cancel")
			{
				
				redirect('store_student/student_home');
			}           
			if($submit == "Save")
			{				

				//process the form                 
				$this->load->library('form_validation');
				$this->form_validation->set_rules('stu_degree','Student Degree','required');
				$this->form_validation->set_rules('stu_specialization','Student Specialization','required');
				$this->form_validation->set_rules('stu_result','Student Result','required|numeric');
				$this->form_validation->set_rules('stu_passingyear','Student Passing year','required|exact_length[4]|numeric');
				$this->form_validation->set_rules('stu_status','Student Status','required');
				$this->form_validation->set_rules('stu_board','Student Board Name','required');
				

				if($this->form_validation->run()==TRUE)
				{
					
							$data['stu_degree'] = $this->input->post('stu_degree',TRUE);
							$data['stu_specialization'] = $this->input->post('stu_specialization',TRUE);
							$data['stu_board']=$this->input->post('stu_board',TRUE);
							$data['stu_passyear']=$this->input->post('stu_passingyear',TRUE);	
							$data['stu_status'] = $this->input->post('stu_status',TRUE);
							$data['stu_result'] = $this->input->post('stu_result',TRUE);
							$data['stu_enroll'] =  $student_enroll ;

                   
								 if(is_numeric($student_enroll))
				   				 {			   				 	
				   				 	 $this->db->insert('student_academic', $data);
				   		 			$this->session->set_flashdata('flashSuccess', 'Acadamic Details successfully updated'); 
				   		 			 $this->db->where('stu_enroll',$student_enroll);
									 $data['query'] = $this->db->get('student_academic');
									redirect('store_student/student_academic');	

				   				 }
				}
			}

	      
 			$data = $this->fetch_data_from_db($student_enroll);
	 		$this->db->where('stu_enroll',$student_enroll);
			$data['query'] = $this->db->get('student_academic');
			$this->db->where('stu_enroll',$student_enroll);
			$data['sturesult'] = $this->db->get('student_result');
			$data['stu_degree'] = $this->input->post('stu_degree',TRUE);
			$data['stu_specialization'] = $this->input->post('stu_specialization',TRUE);
			$data['stu_board']=$this->input->post('stu_board',TRUE);
			$data['stu_result']=$this->input->post('stu_result',TRUE);
			$data['stu_status']=$this->input->post('stu_status',TRUE);
			$data['stu_passingyear']=$this->input->post('stu_passingyear',TRUE);	
			 

			$this->load->view('profile_academic',$data);

}
function student_others()
{
	        $this->load->library('session');	
		    $student_name = ($this->session->userdata['student_logged_in']['student_name']);
			$student_id = ($this->session->userdata['student_logged_in']['student_id']);
			$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);
		    $submit= $this->input->post('submit',TRUE);
		    if($submit == "Cancel")
			{
				
				redirect('store_company/profile_home');
			}           
			if($submit == "Save")
			{				

				//process the form                 
				$this->load->library('form_validation');
				$this->form_validation->set_rules('stu_achivements','Student achivements','required');
				$this->form_validation->set_rules('stu_activities','Student activities','required');
				$this->form_validation->set_rules('stu_hobbies','Student Hobbies','required');
				$this->form_validation->set_rules('stu_courses','Student Courses','required');
				$this->form_validation->set_rules('stu_computer','Student Computer Literacy ','required');

				if($this->form_validation->run()==TRUE)
				{
					
						$data['stu_achivements'] = $this->input->post('stu_achivements',TRUE);
						$data['stu_activities'] = $this->input->post('stu_activities',TRUE);
						$data['stu_courses'] = $this->input->post('stu_courses',TRUE);
						$data['stu_hobbies'] = $this->input->post('stu_hobbies',TRUE);
						$data['stu_computer'] = $this->input->post('stu_computer',TRUE);									                   
						 if(is_numeric($student_enroll))
		   				 {
	   				 	//update the company details
		   				 	 
		   		 			 $this->_update($student_enroll,$data);
		   		 			$this->session->set_flashdata('flashSuccess', 'Others Details successfully updated');  
		   		 			 redirect('store_student/student_others');
		   					
		   				 }
				}
			}

	        if((is_numeric($student_enroll)) && ($submit!='Submit'))
 			{
 				
 				 
		   		$data = $this->fetch_data_from_db($student_enroll);
 			}else
 			{
 				 
		   		$data=$this->fetch_data_from_post();
		   	}
			$this->load->view('profile_others',$data);
}

function student_register()
{
	        $data='';
			$this->load->view('profile_register',$data);
}
function delete_experience()
{
		$del_id = $this->uri->segment(3);
		$this->db->where('id', $del_id);
		$this->db->delete('student_experience');
		redirect('store_student/experience');

}

function student_experience()
{
	        $this->load->library('session');	
		    $student_name = ($this->session->userdata['student_logged_in']['student_name']);
			$student_id = ($this->session->userdata['student_logged_in']['student_id']);
			$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);  
		    $submit= $this->input->post('submit',TRUE);
		    if($submit == "Cancel")
			{			
				redirect('store_student/student_home');
			}           
			if($submit == "Save")
			{				               
				$this->load->library('form_validation');
				$this->form_validation->set_rules('companyname','Company Name','required');
				$this->form_validation->set_rules('designation','Designation','required');
				$this->form_validation->set_rules('date_from','Date From','required');
				$this->form_validation->set_rules('date_to','Date To','required');
		
				if($this->form_validation->run()==TRUE)
				{
					
							$data['companyname'] = $this->input->post('companyname',TRUE);
							$data['designation'] = $this->input->post('designation',TRUE);
							$data['date_from']=$this->input->post('date_from',TRUE);
							$data['date_to']=$this->input->post('date_to',TRUE);	
							$data['stu_enroll'] =  $student_enroll ;

							if(is_numeric($student_enroll))
			   				{			   				 	
			   				 	 $this->db->insert('student_experience', $data);
			   		 			 $this->session->set_flashdata('flashSuccess', 'Experience Details successfully updated');
			   		 			redirect('store_student/student_experience');
			   				}
				}
			}

	      
 			$data = $this->fetch_data_from_db($student_enroll);
	 		$this->db->where('stu_enroll',$student_enroll);
			$data['query'] = $this->db->get('student_experience');
			$data['companyname'] = $this->input->post('companyname',TRUE);
			$data['designation'] = $this->input->post('designation',TRUE);
			$data['date_from']=$this->input->post('date_from',TRUE);
			$data['date_to']=$this->input->post('date_to',TRUE);	
			$data['stu_enroll'] =  $student_enroll ;						   	
			$this->load->view('profile_experience',$data);
}

function student_apply()
{
	        $this->load->library('session');	
		    $student_name = ($this->session->userdata['student_logged_in']['student_name']);
			$student_id = ($this->session->userdata['student_logged_in']['student_id']);
			$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);		  
		    $submit= $this->input->post('submit',TRUE);

		    $countdegree=0;
		    $status10th='NO';
		    $status12th='NO';
		    $statusdiploma='NO';
		    $stu12th='100';
		     $stu10th='100';
		      $studiploma='10';



		    $this->db->where('stu_degree','10th');
		    $this->db->where('stu_enroll',$student_enroll);
		    $query10th  = $this->db->get('student_academic');
			$result10th=$query10th->num_rows();
			if($result10th==1)
			{
					$countdegree=$countdegree+1;
					foreach($query10th->result() as $rowenglish)
					{	
						$stu10th = $rowenglish->stu_result;
						$status10th='YES';
					
					}
			}

			$this->db->where('stu_degree','12th');
			$this->db->where('stu_enroll',$student_enroll);
		    $query12th  = $this->db->get('student_academic');
			$result12th=$query12th->num_rows();
			if($result12th==1)
			{
					$countdegree=$countdegree+1;
					foreach($query12th->result() as $rowscience)
					{	
						$stu12th = $rowscience->stu_result;
						$status12th='YES';
					
					}
			}

			$this->db->where('stu_degree','DIPLOMA');
			$this->db->where('stu_enroll',$student_enroll);
		    $querydiplo  = $this->db->get('student_academic');
			$resultdiplo=$querydiplo->num_rows();
			if($resultdiplo==1)
			{
					$countdegree=$countdegree+1;
					foreach($querydiplo->result() as $rowdiploma)
					{	
						$studiploma = $rowdiploma->stu_result;
						$statusdiploma='YES';
					
					}
			}


		    $this->db->where('stu_enroll',$student_enroll);
		    $this->db->select_max('stu_total_backlog');
			$query = $this->db->get('student_result');
			$row=$query->row();
			$totalbacklog=$row->stu_total_backlog;

			$this->db->where('stu_enroll',$student_enroll);
		    $this->db->limit(1);
			$this->db->order_by('stu_semester', 'DESC');
			$query2  = $this->db->get('student_result');
			$resultrow=$query2->num_rows();
		
			if($resultrow>0)
			{
				foreach($query2->result() as $row)
				{	
					$stucpi = $row->stu_cpi;
					$stuspi = $row->stu_spi;
					$stucgpi = $row->stu_cgpi;

				}
					
			}else
			{
					$stucpi = 'NO RESULT';
					$stuspi = 'NO RESULT';
					$stucgpi = 'NO RESULT';
			}
					            
		    $this->db->where('stu_enroll',$student_enroll);
			$clist = $this->db->get('company_applications');

			$cnames = array('');	
			foreach($clist->result() as $row)
			{	
				array_push($cnames,$row->company_name);
			}
			$this->db->where('company_status','Active');
			$this->db->where_not_in('id', $cnames);
			$data['query']=$this->db->get('company_list');	
			$data['totalbacklog'] = $totalbacklog;	
			$data['stucpi'] = $stucpi;
			$data['stuspi'] = $stuspi;
			$data['stucgpi'] = $stucgpi;
			$data['countdegree'] = $countdegree;
			$data['stu10th'] = $stu10th;
			$data['stu12th'] = $stu12th;
			$data['studiploma'] = $studiploma;
			$data['status10th'] = $status10th;
			$data['status12th'] = $status12th;
			$data['statusdiploma'] = $statusdiploma;

			

			$this->load->view('profile_apply',$data);
}

function submit_apply()
{
	        $student_name = ($this->session->userdata['student_logged_in']['student_name']);
			$student_id = ($this->session->userdata['student_logged_in']['student_id']);
			$student_enroll = ($this->session->userdata['student_logged_in']['student_enroll']);

	        $cname = $this->input->post('apply',TRUE);
		    $data['company_name'] = $cname;
		    $check = $this->input->post($cname,TRUE);
		    if($check=='on')
		    {
		    $data['stu_enroll'] = $student_enroll;
		    $this->db->insert('company_applications', $data);
		    $flash_msg="You are successfully applied for company";
	 		$value= '<div class="alert alert-primary" role="alert">'.$flash_msg.'</div>';
	 		$this->session->set_flashdata('Student',$value);
		    redirect('store_student/jobs');
			}else
			{
			$flash_msg="Please accept terms and condition first";
	 		$value= '<div class="alert alert-primary" role="alert">'.$flash_msg.'</div>';
	 		$this->session->set_flashdata('Student',$value);
		    redirect('store_student/jobs');

			}		    

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
    $this->form_validation->set_message('date_valid', 'The Date field must be mm/dd/yyyy');
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
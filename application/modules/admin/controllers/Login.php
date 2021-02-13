<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller 
{
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}
  	public function index() 
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

				
			     
			     $this->db->where('rector_email',$u_id);
			      
			     $data=$this->db->get('college_details'); 
			     $nrow=$data->num_rows();
			     if($nrow=='1')
			     {    
			     
			     	foreach($data->result() as $row)
			     	{
			     		$dbpass=$row->password;
			     		if($dbpass==$pass)
			     		{    
			     			echo "success";
			     			$newdata = array
			     			(
							        'rname'     => $row->rector_name 
							         
							); 
							    $this->session->set_userdata('login',$newdata);
			     			 $this->session->set_flashdata("message","Welcome Sir..!");
			     			 redirect('admin/home');
					        
								 
			     		}else
			     		{ 
			     			$this->session->set_flashdata("message","Kindly enter valid password !");
			     			redirect('admin/login');
			     		}
			     	}
			     }
			    

			   }
			   $this->session->set_flashdata("message","Kindly enter valid username !");
			   redirect('admin/login');

			    
			     			   				
		}
		
		$this->load->view('login');

	} 

}






 
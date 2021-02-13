<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_complain extends MX_Controller {

	 
	public function pending()
	{    
		 $hostel_id = ($this->session->userdata['warden_logged_in']['hostel_id']);
		$this->load->model("mdl_student");
		$data['cdata']=$this->mdl_student->get_complain_data($hostel_id,"P");	
    	$this->load->view('pending_complain',$data);

	}

	public function verify()
	{   
		 
		 $id = $this->input->get("cid");
    	 $this->db->where("id",$id);
         $data['c_status']='A';
    	 $this->db->update('complain_data',$data);
          $this->session->set_flashdata("message","Complain has been successfully Verified !");
         redirect('warden/Manage_complain/pending');
	}

	public function approved()
	{    
		 

		 $hostel_id = ($this->session->userdata['warden_logged_in']['hostel_id']);
		$this->load->model("mdl_student");
		$data['cdata']=$this->mdl_student->get_complain_data($hostel_id,"A");	
    	$this->load->view('approved',$data);
	}
}

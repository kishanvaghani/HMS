<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pending extends MX_Controller {

	 
	public function index()
	{   $hostel_id = ($this->session->userdata['warden_logged_in']['hostel_id']);
		$this->load->model("mdl_student");
		$data['sdata']=$this->mdl_student->get_hostel_student($hostel_id,"P");	
    	$this->load->view('view_pending',$data);

	}


	public function approved()
	{   $hostel_id = ($this->session->userdata['warden_logged_in']['hostel_id']);
		$this->load->model("mdl_student");
		$data['sdata']=$this->mdl_student->get_hostel_student($hostel_id,"A");	
    	$this->load->view('approved_student',$data);

	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_complain extends MX_Controller {


	public function view_complain()
	{
		$data['cdata']=$this->db->get('complain_data');
		$this->load->view('view_complain',$data);
	}
	 
}

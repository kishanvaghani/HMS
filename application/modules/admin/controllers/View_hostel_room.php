<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_hostel_room extends MX_Controller {

    function view_room()
    {

    	$data['hosteldata'] = $this->db->get('hostel_details');
    	
    	$this->load->view('View_hostel_room',$data);
    }
}

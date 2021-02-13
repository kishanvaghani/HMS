<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tsem extends MX_Controller {

    
    function view_transfer()
    {
    		$this->load->view('transfersem');  
    }
	public function index()
	{                               
        $data=$this->db->get('student_data');
        foreach($data->result() as $row)
        {   
        	if ($row->semester <= '8') 
        	{
        	   $this->db->where('semester',$row->semester);
			   $this->db->set('semester', 'semester+1', FALSE);
			   $this->db->update('student_data');	 
        	}
			 
		}
		     $this->session->set_flashdata("message","Student Semester has been successfully Changed !");
	         redirect('admin/Tsem/view_transfer');
	}
        //$test=$this->db->select('student_data.semester');
		//$this->db->set('semester', 'semester+1', FALSE);
		//$this->db->where('semester',$test);
		//$this->db->update('student_data');
		//$this->load->view('transfersem');   
}

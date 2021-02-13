<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_student extends MX_Controller {
 
function index()
    {     
    	$this->db->where("id",$this->input->get("sid"));
    	$data['student']=$this->db->get('student_data');
        $data["sid"]=$this->input->get("sid");
    	$this->load->view('student_profile',$data);
    }

    function verify()
    {    $id = $this->input->get("sid");
    	 $this->db->where("id",$id);
         $data['status']='A';
    	 $this->db->update('student_data',$data);
          $this->session->set_flashdata("message","Student has been successfully Verified !");
         redirect('warden/Pending');
    }
     function reject()
    {    $id = $this->input->get("sid");
         $this->db->where("id",$id);
         $data['status']='P';
         $this->db->update('student_data',$data);
          $this->session->set_flashdata("message","Student has been successfully Rejected !");
         redirect('warden/Pending');
    }
 
    function download($id)
{    $id = $this->input->get("sid"); 
    $this->load->helper('download');
    # search for filename by id
    $this->db->select('rc_book_photo');
    $this->db->where('student_id', $id);
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

function delete_vehicle()
{        
        $id = $this->input->get("sid"); 
        $this->db->where('student_id', $id);
        $this->db->delete('vehicle_name');
        $this->session->set_flashdata('flashSuccess', 'Vehicle Deleted Successfully');  
        redirect('warden/pending');

}


}    
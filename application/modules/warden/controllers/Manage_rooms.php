 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_rooms extends MX_Controller {

	function delete_rooms()
    {
    	$id=$this->input->get('id');
    	$this->db->where('id',$id);
    	$this->db->delete('room_details');
    	 $this->session->set_flashdata("message","Record has been successfully deleted !");
    	redirect('warden/manage_rooms/view_rooms');
    }

    function view_rooms()
    {   
      $hostel_id = ($this->session->userdata['warden_logged_in']['hostel_id']);
    	$this->db->where('hostel_id',$hostel_id);
    	$data['roomdata'] = $this->db->get('room_details');
    	$data["hid"]=$hostel_id;
    	$this->load->view('view_rooms',$data);
    }
	 
	public function index()
	{   $hostel_id = ($this->session->userdata['warden_logged_in']['hostel_id']); 
		$submit=$this->input->post('submit');
	    $hid=$this->input->get('hid');
	    $rid=$this->input->get('rid');
	    if($submit=="submit")
	    {
			$data['hostel_id']=$hostel_id;
			$data['floor_name']=$this->input->post("floor_name");
			$data['room_number']=$this->input->post("room_number");
			$data['total_intake']=$this->input->post("total_intake");
			$data['status']=$this->input->post("status"); 
			$this->form_validation->set_rules('floor_name', 'Floor Name ', 'required');
			$this->form_validation->set_rules('room_number', 'Room Number ', 'required|numeric');
		    $this->form_validation->set_rules('total_intake', 'Capacity of Room ', 'required|numeric');
		    $this->form_validation->set_rules('status', 'Room Status ', 'required');
			 
			  if($this->form_validation->run() == TRUE)
             {

             	 if(!is_numeric($rid))
             	 {  
               	     $this->db->insert("room_details",$data);
               	     $this->session->set_flashdata("message","Record has been successfully inserted !");

               	     redirect('warden/Manage_rooms/view_rooms');

               	  }else if(is_numeric($rid))
               	  {   
               	  		$this->db->where('id', $rid);
               	  		$this->db->update('room_details', $data);
               	  		$this->session->set_flashdata("message","Record has been successfully updated !");
               	     redirect('warden/Manage_rooms/view_rooms');
               	  }

             }
        }
  if(!is_numeric($rid))
  {
    $data['hostel_id']="";
	$data['floor_name']="";
	$data['room_number']="";
	$data['total_intake']="";
	$data['status']=""; 
	$data['id']="";
	$data['operation']="Save Room";
	$data['hid']=$hid; 
  $data['rid']=$rid;	
  }else
  {
  		$this->db->where('id',$rid);
    	$query=$this->db->get('room_details');
    	foreach($query->result() as $row)
        {
        		$data['hostel_id']=$row->hostel_id;
        		$data['floor_name']=$row->floor_name;
        		$data['room_number']=$row->room_number;
        		$data['total_intake']=$row->total_intake;
        		$data['status']=$row->status; 
        		$data['operation']="Update Room";
        		$data['hid']=$hid; 
        		$data['rid']=$rid;
        		  
        }
  }
  $this->load->view('manage_rooms',$data);     	
		 
	}
}





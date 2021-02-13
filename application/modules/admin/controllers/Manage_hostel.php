 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_hostel extends MX_Controller {

	function delete_hostel()
    {
    	$id=$this->input->get('id');
    	$this->db->where('id',$id);
    	$this->db->delete('hostel_details');
    	 $this->session->set_flashdata("message","Record has been successfully deleted !");
    	redirect('admin/manage_hostel/view_hostel');
    }

    function view_hostel()
    {

    	$data['hosteldata'] = $this->db->get('hostel_details');
    	
    	$this->load->view('view_hostel',$data);
    }
	 function update_hostel()
    {   
        $data['id']= $id =$this->uri->segment(4);
    	$this->db->where('id',$id);
    	$query=$this->db->get('hostel_details');
    	foreach($query->result() as $row)
        {
        		$data['hostel_name']=$row->hostel_name;
        		$data['college_id']=$row->college_id;
        		$data['hostel_type']=$row->hostel_type;
        		$data['hostel_floor']=$row->hostel_floor;
        		$data['email']=$row->email;
        		$data['password']=$row->password;
        		$data['operation']="Update Hostel";
        		  
        }
        $this->load->view('manage_hostel',$data);
    }
	public function index()
	{    
				$submit=$this->input->post('submit');
			    $id=$this->input->get('id');
			    if($submit=="submit")
			    {
					$data['hostel_name']=$this->input->post("hostel_name");
					$data['hostel_type']=$this->input->post("hostel_type");
					$data['hostel_floor']=$this->input->post("hostel_floor");
					$data['college_id']=$this->input->post("college_id");
					$data['email']=$this->input->post("email");
					$data['password']=$this->input->post("password");
					 
					$this->form_validation->set_rules('hostel_name', 'Hostel Name ', 'required');
					$this->form_validation->set_rules('college_id', 'College Name ', 'required');
					$this->form_validation->set_rules('hostel_type', 'Hostel Type ', 'required');
				    $this->form_validation->set_rules('hostel_floor', 'Hostel Floor ', 'required|numeric');
				    $this->form_validation->set_rules('email', 'Hostel Email ', 'required|valid_email');
					$this->form_validation->set_rules('password','Password','required|min_length[04]|max_length[20]');
					 
					  if($this->form_validation->run() == TRUE)
		             {

		             	 if(!is_numeric($id))
		             	 {  
		               	     $this->db->insert("hostel_details",$data);
		               	     $this->session->set_flashdata("message","Record has been successfully inserted !");

		               	     redirect('admin/Manage_hostel/view_hostel');
  
		               	  }else if(is_numeric($id))
		               	  {   
		               	  		$this->db->where('id', $id);
		               	  		$this->db->update('hostel_details', $data);
		               	  		$this->session->set_flashdata("message","Record has been successfully updated !");
		               	     redirect('admin/Manage_hostel/view_hostel');
		               	  }

		             }
		        }
		  if(!is_numeric($id))
          {
		    $data['hostel_name']="";
			$data['hostel_type']="";
			$data['hostel_floor']="";
			$data['college_id']="";
			$data['email']="";
			$data['password']="";
			$data['id']="";
			$data['operation']="Save Hostel";
					
          }
          $this->load->view('manage_hostel',$data);     	
		 
	}
}

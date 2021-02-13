 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warden_allocation extends MX_Controller {

	function delete_allocation()
    {
  
    	$id=$this->input->get('wid');
    	  	$data['hostel_id']="0";
    	$this->db->where('id',$id);
    	$this->db->update('hostel_warden',$data);
    	 $this->session->set_flashdata("message","Record has been successfully deleted !");
    	redirect('admin/Warden_allocation/view_allocation');
    }

    function view_allocation()
    {

    	$this->db->select('hostel_details.*,hostel_warden.*');
		$this->db->from('hostel_details');
		$this->db->join('hostel_warden','hostel_warden.hostel_id=hostel_details.id');	
    	$data['warden'] = $this->db->get();	
    	$this->load->view('view_warden_allocation',$data);
    }
	 function update_allocation()
    {   
    	$data["warden_id"]=$this->input->get("wid");
    	$data["hostel_id"]=$this->input->get("hid");
    	$data['operation']="Update Allocation";
       
        $this->load->view('warden_allocation',$data);
    }
	public function index()
	{    
				$submit=$this->input->post('submit');
			    if($submit=="submit")
			    {
					$data['hostel_id']=$this->input->post("hostel_id");				 
					$warden_id=$this->input->post("warden_id");
					 
					$this->form_validation->set_rules('hostel_id', 'Hostel Name ', 'required');
					$this->form_validation->set_rules('warden_id', 'Warden Name ', 'required');
					 
					  if($this->form_validation->run() == TRUE)
		             {		             	 
		               	  		$this->db->where('id', $warden_id);
		               	  		$this->db->update('hostel_warden', $data);
		               	  		$this->session->set_flashdata("message","Warden has been successfully allocated!");
		               	     redirect('admin/warden_allocation/view_allocation');
		             }
		        }
		 
				    $data['hostel_id']="";
					$data['warden_id']=""; 
					$data['operation']="Save Allocation";
					
         
          			$this->load->view('warden_allocation',$data);     	
		 
	}
}

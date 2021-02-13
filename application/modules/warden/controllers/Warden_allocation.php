 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warden_allocation extends MX_Controller {

	function delete_allocation()
    {
    	$id=$this->input->get('id');
    	$this->db->where('id',$id);
    	$this->db->delete('Warden_allocation');
    	 $this->session->set_flashdata("message","Record has been successfully deleted !");
    	redirect('admin/Warden_allocation/view_allocation');
    }

    function view_allocation()
    {

    	$data['warden'] = $this->db->get('warden_allocation');
    	
    	$this->load->view('view_warden_allocation',$data);
    }
	 function update_allocation()
    {   
        $data['id']= $id =$this->uri->segment(4);
    	$this->db->where('id',$id);
    	$query=$this->db->get('warden_allocation');
    	foreach($query->result() as $row)
        {
        		$data['hostel_id']=$row->hostel_id;
        		$data['warden_id']=$row->warden_id;
        		 
        		 
        		$data['operation']="Update Allocation";
        		  
        }
        $this->load->view('warden_allocation',$data);
    }
	public function index()
	{    
				$submit=$this->input->post('submit');
			    $id=$this->input->get('id');
			    if($submit=="submit")
			    {
					$data['hostel_id']=$this->input->post("hostel_id");
					 
					$data['warden_id']=$this->input->post("warden_id");
					 
					$this->form_validation->set_rules('hostel_id', 'Hostel Name ', 'required');
					$this->form_validation->set_rules('warden_id', 'Warden Name ', 'required');
					 
					  if($this->form_validation->run() == TRUE)
		             {

		             	 if(!is_numeric($id))
		             	 {  
		               	     $this->db->insert("warden_allocation",$data);
		               	     $this->session->set_flashdata("message","Record has been successfully inserted !");

		               	     redirect('admin/warden_allocation/view_allocation');
  
		               	  }else if(is_numeric($id))
		               	  {   
		               	  		$this->db->where('id', $id);
		               	  		$this->db->update('warden_allocation', $data);
		               	  		$this->session->set_flashdata("message","Record has been successfully updated !");
		               	     redirect('admin/warden_allocation/view_allocation');
		               	  }

		             }
		        }
		  if(!is_numeric($id))
          {
		    $data['hostel_id']="";
			$data['college_id']=""; 
			$data['id']="";
			$data['operation']="Save Allocation";
					
          }
          $this->load->view('warden_allocation',$data);     	
		 
	}
}

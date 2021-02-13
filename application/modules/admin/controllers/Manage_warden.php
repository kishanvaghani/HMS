 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_warden extends MX_Controller {

	function delete_warden()
    {
    	$id=$this->input->get('id');
    	$this->db->where('id',$id);
    	$this->db->delete('hostel_warden');
    	 $this->session->set_flashdata("message","Record has been successfully deleted !");
    	redirect('admin/manage_warden/view_warden');
    }

    function view_warden()
    {

    	$data['wardendata'] = $this->db->get('hostel_warden');
    	$this->load->view('view_warden',$data);
    }
	 function update_warden()
    {   
        $data['id']= $id =$this->uri->segment(4);
    	$this->db->where('id',$id);
    	$query=$this->db->get('hostel_warden');
    	foreach($query->result() as $row)
        {
        		$data['warden_name']=$row->warden_name;
        		$data['college_id']=$row->college_id;
        		$data['warden_type']=$row->warden_type;
        		$data['warden_mobile']=$row->warden_mobile;
        		$data['warden_email']=$row->warden_email;
        		$data['warden_dept']=$row->warden_dept;
        		$data['operation']="Update Warden";
        		  
        }
        $this->load->view('manage_warden',$data);
    }
	public function index()
	{    
				$submit=$this->input->post('submit');
			    $id=$this->input->get('id');
			    if($submit=="submit")
			    {
					$data['warden_name']=$this->input->post("warden_name");
					$data['college_id']=$this->input->post("college_id");
					$data['warden_type']=$this->input->post("warden_type");
					$data['warden_mobile']=$this->input->post("warden_mobile");
					$data['warden_email']=$this->input->post("warden_email");
					$data['warden_dept']=$this->input->post("warden_dept");
		
					$this->form_validation->set_rules('college_id', 'College Name ', 'required|numeric');
					$this->form_validation->set_rules('warden_name', 'Warden Name ', 'required');
					$this->form_validation->set_rules('warden_type', 'Warden Type ', 'required');
				$this->form_validation->set_rules('warden_mobile', 'Warden Mobile ', 'required|exact_length[10]');
					$this->form_validation->set_rules('warden_dept', 'Warden Department ', 'required');
					$this->form_validation->set_rules('warden_email', 'Warden Email ', 'required|valid_email');
			
					  if($this->form_validation->run() == TRUE)
		             {

		             	 if(!is_numeric($id))
		             	 {  
		               	     $this->db->insert("hostel_warden",$data);
		               	     $this->session->set_flashdata("message","Record has been successfully inserted !");

		               	     redirect('admin/Manage_warden/view_warden');
  
		               	  }else if(is_numeric($id))
		               	  {   
		               	  		$this->db->where('id', $id);
		               	  		$this->db->update('hostel_warden', $data);
		               	  		$this->session->set_flashdata("message","Record has been successfully updated !");
		               	     redirect('admin/Manage_warden/view_warden');
		               	  }

		             }
		        }
		  if(!is_numeric($id))
          {
		    $data['warden_name']="";
		     $data['college_id']="";
			$data['warden_type']="";
			$data['warden_mobile']="";
			$data['warden_email']="";
			$data['warden_dept']="";
			$data['id']="";
			$data['operation']="Save Warden";
					
          }
          $this->load->view('manage_warden',$data);     	
		 
	}
}

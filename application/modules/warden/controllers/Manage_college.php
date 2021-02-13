<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_college extends MX_Controller {

	function delete_college()
    {
    	$id=$this->input->get('id');
    	$this->db->where('id',$id);
    	$this->db->delete('college_details');
    	 $this->session->set_flashdata("message","Record has been successfully deleted !");
    	redirect('admin/manage_college/view_college');
    }

    function view_college()
    {

    	$data['collegedata'] = $this->db->get('college_details');
    	$this->load->view('view_college',$data);
    }
	 function update_college()
    {   
        $data['id']= $id =$this->uri->segment(4);
    	$this->db->where('id',$id);
    	$query=$this->db->get('college_details');
    	foreach($query->result() as $row)
        {
        		$data['college_name']=$row->college_name;
        		$data['college_short_name']=$row->college_short_name;
        		$data['college_address']=$row->college_address;
        		$data['rector_name']=$row->rector_name;
        		$data['rector_email']=$row->rector_email;
        		$data['rector_mobile']=$row->rector_mobile;
        		$data['operation']="Update College";
        		  
        }
        $this->load->view('manage_college',$data);
    }
	public function index()
	{   

				$submit=$this->input->post('submit');
			    $id=$this->input->get('id');
			   
			    if($submit=="submit")
			    {
					$data['college_name']=$this->input->post("college_name");
					$data['college_short_name']=$this->input->post("college_short_name");
					$data['college_address']=$this->input->post("college_address");
					$data['rector_name']=$this->input->post("rector_name");
					$data['rector_email']=$this->input->post("rector_email");
					$data['rector_mobile']=$this->input->post("rector_mobile");
					

					$this->form_validation->set_rules('college_name', 'College Name ', 'required');
					$this->form_validation->set_rules('college_short_name', 'College Short Name ', 'required');
					$this->form_validation->set_rules('college_address', 'College Address ', 'required');
					$this->form_validation->set_rules('rector_name', 'Rector Name ', 'required');
					$this->form_validation->set_rules('rector_email', 'Rector Email ', 'required|valid_email');
					$this->form_validation->set_rules('rector_mobile', 'Rector Mobile ', 'required|exact_length[10]');

					  if($this->form_validation->run() == TRUE)
		             {

		             	 if(!is_numeric($id))
		             	 {  
		               	     $this->db->insert("college_details",$data);
		               	     $this->session->set_flashdata("message","Record has been successfully inserted !");
		               	     redirect('admin/Manage_college/view_college');
  
		               	  }else
		               	  {   
		               	  		$this->db->where('id',$id);
		               	  		$this->db->update('college_details',$data);
		               	  		$this->session->set_flashdata("message","Record has been successfully updated !");
		               	     redirect('admin/Manage_college/view_college');
		               	  }

		             }
		        }
		  if(!is_numeric($id))
          {
		    $data['college_name']="";
			$data['college_short_name']="";
			$data['college_address']="";
			$data['rector_name']="";
			$data['rector_email']="";
			$data['rector_mobile']="";
			$data['id']="";
			$data['operation']="Save College";
					
          }
          $this->load->view('manage_college',$data);     	
		 
	}
}

 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_department extends MX_Controller 
{

     function delete_department()
     {
    	$id=$this->input->get('id');
    	$this->db->where('id',$id);
    	$this->db->delete('add_department');
    	 $this->session->set_flashdata("message","Record has been successfully deleted !");
    	redirect('admin/manage_department');
     }

	public function index()
	{	
		 
       		$submit=$this->input->post('submit');
		    $data['dept_name']=$this->input->get('dept_name');
		    if($submit=="submit")
		    {
		    	$data['dept_name']=$this->input->post("dept_name");
		    	$this->form_validation->set_rules('dept_name', 'Department Name ', 'required');
		    	if($this->form_validation->run() == TRUE)
		    	{
		    		$this->db->insert("add_department",$data);
		            $this->session->set_flashdata("message","Record has been successfully inserted !");
		             redirect('admin/manage_department');
		    	}
		    }
		    $this->load->view('add_department');
	}
	 
	
}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

class Question extends MX_Controller 
{

function __construct()
{
	parent::__construct();
	$this->load->library('form_validation');
	$this->form_validation->CI=& $this;
	$this->load->library('excel');//load PHPExcel library 
}
function view_question()
{
	$id = $this->uri->segment(3);
	$this->db->where('quizz_id',$id);
	$data['question_list'] = $this->db->get('questions');
	$this->load->view('view_question',$data);
}
function delete_question()
{
	$update_id = $this->uri->segment(4);
	$id = $this->uri->segment(3);
	$this->db->where('id',$update_id);
    $this->db->delete('questions');
     $flash_msg="Question Successfully Deleted";
   	 $value= '<div class="alert alert-danger alert-dismissible">'.$flash_msg.'</div>';
   	 $this->session->set_flashdata('Success',$value); 
	 redirect('question/view_question/'.$id);
	
}
function add_new_staff()
{
	$update_id = $this->uri->segment(3);
	$submit= $this->input->post('submit',TRUE);	
      
	if($submit == "Submit")
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('staff_dept','Staff Department Name','required');
		$this->form_validation->set_rules('staff_name','Staff Name','required');
		$this->form_validation->set_rules('staff_email','Staff Email ID','required');
		$this->form_validation->set_rules('staff_mobile','Staff Mobile','required');
		$this->form_validation->set_rules('staff_adhar','Staff Adhar','required');
		$this->form_validation->set_rules('staff_pan_card','Staff Pan Card','required');
		$this->form_validation->set_rules('staff_joining_date','Staff Joining Date','required');
		
		if($this->form_validation->run()==TRUE)
		{
			$data['staff_dept'] = $this->input->post('staff_dept',TRUE);
			$data['staff_name'] = $this->input->post('staff_name',TRUE);
			$data['staff_email']=$this->input->post('staff_email',TRUE);
			$data['staff_mobile']=$this->input->post('staff_mobile',TRUE);
			$data['staff_adhar']=$this->input->post('staff_adhar',TRUE);
			$data['staff_pan_card']=$this->input->post('staff_pan_card',TRUE);
			$data['staff_joining_date']=$this->input->post('staff_joining_date',TRUE);
		     		
				 if(is_numeric($update_id))
   				 {
   				 	//echo $update_id; die();
   				 	$this->db->where('id', $update_id);
					$this->db->update('staff', $data);
   		 			 $flash_msg="Staff Details Successfully Updated";
				   	 $value= '<div class="alert alert-success alert-dismissible">'.$flash_msg.'</div>';
				   	 $this->session->set_flashdata('Success',$value); 
   		 			 redirect('staff/view_staff');		   					
   				 }else
   				 {
   				 	
   				 	 $this->db->insert('staff', $data);
   		 			 $flash_msg="New Staff Successfully Added";
				   	 $value= '<div class="alert alert-success alert-dismissible">'.$flash_msg.'</div>';
				   	 $this->session->set_flashdata('Success',$value); 
   		 			 redirect('staff/import_staff');	
				
   				 }
		}
	}
	if((is_numeric($update_id)) && ($submit!='Submit'))
		{				 				 
	   		$this->db->where('id', $update_id);
			$query=$this->db->get('staff');
			foreach($query->result() as $row)
			{
				$data['staff_dept'] = $row->staff_dept;
				$data['update_id'] = $update_id;
				$data['staff_name'] = $row->staff_name;
				$data['staff_email'] = $row->staff_email;
				$data['staff_mobile'] = $row->staff_mobile;	
				$data['staff_adhar'] = $row->staff_adhar;
				$data['staff_pan_card'] = $row->staff_pan_card;	
				$data['staff_joining_date'] = $row->staff_joining_date;
				$this->load->view('update_staff',$data);
				
		    }
		    if(!isset($data))
		    {
		    	$data="";
		    }
		}else
		{
			$data['staff_dept'] = $this->input->post('staff_dept',TRUE);
			$data['staff_name'] = $this->input->post('staff_name',TRUE);
			$data['staff_email']=$this->input->post('staff_email',TRUE);
			$data['staff_mobile']=$this->input->post('staff_mobile',TRUE);
			$data['staff_adhar']=$this->input->post('staff_adhar',TRUE);
			$data['staff_pan_card']=$this->input->post('staff_pan_card',TRUE);
			$data['staff_joining_date']=$this->input->post('staff_joining_date',TRUE);
			redirect('staff/update_staff');
							
   	}	 

}

function view_staff()
{
	$data['staff_list'] = $this->db->get('staff');
	$this->load->view('view_staff',$data);
}

function delete_staff()
{
	$update_id = $this->uri->segment(3);
	$this->db->where('id',$update_id);
    $this->db->delete('staff');
     $flash_msg="Staff Successfully Deleted";
   	 $value= '<div class="alert alert-danger alert-dismissible">'.$flash_msg.'</div>';
   	 $this->session->set_flashdata('Success',$value); 
	 redirect('staff/view_staff');
	
}


function import_question()
{
	$data['qid'] =$this->uri->segment('3');

	$this->load->view('import_question',$data);
}

public	function import_excel_file()	{  

if (empty($_FILES['userfile']['tmp_name']))
{
	$flash_msg="Kindly select excel file in given format. You can download format from given link."; 
	$value= '<div class="alert alert-danger alert-dismissible">'.$flash_msg.'</div>';
	$this->session->set_flashdata('Success',$value); 
	redirect(base_url() . "question/import_question");
}
$filePath = realpath($_FILES["userfile"]["tmp_name"]);
$configUpload['allowed_types'] = 'xls|xlsx|csv';
$configUpload['max_size'] = '5000';
$this->load->library('upload', $configUpload);
$this->upload->do_upload('userfile');	
$upload_data = $this->upload->data(); 

$file_name = $upload_data['file_name']; //uploded file name
$extension=$upload_data['file_ext'];    // uploded file extension		
$objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
$objReader->setReadDataOnly(true); 		  
$objPHPExcel=$objReader->load($filePath);		 
$totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
$objWorksheet=$objPHPExcel->setActiveSheetIndex(0);    

$quizz_id=$this->input->get('qid');
$uploaded=0;
for($i=2;$i<=$totalrows;$i++)
{
  
  $question= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
  $option_A= $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();			
  $option_B= $objWorksheet->getCellByColumnAndRow(2,$i)->getValue(); 
  $option_C= $objWorksheet->getCellByColumnAndRow(3,$i)->getValue();			
  $option_D= $objWorksheet->getCellByColumnAndRow(4,$i)->getValue(); //Excel Column 1
  $right_option=$objWorksheet->getCellByColumnAndRow(5,$i)->getValue(); //Excel Column 3
  $level= $objWorksheet->getCellByColumnAndRow(6,$i)->getValue(); //Excel Column 2
  $verifier= $objWorksheet->getCellByColumnAndRow(7,$i)->getValue(); //Excel Column 2 
  $data_user=array('quizz_id'=>$quizz_id,'question'=>$question,'option_A'=>$option_A,'option_B'=>$option_B,'option_C'=>$option_C, 'option_D'=>$option_D ,'right_option'=>$right_option,'level'=>$level,'verifier'=>$verifier);

  if($quizz_id === '' || $quizz_id === NULL || $question === '' || $question === NULL || $option_A === '' || $option_A === NULL || $option_B  === '' || $option_B == NULL || $option_C == '' || $option_C == NULL || $option_D == '' || $option_D === NULL || $right_option == '' || $right_option === NULL || $level == '' || $level === NULL)
    {
  	 				  
	  }else
	  {
	 	 
    $uploaded=$uploaded+1;
  	$this->db->insert('questions', $data_user);
	  }
}
    $flash_msg="Total ".$uploaded." Questions Imported Successfully."; 
	 	$value= '<div class="alert alert-success alert-dismissible">'.$flash_msg.'</div>';
	 	$this->session->set_flashdata('Success',$value); 		 
 	redirect(base_url() . "question/import_question/".$quizz_id);     
}	



}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_fees extends MX_Controller {
     function __construct()
   {
	parent::__construct();
	$this->load->library('form_validation');
 
	$this->load->library('excel');//load PHPExcel library 
   }
     
    function view_setting()
    {
    		$this->load->view('setting.php');  
    }
    function setting()
    {    
         $id= $this->input->get("tid");
    	 $this->db->where("id",$id);
         $data['status']='1';
    	 $this->db->update('transaction_status',$data);
          $this->session->set_flashdata("message","Student Fees Data Verifiation is Now Enabled !");
         redirect('admin/Manage_fees/view_setting');
    }
     function reject()
    {    $id = $this->input->get("tid");
         $this->db->where("id",$id);
         $data['status']='0';
         $this->db->update('transaction_status',$data);
          $this->session->set_flashdata("message","Student Fees data verification has been successfully Disabled !");
         redirect('admin/Manage_fees/view_setting');
    }
 
	public function upload_fees()
	{
		$this->load->view('upload_fees');
	}
	public function view_fees()
	{  
	    $data['feesdata']=$this->db->get('student_fees_data');
		$this->load->view('view_fees',$data);
	}
	public	function import_excel_file()	{  

if (empty($_FILES['userfile']['tmp_name']))
{
	$flash_msg="Kindly select excel file in given format. You can download format from given link."; 
	$value= '<div class="alert alert-danger alert-dismissible">'.$flash_msg.'</div>';
	$this->session->set_flashdata('Success',$value); 
	redirect(base_url() . "index.php/admin/manage_fees/upload_fees");
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

$uploaded=0;
for($i=2;$i<=$totalrows;$i++)
{
  
  $enroll= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
  $sem= $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();			
  $tid= $objWorksheet->getCellByColumnAndRow(2,$i)->getValue(); 
  $dep= $objWorksheet->getCellByColumnAndRow(3,$i)->getValue();			
  $fees= $objWorksheet->getCellByColumnAndRow(4,$i)->getValue(); // 

  $data_user=array('student_enroll'=>$enroll,'student_sem'=>$sem,'student_ref_number'=>$tid,'student_deposite'=>$dep,'student_fees'=>$fees);

  if($enroll === '' || $enroll === NULL || $sem === '' || $sem === NULL || $tid === '' || $tid === NULL || $dep  === '' || $dep === NULL || $fees === '' || $fees === NULL)
    {
  	 				  
	  }else
	  {
	 	 
    $uploaded=$uploaded+1;
  	$this->db->insert('student_fees_data', $data_user);
	  }
}
    $flash_msg="Total ".$uploaded." Student Fees Imported Successfully."; 
	 	$value= '<div class="alert alert-success alert-dismissible">'.$flash_msg.'</div>';
	 	$this->session->set_flashdata('Success',$value); 		 
 	redirect(base_url() . "index.php/admin/manage_fees/upload_fees");    
}	



}

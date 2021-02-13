
<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('home/header');?>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
<?php $this->load->view('home/header_menu');?>
  
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
     

      <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-9">
           <?= validation_errors("<p style='color:red;'>","</p>") ?>
          <?php echo $this->session->flashdata('Success');?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Import Questions</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->         
              <div class="box-body">
                
                 <a class="btn btn-primary" href='<?php echo site_url('downloads/import_staff_format.xlsx')?>'>DOWNLOAD EXCEL FILE FORMAT</a>           
                  <?php echo form_open_multipart('question/import_excel_file?qid='.$qid);?>                      
                  <h3 class="box-title">Select Excel File as per Format</h3> <br/>  

                  <input type="file" name="userfile" /> <br/> 

                  <div class="box-footer">
                      <button type="submit" class="btn btn-primary" value="upload" name="upload">IMPORT QUESTIONS</button>
                        
                    </div>                   
                  </form>                    
              </div>
                            
          </div>
          <!-- /.box -->
       
        </div>
       
      </div>
      <!-- /.row -->
    </section>
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  
 <?php $this->load->view('home/footer');?>
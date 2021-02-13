
  <?php $this->load->view('header');?>
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
              <h3 class="box-title"><a><strong>Import Fees Data</strong></a></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->         
              <div class="box-body">         
                  <?php echo form_open_multipart('admin/manage_fees/import_excel_file');?>                      
                  <h3 class="box-title">Select Excel File as per Format</h3> <br/>  

                  <input type="file" name="userfile" /> <br/> 

                  <div class="box-footer">
                      <button type="submit" class="btn btn-primary" value="upload" name="upload">IMPORT FEES DATA</button>
                        
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
  
 <?php $this->load->view('footer.php');?>
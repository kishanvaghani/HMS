  <?php $this->load->view('header.php')?>

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <?php if($this->session->flashdata('message')){ ?>

            <div class="callout callout-success">
                <h4> <?php echo $this->session->flashdata('message'); ?></h4>               
              </div>
         <?php } ?>
         <?php echo validation_errors(); ?>

         
          <div class="box box-primary">
           
            <div class="box-header with-border">
              <h3 class="box-title"><a><strong>View Fees</strong></a></h3>
            </div>
             
              <div class="box-body table-responsive">
               
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                <tr>
                  <th style="width: 10px">#</th>
                   <th>Student Enrollment</th>
                  <th>Student Semester</th>
                  <th>Referance Number</th>
                  <th>Hostel Deposite</th>
                  <th>Hostel Fees</th>
                </tr>
              </thead>
              
               <tbody>
                <?php
                $k=1;

                foreach($feesdata->result() as $row)
                {
               ?>
                <tr>
                   <?php
                //$this->db->where("id",$row->college_id);
                //$my=$this->db->get("college_details");
                //$myc=$my->row();
                 ?>
                <td><?=$k; ?></td>
                 <td><?= $row->student_enroll ?></td>
                <td><?= $row->student_sem ?></td>
                 <td><?= $row->student_ref_number ?></td>
                  <td><?= $row->student_deposite ?></td>
                    <td><?= $row->student_fees ?></td>
                  </tr>
                <?php $k=$k+1; } ?>
               </tbody>
               
              </table>
                
                 
              </div>  
             

          </div>
          
 
          
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('footer.php')?>
   
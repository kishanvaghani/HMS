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
         <?php echo validation_errors("<div class='callout callout-danger'>","</div>"); ?>

         <div class="box-body clearfix">
           
             <a href="<?= base_url()?>index.php/admin/warden_allocation" type="button" class="btn btn-primary btn-block btn-flat"><i class="fa fa-plus"></i> Add New Allocation</a>
      
              
         </div>
          
         
          <!-- general form elements -->
          <div class="box box-primary">
           
            <div class="box-header with-border">
              <h3 class="box-title"><a><strong>View Allocation</strong></a></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->         
              <div class="box-body table-responsive">
               
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                <tr>
                  <th style="width: 10px">#</th>                  
                  <th>Hostel Name</th> 
                  <th>Hostel Type</th>                  
                  <th>Warden Name</th>
                  <th>Warden Type</th>
                  <th>Action</th>
                </tr>
              </thead>
               <tbody>
                <?php
                $k=1;
                foreach($warden->result() as $row)
                {
               ?>
                <tr>
                <td><?=$k; ?></td>
                 <td><?= $row->hostel_name ?></td>
                  <td><?= $row->hostel_type ?></td>
                   <td><?= $row->warden_name ?></td>
                    <td><?= $row->warden_type ?></td>
             
                      <td>
                         <a class="btn btn-primary btn-xs" href="<?= base_url()?>index.php/admin/warden_allocation/update_allocation?hid=<?= $row->hostel_id ?>&wid=<?= $row->id ?>">Update</a>
                        <a class="btn btn-danger btn-xs" href="<?= base_url()?>index.php/admin/warden_allocation/delete_allocation?wid=<?= $row->id ?>">Cancel Allocation</a>

                      </td>
                  </tr>
                <?php $k=$k+1; } ?>
               </tbody>
               
              </table>
                
                 
              </div>
              <!-- /.box-body -->             
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
   
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

         <div class="box-body clearfix">
 
             <a href="<?= base_url()?>index.php/admin/manage_warden" type="button" class="btn btn-primary btn-block btn-flat"><i class="fa fa-plus"></i> Add New Warden</a>
 
              
         </div>
          
         
          <!-- general form elements -->
          <div class="box box-primary">
           
            <div class="box-header with-border">
              <h3 class="box-title"><a><strong>View Warden</strong></a></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->         
              <div class="box-body table-responsive">
               
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Warden Name</th>
                  <th>Warden Type</th>
                  <th>Warden Mobile</th>
                  <th>Warden Email</th>
                  <th>Warden Department</th>
                  <th>Action</th>
                </tr>
              </thead>
               <tbody>
                <?php
                $k=1;
                foreach($wardendata->result() as $row)
                {
               ?>
                <tr>
                <td><?=$k; ?></td>
                <td><?php echo $row->warden_name ?></td>
                 <td><?= $row->warden_type ?></td>
                  <td><?= $row->warden_mobile ?></td>
                   <td><?= $row->warden_email ?></td>
                    <td><?= $row->warden_dept ?></td>
                      <td>
                         <a class="btn btn-primary btn-xs" href="<?= base_url()?>index.php/admin/manage_warden/update_warden/<?= $row->id ?>">Update</a>
                        <a class="btn btn-danger btn-xs" href="<?= base_url()?>index.php/admin/manage_warden/delete_warden?id=<?= $row->id ?>">Delete</a>

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
   
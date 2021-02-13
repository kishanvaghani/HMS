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
           
             <a href="<?= base_url()?>index.php/warden/manage_hostel" type="button" class="btn btn-primary btn-block btn-flat"><i class="fa fa-plus"></i> Add New Hostel</a> 
              
         </div>
          
         
          <!-- general form elements -->
          <div class="box box-primary">
           
            <div class="box-header with-border">
              <h3 class="box-title"><a><strong>View Hostel</strong></a></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->         
              <div class="box-body">
               
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                <tr>
                  <th style="width: 10px">#</th>
                   <th>College Name</th>
                  <th>Hostel Name</th>
                  <th>Hostel Type</th>
                  <th>Hostel Floor</th>
                  <th>Action</th>
                </tr>
              </thead>
               <tbody>
                <?php
                $k=1;
                foreach($hosteldata->result() as $row)
                {
               ?>
                <tr>
                <td><?=$k; ?></td>
                 <td><?= $row->college_id ?></td>
                <td><?php echo $row->hostel_name ?></td>
                 <td><?= $row->hostel_type ?></td>
                  <td><?= $row->hostel_floor ?></td>
                   
                   
                      <td>
                         <a class="btn btn-primary btn-xs" href="<?= base_url()?>index.php/warden/manage_hostel/update_hostel/<?= $row->id ?>">Update</a>
                        <a class="btn btn-danger btn-xs" href="<?= base_url()?>index.php/warden/manage_hostel/delete_hostel?id=<?= $row->id ?>">Delete</a>
                         <a class="btn btn-primary btn-xs" href="<?= base_url()?>index.php/warden/Manage_rooms/view_rooms/<?= $row->id ?>"> Manage Rooms </a>

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
   
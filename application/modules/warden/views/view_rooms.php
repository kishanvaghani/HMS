   <?php $this->load->view('header.php')?>

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-xs-12">
          <?php if($this->session->flashdata('message')){ ?>

            <div class="callout callout-success">
                <h4> <?php echo $this->session->flashdata('message'); ?></h4>               
              </div>
         <?php } ?>
         <?php echo validation_errors("<div class='callout callout-danger'>","</div>"); ?>
         <div class="box-body clearfix">
           <a href="<?= base_url()?>index.php/warden/manage_rooms?hid=<?= $hid ?>" type="button" class="btn btn-primary btn-block btn-flat"><i class="fa fa-plus"></i> Add New Room</a> 
              
         </div>
          
         
          <!-- general form elements -->
          <div class="box box-primary">
           
            <div class="box-header with-border">
              <h3 class="box-title"><a><strong>View Rooms</strong></a></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->         
              <div class="box-body table-responsive">
               
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                <tr>
                  <th style="width: 10px">#</th>
                   <th>Hostel Name</th>
                  <th>Floor Name</th>
                  <th>Room No</th>
                  <th>Capacity of Room</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
               <tbody>
                <?php
                $k=1;
                foreach($roomdata->result() as $row)
                {
               ?>
               <?php 
               $this->db->where('id',$row->hostel_id);
               $my=$this->db->get('hostel_details');
               $myh=$my->row();
               ?>
                <tr>
                <td><?=$k; ?></td>
                <td><?= $myh->hostel_name ?></td>
                <td><?= $row->floor_name ?></td>
                <td><?= $row->room_number ?></td>
                <td><?= $row->total_intake ?></td>
                <td><?= $row->status ?></td>
                      <td>
                            <a class="btn btn-primary btn-xs" href="<?= base_url()?>index.php/warden/manage_rooms?hid=<?= $hid ?>&rid=<?= $row->id ?>">Update</a>
                            <a class="btn btn-danger btn-xs" href="<?= base_url()?>index.php/warden/manage_rooms/delete_rooms?id=<?= $row->id ?>">Delete</a>
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
   
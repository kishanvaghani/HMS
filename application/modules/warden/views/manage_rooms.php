 <?php $this->load->view('header.php')?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-9">
          <?php if($this->session->flashdata('message')){ ?>

            <div class="callout callout-success">
                <h4> <?php echo $this->session->flashdata('message'); ?></h4>               
            </div>
                   <?php } ?>
               <?php echo validation_errors("<div class='callout callout-danger'>","</div>"); ?>

        

          <!-- general form elements -->
          <div class="box box-primary">

            
            <div class="box-header with-border">
              <h3 class="box-title"><a><strong>Manage Rooms</strong></a></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url()?>index.php/warden/Manage_rooms?rid=<?= $rid ?>&hid=<?= $hid ?>" method="post">
              <div class="box-body">
                 
              <div class="form-group">
                <label>Hostel Floor</label>
                <select class="form-control select2" style="width: 100%;" name="floor_name" value="<?= $floor_name?>">
                  <option value disabled selected>Select Hostel Floor</option>
                  <option value="0" <?php if($floor_name=="0") echo "selected"; ?>>0 (Ground Floor)</option>
                  <option value="1" <?php if($floor_name=="1") echo "selected"; ?>>1 (First Floor)</option>
                  <option value="2" <?php if($floor_name=="2") echo "selected"; ?>>2 (Second Floor)</option>
                  <option value="3" <?php if($floor_name=="3") echo "selected"; ?>>3 (Third Floor)</option>
                  <option value="4" <?php if($floor_name=="4") echo "selected"; ?>>4 (Fourth Floor)</option>
                  <option value="5" <?php if($floor_name=="5") echo "selected"; ?>>5 (Fifth Floor)</option>
                 
                </select>
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Room No.</label>
                  <input type="text" class="form-control"  name="room_number"  value="<?= $room_number ?>" placeholder="Enter Room No">
              </div>

               <div class="form-group">
                  <label for="exampleInputEmail1">Capacity of Room</label>
                  <input type="text" class="form-control"  name="total_intake"  value="<?= $total_intake ?>" placeholder="Enter Capacity of Room">
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Room Status</label>
                    <select class="form-control select2" style="width: 100%;" name="status" value="<?= $status?>">
                  <option value disabled selected>Select Room Status</option>
                  <option <?php if($status=="Active") echo "selected"; ?>>Active</option>
                  <option <?php if($floor_name=="Inactive") echo "selected"; ?>>Inactive</option>
                </select>
              </div>
              
               </div>
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary" value="submit"><?= $operation ?></button>
              </div>
             
            </form>
          </div>
 
        </div>
 
      </div>
   
    </section>
   
  </div>
 <?php $this->load->view('footer.php') ?>   
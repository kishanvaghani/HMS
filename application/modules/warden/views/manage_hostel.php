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

          <!--<div class="callout callout-info">
                <h4>Kindly Enter Faculty/Staff Data as per seniority only!</h4>
                <h4>If respecive designation is not found for any staff/faculty, kindly enter new designation in designation menu link!</h4>

               
              </div> -->



          <!-- general form elements -->
          <div class="box box-primary">

            
            <div class="box-header with-border">
              <h3 class="box-title"><a><strong>Manage Hostel</strong></a></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url()?>index.php/warden/Manage_hostel?id=<?= $id ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                <label>Select College</label>
                <?php
                $college=$this->db->get("college_details");
                ?>
                <select class="form-control select2" style="width: 100%;" name="college_id">
                  <option>Select College</option>
                  <?php
                  foreach ($college->result() as $row) 
                  {
                    
                  ?>
                  <option value="<?= $row->id ?>" <?php if($college_id==$row->id) echo "selected";  ?>><?= $row->college_name ?></option>
                 <?php } ?>
                </select>
              </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Hostel Name</label>
                  <input type="text" class="form-control"  name="hostel_name"  value="<?= $hostel_name ?>" placeholder="Enter Hostel Name">
                </div>
              <div class="form-group">
                <label>Hostel Type</label>
                <select class="form-control select2" style="width: 100%;" name="hostel_type" value="<?= $hostel_type?>">
                  <option>Select Hostel Type</option>
                  <option <?php if($hostel_type=="Boys") echo "selected"; ?>>Boys</option>
                  <option <?php if($hostel_type=="Girls") echo "selected"; ?>>Girls</option>
                 
                </select>
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Total Floor</label>
                  <input type="text" class="form-control"  name="hostel_floor"  value="<?= $hostel_floor ?>" placeholder="Enter Total Floor">
              </div>
              
              </div>
              <!--  /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary" value="submit"><?= $operation ?></button>
              </div>
            </form>
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
   
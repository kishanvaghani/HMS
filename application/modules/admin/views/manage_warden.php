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
              <h3 class="box-title"><a><strong>Manage Warden</strong></a></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url()?>index.php/admin/Manage_warden?id=<?= $id ?>" method="post">
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
                  <label for="exampleInputEmail1">Warden Name</label>
                  <input type="text" class="form-control"  name="warden_name"  value="<?= $warden_name ?>" placeholder="Enter Warden Name">
                </div>
              <div class="form-group">
                <label>Warden Type</label>
                <select class="form-control select2" style="width: 100%;" name="warden_type" value="<?= $warden_type?>">
                  <option>Select Warden</option>
                  <option <?php if($warden_type=="Warden") echo "selected"; ?>>Warden</option>
                  <option <?php if($warden_type=="Assistant Warden") echo "selected"; ?>>Assistant Warden</option>
                </select>
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Warden Mobile</label>
                  <input type="text" class="form-control"  name="warden_mobile"  value="<?= $warden_mobile ?>" placeholder="Enter Warden Mobile">
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Warden Email</label>
                  <input type="email" class="form-control" value="<?= $warden_email ?>"  name="warden_email" placeholder="Enter Warden Email">
              </div>
               
              <div class="form-group">
                <label>Warden Department</label>
                <select class="form-control select2" style="width: 100%;" name="warden_dept" value="<?= $warden_dept ?>">
                  <option>Select Department</option>
                  <?php 
                     $department=$this->db->get('add_department');
                     foreach ($department->result() as $column) {
                    ?>
                      <option <?php if($warden_dept==$column->dept_name) echo "selected"; ?>><?= $column->dept_name ?></option>
                    <?php
                     }
                  ?>  
                </select>
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
   
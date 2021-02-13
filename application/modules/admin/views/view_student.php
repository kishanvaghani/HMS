<?php $this->load->view('header.php')?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
           <?php if($this->session->flashdata('message')){ ?>

            <div class="callout callout-success">
                <h4> <?php echo $this->session->flashdata('message'); ?></h4>               
              </div>
         <?php } ?>
         <?php echo validation_errors("<div class='callout callout-danger'>","</div>"); ?>
     
          <div class="box box-primary">
           
            <div class="box-header with-border">
              <h3 class="box-title"><a><strong>Student List</strong></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th style="width: 10px">#</th>
                   <th>Student Name</th>
                   <th>Gender</th>
                   <th>Department</th>
                   <th>Semester</th>
                   <th>Enrollment No</th>
                   <th>Mobile Number</th>   
                   <th>Parent Mobile</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                    <?php
                $k=1;
                foreach($studentdata->result() as $row)
                {
               ?>
                <tr>
                <td><?=$k; ?></td>
                <td><?= $row->last_name.' '.$row->first_name.' '.$row->middle_name ?></td>
                <td><?= $row->gender ?></td>
                <td><?= $row->department ?></td>
                <td><?= $row->semester ?></td>
                <td><?= $row->enrollment ?></td>
                <td><?= $row->mobile ?></td>
                <td><?= $row->parent_mobile ?></td>
               
                 <td> <a type="button" class="btn btn-primary btn-primary" href="<?= base_url()?>index.php/admin/manage_student/view_stu_profile?sid=<?= $row->id ?>"> View Student </a></td>
                   
                  </tr>
                <?php $k=$k+1; } ?>
               
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('footer.php')?>
   
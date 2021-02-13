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
           
             <a href="<?= base_url()?>index.php/admin/manage_college" type="button" class="btn btn-primary btn-block btn-flat"><i class="fa fa-plus"></i> Add New College</a>
          
         </div>
          
         
          <!-- general form elements -->
          <div class="box box-primary">
           
            <div class="box-header with-border">
              <h3 class="box-title"><a><strong>View College</strong></a></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->         
              <div class="box-body">
               
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>College Name</th>
                  <th>College Short Name</th>
                  <th>College Address</th>
                  <th>Rector Name</th>
                  <th>Rector Email</th>
                  <th>Rector Mobile</th>
                  <th>Action</th>
                </tr>
              </thead>
               <tbody>
                <?php
                $k=1;
                foreach($collegedata->result() as $row)
                {
               ?>

                <tr>
                <td><?=$k; ?></td>
                <td><?php echo $row->college_name ?></td>
                 <td><?= $row->college_short_name ?></td>
                  <td><?= $row->college_address ?></td>
                   <td><?= $row->rector_name ?></td>
                    <td><?= $row->rector_email ?></td>
                     <td><?= $row->rector_mobile ?></td>
                      <td>
                         <a class="btn btn-primary btn-xs" href="<?= base_url()?>index.php/admin/manage_college/update_college/<?= $row->id ?>">Update</a>
                        <a class="btn btn-danger btn-xs" href="<?= base_url()?>index.php/admin/manage_college/delete_college?id=<?= $row->id ?>">Delete</a>

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
   
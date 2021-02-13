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
 
          <!-- general form elements -->
          <div class="box box-primary">
           
            <div class="box-header with-border">
              <h3 class="box-title"><a><strong>Pending Complain</strong></a></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->         
              <div class="box-body table-responsive">
               
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                <tr>
                  <th style="width: 10px">#</th>
                   <th>Complain Type</th>
                   <th>Complain Date </th>
                    <th>Complain Description </th>
                   <th>Action</th>
                </tr>
              </thead>
               <tbody>
                <?php
                $k=1;
                foreach($cdata->result() as $row)
                {
               ?>
                <tr>
                <td><?=$k; ?></td>
                 <td><?= $row->c_type ?></td>
                  <td><?= $row->c_date1 ?></td>
                  <td><?= $row->c_name ?></td>
                      <td>
                        <a type="button" class="btn btn-primary btn-primary" href="<?= base_url()?>index.php/warden/manage_complain/verify?cid=<?= $row->id ?>"> Verify Complain </a>
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
   
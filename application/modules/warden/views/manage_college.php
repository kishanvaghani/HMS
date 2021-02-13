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
           
          <div class="box box-primary">
            
            <div class="box-header with-border">
              <h3 class="box-title"><a><strong>Manage College</strong></a></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url()?>index.php/admin/Manage_college?id=<?= $id ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">College Name</label>
                  <input type="text" class="form-control"  name="college_name"  value="<?= $college_name ?>"   placeholder="Enter College Name">
                </div>  
                <div class="form-group">
                  <label for="exampleInputEmail1">College Short Name</label>
                  <input type="text" class="form-control"  name="college_short_name" value="<?= $college_short_name ?>"  placeholder="Enter College Short Name">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">College Address</label>
                  <input type="text" class="form-control"  name="college_address" value="<?= $college_address ?>"  placeholder="Enter College Address">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Rector Name</label>
                  <input type="text" class="form-control"  name="rector_name" value="<?= $rector_name ?>" placeholder="Enter Rector Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Rector Email</label>
                  <input type="email" class="form-control"  name="rector_email" value="<?= $rector_email ?>" placeholder="Enter Rector Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Rector Mobile</label>
                  <input type="text" class="form-control"  name="rector_mobile" value="<?= $rector_mobile ?>" placeholder="Enter Rector Mobile">
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
   
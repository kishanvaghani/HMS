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
              <h3 class="box-title"><a><strong>Add Department</strong></a></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url()?>index.php/admin/Manage_department?id=<?= "id"?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Department Name</label>
                  <input type="text" class="form-control"  name="dept_name"  placeholder="Enter Department Name">
                </div>
                 
              </div>
              <!--  /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary" value="submit">Submit</button>
              </div>
            </form>
          </div>

          
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
      <div class="row">
        <!-- left column -->
        <div class="col-md-9">
          
  
          <div class="box box-primary">
           
            <div class="box-header with-border">
              <h3 class="box-title"><a><strong>View Department</strong></a></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->         
              <div class="box-body">
               
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Department Name</th>
                   
                  <th>Action</th>
                </tr>
              </thead>
               <tbody>
                <?php
                $kk=1;
                $department=$this->db->get('add_department');
                foreach($department->result() as $row)
                {
               ?>

                <tr>
                <td><?= $kk; ?></td>
                <td><?= $row->dept_name ?></td>
                  
                      <td>
                          <a class="btn btn-danger btn-xs" href="<?= base_url()?>index.php/admin/Manage_department/delete_department?id=<?= $row->id ?>">Delete</a>

                      </td>
                  </tr>
                <?php $kk=$kk+1; } ?>
               </tbody>
               
              </table>
                
                 
              </div>
              <!-- /.box-body -->             
          </div>
          
 
          
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
<?php $this->load->view('footer.php')?>
   
<?php $this->load->view('header') ?> 
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="callout callout-info">
        <h4>Reminder!</h4>
        Instructions for how to use modals are available on the
        <a href="http://getbootstrap.com/javascript/#modals">Bootstrap documentation</a>
      </div>

      <div class="row">
        <div class="col-xs-12">
           <?php if($this->session->flashdata('message')){ ?>

            <div class="callout callout-success">
                <h4> <?php echo $this->session->flashdata('message'); ?></h4>               
            </div>
         <?php } ?>
         <?php echo validation_errors(); ?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Get Transaction Details From Student and Verify With Fees Data</h3>
            </div>
       <div class="box-body">
                      <form method="post" action="<?= base_url()?>index.php/admin/Manage_fees/setting">
                      <?php
                      $my=$this->db->get("transaction_status");
                      $myh=$my->row();
                      ?>
                      <?php
              if($myh->status=="0")
              {
              ?>
              <a href="<?= base_url() ?>index.php/admin/Manage_fees/setting?tid=<?= $myh->id?>" class="btn btn-primary"><b>Enable Verification</b></a> 
            <?php }else{
              ?>
              <a href="<?= base_url() ?>index.php/admin/Manage_fees/reject?tid=<?= $myh->id?>" class="btn btn-danger"><b>Disable Verification</b></a>
             <?php } ?>      
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  
<?php $this->load->view('footer') ?>  
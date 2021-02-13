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
              <h3 class="box-title">Semester Transfer</h3>
            </div>
       <div class="box-body">
                      <form method="post" action="<?= base_url()?>index.php/admin/Tsem">
                    
              <a href="<?= base_url() ?>index.php/admin/Tsem" class="btn btn-primary"><b>Transfer Semester</b></a>     
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  
<?php $this->load->view('footer') ?>  
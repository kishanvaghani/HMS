<?php $this->load->view('store_student/sheader.php'); ?>
<div class="osahan-breadcrumb">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#"><i class="icofont icofont-ui-home"></i> Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Warden Login</a></li>
                    
                  </ol>
               </div>
            </div>
         </div>
 </div>
<section class="login_page">
 <div class="container">
    <div class="row">
       <div class="col-lg-6 col-md-6 mx-auto">
          <div class="widget">
             <div class="login-modal-right">
                <!-- Tab panes -->
                <div class="tab-content">
                   <div class="tab-pane active" id="login" role="tabpanel">
                      <h5 class="heading-design-h5">Login to your hostel account</h5>
                      
                 <?php echo form_open('store_student/warden_login'); ?>
                 <?= validation_errors("<p style='color:red;'>","</p>") ?>
                      
                <?php if($this->session->flashdata('message'))
                    {
                    ?>
                    <div class="alert alert-danger" role="alert"> <b><?=$this->session->flashdata('message')?></b> </div>
                    <?php } ?>
                      <fieldset class="form-group">
                         <label for="formGroupExampleInput">Email ID</label><span class="required">*</span>
                         <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="email">
                      </fieldset>
                      <fieldset class="form-group">
                         <label for="formGroupExampleInput2">Enter Password</label><span class="required">*</span>
                         <input type="password" name="password" class="form-control" id="formGroupExampleInput2" placeholder="********">
                      </fieldset>
                      
                      <fieldset class="form-group">
                         <button type="submit" class="btn btn-lg btn-theme-round btn-block" value="logindata" name="login">Enter to your account</button>
                      </fieldset>
                      <?php echo form_close(); ?>

                        <strong><a href="<?= base_url() ?>index.php/store_student/forget_password">FORGET PASSWORD?</a></strong><br/><br/> 
                   </div>
                </div>
                <div class="clearfix"></div>
                <div class="text-center login-footer-tab">
                    
                </div>
                <div class="clearfix"></div>
             </div>
          </div>
          <br><br>
          
       </div>
    </div>
 </div>
</section>
<?php $this->load->view('store_student/sfooter.php'); ?>
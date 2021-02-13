
<?php $this->load->view('sheader.php'); ?>
 <div class="osahan-breadcrumb">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#"><i class="icofont icofont-ui-home"></i> Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Forget Password</a></li>
                    
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
                              <h5 class="heading-design-h5">Forget Password?</h5>
                            <?php if($this->session->flashdata('flashSuccess'))
                            {
                            ?>
                            <div class="alert alert-success" role="alert"> <?=$this->session->flashdata('flashSuccess')?> </div>
                            <?php } ?>
                         
                         
                        
                          <?php echo form_open('store_student/forget_password'); ?>
                              <fieldset class="form-group">
                                 <label for="formGroupExampleInput">Enter Registered Email ID</label><span class="required">*</span>
                                 <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="email_id">
                              </fieldset>
                              
                              <fieldset class="form-group">
                                 <button type="submit" class="btn btn-lg btn-theme-round btn-block" value="Getpassword" name="submit">Get Password</button>
                              </fieldset>
                              
                             
                           </div>
                        </div>
                        <?php echo form_close(); ?>
                       
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <br><br>
                  
               </div>
            </div>
         </div>
      </section>
     <?php $this->load->view('sfooter.php'); ?>
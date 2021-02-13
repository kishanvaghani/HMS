
<?php $this->load->view('student/sheader.php'); ?>
     



    <div class="osahan-breadcrumb">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#"><i class="icofont icofont-ui-home"></i> Home</a></li>
                     <li class="breadcrumb-item"><a href="#">New College Registration</a></li>
                    
                  </ol>
               </div>
            </div>
         </div>
      </div>

 

   <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-6 mx-auto">
                  <div class="widget">
                     <div class="login-modal-right">
                        <!-- Tab panes -->
                        <div class="tab-content">
                           <div class="tab-pane active" id="register" role="tabpanel">
                              <h5 class="heading-design-h5">Register Now!</h5>
                             
                                 <?php echo form_open('store_student/college_register'); ?>
                                 <?= validation_errors("<p style='color:red;'>","</p>") ?>
                                 

                              <fieldset class="form-group">
                                 <label for="formGroupExampleInput" >Enter College Name</label><span class="required">*</span>
                                 <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $college_name ?>" placeholder="" name="college_name">
                              </fieldset>
                              <fieldset class="form-group">
                                 <label for="formGroupExampleInput">Enter College Code</label><span class="required">*</span>
                                 <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $college_code ?>" placeholder="" name="college_code">
                              </fieldset>
                              <fieldset class="form-group">
                                 <label for="formGroupExampleInput">Enter Principal Name</label><span class="required">*</span>
                                 <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $principal_name ?>" placeholder="" name="principal_name">
                              </fieldset>
                              <fieldset class="form-group">
                                 <label for="formGroupExampleInput">Enter Mobile Number</label><span class="required">*</span>
                                 <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $principal_mobile ?>" placeholder="" name="principal_mobile">
                              </fieldset>
                              <fieldset class="form-group">
                                 <label for="formGroupExampleInput">Enter Email Name</label><span class="required">*</span>
                                 <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $principal_email ?>" placeholder="" name="principal_email">
                              </fieldset>
                              <fieldset class="form-group">
                                 <label for="formGroupExampleInput2">Enter Password</label><span class="required">*</span>
                                 <input type="password" class="form-control" id="formGroupExampleInput2" value="" placeholder="********" name="principal_password">
                              </fieldset>
                              <fieldset class="form-group">
                                 <label for="formGroupExampleInput3">Enter Confirm Password </label><span class="required">*</span>
                                 <input type="password" class="form-control" id="formGroupExampleInput3" value="" placeholder="********" name="principal_repassword">
                              </fieldset>
                              <fieldset class="form-group">
                                 <button type="submit" class="btn btn-lg btn-theme-round btn-block" value="Collegesubmit" name="submit">Create Your Account</button>
                              </fieldset>
                              
                           </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="text-center login-footer-tab">
                           <ul class="nav nav-tabs" role="tablist">
                              <li class="nav-item">
                                 <a class="nav-link" href="<?= base_url()?>store_student/college_login"><i class="icofont icofont-lock"></i> LOGIN</a>
                              </li>
                             
                           </ul>
                        </div>
                    <?php echo form_close(); ?>
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
   <?php $this->load->view('student/sfooter.php'); ?>
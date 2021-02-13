
<?php $this->load->view('student/sheader.php'); ?>


 <div class="osahan-breadcrumb">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#"><i class="icofont icofont-ui-home"></i> Home</a></li>
                     <li class="breadcrumb-item"><a href="#">College Login</a></li>
                    
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
                              <h5 class="heading-design-h5">Login to your account</h5>
                              
                                

                                
                           
                         
                       <?php
                        if($this->session->flashdata('msg')!=null)
                        {
                        ?> 
                        <p style="color:green;"><?php echo $this->session->flashdata('msg'); ?>
                     <?php } ?>
                        <?= validation_errors("<p style='color:red;'>","</p>") ?>
                       
                           <?php echo form_open('store_student/college_login'); ?>
                              <fieldset class="form-group">
                                 <label for="formGroupExampleInput" >Enter Email/Mobile</label><span class="required">*</span>
                                 <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="college_username">
                              </fieldset>
                              <fieldset class="form-group">
                                 <label for="formGroupExampleInput2">Enter Password</label><span class="required">*</span>
                                 <input type="password" name="college_password" class="form-control" id="formGroupExampleInput2" placeholder="********">
                              </fieldset>
                              
                              <fieldset class="form-group">
                                 <button type="submit" class="btn btn-lg btn-theme-round btn-block" value="Collegelogin" name="submit">Enter to your account</button>
                              </fieldset>
                              
                             
                           </div>
                        </div>
                        <?php echo form_close(); ?>
                        <div class="clearfix"></div>
                        <div class="text-center login-footer-tab">
                           <ul class="nav nav-tabs" role="tablist">
                             
                              <li class="nav-item">
                                 <a class="nav-link active" href="<?= base_url()?>store_student/college_register"><i class="icofont icofont-pencil-alt-5"></i> NEW TO TPO PORTAL ? REGISTER HERE</a>
                              </li>
                           </ul>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <br><br>
                  
               </div>
            </div>
         </div>
      </section>
     <?php $this->load->view('student/sfooter.php'); ?>
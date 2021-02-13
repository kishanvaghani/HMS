
<?php include('sheader.php') ?>

 <?php
  foreach($student->result() as $row)
  {
 ?>
  <div class="osahan-breadcrumb">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#"><i class="icofont icofont-ui-home"></i> Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Change Password</a></li>
                    
                  </ol>
               </div>
            </div>
         </div>
 </div>
<section class="element_page">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-3">
                  <div class="element_page_sidebar">
                    
                      <center>
                    <a href="<?= base_url()?>store_student/profilephoto">
                    <img class="rounded-circle" src="<?= base_url() ?>images/<?= $row->photo ?>" width="70%" alt="Bannar 1">
                    </a>
                  </center>
                    <hr>
                      <div class="element_page_sidebar">
                             <div class="list-group">
                                <a href="dashboard" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-user"></i> My Profile</a>
                                <a href="myhostel" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-home"></i> My Hostel</a> 
                                <a href="myvehicle" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-social-link"></i> My Vehicle</a>
                                  <a href="profilephoto" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> CHNAGE PROFILE PHOTO</a>
                                 <a href="change_password" class="list-group-item list-group-item-action active"><i class="icofont icofont-all-caps"></i> CHNAGE PASSWORD</a>
                                 <a href="mycomplaint" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> My Complain</a>
                                    <a href="my_fees" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> My Fees</a>
                                <a href="student_logout" class="list-group-item list-group-item-action"><i class="icofont icofont-logout"></i> Logout</a>
                             </div>
                          </div>
                  </div>
               </div>
                <div class="col-lg-8 col-md-8 col-sm-7">
                  <div class="widget">
                     <div class="section-header">
                        <h5 class="heading-design-h5">
                         CHANGE PASSWORD 
                        </h5>
                     </div>
                       <?= validation_errors("<p style='color:red;'>","</p>") ?>

                       <?php
                       if(($this->session->flashdata('error')!=null))
                       {
                       ?>
                       <p style='color:red;'><?php echo $this->session->flashdata('error'); ?></p> 
                     <?php } ?>
                     <?php
                       if(($this->session->flashdata('ok')!=null))
                       {
                       ?>
                       <p style='color:green;'><?php echo $this->session->flashdata('ok'); ?></p> 
                     <?php } ?>

                    
                      <?php echo form_open('store_student/change_password'); ?>
                             <fieldset class="form-group">
                                 <label for="formGroupExampleInput2">Enter Old Password</label><span class="required">*</span>
                                 <input type="password" class="form-control" id="formGroupExampleInput2" value="" placeholder="********" name="oldpassword">
                              </fieldset>
                              <fieldset class="form-group">
                                 <label for="formGroupExampleInput2">Enter New Password</label><span class="required">*</span>
                                 <input type="password" class="form-control" id="formGroupExampleInput2" value="" placeholder="********" name="newpassword">
                              </fieldset>
                              <fieldset class="form-group">
                                 <label for="formGroupExampleInput3">Confirm New Password </label><span class="required">*</span>
                                 <input type="password" class="form-control" id="formGroupExampleInput3" value="" placeholder="********" name="cnewpassword">
                              </fieldset>
                        <div class="row">
                           <div class="col-sm-12 text-right">
                          <button type="submit" class="btn btn-outline-success btn-lg" name="submit" value="Change Password"> Update Password </button>
                           </div>
                        </div>
                    <?php echo form_close(); ?>
                     

                    
                    
                  </div>
               </div>


            </div>
         </div>
      </section>
 <?php } ?>
<?php include('sfooter.php') ?>



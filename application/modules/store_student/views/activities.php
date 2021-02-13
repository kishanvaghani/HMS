
<?php include('sheader.php') ?>
<section class="element_page">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-3">
                  <div class="element_page_sidebar">
                    <center>
                    <a href="<?= base_url()?>store_student/profilephoto">
                    <img class="rounded-circle" src="<?php echo base_url(); ?>student_photos/<?= $stu_photo ?>" width="70%" alt="Bannar 1">
                    </a>
                  </center>
                    <hr>
                      <div class="list-group">
                        <a href="<?= base_url()?>store_student/dashboard" class="list-group-item list-group-item-action "><i class="icofont icofont-exclamation-tringle"></i> MY PROFILE</a>
                        <a href="<?= base_url()?>store_student/experience" class="list-group-item list-group-item-action"><i class="icofont icofont-file-alt"></i> EXPERIENCE</a>
                        <a href="<?= base_url()?>store_student/activities" class="list-group-item list-group-item-action active"><i class="icofont icofont-all-caps"></i> ACTIVITIES</a>
                         <a href="<?= base_url()?>store_student/projects" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> PROJECTS</a>
                       
                        <a href="<?= base_url()?>store_student/jobs" class="list-group-item list-group-item-action"><i class="icofont icofont-line-height"></i> APPLY FOR JOB</a>
                         <a href="<?= base_url() ?>store_student/change_password" class="list-group-item list-group-item-action"><i class="icofont icofont-line-height"></i> CHANGE PASSWORD</a>
                         <a href="<?= base_url() ?>store_student/student_logout" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> LOGOUT</a>
                     </div>
                      
                    
                  </div>
               </div>
                <div class="col-lg-8 col-md-8 col-sm-7">
                  <div class="widget">
                     <div class="section-header">
                        <h5 class="heading-design-h5">
                          ACTIVITIES AND ACHIVEMENTS
                        </h5>
                     </div>
                     <?php 
                           $form_location = base_url(). "store_student/activities"
                     ?>
                    
                    <?php if($this->session->flashdata('flashSuccess'))
                            {
                            ?>
                            <div class="alert alert-success" role="alert"> <?=$this->session->flashdata('flashSuccess')?> </div>
                            <?php } ?>
                     <form action="<?= $form_location ?>" method="post">
                     <div class="row">
                         <?= validation_errors("<p style='color:red;'>","</p>") ?>
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label class="control-label">Achivements <span class="required">*</span></label>
                                 <textarea name="stu_achivements" class="form-control border-form-control"><?= $stu_achivements ?></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label class="control-label">Co-Curricular Activities <span class="required">*</span></label>
                                 <textarea name="stu_activities" class="form-control border-form-control"><?= $stu_activities ?></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label class="control-label">Courses <span class="required">*</span></label>
                                 <textarea name="stu_courses" class="form-control border-form-control"><?php echo $stu_courses; ?></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label class="control-label">Computer literacy <span class="required">*</span></label>
                                 <textarea name="stu_computer" class="form-control border-form-control"><?= $stu_computer ?></textarea>
                              </div>
                           </div>
                        </div>
                         <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label class="control-label">Hobbies <span class="required">*</span></label>
                                 <textarea name="stu_hobbies" class="form-control border-form-control"><?php echo $stu_hobbies; ?></textarea>
                              </div>
                           </div>
                        </div>
                        
                                              
                        <div class="row">
                           <div class="col-sm-12 text-right">
                               <button type="submit" class="btn btn-outline-danger btn-lg" name="submit" value="Cancel"> Cancel </button>
                              <button type="submit" class="btn btn-outline-success btn-lg" name="submit" value="Save"> Save Changes </button>
                           </div>
                        </div>
                     </form>
                    
                  </div>
               </div>
            </div>
         </div>
      </section>

<?php include('sfooter.php') ?>

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
                        <a href="<?= base_url()?>store_student/experience" class="list-group-item list-group-item-action active"><i class="icofont icofont-file-alt"></i> EXPERIENCE</a>
                        <a href="<?= base_url()?>store_student/activities" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> ACTIVITIES</a>
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
                          EXPERIENCES
                        </h5>
                     </div>
                     <?php 
                        if(!empty($exp->result()))
                        {
                              // no records to display
                        ?>
                         <table class="table table-responsive">
                        <thead>
                           <tr>
                              <th>Company Name</th>
                              <th>Designation</th>
                              <th>From</th>
                              <th>To</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                            foreach($exp->result() as $row)
                            {
                           ?>
                           <tr>
                              <th><?= $row->companyname ?></th>
                              <td><?= $row->designation ?></td>
                              <td><?= $row->date_from ?></td>
                              <td><?= $row->date_to ?></td>
                               <td> <a class="btn btn-danger" href="<?= base_url()?>store_student/delete_experience/<?= $row->id ?>" >Delete</a></td>                                                         
                           </tr>
                           <?php }
                           } ?>
                        </tbody>
                     </table>

                      <?= validation_errors("<p style='color:red;'>","</p>") ?>
                       <?php 
                           $form_location = base_url(). "store_student/experience"?>
                     <form action="<?= $form_location ?>" method="post">
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label class="control-label">Company Name <span class="required">*</span></label>
                                 <input name="companyname" class="form-control border-form-control" placeholder="" type="text" value="<?= $companyname ?>">
                              </div>
                           </div>
                        </div>
                       <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label class="control-label">Designation <span class="required">*</span></label>
                                 <input name="designation" class="form-control border-form-control" placeholder="" type="text" value="<?= $designation?>">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label class="control-label"> From <span class="required">*</span></label>
                                 <input name="date_from" class="form-control border-form-control" placeholder="DD/MM//YYYY" type="date" value="<?= $date_from?>">
                              </div>
                           </div>
                        </div>
                       <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label class="control-label">To <span class="required">*</span></label>
                                 <input name="date_to" class="form-control border-form-control" placeholder="DD/MM//YYYY" type="date" value="<?= $date_to?>">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12 text-right">
                              <button type="submit" class="btn btn-outline-danger btn-lg" name="submit" value="Cancel"> Cancel </button>
                              <button type="submit" class="btn btn-outline-success btn-lg" name="submit" value="Save"> ADD EXPERIENCE </button>
                           </div>
                        </div>

                       
                    
                        
                     </form>
                    
                    
                  </div>
               </div>


            </div>
         </div>
      </section>

<?php include('sfooter.php') ?>
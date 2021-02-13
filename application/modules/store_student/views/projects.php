
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
                        <a href="<?= base_url()?>store_student/activities" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> ACTIVITIES</a>
                         <a href="<?= base_url()?>store_student/projects" class="list-group-item list-group-item-action active"><i class="icofont icofont-all-caps"></i> PROJECTS</a>
                       
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
                         PROJECTS
                        </h5>
                     </div>
                    <table class="table table-responsive">                    
                        <tbody>  
                        <?php 
                        if(!empty($myproject->result()))
                        {
                        foreach($myproject->result() as $row)
                        {     // no records to display
                        ?>                       
                           <tr>
                              <td><strong>Project Title : </strong><?= $row->project_title ?>
                                <br/>
                                <strong>Project Description :</strong>
                                <br/>
                               <?= $row->project_description  ?>
                                <br/><br/>
                                <a class="btn btn-danger" href="<?= base_url()?>store_student/delete_project/<?= $row->id ?>" >Delete</a>
                              </td>
                            </tr>
                          <?php }} ?>
                            
                            
                        </tbody>
                     </table><br/>
                     <div class="section-header">
                        <h5 class="heading-design-h5">
                         ADD NEW PROJECT HERE
                        </h5>
                     </div>
                     <form method="post" action="<?=base_url() ?>store_student/projects">
                     <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label class="control-label">Project Title <span class="required">*</span></label>
                                 <input name="project_title" class="form-control border-form-control" placeholder="" type="text" value="<?= $project_title?>">
                              </div>
                           </div>
                        </div>
                         <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label class="control-label">Project Description <span class="required">*</span></label>
                                 <textarea name="project_description" class="form-control border-form-control"><?php echo $project_description; ?></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12 text-right">
                          <button type="submit" class="btn btn-outline-success btn-lg" name="submit" value="Saveproject"> Add New Project </button>
                           </div>
                        </div>
                     </form>
                    
                  </div>
               </div>
            </div>
         </div>
      </section>

<?php include('sfooter.php') ?>
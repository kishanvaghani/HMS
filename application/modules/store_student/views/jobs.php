
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
                         <a href="<?= base_url()?>store_student/projects" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> PROJECTS</a>
                       
                        <a href="<?= base_url()?>store_student/jobs" class="list-group-item list-group-item-action active"><i class="icofont icofont-line-height"></i> APPLY FOR JOB</a>
                          <a href="<?= base_url() ?>store_student/change_password" class="list-group-item list-group-item-action"><i class="icofont icofont-line-height"></i> CHANGE PASSWORD</a>
                         <a href="<?= base_url() ?>store_student/student_logout" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> LOGOUT</a>
                     </div>
                    
                  </div>
               </div>
                
         <div class="col-lg-8 col-md-8 col-sm-7">
            <div class="widget">
                <?php echo $this->session->flashdata('Student');?>              
                <div class="section-header">
                  <h5 class="heading-design-h5">
                    APPLY ONLINE HERE
                  </h5>
               </div>
                
                <?php 
                $form_location = base_url(). "store_student/submit_apply";
                if(!empty($query->result()))
                {

                ?>
                    <?php
                    foreach($query->result() as $row)
                    {              
                        $this->db->where('company_name',$row->id);           
                        $selcolleges = $this->db->get('allow_colleges');
                        $forcollege='NO';

                        foreach($selcolleges->result() as $row1)
                        { 
                         if($row1->college_name==$student_college)
                         {
                           $forcollege='YES';
                           break;
                         }else
                         {
                          $forcollege='NO';
                         }
                        }
                        //for departments
                        $this->db->where('company_name',$row->id);           
                        $seldep = $this->db->get('allow_departments');
                        $fordep='NO';

                        foreach($seldep->result() as $rowdep)
                        { 
                         if($rowdep->department_name==$stu_department)
                         {
                           $fordep='YES';
                           break;
                         }else
                         {
                          $fordep='NO';
                         }
                        }

                        if($row->calculate_type=='CPI')
                        {
                          $rtype='cpi';
                          $sresult=$stucpi;
                        }else if($row->calculate_type=='SPI')
                        {

                          $rtype='spi';
                          $sresult=$stuspi;
                        }else
                        {
                          $rtype='cgpi';
                          $sresult=$stucgpi;
                        }

                        if($row->backlog_type=='CURRENT')
                        {
                          $backlog = $currentbacklog;
                        }else
                        {
                          $backlog = $totalbacklog;
                        }


                        if($stu_12th_status=='1')
                        {
                          $science=$stu_12th_result;
                          $cscience =$row->science_res;
                        }else
                        {
                          $science=$stu_diploma_result;
                           $cscience =$row->diploma_result;
                        }


                        if($forcollege=='NO' || $fordep=='NO')
                        {

                        ?>
                        <div class="alert alert-success" role="alert">
                        <h3 class="alert-heading"><?= $row->company_name ?></h3> <br/>                    
                        <h3> <span class="badge badge-secondary">Sorry !! Your college or department is not eligible for this company job</span></h3>
                      </div>
                        <?php

                        }else
                        {
                                   
                             if(($backlog <= $row->maximum_backlog) and ($sresult >= $row->minimum_cpi) and ($science >= $cscience) and ($stu_10th_result >= $row->english_result))
                              {

                              ?>
                                    <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading"><?= $row->company_name ?></h4>
                                    <p><?= $row->company_description ?></p>
                                    <form action="<?= $form_location ?>" method="post">  <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="<?= $row->id?>">
                                       I have filled out all my profile details perfectly
                                    </label></br></br>
                                    <button type="submit" class="btn btn-primary btn-lg" name="apply" value="<?= $row->id?>">APPLY FOR COMPANY</button>
                                    </form>
                                   
                                    </div>
                               <?php 
                                 }else
                                 {
                                ?>
                                <div class="alert alert-success" role="alert">
                                <h3 class="alert-heading"><?= $row->company_name ?></h3> <br/>                    
                                <h3> <span class="badge badge-secondary">Sorry !! You are not eligible for this  company job.  For more details, check out eligibility of company</span></h3>
                              </div>

                                <?php

                                 }
                        }
                    }

              }else
              {
              ?>
                       <hr>                      
                       <h1> <span class="badge badge-secondary">Sorry !! Currently No Company Availble for you.</span></h1>
             <?php } ?>

                        

                  </div>
               </div>




            </div>
         </div>
      </section>

<?php include('sfooter.php') ?>
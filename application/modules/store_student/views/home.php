
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
                      
                      
                    
                  </div>
               </div>
                <div class="col-lg-8 col-md-8 col-sm-7">
                  <div class="widget">
                     <div class="section-header">
                        <h5 class="heading-design-h5">
                          My Profile
                        </h5>
                     </div>
                     <div class="row">
                           <div class="col-lg-12 col-md-12">
                              <h4 class="block-title-border">Basic Details </h4>
                           </div>
                           <div class="col-lg-12 col-md-12">
                              <div class="statustop">
                                <?php
                                  foreach($details->result() as $row)
                                  {
                                 ?>
                                 <p class="card-text"><strong>Name </strong>: <?= $row->stu_surname.' '.$row->stu_name.' '. $row->stu_father_name ?><br/>
                                    <strong>Enrollment Number </strong>:  <?= $row->stu_enroll ?><br/>
                                    <strong>Mobile Number </strong>: <?= $row->stu_mobile ?><br/>
                                    <strong>Email ID </strong>: <?= $row->stu_email ?><br/>
                                    <strong>College Name </strong>:  <?= $row->stu_college ?><br/>
                                    <strong>Department Name </strong>:<?= $row->stu_department ?><br/>
                                 <br> 
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12 col-md-12">
                              <h4 class="block-title-border">Peronal Details </h4>
                           </div>
                           <div class="col-lg-12 col-md-12">
                              <div class="statustop">
                                 <p class="card-text"><strong>Alternate Mobile Number </strong>: <?= $row->stu_alternate_mobile ?><br/>
                                    <strong>Category </strong>: <?= $row->stu_category ?><br/>
                                    <strong>Date Of Birth </strong>: <?= $row->stu_dob ?><br/>
                                    <strong>Gender</strong>: <?= $row->stu_gender ?><br/>
                                    <strong>PH </strong>: <?= $row->stu_ph ?><br/>
                                    <strong>Minority</strong>: <?= $row->stu_minority ?><br/>
                                    <strong>Address</strong>: <?= $row->stu_address.' '.$row->stu_district.' '.$row->stu_pincode ?><br/>
                                 <br> 
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12 col-md-12">
                              <h4 class="block-title-border">Activities and Achivements </h4>
                           </div>
                           <div class="col-lg-12 col-md-12">
                              <div class="statustop">
                                 <p class="card-text"><strong>Co-Curricular Activities </strong>: <?= $row->stu_activities ?><br/>
                                    <strong>Achievements </strong>: <?= $row->stu_achivements ?><br/>
                                    <strong>Courses </strong>:  <?= $row->stu_courses ?><br/>
                                    <strong>Computer literacy</strong>: <?= $row->stu_computer ?><br/>
                                    <strong>Hobbies </strong>: <?= $row->stu_hobbies ?><br/>
                                   <br/>
                                 </p> 
                                 <?php } ?>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12 col-md-12">
                              <h4 class="block-title-border">Academic Details </h4>
                           </div>
                           <div class="col-lg-12 col-md-12">
                              <div class="statustop">
                                   <?php 
                        if(!empty($sturesult->result()))
                        {
                              // no records to display
                        ?>       
                       
                        <table class="table table-responsive">
                        <thead>
                           <tr>
                              <th>Exam Name</th>
                              <th>Exam Year</th>
                              <th>Semester</th>
                              <th>CPI</th>
                              <th>SPI</th>
                              <th>CGPI</th>
                              <th>Current Backlog</th>
                                <th>Total Backlog</th>
                             
                           </tr>
                        </thead>
                        <tbody>
                           <?php

                            foreach($sturesult->result() as $row)
                            {
                           ?>
                           <tr>
                              <th scope="row"><?= $row->exam_name ?></th>
                              <td><?= $row->exam_year ?></td>
                              <td><?= $row->stu_semester ?></td>
                              <td><?= $row->stu_cpi ?></td>
                              <td><?= $row->stu_spi ?></td>
                              <td><?= $row->stu_cgpi ?></td>
                               <td><?= $row->stu_current_backlog ?></td>
                               <td><?= $row->stu_total_backlog ?></td>
                             
                           </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                     <?php } ?>
                                   
                                 <br> 
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12 col-md-12">
                              <h4 class="block-title-border">Experiences </h4>
                           </div>
                           <div class="col-lg-12 col-md-12">
                              <div class="statustop">
                              <table class="table table-responsive">
                                      <thead>
                                         <tr>                          
                                            <th>Company Name</th>
                                            <th>Designation</th>
                                            <th>From</th>
                                            <th>To</th>
                                                                        
                                         </tr>
                                      </thead>
                                      <tbody>
                                        <?php

                                        foreach($experience->result() as $row)
                                        {
                                       ?>
                                         <tr>
                                            
                                            <td><?= $row->companyname ?></td>
                                            <td><?= $row->designation ?></td>
                                            <td><?= $row->date_from ?></td>
                                            <td><?= $row->date_to ?></td>
                                                                                                     
                                         </tr> 
                                         <?php } ?>            
                                      </tbody>
                                   </table>
                                   
                                 <br> 
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12 col-md-12">
                              <h4 class="block-title-border">Projects </h4>
                           </div>
                           <div class="col-lg-12 col-md-12">
                              <div class="statustop">
                                  <table class="table table-responsive">
                                          <thead>
                                             <tr>                          
                                                <th>Sr.No.</th>
                                                <th>Project Title</th>                             
                                             </tr>
                                          </thead>
                                          <tbody>
                                          <?php
                                          $srno='1';
                                          foreach($projects->result() as $row)
                                          {
                                         ?>
                                             <tr>
                                                
                                                <td><?= $srno  ?></td>
                                                <td><?= $row->project_title ?></td>
                                                                                                         
                                             </tr> 
                                             <?php $srno=$srno+1;} ?>            
                                          </tbody>
                                       </table>
                                   
                                 <br> 
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12 col-md-12">
                              <h4 class="block-title-border">Applications </h4>
                           </div>
                           <div class="col-lg-12 col-md-12">
                              <div class="statustop">
                                  <table class="table table-responsive">
                                          <thead>
                                             <tr>                          
                                                <th>#</th>
                                                 <th>Company Name</th>
                                                <th>Date of Application</th>
                                                                            
                                             </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                            $serial='1';
                                            foreach($applications->result() as $row)
                                            {
                                           ?>
                                             <tr>
                                                <th scope="row"><?= $serial ?></th>
                                                <td><?= $row->company_name ?></td>
                                                <td><?= $row->apply_date ?></td>
                                                                                                         
                                             </tr>  
                                             <?php $serial=$serial+1; } ?>           
                                          </tbody>
                                       </table>
                                 <br> 
                              </div>
                           </div>
                        </div>


                    
                    
                     
                    
                    
                  </div>
               </div>
            </div>
         </div>
      </section>

<?php include('sfooter.php') ?>
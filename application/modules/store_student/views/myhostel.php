 
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
                     <li class="breadcrumb-item"><a href="#">My Hostel</a></li>
                    
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
                            <a href="<?= base_url()?>index.php/store_student/profilephoto">
                            <img class="rounded-circle" src="<?php echo base_url(); ?>images/user.jpg" width="70%" alt="Bannar 1">
                            </a>
                          </center>
                            <hr>
                          <div class="element_page_sidebar">
                             <div class="list-group">
                                <a href="dashboard" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-user"></i> My Profile</a>
                                <a href="myhostel" class="list-group-item list-group-item-action active"><i class="icofont icofont-ui-home"></i> My Hostel</a>
                                <a href="myvehicle" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-social-link"></i> My Vehicle</a>
                                <a href="profilephoto" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> CHNAGE PROFILE PHOTO</a>
                                 <a href="change_password" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> CHNAGE PASSWORD</a>
                                <a href="mycomplaint" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> My Complain</a>
                                <a href="my_fees" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> My Fees</a>
                                <a href="student_logout" class="list-group-item list-group-item-action"><i class="icofont icofont-logout"></i> Logout</a>
                             </div>
                          </div>
                      </div>
                </div>      
               <div class="col-lg-9 col-md-9">
                  <div class="widget">
                     <div class="section-header">
                        <h5 class="heading-design-h5">
                           MY HOSTEL 
                        </h5>
                     </div>
                                          <table class="table table-responsive">
                        <thead>
                           <tr>
                              <th>Hostel Name</th>
                              <th>Floor Number</th>
                              <th>Room Number</th>
                              <th>Admission Date</th>
                           </tr>
                        </thead>
                                  <?php
                                    $this->db->where("id",$row->hostel_id);
                                    $my=$this->db->get("hostel_details");
                                    $myh=$my->row();
                                     ?>
                        <tbody>
                         <tr>
                          <td><?= $myh->hostel_name ?></td>
                          <td><?= $row->floor_name ?></td>
                          <td><?= $row->room_number ?></td>
                          <td><?= $row->admission_date ?></td>
                         </tr>
                       </tbody>
                     </table>   
                </div>     
              </div>
      </div>       
    </div>
  </section>
 
   <?php } ?>
<?php include('sfooter.php') ?>
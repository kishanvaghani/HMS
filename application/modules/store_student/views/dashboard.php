
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
                     <li class="breadcrumb-item"><a href="#">My Profile</a></li>
                    
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
                            <img class="rounded-circle" src="<?php echo base_url(); ?>images/<?= $row->photo ?>" width="70%" alt="Bannar 1">
                            </a>
                          </center>
                            <hr>
                          <div class="element_page_sidebar">
                             <div class="list-group">
                                <a href="dashboard" class="list-group-item list-group-item-action active"><i class="icofont icofont-ui-user"></i> My Profile</a>
                                <a href="myhostel" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-home"></i> My Hostel</a> 
                                <a href="myvehicle" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-social-link"></i> My Vehicle</a>
                                  <a href="profilephoto" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> CHANGE PROFILE PHOTO</a>
                                 <a href="change_password" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-password"></i> CHANGE PASSWORD</a>
                                 <a href="mycomplaint" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> My Complain</a>
                                <a href="my_fees" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> My Fees</a>
                                <a href="student_logout" class="list-group-item list-group-item-action"><i class="icofont icofont-logout"></i> Logout</a>
                             </div>
                          </div>
                      </div>
                </div>      
               <div class="col-lg-9 col-md-9">
                  <div class="widget h-100">
                     <div class="section-header">
                        <h5 class="heading-design-h5">
                           MY PROFILE 
                        </h5>
                     </div>
                     
                       <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                          <table  class="table table-sm">
                                             <tbody>
                                              <tr>
                                                <th>STUDENT NAME :</th>
                                                   <td><?= $row->last_name.' '.$row->first_name.' '.$row->middle_name ?></td>
                                              </tr>
                                              <tr>
                                                   <th>DEPARTMENT :</th>
                                                   <td><?= $row->department ?></td>
                                              </tr>
                                              <tr>
                                                  <th>ENROLLMENT NO. :</th>
                                                   <td><?= $row->enrollment ?></td>
                                              </tr>
                                               <tr>
                                                <th>SEMESTER :</th>
                                                   <td><?= $row->semester ?></td>
                                                   
                                              </tr>
                                               <tr>
                                                <th>MOBILE NO. :</th>
                                                   <td><?= $row->mobile ?></td>
                                                   
                                              </tr>
                                               <tr>
                                                <th>E-MAIL ID :</th>
                                                   <td><?= $row->email ?></td>
                                                   
                                              </tr>
                                               <tr>
                                                <th>PH :</th>
                                                   <td><?= $row->ph ?></td>
                                                   
                                              </tr>
                                              <tr>
                                                <th>DATE OF BIRTH :</th>
                                                   <td><?= $row->dob ?></td>
                                                   
                                              </tr>
                                               <tr>
                                                <th>PARENT MOBILE :</th>
                                                   <td><?= $row->parent_mobile ?></td>
                                                   
                                              </tr>
                                               <tr>
                                                <th>CATEGORY :</th>
                                                   <td><?= $row->category ?></td>
                                                   
                                              </tr>
                                               <tr>
                                                <th>GENDER :</th>
                                                   <td><?= $row->gender ?></td>
                                                  
                                              </tr>
                                               <tr>
                                                <th>PARMENENT ADDRESS :</th>
                                                   <td><?= $row->parmenent_address ?></td>
                                                   
                                              </tr>
                                               <tr>
                                                <th>TALUKO :</th>
                                                   <td><?= $row->taluko ?></td>
                                                   
                                              </tr>
                                               <tr>
                                                <th>DISTRICT :</th>
                                                   <td><?= $row->district ?></td>
                                                   
                                              </tr>
                                               <tr>
                                                <th>PIN-CODE :</th>
                                                   <td><?= $row->pin_code ?></td>
                                                   
                                              </tr> 
                                           </table>
                                    </div>  
                                     <!--<div class="col-sm-12 text-right">
                                        <button type="button" class="btn btn-outline-success btn-lg"> Save Changes </button>
                                     </div> -->                    
                       </div> 
                  </div>
                </div>
      </div>       
    </div>
  </section>
 
   <?php } ?>
<?php include('sfooter.php') ?>
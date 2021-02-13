 
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
                     <li class="breadcrumb-item"><a href="#">My Complaint</a></li>
                    
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
                                <a href="dashboard" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-user"></i> My Profile</a>
                                <a href="myhostel" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-home"></i> My Hostel</a>
                                <a href="myvehicle" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-social-link"></i> My Vehicle</a>
                                <a href="profilephoto" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> CHNAGE PROFILE PHOTO</a>
                                 <a href="change_password" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> CHNAGE PASSWORD</a>
                                <a href="mycomplaint" class="list-group-item list-group-item-action active"><i class="icofont icofont-all-caps"></i> My Complain</a>
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
                         MY COMPLAINT 
                        </h5>
                     </div>
                                  
                       <?php if($this->session->flashdata('error'))
                      {
                      ?>
                      <div class="alert alert-danger" role="alert"> <?=$this->session->flashdata('error')?> </div>
                      <?php } ?>   
                     <?php if($this->session->flashdata('flashSuccess'))
                      {
                      ?>
                      <div class="alert alert-success" role="alert"> <?=$this->session->flashdata('flashSuccess')?> </div>
                      <?php } ?>         
                     
                      <form action="<?= base_url() ?>index.php/store_student/mycomplaint" method="post" accept-charset="utf-8">
                             <div class="row">
                           <div class="col-sm-12">
                              <fieldset class="form-group">
                              <label  for="validationCustom03" class="control-label" >Complain type</label><span class="required">*</span>
                              <select class="custom-select mb-2 mr-sm-2 mb-sm-0"  name="c_type">
                                <option value disabled selected>--Select Complain Type--</option>
                                  <option>CIVIL</option>
                                   <option>ELECTRICAL</option>
                                   <option>OTHER</option>  
                              </select>  
                           </fieldset>                          
                           </div>
                          </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label class="control-label">Comaplain description <span class="required">*</span></label>
                                  <textarea type="text" class="form-control border-form-control" placeholder="Complain Description" name="c_name" id="validationCustom01" required></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12 text-right">
                          <button type="submit" class="btn btn-outline-success btn-lg" name="submit" value="Submit"> Submit </button>
                           </div>
                        </div>
                    </form>   
                  </div>
               </div>
      </div>       
    </div>
  </section>
 
   <?php } ?>
<?php include('sfooter.php') ?>
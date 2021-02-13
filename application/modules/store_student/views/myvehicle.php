 
<?php include('sheader.php') ?>
<div class="osahan-breadcrumb">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#"><i class="icofont icofont-ui-home"></i> Home</a></li>
                     <li class="breadcrumb-item"><a href="#">My Vehicle</a></li>
                    
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
                    <img class="rounded-circle" src="<?php echo base_url(); ?>images/<?= $photo ?>" width="70%" alt="Bannar 1">
                    </a>
                  </center>
                    <hr>
                      <div class="element_page_sidebar">
                             <div class="list-group">
                                <a href="dashboard" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-user"></i> My Profile</a>
                                <a href="myhostel" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-home"></i> My Hostel</a>
                                <a href="myvehicle" class="list-group-item list-group-item-action active"><i class="icofont icofont-ui-social-link"></i> My Vehicle</a>
                                 <a href="profilephoto" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> CHNAGE PROFILE PHOTO</a>
                                 <a href="change_password" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> CHNAGE PASSWORD</a>
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
                          MY VEHICLE
                        </h5>
                     </div>
                     <?php 
                        if(!empty($vehicle->result()))
                        {
                              // no records to display
                        ?>
                         <table class="table table-responsive">
                        <thead>
                           <tr>
                              <th>Vehicle Type</th>
                              <th>Vehicle Name</th>
                              <th>Vehicle Number</th>
                              <th>Vehicle Status</th>
                              <th>RC Book</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                            foreach($vehicle->result() as $row)
                            {
                           ?>
                           <tr>
                              <th><?= $row->v_type ?></th>
                              <td><?= $row->v_name ?></td>
                              <td><?= $row->v_number ?></td>
                              <td><?= $row->v_status ?></td>
                                 <?php $file = FCPATH . 'vehicle/'. $row->rc_book_photo; ?>
                                 <td>
                                  <?php
              if($row->rc_book_photo==NULL)
              {
              ?>
              <a><b>UPLOAD CATALOG</b></a>
            <?php }else{

              ?>
              <a class="btn btn-primary " href="<?= base_url()?>index.php/store_student/download/<?php echo $file; ?>" >Download</a>
             <?php } ?></td>
                              
                               <td> <a class="btn btn-danger" href="<?= base_url()?>index.php/store_student/delete_vehicle" >Delete</a></td>    
                           </tr>
                           <?php }
                           } ?>
                        </tbody>
                     </table>
                     <br>
                     <h5 class="heading-design-h5">Add Vehicle</h5>

                      <?= validation_errors("<p style='color:red;'>","</p>") ?>
                       <?php 
                           $form_location = base_url(). "index.php/store_student/myvehicle"?>
                     <form action="<?= $form_location ?>" method="post">
                        <div class="row">
                           <div class="col-sm-12">
                              <fieldset class="form-group">
                              <label  for="validationCustom03" class="control-label" >Vehicle type</label><span class="required">*</span>
                              <select class="custom-select mb-2 mr-sm-2 mb-sm-0"  name="v_type">
                                <option value disabled selected>--Select Vehicle Type--</option>
                                 <option>CAR</option>
                                  <option>BIKE</option>
                                   <option>MOPED (Gearless)</option>
                                     
                                
                              </select>  
                           </fieldset>                          
                           </div>
                          </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label class="control-label">Vehicle Name <span class="required">*</span></label>
                                 <input class="form-control border-form-control" placeholder="Enter Vahical Name" name="v_name" type="text">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label class="control-label">Vahicle Number <span class="required">*</span></label>
                                 <input class="form-control border-form-control" name="v_number" placeholder="GJ-00-XX-0000" type="text">
                              </div>
                           </div>
                        </div>
                          
                        <div class="row">
                           <div class="col-sm-12 text-right">
                              <button type="submit" class="btn btn-outline-danger btn-lg" name="submit" value="Cancel"> Cancel </button>
                              <button type="submit" class="btn btn-outline-success btn-lg" name="submit" value="Save"> ADD VEHICLE </button>
                           </div>
                        </div> 
                     </form> 
                     <br/>
                     <div class="row">
                           <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                   <label class="control-label">Upload RC Book Photo <span class="required">*</span></label>
                                 
                                    <label class="custom-file">
                                    <?php echo form_open_multipart('store_student/rc_book_upload');?>
                                    <input type="file" id="file" class="custom-file-input" name="rc_book" required>
                                    <span class="custom-file-control"></span>
                                    </label>   
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6">
                                <br/>
                                 <input type="submit" class="btn btn-outline-primary" name="submit" value="Upload RC BOOK"/>
                                    </form>
                           </div>
                        </div>
                    <div class="status-main">
                      <div class="alert alert-info" role="alert">
                       File Format : JPG | PNG | GIF | PDF <br/>
                       Maximum file Size : 2MB <br/>
                       
                     </div>
                        
                        <?php 
                         if(isset($error))
                           {                           
                            ?>
                            <div class="alert alert-danger" role="alert">
                                 <?php  echo $error; ?>
                            </div>
                           <?php 
                            }
                           ?>
                     <?php if($this->session->flashdata('flashSuccess'))
                      {
                      ?>
                      <div class="alert alert-success" role="alert"> <?=$this->session->flashdata('flashSuccess')?> </div>
                      <?php } ?>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

<?php include('sfooter.php') ?>
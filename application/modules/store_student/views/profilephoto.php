
<?php include('sheader.php') ?>
<div class="osahan-breadcrumb">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#"><i class="icofont icofont-ui-home"></i> Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Change Profile Photo</a></li>
                    
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
                    <a href="shop-grid-left-sidebar.html">
                    <img class="rounded-circle" src="<?php echo base_url(); ?>images/<?= $photo ?>" width="70%" alt="Bannar 1">
                    </a>
                  </center>
                    <hr>
                       <div class="element_page_sidebar">
                             <div class="list-group">
                                <a href="dashboard" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-user"></i> My Profile</a>
                                <a href="myhostel" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-home"></i> My Hostel</a> 
                                <a href="myvehicle" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-social-link"></i> My Vehicle</a>
                                  <a href="profilephoto" class="list-group-item list-group-item-action active"><i class="icofont icofont-all-caps"></i> CHNAGE PROFILE PHOTO</a>
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
                          Upload
                        </h5>
                     </div>
                     <div class="status-main">
                      <div class="alert alert-info" role="alert">
                       File Format : JPG | PNG | GIF <br/>
                       Maximum Image and Size Size : 100KB <br/>
                       Maximum Image and Sign Width : 250px <br/>
                       Maximum Image and Sign Height : 250px
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
                        <div class="row">
                           <div class="col-lg-6 col-md-6">
                              <div class="card">
                                 <div class="card-header">
                                    Upload Photo
                                 </div>
                                 <?php 
                                

                                 ?>  
                                 
                                 <div class="card-body">
                                    <label class="custom-file">
                                    <?php echo form_open_multipart('store_student/profile_upload');?>
                                    <input type="file" id="file" class="custom-file-input" name="stu_photo" required>
                                    <span class="custom-file-control"></span>
                                  
                                    </label>
                                    <br/>  <br/> 
                                    <input type="submit" class="btn btn-outline-primary" name="submit" value="Upload Photo"/>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6">
                              <div class="card">
                                 <div class="card-header">
                                 Photo 
                                 </div>
                                 <div class="card-body">
                                  <center>
                                     <img src="<?php echo base_url(); ?>images/<?= $photo ?>" class="rounded" alt="Sample image">
                                     </center>
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

<?php include('sfooter.php') ?>
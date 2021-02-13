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
                     <li class="breadcrumb-item"><a href="#">My Fees</a></li>
                    
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
                                <a href="mycomplaint" class="list-group-item list-group-item-action "><i class="icofont icofont-all-caps"></i> My Complain</a>
                                <a href="my_fees" class="list-group-item list-group-item-action active"><i class="icofont icofont-all-caps"></i> My Fees</a>
                                <a href="student_logout" class="list-group-item list-group-item-action"><i class="icofont icofont-logout"></i> Logout</a>
                             </div>
                          </div>
                      </div>
                </div>      
                 <?php
                      $my=$this->db->get("transaction_status");
                      $myh=$my->row();
                      ?>
                      <?php
              if($myh->status=="1")
              {
              ?>
                <div class="col-lg-8 col-md-8 col-sm-7">
                  <div class="widget">
                     <div class="section-header">
                        <h5 class="heading-design-h5">
                         MY FEES 
                        </h5>
                     </div>
                             <?php if($this->session->flashdata('flashSuccess'))
                      {
                      ?>
                      <div class="alert alert-success" role="alert"> <?=$this->session->flashdata('flashSuccess')?> </div>
                      <?php } ?>
                      <form action="<?= base_url() ?>index.php/store_student/my_fees" method="post" accept-charset="utf-8">
                        <div class="row">
                           <div class="col-sm-12">
                            <div class="form-group">
                             <label for="exampleInputEmail1">Enter Reference Number</label>
                             <input type="text" class="form-control"  name="tid" placeholder="Enter Transaction Id">
                            </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12 text-center">
                          <button type="submit" class="btn btn-outline-success btn-lg" name="submit" value="submit"> Submit </button>
                           </div>
                        </div>
                    </form>   
                  </div>
               </div>
            <?php }else{
              ?>
              This Service is Available Soon...
             <?php } ?> 
                
      </div>       
    </div>
  </section>
 
   <?php } ?>
<?php include('sfooter.php') ?>
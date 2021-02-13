  <?php $this->load->view('header.php')?>
<div class="content-wrapper">
 
     <?php if($this->session->flashdata('message')){ ?>

            <div class="callout callout-success">
                <h4> <?php echo $this->session->flashdata('message'); ?></h4>               
            </div>
                   <?php } ?>
               <?php echo validation_errors("<div class='callout callout-danger'>","</div>"); ?>

    <section class="content-header">
      <h1>
        Student Profile
      </h1>
       
    </section>
  <?php
  foreach($student->result() as $row)
  {
 ?>
    <section class="content">
                <?php
               $this->db->select("student_room.*,hostel_details.*");
               $this->db->from("hostel_details");
               $this->db->join("student_room","student_room.hostel_id=hostel_details.id");
               $this->db->where("student_id",$sid);
               $my=$this->db->get();
               $myh=$my->row();
                 ?>
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>images/<?= $row->photo ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?= $row->last_name.' '.$row->first_name ?></h3>

              <p class="text-muted text-center"><?= $row->department ?></p>

              <ul class="list-group list-group-unbordered">
               
                <li class="list-group-item">
                  <b>Hostel</b> <a class="pull-right"><?= $myh->hostel_name ?></a>
                </li>
                <li class="list-group-item">
                  <b>Floor Number</b> <a class="pull-right"><?= $myh->floor_name ?></a>
                </li>
                <li class="list-group-item">
                  <b>Room Number</b> <a class="pull-right"><?= $myh->room_number ?></a>
                
                </li>
                <li class="list-group-item">
                  <b>Admission Date</b> <a class="pull-right"><?= $myh->admission_date ?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
           
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
 
            <ul class="nav nav-tabs"  role="tablist">
              <li class="active"><a href="#activity" data-toggle="tab"><b>Educational Details</b></a></li>
              <li><a href="#timeline" data-toggle="tab"><b>Personal Details</b></a></li>
              <li><a href="#settings" data-toggle="tab"><b>Vehicle Details</b></a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="row">
                                    <div class="col-lg-12 col-md-12s">
                                          <table  class="table table-sm">
                                             <tbody>
                                              <tr>
                                                <td>Full Name :</td>
                                                   <td><a><?= $row->last_name.' '.$row->first_name.' '.$row->middle_name ?></a></td>
                                              </tr>
                                              <tr>
                                                   <td>Department :</td>
                                                   <td><a><?= $row->department ?></a></td>
                                              </tr>
                                              <tr>
                                                  <td>Enrollment No. :</td>
                                                   <td><a><?= $row->enrollment ?></a></td>
                                              </tr>
                                               <tr>
                                                <td>Semester :</td>
                                                   <td><a><?= $row->semester ?></a></td>
                                                   
                                              </tr>
                                               <tr>
                                                <td>Mobile No. :</td>
                                                   <td><a><?= $row->mobile ?></a></td>
                                                   
                                              </tr>
                                               <tr>
                                                <td>E-mail ID :</td>
                                                   <td><a><?= $row->email ?></a></td>
                                                   
                                              </tr>
                                               
                                               <tr>
                                                <td>Category :</td>
                                                   <td><a><?= $row->category ?></a></td>
                                                   
                                              </tr>
                                              </tbody>  
                                           </table>
                                    </div>  
                                                          
                       </div>
              </div>
               
              <div class="tab-pane" id="timeline">
                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                          <table  class="table table-sm">
                                             <tbody>
                                              <tr>
                                                <td>Full Name :</td>
                                                   <td><a><?= $row->last_name.' '.$row->first_name.' '.$row->middle_name ?></a></td>
                                              </tr>
                                              <tr>
                                                   <td>D.O.B. :</td>
                                                   <td><a><?= $row->dob ?></a></td>
                                              </tr>
                                               
                                               <tr>
                                                <td>Parent Mobile :</td>
                                                   <td><a><?= $row->parent_mobile ?></a></td>
                                                   
                                              </tr>
                                               <tr>
                                                <td>PH :</td>
                                                   <td><a><?= $row->ph ?></a></td>
                                                   
                                              </tr>
                                               <tr>
                                                <td>Gender :</td>
                                                   <td><a><?= $row->gender ?></a></td>
                                                  
                                              </tr>
                                               <tr>
                                                <td>Parmenent Address :</td>
                                                   <td><a><?= $row->parmenent_address ?></a></td>
                                                   
                                              </tr>
                                               <tr>
                                                <td>Taluko :</td>
                                                   <td><a><?= $row->taluko ?></a></td>
                                                   
                                              </tr>
                                               <tr>
                                                <td>District :</td>
                                                   <td><a><?= $row->district ?></a></td>
                                                   
                                              </tr>
                                               <tr>
                                                <td>Pin-Code :</td>
                                                   <td><a><?= $row->pin_code ?></a></td>
                                                   
                                              </tr>
                                              </tbody> 
                                           </table>
                                    </div>  
                                                          
                       </div>
              </div>
              
              <div class="tab-pane" id="settings"> 
              <div class="row">    
                                    <div class="col-lg-12 col-md-12">
                                         <table class="table table-responsive">
                                          <thead>
                                             <tr>
                                                <th>Vehicle Type</th>
                                                <th>Vehicle Name</th>
                                                <th>Vehicle Number</th>
                                                <th>Vehicle Status</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <?php
                                          $this->db->where("student_id",$row->id);
                                          $my=$this->db->get("vehicle_name");
                                          $myhh=$my->num_rows();
                                          if($myhh>0)
                                          {

                                          foreach ($my->result() as $myh) {
                                            
                                           ?>
                                      
                                        <tbody>
                                            
                                           <tr>
                                              <td><a><?= $myh->v_type ?></a></td>
                                              <td><a><?= $myh->v_name ?></a></td>
                                              <td><a><?= $myh->v_number ?></a></td>
                                              <td><a><?= $myh->v_status ?></a></td>
                                               <?php $file = FCPATH . 'vehicle/'. $myh->rc_book_photo; ?>
                                      <td>
                                                          <?php
                                      if($myh->rc_book_photo==NULL)
                                      {
                                      ?>
                                      <a><b>Please Upload RC</b></a>
                                    <?php }else{

                                      ?>
                                      <a class="btn btn-primary" href="<?= base_url()?>index.php/warden/view_student/download/<?php echo $file; ?>" >Download</a>
                                      <a class="btn btn-danger" href="<?= base_url() ?>index.php/warden/view_student/delete_vehicle?sid=<?= $row->id ?>" >Delete</a>
                                     <?php } ?></td>

                                           </tr>
                                         <?php } } ?>
                                        </tbody>
                                     </table>
                                    </div>  
                                                          
                       </div> 
              </div>

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
 
    </section>
    <?php } ?>
  </div>
    <?php $this->load->view('footer.php')?>

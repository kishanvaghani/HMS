<?php $this->load->view('store_student/sheader.php'); ?>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

<div class="osahan-breadcrumb">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#"><i class="icofont icofont-ui-home"></i> Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Student Regestration</a></li>
                    
                  </ol>
               </div>
            </div>
         </div>
 </div> 
<section class="shopping_cart_page">
         <div class="container">
            <div class="row">
               
               <div class="col-lg-8 col-md-8 mx-auto">
               <?php if($this->session->flashdata('flashSuccess'))
                {
                ?>
                <div class="alert alert-success" role="alert"> <?=$this->session->flashdata('flashSuccess')?> </div>
                <?php } ?>
                   
                  <div class="widget">
                      
                       <?php echo form_open('store_student/register_basic_details'); ?>
                        <div class="section-header">
                        <h5 class="heading-design-h5">
                            <strong>PERSONAL DETAILS</strong> 
                        </h5>
                     </div>
                      <?= validation_errors("<p style='color:red;'>","</p>") ?>
                        <div class="row">

                           <div class="col-md-6 mb-3">
                              <label for="validationCustom01" class="control-label">Student First Name<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control"  placeholder="Student Name" name="first_name" required>
                               
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom02" class="control-label">Student Middle Name<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control"  placeholder="Student Father Name" name="middle_name"  required>
                           </div>
                         </div>
                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom03" class="control-label">Student Last Name<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control"  placeholder="Student Surname" name="last_name"  required>  </div>
                           
                             <div class="col-md-6 mb-3">
                              <label for="validationCustom05" class="control-label">Mobile Number<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control"  placeholder="Mobile Number" name="mobile" required>
                              
                           </div>  
                        </div>
                         <div class="row">
                         
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom06" class="control-label">Email ID<span class="required">*</span></label>
                              <input type="email" class="form-control border-form-control"  placeholder="Email ID" name="email" required>   
                           </div>

                           

                            <div class="col-md-6 mb-3">
                               <fieldset class="form-group">
                              <label class="control-label" for="inlineFormCustomSelectPref">PH(Physically handicapped ?)</label><span class="required">*</span>

                              <select class="custom-select mb-2 mr-sm-2 mb-sm-0"  name="ph">
                                <option value disabled selected>--Is Physically Handicapped ?--</option>
                                <option>Yes</option>
                                <option>No</option>
                              </select>
                              </fieldset>  
                           </div>    
                          </div>
                           <div class="row">
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom05" class="control-label">Date of Birth<span class="required">*</span></label>
                              <input type="date" class="form-control border-form-control"  placeholder="Selelct D.O.B." name="dob" required>
                              
                           </div>
                            <div class="col-md-6 mb-3">
                              <label for="validationCustom01" class="control-label">Parent Mobile Number<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control"  placeholder="Parent Mobile Number" name="parent_mobile"  required>
                           </div>      
                          </div>
                           <div class="row">
                           <div class="col-md-6 mb-3">
                            <fieldset class="form-group">
                              <label class="control-label" for="inlineFormCustomSelectPref">Category</label><span class="required">*</span>
                             
                              <select class="custom-select mb-2 mr-sm-2 mb-sm-0"  name="category">
                                <option value disabled selected>--Select Category--</option>
                                <option>Open</option>
                                <option>OBC</option>
                                <option>SC/ST</option>
                                <option>SEBC</option> 
                              </select>
                              </fieldset>
                           </div>
                           <div class="col-md-6 mb-3">
                            <fieldset class="form-group">
                              <label class="control-label" for="inlineFormCustomSelectPref">Gender</label><span class="required">*</span>
                              <select class="custom-select mb-2 mr-sm-2 mb-sm-0"  name="gender">
                                <option value disabled selected>--Select Gender--</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                              </select>  
                           </fieldset>                          
                           </div>
                        </div>
                         <div class="row">
                           <div class="col-sm-12 mb-3">
                                 <label class="control-label" for="validationCustom01">Parmenent Address<span class="required">*</span></label>
                                 <textarea type="text" class="form-control border-form-control" placeholder="Parmenent Address" name="permenent_address"  required></textarea>   
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom03" class="control-label">Taluko<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control"  placeholder="Taluko" name="taluko"  required>  </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom01" class="control-label">District<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control"  placeholder="District" name="district"  required>
                           </div>     
                        </div>
                         <div class="row">
                           <div class="col-md-12 mb-3">
                              <label for="validationCustom03" class="control-label">Pin-Code<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control"  placeholder="Pin-Code" name="pin_code"  required>  </div>
                             
                        </div>
                        <br/>
                      <div class="section-header">
                        <h5 class="heading-design-h5">
                            <strong>ACADEMIC DETAILS</strong> 
                        </h5>
                     </div>
                         <div class="row">
                           <div class="col-md-6 mb-3">
                            <fieldset class="form-group">
                              <label class="control-label" for="validationCustom03">Select Department</label><span class="required">*</span>
                             
                              <select class="custom-select mb-2 mr-sm-2 mb-sm-0"  name="department">
                                <option value disabled selected>--Select Department--</option>
                                 <?php
                                  $department=$this->db->get('add_department');
                                  foreach($department->result() as $row)
                                  {
                                 ?>
                                   <option><?= $row->dept_name ?></option> 
                                  <?php } ?>
                              </select>
                              </fieldset>
                           </div>
                           <div class="col-md-6 mb-3">
                            <fieldset class="form-group">
                              <label  for="validationCustom03" class="control-label" >Select Current Semester</label><span class="required">*</span>
                              <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="semester">
                                <option value disabled selected>--Select Semester--</option>
                                <option value="1"> Semester 1</option>
                                <option value="2"> Semester 2</option>
                                <option value="3"> Semester 3</option>
                                <option value="4"> Semester 4</option>
                                <option value="5"> Semester 5</option>
                                <option value="6"> Semester 6</option>
                                <option value="7"> Semester 7</option>
                                <option value="8"> Semester 8</option>
                              </select>  
                           </fieldset>                          
                           </div>
                          </div>
                       
                       
                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom04" class="control-label">Enrollment Number<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control"  placeholder="Enrollment Number"name="enrollment"  required>
                           </div>  
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom01" class="control-label">Hostel Admission Date<span class="required">*</span></label>
                              <input type="date" class="form-control border-form-control"  placeholder="Enter Hostel Admission Date" name="admission_date"  required>
                           </div>     
                        </div>
                        <br/>
                         <div class="section-header">
                        <h5 class="heading-design-h5">
                            <strong>HOSTEL DETAILS</strong> 
                        </h5>
                     </div>
                        <div class="row">
                           <div class="col-md-12 mb-3">
                            <fieldset class="form-group">
                              <label class="control-label">Select Hostel</label><span class="required">*</span>   
                              <select id="hostel-list" class="custom-select mb-2 mr-sm-2 mb-sm-0"  name="hostel_name">
                                <option value disabled selected>--Select Hostel--</option>
                                 <?php
                                  $hostel=$this->db->get('hostel_details');
                                  foreach($hostel->result() as $row)
                                  {
                                 ?>
                                   <option value="<?= $row->id ?>"><?= $row->hostel_name ?></option> 
                                  <?php } ?>
                              </select>
                              </fieldset>
                           </div>
                          </div>
                          <div class="row">
                           <div class="col-md-6 mb-3">
                            <fieldset class="form-group">
                              <label  class="control-label" >Select Floor</label><span class="required">*</span>
                              <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="floor-list" name="floor_name">
                                <option value="">--Select Hostel Floor--</option> 
                              </select>  
                           </fieldset>                          
                           </div>
                           <div class="col-md-6 mb-3">
                              <fieldset class="form-group">
                              <label  class="control-label" >Select Room Number</label><span class="required">*</span>
                              <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="room-list" name="room_number">
                                <option value="">--Select Room Number--</option> 
                              </select>  
                           </fieldset>
                           </div>
                          </div>
                     <div class="section-header">
                        <h5 class="heading-design-h5">
                            <strong>SET PASSWORD</strong> 
                        </h5>
                     </div> 
                         <div class="row">
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom05" class="control-label">Password<span class="required">*</span></label>
                              <input type="password" class="form-control border-form-control"  placeholder="Password" name="password"  required>
                              
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom06" class="control-label">Confirm Password<span class="required">*</span></label>
                              <input type="password" class="form-control border-form-control"  placeholder="Confrim Password" name="rpassword"  required>
                              
                           </div>
                           
                        </div>
                        
                         <br/>
                        
                         <div class="row">
                           <div class="col-sm-12 text-right">
                         
                              <button type="submit" class="btn btn-outline-success btn-lg" value="Register" name="submit">Register</button>
                              
                           </div>
                        </div>
                         <div class="row">
                           <div class="col-sm-12 text-right">
                            <p class="mb-0">Already have an account? <a class="text-danger" href="<?= base_url() ?>index.php/store_student/stu_login">Log in</a></p>
                           </div>
                        </div>                        
                        </div>
                     
                     <?php echo form_close(); ?>
                    
                  </div>
               </div>


              
            </div>
         </div>
      </section>


<script>
 $(document).ready(function()
 {
   $('#hostel-list').on('change', function() {
    var myhostel=$(this).val();

   $.ajax({
  type: "GET",
  url: "<?= base_url() ?>index.php/store_student/getFloor",
  dataType: 'json',
  data: {hostel_id:myhostel},
  success: function(data){
    $("#floor-list").html(data.showdata);
  }
  });
});
});

$(document).ready(function()
 {
   $('#floor-list').on('change', function() {
    var myfloor=$(this).val();
    var doc = $('#hostel-list').val();
   $.ajax({
  type: "GET",
  url: "<?= base_url() ?>index.php/store_student/getRoom",
  dataType: 'json',
  data: {floor_id:myfloor,hostel_id:doc},
  success: function(data){
    $("#room-list").html(data.showdata);
  }
  });
});
});



</script>
      

     <?php $this->load->view('store_student/sfooter.php'); ?>
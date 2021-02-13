

      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
      <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    
         <script type='text/javascript'>
         function displayForm(c) {
             if (c.value == "1") {    
                 document.getElementById("sciboard").disabled = false;
                 document.getElementById("scischoll").disabled = false;
                 document.getElementById("sciyear").disabled = false;
                 document.getElementById("sciresult").disabled = false;
                  document.getElementById("dipbranch").disabled = true;
                 document.getElementById("dipcollege").disabled = true;
                 document.getElementById("dipyear").disabled = true;
                 document.getElementById("dipresult").disabled = true;

             }
                 if (c.value == "2") {
                document.getElementById("dipbranch").disabled = false;
                 document.getElementById("dipcollege").disabled = false;
                 document.getElementById("dipyear").disabled = false;
                 document.getElementById("dipresult").disabled = false;
                 document.getElementById("sciboard").disabled = true;
                 document.getElementById("scischoll").disabled = true;
                 document.getElementById("sciyear").disabled = true;
                 document.getElementById("sciresult").disabled = true;
             }
         };
         </script>
        

        

     

   <?php $this->load->view('student/sheader.php'); ?>

<section class="top-brands">
         <div class="container">
             
             <div class="row">
               <div class="col-lg-8 col-md-8 mx-auto">
                   <h5 class="heading-design-h5">Register Now!</h5>
                  <div class="widget">
                      
                       <?php echo form_open('store_student/register'); ?>
                        <div class="section-header">
                        <h5 class="heading-design-h5">
                           BASIC DETAILS 
                        </h5>
                     </div>
                      <?= validation_errors("<p style='color:red;'>","</p>") ?>
                        <div class="row">

                           <div class="col-md-6 mb-3">
                              <label for="validationCustom01" class="control-label">Student Surname<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control" id="validationCustom01" placeholder="Surname" name="stu_surname" value="<?= $stu_surname?>" required>
                               
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom02" class="control-label">Student Name<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control" id="validationCustom02" placeholder="Student name" name="stu_name" value="<?= $stu_name ?>"  required>
                               
                              
                           </div>

                        </div>
                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom03" class="control-label">Father Name<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control" id="validationCustom03" placeholder="Father Name" name="stu_father_name" value="<?= $stu_father_name ?>" required>
                               
                              
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom04" class="control-label">Enrollment Number<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control" id="validationCustom04" placeholder="Enrollment Number"name="stu_enroll" value="<?= $stu_enroll ?>"  required>
                           </div>
                          
                           
                        </div>
                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom05" class="control-label">Mobile Number<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control" id="validationCustom05" placeholder="Mobile Number" name="stu_mobile" value="<?= $stu_mobile ?>" required>
                              
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom06" class="control-label">Email ID<span class="required">*</span></label>
                              <input type="email" class="form-control border-form-control" id="validationCustom06" placeholder="Email ID" name="stu_email" value="<?= $stu_email ?>" required>
                              
                           </div>
                           
                        </div>
                         <fieldset class="form-group">
                              <label class="mr-sm-2" for="inlineFormCustomSelectPref">Select College</label><span class="required">*</span>
                               mm<?= $stu_college ?>
                              <select class="custom-select mb-2 mr-sm-2 mb-sm-0"  name="stu_college" id="sel_college">
                                 <option>--Select College--</option>

                                <?php foreach ($college_list->result() as $row)  
                                {
                                ?>
                                  
                                   <option value="<?php echo $row->college_name;?>" <?php if (!empty($stu_college) && $stu_college=='<?p= $row->college_name;?>')  echo 'selected = "selected"'; ?> ><?php echo $row->college_name;?>  </option>
                                 <?php } ?>
                              </select>
                              
                            </fieldset>
                             <fieldset class="form-group">
                              <label class="mr-sm-2" for="inlineFormCustomSelectPref">Select Department</label><span class="required">*</span>
                              <select class="custom-select mb-2 mr-sm-2 mb-sm-0"  name="stu_department" id="sel_department">
                                 <option>--Select Department--</option>
                                
                              </select>
                              
                            </fieldset>
                         <div class="row">
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom05" class="control-label">Password<span class="required">*</span></label>
                              <input type="password" class="form-control border-form-control" id="validationCustom05" placeholder="Password" name="stu_password"  required>
                              
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom06" class="control-label">Confirm Password<span class="required">*</span></label>
                              <input type="password" class="form-control border-form-control" id="validationCustom06" placeholder="Confrim Password" name="stu_confirm_password"  required>
                              
                           </div>
                           
                        </div>
                        <div class="section-header">
                        <h5 class="heading-design-h5">
                           PERSONAL DETAILS 
                        </h5>
                     </div>
                     <div class="row">

                           <div class="col-md-6 mb-3">
                              <label for="validationCustom01" class="control-label">Alternate Mobile Number<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control" id="validationCustom01" placeholder="Alternate Mobile Number" name="stu_alternate_mobile" value="<?= $stu_alternate_mobile ?>" required>
                             
                           </div>
                           <div class="col-md-6 mb-3" >
                              <label for="validationCustom02" class="control-label">Category<span class="required">*</span></label>
                              <select name="stu_category"  class="select2 form-control border-form-control">                                                                     
                                   <option value="General" <?php if (!empty($stu_category) && $stu_category == 'General')  echo 'selected = "selected"'; ?>>General</option>
                                    <option value="SEBC" <?php if (!empty($stu_category) && $stu_category == 'SEBC')  echo 'selected = "selected"'; ?>>SEBC</option>

                                    <option value="SC" <?php if (!empty($stu_category) && $stu_category == 'SC')  echo 'selected = "selected"'; ?>>SC</option>  
                                    <option value="ST" <?php if (!empty($stu_category) && $stu_category == 'ST')  echo 'selected = "selected"'; ?>>ST</option>                             
                                 </select>                         
                           </div>

                        </div>
                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom01" class="control-label">Date Of Birth<span class="required">*</span></label>
                              <input type="date" class="form-control border-form-control" id="validationCustom01" placeholder="Surname" name="stu_dob" value="<?= $stu_dob ?>" required>                             
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom02" class="control-label">Gender<span class="required">*</span></label>
                                <select name="stu_gender" class="select2 form-control border-form-control">
                                  <option value="Male" <?php if (!empty($stu_gender) && $stu_gender == 'Male')  echo 'selected = "selected"'; ?>>Male</option> 
                                     <option value="Female" <?php if (!empty($stu_gender) && $stu_gender == 'Female')  echo 'selected = "selected"'; ?>>Female</option> 
                                      <option value="Other" <?php if (!empty($stu_gender) && $stu_gender == 'Other')  echo 'selected = "selected"'; ?>>Other</option>                                    
                                 </select>                                                             
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom02" class="control-label">PH<span class="required">*</span></label>
                               <div class="col-auto">
                                 <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                 <input type="radio" class="custom-control-input" name="stu_ph" value="YES"  <?php if($stu_ph=='YES') echo 'checked'; ?>>
                                 <span class="custom-control-indicator"></span>
                                 <span class="custom-control-description">YES</span>
                                 </label>
                                 <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                 <input type="radio" class="custom-control-input" value="NO" name="stu_ph"  <?php if($stu_ph=='NO' || $stu_ph=='') echo 'checked'; ?> >
                                 <span class="custom-control-indicator"></span>
                                 <span class="custom-control-description">NO</span>
                                 </label>
                              </div>
                           </div>   
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom02" class="control-label">Minority<span class="required">*</span></label>
                              <div class="col-auto">
                                 <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                 <input type="radio" class="custom-control-input" value="YES" name="stu_minority"  <?php if($stu_minority=='YES') echo 'checked'; ?>>
                                 <span class="custom-control-indicator"></span>
                                 <span class="custom-control-description">YES</span>
                                 </label>
                                 <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                 <input type="radio" class="custom-control-input" value="NO" name="stu_minority" <?php if($stu_minority=='NO' || $stu_minority=='') echo 'checked'; ?> >
                                 <span class="custom-control-indicator"></span>
                                 <span class="custom-control-description">NO</span>
                                 </label>
                              </div>
                           </div>                           
                        </div>  
                         <div class="row">
                           <div class="col-md-12 mb-12">
                               <label for="validationCustom02" class="control-label">Address<span class="required">*</span></label>
                                <textarea name="stu_address" class="form-control border-form-control"><?= $stu_address?></textarea>
                           </div>
                        </div><br/>
                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom05" class="control-label">District<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control" id="validationCustom05" placeholder="District Name" name="stu_district" value="<?= $stu_district ?>" required>                              
                           </div>
                           <div class="col-md-6 mb-3">
                              <label  class="control-label">Pin Code<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control"  placeholder="Pin Code" name="stu_pincode" value="<?= $stu_pincode ?>" required>                              
                           </div>                           
                        </div>
                        <br/>
                        <div class="section-header">
                        <h5 class="heading-design-h5">
                           10th RESULT 
                        </h5>
                        </div>

                         <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Medium<span class="required">*</span></label>
                               <select  class="select2 form-control border-form-control" name="stu_10th_medium" value="<?= $stu_10th_medium ?>">
                                   <option value="Gujarati" >Gujarati</option>
                                    <option value="English" >English</option>
                                    <option value="SC" >Hindi</option> 
                                    <option value="SC" >Other</option> 
                              </select>                             
                           </div>
                           <div class="col-md-3 mb-3">
                              <label  class="control-label">Board Name<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control" placeholder="Board Name" name="stu_10th_board" value="<?= $stu_10th_board ?>" required>                              
                           </div> 
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Result(%)<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control" placeholder="Result" name="stu_10th_result" value="<?= $stu_10th_result ?>" required>                              
                           </div>
                           <div class="col-md-3 mb-3">
                              <label  class="control-label">Passing Year<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control"  placeholder="Passing Year" name="stu_10th_passing" value="<?= $stu_10th_passing ?>" required>                              
                           </div>                           
                        </div>
                        <div class="section-header">
                        <h5 class="heading-design-h5">
                           12th/DIPLOMA RESULT 
                        </h5>
                        </div>

                        
    

                           <label class="custom-control custom-radio">
                           <input value="1"  onClick="displayForm(this)" type="radio"  class="custom-control-input" name="science" <?php if($science=='1') echo 'checked';?>>
                           <span class="custom-control-indicator"></span>
                           <span class="custom-control-description">12th RESULT</span>
                           </label>
                  
       
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label  class="control-label">BOARD NAME<span class="required">*</span></label>
                               <input type="text" class="form-control border-form-control" id="sciboard"  placeholder="Board Name" name="stu_12th_board" value="<?= $stu_12th_board ?>" <?php if($science!='1') echo 'disabled'; ?>>                             
                           </div>
                           <div class="col-md-3 mb-3">
                              <label  class="control-label">SCHOOL NAME<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control" id="scischoll"  placeholder="School Name" name="stu_12th_school" value="<?= $stu_12th_school ?>" <?php if($science!='1') echo 'disabled'; ?>>                              
                           </div> 
                           <div class="col-md-3 mb-3">
                              <label  class="control-label">Result(%)<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control" id="sciresult" placeholder="Result" name="stu_12th_result" value="<?= $stu_12th_result ?>" <?php if($science!='1') echo 'disabled'; ?>>                              
                           </div>
                           <div class="col-md-3 mb-3">
                              <label  class="control-label">Passing Year<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control" id="sciyear" placeholder="Passing Year" name="stu_12th_passing" value="<?= $stu_12th_passing ?>" <?php if($science!='1') echo 'disabled'; ?>>                              
                           </div>                           
                        </div>
                  
                   <label class="custom-control custom-radio">
                     <input value="2" type="radio"  onClick="displayForm(this)"  class="custom-control-input" name="science" <?php if($science=='2') echo 'checked';?>>
                     <span class="custom-control-indicator"></span>
                     <span class="custom-control-description">DIPLOMA RESULT</span>
                     </label>
                  
                       
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label  class="control-label">BRANCH NAME<span class="required">*</span></label>
                              <input type="text" name="stu_diploma_branch" value="<?= $stu_diploma_branch ?>" class="form-control border-form-control"  placeholder="Branch Name" id="dipbranch" <?php if($science!='2') echo 'disabled'; ?>>                             
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label">COLLEGE NAME<span class="required">*</span></label>
                              <input type="text" name="stu_diploma_college" value="<?= $stu_diploma_college ?>" class="form-control border-form-control"  placeholder="College Name" id="dipcollege" <?php if($science!='2') echo 'disabled'; ?>>                              
                           </div> 
                           <div class="col-md-3 mb-3">
                              <label  class="control-label">Result(CGPA)<span class="required">*</span></label>
                              <input type="text" name="stu_diploma_result" value="<?= $stu_diploma_result ?>" id="dipresult" class="form-control border-form-control"  placeholder="Result" <?php if($science!='2') echo 'disabled'; ?>>                              
                           </div>
                           <div class="col-md-3 mb-3">
                              <label  class="control-label">Passing Year<span class="required">*</span></label>
                              <input type="text" name="stu_diploma_passing" value="<?= $stu_diploma_passing ?>" class="form-control border-form-control" 
                               placeholder="Passing Year" id="dipyear" <?php if($science!='2') echo 'disabled'; ?>>                              
                           </div>                           
                        </div>
        
                  

    
                    <br/>
                        
                         <button type="submit" class="btn btn-lg btn-theme-round btn-block" value="Sturegister" name="submit">Create Your Account</button>
                        </div>

                        
                     <?php echo form_close(); ?>
                    
                  </div>
               </div>
            </div>
            
         </div>
      </section>

 <!-- Script -->
  

  <script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url();?>";
 
  $(document).ready(function(){
 
     // City change
    $('#sel_college').change(function(){
      var college = $(this).val();

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>store_student/fetch_department',
        method: 'post',
        data: {college: college},
        dataType: 'json',
        success: function(response){
       
          $('#sel_department').find('option').not(':first').remove();
        
          $('#sel_department').append(response.myview);
         
        }
     });
   });
 
 });
 </script>
 

<?php $this->load->view('student/sfooter.php'); ?>
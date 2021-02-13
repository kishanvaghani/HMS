  <?php $this->load->view('header.php')?>
  <div class="content-wrapper" >
<section class="element_page">
         <div class="container">
            <div class="row">      
               <div class="col-lg-9 col-md-9">
                  <div class="widget h-100">
                     <div class="section-header">
                        <h5 class="heading-design-h5">
                           STUDENT PROFILE 
                        </h5>
                     </div>
                     
                       <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                          <table  class="table table-sm">
                                             <tbody>
                                              <?php
                                                  
                                                  foreach($sdata->result() as $row)
                                                  {
                                                 ?>
                                               <tr>
                                                <th></th>
                                              </tr>  
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
                                            <?php  } ?>
                                            </tbody>
                                           </table>
                                    </div>  
                                     <div class="col-sm-12 text-right">
                                        <button type="button" class="btn btn-outline-success btn-lg"> VERIFY </button>
                                     </div>                     
                       </div> 
                  </div>
                </div>
      </div>       
    </div>
  </section>
 </div>
  

  <!-- Content Wrapper. Contains page content -->
   

<?php $this->load->view('footer.php')?>
   
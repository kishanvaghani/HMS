<?php $this->load->view('sheader.php'); ?>

   <div class="owl-carousel owl-carousel-slider">
         <div class="item">
            <a href="#"><img class="d-block img-fluid" src="<?= base_url()?>images/slider/ss1.jpg" alt="First slide"></a>
         </div>
         <div class="item">
            <a href="#"><img class="d-block img-fluid" src="<?= base_url()?>images/slider/ss2.jpg" alt="First slide"></a>
         </div>
         <div class="item">
            <a href="#"><img class="d-block img-fluid" src="<?= base_url()?>images/slider/ss3.jpg" alt="First slide"></a>
         </div>
         
      </div>

       <marquee direction="left" scrollamount="10">
        <p style="color:blue"><h3> <strong>  </strong> </h3> </p>
       </marquee>

      <section class="element_page">
         <div class="container">
            <div class="row">            
               <div class="col-lg-12 col-md-12">
                  <div class="widget">
                     <div class="section-header">
                        <h5 class="heading-design-h5">
                          LATEST NEWS AND NOTIFICATIONS
                        </h5>
                     </div>                  
                     <div class="row">
                        <div class="col-lg-12 col-md-12" style="max-height: 400px; overflow-y: auto;">
                           <div class="card border-primary">                             
                              <div class="card-body text-primary" > 

                                 
                              <marquee direction="up" scrollamount="2">                              
                                 
                                  <?php 
                                $this->db->where('status','A');
                                $off=$this->db->get('student_data');
                                 foreach($off->result() as $row)
                                {
                                
                                ?>
                                
                                 <p><i class="fa fa-hand-o-right"></i> <a href="#"><?= $row->first_name ?> </a><span class="badge badge-danger">NEW</span></p>

                                 <?php } ?>
                                 

                              </marquee>
                           

                              </div>

                           </div>
                        </div>                                              
                     </div>
                     <br>                                
                  </div>
               </div>
            </div>
         </div>
      </section>
       
<script type="text/javascript">
  $(document).ready(function(){
     $.ajax({  
                url:"<?= base_url() ?>user_website/counter",  
                method:"POST",    
                
           }); 
});
</script>
 

<?php $this->load->view('sfooter.php');?>
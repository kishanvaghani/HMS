
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Osahan Fashion - Bootstrap 4 E-Commerce Theme">
      <meta name="keywords" content="Osahan, fashion, Bootstrap4, shop, e-commerce, modern, flat style, responsive, online store, business, mobile, blog, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
      <meta name="author" content="Askbootstrap">
      <title>Training and Placement Cell</title>
      <!-- Favicon Icon -->
      <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>images/apple-icon.png">
      <link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/favicon.png">
      <!-- Bootstrap core CSS -->
      <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>css/animate.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>css/animate.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>css/mobile.css" rel="stylesheet">
      <!-- Font Icons -->

      <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url(); ?>css/icofont.css" rel="stylesheet" type="text/css">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/owl-carousel/owl.theme.css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
     

   </head>
   <body>
     
     
      <nav class="navbar navbar-expand-lg navbar-light bg-faded osahan-menu">
         <div class="container">
            <a class="navbar-brand" href="index.html"> <h1><strong>TPO CELL</strong></h1></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="navbar-nav mr-auto mt-2 mt-lg-0 margin-auto">
                  <li class="nav-item dropdown active">
                     <a class="nav-link" href="<?= base_url()?>student">
                     <i class="icofont icofont-ui-home"></i> Home <span class="sr-only">(current)</span>
                     </a>
                     
                  </li>
                
                 <li class="nav-item">
                     <a class="nav-link" href="<?= base_url()?>student/abouttpo">About Us</a>
                  </li>

                   <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     COMPANIES
                     </a>
                     <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= base_url() ?>student/placementcompanies"><i class="fa fa-angle-right" aria-hidden="true"></i> Companies for Placements </a>
                        <a class="dropdown-item" href="<?= base_url() ?>student/joinwithus"><i class="fa fa-angle-right" aria-hidden="true"></i> Join with US </a>
                       
                       
                     </div>
                  </li>
                  
                   <li class="nav-item">
                     <a class="nav-link" href="<?= base_url()?>student/downloads">Downloads</a>
                  </li>
                   <li class="nav-item">
                     <a class="nav-link" href="<?= base_url()?>student/contactus">Contact Us</a>
                  </li>
               </ul>

            </div>
         </div>
      </nav>
     
     


 <div class="osahan-breadcrumb">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#"><i class="icofont icofont-ui-home"></i> Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Department Login</a></li>
                    
                  </ol>
               </div>
            </div>
         </div>
      </div>


<section class="login_page">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-6 mx-auto">
                  <div class="widget">
                     <div class="login-modal-right">
                        <!-- Tab panes -->
                        <div class="tab-content">
                           <div class="tab-pane active" id="login" role="tabpanel">
                              <h5 class="heading-design-h5">Department Login</h5>
                              <form method="post" action="<?= base_url()?>index.php/store_student/stu_login">
                                 <?= validation_errors("<p style='color:red;'>","</p>") ?>
                               
                        <?php if($this->session->flashdata('flashSuccess'))
                            {
                            ?>
                            <div class="alert alert-danger" role="alert"> <?=$this->session->flashdata('flashSuccess')?> </div>
                            <?php } ?>
                              <fieldset class="form-group">
                                 <label for="formGroupExampleInput">Enter User Name</label><span class="required">*</span>
                                 <input type="text" class="form-control" id="formGroupExampleInput" placeholder="150310116022" name="stu_enroll">
                              </fieldset>
                              <fieldset class="form-group">
                                 <label for="formGroupExampleInput2">Enter Password</label><span class="required">*</span>
                                 <input type="password" name="stu_password" class="form-control" id="formGroupExampleInput2" placeholder="********">
                              </fieldset>
                              
                              <fieldset class="form-group">
                                 <button type="submit" class="btn btn-lg btn-theme-round btn-block" value="Stulogin" name="submit">Enter to Department</button>
                              </fieldset>

                                
                             
                           </div>
                        </div>
                        <div class="clearfix"></div>
                       
                     </div>
                  </div>
                  <br><br>
                  
               </div>
            </div>
         </div>
      </section>
      <?php include('sfooter.php') ?>
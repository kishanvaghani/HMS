<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Osahan Fashion - Bootstrap 4 E-Commerce Theme">
      <meta name="keywords" content="Osahan, fashion, Bootstrap4, shop, e-commerce, modern, flat style, responsive, online store, business, mobile, blog, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
      <meta name="author" content="Askbootstrap">
      <title>LE College Hostel, Morbi</title>
      <!-- Favicon Icon -->
      <link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon.png">
      <link rel="icon" type="image/png" href="images/favicon.png">
      <!-- Bootstrap core CSS -->
      <link href="<?php echo base_url(); ?>admindata2/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="<?php echo base_url(); ?>admindata2/css/style.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>admindata2/css/animate.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>admindata2/css/animate.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>admindata2/css/mobile.css" rel="stylesheet">
      <!-- Font Icons -->
      <link href="<?php echo base_url(); ?>admindata2/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url(); ?>admindata2/css/icofont.css" rel="stylesheet" type="text/css">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>admindata2/plugins/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>admindata2/plugins/owl-carousel/owl.theme.css">
   </head>
   <body>
       <nav class="navbar navbar-expand-lg navbar-light bg-faded osahan-menu">
         <div class="container">
            <a class="navbar-brand" href="homepage"> <h1><strong>LEC HOSTEL</strong></h1></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="navbar-nav mr-auto mt-2 mt-lg-0 margin-auto">
                  <li class="nav-item dropdown
                  ">
                     <a class="nav-link" href="<?= base_url()?>index.php/store_student/homepage">
                     <i class="icofont icofont-ui-home"></i> Home <span class="sr-only">(current)</span>
                     </a>   
                  </li>
                 <li class="nav-item">
                     <a class="nav-link" href="<?= base_url()?>student/abouttpo">Hostel Admission</a>
                  </li>

                   <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hostel
                     </a>
                     <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= base_url() ?>student/placementcompanies"><i class="fa fa-angle-right" aria-hidden="true"></i>NVP Hostel </a>
                        <a class="dropdown-item" href="<?= base_url() ?>student/joinwithus"><i class="fa fa-angle-right" aria-hidden="true"></i> D Hostel </a>
                         <a class="dropdown-item" href="<?= base_url() ?>student/joinwithus"><i class="fa fa-angle-right" aria-hidden="true"></i> A Hostel </a>
                          <a class="dropdown-item" href="<?= base_url() ?>student/joinwithus"><i class="fa fa-angle-right" aria-hidden="true"></i> New Hill Hostel </a>
                       
                       
                     </div>
                  </li>
                  
                   <li class="nav-item">
                     <a class="nav-link" href="<?= base_url()?>student/downloads">Downloads</a>
                  </li>
                   <li class="nav-item active">
                     <a class="nav-link" href="<?= base_url()?>index.php/store_student/aboutus">Contact Us</a>
                  </li>
               </ul>
                  <div class="my-2 my-lg-0">
                  <ul class="list-inline main-nav-right">
                    <?php
                    if(!$this->session->userdata('student_logged_in'))
                    {
                    ?>
                     <li class="list-inline-item dropdown osahan-top-dropdown">
                        <a class="btn btn-primary" href="<?= base_url()?>index.php/store_student/stu_login" >
                       STUDENT SIGN IN
                        </a>
                        
                     </li>
                    <li class="list-inline-item dropdown osahan-top-dropdown">
                        <a class="btn btn-primary" href="<?= base_url()?>index.php/store_student/warden_login" >
                        WARDEN SIGN IN
                        </a>
                        
                     </li>
                   <?php }else
                   {
                  ?>
                  <li class="list-inline-item dropdown osahan-top-dropdown">
                        <a class="btn btn-primary" href="<?= base_url()?>index.php/store_student/dashboard" >
                      MY PROFILE
                        </a>
                        
                     </li>
                    <li class="list-inline-item dropdown osahan-top-dropdown">
                        <a class="btn btn-primary" href="<?= base_url()?>index.php/store_student/student_logout" >
                        LOGOUT
                        </a>
                        
                     </li>
                   <?php }
                  ?>
                  </ul>
               </div>

               

            </div>
         </div>
      </nav>


      <section class="our-team-main">
         <div class="container">
            <div class="section-header section-header-center text-center">
               <h3 class="heading-design-center-h3">
                  Our Team
               </h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque<br> lobortis tincidunt est, et euismod purus suscipit quis. Etiam euismod ornare elementum. </p>
               <br>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-lg-3 col-md-3">
                        <div class="our-team widget">
                           <div class="team_img">
                              <img src="<?php echo base_url(); ?>admindata2/images/men/small/2.jpg">
                              <ul class="social">
                                 <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                 <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                 <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                 <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                              </ul>
                           </div>
                           <div class="team-content">
                              <h3 class="title">Osahan</h3>
                              <span class="post">CEO</span>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-3">
                        <div class="our-team widget">
                           <div class="team_img">
                              <img src="<?php echo base_url(); ?>admindata2/images/men/small/1.jpg">
                              <ul class="social">
                                 <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                 <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                 <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                 <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                              </ul>
                           </div>
                           <div class="team-content">
                              <h3 class="title">Jon Sam</h3>
                              <span class="post">web developer</span>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-3">
                        <div class="our-team widget">
                           <div class="team_img">
                              <img src="<?php echo base_url(); ?>admindata2/images/men/small/4.jpg">
                              <ul class="social">
                                 <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                 <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                 <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                 <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                              </ul>
                           </div>
                           <div class="team-content">
                              <h3 class="title">Deep Shan</h3>
                              <span class="post">Marketing Manager</span>
                           </div>
                        </div>
                     </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="our-team widget">
                           <div class="team_img">
                              <img src="<?php echo base_url(); ?>admindata2/images/men/small/4.jpg">
                              <ul class="social">
                                 <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                 <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                 <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                 <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                              </ul>
                           </div>
                           <div class="team-content">
                              <h3 class="title">Deep Shan</h3>
                              <span class="post">Marketing Manager</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
               <div class="row">
               <div class="col-md-12">
                  <div class="row">
                      <div class="col-lg-3 col-md-1">
                        <div class="our-team widget">
                           <div class="team_img">
                              <img src="<?php echo base_url(); ?>admindata2/images/men/small/4.jpg">
                              <ul class="social">
                                 <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                 <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                 <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                 <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                              </ul>
                           </div>
                           <div class="team-content">
                              <h3 class="title">Deep Shan</h3>
                              <span class="post">Marketing Manager</span>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-3">
                        <div class="our-team widget">
                           <div class="team_img">
                              <img src="<?php echo base_url(); ?>admindata2/images/men/small/4.jpg">
                              <ul class="social">
                                 <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                 <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                 <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                 <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                              </ul>
                           </div>
                           <div class="team-content">
                              <h3 class="title">Deep Shan</h3>
                              <span class="post">Marketing Manager</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      
     <?php include('sfooter.php') ?>
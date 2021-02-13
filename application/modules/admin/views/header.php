<!DOCTYPE html>
<html>
<head>
  <?php

  if(isset($this->session->userdata['login']))
  {

  }else
  {
    redirect('admin/login');
  }
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LEC | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata/dist/css/skins/_all-skins.min.css">


   <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata/bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>admindata/bower_components/select2/dist/css/select2.min.css">
   <link rel="icon" type="image/gif/png" href="<?= base_url()?>images/l.ico">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>LEC</b>HMS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>LEC - </b>HMS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
            
          <li class="dropdown user user-menu">
    
          </li>
          
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
         <div class="pull-left image">
          <img src="<?= base_url() ?>admindata/dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info" align="center">
          <p>Welcome - <?php echo $this->session->userdata['login']['rname'] ?></p>
        </div>
      </div>
      <!-- search form -->
       
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?= base_url()?>index.php/admin/home/index">
            <i class="fa fa-home"></i> <span>Home</span>
         </a>
         </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>College Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url()?>index.php/admin/manage_college"><i class="fa fa-circle-o"></i> Manage College</a></li>
            <li><a href="<?= base_url()?>index.php/admin/manage_college/view_college"><i class="fa fa-circle-o"></i> View College</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Warden Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url()?>index.php/admin/manage_warden"><i class="fa fa-circle-o"></i> Manage Warden</a></li>
            <li><a href="<?= base_url()?>index.php/admin/manage_warden/view_warden"><i class="fa fa-circle-o"></i> View Warden</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Warden Allocation</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url()?>index.php/admin/warden_allocation"><i class="fa fa-circle-o"></i> Manage Warden Allocation</a></li>
            <li><a href="<?= base_url()?>index.php/admin/warden_allocation/view_allocation"><i class="fa fa-circle-o"></i> View Warden Allocation</a></li>
          </ul>
        </li>
         <li>
               <a href="<?= base_url()?>index.php/admin/manage_department">
                <i class="fa fa-user-secret"></i> <span>Add Department</span>
              </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Hostel Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url()?>index.php/admin/manage_hostel"><i class="fa fa-circle-o"></i> Manage Hostel</a></li>
            <li><a href="<?= base_url()?>index.php/admin/manage_hostel/view_hostel"><i class="fa fa-circle-o"></i> View Hostel</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Student Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--<li><a href="<?= base_url()?>index.php/admin/View_hostel_room/view_room"><i class="fa fa-circle-o"></i> Manage Students</a></li> -->
            <li><a href="<?= base_url()?>index.php/admin/Manage_student/view_student"><i class="fa fa-circle-o"></i> View Students</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Complaint</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Manage Complaint</a></li> -->
            <li><a href="<?= base_url()?>index.php/admin/Manage_complain/view_complain"><i class="fa fa-circle-o"></i> View Complaint</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Manage Fees</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url()?>index.php/admin/manage_fees/upload_fees"><i class="fa fa-circle-o"></i> Upload Fees Data</a></li>
            <li><a href="<?= base_url()?>index.php/admin/manage_fees/view_fees"><i class="fa fa-circle-o"></i> View Fees Data</a></li>
            <li><a href="<?= base_url()?>index.php/admin/manage_fees/view_setting"><i class="fa fa-gears"></i> Setting</a></li>
            <li><a href="<?= base_url()?>index.php/admin/Tsem/view_transfer"><i class="fa fa-circle-o"></i> Transfer Semester</a></li>
          </ul>
        </li>
        <li>
          <a href="<?= base_url()?>index.php/admin/aboutus">
            <i class="fa fa-suitcase"></i> <span>About Us</span>
           </a>
         </li>
         <li>
          <a href="<?= base_url()?>index.php/admin/login/logout">
            <i class="fa fa-power-off"></i> <span>Logout</span>
           </a>
         </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<?php
   session_start();
     include("dbconfig.php");
   extract($_REQUEST);
   $email=$_SESSION["email"];
   //echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

   //$role = $_SESSION["role"];
   $timeout = 100; // Set timeout minutes
   //$logout_redirect_url = "../index.php"; // Set logout URL
   
   $timeout = $timeout * 60; // Converts minutes to seconds
   if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
      echo "<script>window.location.assign('dashboard.php')</script>";
    }
    else
   {
     $_SESSION['start_time'] = time();
    }
   }
   
   if(!isset($_SESSION['email']))
   {
   header("location:login.html");
   }
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Prediction | Dashboard</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.6 -->
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
      <!-- Morris chart -->
      <link rel="stylesheet" href="plugins/morris/morris.css">
      <!-- jvectormap -->
      <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
      <!-- Date Picker -->
      <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
         <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
               <!-- mini logo for sidebar mini 50x50 pixels -->
               <span class="logo-mini"><b>P</b>di</span>
               <!-- logo for regular state and mobile devices -->
               <span class="logo-lg"><b>Prediction</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
               <!-- Sidebar toggle button-->
               <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
               <span class="sr-only">Toggle navigation</span>
               </a>
               <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                     <!-- ser Account: style can be found in dropdown.less -->
                     <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs">Prediction</span>
                        </a>
                        <ul class="dropdown-menu">
                           <!-- User image -->
                           <li class="user-header">
                              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                              <p>
                                 <?php echo $email;?>
                              </p>
                           </li>
                           <!-- Menu Footer-->
                           <li class="user-footer">
                              <div class="pull-right">
                                 <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                              </div>
                           </li>
                        </ul>
                     </li>
                     <!-- Control Sidebar Toggle Button -->
                  </ul>
               </div>
            </nav>
         </header>
         <!-- Left side column. contains the logo and sidebar -->
         <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
               <!-- Sidebar user panel -->
               <div class="user-panel">
                  <div class="pull-left image">
                     <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                  </div>
                  <div class="pull-left info">
                     <p><?=$email;?></p>
                     <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                  </div>
               </div>
               <!-- sidebar menu: : style can be found in sidebar.less -->
               <ul class="sidebar-menu">
                  <li class="header">MAIN NAVIGATION</li>
                  <li>
                     <a href="dashboard.php">
                     <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                     </a>
                  </li>
                  <li class="active treeview" >
                     <a href="myProfile.php">
                     <i class="fa fa-user"></i> <span>User Profile</span>
                     </a>
                  </li>
                  <li>
                     <a href="data.php">
                     <i class="fa fa-database"></i> <span>DATA</span>
                     </a>
                  </li>
                  <li>
                     <a href="http://127.0.0.1:5000/">
                     <i class="fa fa-th"></i> <span>Prediction</span>
                     </a>
                  </li>
               </ul>
            </section>
            <!-- /.sidebar -->
         </aside>
         <?php extract($_REQUEST);?>
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <!-- Content Header (Page header) -->
               <section class="content-header">
                  <h1>
                     User Profile
                  </h1>
                  <ol class="breadcrumb">
                     <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                     <li class="active">User profile</li>
                  </ol>
               </section>
               <!-- Main content -->
               <section class="content">
                  <div class="container-fluid">
                     <?php
                        if(isset($pwdsucc)){?>
                     <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Password Changed sucessfully</strong> 
                     </div>
                     <?php }
                        ?>
                     <?php
                        if(isset($pwderr)){?>
                     <div class="alert alert-warning" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Dear User, the old Password is not correct. Plz enter correct old password.</strong>&nbsp;Try again 
                     </div>
                     <?php }
                        if(isset($pwderror)){?>
                     <div class="alert alert-warning" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Dear User, New Password and Confirm Password not match.</strong>&nbsp;Try again 
                     </div>
                     <?php } if(isset($add)){?>
                     <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <b>Your Profile is Successfully Added !!!</b> 
                     </div>
                     <?php } 
                        if(isset($edit)){?>
                     <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <b>Your Profile is Successfully Updated !!!</b> 
                     </div>
                     <?php } ?>
                     <?php
                        $aid=$_SESSION['aid'];
                        $email=$_SESSION['username'];
                        $sql ="SELECT * FROM `register` where `register_id` = $aid";
                         $result = $con->query($sql);
                         if($row = $result->fetch_assoc())
                         { ?>
                     <div class="row">
                        <div class="col-md-9">
                           <div class="nav-tabs-custom">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
                              </ul>
                              <div class="tab-content">
                                 <div class="active tab-pane" id="settings">
                                    <form class="form-horizontal" role="form" method="post" action="profile_db.php" enctype="multipart/form-data">
                                       <input type="hidden" value="dummy" name="profile_update">

                                       <div class="form-group">
                                          <label for="inputName" class="col-sm-2 control-label">Name</label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="inputName" placeholder="Name" name="name"
                                                value="<?=$row['register_fullname'];?>" >
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label for="inputName" class="col-sm-2 control-label">Email</label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="inputName" placeholder="Name" name="name"
                                                value="<?=$row['register_email'];?>" >
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label for="inputName" class="col-sm-2 control-label">Mobile</label>
                                          <div class="col-sm-10">
                                             <input type="text" class="form-control" id="inputName" placeholder="Mobile" name="mobile"
                                                value="<?=$row['register_mobile'];?>">
                                          </div>
                                       </div>
                                       <!-- <div class="form-group">
                                          <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Update</button>
                                          </div>
                                          </div> -->
                                    </form>
                                    <?php  } ?>
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
               <!-- /.content -->
               </div>
            </section>
         </div>
         <footer class="main-footer">
            <strong>Copyright &copy; 2020-2021 <a href="#">Prediction</a>.</strong> All rights
            reserved.
         </footer>
         <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
         <div class="control-sidebar-bg"></div>
      </div>
      <!-- ./wrapper -->
      <!-- jQuery 2.2.0 -->
      <script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
         $.widget.bridge('uibutton', $.ui.button);
      </script>
      <!-- Bootstrap 3.3.6 -->
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <!-- Morris.js charts -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
      <script src="plugins/morris/morris.min.js"></script>
      <!-- Sparkline -->
      <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
      <!-- jvectormap -->
      <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="plugins/knob/jquery.knob.js"></script>
      <!-- daterangepicker -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
      <script src="plugins/daterangepicker/daterangepicker.js"></script>
      <!-- datepicker -->
      <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
      <!-- Slimscroll -->
      <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
      <!-- FastClick -->
      <script src="plugins/fastclick/fastclick.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/app.min.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="dist/js/pages/dashboard.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
   </body>
</html>
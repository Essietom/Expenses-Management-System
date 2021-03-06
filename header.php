<?php require "authorize.php";?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Customer_Relatioship_Manager</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="plugins/select2/select2.min.css">
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




  <!-- Font Awesome -->
  
  <!-- Ionicons -->
 
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

 




  
  

 
  

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">



 <header class="main-header">
    <!-- Logo -->
    <a href="index.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>CRM</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>CrystallHIlls</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Notifications: style can be found in dropdown.less -->
      
          <!-- Tasks: style can be found in dropdown.less -->
 
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Adenekan Esther</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Awesome Paul- Web Developer
                  <small>CrystalHills Software <br> ICT</small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>

              </li> -->

              <!-- Menu Footer-->
              <!-- <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li> -->
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
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
          <img src="dist/img/user2-160x160.jpg" style="height:80px; width:100%;"  class="img-circle " alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Adenekan Esther</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <!-- search form -->
     <!--  <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->



      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">

      <br>
        <!-- <li class="header">MAIN NAVIGATION</li> -->
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.php"><i class="fa fa-asterisk fa-spin "></i>HOME PAGE  </a></li>
            <!-- <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li> -->
          </ul>
        </li>
        <br>


        <li class="treeview">
        <a href="#"> <i class="fa fa-user" style="font-size:20px;"> </i>            
        <span>Admin Area</span> <span class="label label-danger pull-center"></span> <i class="fa fa-angle-left pull-right"> </i>
        </a>
        <ul class="treeview-menu">
          <li><a href="addcustomer.php"> <i class="fa fa-slack fa-spin ">  </i>Add Customer</a></li>
          <li><a href="purchase.php"> <i class="fa fa-slack fa-spin "> </i> Purchase  </a></li>
          <li><a href="bank.php"> <i class="fa fa-slack fa-spin "> </i> Bank  </a></li>
          <li><a href="viewcustomer.php"> <i class="fa fa-slack fa-spin "> </i>View All Customers </a></li>
          <li><a href="purchase_stats.php"><i class="fa fa-slack fa-spin "></i> Purchase Statistics</a></li>
         
          <li><a href="uploadcustomer.php"> <i class="fa fa-slack fa-spin "></i>Upload Customer [Excel]  </a>
          <li><a href="viewreport.php"> <i class="fa fa-slack fa-spin "></i> View All Report  </a>
   
                  
                  <ul class="treeview-menu">
                    <li><a href="customerdownload.php"><i class="fa fa-spinner fa-spin "></i>Download Customer Report </a></li>
                    <li><a href="debtreport.php"><i class="fa fa-spinner fa-spin "></i> Debtors Report</a></li>
                    <li><a href="prodreport.php"><i class="fa fa-spinner fa-spin "></i> Products Report</a></li>
                  </ul>


          </li>
          
        </ul>
        </li>
        

        <li class="treeview">
        <a href="#"> <i class="fa fa-wrench" style="font-size:20px;"> </i>            
        <span> Products Management </span> <span class="label label-success pull-center"></span> <i class="fa fa-angle-left pull-right"> </i>
        </a>
        <ul class="treeview-menu">
          <li><a href="addproduct.php"> <i class="fa fa-spinner fa-spin"></i> Add New Products </li>
          <li><a href="viewallproducts.php"> <i class="fa fa-spinner fa-spin"></i> View All Products </a></li>
        </ul>
        </li>
       

<!--         <li class="treeview">
        <a href="#"> <i class="fa fa-th"> </i>            
        <span> Sub4 </span>  <span class="label label-success pull-center">5</span><i class="fa fa-angle-left pull-right"> </i>
        </a>
        <ul class="treeview-menu">
          <li><a href=""> <i class="fa fa-circle-o"> d1  </i></a></li>
          <li><a href=""> <i class="fa fa-circle-o"> d1  </i></a></li>
          <li><a href=""> <i class="fa fa-circle-o"> d1  </i></a></li>
          <li><a href=""> <i class="fa fa-circle-o"> d1  </i></a></li>
          <li><a href=""> <i class="fa fa-circle-o"> d1  </i></a></li>
        </ul>
        </li>
        <br>

<li class="treeview">
        <a href="#"> <i class="fa fa-laptop"> </i>            
        <span> Department</span><span class="label label-success pull-center">2</span> <i class="fa fa-angle-left pull-right"> </i>
        </a>
        <ul class="treeview-menu">
          <li><a href="add_dept.php"> <i class="fa fa-circle-o"> Add Dept  </i></a></li>
          <li><a href=""> <i class="fa fa-circle-o"> View Dept  </i></a></li>
        </ul>
        </li>
        <br>
 -->



      <!--   <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"><//i>
            <span>Layout Options</span>
            <span class="label label-primary pull-right">4</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li> -->

        <!-- <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <small class="label pull-right bg-green">new</small>
          </a>
        </li> -->

  <!--       <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li> -->

      <!--   <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li> -->

      <!--   <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li> -->

       <!--  <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li> -->

       <!--  <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <small class="label pull-right bg-red">3</small>
          </a>
        </li> -->

        <!-- <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <small class="label pull-right bg-yellow">12</small>
          </a>
        </li> -->

 <!--        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li> -->

    <!--     <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li> -->
       <!--  
        <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    

    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>


  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
        <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" style="height:80px; width:100%;"  class="img-circle " alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Adenekan Esther</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
<br><br><br>
          <a style="font-size: 12px; font-family: bold; color: grey;" href="logout.php" class="pull-right"><i class="fa fa-circle text-danger fa-spin"></i> Logout </a>
        </div>
      </div>
      <!-- search form -->


            <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <?php if($privilege=="1" || $privilege=="2")
                {



          ?>
        <li class="treeview">
          <a href="#">

            <i class="fa fa-dashboard"></i> <span>Admin</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
              <li class = "treeview">
              <a href="#">

                <i class="fa fa-usd"></i> <span>Budget</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
                <ul class="treeview-menu">
                  <li><a href="expensesbudget.php"><i class="fa fa-circle-o"></i>Expenses Budget</a></li>
                  <li><a href="incomebudget.php"><i class="fa fa-circle-o"></i> Income Budget</a></li>
                </ul>
              </li>
             <li><a href="register.php"><i class="fa fa-circle-o"></i>Register Users</a></li>
             <li><a href="report.php"><i class="fa fa-circle-o"></i> Report Summary</a></li>
            <li><a href="expensesreport.php"><i class="fa fa-circle-o"></i> Total expenses</a></li>
            <li><a href="incomereport.php"><i class="fa fa-circle-o"></i> Total Income</a></li>
			       <li><a href="addstaff.php"><i class="fa fa-circle-o"></i> Add Staff</a></li>
            <!-- <li><a href="staffinsert.php"><i class="fa fa-circle-o"></i> New Staffs</a></li> -->
            <li><a href="viewstaff.php"><i class="fa fa-circle-o"></i> View and Edit Staffs</a></li>
			            <li><a href="projectmgt.php"><i class="fa fa-circle-o"></i>Projects</a></li>
                  <li><a href="purchases.php"><i class="fa fa-circle-o"></i>Purchases</a></li>
             <li><a href="expensesmgt.php"><i class="fa fa-circle-o"></i>Manage expenses type</a></li>
             <li><a href="paymentmode.php"><i class="fa fa-circle-o"></i>Manage Payment modes</a></li>
			            <li><a href="adddepartment.php"><i class="fa fa-circle-o"></i>Add Department</a></li>

          </ul>

        </li>
           <?php }
              else
              {

              }
             ?>
         <?php
            if($privilege=="1" || $privilege=="2" || $privilege=="4")
            {


          ?>
        <li class="treeview">

          <a href="#">
            <i class="fa fa-money"></i>
            <span>Expenses</span>
            <span class="label label-primary pull-right">2</span>
          </a>


          <ul class="treeview-menu">
            <li><a href="addexpenses.php"><i class="fa fa-circle-o"></i>Add Expenses</a></li>
            <li><a href="viewexpenses.php"><i class="fa fa-circle-o"></i>View all Expenses</a></li>
            <li><a href="multiexpensesinsert.php"><i class="fa fa-circle-o"></i>Enter Multiple Expenses</a></li>

             <li><a href="uploadexpenses.php"><i class="fa fa-circle-o"></i>Upload expenses</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-usd"></i>
            <span>Income</span>
            <span class="label label-primary pull-right">2</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addincome.php"><i class="fa fa-circle-o"></i>Add Income</a></li>
            <li><a href="viewincome.php"><i class="fa fa-circle-o"></i>View all Income</a></li>
            <li><a href="multiincomeinsert.php"><i class="fa fa-circle-o"></i>Enter Multiple Income</a></li>
           <!--  <li><a href="incomereport.php"><i class="fa fa-circle-o"></i>Income Report Sheet</a></li> -->

             <li><a href="uploadincome.php"><i class="fa fa-circle-o"></i>Upload Income</a></li>
          </ul>
        </li>
        <?php }
        else
        {

        }
        ?>
           <?php if($privilege=="1" || $privilege=="3" )
          {



         ?>
         <li class="treeview">


        <a href="#"> <i class="fa fa-user" style="font-size:20px;"> </i>
        <span>CRM Admin Area</span> <span class="label label-danger pull-center"></span> <i class="fa fa-angle-left pull-right"> </i>
        </a>
        <ul class="treeview-menu">
          <li><a href="addcustomer.php"> <i class="fa fa-slack fa-spin ">  </i>Add Customer</a></li>
          <li><a href="purchase.php"> <i class="fa fa-slack fa-spin "> </i> Purchase  </a></li>
          <li><a href="bank.php"> <i class="fa fa-slack fa-spin "> </i> Bank  </a></li>
          <li><a href="viewcustomer.php"> <i class="fa fa-slack fa-spin "> </i>View All Customers </a></li>
          <li><a href="purchase_stats.php"><i class="fa fa-slack fa-spin "></i> Purchase Statistics</a></li>

          <li><a href="uploadcustomer.php"> <i class="fa fa-slack fa-spin "></i>Upload Customer [Excel]  </a>
          <li><a href="viewreport.php"> <i class="fa fa-slack fa-spin "></i> View All Report  </a>


                  <ul class="treeview-menu">
                    <li><a href="customerdownload.php"><i class="fa fa-spinner fa-spin "></i>Download Customer Report </a></li>
                    <li><a href="debtreport.php"><i class="fa fa-spinner fa-spin "></i> Debtors Report</a></li>
                    <li><a href="prodreport.php"><i class="fa fa-spinner fa-spin "></i> Products Report</a></li>
                  </ul>


          </li>

        </ul>
        </li>


        <li class="treeview">
        <a href="#"> <i class="fa fa-wrench" style="font-size:20px;"> </i>
        <span> Products Management </span> <span class="label label-success pull-center"></span> <i class="fa fa-angle-left pull-right"> </i>
        </a>
        <ul class="treeview-menu">
          <li><a href="addproduct.php"> <i class="fa fa-spinner fa-spin"></i> Add New Products </li>
          <li><a href="viewallproducts.php"> <i class="fa fa-spinner fa-spin"></i> View All Products </a></li>
        </ul>
        </li>
      <?php }
      else
      {

      }
      ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

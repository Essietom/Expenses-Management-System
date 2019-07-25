<?php 
 
  include('header.php'); 
  if($privilege!='1' && $privilege !='2'){
  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
  exit();
}
  require "classes/departmentclass.php";
  ?> 

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crystal ERP
        <small>Department  Mgt</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12">

        <!-- The Section and Two Divs show Start of Page Contenct -->
    <!-- Calendar -->
    <div class="col-lg-12">
          <div class="box box-solid bg-white-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Department Management</h3>
             
            </div>
            <!-- /.box-header -->
            <div class="box-body">




              <div>


  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="payroll">
      <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#add-department" aria-controls="add-payroll" role="tab" data-toggle="tab">Add Department</a></li>
    <li role="presentation"><a href="#view-department" aria-controls="view-department" role="tab" data-toggle="tab">View Department</a></li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="add-department">
      
      <div class="add-department">
             
             <section class="content">
      <div class="row">
        <div class="col-md-3"></div>
        <!-- left column -->
        <div class="col-md-6">

           <div class="box box-info blue-border">
            <div class="box-header with-border">
              <h3 class="box-title">Add department</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="">
              <?php department::adddepartmentprocess();?>
              <div class="box-body">
               <div class="form-group">
                  
                  <label for="selector1" class="col-sm-2 control-label">Department</label>
                  <div class="col-sm-10">
                    <input type="text" name="deptname" required placeholder="Enter department name" class="form-control" value="<?php echo !empty($deptname)? $deptname:'';?>">
                  </div>
               
        <div class="clearfix"> </div>
                  
                </div>
               <div class="form-group">
             <label for="selector1" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">

                   <textarea placeholder="Enter department's description" name="deptdesc" class="form-control" value="<?php echo !empty($deptdesc)?$deptdesc:'';?>"></textarea>
                  </div>

        <div class="clearfix"> </div>
                </div>
            
            
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               
                <button type="submit" class="btn btn-primary" name="adddept">Add</button>
              </div>
              <!-- /.box-footer -->
             
            </form>
          </div>


        </div>
      </div>
    </section>


              </div>
              
    </div>
 <div role="tabpanel" class="tab-pane" id="view-department">
      <div class="view-department">

          <section class="content">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="box">
                        <div class="box-header with-border">
                          <h3 class="box-title">View Departments</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <table class="table table-bordered">
                            <tr>
                              <th>Department Name</th>
                              
                               <th>Department description</th>
                              <th>Action</th>
                              
                            </tr>

                              <?php department::viewdepartment();
                                 department::deletedepartment();
                             ?>
               
                           
                          </table>
                        </div>
                        <!-- /.box-body -->
                      
                      </div>
                      <!-- /.box -->


                    </div>

                  </div>
                </section>
                 
                
              </div>
             
    </div>
<!-- 

          </div>
          <!-- /.col-lg-5 -->

          </div>
          </div>
          </section>

         </div>


<?php include "footer.php"; ?>
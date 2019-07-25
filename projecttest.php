<?php

// require "config.php";
// require "models/database.php";
include('header.php');
require 'class/project.php';

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Crystal ERP
      <small>Project Management</small>
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

              <h3 class="box-title">Project Management</h3>

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
                        <li role="presentation" class="active"><a href="#view-project" aria-controls="view-project" role="tab" data-toggle="tab">View Project</a></li>
                        <li role="presentation"><a href="#add-project" aria-controls="add-payroll" role="tab" data-toggle="tab">Add Project</a></li>
                        <!--     <li role="presentation"><a href="#project-status" aria-controls="add-payroll" role="tab" data-toggle="tab">project Status</a></li> -->
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane" id="add-project">

                          <div class="add-project">

                            <section class="content">
                              <div class="row">
                                <div class="col-md-3"></div>
                                <!-- left column -->
                                <div class="col-md-6">

                                  <div class="box box-info blue-border">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Project</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form class="form-horizontal" action="projectmgt.php" method="POST" id="#form">
                                      <?php require"formactions/addproject.php";?>
                                      <div class="box-body">
                                        <div class="form-group">
                                          <label class="col-sm-2 control-label">Project Title:</label>

                                          <div class="col-sm-10">
                                            <input input type="text" required placeholder="Enter A project Name" name="projectname" class="form-control" value="<?php echo !empty($projectname)?$projectname:'';?>">
                                          </div>
                                          <?php if (!empty($projectname)): ?>
                                            <div class="col-sm-2">
                                              <p class="help-block"><?php echo $projectnameError;?></p>
                                            </div>
                                          <?php endif; ?>
                                          <div class="clearfix"> </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-sm-2 control-label">Project Estimate:</label>

                                          <div class="col-sm-10">
                                            <input input type="text" required placeholder="Estimated Amount for Project" name="estimate" class="form-control" value="<?php echo !empty($projectname)?$projectname:'';?>">
                                          </div>
                                          <?php if (!empty($estimate)): ?>
                                            <div class="col-sm-2">
                                              <p class="help-block"><?php echo $estimate;?></p>
                                            </div>
                                          <?php endif; ?>
                                          <div class="clearfix"> </div>
                                        </div>


                                        <div class="form-group">
                                          <label for="inputEmail3" class="col-sm-2 control-label">Project Description:</label>

                                          <div class="col-sm-10">
                                            <textarea placeholder="Project Description" name="projectdesc" class="form-control" value="<?php echo !empty($projectdesc)?$projectdesc:'';?>"></textarea>
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
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-primary">Add project</button>
                                        <button type="submit" class="btn btn-default pull-right">Reset</button>
                                      </div>
                                      <!-- /.box-footer -->
                                    </form>
                                  </div>


                                </div>
                              </div>
                            </section>


                          </div>

                        </div>
                        <div role="tabpanel" class="tab-pane active" id="view-project">
                          <div class="view-project">

                            <section class="content">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="box">
                                    <div class="box-header" >
                                      <h2 class="box-title">View Projects</h2>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body no-padding">
                                      <table class="table table-striped">
                                        <tr>
                                          <th>PROJECT TITLE</th>

                                          <th>PROJECT DESCRIPTION</th>
                                          <th>ESTIMATE AMOUNT</th>
                                          <th>AMOUNT SPENT</th>
                                          <th>AMOUNT LEFT</th>
                                          <th>ACTION</th>
                                        </tr>




                                        <?php
                                        Project::DisplayProject();
                                         ?>





                                      <br/><br/>

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



                  </div>
                  <!-- /.box -->

                </div>
                <!-- /.col-lg-5 -->

              </div>
            </div>
          </section>

        </div>

        <script type="text/javascript">
        // To make Pace works on Ajax calls
        // $(document).ajaxStart(function() { Pace.restart(); });
        //   $('.ajax').click(function(){
        //       $.ajax({url: '#', success: function(result){
        //           $('.ajax-content').html('<hr>Ajax Request Completed !');
        //       }});
        //   });
        </script>

        <?php include "footer.php"; ?>

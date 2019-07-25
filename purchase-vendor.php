<?php


include('header.php');
if($privilege!='1' && $privilege !='2' ){
  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
  exit();
}
require 'classes/purchaseclass.php';
if (isset($_POST['submit'])) {
  $name = $_POST['vendorname'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $country = $_POST['country'];
  $email = $_POST['email'];

  $sql = "INSERT INTO vendor (name, address, phone, email, country) values('$name', '$address','$phone', '$email', '$country' )";
  $query=expensesmgt::calldb()->query($sql);

}
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
        <div class="box box-solid bg-white-gradient">
          <div class="box-header">
            <i class="fa fa-calendar"></i>

            <h3 class="box-title">Project Management</h3>

          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="payroll">
                <div>

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#view-vendor" aria-controls="view-project" role="tab" data-toggle="tab">View Vendor</a></li>
                    <li role="presentation"><a href="#add-vendor" aria-controls="add-payroll" role="tab" data-toggle="tab">Add Vendor</a></li>
                    <!--     <li role="presentation"><a href="#project-status" aria-controls="add-payroll" role="tab" data-toggle="tab">project Status</a></li> -->
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane" id="add-vendor">

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
                                <form class="form-horizontal" action="purchase-vendor.php" method="POST" id="#form">
                                  <div class="box-body">
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Vendor Name:</label>

                                      <div class="col-sm-10">
                                        <input input type="text" required placeholder="Vendor Name" name="vendorname" class="form-control" value="">
                                      </div>
                                      <div class="clearfix"> </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Address:</label>

                                      <div class="col-sm-10">
                                        <textarea placeholder="Address" name="address" class="form-control" value=""></textarea>
                                      </div>

                                      <div class="clearfix"> </div>
                                    </div>


                                    <div class="form-group">
                                      <label for="inputEmail3" class="col-sm-2 control-label">Phone:</label>
                                      <div class="col-sm-10">
                                        <input input type="text" required placeholder="Phone Number" name="phone" class="form-control" value="">
                                      </div>
                                      <div class="clearfix"> </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="inputEmail3" class="col-sm-2 control-label">Email:</label>
                                      <div class="col-sm-10">
                                        <input input type="text" required placeholder="Email Address" name="email" class="form-control" value="">
                                      </div>
                                      <div class="clearfix"> </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="inputEmail3" class="col-sm-2 control-label">Country:</label>
                                      <div class="col-sm-10">
                                        <input input type="text" required placeholder="Country" name="country" class="form-control" value="Nigeria">
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
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-primary" name="submit">Add project</button>
                                    <button type="reset" class="btn btn-default pull-right">Reset</button>
                                  </div>
                                  <!-- /.box-footer -->
                                </form>
                              </div>


                            </div>
                          </div>
                        </section>


                      </div>

                    </div>
                    <div role="tabpanel" class="tab-pane active" id="view-vendor">
                      <div class="view-project">

                        <section class="content">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="box">
                                <div class="box-header" >
                                  <h2 class="box-title">View Vendor</h2>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                  <table class="table table-striped">
                                    <tr>
                                      <th>NAME</th>

                                      <th>ADDRESS</th>
                                      <th>PHONE</th>
                                      <th>EMAIL</th>
                                      <th>COUNTRY</th>
                                      <th>ACTION</th>
                                    </tr>




                                    <?php

                                    purchase::viewvendor();
                                    purchase::deletevendor();
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
                    <!-- /.col-lg-5 -->

                  </div>
                </div>
              </section>

            </div>

            <script type="text/javascript">

            </script>

            <?php include "footer.php"; ?>

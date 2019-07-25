<?php


include('header.php');
if($privilege!='1' && $privilege !='3' && $privilege !='2'){
  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";

  exit();
}
require 'classes/purchaseclass.php';
if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  if (empty($_POST['vendor'])) {
    $vendor_id = 'None';
  }
  elseif(!empty($_POST['vendor'])){
    $vendor_id = $_POST['vendor'];
  }
  $quantity = $_POST['quantity'];
  $unitamount = $_POST['unitamount'];
  $totalamount = $unitamount * $quantity;
  $created = $_POST['created'];

  $sql = "INSERT INTO purchases (title, description, vendor_id, unitamount, quantity, totalamount, created) values('$title', '$description','$vendor_id', '$unitamount','$quantity', '$totalamount', '$created' )";
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
                    <li role="presentation" class="active"><a href="#view-purchases" aria-controls="view-purchases" role="tab" data-toggle="tab">View Purchases</a></li>
                    <li role="presentation"><a href="#add-purchases" aria-controls="add-payroll" role="tab" data-toggle="tab">Add Purchases</a></li>

                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane" id="add-purchases">

                      <div class="add-project">

                        <section class="content">
                          <div class="row">
                            <div class="col-md-3"></div>
                            <!-- left column -->
                            <div class="col-md-6">

                              <div class="box box-info blue-border">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Purchases</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form class="form-horizontal" action="purchases.php" method="POST" id="#form">
                                  <div class="box-body">
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Purchase:</label>

                                      <div class="col-sm-10">
                                        <input input type="text" required placeholder="Halima oo! What did you buy with our money" name="title" class="form-control" value="">
                                      </div>
                                      <div class="clearfix"> </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Description</label>

                                      <div class="col-sm-10">
                                        <textarea placeholder="Description" name="description" class="form-control" value=""></textarea>
                                      </div>

                                      <div class="clearfix"> </div>
                                    </div>


                                    <div class="form-group">
                                      <label for="inputEmail3" class="col-sm-2 control-label">Vendor:</label>
                                      <div class="col-sm-10">
                                        <select class="form-control" name="vendor">
                                          <?php
                                          expensesmgt::selectoption('vendor','name','vendor_id');
                                          ?>
                                        </select>
                                      </div>
                                      <div class="clearfix"> </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="inputEmail3" class="col-sm-2 control-label">Unit Cost:</label>
                                      <div class="col-sm-10">
                                        <input input type="text" required placeholder="Amount" name="unitamount" class="form-control" value="">
                                      </div>
                                      <div class="clearfix"> </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="inputEmail3" class="col-sm-2 control-label">Quantity:</label>
                                      <div class="col-sm-10">
                                        <input input type="text" required placeholder="Quantity" name="quantity" class="form-control" value="">
                                      </div>
                                      <div class="clearfix"> </div>
                                    </div>


                                    <input type="hidden" name="created" class="form-control" value="<?php echo date('d/m/Y'); ?>">


                                    <div class="form-group">
                                      <div class="col-sm-offset-2 col-sm-10">

                                      </div>
                                    </div>
                                  </div>
                                  <!-- /.box-body -->
                                  <div class="box-footer">
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <button type="submit" class="btn btn-primary" name="submit">Add Purchases</button>
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
                    <div role="tabpanel" class="tab-pane active" id="view-purchases">
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
                                      <th>Title</th>

                                      <th>Description</th>
                                      <th>Vendor</th>
                                      <th>Unit Cost</th>
                                      <th>Quantity</th>
                                      <th>Total Cost</th>
                                      <th>Update</th>
                                      <th>
                                        Delete
                                      </th>
                                    </tr>


                                    <?php purchase::DisplayPurchases();
                                    purchase::deletepurchase();
                                    purchase::updatepurchase();
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


                  </div>
                  <!-- /.col-lg-5 -->

                </div>
              </div>
            </section>

          </div>

          <script type="text/javascript">

          </script>

          <?php include "footer.php"; ?>

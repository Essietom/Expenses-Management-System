<?php 


require "classes/paymentmodeclass.php";
include('header.php'); 
if($privilege!='1' && $privilege !='2'){
  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
  exit();
}
if (isset($_POST['submit'])) {
 $paymode=$_POST['paymentmode'];
 $paydesc=$_POST['paymentmodedesc'];
 $valid=true;
  if(empty($_POST['paymentmode']))
  {
    $valid=false;
    $paymentmodeError="Add payment mode";

  }
  
  if($valid)
  {
 
  $sql = "INSERT INTO payment_mode (payment_mode,payment_mode_desc) VALUES ('$paymode','$paydesc')";
  $query=expensesmgt::calldb()->query($sql);
 }
 else
 {
  echo "enter payment mode";
 }
}
?> 

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Crystal ERP
      <small>Payment Mode</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">

      <!-- Calendar -->
      <div class="col-lg-12">
        <div class="box box-solid bg-white-gradient">
          <div class="box-header">
            <h3 class="box-title">Payment mode</h3>

          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="payroll">
               
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#addpaymentmode" aria-controls="add-payroll" role="tab" data-toggle="tab">Add new payment mode</a></li>
                  <li role="presentation"><a href="#viewpaymentmode" aria-controls="view-expenses" role="tab" data-toggle="tab">View payment mode</a></li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="addpaymentmode">
                    
                    <div class="addpaymentmode">
                     
                     <section class="content">
                      <div class="row">
                        <div class="col-md-3"></div>
                        <!-- left column -->
                        <div class="col-md-6">

                         <div class="box box-info blue-border">
                          <div class="box-header with-border">
                            <h3 class="box-title">Payment mode</h3>
                          </div>
                          <!-- /.box-header -->
                          <!-- form start -->
                          <form class="form-horizontal" action="" method="POST" id="#form">
                           
                           <div class="box-body">
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Payment mode:</label>

                              <div class="col-sm-10">
                                <input input type="text" required placeholder="Enter Payment Mode" name="paymentmode" class="form-control" value="<?php echo !empty($paymentmode)?$paymentmode:'';?>">
                              </div>
                              
                              <div class="clearfix"> </div>
                            </div>


                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Payment mode Description:</label>

                              <div class="col-sm-10">
                                <textarea placeholder="Payment mode Description" name="paymentmodedesc" class="form-control" value="<?php echo !empty($paymentmodedesc)?$paymentmodedesc:'';?>"></textarea>
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
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" name="submit" class="btn btn-primary">Add</button>
                            <button type="submit" class="btn btn-default pull-right" >Reset</button>
                          </div>
                          <!-- /.box-footer -->
                        </form>
                      </div>


                    </div>
                  </div>
                </section>


              </div>
              
            </div>
            <div role="tabpanel" class="tab-pane" id="viewpaymentmode">
              <div class="viewpaymentmode">

               <section class="content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="box">
                      <div class="box-header" >
                        <h2 class="box-title">View payment mode</h2>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body no-padding">
                        <table class="table table-striped">
                          <tr>
                            <th>Payment mode</th>

                            <th>Payment mode Decription</th>
                            <th>Action</th>
                          </tr>
                          <?php
                          paymentmode::viewpaymentmode();
                          paymentmode::deletepaymentmode();
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

        </div>
      </div>
    </section>

  </div>


  <?php include "footer.php"; ?>
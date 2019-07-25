<?php

include('header.php');
if($privilege!='1' && $privilege !='2'){
  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
  exit();
}
require 'classes/expensestypeclass.php';
if (isset($_POST['submit']))
{
 $proname=$_POST['expensesname'];

 $valid=true;
 if(empty($_POST['expensesname']))
 {
  $valid=false;
  $expensesnameError="Add expenses title";

}

if($valid)
{

  $sql = "INSERT INTO expenses_type (expenses_type) VALUES ('$proname')";
  $query=expensesmgt::calldb()->query($sql);
}
else
{
  echo "enter expenses type";
}
}
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Crystal ERP
      <small>Expenses Type</small>
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

            <h3 class="box-title">Expenses type Management</h3>

          </div>
          <!-- /.box-header -->
          <div class="box-body">


            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="payroll">

                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#add-expenses" aria-controls="add-payroll" role="tab" data-toggle="tab">Add new expenses</a></li>
                  <li role="presentation"><a href="#view-expenses" aria-controls="view-expenses" role="tab" data-toggle="tab">View Expenses type</a></li>
                  <!--     <li role="presentation"><a href="#expenses-status" aria-controls="add-payroll" role="tab" data-toggle="tab">expenses Status</a></li> -->
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="add-expenses">

                    <div class="add-expenses">

                     <section class="content">
                      <div class="row">
                        <div class="col-md-3"></div>
                        <!-- left column -->
                        <div class="col-md-6">

                         <div class="box box-info blue-border">
                          <div class="box-header with-border">
                            <h3 class="box-title">Expenses type</h3>
                          </div>
                          <!-- /.box-header -->
                          <!-- form start -->
                          <form class="form-horizontal" action="expensesmgt.php" method="POST" id="#form">

                           <div class="box-body">
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Expenses Title:</label>

                              <div class="col-sm-10">
                                <input input type="text" required placeholder="Enter A expenses Name" name="expensesname" class="form-control" value="<?php echo !empty($expensesname)?$expensesname:'';?>">
                              </div>

                              <div class="clearfix"> </div>
                            </div>
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-primary" name="submit">Add expenses</button>
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
            <div role="tabpanel" class="tab-pane" id="view-expenses">
              <div class="view-expenses">

               <section class="content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="box">
                      <div class="box-header" >
                        <h2 class="box-title">View expensess</h2>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body no-padding">
                        <table class="table table-striped">
                          <tr>
                            <th>expenses Title</th>

                            <th>Action</th>
                          </tr>
                          <?php expensestype::viewexpensestype();?>
                          <?php expensestype::deleteexpensestype();?>
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
    </div>
  </div>
</div>
</div>
</div>
</section>
</div>



<?php include "footer.php"; ?>

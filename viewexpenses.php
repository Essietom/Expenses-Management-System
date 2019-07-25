<?php


include ('header.php');
if($privilege!='1' && $privilege !='2' && $privilege !='4'){
  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";

  exit();
}
require "classes/expensesclass.php";
?>
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Crystal ERP
      <small>Control panel</small>
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
        <div class="box box-solid">
          <div class="box-header">

            <h3 class="box-title">View All Expenses</h3>

          </div>
          <!-- /.box-header -->
          <div class="box-body">


            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S/n</th>
                  <th>Expenses Title</th>
                  <th>Expenses description</th>
                  <th>procured by(staff)</th>
                  <th>procured by(project)</th>
                  <th>Amount spent</th>
                  <th>Expenses date</th>
                  <th>Edit expenses</th>


                  <th>Delete</th>
                </tr>
              </thead>

              <tbody>

                <?php expenses::viewexpenses();
                       expenses::deleteexpenses();
                       expenses::editexpenses();
                        ?>

              </tbody>

            </table>

          </div>
          <!-- /.box-body -->

        </div>
        <!-- /.box -->

      </div>
    </div>
  </section>
  </div>
<?php
include ('footer.php');
?>

<?php


 include ('header.php');
 if($privilege!='1' && $privilege !='2'){

  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
  // exit();
}
 require "classes/staffclass.php";
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
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-solid bg-white-gradient">

          <div class="box-header with-border">
            <h3 class="box-title">View Staff</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">


          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Surname</th>
                <th>Other Names</th>
                <th>Sex</th>
                <th>D.O.B</th>
                <th>Qualification</th>
                <th>Department</th>
                <th>Phone no</th>
                <th>Year Joined</th>
                <th>Email</th>
                <th>Account no</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>


            <?php staff::deletestaff(); ?>

            <?php staff::viewstaff(); ?>

            <?php staff::updatestaff(); ?>


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

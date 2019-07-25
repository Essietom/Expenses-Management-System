<?php


include('header.php');
if($privilege!='1' && $privilege !='2'){
  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
  exit();
}
require 'classes/expensesclass.php';

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

      <!-- Calendar -->
      <div class="col-lg-12">
        <div class="box box-solid bg-white-gradient">
          <div class="box-header">
            <i class="fa fa-calendar"></i>

            <h3 class="box-title">Expenses Breakdown for the </h3>

          </div>
          <!-- /.box-header -->
          <div class="box-body">

      <table class="table span12 table-stripped">
<?Php
      $year=$_GET['year'];
      $month=$_GET['month'];
?>
    <thead>
      <tr>
        <th>Expenses Type</th>
        <th>Amount Spent</th>
        

      </tr>
    </thead>

    <tbody>

     <?php expenses::getbreakdown($year, $month); ?>

    </tbody>

  </table>

          </div>

        </div>


      </div>
    </div>
  </section>

</div>

<script type="text/javascript">

</script>

<?php include "footer.php"; ?>

<?php


include ('header.php');
if($privilege!='1' && $privilege !='4' && $privilege !='2'){
  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
  exit();
}
require "classes/incomeclass.php";
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

          <div class="box-body">


            <table id="example1" class="table table-bordered table-striped">

              <thead>
                <tr>

                  <th>Income title</th>
                  <th>Income description</th>
                  <th>Customer/Company's name</th>
                  <th>Date</th>
                  <th>Amount</th>


                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>

              <tbody>
               <?php income::viewincome();
               income::deleteincome();
               income::updateincome();
               ?>


             </tbody>

           </table>

         </div>

       </div>
       <!-- /.box -->

     </div>
     <!-- /.col-lg-5 -->

   </div>
 </div>
</section>

</div>

<?php
include ('footer.php');
?>

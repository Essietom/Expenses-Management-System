<?php


include ('header.php');
if($privilege!='1' && $privilege !='4' && $privilege !='2'){
  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
  exit();
} 
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
      <div class="col-lg-12">

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Enter Multiple Income</h3>
          </div>
          <form role="form" class="form-inline" id="create">
            <div class="box-body">
              <div class="form-group">
                <label>Number of entries</label>
                <input type="number" required="" name="num" class="form-control">
              </div>

              <button id="submit" class="btn btn-primary" type="submit" name="noofentries" >Go</button>
            </div>

          </form>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-solid">
          <div class="box-header">
            <h3 class="box-title"><b>Multiple Income Insert</b></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table span12 table-stripped">
            <form method="POST" action=''>
              <thead>
                  <th>S/n</th>
                  <th>Income title</th>
                  <th>Income description</th>
                  <th>Customer/Company's name</th>
                  <th>Date</th>
                  <th>Amount</th>
             </thead>
             <tbody>
              <?php
             require "classes/incomeclass.php";
             income::submitmultipleinsert();
              if(isset($_REQUEST['noofentries']))
              {
                $num=$_REQUEST['num'];
                for ($i=0; $i < $num; $i++):
                  ?>
                <tr>

                <td><?php echo $i+1;?></td>
                  <td><input  type="text" name="incometitle[]"    placeholder="Enter income title"> </td>
                  <td><input  type="text" name="incomedesc[]"   placeholder="Enter income description"></td>
                  <td><input  type="text" name="customer[]"     placeholder="Enter Customer's/Company's name"></td>
                  <td><input  type="date" name="dateofincome[]"    ></td>
                  <td><input  type="text" name="amount[]"    placeholder="#"></td>

                </tr>
              <?php endfor;?>
              <input type="hidden" name="numofentry" value="<?php echo $num?>">
              <?php
            }
              ?>

            </tbody>
            <tfoot><button type="submit" class="btn btn-success" name="multisubmit">Enter</button></tfoot>
            </form>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
<?php include "footer.php";?>

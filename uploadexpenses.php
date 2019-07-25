<?php 

include('header.php'); 
require "classes/expensesclass.php";

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Crysatl ERP
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
            

            <h3 class="box-title">Upload expenses</h3>
            
          </div>
          <!-- /.box-header -->
          <div class="box-body">


           <section class="content">
            <div class="row">
              <!-- left column -->
              <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Upload</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form role="form"  action="uploadexpenses.php" method="post" enctype="multipart/form-data">

                    <div class="box-body">
                     <?php expenses::uploadexpenses();?>
                     <div class="form-group">
                      <label >Upload expenses</label>
                      <input type="file" name="file" id="file" required=""/>
                      <p class="help-block">Excel files only</p>
                      
                    </div>
                    
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="import" value="import">Upload</button>
                  </div>
                </form>
              </div>
              <!-- /.box -->
            </div>
          </div>
        </section>
        
      </div>
      <!-- /.col-lg-5 -->

    </div>
  </div>
</section>

</div>


<?php include "footer.php"; ?>
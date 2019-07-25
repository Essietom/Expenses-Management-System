<?php 
 
  include('header.php'); 
  if($privilege!='1' && $privilege !='2'){
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
        <small>Budget</small>
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

        <!-- The Section and Two Divs show Start of Page Contenct -->
    <!-- Calendar -->
    <div class="col-lg-12">
          <div class="box box-solid bg-white-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Budgetting</h3>
             
            </div>
            <!-- /.box-header -->
            <div class="box-body">




              <div>


  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="payroll">
      <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#add-budget" aria-controls="add-budget" role="tab" data-toggle="tab">Add Expenses Budget</a></li>
    <li role="presentation"><a href="#view-budget" aria-controls="view-budget" role="tab" data-toggle="tab">View Budget</a></li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="add-budget">
      
      <div class="add-budget">
             
             <section class="content">
      <div class="row">
        <div class="col-md-3"></div>
        <!-- left column -->
        <div class="col-md-6">

           <div class="box box-info blue-border">
            <div class="box-header with-border">
              <h3 class="box-title">Add Budget</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="">
             <?php expenses::addbudget();?>
              <div class="box-body">
              <div class="form-group">
                  
                  <label for="selector1" class="col-sm-2 control-label">Month</label>
                  <div class="col-sm-10">
                    <?php expensesmgt::selectmonth()?>
                  </div>
               
        <div class="clearfix"> </div>
                  
                </div>
               <div class="form-group">
                  
                  <label for="selector1" class="col-sm-2 control-label">Year</label>
                  <div class="col-sm-10">
                    <?php expensesmgt::selectyear()?>
                  </div>
               
        <div class="clearfix"> </div>
                  
                </div>
               <div class="form-group">
                  
                  <label for="selector1" class="col-sm-2 control-label">Proposed Expenditure</label>
                  <div class="col-sm-10">
                    <input type="text" name="proposedexpenses" required placeholder="Enter Proposed Expenditure" class="form-control" value="<?php echo !empty($proposedexpenses)? $proposedexpenses:'';?>">
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
               
                <button type="submit" class="btn btn-primary" name="expenditure">Add</button>
              </div>
              <!-- /.box-footer -->
             
            </form>
          </div>


        </div>
      </div>
    </section>


              </div>
              
    </div>
 <div role="tabpanel" class="tab-pane" id="view-budget">
      <div class="view-budget">

 <section class="content">
      <div class="row">


           <div class="box box-info blue-border">
            <div class="box-header with-border">
              <h3 class="box-title">Expenses report</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"   class="form-inline" id="create">

              <div class="box-body">

                <div class="form-group">
                  <label>Year:</label>
                  <input type="text" required="" name="budgetyear" placeholder="yyyy">
                </div>
               

              

              <button id="submit" class="btn btn-primary" type="submit" name="data" >View Expenditure</button>
            </div>
            <!-- /.box-body -->
          </form>
        


        </div>
      </div>


 <?php


    if (isset($_REQUEST['data'])):

    $budgetyear = $_REQUEST['budgetyear'];
    
?>
    <div class="col-lg-12">
          <div class="box box-solid">
            <div class="box-header">


              <h3 class="box-title">Expenses For <?php echo $budgetyear?></h3>
              <!-- tools box -->

            </div>
            <!-- /.box-header -->
            <div class="box-body">

           

<div id="pay-report">
  <table class="table span12 table-stripped">



    <thead>
      <tr>
        <th>Month</th>
        <th>Proposed Expenditure</th>
        <th>Actual Expenses</th>
        <th>Deficit</th>
        <th>Surplus</th>
        <th>Breakdown</th>

       


      </tr>
    </thead>

    <tbody>

     <?php expenses::expensesbudget($budgetyear); ?>

    </tbody>

  </table>
  <?php endif;?>
  </div>

  </div>



          </div>
          <!-- /.box -->

          </div>
          <!-- /.col-lg-5 -->

          </div>
          </div>
          </section>



          </div>
          <!-- /.box -->

        </div>
        <!-- /.col-lg-5 -->

    </div>
  </section>
                 
                
              </div>
             
    </div>
<!-- 

          </div>
          <!-- /.col-lg-5 -->

          </div>
          </div>
          </section>

         </div>


<?php include "footer.php"; ?>
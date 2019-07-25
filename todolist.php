<?php

 include ('header.php'); 

if($privilege!='1' && $privilege !='2' && $privilege !='4'){
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

        <div class="col-md-2"></div>
            <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add a New Expenses</h3>
            </div>
         
                <form role="form" class="form-horizontal" method="post" action="addexpenses.php">
                           <?php require "classes/expensesclass.php";
                                  expenses::addexpensesprocess();
                           ?>
            <div class="box-body">
    <div class="form-group">
        <label class="col-md-2 control-label">Expenses Type</label>
        <div class="col-md-8">
                       
            <select name="expensetype" value="<?php echo !empty($expensetype)?$expensetype:'';?>" class="form-control" required>

           <?php expensesmgt::selectoption('expenses_type','expenses_type','expenses_type_id')?>
             
          </select>
                     
        </div>
         
        <div class="clearfix"> </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">Expenses description</label>
        <div class="col-md-8">
       <input name="expensedesc" value="<?php echo !empty($expensedesc)?$expensedesc:'';?>" class="form-control" >
             
           
                </div>
       
        <div class="clearfix"> </div>
      </div>
      
      <div class="form-group">
        <label class="col-md-2 control-label">Procured by(project)</label>
        <div class="col-md-8">
                 <select name="procuredbyproj" value="<?php echo !empty($procuredbyproj)?$procuredbyproj:'';?>" class="form-control">
                  <?php expensesmgt::selectoption('project','project_title','project_id')?>
                                  
                </select>
       
           
                 </div>

        <div class="clearfix"> </div>
      </div>
       <div class="form-group">
        <label class="col-md-2 control-label">Procured by(staff)</label>
        <div class="col-md-8">
                 <select name="procuredbystaff" value="<?php echo !empty($procuredbystaff)?$procuredbystaff:'';?>" class="form-control">
                  <?php expensesmgt::selectoption('staff','staff_fname','staff_id')?>
                </select>

       
           
                 </div>
       
            
        <div class="clearfix"> </div>
      </div>


      
      <div class="form-group">
        <label class="col-md-2 control-label">Date Procured</label>
        <div class="col-md-8">
       
           
            <input  type="date" name="dateprocured"   required value="<?php echo !empty($dateprocured)?$dateprocured:'';?>" class="form-control" >
         
        </div>
        
        <div class="clearfix"> </div>
      </div>
     
     
     <div class="form-group">
        <label class="col-md-2 control-label">Amount</label>
        <div class="col-md-8">
       
           
            <input  type="text" name="amount"   required value="<?php echo !empty($amount)?$amount:'';?>" class="form-control" placeholder="Enter amount spent in naira">
         
        </div>
      
        <div class="clearfix"> </div>
      </div>
      
    
      <div class="col-md-4"></div>
      <button type="submit" class="btn btn-primary col-md-4" name="addexpenses">Enter</button>
      </div>
    </form>


           </div>
          </div>
          <!-- /.box -->

          
          </div>
          </div>
          </section>

    </div>


<?php include "footer.php";?>
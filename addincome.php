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
              <h3 class="box-title">Add a New Income</h3>
            </div>
         
                <form role="form" class="form-horizontal" method="post" action="addincome.php">
              <?php require "classes/incomeclass.php";
                      income::addincomeprocess();
              ?>
            <div class="box-body">
    <div class="form-group">
        <label class="col-md-2 control-label">Income Title</label>
        <div class="col-md-8">
                       
        <input  type="text" name="incometitle"   required value="<?php echo !empty($incometitle)?$incometitle:'';?>" class="form-control" placeholder="Enter income title"> 
                     
        </div>
       
        <div class="clearfix"> </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">Income description</label>
        <div class="col-md-8">
          <input  type="text" name="incomedesc"   value="<?php echo !empty($incomedesc)?$incomedesc:'';?>" class="form-control" placeholder="Enter income description">
          
           
                </div>

        <div class="clearfix"> </div>
      </div>
      
 <div class="form-group">
        <label class="col-md-2 control-label">Customer's name</label>
        <div class="col-md-8">
          <input  type="text" name="customer"    value="<?php echo !empty($customer)?$customer:'';?>" class="form-control" placeholder="Enter Customer's/Company's name">
          
           
                </div>
        
        <div class="clearfix"> </div>
      </div>
      
      
      <div class="form-group">
        <label class="col-md-2 control-label">Date of Income</label>
        <div class="col-md-8">
       
           
            <input  type="date" name="dateofincome"   required value="<?php echo !empty($dateofincome)?$dateofincome:'';?>" class="form-control" placeholder="Date(mm/dd/yyyy)">
         
        </div>
       
        <div class="clearfix"> </div>
      </div>
     
     
     <div class="form-group">
        <label class="col-md-2 control-label">Amount</label>
        <div class="col-md-8">
       
           
            <input  type="text" name="amount"   required value="<?php echo !empty($amount)?$amount:'';?>" class="form-control" placeholder="Enter amount received in naira">
         
        </div>
   
        <div class="clearfix"> </div>
      </div>
      
    
      <div class="col-md-4"></div>
      <button type="submit" class="btn btn-primary col-md-4" name="addincome">Enter</button>
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
<?php

 include ('header.php');

if($privilege!='1' && $privilege !='2'){
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

        <div class="col-md-3"></div>
            <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add a New Staff</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" class="form-horizontal" method="post" action="addstaff.php">
            	<?php require "classes/staffclass.php";
                staff::addstaffproccess();
              ?>
            <div class="box-body">
    <div class="form-group">
        <label class="col-md-2 control-label">ACCOUNT NO</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-usd"></i>
            </span>
            <input type="text"  required name="acno" value="<?php echo !empty($acno)?$acno:'';?>" class="form-control" placeholder="Enter ACCOUNT NO for this staff">
          </div>
        </div>
      
        <div class="clearfix"> </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label">Surname</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-user"></i>
            </span>
            <input type="text"  required name="surname" value="<?php echo !empty($surname)?$surname:'';?>" class="form-control" placeholder="Surname">
          </div>
        </div>
       
        <div class="clearfix"> </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label">Firstname</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-user"></i>
            </span>
            <input type="text"  required name="firstname" value="<?php echo !empty($firstname)?$firstname:'';?>" class="form-control" placeholder="First Name">
          </div>
        </div>
        
        <div class="clearfix"> </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label">Department</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-users"></i>
            </span>


            <select name="department" value="<?php echo !empty($department)?$department:'';?>" class="form-control" required>
               <?php 

                  expensesmgt::selectoption('department','department_name','department_id');
               
               ?>

                
            </select>
          </div>
        </div>

        <div class="clearfix"> </div>
      </div>
       <div class="form-group">
        <label class="col-md-2 control-label">Phone number</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-earphone"></i>
            </span>
            <input type="text"  required name="phonenum" value="<?php echo !empty($phonenum)?$phonenum:'';?>" class="form-control" placeholder="Phone number">
          </div>
        </div>
       
        <div class="clearfix"> </div>
      </div>
      
      <div class="form-group">
        <label class="col-md-2 control-label">Sex </label>
        <div class="col-md-8">
          <div class="input-group input-icon right in-grp1">
            <span class="input-group-addon">
              <i class="fa fa-user"></i>
            </span>
            <select name="sex" id="selector1" class="form-control"  required value="<?php echo !empty($sex)?$sex:'';?>">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    
                  </select>
          </div>
        </div>
       
        
        <div class="clearfix"> </div>
      </div>
      
      <div class="form-group">
        <label class="col-md-2 control-label">Date Of Birth</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </span>
            <input  type="date" name="dateofbirth"   required value="<?php echo !empty($dateofbirth)?$dateofbirth:'';?>" class="form-control" placeholder="mm/dd/yyyy">
          </div>
        </div>
       
        <div class="clearfix"> </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">Qualification</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-book"></i>
            </span>
            <input type="text" name="qualification"  required value="<?php echo !empty($qualification)?$qualification:'';?>" class="form-control" placeholder="Qualification"/>
          </div>
        </div>
      
        <div class="clearfix"> </div>
      </div>
     
      <div class="form-group">
        <label class="col-md-2">Year Joined Establishment</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </span>
            <input type="text" name="yearjoined"  required value="<?php echo !empty($yearjoined)?$yearjoined:'';?>" class="form-control" placeholder="Year Joined">
          </div>
        </div>
       
        <div class="clearfix"> </div>
      </div>
      <div class="form-group">
        <label class="col-md-2">Email</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-envelope-o"></i>
            </span>
            <input type="email" name="email"  value="<?php echo !empty($email)?$email:''; ?>" required placeholder="Enter a valid email address" class="form-control">
          </div>
        </div>
      
        <div class="clearfix"> </div>
      </div>
   
      <div class="col-md-4"></div>
      <button type="submit" class="btn btn-primary col-md-4" name="addstaff">Insert</button>
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
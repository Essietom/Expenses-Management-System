<?php
include 'header.php';
require 'Database/database.php';
?>

<div class="content-wrapper">

<section class="content-header">
     
      <h1> <i class="fa fa-thumbs-up" style="font-size:50px; color:#f56954;"></i>
       Customer_Relation_Manager
        <small>Control panel</small>
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard active"></i> Home</a></li>
        
      </ol>
</section>

<?php
  
  function deletebank(){


  if(isset($_POST['delete']) ){


    if($_POST['del'] == 'YES'){

    $id= $_POST['bankid'];
    $cxn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('Unable to Connect DB'. mysqli_connect_error());
    $sql =" DELETE from bank where  Bank_id=$id";
    $result = mysqli_query($cxn,$sql) or die('Could Not Connect'.mysqli_error($cxn));

    echo "<meta http-equiv='refresh' content='0' url=Customer_rel/bank.php/>";
    
  }else{

   echo "<meta http-equiv='refresh' content='0' url=Customer_rel/bank.php/>";
  
  }

  }


}





  function update(){

    if(isset($_POST['update'])){
      
      $cxn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('Unable to Connect DB'. mysqli_connect_error());
      $id =$_POST['bankid'];
      $name = $_POST['bkname'];
      $acct = $_POST['acct'];

      $sql = "UPDATE bank set Bank_name='$name', Bank_acct='$acct' where Bank_id='$id' ";
      $result = mysqli_query($cxn,$sql);

      echo "<meta http-equiv='refresh' content='0' url=Customer_rel/bank.php/>";

    }


  }

  




	if(isset($_POST['name'])){

		$Errors= array();

		if(empty($_POST['bank'])){

			$Errors[] = "Pls Enter Bank Name";
		}
		else {

			$bank = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['bank']));
		}

    if(empty($_POST['acct'])){

      $Errors[] = "Pls Enter Bank Acctount";
    }
    else {

      $acct = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['acct']));
    }


	if(empty($Errors)){


		$query= "insert into bank (Bank_Name,Bank_acct) values ('$bank','$acct')";
		$result = mysqli_query($cxn,$query);


		if(mysqli_affected_rows($cxn)==1){

			     echo  "<center> <button class='btn btn-success'> <h3> Bank Successfully ADDED </h3> </button> </center";


		}else{

			echo  "Unable To Add The Product Due To internal Error !!! <br> " .mysqli_error($cxn);
		}


	}else{

		echo "The Following Errors Occured";

		foreach ($Errors as $msg ) {
			
			echo "--> $msg <br>"  ;
		}



	}
}




?>





<br><br><br><br>

<div class="col-md-2"> </div>

   <div class="col-md-8">
          <!-- Horizontal Form -->
   <div class="box box-danger">
        <div class="box-header with-border">
              <h1 class="box-title" style="color:red;" font-family:cursive;">BANKS </h1>
    	</div>

      <form class="form-horizontal" method="POST">
             
              <div class="box-footer">
               
               <button type="submit" class="btn btn-success pull-left"> Refresh Page</button> 
                
              </div>
              <!-- /.box-footer -->
            </form>


<ul class="nav nav-tabs" style="color:red;">
 	 <li  role="presentation" class="active"><a href="#addbank" aria-controls="addbank" role="tab" data-toggle="tab" style="color:red;">Add Bank</a></li>
 	 <li   role="presentation"><a href="#viewbank" aria-controls="profile" role="tab" data-toggle="tab" style="color:red;">View All Banks</a></li>
</ul>


<div class="tab-content">



<div role="tabpanel" class="tab-pane active" id="addbank">  
 
<section class="content">
<div class="row">
   <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h2 class="box-title" style="color:red; font-family:cursive;">ADD BANK</h2>
            </div>
          
            <form class="form-horizontal" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Bank Name</label>

                  <div class="col-sm-10">
                    <input required type="text" class="form-control"  placeholder="Bank Name" name="bank">
                  </div>
                </div>


                <div class="form-group">
                  <label  class="col-sm-2 control-label">Bank Account Number</label>

                  <div class="col-sm-10">
                    <input type="text" required class="form-control"  placeholder="Enter Acct Number" name="acct">
                  </div>
                </div>

               

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info pull-right" name='name' >Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
         
        </div>
 </div>
</section>
</div>





<div  role="tabpanel" class="tab-pane"  id="viewbank">            
<section class="content">
   <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <center> <h2 align=center class="box-title"  style="color:red; font-family:cursive;">VIEW ALL BANKS</h2> </center>
          	
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover"  align='right' cellspacing='3' cellpadding='3' width='75%'>
                <tr>
                  <th>ID</th>
                  <th>Bank Name</th>
                  <th>Account Number</th>
                  <th>Action</th>
                  </tr>

                 <tbody>
                 		

              <?php

                 $sql ="select * from bank";
                 $result =mysqli_query($cxn,$sql);

                 $rows = mysqli_num_rows($result);
                 $i=1;
                 if($rows > 0){

                  while($i<=$rows){
                 foreach ($result as $data ) {

                  ?>
                 	
                 	<tr> 
                 	<td align='left'> <?php echo $i?> </td> 
                 	<td align='left'> <?php echo $data['Bank_name'] ?></td>
                  <td align='left'> <?php echo $data['Bank_acct'] ?> </td>

                 	<td>

                      <button  type='submit' class='btn btn-warning btn-flat' data-toggle='modal' data-target="#myModal<?php echo $data['Bank_id'];?>"  ><i class='fa  fa-edit' ></i></button>&nbsp&nbsp

                      <button  type='submit' class='btn btn-danger btn-flat' data-toggle='modal' data-target="#myModal2<?php echo $data['Bank_id'];?>"  ><i class='fa  fa-trash' ></i></button>&nbsp&nbsp

                 	 </td>

                 	</tr>



        <div id="myModal<?php echo $data['Bank_id']; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <form class="form-horizontal" action="" method="POST" role="form">
                <div class="well">

                
                   <label class="control-label">Bank Name</label>
                       <input type="text"  name="bkname" class="form-control" placeholder="Enter Bank Name" value="<?php echo $data['Bank_name'] ?>"><br>

                       <label class="control-label">Account Number</label>
                       <input type="text"  name="acct" class="form-control" placeholder="Enter Account Number" value="<?php echo $data['Bank_acct'] ?>"><br>


                 <input name="bankid" type="hidden" required value="<?php echo $data['Bank_id'];?>"  class="form-control">
                 <button type="submit" class="btn btn-info" data-target="#mymodal" name="update" data-toggle="modal"> update </button> 

               </div>
             </form>

             <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      </div>







        <div id="myModal2<?php echo $data['Bank_id']; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <form class="form-horizontal" action="" method="POST" role="form">
                <div class="well">

                 <label class="control-label">Would You Like To Delete <?php echo $data['Bank_name']?></label>
                       <input type="radio"  name="del" value='YES' > YES &nbsp&nbsp&nbsp&nbsp<input type="radio" value='NO' name="del" >NO <br>  


                 <input name="bankid" type="hidden" required value="<?php echo $data['Bank_id'];?>"  class="form-control">
                 <button type="submit" class="btn btn-info" data-target="#mymodal" name="delete" data-toggle="modal"> Delete </button> 

               </div>
             </form>

             <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      </div>

                  <?php
                 $i++;} }   
               }
               
               deletebank();
              update();

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





</div>

        </div>
        </div>

</div>

<?php
include 'footer.php';
?>
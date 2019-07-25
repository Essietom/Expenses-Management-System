<?php


include 'header.php';
if($privilege!='1' && $privilege !='3' && $privilege !='2'){
  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";

  exit();
}
require 'Database/database.php';

?>

<?php

  function deletecustomer(){

  if(isset($_POST['del']) ){


    if($_POST['del'] == 'YES'){

    $id = $_POST['custid'];
    $cxn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('Unable to Connect DB'. mysqli_connect_error());
    $sql =" DELETE from customer where customer_id=$id";
    $result = mysqli_query($cxn,$sql) or die('Could Not Connect'.mysqli_error($cxn));

    echo "<meta http-equiv='refresh' content='0' url=Customer_rel/viewcustomer.php />";

  }else{

    echo "<meta http-equiv='refresh' content='0' url=Customer_rel/viewcustomer.php/>";

  }

  }


}


function update(){

    if(isset($_POST['update']) ){

            $cxn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('Unable to Connect DB'. mysqli_connect_error());

            $Errors =array();


    if(empty($_POST['fname'])){

      $Errors[] = "Pls Enter First Name";
    }
    else {

      $fname = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['fname']));
    }


    if(empty($_POST['lname'])){

      $Errors[] = "Pls Enter Last Name";
    }
    else {

      $lname = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['lname']));
    }


    if(empty($_POST['sex'])){

      $Errors[] = "Pls SElect The Sex";
    }
    else {

      $sex = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['sex']));
    }

    if(empty($_POST['email'])){

      $Errors[] = "Pls Enter  a Valid Email ";
    }
    else {

      $email = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['email']));
    }

    if(empty($_POST['fone'])){

      $Errors[] = "Pls Enter  a valid Phone Number ";
    }
    else {

      $fone = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['fone']));
    }
    if(empty($_POST['location'])){

      $Errors[] = "Pls Enter The Address ";
    }
    else {

      $location = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['location']));
    }

    if(empty($_POST['desc'])){

      $Errors[] = "Pls Enter a Brief Description ";
    }
    else {

      $desc = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['desc']));
    }
    if(empty($_POST['level'])){

      $Errors[] = "Pls Select A Level For The Customer ";
    }
    else {

      $level = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['level']));
    }
            if(empty($Errors)){


              $id =$_POST['custid'];

              $sql = "UPDATE customer set Last_Name='$lname',First_Name='$fname',sex='$sex',Email='$email',Phone='$level',Description='$desc',Location='$location'  where customer_id=$id ";
              $result = mysqli_query($cxn,$sql) or die('unable to execute query' .mysqli_error($cxn));


              if(mysqli_affected_rows($cxn) ==1){

                 echo "<meta http-equiv='refresh' content='0' url=Customer_rel/viewcustomer.php />";

              }

            }else{

              echo "Some Errors Where Detected<br> ";
              foreach($Errors as $msg){

                echo "--> $msg <br>";


              }
            }


          }


}

?>

<!DOCTYPE html>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


  <!-- Left side column. contains the logo and sidebar -->



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1> <i class="fa fa-thumbs-up" style="font-size:50px; color:#f56954;"></i>
       Customer_Relation_Manager
        <small>Control panel</small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard active"></i> Home</a></li>

      </ol>
</section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">




          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <center> <h1  class="box-title" style="color:red; font-family:cursive;" >View ALL CUSTOMERS</h1> </center>
            </div>
            <!-- /.box-header -->

            <form class="form-horizontal" method="POST">

              <div class="box-footer">

               <button type="submit" class="btn btn-success pull-left"> Refresh Page</button>
               &nbsp&nbsp&nbsp&nbsp

              </div>
              <!-- /.box-footer -->
            </form>


            <div class="box-body">
            <div id="gen-report" >
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                	<th>ID</th>
                  <th>Name</th>
                  <th>Sex</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Location/Address</th>
                  <th>Description</th>
                  <th>Customer Level</th>
                   <th>Action</th>

                </tr>
                </thead>
                <tbody>


              <?php

                 $sql ="SELECT First_Name,Last_Name,sex,Email,Phone,Level,Location,Description,customer_id from customer";
                 $result =mysqli_query($cxn,$sql);

                 $rows = mysqli_num_rows($result);
                 $i=1;
                 if($rows > 0){
                  while ($i <= $rows) {
                 foreach ($result as $data ) {


                  ?>

                 	<tr>

                 	<td align='left'><?php echo $i;?> </td>
                 	<td align='left'><?php echo ucwords($data['First_Name'] . ",". $data['Last_Name']); ?></td>
                 	<td align='left'><?php echo ucwords($data['sex'] );?></td>
                 	<td align='left'><?php echo $data['Email'] ;?></td>
                 	<td align='left'><?php echo number_format((float)$data['Phone'],'0','-','-');?></td>
                 	<td align='left'><?php echo ucwords($data['Location']) ;?></td>
                 	<td align='left'><?php echo ucwords($data['Description'] );?></td>
                 	<td align='left'><?php echo ucwords($data['Level']); ?></td>
                 	<td>

                <button type='submit' class='btn btn-warning btn-flat' data-toggle='modal' data-target="#myModal<?php echo $data['customer_id'];?>" ><i class='fa  fa-edit' ></i></button>&nbsp&nbsp
                <button type='submit' class='btn btn-danger btn-flat' data-toggle='modal' data-target="#myModal2<?php echo $data['customer_id'];?>" ><i class='fa  fa-trash' ></i></button>&nbsp&nbsp
                 	 </td>

                 	</tr>


        <div id="myModal2<?php echo $data['customer_id']; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <form class="form-horizontal" action="" method="POST" role="form">
                <div class="well">


                 <label class="control-label">Would You Like To Delete <?php echo $data['First_Name'].','.$data['Last_Name'];?></label><br>
                      <input type="radio"  name="del" value='YES' > YES &nbsp&nbsp&nbsp&nbsp<input type="radio" value='NO' name="del" >NO <br>


                      <br><br>


                 <input name="custid" type="hidden" required value="<?php echo $data['customer_id'];?>"  class="form-control">
                 <button type="submit" class="btn btn-info" data-target="#mymodal"  data-toggle="modal"> Delete </button>

               </div>
             </form>

             <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      </div>





        <div id="myModal<?php echo $data['customer_id']; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <form class="form-horizontal" action="" method="POST" role="form">
                <div class="well">

                 <label class="control-label">First Name </label>
                    <input type="text" required name="fname" class="form-control" placeholder="Products Price" value="<?php echo $data['First_Name'] ;?>"><br>

                <label class="control-label">Last Name</label>
                <input type="text" required name="lname" class="form-control" placeholder="Discount" value="<?php echo $data['Last_Name'] ;?>"><br>

                  <div class="form-group">

                    <label> Sex </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="radio" name="sex"  value="M" >Male &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="radio" name="sex"  value="F">Female


                  </div>

                      <label class="control-label">Email</label>
                       <input type="Email" required name="email" class="form-control"  value="<?php echo $data['Email'];?>"><br>

                       <label class="control-label">Phone Number</label>
                       <input type="text" required name="fone" class="form-control"  value="<?php echo $data['Phone'];?>"><br>

                       <label class="control-label">Location/Address</label>
                       <input type="text" required name="location" class="form-control"  value="<?php echo $data['Location'];?>"><br>

                       <label class="control-label">Description</label>
                       <input type="text"  required name="desc" class="form-control"  value="<?php echo $data['Description'];?>"><br>


                       <label  class=" control-label">Customer's Level</label>

                      <select name="level" value="<?php echo $data['Level'];?>" class="form-control select2" >

                      <option  value="First Timers">First Timers</option>
                      <option value="Regular/Associates">Regular/Associates</option>
                      <option value="Affiliate">Affiliate</option>

                       </select>

                      <br><br>


                 <input name="custid" type="hidden" required value="<?php echo $data['customer_id'];?>"  class="form-control">
                 <button type="submit" class="btn btn-info" data-target="#mymodal" name="update" data-toggle="modal"> Update </button>

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

                 $i++;

                 }    }
                  deletecustomer();
                  update();
               }
                 ?>




                </tbody>

                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Sex</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Location/Address</th>
                  <th>Description</th>
                  <th>Customer Level</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>






<?php

include 'footer.php';

?>

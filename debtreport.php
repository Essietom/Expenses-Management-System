<?php


include 'header.php';
if($privilege!='1' && $privilege !='3' && $privilege !='2'){
 echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
  exit();
}
require "Database/database.php";

?>


<div class="content-wrapper">

<!-- functions-->

<?php

function getcustomer($var){
$cxn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('Unable to Connect DB'. mysqli_connect_error());
$sql = "select concat(First_Name,',',Last_Name) as name from customer where customer_id=$var ";
$result = mysqli_query($cxn,$sql) or die('Error'.mysqli_error($cxn)) ;

// foreach ($result as $data)
//   {
//     if($data['name'])
//     {
//       return $data['name'];
//     }
//     elseif(is_null('name'))
//       return "no department";
//   }

$data =mysqli_fetch_array($result,MYSQLI_ASSOC);

if(!empty($data['name'])){

	return $data['name'];
 }
 else{
 	return $data['name'];
 }

}

function getnumber($var){
$cxn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('Unable to Connect DB'. mysqli_connect_error());
$sql = "select Phone from customer where customer_id=$var ";
$result = mysqli_query($cxn,$sql) or die('Error'.mysqli_error($cxn)) ;

// foreach ($result as $data)
//   {
//     if($data['name'])
//     {
//       return $data['name'];
//     }
//     elseif(is_null('name'))
//       return "no department";
//   }

$data =mysqli_fetch_array($result,MYSQLI_ASSOC);

if(!empty($data['Phone'])){

	return $data['Phone'];
 }
 else{
 	return $data['Phone'];
 }

}

function getlocation($var){

$cxn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('Unable to Connect DB'. mysqli_connect_error());
$sql = "Select Location from customer where customer_id='$var' ";
$result = mysqli_query($cxn,$sql) or die('Error'.mysqli_error($cxn)) ;

$data = mysqli_fetch_array($result,MYSQLI_ASSOC);

if(!empty($data['Location'])){

	return $data['Location'];
 }
 else{
 	return $data['Location'];
 }

}

function getproduct($var){

$cxn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('Unable to Connect DB'. mysqli_connect_error());
$sql = "Select Products_Name from products where Products_id='$var' ";
$result = mysqli_query($cxn,$sql) or die('Error'.mysqli_error($cxn)) ;

$data = mysqli_fetch_array($result,MYSQLI_ASSOC);

if(!empty($data['Products_Name'])){

	return $data['Products_Name'];
 }
 else{
 	return $data['Products_Name'];
 }

}

?>





<section class="content-header">

      <h1> <i class="fa fa-book" style="font-size:50px; color:#f56954;"></i>
       Customer_Relation_Manager
        <small> ENJOY!!</small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard active"></i> Home</a></li>

      </ol>
</section>



          <div class="box">
            <div class="box-header">
              <center> <h1  class="box-title" style="color:red; font-family:cursive;" >ALL DEBTORS LIST</h1> </center>
            </div>
            <!-- /.box-header -->

            <form class="form-horizontal" method="POST">

              <div class="box-footer">

               <button type="submit" class="btn btn-success pull-left"> Refresh Page</button>

              </div>
              <!-- /.box-footer -->
            </form>





            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Phone Number</th>
                  <th>Location/Address</th>
                  <th>Product Purchased</th>
                  <th>Product Price</th>
                  <th>Amount Owed</th>
                  <th>Purchase Date</th>


                </tr>
                </thead>
                <tbody>


              <?php

                 $sql = "select * from purchase where Paid < Total";
            	 $result = mysqli_query($cxn,$sql) or die('Error'.mysqli_error($cxn));
               $i=1;
                 $rows = mysqli_num_rows($result);

                 if($rows > 0){

                 foreach ($result as $data ) {
                 $customer_id =$data['Customer_id'];
               	 $product_id = $data['Product_id'];

            ?>
          <tr>

                 	<td align='left'> <?php echo $i; ?></td>
                 	<td align='left'> <b style="color:red; font-size:20px;" > <?php  echo ucwords(getcustomer($customer_id)) ;?> </b> </td>
                 	<td align='left'> <?php echo number_format((float)getnumber($customer_id),0,'-','-') ;?></td>
                 	<td align='left'> <?php echo ucwords(getlocation($customer_id)) ;?></td>
                 	<td align='left'> <?php echo ucwords(getproduct($product_id) );?></td>
                 	<td align='left'> <?php echo number_format($data['Product_price']) ;?></td>
                 	<td align='left'><b style="color:red; font-size:20px;" > <?php echo '-'.number_format($data['Debt'] );?> </b> </td>
                 	<td align='left'> <?php echo $data['Date'] ;?> </td>



             <?php
         				$i++;}
               }else{

               	echo "No Debtor";
               }
                 ?>



                </tbody>

                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Phone Number</th>
                  <th>Location/Address</th>
                  <th>Product Purchased</th>
                  <th>Product Price</th>
                  <th>Amount Owed</th>
                  <th>Purchase Date</th>

                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>




</div>



<?php
include 'footer.php';

?>


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
 	return "Error";
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


 <?php 

function set(){

 	if (isset($_POST['go']) ) {
 			
 	$Errors =array();
	
	if(empty($_POST['from'])){

			$Errors[] = "Pls Select The Date To Begin Search";
		}
	
	if(empty($_POST['to'])){

			$Errors[] = "Pls Select The Date To End Search";
		}
	$from = $_POST['from'];
	$to = $_POST['to'];

	

?>

<div class="box box-header">
 <center> <h1  class="box-title" style="color:red; font-family:cursive;" >Showing Purchase Result from <b class="btn btn-success"><?php echo $_POST['from'] ?></b> To <b class="btn btn-success"> <?php echo $_POST['to'] ?> </b>  </h1> </center>
 </div>
 

<?php }// end of set functions


	function select_purchase(){

	set();
	$sql = " SELECT * FROM purchase where Date BETWEEN '$from' and '$to' ";
 	$result = mysqli_query($cxn,$sql);
 	$row = mysqli_num_rows($result);
	}


	function display(){

	select_purchase();
	if(empty($Errors)){

 	if($row> 0){

?>
 	<div class='section'>
 	<div class='box'>
 	<div class='box-body'>

              <table id='example1' class='table table-bordered table-striped'>
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Customer's Name</th>
                  <th>Phone Number</th>
                  <th>Date</th>
                  <th>Location/Address</th>
                  <th>Product</th>
                  <th>Price Of Product</th>
               	  <th>Discount</th>
               	  <th>Paid</th>
               	  <th>Status</th>


                   <th>Action</th>

         </tr>
         </thead>
        <tbody>


 <?php  

               	 foreach ($result as $data ) :
               	 	$customer_id =$data['Customer_id'];
               	 	$products_id = $data['Product_id'];
               	 	$total = $data['Total'];
               	 	$paid = $data['Paid'];
                  $purchase =$data['Purchase_id'];
  ?>

                 	<tr> 

                 	<td align='left'> <?php echo $data['Purchase_id']; ?></td> 
                 	<td align='left'> <?php echo getcustomer($customer_id); ?></td>
                 	<td align='left'> <?php echo getnumber($customer_id); ?></td>
                 	<td align='left'> <?php echo $data['Date']; ?></td> 
                	<td align='left'> <?php echo getlocation($customer_id) ;?></td>
                 	<td align='left'> <?php echo getproduct($products_id); ?></td>
                 	<td align='left'> <?php echo $data['Product_price'] ;?></td>
                 	<td align='left'> <?php echo $data['Discount'] ;?> </td>
                 	<td align='center'> <?php echo $data['Paid']; ?> </td>
                 	
                 	<td align='center' ><?php  echo $paid < $total ? '<span class="btn btn-danger"> <i class="fa fa-times-circle"> </i></span>': '<span class="btn btn-success"> <i class="fa fa-check-square"> </i></span>' ;?></td>



                 	<td>

                      <form method="POST" >
                      <button type='submit'  class='btn btn-danger btn-flat' style='border-radius:10px; width=100px;' name='delete'><i class='fa  fa-trash' ></i> <?php deleteall('purchase',$purchase,'Purchase_id'); ?>
                      
                      </button>&nbsp&nbsp
                   
                      
                       <button type='button' class='btn btn-warning btn-flat'><i class='fa  fa-exchange'></i></button>
                        </form>

                 	 </td>

                 	</tr>
                <?php  endforeach; ?>    
                  
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
        </div>



 	";
<?php
 	}
 }//end OF Errors

 else{

 	echo "The Following Errors Where Detected ";
 	foreach ($Errors as $msg ) {
 		echo " --> $msg <br> "; 
 	}


 }

}//end of display function




 	}// end of main if

 	?>

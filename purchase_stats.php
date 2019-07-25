<?php


include 'header.php';
if($privilege!='1' && $privilege !='3' && $privilege !='2'){
  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
  exit();
}
require 'Database/database.php';

?>

<?php

function deletepurchase(){



  if(isset($_POST['delete']) ){


    if($_POST['del'] == 'YES'){

      $purchid = $_POST['purch_id'];
      $cxn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('Unable to Connect DB'. mysqli_connect_error());
      $sql =" DELETE from purchase where  Purchase_id=$purchid";
      $result = mysqli_query($cxn,$sql) or die('Could Not Connect'.mysqli_error($cxn));

      echo "<meta http-equiv='refresh' content='0' url=Customer_rel/purchase_stats.php?from=$from&go=&to=$to/>";

    }else{

      echo "<meta http-equiv='refresh' content='0' url=Customer_rel/purchase_stats.php?from=$from&go=&to=$to/>";

    }

  }


}

function getvendor($var){
  $cxn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('Unable to Connect DB'. mysqli_connect_error());
  $sql = "SELECT concat(First_Name,',',Last_Name) as name from staff where staff_id='$var' ";
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
  return "Error ooooo";
 }



}



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

function updatepayment(){

 if(isset($_POST['update']) ){

  $cxn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('Unable to Connect DB'. mysqli_connect_error());

  $Errors =array();


  if(!is_numeric($_POST['price'])){

    $Errors[] = "Pls Enter The Price Of The Product";
  }
  else {

    $price = $_POST['price'];
  }

  if(!is_numeric($_POST['discount'])){

    $Errors[] = "Pls Enter Discount @ Last 0 ";
  }
  else {

    $discount = $_POST['discount'];
  }

  if(!is_numeric($_POST['paid'])){

    $Errors[] = "Pls Enter The Amount Paid ";
  }
  else {

    $paid =$_POST['paid'];
  }


  if(empty($Errors)){

    $quan =$_POST['quan'];
    $total= ($price  * $quan) - $discount;
    $debt =$total -$paid;



    $purchid =$_POST['purch_id'];



    $sql = "UPDATE purchase set Product_price='$price',Discount='$discount',Paid='$paid',Debt='$debt',Total='$total' where Purchase_id=$purchid ";
    $result = mysqli_query($cxn,$sql) or die('unable to execute query' .mysqli_error($cxn));


    if(mysqli_affected_rows($cxn) ==1){
     echo "<meta http-equiv='refresh' content='0' url=Customer_rel/purchase_stats.php?from=$from&go=&to=$to/>";

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

<div class="content-wrapper">



  <section class="content-header">

    <h1> <i class="fa fa-book" style="font-size:50px; color:#f56954;"></i>
     Customer_Relation_Manager
     <small>Control panel</small>
   </h1>

   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard active"></i> Home</a></li>

  </ol>
</section>


<section class="content">

  <div class="row">

   <div class="box box-solid bg-aqua">
     <form method="GET">
       <div class="col-md-1"> </div>

       <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>From</h3>
          </div>

          <div class="form-group">
            <br><br>
            <div class="col-sm-12">
              <input style ="border-radius:10px;" type="date" class="form-control pull-left" name="from">
            </div>
          </div>
          <div class="icon">
            &nbsp<i class="fa fa-calendar"></i>
          </div> <br><br>
          <span class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></span>
        </div>
      </div>

      <div class="col-lg-3">

        <div class="box-footer">


          <button type="submit" class="btn btn-block btn-success btn-lg" name="go">GO</button>


        </div>
        <!-- /.box-footer -->

      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>TO</h3>
          </div>

          <div class="form-group">
            <br><br>
            <div class="col-sm-12">
              <input style ="border-radius:10px; " type="date" class="form-control pull-left" name="to">
            </div>

          </div>
          <div class="icon">
            &nbsp<i class="fa fa-calendar"></i>
          </div> <br><br>
          <span class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></span>
        </div>
      </div>


    </form>
  </div>
</div>


</section>

<?php

if (isset($_GET['go']) ) {

  $Errors =array();

  if(empty($_GET['from'])){

   $Errors[] = "Pls Select The Date To Begin Search";
 }


 if(empty($_GET['to'])){

   $Errors[] = "Pls Select The Date To End Search";
 }



 $from = $_GET['from'];
 $to = $_GET['to'];

 ?>

 <form class="form-horizontal" method="POST">

  <div class="box-footer">

   <button type="submit" class="btn btn-success pull-left"> Refresh Page</button>


 </div>
 <!-- /.box-footer -->
</form>
<!-- <button class="btn btn-info" onclick="javascript:downloadPDF()">DOWNLOAD PDF</button>  -->

<div class="box box-header">



  <center> <h1  class="box-title" style="color:red; font-family:cursive;" >Showing Purchase Result from <b class="btn btn-success"><?php echo $_GET['from']; ?></b> To <b class="btn btn-success"><?php echo $_GET['to']; ?> </b>  </h1>
  </center>
</div>

<?php



$sql = " SELECT * FROM purchase where Date BETWEEN '$from' and '$to' ";
$result = mysqli_query($cxn,$sql) or die('unable to perform query'.mysqli_error($cxn));

$row = mysqli_num_rows($result);
$i=1;


  if(empty($Errors)){

    if($row> 0){

      echo"
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

                  <th>Quantity</th>
                  <th>Price Of Product</th>
                  <th>Discount</th>
                  <th>Paid</th>
                  <th>Status</th>


                  <th>Action</th>

                </tr>
              </thead>
              <tbody>";


              foreach ($result as $data ) :
              $customer_id =$data['Customer_id'];
              $products_id = $data['Product_id'];
              $total = $data['Total'];
              $paid = $data['Paid'];
              $purchase =$data['Purchase_id'];
              $quantity = $data['Quantity'];





              ?>

              <tr>

                <td align='left'> <?php echo $i ;?></td>
                <td align='left'> <?php echo getcustomer($customer_id) ;?></td>
                <td align='left'> <?php echo number_format((float)getnumber($customer_id),'0','-','-') ;?></td>
                <td align='left'> <?php echo $data['Date'] ;?></td>
                <td align='left'> <?php echo ucwords(getlocation($customer_id)) ;?></td>
                <td align='left'> <?php echo ucwords(getproduct($products_id)); ?></td>

                <td align='left'> <?php echo $data['Quantity']; ?> </td>
                <td align='left'> <?php echo number_format($data['Product_price'] );?></td>
                <td align='left'> <?php echo number_format($data['Discount']) ;?> </td>
                <td align='center'> <?php echo number_format($data['Paid']); ?> </td>


                <td align='center' ><?php  echo $paid < $total ? '<span class="btn btn-danger"> <i class="fa fa-times-circle"> </i></span>': '<span class="btn btn-success"> <i class="fa fa-check-square"> </i></span>' ;?></td>
                <td>



                  <button type='submit' class='btn btn-warning' style='border-radius:10px;'  data-toggle='modal' data-target="#myModal<?php echo $data['Purchase_id'] ;?>"  ><i class='fa  fa-edit' ></i>

                  </button>&nbsp&nbsp


                  <button type='submit' class='btn btn-danger btn-flat' data-toggle='modal'  data-target="#myModal2<?php echo $data['Purchase_id'] ;?>" ><i class='fa  fa-trash'></i></button>

                </td>

              </tr>



              <div class="modal fade" role="dialog"  id="myModal<?php echo $data['Purchase_id']; ?>" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <form class="form-horizontal" action="" method="POST" role="form">
                        <div class="well">

                         <label class="control-label">Product Price</label>
                         <input type="number"  name="price" class="form-control" placeholder="Products Price" value="<?php echo $data['Product_price']; ?>"><br>

                         <label class="control-label">Discount</label>
                         <input type="number"  name="discount" class="form-control" placeholder="Discount" value="<?php echo $data['Discount'] ;?>"><br>

                         <label class="control-label">Paid</label>
                         <input type="number" name="paid" class="form-control"  value="<?php echo $data['Paid'];?>"><br>


                         <input name="purch_id" class="form-control" type="hidden" value="<?php echo $data['Purchase_id'];?>" >
                         <input name="quan" class="form-control" type="hidden" value="<?php echo $data['Quantity'];?>" >

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


              <div class="modal fade" role="dialog"  id="myModal2<?php echo $data['Purchase_id']; ?>" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <form class="form-horizontal" action="" method="POST" role="form">
                        <div class="well">

                          <label class="control-label">Would You Like To Delete <?php echo getcustomer($customer_id);?>'s Purchase History </label>
                          <input type="radio"  name="del" value='YES' > YES &nbsp&nbsp&nbsp&nbsp<input type="radio" value='NO' name="del" >NO <br>



                          <input name="purch_id" class="form-control" type="hidden" value="<?php echo $data['Purchase_id'];?>" >
                          <button type="submit" class="btn btn-info" data-target="#mymodal" name="delete" data-toggle="modal"> update </button>
                        </div>
                      </form>
                      <div class="modal-footer">

                      </div>
                    </div>
                  </div>
                </div>
              </div>




          <?php  $i++; endforeach;    ?>


        </tbody>

        <tfoot>
          <tr>
            <th>ID</th>
            <th>Customer's Name</th>
            <th>Phone Number</th>
            <th>Date</th>
            <th>Location/Address</th>
            <th>Product</th>

            <th>Quantity</th>
            <th>Price Of Product</th>
            <th>Discount</th>
            <th>Paid</th>
            <th>Status</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>




<?php
}
 }//end OF Errors


 else{

 	echo "The Following Errors Where Detected ";
 	foreach ($Errors as $msg ) {
 		echo " --> $msg <br> ";
 	}


 }




 	}// end of main if


  updatepayment();
  deletepurchase();
  ?>








</div>

<script type="text/javascript" src="js/jspdf.js"></script>
<script type="text/javascript" src="js/jspdf.debug.js"></script>
<script type="text/javascript">
        function downloadPDF() {
            var pdf = new jsPDF('p', 'pt', 'letter');
            source = $('#pay-report')[0];
         specialElementHandlers = {
                '#bypassme': function(element, renderer) {
                    return true
                }
            };
            margins = {
                top: 80,
                bottom: 60,
                left: 40,
                width: 522
            };
            pdf.fromHTML(
                    source,
                    margins.left,
                    margins.top, {
                        'width': margins.width,
                        'elementHandlers': specialElementHandlers
                    },
            function(dispose) {
                pdf.save('<?php echo $startdate . '-' .$enddate; ?> Payment Report.pdf');
            }
            , margins);
        }
    </script>
<?php

include 'footer.php';
?>

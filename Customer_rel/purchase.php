<?php 

include 'header.php';
include 'Database/database.php';
?>




<div class="content-wrapper">


<section class="content-header">
     
      <h1> <i class="fa fa-thumbs-up" style="font-size:50px; color:#f56954;"></i>
       Customer_Relation_Manager
        <small style="color:red;">ADD PURCHASE</small>
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard active"></i> Home</a></li>
        
      </ol>
</section>


  <?php


  if($_SERVER['REQUEST_METHOD'] == "POST"){



    $Errors= array();

    if(empty($_POST['name'])){

      $Errors[] = "Pls Select Customer Name";
    }
    else {

      $name = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['name']));
    }


    if(empty($_POST['prod'])){

      $Errors[] = "Pls Select The Product";
    }
    else {

      $prod = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['prod']));
    }


    if(!is_numeric($_POST['price'])){

      $Errors[] = "Pls Enter The Price Of The Product";
    }
    else {

      $price = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['price']));
    }

    if(!is_numeric($_POST['discount'])){

      $Errors[] = "Pls Enter Discount @ Last 0 ";
    }
    else {

      $discount = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['discount']));
    }


    if(!is_numeric($_POST['quantity'])){

      $Errors[] = "Pls Enter TThe Qunatity Of The Products ";
    }
    else {

      $quantity = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['quantity']));
    }

    if(!is_numeric($_POST['paid'])){

      $Errors[] = "Pls Enter The Amount Paid ";
    }
    else {

      $paid = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['paid']));
    }

    if(empty($_POST['mode'])){

      $Errors[] = "Pls Enter The Mode Of Payment";
    }
    else {

      $mode = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['mode']));
    }

   

    if(empty($_POST['bank'])){

      $Errors[] = "Pls Select The Bank ";
    }
    else {

      $bank = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['bank']));
    }
  
    if(empty($_POST['date'])){

      $Errors[] = "Pls Select The Date ";
    }
    else {

      $date = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['date']));
    }

    if(empty($_POST['desc'])){

      $Errors[] = "Pls Enter Aa Brief Description ";
    }
    else {

      $desc = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['desc']));
    }




  if(empty($Errors)){

  $total= ($price * $quantity) - $discount;
  $debt =$total -$paid;

  

    $sql = "insert into purchase (Customer_id,Product_id,Payment_id,Date,Product_price,Discount,Paid,Debt,Total,Quantity,Description) values 
    ('$name','$prod','$mode','$date','$price','$discount','$paid','$debt','$total','$quantity','$desc')"; 

    $result = mysqli_query($cxn,$sql);


    if(mysqli_affected_rows($cxn)==1){

echo  "<center> <button class='btn btn-success'> <h3> Purchase Successfully ADDED </h3> </button> </center";
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


<br><br><br>



<div class="content">
<div class="row">

<div class="col-md-2"> </div>
   <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h2 class="box-title" style="color:red; font-family:cursive;">Purchase </h2>
            </div>
          
            <form class="form-horizontal" method="POST">
              <div class="box-body">



           <div class="form-group">
                  <label  class="col-sm-2 control-label">Customer's Name</label>

                  <div class="col-sm-10">
                     
                
                <select name="name" required value="" class="form-control select2" style="width: 100%;">
                <option value="">--choose--</option>

                <?php

                $sql = "select concat(First_Name,',',Last_Name) as name ,customer_id  from customer";
                $result= mysqli_query($cxn,$sql);


                 foreach ($result as $data ) {
                  
                  echo"
                  <option value='".$data['customer_id']."'>".$data['name']."</option>

                  ";

                  }

                ?>

                  
                 
                </select>
              
            </div>
            </div>



             <div class="form-group">
                  <label  class="col-sm-2 control-label">Products</label>

                  <div class="col-sm-10">
                     
                
                <select name="prod" required value="" class="form-control select2" style="width: 100%;">
                <option value="">--choose--</option>

               <?php

                $sql = "select Products_id,Products_Name from products";
                $result= mysqli_query($cxn,$sql);


                 foreach ($result as $data ) {
                  
                  echo"
                  <option value='".$data['Products_id']."'>".$data['Products_Name']."</option>

                  ";

                  }

                ?>
                  
                 
                </select>
              
            </div>
            </div>


          






              <div class="form-group">
                  <label  class="col-sm-2 control-label">Quantity</label>

                  <div class="col-sm-10">
                    <input type="number" required class="form-control"  placeholder="Enter Quanty Of Products Purchased" name="quantity" style="width: 30%;"">
                  </div>
                </div> 



                <div class="form-group">
                  <label  class="col-sm-2 control-label">Price</label>

                  <div class="col-sm-10">
                    <input type="number" required class="form-control"  placeholder="Enter Price Of a Single Quanty OF The Products" name="price" style="width: 30%;"">
                  </div>
                </div>  

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Discount</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control"  required placeholder="Enter Discount @ least 0" name="discount" style="width: 30%;"">
                  </div>
                </div> 


                 <div class="form-group">
                  <label  class="col-sm-2 control-label">Amount Paid By Customer</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" required placeholder="Enter Amount Paid By The Customer" name="paid" style="width: 30%;"">
                  </div>
                </div> 


                  <div class="form-group">
                  <label  class="col-sm-2 control-label">Mode Of Payment</label>

                  <div class="col-sm-10">
                     
                
                <select name="mode" value="" required class="form-control select2" style="width: 75%;">
                <option value="">--choose--</option>

                 
                  <option value="Cheque">Cheque</option>
                  <option  value="Cash">Cash</option>
                  <option value="Transfer">Transfer</option>
                  
                 
                </select>
              
            </div>
            </div>


          <div class="form-group">
                  <label  class="col-sm-2 control-label">Banks</label>

                  <div class="col-sm-10">
                     
                
                <select name="bank" value="" required class="form-control select2" style="width: 100%;">
                <option value="">--choose--</option>

                  <?php

                $sql = "select * from bank";
                $result= mysqli_query($cxn,$sql);


                 foreach ($result as $data ) {
                  
                  echo"
                  <option value='".$data['Bank_id']."'>".$data['Bank_name']."</option>

                  ";

                  }



                ?>
                 
                </select>
              
            </div>
            </div>


                <div class="form-group">
                  <label  class="col-sm-2 control-label">Date</label>

                  <div class="col-sm-10">
                    <input type="date" class="form-control" required placeholder="Select Date" name="date" style="width: 30%;"">
                  </div>
                </div>  



                 <div class="form-group">
                  
                  <label class="col-sm-2 control-label">Other Comments</label>

                  <div class="col-sm-10">
                    <textarea placeholder="Brief Description" required name="desc" class="form-control"  ></textarea>
                   </div>

                </div>

                
                
              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-info">Reset</button>
             
                <button type="submit" class="btn btn-danger pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
         
        </div>



</div>
</div>

</div>





<?php 

include 'footer.php';

?>
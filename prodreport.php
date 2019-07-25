<?php


include 'header.php';
if($privilege!='1' && $privilege !='3' && $privilege !='2'){
  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
  exit();
}
include 'Database/database.php';
?>

<?php


// function

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


<div class="content-wrapper">

<section class="content-header">

      <h1> <i class="fa fa-book" style="font-size:50px; color:#f56954;"></i>
       Customer_Relation_Manager
        <small> ENJOY!!</small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard active"></i> Home</a></li>

      </ol>
 </section>

<br> <br>

<div class="row">
<div class="box box-solid">

 <form method="POST">


 		<div class="col-lg-2"> </div>

        <div class="col-lg-5 col-xs-6">
          <div class="small-box btn-success">
            <div class="inner">
              <h3>Select Product</h3>
            </div>

            <div class="form-group">
                <br><br>
             <div class="col-sm-10">


                <select name="product" value="" class="form-control select2" style="width: 100%;">
                <option value="">--choose--</option>

                <?php

                $sql = "SELECT  Products_id,Products_Name from products";
                $result= mysqli_query($cxn,$sql) or die('unable to perform query'.mysqli_error($cxn));


                 foreach ($result as $data ) {

                  echo"
                  <option value='".$data['Products_id']."'>".$data['Products_Name']."</option>

                  ";

                  }



                ?>

                </select>

            </div>
            </div>
            <div class="icon">
              &nbsp<i class="fa fa-firefox"></i>
            </div> <br><br>
            <span class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></span>
          </div>
          </div>


          <div class="col-lg-3">
             <br> <br> <br>
              <div class="box-footer">


                    <button type="submit" class="btn btn-block btn-info btn-lg" name="go">GO</button>


              </div>
              <!-- /.box-footer -->

         </div>
</form>
 </div>
 </div>


    <?php
         if(isset($_POST['go']) && !empty($_POST['product'])):
         $product = $_POST['product'];
         $sql= "select * from purchase where product_id =$product";
         $result = mysqli_query($cxn,$sql) or die('Unable To perform Query'.mysqli_error($cxn));

         $row = mysqli_num_rows($result);

        if($row> 0 ):

    ?>

<div class='section'>
<div class='box'>
<div class='box-body'>

<div class="box box-header">
              <center> <h1  class="box-title" style="color:red; font-family:cursive;" >Showing Purchase Result For <b class="btn btn-warning"> <?php echo getproduct($product); ?> </b> Product  </h1> </center>
 </div>

<table id='example1' class='table table-bordered table-striped'>
<thead>
                <tr>
                  <th>Purchase ID</th>
                  <th>Products's Name</th>
                  <th>Date Of Purchase</th>
                  <th>Purchased By</th>
                  <th>Price Of Product</th>
                  <th>Amount Paid</th>


                </tr>
</thead>
<tbody>

    <?php
          foreach ($result as $data ):
          $product = $data['Product_id'];
          $customer = $data['Customer_id'];

    ?>

    <tr>

     <td align='left'> <?php echo $data['Purchase_id']; ?></td>
     <td align='left' style="font-size:14px; font-weight:bold;"> <?php echo getproduct($product); ?></td>
     <td align='left'> <?php echo $data['Date'] ;?></td>
     <td align='left' style="font-size:14px; font-weight:bold;"> <?php echo getcustomer($customer); ?></td>
     <td align='left'> <?php echo $data['Product_price'] ;?></td>
     <td align='left'> <?php echo $data['Paid'] ;?></td>


    </tr>

    <?php endforeach;?>


</tbody>

                <tfoot>
                <tr>
                  <th>Purchase ID</th>
                  <th>Products's Name</th>
                  <th>Date Of Purchase</th>
                  <th>Purchased By</th>
                  <th>Price Of Product</th>

                </tr>
                </tfoot>
              </table>
        </div>
        </div>
        </div>


  <?php endif;

  if($row == 0):

  ?>

    <br><br><br><br><br>
    <center>
    <div class="col-lg-2"></div>
     <div class="col-lg-8">
          <div class="box box-danger box-solid">
            <div class="box-header">
              <i class="fa fa-refresh fa-spin"> </i><h3 class="box-title"> No Purchase Record For The Selected Product </h3>
            </div>

          </div>
          <!-- /.box -->
        </div>

  </center>

  <?php endif ;?>


  <?php
   endif;

  if(isset($_POST['go']) && empty($_POST['product'])):

  ?>

      <br><br><br><br><br>
    <center>
    <div class="col-lg-2"></div>
     <div class="col-lg-8">
          <div class="box box-danger box-solid">
            <div class="box-header">
              <i class="fa fa-refresh fa-spin"> </i><h3 class="box-title"> Kindly Select a Product </h3>
            </div>

          </div>
          <!-- /.box -->
        </div>

  </center>

<?php endif;?>


</div>





<?php
include 'footer.php';
?>

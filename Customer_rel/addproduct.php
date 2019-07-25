<?php

include 'header.php';

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


	if($_SERVER['REQUEST_METHOD'] == "POST"){

		require 'Database/database.php';

		$Errors= array();

		if(empty($_POST['product_name'])){

			$Errors[] = "Pls Enter The Name Of The Products";
		}
		else {

			$prod_name = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['product_name']));
		}


		if(empty($_POST['product_price'])){

			$Errors[] = "Pls Enter The Products Price";
		}
		else {

			$prod_price = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['product_price']));
		}


		if(empty($_POST['product_desc'])){

			$Errors[] = "Pls Enter A Brief Description  Of The Product";
		}
		else {

			$prod_desc = htmlspecialchars(mysqli_real_escape_string($cxn,$_POST['product_desc']));
		}

	


	if(empty($Errors)){


		$query= "insert into products (Products_Name,Price,Description) values ('$prod_name','$prod_price','$prod_desc')";
		$result = mysqli_query($cxn,$query);


		if(mysqli_affected_rows($cxn)==1){

			echo  "<center> <button class='btn btn-success'> <h3> Product Successfully ADDED </h3> </button> </center";

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









    <!-- Content Header (Page header) -->
   

    <br><br><br><br>

<div class="content-">
 <div class="row">

<div class="col-md-2"> </div>
   <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h2 class="box-title" style="color:red; font-family:cursive;">ADD PRODUCTS</h2>
            </div>
          
            <form class="form-horizontal" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Product Name</label>

                  <div class="col-sm-10">
                    <input type="text" required class="form-control"  placeholder="Produts Name" name="product_name">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2  control-label">Product Price</label>

                  <div class="col-sm-10">
                    <input type="text" required class="form-control"  placeholder="Produts Price" name="product_price">
                  </div>
                </div>

                <div class="form-group">
                  
                  <label class="col-sm-2 control-label">Product Description:</label>

                  <div class="col-sm-10">
                    <textarea required placeholder="Product Description" name="product_desc" class="form-control"  ></textarea>
                   </div>

                </div>
              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
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
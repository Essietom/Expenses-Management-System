<?php

include 'header.php';
require 'Database/database.php';
?>



<?php 

function uploadcustomer(){
	$cxn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('Unable to Connect DB'. mysqli_connect_error());
	$c= NULL;
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		if (isset($_FILES['file'])) {
			include 'simplexlsx.class.php';


			$xlsx = new SimpleXLSX($_FILES['file']['tmp_name']);
			list($num_cols, $num_rows) = $xlsx->dimension();
			$f = 0;
			$data = array();
			$count =0;
			foreach( $xlsx->rows() as $r ) 
			{
				
				if ($f == 0)
				{
					$f++;
					continue;
				}
				for( $i=0; $i < $num_cols; $i++ )
				{
					if ($i == 0)	    $data['f_name']		=	$r[$i];
					else if ($i == 1)	$data['lname']		=	$r[$i];
					else if ($i == 2)	$data['sex']		=	$r[$i];
					else if ($i == 3)	$data['email']		=	$r[$i];
					else if ($i == 4)	$data['phone']		=	$r[$i];
					else if ($i == 5)	$data['location']	=	$r[$i];
					else if ($i == 6)	$data['desc']		=	$r[$i];
					else if ($i == 7)	$data['level']		=	$r[$i];
					$fname=$r[0];
					$lname=$r[1];
					$sex=$r[2];
					$email=$r[3];
					$fone=$r[4];
					$location=$r[5];
					$desc=$r[6];
					$level=$r[7];
				
					
				}
				
				$query= "INSERT into customer (First_Name,Last_Name,sex,Email,Phone,Level,Location,Description) values  ('$fname','$lname','$sex','$email','$fone','$level','$location','$desc')";
				$rquery=mysqli_query($cxn,$query);
				$count++;
			}
			
			if(mysqli_affected_rows($cxn)>0)
			{
				if($count  >1){ $c='s';}
     echo  "<center> <button class='btn btn-success'> <h3>$count Customer$c Successfully ADDED </h3> </button> </center>";


			}
			else
			{
				echo "sorry you cant upload this file due to a system error".mysqli_error($cxc);
			}
		}


	}





}




?>
<div class="content-wrapper">
	
	<section class="content-header">

		<h1> <i class="fa fa-thumbs-up" style="font-size:50px; color:#f56954;"></i>
			Customer_Relation_Manager
			<small>Upload Customer's Details</small>
		</h1>

	</section>

	<div class="content">

		<div class="col-md-6">
			<div class="box box-danger">
				<div class="box-header">
					<h3 class="box-title">  <i class="fa fa-refresh fa-spin"></i> Upload Customer Details [Excel Format Only]</h3>
				</div>
				<div class="box-body">
					<form role="form"   method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label >Upload expenses</label>
							<input type="file" name="file" id="file" required="">
							<p class="help-block">Excel files only</p>
						</div>

						<?php   uploadcustomer(); ?>
						<div class="box-footer">
							<button type="submit" class="btn btn-success" name="import" value="import">Upload </button>
						</div>
					</form>
				</div>


			</div>

		</div>

	</div>





</div>



<?php include 'footer.php'; ?>
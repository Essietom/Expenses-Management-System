<?php


//delete function


function delete($table,$id,$columnname){
$cxn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('Unable to Connect DB'. mysqli_connect_error());

if(isset($_POST['delete'])){

	$sql ="delete from $table where $columnname =$id";
	$result = mysqli_query($cxn,$sql);
	// echo " <meta http-equiv='refresh' content='0; url=genreport.php'/>";
	if (mysqli_affected_rows($cxn) == 1){

		echo "WOrk";

	}else{

		echo "Failed";
	}

}


}



?>
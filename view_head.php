<?php
	echo "Headers";
	$_SESSION['name'] = 'Williams';
	print_r(headers_list());
	if(isset($_SESSION)){

		var_dump($_SESSION);
	}
	else{

		echo "Session is not set";
	}
?>
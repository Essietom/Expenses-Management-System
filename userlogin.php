<?php
session_start();
require "classes/class.php";



$err_msg=array();
$valid=true;

$username=htmlspecialchars(stripslashes($_POST['username']));
$password=htmlspecialchars(stripslashes($_POST['password']));

if($_POST['username']=='')
{
	$valid=false;
	$err_msg[]="Username missing";
}

if($_POST['password']=='')
{
	$valid=false;
	$err_msg[]="Password missing";
}

if($valid)
{
	$sql= "SELECT * FROM user WHERE username=? AND password=?";
	$query=expensesmgt::calldb()->prepare($sql);
	$query->execute(array(
		$username,
		$password
		));
	$data=$query->fetch(PDO::FETCH_ASSOC);
	
	if($data )
	{
		
	    session_regenerate_id();
		$_SESSION['SESS_USER_ID']=$data['id'];
		$_SESSION['SESS_USER_NAME']=$data['name'];
		$_SESSION['PRIVILEGE']=$data['privilege_id'];
		session_write_close();
	

		

			header("location:home.php");
			exit();
	
		
		
	
	}

	
	else
	{
		header("location:index.php");
	exit();
	}
}
else
{
	$_session['ERRMSG_ARR']=$err_msg;
	session_write_close();
	header("location:index.php");
	exit();
}

?>
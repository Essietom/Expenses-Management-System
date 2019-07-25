<?php
require "models/database.php";
class expensesmgt
{

	public static function calldb()
	{
		$pdo=Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}

	public static function closedb()
	{
		Database::disconnect();
	}



	public static function insert($tablename,$columnlist,$valuelist)
	{
		
		$sql="INSERT INTO $tablename($columnlist) VALUES ($valuelist)";
		$query=self::calldb()->query($sql);
		
	}

	public static function viewintable($tablename)
	{

		$sql="SELECT * FROM $tablename";
	
	    $query=self::calldb()->prepare($sql);
		$query->execute();
		return $query;
	   
	}

	public static function delete($tablename,$idintable,$id)
	{
		
		$sql="DELETE FROM $tablename WHERE $idintable=$id";
		$query=self::calldb()->query($sql);
	}

	public static function select($columnlist,$tablelist,$columnid,$id)
	{
		if($columnid="")
		{
			$sql="SELECT $columnlist FROM $tablename";
		}
		else
		{
		    $sql="SELECT $columnlist FROM $tablename WHERE $columnlist=$id";
	    }
		$query=self::calldb()->query($sql);
		$data=$query->fetch(PDO::FETCH_ASSOC);
	}


	public static function selectoption($table,$column,$value)
	{ 
		$sql="SELECT * FROM $table";
		$rquery=self::calldb()->query($sql);
		
		foreach ($rquery as $data) 
		{
			echo'<option value="'.$data[$value].'">'.$data[$column].'</option>';
		}
	}

	public static function numberof($subject)
	{

		$sql="SELECT * FROM $subject";
		$query=self::calldb()->query($sql);
		$query->execute();
		$rows=$query->rowCount();
		return $rows;
	}


}


?>
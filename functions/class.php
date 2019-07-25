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

	public static function reminder($table,$column)
	{
		$date=date("Y-m-d");
		$sql="SELECT max($column) as lastentry from $table";
		$query=expensesmgt::calldb()->query($sql);
		foreach ($query as $data) {
			if($data['lastentry']!=$date)
			{
				echo "You lazy ass, you have not used me today, c'mon get to work";
			}
		}
    }

   

    public static function selectmonth()
    {
    	$montharray=array(
    		'1'=>'January', '2'=>'February', '3'=>'March', '4'=>'April', '5'=>'May', '6'=>'June', '7'=>'July', '8'=>'August', '9'=>'September', '10'=>'October', '11'=>'November', '12'=>'December' 
    		);
    	echo "<select name='month'>";
    	echo "<option value=''>"."Select Month</option>";
    	foreach ($montharray as $key => $data) 
    	{
    		echo "<option value='".$key."'>".$data."</option>";
    	}

    	echo "</select>";
    }

     public static function selectyear()
    {
    	echo "<select id='year' name='year'>";
  		
  		for($i = 2015; $i < 2030; $i++)
  		{
	 	 echo '<option value="'.$i.'">'.$i.'</option>';
  		}

		echo "</select>";
    }

}


?>
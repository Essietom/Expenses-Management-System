<?php
require "functions/class.php";
class department
{
	public static function deletedepartment()
	{
		if (isset($_POST['delete']))
		 {


 	 		$id = $_POST['department_id'];
			expensesmgt::delete(department,department_id,$id);
 			echo "<meta http-equiv='refresh' content='0; url=adddepartment.php'/>";
		 }
	}


	public static function viewdepartment()
	{
		foreach(expensesmgt::viewintable('department') as $data)
        {
       
           echo " <tr>";
           echo "<td>".$data['department_id']."</td>";
           echo "<td>" .$data['department_name']."</td>";
           echo "<td>" .$data['department_desc']."</td> ";
           echo "<form action='' method='POST'>";
      	   echo "<input type='hidden' class='form-control' name='department_id' value='". $data['department_id'] . "'/>";
      	   ?>
     	   <td><button type='submit' class='btn btn-danger' name='delete' onclick="return confirm('Are you sure you want to delete this item?');"/>DELETE</button></td>
           </form>

           </tr>
           <?php
       }
	}


	public static function adddepartmentprocess()
	{
		if(isset($_REQUEST['adddept']))
		{


			$deptname=htmlspecialchars($_POST['deptname']);
			$deptdesc=htmlspecialchars($_POST['deptdesc']);

			$valid=true;

			if(empty($_POST['deptname']))
			{
				$valid=false;
				$deptnameError="Enter department name";
			}

			if ($valid)
			{
				$sql="INSERT INTO department (department_name,department_desc) VALUES ('$deptname','$deptdesc')";
					$query=expensesmgt::calldb()->query($sql);


			}
			else
			{
				echo "error";
			}

		}
	}
}
?>
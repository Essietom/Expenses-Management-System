<?php
require "functions/class.php";
class todolist
{

	function dateDiff($start, $end) {

		$start_ts = strtotime($start);

		$end_ts = strtotime($end);

		$diff = $end_ts - $start_ts;

		return round($diff / 86400);

	}




	public static function deleteitem()
	{
		if (isset($_POST['delete']))
		 {


 	 		$id = $_POST['id'];
			expensesmgt::delete(todo-list,id,$id);
 			echo "<meta http-equiv='refresh' content='0; url=addtodolist.php'/>";
		 }
	}


	public static function viewlist($privilege)
	{

		$sql="SELECT * from todo-list where privilege='$privilege' and date > date(now())";
		$query=expensesmgt::calldb()->query($sql);
		foreach($query as $data)
        	?>

                        <li>
                  <!-- drag handle -->
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- checkbox -->
                  <input type="checkbox" value="">
                  <!-- todo text -->
                  <span class="text">Design a nice theme</span>
                  <!-- Emphasis label -->
        
                  <small class="label label-danger"><i class="fa fa-clock-o"></i><?php {echo dateDiff(now()s, "2006-04-01");?></small>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
               </ul>
              <?php  
       
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
		if(isset($_REQUEST['additem']))
		{


			$title=htmlspecialchars($_POST['title']);
			$content=htmlspecialchars($_POST['content']);
			$time=htmlspecialchars($_POST['time']);
			$content=htmlspecialchars($_POST['content']);

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
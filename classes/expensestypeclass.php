<?php
require "functions/class.php";

class expensestype
{
	public static function deleteexpensestype()
	{
		if (isset($_POST['delete']))
		 {

 	 		$id = $_POST['expenses_type_id'];
			expensesmgt::delete('expenses_type','expenses_type_id',$id);
 			echo "<meta http-equiv='refresh' content='0; url=expensesmgt.php'/>";
		 }
	}


	public static function viewexpensestype()
	{
		foreach (expensesmgt::viewintable('expenses_type')  as $row) {
      echo "<tr>";
      echo "<td>". $row['expenses_type'] . "</td>";
      
      echo "<form action='' method='POST'>";
      echo "<input type='hidden' class='form-control' name='expenses_type_id' value='". $row['expenses_type_id'] . "'/>";
      ?>
      <td><button type='submit' class='btn btn-danger' name='delete' onclick="return confirm('Are you sure you want to delete this item?');"/>DELETE</button></td>
      </form>
      </tr>
      <?php
    }
	}
}
?>
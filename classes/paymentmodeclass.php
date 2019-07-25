<?php
require "functions/class.php";
class paymentmode
{
	public static function deletepaymentmode()
	{
		if (isset($_POST['delete']))
		 {

 	 		$id = $_POST['payment_mode_id'];
			expensesmgt::delete('payment_mode','payment_mode_id',$id);
 			echo "<meta http-equiv='refresh' content='0; url=paymentmode.php'/>";
		 }
	}

	public static function viewpaymentmode()
	{
		foreach(expensesmgt::viewintable('payment_mode') as $data)
        {
       
           echo " <tr>";
           
           echo "<td>" .$data['payment_mode']."</td>";
           echo "<td>" .$data['payment_mode_desc']."</td> ";
           echo "<form action='' method='POST'>";
      	   echo "<input type='hidden' class='form-control' name='payment_mode_id' value='". $data['payment_mode_id'] . "'/>";
      	   ?>
     	   <td><button type='submit' class='btn btn-danger' name='delete'  onclick="return confirm('Are you sure you want to delete this item?');"/>DELETE</button></td>
           </form>

           </tr>
           <?php
       }
	}

}
?>
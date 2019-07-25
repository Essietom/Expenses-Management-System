<?php
require "functions/class.php";
class purchase
{
	public static function deletepurchase()
	{
		if (isset($_POST['delete']))
		 {

 	 		$id = $_POST['purchase_id'];
			expensesmgt::delete('purchases','purchase_id',$id);
 			echo "<meta http-equiv='refresh' content='0; url=purchases.php'/>";
		 }
	}



  public static function getAllPurchasesDetails($id)
  {
    if ($id == 'all') {

      $sql = "SELECT * FROM purchases,vendor WHERE vendor.vendor_id=purchases.vendor_id";
      return expensesmgt::calldb()->query($sql);
    }
    elseif ($id !== 'all') {
 
      $sql = "SELECT * FROM purchases,vendor WHERE purchases.purchase_id = '$id' AND vendor.vendor_id=purchases.vendor_id";
       return expensesmgt::calldb()->query($sql);
    }

  }


  public static function amountLeft($estimate, $spent)
  {
    $left = $estimate - $spent;
    return $left;
  }


  public static function DisplayPurchases()
  {
    foreach (purchase::getAllPurchasesDetails('all') as $row) {
      echo "<tr>";
      echo "<td>". $row['title'] . "</td>";
      echo "<td>". $row['description'] . "</td>";
      echo "<td>". $row['name'] . "</td>";
      echo "<td>N". $row['unitamount'] . "</td>";
      echo "<td>". $row['quantity'] . "</td>";
      echo "<td>N". $row['totalamount'] . "</td>";
  
       echo "<td><button class='btn btn-info' data-toggle='modal' data-target='#myModal".$row['purchase_id']."'><i class='fa fa-edit'></i></button></td>";
           echo "<form action='' method='POST'>";
           
           echo "<input type='hidden' class='form-control' name='purchase_id' value='". $row['purchase_id'] . "'/>";
           ?>
           <td><button type='submit' class='btn btn-danger' name='delete' onclick="return confirm('Are you sure you want to delete this item?');"/><i class='fa fa-trash'></button>
           </form>

         </tr>
           
             <div id="myModal<?php echo $row['purchase_id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     <form class="form-horizontal" action="" method="POST" role="form">
                              <div class="well">
               
                                 <label class="control-label">Purchase title</label>
                               <input type="text" required name="title"  class="form-control" value="<?php echo $row['title'];?> " ><br>
                                 <label class=" control-label">Purchase description</label>
                                <input type="text" required name="description" class="form-control"  value="<?php echo $row['description'];?>"><br>
                                 <label class="control-label">Vendor's name</label>
                                <select class="form-control" name="vendor">
                                          <?php
                                          expensesmgt::selectoption('vendor','name','vendor_id');
                                          ?>
                                        </select>
                                <label class="control-label">Unit Amount</label>
                                 <input type="text" required name="unitamount" class="form-control"  value="<?php echo $row['unitamount'];?>"><br>
                                 
                                  <label class="control-label">Quantity</label>
                                 <input type="text" required name="quantity" class="form-control"  value="<?php echo $row['quantity'];?>"><br>
                                  <label class="control-label">Total Amount</label>
                                 <input type="text" required name="totalamount" class="form-control"  value="<?php echo $row['totalamount'];?>"><br>
                                 
                                 <input type="hidden" required value="<?php echo $row['purchase_id']?>" name="id" class="form-control">
                                <button type="submit" class="btn btn-info" data-target="#mymodal" name="edit" data-toggle="modal">update</button> 
                                                         
                                </div>
                              </form>
     
           <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
 </div>
           <?php
         }
       }

public static function viewvendor()

{
	foreach (expensesmgt::viewintable('vendor')  as $row) {
      echo "<tr>";
      echo "<td>". $row['name'] . "</td>";
      echo "<td>". $row['address'] . "</td>";
      echo "<td>". $row['phone'] . "</td>";
      echo "<td>N". $row['email'] . "</td>";
      echo "<td>". $row['country'] . "</td>";
      echo "<form action='' method='POST'>";
      echo "<td><input type='hidden' class='form-control' name='vendor_id' value='". $row['vendor_id'] . "'/></td>";
      ?>
      <td><button type='submit' class='btn btn-danger' name='delete' onclick="return confirm('Are you sure you want to delete this item?');"/>DELETE</button></td>
      </form>
      </tr>
      <?php
    }
}

public static function deletevendor()
{
	if (isset($_POST['delete']))
		 {

 	 		$id = $_POST['vendor_id'];
			expensesmgt::delete('vendor','vendor_id',$id);
 			echo "<meta http-equiv='refresh' content='0; url=purchase-vendor.php'/>";
		 }
}

public static function updatepurchase()
{

  if(isset($_POST['edit']))
  {
    $title=$_POST['title'];
    $desc=$_POST['description'];
    $qty=$_POST['quantity'];
    $unitamt=$_POST['unitamount'];
    $vendorid=$_POST['vendor'];
    $totalamount=$qty * $unitamt ;
    $id=$_POST['id'];


    $sql="UPDATE purchases SET title='$title', description='$desc', vendor_id='$vendorid', unitamount='$unitamt',quantity='$qty',totalamount='$totalamount' WHERE purchase_id=$id";
    $query=expensesmgt::calldb()->query($sql);
    $query->execute();
    echo "<meta http-equiv='refresh' content='0; url=purchases.php'/>";

  }
} 


}
?>
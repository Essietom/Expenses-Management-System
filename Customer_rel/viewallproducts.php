<?php

include 'header.php';
require 'Database/database.php';
?>

<?php 

function deleteproducts(){


  if(isset($_POST['delete']) ){


    if($_POST['del'] == 'YES'){

      $id = $_POST['prod_id'];
      $cxn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('Unable to Connect DB'. mysqli_connect_error());
      $sql =" DELETE from products where  Products_id=$id";
      $result = mysqli_query($cxn,$sql) or die('Could Not Connect'.mysqli_error($cxn));

      echo "<meta http-equiv='refresh' content='0' url=Customer_rel/viewallproducts.php />";

    }else{

      echo "<meta http-equiv='refresh' content='0' url=Customer_rel/viewallproducts.php />";

    }

  }


}


function update(){

    if(isset($_POST['update'])){
      
      $cxn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('Unable to Connect DB'. mysqli_connect_error());
      $id =$_POST['prod_id'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $desc = $_POST['desc'];


      $sql = "UPDATE products set Products_Name='$name', Price='$price', Description='$desc' where Products_id='$id' ";
      $result = mysqli_query($cxn,$sql);

      echo "<meta http-equiv='refresh' content='0' url=Customer_rel/viewallproducts.php/>";

    }


  }

?>




<div class="content-wrapper">
  

<section class="content-header">
     
      <h1> <i class="fa fa-thumbs-up" style="font-size:50px; color:#f56954;"></i>
       Customer_Relation_Manager
        <small> ENJOY!!</small>
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard active"></i> Home</a></li>
        
      </ol>
    </section>


    <br><br><br><br>

    	<section class="content">
        <div class="row">
        <div class="col-xs-2"> </div>
        <div class="col-xs-8">
          <div class="box">
            <div class="box-header">
            <center> <h2 align=center class="box-title"  style="color:red; font-family:cursive;">VIEW ALL PRODUCTS</h2> </center>
          	
            <form class="form-horizontal" method="POST">
             
              <div class="box-footer">
               
               <button type="submit" class="btn btn-success pull-left"> Refresh Page</button> 
                
              </div>
              <!-- /.box-footer -->
            </form>



            <div class="box-body table-responsive no-padding">
              <table class="table table-hover"  align='right' cellspacing='3' cellpadding='3' width='75%'>
                <tr>
                  <th>ID</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Description</th>
                  <th align="right">Action</th>
                 </tr>

                 <?php

                 $sql ="select * from products";
                 $result =mysqli_query($cxn,$sql);

                 $rows = mysqli_num_rows($result);
                 $i =1;

                 if($rows > 0){
while ($i <= $rows) {
                 foreach ($result as $data ) {
                  $id = $data['Products_id'];
                  $price = $data['Price'];
                  $name = $data['Products_Name'];
                  $desc = $data['Description'];
                 	
                


                  ?>
                 	<tr> 


                 	<td align='left'> <?php echo $i;?> </td> 
                 	<td align='left'> <?php echo ucwords($data['Products_Name']) ;?></td>
                 	<td align='left'> <?php echo number_format($data['Price']) ;?></td> 
                 	<td align='left'> <?php echo ucwords($data['Description']);?> </td>   
                 	<td>

                  
                 
                      <button style=" font-size:20px;" type='submit' class='btn btn-dangger ' data-toggle='modal' data-target="#myModal2<?php echo $data['Products_id'];?>" ><i class='fa fa-trash' ></i></button>&nbsp&nbsp
                  
                      <button type='submit' class='btn btn-warning btn-flat' style=" font-size:20px;" data-toggle='modal' data-target="#myModal<?php echo $data['Products_id'];?>" ><i class='fa fa-edit' ></i></button>&nbsp&nbsp

                  

                 	 </td>

                 	</tr>

              <div class="modal fade" role="dialog"  id="myModal2<?php echo $data['Products_id']; ?>" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <form class="form-horizontal" action="" method="POST" role="form">
                        <div class="well">

                          <label class="control-label">Would You Like To Delete <?php echo $data['Products_Name'] ;?>
                          <input type="radio"  name="del" value='YES' > YES &nbsp&nbsp&nbsp&nbsp<input type="radio" value='NO' name="del" >NO <br>                      



                          <input name="prod_id" class="form-control" type="hidden" value="<?php echo $data['Products_id'] ;?>" >
                          <button type="submit" class="btn btn-info" data-target="#mymodal" name="delete" data-toggle="modal"> update </button>
                        </div>
                      </form>
                      <div class="modal-footer">

                      </div>
                    </div>
                  </div>
                </div>
              </div>




        <div id="myModal<?php echo $data['Products_id']; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <form class="form-horizontal" action="" method="POST" role="form">
                <div class="well">

                 <label class="control-label">Products Name</label>
                       <input type="text" required name="name" class="form-control" placeholder="Enter Products Name" value="<?php echo $data['Products_Name']; ?>"><br>

                       <label class="control-label">Price </label>
                       <input type="text" required name="price" class="form-control" placeholder="Price oF Product" value="<?php echo $data['Price']; ?>"><br>

                       <label class="control-label">Description </label>
                       <input type="text" required name="desc" class="form-control" placeholder="Brief Description" value="<?php echo $data['Description']; ?>"><br>


                 <input name="prod_id" required type="hidden" required value="<?php echo $data['Products_id'];?>"  class="form-control">
                 <button type="submit" class="btn btn-info" data-target="#mymodal" name="update" data-toggle="modal"> update </button> 

               



               </div>
             </form>

             <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      </div>

                 
          <?php
                $i++; }
               }
                 deleteproducts();
                 update();
                 
               }


                 ?>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>



</div>  
</section>
</div>





<?php

include 'footer.php';

?>
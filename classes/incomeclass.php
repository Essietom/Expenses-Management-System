<?php
require "functions/class.php";

class income             

{

	public static function viewincome()
	{
          foreach(expensesmgt::viewintable('income') as $row)
        {
       
           echo " <tr>";
        
           echo "<td>" .$row['income_title']."</td>";
           echo "<td>" .$row['income_description']."</td> ";   
           echo "<td>" .$row['Customers_name']."</td>";
           echo "<td>" .$row['date_of_income']."</td>";
           echo "<td>" .$row['income_amount'] ."</td>";
           echo "<td><button class='btn btn-info' data-toggle='modal' data-target='#myModal".$row['income_id']."'><i class='fa fa-edit'></i></button></td>";
           echo "<form action='' method='POST'>";
           
           echo "<input type='hidden' class='form-control' name='income_id' value='". $row['income_id'] . "'/>";
           ?>
          <td><button type='submit' class='btn btn-danger' name='delete' onclick="return confirm('Are you sure you want to delete this item?');"/><i class='fa fa-trash'></button></td>
           </form>

           </tr>
           
             <div id="myModal<?php echo $row['income_id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     <form class="form-horizontal" action="" method="POST" role="form">
                              <div class="well">
               
                                 <label class="control-label">Income title</label>
                               <input type="text" required name="title"  class="form-control" value="<?php echo $row['income_title'];?> " ><br>
                                 <label class=" control-label">Income description</label>
                                <input type="text" required name="description" class="form-control"  value="<?php echo $row['income_description'];?>"><br>
                                 <label class="control-label">Customer's name</label>
                                <input type="text" required name="customer" class="form-control"  value="<?php echo $row['Customers_name'];?>"><br>
                                <label class="control-label">Date</label>
                                 <input type="date" required name="date" class="form-control"  value="<?php echo $row['date_of_income'];?>"><br>
                                 
                                  <label class="control-label"> Amount</label>
                                 <input type="text" required name="amount" class="form-control"  value="<?php echo $row['income_amount'];?>"><br>
                                 
                                 <input type="hidden" required value="<?php echo $row['income_id']?>" name="id" class="form-control">
                                <button type="submit" class="btn btn-info" data-target="#mymodal" name="update" data-toggle="modal">update</button> 
                                                         
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


  public static function viewincomereport($startdate,$enddate)
  {

         $sql="SELECT * FROM Income WHERE  (date_of_income BETWEEN '$startdate' AND '$enddate')";
         $query=expensesmgt::calldb()->query($sql);
         $query->execute();        
          foreach($query as $data)
        {
       
           echo " <tr>";
           echo "<td>" .$data['income_title']."</td>";
           echo "<td>" .$data['income_description']."</td> ";   
           echo "<td>" .$data['Customers_name']."</td>";
           echo "<td>" .$data['date_of_income']."</td>";
           echo "<td>" .$data['income_amount'] ."</td>";
    

           echo "</tr>";
       }

        $sql="SELECT sum(income_amount) as totalincome FROM Income WHERE  (date_of_income BETWEEN '$startdate' AND '$enddate')";
         $query=expensesmgt::calldb()->query($sql);
         $query->execute();
         $data=$query->fetch(PDO::FETCH_ASSOC);
         echo "TOTAL INCOME:".$data['totalincome'];
  }


  public static function uploadincome()
  {


  if($_SERVER['REQUEST_METHOD']=='POST')
  {

  if (isset($_FILES['file'])) {
    include 'simplexlsx.class.php';


      $xlsx = new SimpleXLSX($_FILES['file']['tmp_name']);
      list($num_cols, $num_rows) = $xlsx->dimension();
      $f = 0;
      $data = array();
      foreach( $xlsx->rows() as $r ) 
      {
        
        if ($f == 0)
        {
          $f++;
          continue;
        }
        for( $i=0; $i < $num_cols; $i++ )
        {
          if ($i == 0)      $data['income_title']     = $r[$i];
          else if ($i == 1) $data['income_description']   = $r[$i];
          else if ($i == 2) $data['Customers_name']   = $r[$i];
          else if ($i == 3) $data['date_of_income']     = $r[$i];
          else if ($i == 4) $data['income_amount']  = $r[$i];
          $first=$r[0];
          $second=$r[1];
          $third=$r[2];
          $fourth=$r[3];
          $fifth=$r[4];
          
          
        }

       $sql="INSERT INTO income(income_title,income_description,Customers_name,date_of_income,income_amount) VALUES ('$first','$second','$third','$fourth','$fifth')";

       $query=expensesmgt::calldb()->query($sql);

        
      }

    }

   }
  }


  public static function deleteincome()
  {

  if (isset($_POST['delete']))
   {

  $id = $_POST['income_id'];
  expensesmgt::delete('income','income_id',$id);
  echo "<meta http-equiv='refresh' content='0; url=viewincome.php'/>";

    }
  }



public static function updateincome()
{

  if(isset($_POST['update']))
  {
   $title=$_POST['title'];
   $desc=$_POST['description'];
   $customer=$_POST['customer'];
   $date=$_POST['date'];
   $amount=str_replace(',', '', $_POST['amount']);
   $id=$_POST['id'];



   $sql="UPDATE income SET income_title='$title', income_description='$desc', Customers_name='$customer',income_amount='$amount',date_of_income='$date' WHERE income_id=$id";
   $query=expensesmgt::calldb()->query($sql);
   $query->execute();

 }
}


public static function submitmultipleinsert()
{
  if(isset($_REQUEST['multisubmit']))
  {
    $num = $_POST['numofentry'];
    $incometitle=$_POST['incometitle'];
    $incomedesc=$_POST['incomedesc'];
    $customer=$_POST['customer'];
    $date=$_POST['dateofincome'];
    $amount=$_POST['amount'];

      for($i=0; $i<$num; $i++)
      {
        $sql="INSERT INTO income(income_title,income_description,Customers_name,date_of_income,income_amount) VALUES ('$incometitle[$i]','$incomedesc[$i]','$customer[$i]','$date[$i]','$amount[$i]')";
        $query=expensesmgt::calldb()->query($sql);
      }

      
  
  }

} 



 public static function addincomeprocess()
 {
  if(isset($_REQUEST['addincome']))
{

  $incometitle=$_POST['incometitle'];
  $incomedesc=$_POST['incomedesc'];
  $customer=$_POST['customer'];
  $date=$_POST['dateofincome'];
  $amount=str_replace(',', '', $_POST['amount']);
  $valid=true;
  if(empty($incometitle)||empty($date)||empty($amount))
  {
    $valid=false;
    
  }
 

  if ($valid)
  {

       $sql="INSERT INTO income(income_title,income_description,Customers_name,date_of_income,income_amount) VALUES ('$incometitle','$incomedesc','$customer','$date','$amount')";

       $query=expensesmgt::calldb()->query($sql);
    
   
  }
  else
  {
    echo "error";
  }
  
}
 }


 public static function fetchincomebudget($budgetyear)
{
 
  $sql="SELECT  sum(income_amount) as actualreceived, amountbudgetted, month(date_of_income) as month
        from income, incomebudget where year(date_of_income) =  '$budgetyear' and budgetyear = '$budgetyear' and month(date_of_income) = budgetmonth 
        group by month(date_of_income)";

  $query=expensesmgt::calldb()->query($sql);

  return $query;
}


public static function incomebudget($budgetyear)
{
  foreach (income::fetchincomebudget($budgetyear) as $data) 
  {

    $budget = $data['amountbudgetted'];
    $received = $data['actualreceived'];
    $balance = $budget - $received;
    if($balance < 0)
    {
      $surplus=$balance;
      $deficit = '-';
    }

    else
    {
      $deficit=$balance;
      $surplus = '-';
    }

    $month = $data['month'];
    $dateObj   = DateTime::createFromFormat('!m', $month);
    $monthName = $dateObj->format('F');
   echo "<tr>";
   echo "<td>".$monthName."</td>";
   echo "<td>" .$budget."</td>";
   echo "<td>" .$received."</td> ";   
   echo "<td>" .$deficit."</td>";

   echo "<td>".$surplus ."</td>";
  

   echo "</tr>";
  }
}



public static function addbudget()
{
  if(isset($_REQUEST['income']))
    {


      $month = $_POST['month'];
      $year = $_POST['year'];
      $expectedincome = $_POST['expectedincome'];

      
          $sql = "SELECT * from incomebudget where budgetmonth = $month AND budgetyear = $year";
          $query=expensesmgt::calldb()->query($sql);
          foreach ($query as $data) {
            $id=$data['id'];
          }
          $count = $query->rowCount();

          if($count == 1)
          {
            $sql="UPDATE incomebudget set budgetyear = $year, budgetmonth = $month, amountbudgetted = $expectedincome where id= $id";
            $query=expensesmgt::calldb()->query($sql);
          }

          else
          {

          $sql="INSERT INTO incomebudget (budgetyear,budgetmonth,amountbudgetted) VALUES ('$year','$month', '$expectedincome')";
          $query=expensesmgt::calldb()->query($sql);
          }


    }
}
}


?>
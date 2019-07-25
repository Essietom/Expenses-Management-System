<?php
require "functions/class.php";

class expenses
{

 public static function deleteexpenses()
 {
  if (isset($_POST['delete']))
  {

    $id = $_POST['expenses_id'];
    expensesmgt::delete('expenses','expenses_id',$id);
    echo "<meta http-equiv='refresh' content='0; url=viewexpenses.php'/>";

  }
}

public static  function getstaffid($stafffn)
{
  $sql="SELECT * FROM staff WHERE staff_fname LIKE '%$stafffn%' OR staff_ln LIKE '%$stafffn%'";
  $query=expensesmgt::calldb()->query($sql);
  $data=$query->fetch(PDO::FETCH_ASSOC);
  return $data['staff_id'];
  
}

public static function getprojectid($projectname)
{
 $sql="SELECT * FROM project WHERE project_title LIKE '%$projectname%' ";
 $query=expensesmgt::calldb()->query($sql);
 $data=$query->fetch(PDO::FETCH_ASSOC);
 
 return $data['project_id'];

}

public static function getextypeid($exptype)
{
  $sql="SELECT * FROM expenses_type WHERE expenses_type LIKE '%$exptype%' ";
  $query=expensesmgt::calldb()->query($sql);
  $data=$query->fetch(PDO::FETCH_ASSOC);
  return $data['expenses_type_id'];
  
}



public static function viewexpenses()
{
 $sql="SELECT * FROM expenses, staff, project,expenses_type  WHERE expenses.expenses_type_id=expenses_type.expenses_type_id AND  expenses.procured_bystaff = staff.staff_id AND expenses.procured_byproject=project.project_id ORDER BY expenses.expenses_date ASC";
 $query=expensesmgt::calldb()->query($sql);
 $query->execute(); 
 $sn=0;
 foreach($query as $row)
 {
  $sn+=1;
  echo " <tr>";
  echo "<td>".$sn."</td>";
  echo "<td>" .$row['expenses_type']."</td>";
  echo "<td>" .$row['expenses_desc']."</td> ";   
  echo "<td>" .$row['staff_fname'].' '.$row['staff_ln']."</td>";
  echo "<td>" .$row['project_title']."</td>";
  echo "<td>" .$row['expenses_amount'] ."</td>";
  echo "<td>" .$row['expenses_date'] ."</td>";

  echo "<td><button class='btn btn-info' data-toggle='modal' data-target='#myModal".$row['expenses_id']."'><i class='fa fa-edit'></i></button></td>";
  echo "<form action='' method='POST'>";

  echo "<input type='hidden' class='form-control' name='expenses_id' value='". $row['expenses_id'] . "'/>";
  ?>
 <td><button type='submit' class='btn btn-danger' name='delete' onclick="return confirm('Are you sure you want to delete this item?');"/><i class='fa fa-trash'></button></td>
 </form>

</tr>
  
  <div id="myModal<?php echo $row['expenses_id']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <form class="form-horizontal" action="" method="POST" role="form">
            <div class="well">

             <label class="control-label">Expenses Title</label>
             <select name="expensetype"  class="form-control" required>

               <?php expensesmgt::selectoption('expenses_type','expenses_type','expenses_type_id')?>

             </select>
             <label class=" control-label">Expenses description</label>
             <input type="text" required name="description" class="form-control"  value="<?php echo $row['expenses_desc'];?>"><br>
             <label class="control-label">Procured by(staff)</label>
             <select name="procuredbystaff" class="form-control">
              <?php expensesmgt::selectoption('staff','staff_fname','staff_id')?>
            </select><br>
            <label class="control-label">Procured by(project)</label>
            <select name="project" class="form-control">
             <?php expensesmgt::selectoption('project','project_title','project_id')?>
           </select>
           <label class="control-label"> Amount</label>
           <input type="text" required name="amount" class="form-control"  value="<?php echo $row['expenses_amount'];?>"><br>
           <label class="control-label">Date</label>
           <input type="date" required name="date" class="form-control"  value="<?php echo $row['expenses_date'];?>"><br>

           <input type="hidden" required value="<?php echo $row['expenses_id']?>" name="id" class="form-control">
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








public static function uploadexpenses()
{
  if($_SERVER['REQUEST_METHOD']=="POST")
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
          if ($i == 0)      $data['expenses_amount']      = $r[$i];
          else if ($i == 1) $data['expenses_type_id']   = $r[$i];
          else if ($i == 2) $data['expenses_date']    = $r[$i];
          else if ($i == 3) $data['procured_bystaff']     = $r[$i];
          else if ($i == 4) $data['procured_byproject'] = $r[$i];
          else if ($i == 5) $data['expenses_desc']  = $r[$i];
          $first=$r[0];
          $second=self::getextypeid($r[1]);
          $third=$r[2];
          $fourth=self::getstaffid($r[3]);
          $fifth=self::getprojectid($r[4]);
          $sixth=$r[5];
        }
        $sql="INSERT INTO expenses (expenses_amount,expenses_type_id,expenses_date,procured_bystaff,procured_byproject,expenses_desc) VALUES ('$first','$second','$third','$fourth','$fifth','$sixth')";
        $query=expensesmgt::calldb()->query($sql);

      }

    }
  }

}

public static function generateexpensesreport($startdate,$enddate)
{


  $sql="SELECT * FROM expenses, staff, project,expenses_type  WHERE expenses.expenses_type_id=expenses_type.expenses_type_id AND  expenses.procured_bystaff = staff.staff_id AND expenses.procured_byproject=project.project_id AND  (expenses_date BETWEEN '$startdate' AND '$enddate') ORDER BY expenses.expenses_date ASC ";
  $query=expensesmgt::calldb()->query($sql);
  $query->execute(); 
  foreach($query as $data)
  {

   echo " <tr>";
   echo "<td>".$data['expenses_id']."</td>";
   echo "<td>" .$data['expenses_type']."</td>";
   echo "<td>" .$data['expenses_desc']."</td> ";   
   echo "<td>" .$data['staff_fname'].' '.$data['staff_ln']."</td>";

   echo "<td>" .$data['expenses_amount'] ."</td>";
   echo "<td>" .$data['expenses_date'] ."</td>";

   echo "</tr>";
 }

 $sql="SELECT sum(expenses_amount) FROM expenses WHERE  (expenses_date BETWEEN '$startdate' AND '$enddate')";
 $query=expensesmgt::calldb()->query($sql);
 $query->execute();  
}



public static function editexpenses()
{

  if(isset($_POST['update']))
  {
    $extype=$_POST['expensetype'];
    $procbystaff=$_POST['procuredbystaff'];
    $procbyproj=$_POST['project'];
    $expdesc=$_POST['description'];
    $dateproc=$_POST['date'];
    $amt=str_replace(',', '', $_POST['amount']);

    $id=$_POST['id'];


    $sql="UPDATE expenses SET expenses_type_id='$extype', expenses_desc='$expdesc', procured_bystaff='$procbystaff',expenses_amount='$amt',expenses_date='$dateproc', procured_byproject='$procbyproj' WHERE expenses_id=$id";
    $query=expensesmgt::calldb()->query($sql);
    $query->execute();
    echo "<meta http-equiv='refresh' content='0; url=viewexpenses.php'/>";

  }
}



public static function submitmultipleinsert()
{
  if(isset($_REQUEST['multisubmit']))
  {
    $num = $_POST['numofentry'];
    $extype = $_POST['expensetype'];
    $procbystaff = $_POST['procuredbystaff'];
    $procbyproj=$_POST['procuredbyproj'];
    $expdesc=$_POST['expensedesc'];
    $dateproc=$_POST['dateprocured'];
    $amt=$_POST['amount'];
   


    if ($procbystaff==='')
    {
      $procbystaff=null;
    }

 
        for($i=0; $i<$num; $i++)
        {
        $sql="INSERT INTO expenses (expenses_amount,expenses_type_id,expenses_date,procured_bystaff,procured_byproject,expenses_desc) VALUES ('$amt[$i]','$extype[$i]', '$dateproc[$i]','$procbystaff[$i]','$procbyproj[$i]','$expdesc[$i]')";
        $query=expensesmgt::calldb()->query($sql);
       
        }


  }

} 


public static function addexpensesprocess()
{
  if(isset($_REQUEST['addexpenses']))
{
  
  $extype=$_POST['expensetype'];
  $procbystaff=$_POST['procuredbystaff'];
  $procbyproj=$_POST['procuredbyproj'];
  $expdesc=$_POST['expensedesc'];
  $dateproc=$_POST['dateprocured'];
  $amt=str_replace(',', '', $_POST['amount']);
  $valid=true;
  if(empty($extype)||empty($dateproc)||empty($amt))
  {
    $valid=false;
    
  }

 
  if ($_POST['procuredbystaff']==='')
  {
    $_POST['procuredbystaff']=null;
  }

  if ($valid)
  {
    $sql="INSERT INTO expenses (expenses_amount,expenses_type_id,expenses_date,procured_bystaff,procured_byproject,expenses_desc) VALUES ('$amt','$extype', '$dateproc','$procbystaff','$procbyproj','$expdesc')";
    $query=expensesmgt::calldb()->query($sql);
  }
}
}


public static function fetchexpensesbudget($budgetyear)
{
 
  $sql="SELECT  sum(expenses_amount) as actualspent, amountbudgetted, month(expenses_date) as month
        from expenses, expensesbudget where year(expenses_date) =  '$budgetyear' and budgetyear = '$budgetyear' and month(expenses_date) = budgetmonth 
        group by month(expenses_date)";

  $query=expensesmgt::calldb()->query($sql);

  return $query;
}


public static function fetchmonthbudget($budgetmonth,$budgetyear)
{
 
  $sql="SELECT  sum(expenses_amount) as actualspent, amountbudgetted from expenses, expensesbudget where year(expenses_date) =  '$budgetyear' and budgetyear = '$budgetyear' and month(expenses_date) = budgetmonth and budgetmonth = '$budgetmonth' ";

  $query=expensesmgt::calldb()->query($sql);

  return $query;
}

public static function expensesbudget($budgetyear)
{
  foreach (expenses::fetchexpensesbudget($budgetyear) as $data) 
  {

    $budget = $data['amountbudgetted'];
    $spent = $data['actualspent'];
    $balance = $budget - $spent;
    if($balance > 0)
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
   echo "<td>" .$spent."</td> ";   
   echo "<td>" .$deficit."</td>";

   echo "<td>".$surplus ."</td>";
  echo "<td><a href='expensesbreakdown.php?month=".$data['month']."&year=".$budgetyear."'>Breakdown<i class='fa fa-arrow-circle-right'></i></a></td>";

   echo "</tr>";
  }
}


public static function budgetbreakdown($year, $month)
{
  $sql="SELECT sum(expenses_amount) as amt, expenses.expenses_type_id,expenses_type  from expenses,expenses_type where year(expenses_date) = '$year' and month(expenses_date) = '$month' and expenses.expenses_type_id=expenses_type.expenses_type_id group by expenses_type_id";
  $query=expensesmgt::calldb()->query($sql);
  return $query;
}


public static function getbreakdown($year, $month)
{
  foreach (expenses::budgetbreakdown($year, $month) as $data) 
  {
   echo "<tr>";
   echo "<td>".$data['expenses_type']."</td>";
   echo "<td>" .$data['amt']."</td>";
   echo "</tr>";
  }
} 


public static function addbudget()
{
  if(isset($_REQUEST['expenditure']))
    {


      $month = $_POST['month'];
      $year = $_POST['year'];
      $proposedexpenses = $_POST['proposedexpenses'];

      
          $sql = "SELECT * from expensesbudget where budgetmonth = $month AND budgetyear = $year";
          $query=expensesmgt::calldb()->query($sql);
          foreach ($query as $data) {
            $id=$data['id'];
          }
          $count = $query->rowCount();

          if($count == 1)
          {
            $sql="UPDATE expensesbudget set budgetyear = $year, budgetmonth = $month, amountbudgetted = $proposedexpenses where id= $id";
            $query=expensesmgt::calldb()->query($sql);
          }

          else
          {

          $sql="INSERT INTO expensesbudget (budgetyear,budgetmonth,amountbudgetted) VALUES ('$year','$month', '$proposedexpenses')";
          $query=expensesmgt::calldb()->query($sql);
          }


    }
}




}

?>



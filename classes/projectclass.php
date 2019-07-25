<?php


require 'functions/class.php';

class Project{

 

  public static function getAllProjectDetails($id)
  {
    if ($id == 'all') {
      
      $sql = 'SELECT * FROM project';
      return expensesmgt::calldb()->query($sql);
    }
    elseif ($id !== 'all') {
      
      $sql = "SELECT * FROM project WHERE project_id = '$id'";
      return expensesmgt::calldb()->query($sql);
    }

  }

  public static function amountLeft($estimate, $spent)
  {
    $left = $estimate - $spent;
    return $left;
  }

  public static function DisplayProject()
  {
    foreach (Project::getAllProjectDetails('all') as $row) {
      echo "<tr>";
      echo "<td>". $row['project_title'] . "</td>";
      echo "<td>". $row['project_desc'] . "</td>";
      echo "<td>N". $row['estimate'] . "</td>";
      echo "<td>N". $row['amount_spent'] . "</td>";
      echo "<td>N". Project::amountLeft($row['estimate'], $row['amount_spent']) . "</td>";
      echo "<td><button class='btn btn-info' data-toggle='modal' data-target='#myModal".$row['project_id']."'><i class='fa fa-edit'></i></button></td>";
      echo "<form action='' method='POST'>";
      echo "<input type='hidden' class='form-control' name='project_id' value='". $row['project_id'] . "'/>";
      ?>
      <td><button type='submit' class='btn btn-danger' name='delete' onclick="return confirm('Are you sure you want to delete this item?');"/><i class='fa fa-trash'></i></button></td>
     </form>
     </tr>

      

       <div id="myModal<?php echo $row['project_id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    <form class="form-horizontal" action="" method="POST" role="form">
    <div class="well">
    
       <?php echo $row['project_title'] ?><br>
       <label class="control-label">Estimate</label>
      N<input type='text' class='form-control' name='estimate' value="<?php echo $row['estimate']?>"/><br>
      <label class="control-label">Amount spent</label>
      N<input type='text' class='form-control' name='spent' value="<?php echo $row['amount_spent']?>"/>
      <input type="hidden" required value="<?php echo $row['project_id']?>" name="project_id" class="form-control">
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

  public static function ShowSpent($project_id)
  {
    foreach (Project::getAllProjectDetails($project_id) as $row) {
      echo "<tr>";
      echo "<td>". $row['project_title'] . "</td>";
      echo "<td>N<input type='text' class='form-control' name='estimate' value='". $row['estimate'] . "'/></td>";
      echo "<td>N<input type='text' class='form-control' name='spent' value='". $row['amount_spent'] . "'/></td>";
      echo "</tr>";
    }
  }


  public static function deleteproject()
  {
    if (isset($_POST['delete']))
    {

      $id = $_POST['project_id'];
      expensesmgt::delete('project','project_id',$id);
      echo "<meta http-equiv='refresh' content='0; url=projectmgt.php'/>";

    }
  }

  public static function updateproject()
  {
   if(isset($_POST['update']))
   {
     $estimate = $_POST['estimate'];
     $spent = $_POST['spent'];
     $id=$_POST['project_id'];

     $sql = "UPDATE project SET estimate = '$estimate', amount_spent = '$spent' WHERE project_id = '$id'";;
     $query=expensesmgt::calldb()->query($sql);
     $query->execute();
     echo "<meta http-equiv='refresh' content='0; url=projectmgt.php'/>";

   }

}


public static function addprojectprocess()
{
  if (isset($_POST['addproject']))
  {
    $proname =$_POST['projectname'];
    $prodesc =$_POST['projectdesc'];
    $estimate =$_POST['estimate'];


    $valid=true;
    if(empty($_POST['projectname']))
    {
      $valid=false;
      $projectnameError="Add project title";
      $estimateError="Add Estimate amount for project";

    }

    if($valid)
    {

      $sql="INSERT INTO project (project_title,project_desc, estimate) VALUES ('$proname','$prodesc','$estimate')";

      $query=expensesmgt::calldb()->query($sql);

    }

  }
}

}



 ?>

<?php
require "functions/class.php";

class staff
{


  public static function deletestaff()
  {
    if (isset($_POST['delete']))
    {

      $id = $_POST['staff_id'];
      expensesmgt::delete('staff','staff_id',$id);
      echo "<meta http-equiv='refresh' content='0; url=viewstaff.php'/>";

    }
  }


  public static function updatestaff()
  {
    if(isset($_POST['update']))
    {
      $fn=$_POST['firstname'];
      $ln=$_POST['lastname'];
      $qual=$_POST['qualification'];
      $mail=$_POST['email'];
      $acno=$_POST['acno'];
      $id=$_POST['id'];
      echo $fn;

      $sql="UPDATE staff SET staff_ln='$ln', staff_fname='$fn', staff_qualification='$qual', staff_email='$mail',staff_acct_no='$acno' WHERE staff_id=$id";
      $query=expensesmgt::calldb()->query($sql);
      $query->execute();
       echo "<meta http-equiv='refresh' content='0; url=viewstaff.php'/>";

    }
  }

  public static function viewstaff()
  {
    $sql="SELECT * FROM staff,department WHERE department.department_id=staff.department_id";
    $query=expensesmgt::calldb()->query($sql);
    $query->execute();
    foreach($query as $data)
    {
      $staff_id=$data['staff_id'];
      ?>
      <tr>
      <td><?php echo $data['staff_ln']?></td>
      <td><?php echo $data['staff_fname']?></td>
      <td><?php echo $data['staff_sex']?></td>  
      <td><?php echo $data['staff_dateofbirth']?></td>
      <td><?php echo $data['staff_qualification']?></td>
      <td><?php echo $data['department_name']?></td>
      <td><?php echo $data['staff_phone_num']?></td>  
      <td><?php echo $data['yearjoined']?></td>
      <td><?php echo $data['staff_email']?></td>
      <td><?php echo $data['staff_acct_no']?></td>
     <td><button class='btn btn-info' data-toggle='modal' data-target="#myModal<?php echo $data['staff_id']?>"><i class='fa fa-edit'></i></button></td>
     <form action='' method='POST'>
     <td><button type='submit' class='btn btn-danger' name='delete' onclick="return confirm('Are you sure you want to delete this item?');"/><i class='fa fa-trash'></i></button></td>
     <input type='hidden' class='form-control' name='staff_id' value="<?php echo $data['staff_id'] ?>"/>
     </form>
    </tr>
      

      <div id="myModal<?php echo $data['staff_id']; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <form class="form-horizontal" action="" method="POST" role="form">
                <div class="well">

                 <label class="control-label">Account number</label>
                 <input type="text" required name="acno"  class="form-control" placeholder="Update ACCOUNT NO for this staff" value="<?php echo $data['staff_acct_no'];?> " ><br>
                 <label class=" control-label">Last name</label>
                 <input type="text" required name="lastname" class="form-control" placeholder="Surname" value="<?php echo $data['staff_ln'];?>"><br>
                 <label class="control-label">First name</label>
                 <input type="text" required name="firstname" class="form-control" placeholder="Firstname" value="<?php echo $data['staff_fname'];?>"><br>
                 <label class="control-label">Qualification</label>
                 <input type="text" required name="qualification" class="form-control" placeholder="Qualification"  value="<?php echo $data['staff_qualification'];?>"><br>
                 <label class="control-label">Email address</label>
                 <input type="email" required name="email" class="form-control" placeholder="Email Address" value="<?php echo $data['staff_email'];?>"><br>

                 <input type="hidden" required value="<?php echo $data['staff_id']?>" name="id" class="form-control">
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



public static function addstaffproccess()
{
  if(isset($_REQUEST['addstaff']))
{
  
  $acctno=$_POST['acno'];
  $lastname=$_POST['surname'];
  $firstname=$_POST['firstname'];
  $sex=$_POST['sex'];
  $dob=$_POST['dateofbirth'];
  $qualification=$_POST['qualification'];
  $yrjoined=$_POST['yearjoined'];
  $mail=$_POST['email'];
  $dept=$_POST['department'];
  $phonenum=$_POST['phonenum'];
  $valid=true;


  if(empty($acctno)||empty($lastname)||empty($firstname)||empty($dob)||empty($mail)||empty($phonenum))
  {
    $valid=false;
   
  }
 
 
  
  if ($valid)
  {
    $sql="INSERT INTO staff (staff_fname, staff_ln,staff_phone_num, staff_sex,staff_dateofbirth, staff_qualification, yearjoined, staff_email,department_id, staff_acct_no) VALUES ('$firstname','$lastname','$phonenum','$sex','$dob','$qualification','$yrjoined','$mail',$dept,'$acctno')";

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

<?php

include 'header.php';
require 'Database/database.php';
?>




<div class="content-wrapper">

  <section class="content-header">

    <h1> <i class="fa fa-thumbs-up" style="font-size:50px; color:#f56954;"></i>
     Customer_Relation_Manager
     <small style="color:red;">ADD CUSTOMER</small>
   </h1>

   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard active"></i> Home</a></li>

  </ol>
</section>


<?php

function insert(){
$cxn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('Unable to Connect DB'. mysqli_connect_error());
$c =NULL;
if(isset($_POST['submit'])){

  $num =$_POST['entry'];

   $Errors= array();



     $f_name = $_POST['f_name'];

     $l_name = $_POST['l_name'];


// for ($i=0; $i <$num ; $i++) {


//      $sex[] = $_POST['sex'.$i +1];


//  }



     $desc = $_POST['desc'];


     $level =  $_POST['level'];

     $sex =array();
  for ($i=0; $i <$num ; $i++) {

     $sex[] =$_POST["sex$i"];
}

   $email =$_POST['email'];

    $fone =$_POST['fone'];

     $addr = $_POST['addr'];






  for ($i=0; $i <$num ; $i++) {

   $query= "INSERT into customer (First_Name,Last_Name,sex,Email,Phone,Level,Location,Description) values ('$f_name[$i]','$l_name[$i]','$sex[$i]','$email[$i]','$fone[$i]','$level[$i]','$addr[$i]','$desc[$i]')";
   $result = mysqli_query($cxn,$query);



 }



   if(mysqli_affected_rows($cxn)==1){
    if($num  >1){ $c='s';}

     echo  "<center> <button class='btn btn-success'> <h3>$num Customer$c Successfully ADDED </h3> </button> </center>";

   }else{

     echo  "Unable To Add The Product Due To internal Error !!! <br> " .mysqli_error($cxn);
   }






} }





function entries(){

  if(isset($_POST['go'])){


    $num=$_POST['entries'];

    if($num ==1 ):
      ?>



    <br><br>
    <div class="content">
      <div class="row">

        <div class="col-md-2"> </div>
        <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h2 class="box-title" style="color:red; font-family:cursive;">ADD CUSTOMER</h2>
            </div>



            <form class="form-horizontal" method="POST">
              <div class="box-body">

                <div class="form-group">
                  <label  class="col-sm-2 control-label">First Name <span style="color:red;  font-size:30px; font-weight:bold;"> *</span></label>

                  <div class="col-sm-10">
                    <input type="text" required class="form-control"  placeholder="First Name" name="f_name[]">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Last Name <span style="color:red;  font-size:30px; font-weight:bold;"> *</span></label>

                  <div class="col-sm-10">
                    <input type="text" required class="form-control"  placeholder="Last Name" name="l_name[]">
                  </div>


                </div>


                <div class="form-group">
                  <label  class="col-sm-2 control-label">Sex</label>

                  <div class="col-sm-10">

                   <div class="radio">

                    <label>
                      <input type="radio" checked name="sex<?php echo 0?>"  value="M" >Male
                      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                      <input type="radio" name="sex<?php echo 0?>"  value="F">
                      Female
                    </label>
                  </div>


                </div>
              </div>



              <div class="form-group">
                <label  class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                  <input type="email"  class="form-control"  placeholder="Email" name="email[]">
                </div>
              </div>

              <div class="form-group">
                <label  class="col-sm-2 control-label">Phone Number</label>

                <div class="col-sm-10">
                  <input type="text"  class="form-control"  placeholder="Phone Number" name="fone[]">
                </div>
              </div>

              <div class="form-group">
                <label  class="col-sm-2 control-label">Location/Address</label>

                <div class="col-sm-10">
                  <input type="text"  class="form-control"  placeholder="Enter Customer's Location" name="addr[]">
                </div>
              </div>


              <div class="form-group">

                <label class="col-sm-2 control-label">Description:<span style="color:red;  font-size:30px; font-weight:bold;"> *</span></label>

                <div class="col-sm-10">
                  <textarea required placeholder="Brief Description" name="desc[]" class="form-control"  ></textarea>
                </div>

              </div>


              <div class="form-group">
                <label  class="col-sm-2 control-label">Customer's Level</label>

                <div class="col-sm-10">


                  <select name="level"  class="form-control select2" style="width: 30%;">
                    <option value="">--choose--</option>


                    <option value="First Timers" selected="selected">First Timers</option>
                    <option  value="Regular/Associates">Regular/Associates</option>
                    <option value="Affiliate">Affiliate</option>


                  </select>

                </div>
              </div>


            </div>
            <!-- /.box-body -->
            <div class="box-footer">

                      <input type='hidden' name='entry' value='<?php echo $num ?>' >

              <button type="reset" class="btn btn-info">Reset</button>
              <!--  <center>   <button type="submit" class="btn btn-warning ">Go to Purchase Page</button> </center> -->
              <button type="submit"  name='submit' class="btn btn-danger pull-right">Submit</button>
            </div>
            <!-- /.box-footer -->
          </form>
        </div>
        <!-- /.box -->
        <!-- general form elements disabled -->

      </div>



    </div>
  </div>

</div>


<?php
  endif; // for num==1

   if($num > 1):

  ?>
 <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>First Name<span style="color:red;  font-size:30px; font-weight:bold;"> *</span></th>
                  <th>Last Name <span style="color:red;  font-size:30px; font-weight:bold;"> *</span></th>
                  <th>Sex <span style="color:red;  font-size:30px; font-weight:bold;"> *</span></th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Location</th>
                  <th>Description <span style="color:red;  font-size:30px; font-weight:bold;"> *</span></th>
                  <th>Customer Level <span style="color:red;  font-size:30px; font-weight:bold;"> *</span></th>

                </tr>
      <form method='POST'>

<?php

    for($i=0 ;$i<$num ;$i++){

  ?>
                <tr style="height:50px">
                  <td><?php echo $i+1?></td>
                  <td>
                  <div class="form-group">

                  <div class="col-sm-10">
                    <input type="text" required class="form-control" value="<?php echo !empty($_POST['f_name[]'])? $_POST['f_name[]']: '' ?>"  placeholder="First Name" name="f_name[]">
                  </div>
                </div>
                </td>

                <td>
                <div class="form-group">


                  <div class="col-sm-10">
                    <input type="text" required class="form-control" value="<?php echo !empty($_POST['l_name[]'])? $_POST['l_name[]']: '' ?>" placeholder="Last Name" name="l_name[]">
                  </div>


                </div>
                </td>


                <td>
                <div class="form-group">
                  <div class="col-sm-10">
                   <div class="radio">
                    <label>
                      <input type="radio" checked name="sex<?php echo $i?>"  value="M" >Male
                      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                      <input type="radio" name="sex<?php echo $i?>"  value="F">Female
                    </label>
                  </div>
                </div>
              </div>
              </td>


                <td>
                <div class="form-group">
                <div class="col-sm-10">
                  <input type="email"  class="form-control" value="<?php echo !empty($_POST['email[]'])? $_POST['email[]']: '' ?>"  placeholder="Email" name="email[]">
                </div>
                </div>
                </td>


                <td>
                <div class="form-group">
                <div class="col-sm-10">
            <input type="text"  class="form-control" value="<?php echo !empty($_POST['fone[]'])? $_POST['fone[]']: '' ?>"       placeholder="Phone Number" name="fone[]">
                </div>
              </div>
                 </td>


                 <td>
                 <div class="form-group">
                <div class="col-sm-10">
            <input type="text" class="form-control" value="<?php echo !empty($_POST['addr[]'])? $_POST['addr[]']: '' ?>" placeholder="Customer's Location" name="addr[]">
                </div>
              </div>
                 </td>

                 <td>
                 <div class="form-group">
                <div class="col-sm-10">
                  <textarea required value="<?php echo !empty($_POST['desc[]'])? $_POST['desc[]']: '' ?>" placeholder="Brief Description" name="desc[]" class="form-control"  ></textarea>
                </div>
              </div>
                 </td>


                 <td>
                  <div class="form-group">
                  <select name="level[]" value="level" class="form-control select2" >
                    <option value="">--choose--</option>
                    <option value="First Timers" selected="selected">First Timers</option>
                    <option  value="Regular/Associates">Regular/Associates</option>
                    <option value="Affiliate">Affiliate</option>


                  </select>


              </div>

                </td>
            </tr>




<?php

}// end of for

echo "  </table>
            </div>
            <!-- /.box-body -->
          </div>

          <input type='hidden' name='entry' value='$num' >
          <button type='submit' name='submit' class='btn  btn-success btn-lg pull-right'>Submit</button>
          </form>
          ";
endif;// for num >1




}}

?>


<br>
<div class="row">

 <div class="box box-solid bg-aqua">
   <form method="POST">
     <div class="col-md-1"> </div>

     <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-aqua">
        <div class="inner">
          <h4 style="font-size:23px; font-family:cursive;">Enter The Number Of Enries</h4>
        </div>

        <div class="form-group">
          <br><br><br>
          <div class="col-sm-12">
            <input style ="border-radius:10px;" type="number" class="form-control pull-left" name="entries">
          </div>
        </div>

        <div class="icon">
          &nbsp&nbsp&nbsp&nbsp<i class="fa fa-chrome"></i>
        </div> <br><br>
        <span class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></span>
      </div>
    </div>

    <div class="col-lg-3">
      <br><br><br>
      <div class="box-footer">


        <button type="submit" class="btn btn-block btn-success btn-lg" name="go">GO</button>


      </div>
      <!-- /.box-footer -->

    </div>




  </form>
</div>
</div>


<?php
entries();
insert();
?>


</div>


<?php

include 'footer.php';

?>

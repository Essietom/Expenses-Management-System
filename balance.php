<?php

include('header.php'); 

if($privilege!='1' && $privilege !='2'){
  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
  exit();
}
require "dbfolder/dbconnect.php";
function expensetitle($expenstype_id)
{
  $dbc=mysqli_connect(DBHOST,DBUSERNAME,DBPWORD,DBNAME) OR die('Error connecting to database'. mysqli_connect_error());
   $query="SELECT * FROM expenses_type WHERE expenses_type_id=$expenstype_id";
  $rquery=mysqli_query($dbc,$query);
  foreach ($rquery as $data)
  {
    if($data['expenses_type'])
    {
      return $data;
    }
    elseif(empty($data['expenses_type']))
      return "no expenses";
  }

}


?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Crystal ERP
      <small>Expenses & Income Report</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12">

        <!-- The Section and Two Divs show Start of Page Contenct -->
        <!-- Calendar -->
        <div class="col-lg-12">
          <div class="box box-solid bg-white-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Expenses $ Income Report</h3>
             
              </div>
              <!-- /.box-header -->
              <div class="box-body">


    <section class="content">
      <div class="row">
       <!--  <div class="col-md-3"></div> -->
        <!-- left column -->
        <div >

           <div class="box box-info blue-border">
            <div class="box-header with-border">
              <h3 class="box-title">Expenses & Income report</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
                                 <form role="form" class="form-inline" id="create">
                                 <?php  $dbc=mysqli_connect(DBHOST,DBUSERNAME,DBPWORD,DBNAME) OR die('Error connecting to database'. mysqli_connect_error());?>
                          <div class="box-body">
                          
                            <div class="form-group">
                              <label>From:</label>
                              <input type="date" required="" name="fromDate" placeholder="mm/dd/yyyy">
                            </div>
                            <div class="form-group">
                              <label>To:</label>
                              <input type="date" required="" name="toDate" placeholder="mm/dd/yyyy">
                            </div>
                          

                              <button id="submit" class="btn btn-primary" type="submit" name="data" >Generate report</button>
                          </div>
                          <!-- /.box-body -->

                                                  


                                               </form>
          </div>


        </div>
      </div>
  
      <div class="row">
        <div class="col-lg-12">

 <?php
    if (isset($_REQUEST['data'])):
                
    $startdate = $_REQUEST['fromDate'];
    $enddate = $_REQUEST['toDate'];

    
    ?>

        <!-- The Section and Two Divs show Start of Page Contenct -->
    <!-- Calendar -->
    <div class="col-lg-12">
          <div class="box box-solid">
            <div class="box-header">
          
              <h3 class="box-title">Expenses & Income From <?php echo '  '.$startdate.'  ' ?>To <?php echo '  '.$enddate ?></h3>
            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<!--              <div class="row"></div>  -->
<div class="col-md-6">
              <table id="staffs" class="table span12 table-striped">
          

           
            <thead>
                <tr>
                    
                      <th>Expenses Title</th>
                     <th>procured by(staff)</th>
                     <th>procured by(project)</th>
                      <th>Amount spent</th>
                      <th>Expenses date</th>

                       </tr>
            </thead>
            
            <tbody>
              <?php 

              $dbc=mysqli_connect(DBHOST,DBUSERNAME,DBPWORD,DBNAME) OR die('Error connecting to database'. mysqli_connect_error());
             
                $query="SELECT * FROM expenses, staff, project  WHERE  (expenses.expenses_date BETWEEN '$startdate' AND '$enddate') AND expenses.procured_bystaff = staff.staff_id AND expenses.procured_byproject=project.project_id";
            
              $rquery=mysqli_query($dbc,$query);

              $numofexpenses=mysqli_num_rows($rquery);
             
              if($numofexpenses>0)
              {
                
               
                while($row=mysqli_fetch_array($rquery,MYSQLI_ASSOC))
                {
                                   $expenid=$row['expenses_type_id'];
                   echo '<tr>
                   
                     <td>'. expensetitle($expenid)['expenses_type'].' </td>
                             <td>'. $row['staff_fname'] . $row['staff_ln'].' </td>
                              <td>'. $row['project_title'].' </td>
                                 <td>'. $row['expenses_amount'].' </td>
                            <td>' . $row['expenses_date'] .'</td>
                          
                            
                                            
               </tr> ';
                }
                }
 
              else
              {
                echo "There are currently no registered expenses";
              }
             
              ?>
              


                 
            </tbody>


                    </table>
       </div>
       <div class="col-md-6">

 <table  class="table span12 table-striped">
          

           
            <thead>
                <tr>
                    
                     
                     <th>Income Title</th>
                      <th>Income description</th>
                      <th>Income amount</th>
                      <th>Income date</th>
                      
                       </tr>
            </thead>
            
            <tbody>
              <?php 

              $dbc=mysqli_connect(DBHOST,DBUSERNAME,DBPWORD,DBNAME) OR die('Error connecting to database'. mysqli_connect_error());
             
              $query2="SELECT * FROM income WHERE (date_of_income BETWEEN '$startdate' AND '$enddate')";
              $rquery2=mysqli_query($dbc,$query2);
           
              $numofincome=mysqli_num_rows($rquery2);
              if($numofincome>0)
              {
                  while($row2=mysqli_fetch_array($rquery2,MYSQLI_ASSOC))
                {
                  echo '
                                       <td>'.$row2['income_title'].' </td>
                                        <td>'.$row2['income_description'].' </td>
                             <td>'.$row2['income_amount'].' </td>
                                 <td>'. $row2['date_of_income'].' </td>

                  </tr>';
              
                }
              
                // }
                echo '</table>';
                mysqli_free_result($rquery2);
              }
 
              else
              {
                echo "There are currently no registered income";
              }
             
              ?>
              


                 
            </tbody>
<!--  -->
                    </table>
            
       </div> 

  </div>
                 <?php require "calculatebalance.php"; ?>
 <?php endif; ?>
            <!-- /.box-body -->
            <div class="box-footer text-black">
              <div class="row">
                
                <?php  mysqli_close($dbc);?>  

                  
                  
               
                <!-- /.col -->
                
                  

                  
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->

          </div>
          <!-- /.col-lg-5 -->

          </div>
          </div>
          </section>

       
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col-lg-5 -->

      </div>
    </div>
  </section>

</div>



  <?php include "footer.php"; ?>
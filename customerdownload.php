<?php

include 'header.php';

if($privilege!='1' && $privilege !='3' && $privilege !='2'){
 echo "<meta http-equiv='refresh' content='0; url=index.php'/>";

  exit();
}
require 'Database/database.php';
$from= date("Y/m/d");

?>


<?php
function getcustomer (){

$cxn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('Unable to Connect DB'. mysqli_connect_error());
$sql = "SELECT * from customer ";
$result = mysqli_query($cxn,$sql);
echo '
<div class="box">
            <div class="box-header">
              <center> <h6 style="color:grey; font-size:20px;" > <u> Crystalhills Customer Table </u> </h6> </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>S/N</th>
                  <th>Name</th>
                  <th>Sex</th>
                  <th>Phone </th>
                  <th>Email</th>
                  <th>Location</th>
                  <th>Customer L.</th>

                </tr>
                </thead>
                <tbody> ';
$count=1;
foreach ($result as $data ): ?>
	
                <tr>
            		<td> <?php echo $count;?></td>
                  <td> <?php echo $data['First_Name'].','.$data['Last_Name'];?></td>
                  <td> <?php echo $data['sex'];?></td>
                  <td> <?php echo $data['Phone'];?></td>
                  <td> <?php echo $data['Email'];?></td>
                  <td> <?php echo $data['Location'];?></td>
                  <td> <?php echo $data['Level'];?></td>
                    </tr>


   <?php $count++ ;endforeach;?>


                </tbody>
                <tfoot>
                <tr>
                <th>S/N</th>
                 <th>Name</th>
                  <th>Sex</th>
                  <th>Phone </th>
                  <th>Email</th>
                  <th>Location</th>
                  <th>Customer L.</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          

<?php

}

?>
<div class="content-wrapper">
	

	<section class="content-header">

    <h1> <i class="fa fa-thumbs-up" style="font-size:50px; color:#f56954;"></i>
     Customer_Relation_Manager
     <small style="color:red;">&nbsp &nbspDownload ALL &nbspAvailable &nbspCustomers</small>
   </h1>

 
</section>

  <button class="btn btn-info" onclick="javascript:downloadPDF()">DOWNLOAD PDF</button>

<div class='content' id='gen-report'>
<?php getcustomer();?>

</div>






</div>
</div>



  <script type="text/javascript" src="js/jspdf.js"></script>
<script type="text/javascript" src="js/jspdf.debug.js"></script>

<script type="text/javascript">
        function downloadPDF() {
            var pdf = new jsPDF('p', 'pt', 'a4');
            source = $('#gen-report')[0];
         specialElementHandlers = {
                '#bypassme': function(element, renderer) {
                    return true
                }
            };
            margins = {
                top: 10,
                bottom: 60,
                left: 5,
                width: 700
            };
            pdf.fromHTML(
                    source,
                    margins.left, 
                    margins.top, {
                        'width': margins.width, 
                        'elementHandlers': specialElementHandlers
                    },
            function(dispose) {
                pdf.save('<?php echo $from;?>Customer Report.pdf');
            }
            , margins);
        }
    </script>

<?php include 'footer.php'; ?>
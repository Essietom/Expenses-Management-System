<?php


 include('header.php');
 if($privilege!='1' && $privilege !='2'){
   echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
   exit();
 }
require "classes/incomeclass.php";
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Crystal ERP
      <small>Income Report</small>
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
        <div class="box box-solid bg-white-gradient">
          <div class="box-header">
            <h3 class="box-title">Income Report</h3>

          </div>
          <!-- /.box-header -->
          <div class="box-body">


            <section class="content">
              <div class="row">

               <div class="box box-info blue-border">
                <div class="box-header with-border">
                  <h3 class="box-title">Income report</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" class="form-inline" id="create">

                  <div class="box-body">

                    <div class="form-group">
                      <label>From:</label>
                      <input type="date" required="" name="fromDate" placeholder="yyyy-mm-dd">
                    </div>
                    <div class="form-group">
                      <label>To:</label>
                      <input type="date" required="" name="toDate" placeholder="yyyy-mm-dd">
                    </div>

                    <button id="submit" class="btn btn-primary" type="submit" name="data" >Generate report</button>
                  </div>
                  <!-- /.box-body -->




                </form>
              </div>


            </div>
          </div>
        </section>


        <!-- Tab panes -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-12">

             <?php


             if (isset($_REQUEST['data'])):

              $startdate = $_REQUEST['fromDate'];
            $enddate = $_REQUEST['toDate'];

            ?>


            <div class="col-lg-12">
              <div class="box box-solid">
                <div class="box-header">
                  <i class="fa fa-calendar"></i>

                  <h3 class="box-title">Income From <?php echo '  '.$startdate.'  ' ?>To <?php echo '  '.$enddate ?></h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">

                  <div id="pay-report">
                    <table class="table span12 table-striped">

                      <thead>
                        <tr>
                          <th>Income Title</th>
                          <th>Income description</th>
                          <th>Customer/Company's name</th>
                          <th>Date</th>
                          <th>Amount</th>

                        </tr>
                      </thead>

                      <tbody>

                        <?php income::viewincomereport($startdate,$enddate); ?>

                      </tbody>
                    </table>
                  </div>

                </div>

              </div>
              <!-- /.box -->
            <?php endif;?>
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

<script type="text/javascript" src="js/jspdf.js"></script>
<script type="text/javascript" src="js/jspdf.debug.js"></script>
<script type="text/javascript">
  function downloadPDF() {
    var pdf = new jsPDF('p', 'pt', 'letter');
    source = $('#pay-report')[0];
    specialElementHandlers = {
      '#bypassme': function(element, renderer) {
        return true
      }
    };
    margins = {
      top: 80,
      bottom: 60,
      left: 40,
      width: 522
    };
    pdf.fromHTML(
      source,
      margins.left,
      margins.top, {
        'width': margins.width,
        'elementHandlers': specialElementHandlers
      },
      function(dispose) {
        pdf.save('<?php echo $startdate . '-' .$enddate; ?> Payment Report.pdf');
      }
      , margins);
  }
</script>


<?php include "footer.php"; ?>

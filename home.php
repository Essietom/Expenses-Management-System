<?php
include "header.php";

require "functions/class.php";

?>
 <div class="content-wrapper">

   <section class="content">
     <!-- Small boxes (Stat box) -->
     <div class="row">
       <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-aqua">
           <div class="inner">
             <h3 style="color:gold;">*****</h3>

             <p>CrystalHills</p>
           </div>
           <div class="icon">
             <i class="ion ion-bag"></i>
           </div>
         <!--   <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
         </div>
       </div>


       <!-- ./col -->
       <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-green">
           <div class="inner">
             <h3>100<sup style="font-size: 20px">%</sup> <sup style="font-size: 20px; color:gold;">*****</sup></h3>

             <p>CrystalHills</p>
           </div>
           <div class="icon">
             <i class="ion ion-stats-bars"></i>
           </div>
           <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
         </div>
       </div>
       <!-- ./col -->

       <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-yellow">
           <div class="inner">
             <h3 style="color:gold;">*****</h3>

             <p>CrystalHills</p>
           </div>
           <div class="icon">
             <i class="ion ion-person-add"></i>
           </div>
           <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
         </div>
       </div>
       <!-- ./col -->

       <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-red">
           <div class="inner">
             <h3 style="color:gold;">*****</h3>

             <p>CrystalHills</p>
           </div>
           <div class="icon">
             <i class="ion ion-pie-graph"></i>
           </div>
           <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
         </div>
       </div>
       <!-- ./col -->
     </div>
     <!-- /.row -->


   </section>

   <section class="content">

   <div class="row">

   <div class="col-lg-6">


     <div class="box box-primary">
       <div class="box-header">
         <i class="ion ion-clipboard"></i>

         <h3 class="box-title">To Do List</h3>


       </div>
       <!-- /.box-header -->
       <div class="box-body">

         <div class="col-md-9">
           <div class="box box-primary">
             <div class="box-header with-border">
               <h3 class="box-title">Compose New Message</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
               <div class="form-group">
                 <input class="form-control" placeholder="To:">
               </div>
               <div class="form-group">
                 <input class="form-control" placeholder="Subject:">
               </div>
               <div class="form-group">
                     <textarea id="compose-textarea" class="form-control" style="height: 300px">
                       <h1><u>Heading Of Message</u></h1>
                       <h4>Subheading</h4>
                       <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
                         was born and I will give you a complete account of the system, and expound the actual teachings
                         of the great explorer of the truth, the master-builder of human happiness. No one rejects,
                         dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know
                         how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again
                         is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,
                         but because occasionally circumstances occur in which toil and pain can procure him some great
                         pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise,
                         except to obtain some advantage from it? But who has any right to find fault with a man who
                         chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that
                         produces no resultant pleasure? On the other hand, we denounce with righteous indignation and
                         dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so
                         blinded by desire, that they cannot foresee</p>
                       <ul>
                         <li>List item one</li>
                         <li>List item two</li>
                         <li>List item three</li>
                         <li>List item four</li>
                       </ul>
                       <p>Thank you,</p>
                       <p>John Doe</p>
                     </textarea>
               </div>
               <div class="form-group">
                 <div class="btn btn-default btn-file">
                   <i class="fa fa-paperclip"></i> Attachment
                   <input type="file" name="attachment">
                 </div>
                 <p class="help-block">Max. 32MB</p>
               </div>
             </div>
             <!-- /.box-body -->
             <div class="box-footer">
               <div class="pull-right">
                 <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                 <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
               </div>
               <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
             </div>
             <!-- /.box-footer -->
           </div>
           <!-- /. box -->
         </div>



       </div>
       <!-- /.box-body -->
       <div class="box-footer clearfix no-border">
         <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
       </div>
     </div>


   </div>


         <div class="col-lg-6">
          <div class="box box-solid bg-blue-gradient">
            <div class="box-header">
              <i class="fa fa-area-chart"></i>

              <h3 class="box-title">Today</h3>
              <!-- tools box -->

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The Cards -->

             <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo date("l");
                  ?></h3>

              <p>Today</p>
            </div>
            <div class="icon">
              <i class="fa fa-check"></i>
            </div>
          </div>
        </div>
         <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo date('M'); ?></h3>

              <p>Month</p>
            </div>
            <div class="icon">
              <i class="fa  fa-calendar-check-o"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo date("Y-m-d"); ?></h3>

              <p>Date</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
          </div>
        </div>




            </div>
            <!-- /.box-body -->
</div>

<!-- -->
</div>
</section>
</div>

</div>


<?php
include('footer.php'); ?>

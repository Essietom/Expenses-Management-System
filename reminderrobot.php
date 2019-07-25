<?php 
              if($privilege=='2' || $privilege=='1')
              {
                expensesmgt::reminder('expenses','expenses_date');
                expensesmgt::reminder('income','date_of_income');
              }
              elseif($privilege=='3')
              {
                expensesmgt::reminder('purchase','Date');
              }
              
              ?>
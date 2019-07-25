
<?php

if($privilege!='1' && $privilege !='3' && $privilege !='2'){
echo "<meta http-equiv='refresh' content='0; url=index.php'/>";

  exit();
}
require "functions/class.php";


$sql = " SELECT  sum(income_amount) as totincome from income where date_of_income='2016-10-01'";
$query=expensesmgt::calldb()->query($sql);

foreach ($query as $data ) {
	
	$totalincome= $data['totincome'];
}

$sql = " SELECT sum(expenses_amount) as total from expenses where expenses_date=date(now())";
$query=expensesmgt::calldb()->query($sql);

foreach ($query as $data ) {
	
	
	$totalexpenses= $data['total'];
}

$balance=$totalincome-$totalexpenses;

$message="Income And Expenses Report For ". date("j/n/Y")."::Total income: $totalincome  ;  Total expenses: $totalexpenses;  Balance: $balance";
echo $message;


?>
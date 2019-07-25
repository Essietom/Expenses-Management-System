<?php

require 'functions/class.php';

class Report 
{


	public function getExpensesTypeID($id)
	{
		$sql = "SELECT expenses_type FROM expenses_type WHERE expenses_type_id = '{$id}'";
        $query = expensesmgt::calldb()->query($sql);
        $query->execute();

        return $query;
        
        
	}

	public function getExpenseDetails($startdate, $enddate)
	{

			$sql = "SELECT sum(expenses_amount), expenses_type_id FROM `expenses` WHERE (expenses_date BETWEEN '$startdate' AND '$enddate')  GROUP BY expenses_type_id " ;
	        $query = expensesmgt::calldb()->query($sql);
	        $query->execute();
	        $sum = 0;
	        $sn = 0;
	        foreach($query as $final)
	        {
	        	$result = $this->getExpensesTypeID($final['expenses_type_id']);
	        	foreach ($result as $name) {

	        		$data = array($name[0],$final[0]);
	        		
	        		echo '<tr>'; 
	        		echo '<td>' . $sn += 1; '</td>';
					echo '<td>' . ucfirst($data[0]); '</td>';
					echo '<td> N ' . number_format($data[1], 2); '</td>';
					

					$sum += $data[1];
	        	}
	        	
	        }
		
		echo '<td> Total </td>';
		echo '<td class="alert alert-danger"><b> N ' . number_format($sum, 2); '</b></td>';
		echo '</tr>';
	}

	public function getIncome($startdate, $enddate)
	{
			$sql = "SELECT sum(income_amount)FROM `income` WHERE (date_of_income BETWEEN '$startdate' AND '$enddate')";
	        $query = expensesmgt::calldb()->query($sql);
	        $query->execute();
	        foreach ($query as $result) {
	        		echo '<tr>';
					echo '<td> Total Income </td>';
					echo '<td class="alert alert-success"><b> N ' . number_format($result[0], 2); '</b></td>';
					echo '</tr>';
	        }
	}


}


?>
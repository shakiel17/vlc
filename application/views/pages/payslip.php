<table width="100%" border="0">
	<tr>
		<td align="center">
<?php
		foreach($payroll_daily as $item){
			$des=$this->Payroll_model->getEmployeeDetails($item['empid']);
			$deduction=$this->Payroll_model->getDeduction($item['payroll_period'],$item['empid']);
			$fixed_deduction=$this->Payroll_model->getAllFixedDeduction($item['empid']);
			$adjustment=$this->Payroll_model->getAllAdjustment($item['payroll_period'],$item['empid']);
			$totaladjustment=0;
						foreach($adjustment as $row){
							$totaladjustment += $row['amount'];
						}
			$gross=($item['no_of_days_work']*$des['salary'])+$totaladjustment;	
			if($gross > 0){		
			?>
<div style="width: 45%; float: left; margin-right: 20px; margin-bottom: 30px;">
<table width="100%" border="0" style="font-size: 12px;" cellspacing="0" cellpadding="3">
	<tr>		
			<td  style="border:0px solid black;">
				<b style="font-size:12px;">VLC DRIVING TUTORIAL SERVICES</b><br>	            
	            <b style="font-size:12px;">Payroll Period : <?=$period['startdate'];?> to <?=$period['enddate'];?></b><br>
	            <b style="font-size:12px;"><?=$des['designation'];?></b> <b style="float:right;">Daily Rate: <?=number_format($des['salary'],2);?></b><br><br>
	            <b>Employee: (<?=$item['empid'];?>) <?=$item['lastname'];?>, <?=$item['firstname'];?> <?=$item['middlename'];?></b>
	            <hr><hr>
	            <table width="100%" border="0" style="font-size: 12px;">
	            	<tr>
	            		<td>Required Days</td>
	            		<td colspan="2"><?=$item['no_of_days_required'];?></td>
	            	</tr>
	            	<tr>
	            		<td>Days Worked</td>
	            		<td><?=$item['no_of_days_work'];?></td>
	            		<td align="right"><?=number_format($item['no_of_days_work']*$item['salary'],2);?></td>
	            	</tr>
					<?php
					$totaladjustment=0;
						foreach($adjustment as $row){							
					?>
	            	<tr>
	            		<td><?=$row['description'];?></td>
	            		<td colspan="2" align="right"><?=number_format($row['amount'],2);?></td>
	            	</tr>
					<?php
						$totaladjustment += $row['amount'];
						}
					?>
	            	<tr>
	            		<td colspan="3">&nbsp;</td>
	            	</tr>
	            	<tr>
	            		<td><b>Gross Pay.........</b></td>
	            		<td colspan="2" align="right"><b><?=number_format(($item['no_of_days_work']*$item['salary'])+$totaladjustment,2);?></b></td>
	            	</tr>
	            	<tr>
	            		<td colspan="3">&nbsp;</td>
	            	</tr>
	            	<tr>
	            		<td colspan="3"><b>DEDUCTIONS</b></td>
	            	</tr>	            	
	            	<?php
	            	$totaldeduction=0;
	            	foreach($deduction as $row){
	            		?>
	            		<tr>
		            		<td><?=$row['description'];?></td>
		            		<td colspan="2" align="right"><?=number_format($row['amount'],2);?></td>
	            		</tr>
	            		<?php
	            		$totaldeduction += $row['amount'];
	            	}
					foreach($fixed_deduction as $row){
	            		?>
	            		<tr>
		            		<td><?=$row['description'];?></td>
		            		<td colspan="2" align="right"><?=number_format($row['amount'],2);?></td>
	            		</tr>
	            		<?php
	            		$totaldeduction += $row['amount'];
	            	}
	            	?>
	            	<tr>
	            		<td colspan="3">&nbsp;</td>
	            	</tr>
	            	<tr>
	            		<td><b>Total Deduction.........</b></td>
	            		<td colspan="2" align="right"><b><?=number_format($totaldeduction,2);?></b></td>
	            	</tr>

	            	<tr>
	            		<td colspan="3">&nbsp;</td>
	            	</tr>
	            	<tr>
	            		<td><b>Net Pay.........</b></td>
	            		<td colspan="2" align="right"><b><?=number_format((($item['no_of_days_work']*$item['salary'])+$item['adjustment'])-$totaldeduction,2);?></b></td>
	            	</tr>
	            </table>
	            
			</td>
			
	</tr>
</table>
</div>
				

<?php
			}
		}
	?>
	</td>
</tr>
	</table>
	<br><br>
	<table width="100%" border="0">
<tr>
	<td align="center">
	<?php
		$per_head=4;
		foreach($payroll_per_head as $item){
			$des=$this->Payroll_model->getEmployeeDetails($item['empid']);
			$deduction=$this->Payroll_model->getDeduction($item['payroll_period'],$item['empid']);
			$fixed_deduction=$this->Payroll_model->getAllFixedDeduction($item['empid']);
			$adjustment=$this->Payroll_model->getAllAdjustment($item['payroll_period'],$item['empid']);
			$totaladjustment=0;
	            foreach($adjustment as $row){
					$totaladjustment += $row['amount'];
				}
				$comp=$this->Payroll_model->getAllComputation();
				$per_head=$comp['employee'];
			$pdc=$item['no_of_heads_pdc']*$comp['pdc'];
            $tdc=$item['no_of_heads_tdc']*$comp['tdc'];
            $gross=(($pdc+$tdc)/$per_head) + $totaladjustment;			
			?>
<div style="width: 45%; margin-right: 20px; float: left;">
<table width="100%" border="0" style="font-size: 12px;" cellspacing="0" cellpadding="0">
	<tr>		
			<td style="border:0px solid black;">
				<b style="font-size:12px;">VLC DRIVING TUTORIAL SERVICES</b><br>	            
	            <b style="font-size:12px;">Payroll Period : <?=$period['startdate'];?> to <?=$period['enddate'];?></b><br>
	            <b style="font-size:12px;"><?=$des['designation'];?></b><br><br>
	            <b>Employee: (<?=$item['empid'];?>) <?=$item['lastname'];?>, <?=$item['firstname'];?> <?=$item['middlename'];?></b>
	            <hr><hr>
	            <table width="100%" border="0" style="font-size: 12px;">
	            	<tr>
	            		<td>No. of PDC</td>
	            		<td><?=$item['no_of_heads_pdc'];?></td>	
	            		<td align="right"><?=number_format($pdc/$per_head,2);?></td>
	            	</tr>
	            	<tr>
	            		<td>No. of TDC</td>
	            		<td ><?=$item['no_of_heads_tdc'];?></td>	
	            		<td align="right"><?=number_format($tdc/$per_head,2);?></td>            		
	            	</tr>
					<?php					
	            	foreach($adjustment as $row){
					?>
	            	<tr>
	            		<td><?=$row['description'];?></td>
	            		<td colspan="2" align="right"><?=number_format($row['amount'],2);?></td>
	            	</tr>
					<?php
					}
					?>
	            	<tr>
	            		<td colspan="3">&nbsp;</td>
	            	</tr>
	            	<tr>
	            		<td><b>Gross Pay.........</b></td>
	            		<td colspan="2" align="right"><b><?=number_format($gross,2);?></b></td>
	            	</tr>
	            	<tr>
	            		<td colspan="3">&nbsp;</td>
	            	</tr>
	            	<tr>
	            		<td colspan="3"><b>DEDUCTIONS</b></td>
	            	</tr>	            	
	            	<?php
	            	$totaldeduction=0;
	            	foreach($deduction as $row){
	            		?>
	            		<tr>
		            		<td><?=$row['description'];?></td>
		            		<td colspan="2" align="right"><?=number_format($row['amount'],2);?></td>
	            		</tr>
	            		<?php
	            		$totaldeduction += $row['amount'];
	            	}
					foreach($fixed_deduction as $row){
	            		?>
	            		<tr>
		            		<td><?=$row['description'];?></td>
		            		<td colspan="2" align="right"><?=number_format($row['amount'],2);?></td>
	            		</tr>
	            		<?php
	            		$totaldeduction += $row['amount'];
	            	}
	            	?>
	            	<tr>
	            		<td colspan="3">&nbsp;</td>
	            	</tr>
	            	<tr>
	            		<td><b>Total Deduction.........</b></td>
	            		<td colspan="2" align="right"><b><?=number_format($totaldeduction,2);?></b></td>
	            	</tr>

	            	<tr>
	            		<td colspan="3">&nbsp;</td>
	            	</tr>
	            	<tr>
	            		<td><b>Net Pay.........</b></td>
	            		<td colspan="2" align="right"><b><?=number_format($gross-$totaldeduction,2);?></b></td>
	            	</tr>
	            </table>
	            
			</td>
			
	</tr>
</table>
</div>

<?php
		}
	?>
</td>
</tr>
</table>
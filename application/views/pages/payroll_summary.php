<div align="center">
			 <b style="font-size:20px;">VLC DRIVING TUTORIAL SERVICES</b><br>
             <b>Kidapawan City</b><br><br>
             <h3>PAYROLL SUMMARY</h3>
             <b><?=date('M d, Y',strtotime($payroll_period['startdate']));?> to <?=date('M d, Y',strtotime($payroll_period['enddate']));?></b>
             </div>
<div>
    DAILY RATE SALARY
    <table border="1" width="100%" cellspacing="0" cellpadding="1" style="border-collapse: collapse; font-size:14px;">
        <tr>
            <td align="center">No.</td>
            <td align="center" width="25%">Name</td>
            <td align="center" width="8%">Rate</td>
            <td align="center" width="10%">Required Days</td>
            <td align="center" width="10%">Days Worked</td>
            <td align="center" width="8%">Adjustment</td>
            <td align="center" width="10%">Gross Pay</td>
            <td align="center" width="8%">Deduction</td>
            <td align="center" width="9%">Net Pay</td>
            <td align="center" width="12%">Signature</td>
        </tr>
        <?php
        $x=1;
        $totalnet=0;
        $totalgross=0;
        $totaladjustment=0;
        $totaldeduction=0;
        foreach($payroll_daily as $branch){
            $adjustment=$this->Payroll_model->getAllAdjustment($branch['payroll_period'],$branch['empid']);			
            $adjusttotal=0;
            foreach($adjustment as $row){
                $adjusttotal += $row['amount'];
            }
            $net=(($branch['salary']*$branch['no_of_days_work'])+$adjusttotal) - $branch['deduction'];
            $gross=($branch['salary']*$branch['no_of_days_work'])+$adjusttotal;
            echo "<tr>";
                echo "<td>$x.</td>";
                echo "<td>$branch[lastname], $branch[firstname] $branch[middlename] $branch[suffix]</td>";                                
                echo "<td align='right'>".number_format($branch['salary'],2)."</td>";
                echo "<td align='center'>$branch[no_of_days_required]</td>";
                echo "<td align='center'>$branch[no_of_days_work]</td>";
                echo "<td align='right'>".number_format($adjusttotal,2)."</td>";
                echo "<td align='right'>".number_format($gross,2)."</td>";
                echo "<td align='right'>".number_format($branch['deduction'],2)."</td>";
                echo "<td align='right'><b>".number_format($net,2)."</b></td>";
                echo "<td>&nbsp;</td>";
            echo "</tr>";
            $totalnet += $net;
            $totalgross += $gross;
            $totaladjustment += $adjusttotal;
            $totaldeduction += $branch['deduction'];
            $x++;
        }
        ?>
        <tr>
            <td colspan="5"><b>Total</b></td>
            <td align="right"><b><?=number_format($totaladjustment,2);?></b></td>
            <td align="right"><b><?=number_format($totalgross,2);?></b></td>
            <td align="right"><b><?=number_format($totaldeduction,2);?></b></td>
            <td align="right"><b><?=number_format($totalnet,2);?></b></td>
            <td>&nbsp;</td>
        </tr>
    </table>
    <br>
    INSTRUCTOR SALARY
    <table border="1" width="100%" cellspacing="0" cellpadding="1" style="border-collapse: collapse; font-size:14px;">
        <tr>
            <td align="center">No.</td>
            <td align="center" width="25%">Name</td>
            <td align="center" width="8%">PDC</td>
            <td align="center" width="8%">TDC</td>            
            <td align="center" width="10%">Adjustment</td>
            <td align="center" width="13%">Gross Pay</td>
            <td align="center" width="10%">Deduction</td>
            <td align="center" width="13%">Net Pay</td>
            <td align="center" width="13%">Signature</td>
        </tr>
        <?php
        $x=1;
        $totalnet=0;
        $totalgross=0;
        $totaladjustment=0;
        $totaldeduction=0;
        $per_head=4;
        foreach($payroll_per_head as $branch){
            $adjustment=$this->Payroll_model->getAllAdjustment($branch['payroll_period'],$branch['empid']);			
            $adjusttotal=0;
            foreach($adjustment as $row){
                $adjusttotal += $row['amount'];
            }
            $pdc=$branch['no_of_heads_pdc']*60;
            $tdc=$branch['no_of_heads_tdc']*80;
            $gross=(($pdc+$tdc)/$per_head) + $adjusttotal;
            $net=$gross - $branch['deduction'];
            echo "<tr>";
                echo "<td>$x.</td>";
                echo "<td>$branch[lastname], $branch[firstname] $branch[middlename] $branch[suffix]</td>";                                                
                echo "<td align='center'>$branch[no_of_heads_pdc]</td>";
                echo "<td align='center'>$branch[no_of_heads_tdc]</td>";
                echo "<td align='right'>".number_format($adjusttotal,2)."</td>";
                echo "<td align='right'>".number_format($gross,2)."</td>";
                echo "<td align='right'>".number_format($branch['deduction'],2)."</td>";
                echo "<td align='right'><b>".number_format($net,2)."</b></td>";
                echo "<td>&nbsp;</td>";
            echo "</tr>";
            $totalnet += $net;
            $totalgross += $gross;
            $totaladjustment += $adjusttotal;
            $totaldeduction += $branch['deduction'];
            $x++;
        }
        ?>
        <tr>
            <td colspan="4"><b>Total</b></td>
            <td align="right"><b><?=number_format($totaladjustment,2);?></b></td>
            <td align="right"><b><?=number_format($totalgross,2);?></b></td>
            <td align="right"><b><?=number_format($totaldeduction,2);?></b></td>
            <td align="right"><b><?=number_format($totalnet,2);?></b></td>
            <td>&nbsp;</td>
        </tr>
    </table>
</div>

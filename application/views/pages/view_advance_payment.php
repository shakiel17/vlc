<?php
$totaladvances=0;
foreach($advances as $item){
    $totaladvances += $item['amount'];
}
$totalpayment=0;
foreach($payment as $item){
    $totalpayment += $item['amount'];
}
?>
<div style="width:50%;">
             <b style="font-size:20px;">VLC DRIVING TUTORIAL SERVICES</b><br>
             <b>Kidapawan City</b><br><br>
             <b>ADVANCES DETAILS
             </div>
<div><br>
<div style="width:100%;">
    <table border="1" width="100%" cellspacing="0" cellpadding="1" style="border-collapse: collapse;">
        <tr>
            <td width="25%"><b>Name of Employee:</b></td>
            <td colspan="3"><b><?=$emp['lastname'];?>, <?=$emp['firstname'];?> <?=$emp['middlename'];?></b></td>
        </tr>
        <tr>
            <td width="25%"><b>Total Advances:</b></td>
            <td><b><?=number_format($totaladvances,2);?></b></td>
            <td width="25%"><b>Remaining Balance:</b></td>
            <td><b><?=number_format($totaladvances-$totalpayment,2);?></b></td>
        </tr>
    </table>
    <br>
    <b>Payment Details</b>
    <table border="1" width="100%" cellspacing="0" cellpadding="1" style="border-collapse: collapse;">
        <tr>
            <td align="center" width="5%">No.</td>
            <td align="center">Payroll Period</td>
            <td align="center">Amount</td>
        </tr>
        <?php
        $x=1;
        foreach($payment as $row){
            $payroll=$this->Payroll_model->getPayrollPeriod($row['payroll_period']);
            echo "<tr>";
                echo "<td align='center'>$x.</td>";
                echo "<td>".date('M d, Y',strtotime($payroll['startdate']))." - ".date('M d, Y',strtotime($payroll['enddate']))."</td>";
                echo "<td align='right'>".number_format($row['amount'],2)."</td>";
            echo "</tr>";
            $x++;
        }
        ?>
    </table>
</div>
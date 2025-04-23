<div id="printArea">
             <b style="font-size:20px;">VLC DRIVING TUTORIAL SERVICES</b><br><br>
             <b style="font-size:18px;">CONSOLIDATED REPORT</b><br><br>             
             <b>Date: <?=date('m/d/Y',strtotime($date));?>             </b>
<br>
    <table width="100%" border="0">
        <tr>
            <td style="vertical-align:top; width:35%;">
                <table border="1" width="100%" cellspacing="0" cellpadding="1" style="border-collapse: collapse;">
                    <tr>
                        <td colspan="3" align="center"><b>E X P E N S E S</b></td>
                    </tr>
                    <tr>
                        <td align="center" width="2%">NO.</td>
                        <td align="center" width="30%">DESCRIPTION</td>            
                        <td align="center" width="10%">AMOUNT</td>            
                    </tr>
                    <?php
                        $x=1;
                        $totalamountExpense=0;
                        foreach($items as $item){
                            echo "<tr>";
                                echo "<td align='center'>$x.</td>";
                                echo "<td>$item[description]</td>";                
                                echo "<td align='right'>".number_format($item['amount'],2)."</td>";                   
                            echo "</tr>";
                            $x++;
                            $totalamountExpense += $item['amount'];
                        }
                    ?>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>TOTAL</b></td>
                        <td align="right"><b><?=number_format($totalamountExpense,2);?></b></td>
                    </tr>
                </table>
            </td>
       
            <td style="vertical-align:top; width:35%;">
            <table border="1" width="100%" cellspacing="0" cellpadding="1" style="border-collapse: collapse;">
                    <tr>
                        <td colspan="3" align="center"><b>BALANCES/ADDITIONAL MONEY</b></td>
                    </tr>
                    <tr>
                        <td align="center" width="2%">NO.</td>
                        <td align="center" width="30%">DESCRIPTION</td>            
                        <td align="center" width="10%">AMOUNT</td>            
                    </tr>
                    <?php
                        $x=1;
                        $totalamountBalance=0;
                        if(count($balance)>0){
                            $t=count($deposit);
                        foreach($balance as $item){
                            echo "<tr>";
                                echo "<td align='center'>$x.</td>";
                                echo "<td>$item[description]</td>";                
                                echo "<td align='right'>".number_format($item['amount'],2)."</td>";                   
                            echo "</tr>";
                            $x++;
                            $totalamountBalance += $item['amount'];
                        }
                        if($t < count($items)){
                            $v=count($items)-$t;
                            for($w=0;$w<$v;$w++){
                                echo "<tr>";
                                echo "<td align='center'>&nbsp;</td>";
                                echo "<td>&nbsp;</td>";                
                                echo "<td align='right'>&nbsp;</td>";
                            echo "</tr>";
                            }
                        }
                    }else{
                        for($i=0;$i<count($items);$i++){
                        echo "<tr>";
                            echo "<td align='center'>&nbsp;</td>";
                            echo "<td>&nbsp;</td>";                
                            echo "<td align='right'>&nbsp;</td>";
                        echo "</tr>";                   
                        }     
                    }
                    ?>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>TOTAL</b></td>
                        <td align="right"><b><?=number_format($totalamountBalance,2);?></b></td>
                    </tr>
                </table>
            </td>
        
            <td style="vertical-align:top; width:30%;">
            <table border="1" width="100%" cellspacing="0" cellpadding="1" style="border-collapse: collapse;">
                    <tr>
                        <td colspan="3" align="center"><b>BANK DEPOSIT</b></td>
                    </tr>
                    <tr>
                        <td align="center" width="2%">NO.</td>
                        <td align="center" width="30%">DESCRIPTION</td>            
                        <td align="center" width="10%">AMOUNT</td>            
                    </tr>
                    <?php
                        $x=1;
                        $totalamountDeposit=0;
                        if(count($deposit)>0){
                            $t=count($deposit);
                        foreach($deposit as $item){
                            echo "<tr>";
                                echo "<td align='center'>$x.</td>";
                                echo "<td>$item[description]</td>";                
                                echo "<td align='right'>".number_format($item['amount'],2)."</td>";                   
                            echo "</tr>";
                            $x++;
                            $totalamountDeposit += $item['amount'];
                        }
                        if($t < count($items)){
                            $v=count($items)-$t;
                            for($w=0;$w<$v;$w++){
                                echo "<tr>";
                                echo "<td align='center'>&nbsp;</td>";
                                echo "<td>&nbsp;</td>";                
                                echo "<td align='right'>&nbsp;</td>";
                            echo "</tr>";
                            }
                        }
                    }else{
                        for($i=0;$i<count($items);$i++){
                            echo "<tr>";
                                echo "<td align='center'>&nbsp;</td>";
                                echo "<td>&nbsp;</td>";                
                                echo "<td align='right'>&nbsp;</td>";
                            echo "</tr>";                   
                            }                         
                    }
                    ?>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>TOTAL</b></td>
                        <td align="right"><b><?=number_format($totalamountDeposit,2);?></b></td>
                    </tr>                                        
                </table>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>
                <table border="1" width="100%" cellspacing="0" cellpadding="1" style="border-collapse: collapse;">
                <tr>
                        <td colspan="2"><b>TOTAL EXPENSES</b></td>
                        <td align="right"><b><?=number_format($totalamountDeposit+$totalamountExpense,2);?></b></td>
                    </tr>
                    </table>
            </td>
        </tr>
</div>


<script>
    function printDiv(divName) {
	                     var printContents = document.getElementById(divName).innerHTML;
	                     var originalContents = document.body.innerHTML;

	                     document.body.innerHTML = printContents;

	                     window.print();

	                     document.body.innerHTML = originalContents;
	                }
</script>
<div align="center">
             <b style="font-size:20px;">VLC DRIVING TUTORIAL SERVICES</b><br>
             <b>Kidapawan City</b><br><br>
             <?=$type;?> <?=$interval;?> ENROLLEES<br><br>             
             </div>   
             <div>
             <?=$date;?>
             </div>
<div><br>
    <table border="1" width="100%" cellspacing="0" cellpadding="1" style="border-collapse: collapse;">
        <tr>
            <td align="center">NO.</td>
            <td align="center" width="30%">NAME</td>
            <td align="center">TYPE</td>
            <td align="center">CODE</td>
            <td align="center">AMOUNT</td>
            <td align="center">STATUS</td>
            <td align="center" width="30%">REMARKS</td>
        </tr>
        <?php
            $x=1;
            foreach($items as $item){
                echo "<tr>";
                    echo "<td>$x.</td>";
                    echo "<td>$item[lastname], $item[firstname]</td>";
                    echo "<td align='center'>$item[type]</td>";
                    echo "<td align='center'>$item[code]</td>";
                    echo "<td align='right'>".number_format($item['amount'],2)."</td>";
                    echo "<td align='center'>$item[status]</td>";
                    echo "<td align='center' style='font-size:12px;'>$item[remarks]</td>";
                echo "</tr>";
                $x++;
            }
        ?>
    </table>
</div>
<div align="center">
             <b style="font-size:20px;">VLC DRIVING TUTORIAL SERVICES</b><br>
             <b>Kidapawan City</b><br><br>
             <b>EMPLOYEE LIST</b><br><br>             
             </div>                
<div><br>
    <table border="1" width="100%" cellspacing="0" cellpadding="1" style="border-collapse: collapse;">
        <tr>
            <td align="center" width="5%">NO.</td>
            <td align="center" width="50%">NAME</td>            
            <td align="center" width="15">DATE</td>            
            <td align="center" width="30%">SIGNATURE</td>
        </tr>
        <?php
            $x=1;
            $totalamount=0;
            foreach($items as $item){                
                echo "<tr>";
                    echo "<td>$x.</td>";
                    echo "<td>$item[lastname], $item[firstname]</td>";                    
                    echo "<td align='center'></td>";
                    echo "<td align='center' style='font-size:12px;'></td>";
                echo "</tr>";               
                $x++;
            }
        ?>
        <tr>
            <td colspan="7">&nbsp;</td>
        </tr>       
    </table>
</div>
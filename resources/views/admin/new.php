<?php $i=count($Payment);
          $i=$i-1;
            $j=0;
             ?>
        <?php 
        for($no=0;$no<count($PaymentTypes);$no++)
        {
          // echo $PaymentTypes[$no]['PaymentType'];
           $html='  <tr><td>  <input type="checkbox"  name="Mode[]" value="'.$PaymentTypes[$no]['PaymentType'].'"';
                 
          for($n=0;$n<count($Payment)-1;$n++)
          {
            // echo $Payment[$n]['Remarks'];
            if($Payment[$n]['Mode']==$PaymentTypes[$no]['PaymentType'] && $Payment[$n]['SchemeID']!=NULL)
            {
                  $html.=' checked';
                   $n1=$n;
                  break;  

            }
            else
            {
              $n1=-1;
            }
           
          }
          $html.='> &emsp;<label>'.$PaymentTypes[$no]['PaymentType'].'</label>&emsp;</td><td><input type="text"
          class="form-control price2" name="Amount[]"';
          if($n1==-1)
          {
             $html.=' disabled="" value="" name="Amount[]"></td>&emsp;<td><input type="text"class="form-control" name="Remark[]" disabled="" value=""></td></tr>';
          }
          else
          {
            $html.=' value="'.$Payment[$n]['Amount'].'"  name="Amount[]"></td>&emsp;<td><input type="text"class="form-control" name="Remark[]" value="'.$Payment[$n1]['Remarks'].'"></td></tr>';
          }
              echo $html;  
          }
         ?> 
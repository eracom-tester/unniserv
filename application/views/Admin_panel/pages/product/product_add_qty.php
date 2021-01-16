<?php


?>
 
    
    <table class="table table-hover">  
        <?php
        if(is_array($sku) && !empty($sku)){
            foreach($sku as $skus){
                ?>
                <tr>
                    <td><?= $skus;?></td>
                    <td><input type="text" name="qty[<?= $skus;?>]" class="form-control" placeholder="Enter Qty" value=""></td>
                </tr>
                <?php
            }
        }else{
            ?>
            <tr>
                <td>Qty</td>
                <td><input type="text" name="qty" class="form-control" placeholder="Enter Qty" value=""></td>
            </tr>
            <?php
        }
        ?>
    </table>
    
 
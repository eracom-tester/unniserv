<?php
$key_= isset($placeholder) ? $placeholder:'key';


if(!isset($data)){
     $data=false;
}


?>
<div class="table-responsive">
    <table class="table" id="table<?= $name;?>">
        <?php
        if($data!=false){
            for($i=0;$i<count($data);$i++){
               ?>
                <tr>
                    <td><input type="text" class="form-control" Placeholder="<?= $key_;?>" name="<?= $name;?>[<?= $i;?>][key]" value="<?= $data[$i]['key'];?>"></td>
                    <td><input type="text" class="form-control" Placeholder="Value" name="<?= $name;?>[0][value]" value="<?= $data[$i]['value'];?>"></td>
                    <td>
                        <?php
                        if($i==0){
                            ?>
                            <button class="btn btn-sm add_row<?= $name;?>" data-tableid="<?= $name;?>" >+</button>
                            <?php
                        }
                        ?>
                        
                    </td>
                </tr>
               <?php 
            }
        }else{
            ?>
            <tr>
                <td><input type="text" class="form-control" Placeholder="<?= $key_;?>" name="<?= $name;?>[0][key]" ></td>
                <td><input type="text" class="form-control" Placeholder="Value" name="<?= $name;?>[0][value]" ></td>
                <td><button class="btn btn-sm add_row<?= $name;?>" data-tableid="<?= $name;?>" >+</button></td>
            </tr>
            <?php
        }
        ?>
        
    </table>
</div>
<script>
var indexval = <?= $data!=false ?  count($data):0; ?>;
 $('.add_row<?= $name;?>').click(function (e) { 
     indexval++;
     var tblid=$(this).attr('data-tableid');
     $('#table'+tblid+' tr:last').after('<tr><td><input type="text" class="form-control" Placeholder="<?= $key_;?>" name="'+tblid+'['+indexval+'][key]"></td><td><input type="text" class="form-control" Placeholder="Value" name="'+tblid+'['+indexval+'][value]" ></td><td></td></tr>');
     return false;
 });
</script>
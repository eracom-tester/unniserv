    
    <tr>
        <td>
        <div class="form-group">
              <label for="">Enter Variant </label>
                <input name="<?= $name;?>[<?= $index;?>][slug]" id="vr_name_id_<?= $index;?>" placeholder="Variant" class="form-control variant_name" type="text" value="">
        </div>
        </td>
        <td>
            <div class="form-group">
              <label for="">Select Display Type</label>
              <select class="form-control variant_type" name="<?= $name;?>[<?= $index;?>][type]" id="vr_type_id_<?= $index;?>" >
                <?php
                $var_arr=$this->conn->runQuery('*','layouts',"type='variant'");
                $slct='';
                if($var_arr){
                    foreach($var_arr as $variant){
                        echo $vas = '<option value="'.$variant->slug.'">'.$variant->value.'</option> ';
                        $slct .= $vas ;
                        
                    }
                }
                ?>
            </select> 
              
            </div>
                                          
        </td>
        <td>
            <div class="form-group">
                <input name="<?= $name;?>[<?= $index;?>][value]" id="vr_value_id_<?= $index;?>"  class="form-control variant_values" type="text" value="" placeholder="Example : S,M,L,XL">
                <small   class="text-muted">Use commas as separator</small>
            </div>
        </td>
        <td>
                <?php
                if($index==0){
                    ?>
                        <button class="btn btn-sm add_row<?= $name;?>" data-variant_types="" data-tableid="<?= $name;?>" >+</button>
                    <?php
                }
                ?>
            

        </td>
    </tr>
            <script>
                $('#vr_name_id_<?= $index;?>,#vr_type_id_<?= $index;?>,#vr_value_id_<?= $index;?>').change(function (e) { 
                    e.preventDefault();
                    variants();
                    
                });
            </script>

     
<?php
$name='variant';

 

/* echo '<pre>';
print_r($asd); */

?>
<div class="table-responsive">
    <table class="table" id="table<?= $name;?>">

    <?php
        $sdta['name']=$name;
        $sdta['index']=0;
         
        $this->load->view('Admin_panel/pages/product/product_add_variant_row',$sdta);
    ?>       
        
    </table>
</div>
<div id="vr_respon"></div>
<script>
var indexval = 0;
 $('.add_row<?= $name;?>').click(function (e) { 
     indexval++;
     var tblid=$(this).attr('data-tableid');
      
    $.ajax({
        type: "post",
        url: "<?= base_url('admin/product/variant_row');?>",
        data: {index:indexval,name:tblid},
         
        success: function (response) {
            $('#table'+tblid+' tr:last').after(response);
        }
    });

     //$('#table'+tblid+' tr:last').after('<tr><td><input name="<?= $name;?>['+indexval+'][slug]" id="vr_name_id_'+indexval+'" placeholder="Variant" class="form-control variant_name" type="text" value=""></td><td><select class="form-control" name="<?= $name;?>['+indexval+'][type]" id=""><?= $slct;?></select></td><td><input name="<?= $name;?>['+indexval+'][value]" id=""  class="form-control" type="text" value=""></td><td></td></tr>');
     //$( '#vr_name_id_'+indexval ).attr( 'class',"form-control variant_name" );

     return false;
 });

function variants(){
    var slug = {};
    var vr_type = {};
    var vr_values = {};
    var slug_id= 0;
    var type_id= 0;
    var value_id= 0;
    $( ".variant_name" ).each(function() {
        slug[slug_id]=$( this ).val();        
        slug_id++;
    });    
    
    $( ".variant_type" ).each(function() {
        vr_type[type_id]=$(this).children("option:selected").val();      
        type_id++;
    });

    $( ".variant_values" ).each(function() {
        vr_values[value_id]=$( this ).val();        
        value_id++;
    });
    

    $.ajax({
        type: "post",
        url: "<?= base_url('admin/product/skus');?>",
        data: {slug:slug,type:vr_type,values:vr_values},         
        success: function (response) {
            $('#qty_sec').html(response);
            //alert(response);
        }
    });
}


</script>
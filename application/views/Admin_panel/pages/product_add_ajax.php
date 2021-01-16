        
        <ul class="nav nav-tabs nav-tabs-primary">
            <?php
            
             
            if($all_tabs){
                $c=0;
                foreach($all_tabs as $tab){
                    $c++;
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($c=='1' ? 'active show':'');?>" data-toggle="tab" href="#<?= $tab->slug;?>">   <span class=""><?= $tab->name;?></span></a>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
            <?php
                if($all_tabs){
                    $c=0;
                    foreach($all_tabs as $tab){
                        $c++;
                        
                        $tb_slug = $tab->slug;
                         
                        ?>
                        <div id="<?= $tab->slug;?>" class="container <?= ($c=='1' ? 'active show':'');?> tab-pane">
                            <div class="row">
                                <?php
                                    $fields=$this->conn->runQuery('*','product_add_fields',"cat_slug IN ('for_all_products') and tab_slug='$tb_slug' order by field_index asc");
                                    if($fields){
                                        foreach($fields as $field){
                                            $fl_type=$field->type;
                                            $fl_slug=$field->slug;
                                            $field_attr_arr=$this->conn->runQuery('*','product_add_fields_attr',"field_slug='$fl_slug'");
                                            $fl_attr='';
                                            if($field_attr_arr){
                                                foreach($field_attr_arr as $field_attr){
                                                    $fl_attr .= $field_attr->field_attr.'="'.$field_attr->value.'"';
                                                }
                                            }
                                            $field_attr_class=$this->conn->runQuery('*','product_add_fields_classes',"field_slug='$fl_slug'");
                                            $fl_class='';
                                            if($field_attr_class){
                                                foreach($field_attr_class as $field_attr){
                                                    $fl_class .=  " $field_attr->value";
                                                }
                                            }
                                            
                                            if($field->has_options==1){
                                                $options_check=$this->conn->runQuery('*','product_add_options',"tab_slug='$tb_slug' and field_slug='$fl_slug' order by option_index asc");

                                            }
                                            

                                            ?>
                                            <div class="col-md-6">
                                                <div class="form-group" >
                                                    <?php
                                                    if($fl_type=='text'){
                                                        ?>
                                                        <label><?= $field->admin_display;?></label>
                                                            <input <?= $fl_attr;?> name="<?= $field->slug;?>" class="form-control <?= $fl_class;?>" Placeholder="<?= $field->admin_display;?>" />
                                                        <?php
                                                    }
                                                    
                                                    if($fl_type=='textarea'){
                                                        ?>
                                                        <label><?= $field->admin_display;?></label>
                                                            <textarea <?= $fl_attr;?> name="<?= $field->slug;?>" class="form-control <?= $fl_class;?>" title="<?= $field->admin_display;?>"></textarea>
                                                        <?php
                                                    }
                                                    
                                                    if($fl_type=='file'){
                                                        ?>
                                                        <label><?= $field->admin_display;?></label>
                                                            <input <?= $fl_attr;?> name="<?= $field->slug;?>" type="file" class="form-control <?= $fl_class;?>" Placeholder="<?= $field->admin_display;?>" />
                                                        <?php
                                                    }
                                                    if($fl_type=='multi_file'){
                                                        ?>
                                                        <label><?= $field->admin_display;?></label>
                                                            <input <?= $fl_attr;?> name="<?= $field->slug;?>[]" type="file" class="form-control <?= $fl_class;?>" Placeholder="<?= $field->admin_display;?>" multiple />
                                                        <?php
                                                    }

                                                    if($fl_type=='title' && $field->has_options==1){
                                                        
                                                        
                                                        ?>
                                                        <label><?= $field->admin_display;?></label>
                                                        <?php
                                                        if($options_check){
                                                            foreach($options_check as $options_val){
                                                                if($options_val->type=='checkbox'){
                                                                    $ftr_key=$options_val->slug;
                                                                    $feature_requirementsvalue=$options_val->admin_name;
                                                                    ?>
                                                                        <label class="">
                                                                            <input type="checkbox" name="<?= $field->slug;?>[<?= $ftr_key;?>]" id="" value="<?= $feature_requirementsvalue;?>" autocomplete="off" checked />
                                                                        <?= $feature_requirementsvalue;?>
                                                                        </label>
                                                                        <?php
                                                                }
                                                            }
                                                        }
                                                    }



                                                    ?>
                                                    
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    
                                   
                                    if($tb_slug=='variants'){
                                        $sdta['name']='variants';
                                        $sdta['placeholder']='Enter Title';
                                        $this->load->view('Admin_panel/pages/product/product_add_variants',$sdta);
                                    }
                                    
                                    if($tb_slug=='qtys'){
                                        echo '<div id="qty_sec" class="table-responsive">';
                                        $sdta['name']='qty';                                         
                                        $this->load->view('Admin_panel/pages/product/product_add_qty',$sdta);
                                        echo '</div>';
                                    }
                                    
                                    
                                ?>
                                
                                
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>
       
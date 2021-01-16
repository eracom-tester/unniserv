<?php
class Team_model extends CI_Model{
   
    public function directs($userid){        
        $resp=$this->conn->runQuery("id",'users',"u_sponsor='$userid'");
        return ($resp ? array_column($resp,'id'):array());
    }    
    
    public function my_actives($userid){        
        $resp=$this->conn->runQuery("id",'users',"u_sponsor='$userid' and active_status=1");
        return ($resp ? array_column($resp,'id'):array());
    }
    
    public function actives(){
        $resp=$this->conn->runQuery("id",'users',"active_status=1");
        return ($resp ? array_column($resp,'id'):array());
    }

    public function my_generation($userid){
        $arrin=array($userid);
        $ret=array();

        $i=1;
        while(!empty($arrin)){
            $this->db->select('id');
            $this->db->where_in('u_sponsor',$arrin);
            $alldown=$this->db->get('users');
            if($alldown->num_rows()>0){
                $resp = $alldown->result();
                $arrin = array_column($resp,'id');
                $ret[$i]=$arrin;
                $i++;
            }else{
                $arrin = array();
            } 
        }
        
        $final = array();         
        if(!empty($ret)){
            array_walk_recursive($ret, function($item, $key) use (&$final){
                $final[] = $item;
            });
        }
        
        return $final;
        
    }

    public function my_level_team($userid,$level=15){
        $arrin=array($userid);
        $ret=array();

        $i=1;
        while(!empty($arrin)){
            $this->db->select('id');
            $this->db->where_in('u_sponsor',$arrin);
            $alldown=$this->db->get('users');
            if($alldown->num_rows()>0){
                $resp = $alldown->result();
                $arrin = array_column($resp,'id');
                $ret[$i]=$arrin;
                $i++;
                if($i>$level){
                    break;
                }
            }else{
                $arrin = array();
            } 
        }   
       
        
        return $ret;
        
    }

    public function my_binary($userid){
        $arrin=array($userid);
        $ret=array();
        
        while(!empty($arrin)){
            $this->db->select('id');
            $this->db->where_in('Parentid',$arrin);
            $alldown=$this->db->get('users');
            if($alldown->num_rows()>0){
                $resp = $alldown->result();
                $arrin = array_column($resp,'id');
                $ret[]=$arrin;               
            }else{
                $arrin = array();
            } 
        }
        
        $final = array();         
        if(!empty($ret)){
            array_walk_recursive($ret, function($item, $key) use (&$final){
                $final[] = $item;
            });
        }

        return $final;
        
    }

    public function team_by_position($userid,$position){
        $ret=array();
        $get_position_user=$this->conn->runQuery("id",'users',"Parentid='$userid' and position='$position'");
        if($get_position_user){
            $ret=$this->my_binary($get_position_user[0]->id);
            $ret[]=$get_position_user[0]->id;
        }
        return $ret;
    }

    public function my_single_leg($userid){
        $ret=array();
        $all_ids=$this->conn->runQuery("id",'users'," id > '$userid' ");
        if($all_ids){
            $ret=array_column($all_ids,'id');
        }
        return $ret;
    }

    public function my_active_single_leg($userid){
        $ret=array();
        $check_active=$this->conn->runQuery("id,active_id",'users',"id='$userid' and active_status='1'");
        if($check_active){
            $active_id=$check_active[0]->active_id;
            $all_ids=$this->conn->runQuery("id",'users'," active_status='1' and active_id > '$active_id' ");
            if($all_ids){
                $ret=array_column($all_ids,'id');
            }
        }
        return $ret;
    }


   public function tree($counter_matrix_level,$parent){
        
        $treedata=false;
         
            if($parent!=''){
                $treedata=$this->conn->runQuery("*",'users',"Parentid='$parent' order by position asc");                                                    
            }

            $counter_matrix_level++;

            $matrix_node=$this->conn->setting('tree_node');
            $show_tree_level=$this->conn->setting('show_tree_level');
            $wdth=100/$matrix_node;
    ?>
        <div class="flex">
            <div class="flex-item" style="--item-width:100%">
                <img  style="width:50%;min-width:50px;"  src="<?= base_url();?>images/arrow.png">
                <div class="flex">
                    <?php
                    for($n=0;$n<$matrix_node;$n++){
                        $pos=$n+1;
                        ?>
                            <div class="flex-item" style="--item-width:<?= $wdth;?>%">
                                <?php
                                $check_position=false;
                                 if($parent!=''){
                                    $check_position=$this->conn->runQuery("*",'users',"Parentid='$parent' and position='$pos'");
                                    
                                 }
                                 if($check_position){
                                    $nxt_parent=$check_position[0]->id;
                                    $u_code=$check_position[0]->id;
                                    $_user_profile=$this->profile->profile_info($u_code,'username,name,email,added_on,tail_status,u_sponsor');
                                    $sponsor_details=$this->profile->profile_info($_user_profile->u_sponsor);
                                        ?>
                                            <span data-toggle="popover1" data-trigger="hover" data-html="true" data-content="Name :<?= $_user_profile->name;?><br>Sponser Id: <?= $sponsor_details ? $sponsor_details->name:'';?> (<?= $sponsor_details ? $sponsor_details->username:'';?>)<br> Email: <?= $_user_profile->email;?><br>Join Date : <?= $_user_profile->added_on;?>" >
                                            <?php
                                            if($_user_profile->tail_status=='1'){
                                                ?>
                                                <img class="user" src="<?= base_url('images/users/tail.png');?>"> 
                                                <?php
                                            }else{
                                                ?>
                                                <img class="user" src="<?= base_url('images/users/tree_user.png');?>">
                                                <?php
                                            }
                                            ?>
                                             
                                        </span>
                                        <br>
                                        <?php
                                        echo '<p><a href="?node='.$nxt_parent.'">';
                                        echo $_user_profile->username;
                                        echo "<br>".$_user_profile->name;
                                        echo '</a></p>';
                              
                                 }else{
                                     ?>
                                        <span >
                                        <img class="user" src="<?= base_url('images/users/tree_user.png');?>"> 
                                        </span>
                                        <br>
                                    <?php
                                    echo "Null";
                                    echo "<br>";
                                $nxt_parent='';
                                 }
                                 
                                 
                               
                                
                                if($counter_matrix_level<=$show_tree_level){
                                    $this->tree($counter_matrix_level,$nxt_parent);         
                                }
                                ?>
                            </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php
    }

    public function matrix($counter_matrix_level,$parent){
        
        $treedata=false;
         
            if($parent!=''){
                $treedata=$this->conn->runQuery("*",'users',"matrix_pool='$parent' order by matrix_position asc");                                                    
            }

            $counter_matrix_level++;

            $matrix_node=$this->conn->setting('matrix_node');
            $show_tree_level=$this->conn->setting('show_matrix_level');
            $wdth=100/$matrix_node;
    ?>
        <div class="flex">
            <div class="flex-item" style="--item-width:100%">
                <img  style="width:50%;min-width:50px;"  src="<?= base_url();?>images/arrow.png">
                <div class="flex">
                    <?php
                    for($n=0;$n<$matrix_node;$n++){
                        ?>
                            <div class="flex-item" style="--item-width:<?= $wdth;?>%">
                                <?php
                                if($treedata && count($treedata)>$n){
                                    $nxt_parent=$treedata[$n]->id;
                                    $u_code=$treedata[$n]->id;
                                    $_user_profile=$this->profile->profile_info($u_code);
                                    $sponsor_details=$this->profile->profile_info($_user_profile->u_sponsor);
                                        ?>
                                            <span data-toggle="popover1" data-trigger="hover" data-html="true" data-content="Name :<?= $_user_profile->name;?><br>Sponser Id: <?= ($sponsor_details ? $sponsor_details->name:'null');?> (<?= ($sponsor_details ? $sponsor_details->username:'null');?>)<br> Email: <?= $_user_profile->email;?><br>Join Date : <?= $_user_profile->added_on;?>" >
                                            <img class="user" src="<?= base_url('images/users/tree_user.png');?>">  
                                        </span>
                                        <br>
                                        <?php
                                        echo '<a href="?node='.$nxt_parent.'">';
                                        echo $_user_profile->username;
                                        echo '</a>';
                                    
                                }else{
                                    ?>
                                        <span >
                                        <img class="user" src="<?= base_url('images/users/tree_user.png');?>"> 
                                        </span>
                                        <br>
                                    <?php
                                    echo "Null";
                                $nxt_parent='';
                                }
                                
                                if($counter_matrix_level<=$show_tree_level){
                                    $this->matrix($counter_matrix_level,$nxt_parent);         
                                }
                                ?>
                            </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php
    }

}


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
    //new//
    public function my_actives_left_right($userid,$position){        
        $resp=$this->conn->runQuery("id",'users',"u_sponsor='$userid' and active_status=1 and position='$position'");
       
        return ($resp ? array_column($resp,'id'):array());
    }
     //new//
     public function my_inactives_left_right($userid,$position){        
        $resp=$this->conn->runQuery("id",'users',"u_sponsor='$userid' and active_status=0 and position='$position'");
        
        
        return ($resp ? array_column($resp,'id'):array());
    }
    
     //new//
    public function my_inactives($userid){        
        $resp=$this->conn->runQuery("id",'users',"u_sponsor='$userid' and active_status=0");
        return ($resp ? array_column($resp,'id'):array());
    }
    
    public function my_actives_position($userid,$position){        
        $resp=$this->conn->runQuery("id",'users',"u_sponsor='$userid' and position='$position' and active_status=1");
        return ($resp ? array_column($resp,'id'):array());
    }
    public function actives(){
        $resp=$this->conn->runQuery("id",'users',"active_status=1");
        return ($resp ? array_column($resp,'id'):array());
    }
     //new/
     public function actives_left_right($position){
        $resp=$this->conn->runQuery("id",'users',"active_status=1 and position='$position'");
        return ($resp ? array_column($resp,'id'):array());
    }
    
    
    
    public function inactives(){
        $resp=$this->conn->runQuery("id",'users',"active_status=0");
        return ($resp ? array_column($resp,'id'):array());
    }
     //new/
      public function inactives_left_right($position){
        $resp=$this->conn->runQuery("id",'users',"active_status=0 and position='$position'");
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
    
     public function my_generation_with_personal($userid,$level=50){
        $arrin=array($userid);
        $ret=array($userid);
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
    
    public function my_binary_active($userid){
        $arrin=array($userid);
        $ret=array();
        
        while(!empty($arrin)){
            $this->db->select('id');
            $this->db->where_in('Parentid',$arrin);
            $this->db->where('active_status',1);
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
    
     public function team_by_business($userid,$position){
       $my_teams=$this->team_by_position($userid,$position);     
      
        if(!empty($my_teams)){
     	            //echo "enetr"; 
                    $implode=implode(',',$my_teams);
                    $personal_bv_qr=$this->conn->runQuery('SUM(pv) as amt','orders',"u_code IN ($implode)  and status='1' and tx_type='purchase'");
                   //echo $this->db->last_query();
                    return $ret = ($personal_bv_qr[0]->amt!='' ? $personal_bv_qr[0]->amt:0);                    
                
        }
       
    }
    
    public function team_by_position_active($userid,$position){
        $ret=array();
        $get_position_user=$this->conn->runQuery("id",'users',"Parentid='$userid' and position='$position' and active_status='1'");
        if($get_position_user){
            $ret=$this->my_binary_active($get_position_user[0]->id);
            $ret[]=$get_position_user[0]->id;
        }
        return $ret;
    }
    
    public function ben_pairs($u_code,$ban='matching_pairs'){
        $ret=0;
        $get_mtch=$this->conn->runQuery("SUM($ban) as amnt",'transaction',"u_code='$u_code' and source='binary'");
        if($get_mtch && $get_mtch[0]->amnt!=''){
            $ret=$get_mtch[0]->amnt;
        }
        return $ret;
    }
     
    public function downline_rank_team($userid,$rank_per){
        $rank_ids=array();
        $arr=array($userid);
        
        for($i=0;$i<count($arr);$i++){
            $u_code=$arr[$i];
            $directs=$this->directs($u_code);
            if(!empty($directs)){
                foreach($directs as $direct){
                    $check_rank=$this->profile->my_rank_per($direct);
                    if($check_rank>=$rank_per){
                        $rank_ids[]=$direct;
                    }else{
                        $arr[]=$direct;
                    }
                }
            }
        }
        
        return $rank_ids;
        
    }





public function my_matrix_team($userid){
         $arrin=array($userid);
         $ret=array();

        $i=1;
        while(!empty($arrin)){
             $this->db->select('id');
             $this->db->where_in('parent_id',$arrin);
             $alldowns=$this->db->get('pool');
         
          if($alldowns->num_rows()>0){
                $resp = $alldowns->result();
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
                                    $_user_profile=$this->profile->profile_info($u_code,'username,name,email,added_on,u_sponsor,active_status,active_date');
                                    $sponsor_details=$this->profile->profile_info($_user_profile->u_sponsor);
                                     $total_active=$this->team->actives();
                                          $left_teams=$this->team->team_by_position($u_code,1);
                                          $active_left_team= array_intersect($total_active, $left_teams);
                                          $left_team=count($left_teams);
                                          
                                          $right_teams=$this->team->team_by_position($u_code,2);
                                          $active_right_team= array_intersect($total_active, $right_teams);
                                          $right_team=count($right_teams);
                                          
                                           $active_left=$this->team->actives_left_right(1);
                                           $active_lefts=count($active_left);
                                           
                                         
                                          $red_units=$this->team->inactives();
                                          $inactive_right_team= array_intersect($red_units, $right_teams);
                                          $inactive_left_team= array_intersect($red_units, $left_teams);
                                         
                                        $total_direct_greens=$this->team->my_actives($u_code);
                                        $total_direct_green=count($total_direct_greens);
                                        
                                        $total_direct_reds=$this->team->my_inactives($u_code);
                                        $total_direct_red=count($total_direct_reds);
                                        
                                        $total_green_unit_left=$this->team->my_actives_left_right($u_code,1);
                                        $total_green_unit_lefts=count($total_green_unit_left);
                                        
                                        $total_green_unit_right=$this->team->my_actives_left_right($u_code,2);
                                        $total_green_unit_rights=count($total_green_unit_right);
                                        
                                        $total_direct_red_left=$this->team->my_inactives_left_right($u_code,1);
                                        $total_direct_red_lefts=count($total_direct_red_left);
                                        
                                        $total_direct_red_right=$this->team->my_inactives_left_right($u_code,2);
                                        $total_direct_red_rights=count($total_direct_red_right);
                                        
                                        $package=$this->business->package($u_code);
                                    
                                        ?>
                                           <span data-toggle="popover1" data-trigger="hover" data-html="true" data-content="Name :<?= $_user_profile->name;?><br>Sponser Id: <?= $sponsor_details ? $sponsor_details->name:'';?> (<?= $sponsor_details ? $sponsor_details->username:'';?>) <br> Total Member:&nbsp; L:<?= $left_team!='' ? $left_team:'0';?>&nbsp;R:<?= $right_team!='' ? $right_team:'0';?><br>Kit :&nbsp;&nbsp; <?= $package;?><br> Total Green Unit :&nbsp;&nbsp;L<?= COUNT($active_left_team)!='' ? count($active_left_team):'0';?>&nbsp;R:<?= COUNT($active_right_team)!='' ? COUNT($active_right_team):'0';?> <br> Total Red Unit :&nbsp;&nbsp;L:<?= COUNT($inactive_left_team)!='' ? COUNT($inactive_left_team):'0';?>&nbsp;R:<?= COUNT($inactive_left_team)!='' ? COUNT($inactive_right_team):'0';?><br> Total Direct Green :&nbsp;&nbsp;L:<?= $total_green_unit_lefts!='' ? $total_green_unit_lefts:'0';?>&nbsp;R:<?= $total_green_unit_rights!='' ? $total_green_unit_rights:'0';?><br> Total Direct Red :&nbsp;&nbsp;L:<?= $total_direct_red_lefts!='' ? $total_direct_red_lefts:'0';?>&nbsp;R:<?= $total_direct_red_rights!='' ? $total_direct_red_rights:'0';?><br> Time :<?= $_user_profile->active_date ? $_user_profile->active_date:'';?>" >
                                            <img class="user" src="<?= base_url('images/users/tree_user.png');?>">
                                        </span>
                                        <br>
                                        <?php
                                        echo '<p><a href="?node='.$nxt_parent.'">';
                                       echo $_user_profile->active_status=='1' ? '<i class="fa fa-circle" style="color:green;"></i>':'<i class="fa fa-circle" style="color:red;"></i>'; echo $_user_profile->username;
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
                <img  style="width:75%;min-width:50px;"  src="<?= base_url();?>images/arrow.png">
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
                                        echo $_user_profile->name;
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


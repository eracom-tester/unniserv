

<style>
            @media only screen and (max-width: 600px) {
                .flex > .flex-item{
                         width : var(--item-width);
                         font-size:8px;
                     } 
                     .flex-item > span > .user {
                            width:25px;        
                        }
            }
            @media only screen and (min-width: 601px) {
                .flex >  .flex-item{
                         width : var(--item-width);
                         font-size:16px;
                     } 
                .flex-item > span > .user {
                    width:50px;        
                }  
            }

            .flex{
                    display: flex;
                    flex-wrap: nowrap;                
                                 
                }
             
       </style>
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		    <h4 class="page-title"> Tree</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="">Team</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> Tree</li>
         </ol>
	   </div>
	   
</div>


<?php 
$userid = $this->session->userdata('user_id');


                        $success['param']='success';
                        $success['alert_class']='alert-success';
                        $success['type']='success';
                        $this->show->show_alert($success);
                        ?>
                   <?php 
                        $erroralert['param']='error';
                        $erroralert['alert_class']='alert-danger';
                        $erroralert['type']='error';
                        $this->show->show_alert($erroralert);
                    ?>
    <center>    
            <div class="form-inline1 col-xl-7">  
                  <!--navbar-light bg-light-->
                <nav class="navbar navbar-expand-lg navbar-light bg-white">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav mr-auto">

                <form action="<?= $panel_path.'team/team-tree';?>" class="form-inline my-2 my-lg-0" method="post">
                    <input type="text" Placeholder="Enter Username" name="username" class="form-control mr-sm-2" value='<?= isset($_POST['username']) && $_POST['username']!='' ? $_POST['username']:'';?>' required/>                      
                       <select class="form-control mr-sm-2" name="selected_postion" id="" required>
                         <option value=''>Select</option>
                         <option value=''>Whole Team</option>
                         <option value='right'>Right Team</option>
                         <option value='left'>Left Team</option>
                        
                       </select>
    
                    <input type="submit" name="search" class="btn btn-secondary my-2 my-sm-0" value="Filter" />&nbsp;
                    <a href="<?= $panel_path.'team/team-tree';?>" class="btn btn-secondary my-2 my-sm-0">Reset</a>
                    </div>
                </form>
                </ul>
                </nav>
            </div>
        </center>
             <br>       
 
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="color :black;">
     
    <center>
    <?php
                    if($node_id){
                        $_user_profile = $this->profile->profile_info($node_id);
                        
                        $sponsor_details = $this->profile->profile_info($_user_profile->u_sponsor);
                    }
                  $total_active=$this->team->actives();
                  $left_teams=$this->team->team_by_position($node_id,1);
                  $active_left_team= array_intersect($total_active, $left_teams);
                  $left_team=count($left_teams);
                  
                    $right_teams=$this->team->team_by_position($node_id,2);
                    $active_right_team= array_intersect($total_active, $right_teams);
                    $right_team=count($right_teams);
                  
                    $active_left=$this->team->actives_left_right(1);
                    $active_lefts=count($active_left);
                   
                 
                    $red_units=$this->team->inactives();
                    $inactive_right_team= array_intersect($red_units, $right_teams);
                    $inactive_left_team= array_intersect($red_units, $left_teams);
                 
                    $total_direct_greens=$this->team->my_actives($node_id);
                    $total_direct_green=count($total_direct_greens);
                
                    $total_direct_reds=$this->team->my_inactives($node_id);
                    $total_direct_red=count($total_direct_reds);
                    
                    $total_green_unit_left=$this->team->my_actives_left_right($node_id,1);
                    $total_green_unit_lefts=count($total_green_unit_left);
                    
                    $total_green_unit_right=$this->team->my_actives_left_right($node_id,2);
                    $total_green_unit_rights=count($total_green_unit_right);
                    
                    $total_direct_red_left=$this->team->my_inactives_left_right($node_id,1);
                    $total_direct_red_lefts=count($total_direct_red_left);
                    
                    $total_direct_red_right=$this->team->my_inactives_left_right($node_id,2);
                    $total_direct_red_rights=count($total_direct_red_right);
                    
                    $package=$this->business->package($node_id);
                   
                     
                    ?>
                    <div class="flex">
                        <div class="flex-item" style="--item-width:100%">
  
                <span <?php if($node_id){ ?> data-toggle="popover1" data-trigger="hover" data-html="true" 
                data-content="Name :<?= $_user_profile ? $_user_profile->name:'';?><br><br>Sponsor Id:
                <?= $sponsor_details ? $sponsor_details->username:'';?><br> Total Member:&nbsp; L:<?= $left_team!='' ? $left_team:'0';?>&nbsp;R:<?= $right_team!='' ? $right_team:'0';?>
                <br>Kit :&nbsp;&nbsp; <?= $package;?><br> Total Green Unit :&nbsp;&nbsp;L<?= COUNT($active_left_team)!='' ? count($active_left_team):'0';?>&nbsp;R:<?= COUNT($active_right_team)!='' ? COUNT($active_right_team):'0';?> <br> Total Red Unit :&nbsp;&nbsp;L:<?= COUNT($inactive_left_team)!='' ? COUNT($inactive_left_team):'0';?>&nbsp;R:<?= COUNT($inactive_left_team)!='' ? COUNT($inactive_right_team):'0';?>
                <br> Total Direct Green :&nbsp;&nbsp;L:<?= $total_green_unit_lefts!='' ? $total_green_unit_lefts:'0';?>&nbsp;R:<?= $total_green_unit_rights!='' ? $total_green_unit_rights:'0';?><br> Total Direct Red :&nbsp;&nbsp;L:<?= $total_direct_red_lefts!='' ? $total_direct_red_lefts:'0';?>&nbsp;R:<?= $total_direct_red_rights!='' ? $total_direct_red_rights:'0';?><br> Time :<?= $_user_profile->active_date ? $_user_profile->active_date:'';?>" <?php } ?> >
                                <img class="user" src="<?= base_url('images/users/tree_user.png');?>">  
                         
                            </span>
                           </br>
                            <?= $_user_profile->username;?>
                            </br>
                            <span >
                            <?= ($_user_profile->active_status=='1' ? 'Active':'Inactive');?>
                            </span>
                        </div>
                    </div>
        
       
            <?php
                $this->team->tree(1,$node_id);
            ?>
    </center>
    </div>
</div>


<p>&nbsp;</p>

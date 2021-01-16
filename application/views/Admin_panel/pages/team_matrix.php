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
		    <h4 class="page-title"> Matrix</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="">Team</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> Matrix</li>
         </ol>
	   </div>
	    
</div>
 
 <br>
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
<div class="row">
      <form action="<?= $admin_path.'team/team-matrix';?>" method="post">
                         <div class="form-inline1">
                               
                                <input type="text" Placeholder="Enter Username" name="username" class="" value='<?= isset($_POST['username']) && $_POST['username']!='' ? $_POST['username']:'';?>' required/>                      
                                
                                <select class="" name="selected_postion" id="" required>
                                 <option value=''>Select</option>
                                 <option value='whole'>Whole Team</option>
                              </select>
                             <input type="submit" name="search" class="" value="filter" />
            				 <a href="<?= $admin_path.'team/team-matrix';?>" class="btn btn-sm">Reset</a>
                        </div>
                    </form>
 
        <br>
        
        
        
        
        
        
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="color :black;">
     
    <center>
    <?php
                    if($node_id){
                        $_user_profile = $this->profile->profile_info($node_id);
                        $sponsor_details = $this->profile->profile_info($_user_profile->u_sponsor);
                    }
                
                    ?>
                    <div class="flex">
                        <div class="flex-item" style="--item-width:100%">

                <span <?php if($node_id){ ?> data-toggle="popover1" data-trigger="hover" data-html="true" data-content="Name :<?= $_user_profile->name;?><br>Sponser Id: <?= ($sponsor_details ? $sponsor_details->name:'null');?> (<?= ($sponsor_details ? $sponsor_details->username:'null');?>)<br> Email: <?= $_user_profile->email;?><br>Join Date : <?= $_user_profile->added_on;?>" <?php } ?> >
                                <img class="user" src="<?= base_url('images/users/tree_user.png');?>">  
                            </span>


                            
                            </br>
                            <?= $_user_profile->name;?>
                            </br>
                            <span >
                            <?= ($_user_profile->matrix_pool!='' ? 'Active':'Inactive');?>
                            </span>
                        </div>
                    </div>
        
       
            <?php
                $this->team->matrix(1,$node_id);
            ?>
    </center>
    </div>
</div>

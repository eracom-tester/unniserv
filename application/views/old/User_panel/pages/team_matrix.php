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
       <div class="content-wrapper">
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
 
 
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
     
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
                            <?= $_user_profile->username;?>
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
</div>

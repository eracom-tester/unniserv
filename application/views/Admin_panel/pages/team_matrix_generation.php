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
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#"> Matrix</a></li>
         </ol>
	   </div>
	   
</div>
<?php
if($this->session->has_userdata($search_parameter)){
	$get_data=$this->session->userdata($search_parameter);
	$likecondition = (array_key_exists($search_string,$get_data) ? $get_data[$search_string]:array());
	 
}else{
	$likecondition=array();
}  


?>
<div class="nk-content nk-content-fluid">
	<div class="container-xl wide-lg">
		<div class="nk-content-body">
			<div class="components-preview wide-md mx-auto">
			  
			 
                 
                                <div class="nk-block nk-block-lg">
                                    <center>
    <?php
            if($node_id){
                $u_id=$this->team->pool_node($node_id);
                $_user_profile = $this->profile->profile_info($u_id);
                $sponsor_details = $this->profile->profile_info($_user_profile->u_sponsor);
            }
    ?>
           <div class="flex">
                <div class="flex-item" style="--item-width:100%">
                    <span <?php if($node_id){ ?> data-toggle="popover1" data-trigger="hover" data-html="true" data-content="Full NAME :<?= $_user_profile->name;?><br>SPONCER NAME: <?= ($sponsor_details ? $sponsor_details->name:'null');?>  <br>JOINING DATE : <?= $_user_profile->added_on;?><br>ACTIVATION DATE: <?= $_user_profile->updated_on;?>" <?php } ?> >
                        <img class="user" src="<?= base_url('images/users/tree_user.png');?>">  
                    </span>
                    
                    </br>
                    <?= $_user_profile->name;?>
                    </br>
                    <p >
                     <?= $this->team->pool_status($u_id);?>
                    </p>
                </div>
            </div>
            <?php
               
                $this->team->matrix_pool(1,$node_id);
            ?>
       
           
    </center>
                                   
                                </div><!-- .nk-block -->
								
                            </div><!-- .components-preview -->
                        </div>
                    </div>
                </div>
			
  
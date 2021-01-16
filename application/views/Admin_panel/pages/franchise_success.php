<?php
$id=$this->session->userdata('admin_login');

?>
<div class="container">
  <ul class="breadcrumb">
        <li><a href=""><i class="fa fa-home"></i></a></li>
        <li><a href="">Add Franchise  User!</a></li>
      </ul>
  <div class="row">
            
    <div id="content" class="bg-page-404 col-sm-12 ">
        
      <div class="col-sm-12 text-center">
           
                <div style="margin: 30px 0 50px"><img src="image/catalog/404/404-img-text.png" alt=""></div>
                 <span style='font-size:50px;'>&#9989;</span>
                <h1 style="backgound:color-green;">Thank you!</h1>
                <p  style="color:green;">Franchise User Add Successfully!</p>
                 <div class="table-responsive">		
		        <table class="table table-bordered">                   
 
	                    <tbody>
                          <?php
                           
                             /* $this->db->select('*');
                             $this->db->order_by('id', 'desc');
                             $this->db->limit(1);
                             $query = $this->db->get('franchise_users');
                             $result= $query->result();  */                                                                
                           
                           ?>
                            
                                
                                
                           
                           <tr>
                                <td>Username</td>
                                <td><?php if(isset($_GET['username'])){
                                    echo $_GET['username'];
                                }?></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><?php if(isset($_GET['name'])){
                                    echo $_GET['name'];
                                }?></td>
                            </tr> 
                            <tr>
                                <td>Franchise Name</td>
                                <td><?php if(isset($_GET['franshise'])){
                                    echo $_GET['franshise'];
                                }?></td>
                            </tr> 
                            <tr>
                                <td>Password</td>
                                <td><?php if(isset($_GET['pass'])){
                                    echo $_GET['pass'];
                                }?></td>
                            </tr>
                                        
                       
                            
                        </tbody>
                </table>
           
        </div>
                <a href="<?= $admin_path.'franchise/add';?>" class="btn btn-primary" title="Continue">Continue</a>
            </div>
        
            <div class="col-sm-5">
                 <img src="image/catalog/404/404-image.png" alt="">
            </div>
        <!--?php echo $content_bottom; ?--> 
    </div>

    </div>
</div>

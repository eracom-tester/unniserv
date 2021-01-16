		 <div class="container">
         <ul class="breadcrumb">
        <li><a href=""><i class="fa fa-home"></i></a></li>
        <li><a href="">Order Success</a></li>
      </ul>
    <div class="row">
            
    <div id="content" class="bg-page-404 col-sm-12 ">
        
        <div class="col-sm-12 text-center">
           
                <div style="margin: 30px 0 50px"><img src="image/catalog/404/404-img-text.png" alt=""></div>
                 <span style='font-size:50px;'>&#9989;</span>
                <h1 style="backgound:color-green;">Thank you!</h1>
                <p  style="color:green;">Your Order is Submitted Successfully!</p>
                 <div class="table-responsive">
		
		       <table class="table table-bordered">
                    
 
	                    <tbody>
	                      <?php  
                   
                  
                      if(!empty($table_data)){             
                        foreach($table_data as $t_data){
                            $u_code=$t_data['u_code'];
                            $u_detail=$this->conn->runQuery('*','users',"id='$u_code'");
                            $u_details=$this->conn->runQuery('*','products',"status='1'");
                        }
                          ?>
                            <tr>
                                <td>Username </td>
                                <td><?php echo $u_detail[0]->username;?></td>
                            </tr>
                            <tr>
                                <td>Name </td>
                                <td><?php echo $u_detail[0]->name;?></td>
                            </tr>
                            <tr>
                                <td>Total MRP </td>
                                <td><?php echo $u_details[0]->mrp;?></td>
                            </tr>
                            <tr>
                                <td>Total Amount IN dP </td>
                                <td><?php echo $u_details[0]->dp;?></td>
                            </tr>
                            <tr>
                               <td>Total Business Volume </td>
                               <td><?php echo $t_data['total_bv'];?></td>
                           </tr>
                          <?php
                      }
                    ?>       
                       
                            
                        </tbody>
                </table>
           
        </div>
                <a href="<?= $franchise_path.'products/sale';?>" class="btn btn-primary" title="Continue">Continue</a>
                
            </div>
        
            <div class="col-sm-5">
                 <img src="image/catalog/404/404-image.png" alt="">
            </div>
        <!--?php echo $content_bottom; ?--> 
    </div>

    </div>
</div>

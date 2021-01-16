<?php
$franchise_id=$this->session->userdata('franchise_id');
?>
<div class="container">
  <ul class="breadcrumb">
        <li><a href=""><i class="fa fa-home"></i></a></li>
        <li><a href="">Order Success!</a></li>
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
                            $this->db->select('*');
                            $this->db->from('orders');
                            $this->db->where('tx_user_id',$franchise_id);
                            $this->db->order_by('id', 'desc');
                            $this->db->limit(1);
                            $query11=$this->db->get();
                            $find_id1=$query11->result();
                            $order_id=$find_id1[0]->u_code;
                              // print_R($order_id);          
                            $u_detail=$this->conn->runQuery('*','users',"id='$order_id'");
                            
                           ?>
                            
                                <p style="margin-top:30px background :color-red">Your Order Is:<?= $find_id1[0]->id;?></p>
                                
                           
                           <tr>
                                <td>Username</td>
                                <td><?= $u_detail[0]->username;?></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><?= $u_detail[0]->name;?></td>
                            </tr>
                            
                            <tr>
                                <td>Total Amount  </td>
                                <td><?= $find_id1[0]->order_amount;?></td>
                            </tr>
                            <tr>
                               <td>Total Business Volume </td>
                               <td><?= $find_id1[0]->order_bv;?></td>
                           </tr>                       
                       
                            
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

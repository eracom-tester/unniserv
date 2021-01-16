 <?php
        $f_code=$this->session->userdata('franchise_login');                         
                              
                           ?>
          <div class="row pt-2 pb-2">
            <div class="col-sm-9">
              <h4 class="page-title"> Cart</h4>
               
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Franchise</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Shopping Cart</li>
              </ol>
            </div>
          </div>
    <!-- End Breadcrumb-->

<!--End Row-->
              <?php 
                $success['param']='alert_success';
                $success['alert_class']='alert-success';
                $success['type']='success';
                $this->show->show_alert($success);
                  
                $erroralert['param']='alert_error';
                $erroralert['alert_class']='alert-danger';
                $erroralert['type']='error';
                $this->show->show_alert($erroralert);
              ?>
            <!--End Row-->
            <?php 
	if(!empty($this->cart->contents())){
   // print_r($this->cart->contents());
		?>
		
<div id="checkout-cart" class="">
  <h3>Shopping Cart
  </h3>
	  
        <div class="row">

        

                <div id="content" class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
     
<?php echo form_open($admin_path.'franchise/update_all'); ?>
        <div class="table-responsive">
		
		<table class="table table-bordered">

 <thead>
	  <tr>
		 
		<td class="text-left">Product Name</td>
		<td class="text-left">MRP</td>
		<td class="text-left">Quantity</td>
		<td class="text-right">Unit Price</td>
		<td class="text-right">Total</td>
		<td class="text-right">Business volume</td>
	  </tr>
</thead>
            <tbody>
<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): 
 $cartprodct_details=$this->product->product_detail($items['id']);
?>

        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

        <tr>
                <td>
                        <?php echo $items['name']; ?>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                        <?php endforeach; ?>
                                </p>

                        <?php endif; ?>

                </td>
				 <td style="text-align:right"><?php echo $pro_mrp[]=$cartprodct_details->mrp*$items['qty'];?></td>
				 <td class="text-left"><div class="input-group btn-block" style="max-width: 200px;">
                  <?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'id'=> $items['rowid'], 'maxlength' => '3', 'size' => '5' , 'class'=>"form-control")); ?>
                  <span class="input-group-btn">
                  <button type="button" data-toggle="tooltip" title="Update" class="btn btn-primary update_cart" data-rwId="<?php echo  $items['rowid'];?>"><i class="fa fa-refresh"></i></button>
                  <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger remove_from_cart" data-rwId="<?php echo  $items['rowid'];?>"><i class="fa fa-times-circle"></i></button>
                  </span></div></td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right"><?php echo $this->conn->company_info('currency').' '.$this->cart->format_number($items['subtotal']); ?></td>
                <td style="text-align:right"><?php echo $sub_bv[]=$this->cart->format_number($items['subbv']); ?></td>
        </tr>

<?php $i++; ?>
<?php endforeach; ?>
<tr>    
        <td class="right"><strong>MRP Total</strong></td>
        <td class="right"><strong><?php echo $this->conn->company_info('currency').' '.array_sum($pro_mrp); ?></strong></td>
        <!--<td colspan="3"> </td>-->
        <td class="right"></td>
        <td class="right"><strong> </strong></td>
        <td class="right"><?php echo $this->conn->company_info('currency').' '.$this->cart->format_number($this->cart->total()); ?></td>
        <td><strong><?= $this->cart->format_number($this->cart->totalbv());?></strong></td>
</tr>

            </tbody>
</table>
       
        </div>
     
	 
            
      
      <div class="buttons clearfix">
        <div class="pull-left"><a href="<?= $admin_path.'franchise/sale';?>" class="btn btn-default">Continue Shopping</a><a href="<?= $admin_path.'franchise/clear';?>" class="btn btn-danger">Clear all</a></div>
         
      </div>
	  <?php echo form_close(); ?>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
      <div class="card card-body">
          <h4>Franchise Details</h4>
      <form action="" method="post">
        <div class="form-group">
          <label for="">Username</label>
          <input type="text" name="tx_username" value="<?= set_value('tx_username');?>" data-response="username_res" class="form-control check_franchise_exist"  placeholder="Enter Username" aria-describedby="helpId"> 
          <span class=" " id="username_res"><?= form_error('tx_username');?></span>             
        </div>
         <div class="form-group">
          <label for="">Total Amount In MRP</label>
          <input type="text" name="mrp" value="<?= array_sum($pro_mrp);?>" class="form-control"   aria-describedby="helpId" readonly /> 
                   
        </div>
        <div class="form-group">
          <label for="">Total Amount</label>
          <input type="text" name="ttl_amout" value="<?= $this->cart->total();?>" class="form-control"   aria-describedby="helpId" readonly /> 
                   
        </div>
        
        <div class="form-group">
          <label for="">Total BV</label>
          <input type="text" name="ttl_bv" value="<?= $this->cart->totalbv();?>" class="form-control"   aria-describedby="helpId" readonly /> 
                   
        </div>
 
          <button type="submit" class="btn btn-primary" name="buy_btn"  onclick="return confirm('Are you sure? you wants to Submit.')">Click To buy now</button>
      </form>
      </div>
      </div>

    </div>
</div>
		<?php
	}else{
		?>
		<div class="container">
  <ul class="breadcrumb">
        <li><a href=""><i class="fa fa-home"></i></a></li>
        <li><a href="">Shopping Cart</a></li>
      </ul>
  <div class="row">
            
    <div id="content" class="bg-page-404 col-sm-12 ">
        
      <div class="col-sm-12 text-center">
           <?php
           if(isset($_SESSION['new_order_id'])){
               ?>
               
               
                <div style="margin: 30px 0 50px"><img src="image/catalog/404/404-img-text.png" alt=""></div>
                <span style='font-size:50px;'>&#9989;</span>
                <h1 style="backgound:color-green;">Thank You!</h1>
                <p  style="color:green;">Your Order submitted Successfully!</p>
                
                <div class="table-responsive">
		
		       <table class="table table-bordered">
                    
 
	                    <tbody>
	                     <?php
	                     $new_order_id=$this->session->userdata('new_order_id');
	                     
	                     $new_order_details=$this->conn->runQuery('*','franchise_orders',"id='$new_order_id'");
 
                            $order_id=$new_order_details[0]->f_code;
                              
                            $u_detail=$this->profile->franchise_info($order_id);
                            
                           ?>
                            <p style="margin-top:30px background :color-red">Your Order Is:<?= $new_order_id;?></p>
                             <tr>
                                <td>Username</td>
                                <td><?= $u_detail->username;?></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><?= $u_detail->name;?></td>
                            </tr>
                            <tr>
                                <td>Total Amount</td>
                                <td><?= $new_order_details[0]->order_amount;?></td>
                            </tr>
                             
                            <tr>
                               <td>Total Business Volume </td>
                               <td><?= $new_order_details[0]->order_bv;?></td>
                           </tr>                       
                       
                        </tbody>
                </table>
           
        </div>
             <?php
           }else{
               ?>
               <div style="margin: 30px 0 50px"><img src="image/catalog/404/404-img-text.png" alt=""></div>
                <h1>Shopping Cart</h1>
                <p>Your shopping cart is empty!</p>
               <?php
           }
           ?>   
                  
                <a href="<?= $admin_path.'franchise/sale';?>" class="btn btn-primary" title="Continue">Continue</a>
            </div>
        
            <div class="col-sm-5">
                 <img src="image/catalog/404/404-image.png" alt="">
            </div>
        <!--?php echo $content_bottom; ?--> 
    </div>

    </div>
</div>
		<?php
	}
	
	?> 
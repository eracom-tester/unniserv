<?php
if(isset($_GET['order_id'])){
    $vd_id=$_GET['order_id'];
}
$order_details=$this->conn->runQuery('*','orders',"id='$vd_id'")[0];

$u_code=$order_details->u_code;
$order_ids=$order_details->id;
$franchise_id=$order_details->tx_user_id;
$total_order_amt=$order_details->amount;
$total_order_bv=$order_details->bv;
$users_details=$this->conn->runQuery('*','users',"id='$u_code'")[0];
$pkg_details1=$this->conn->runQuery('*','order_items',"order_id='$order_ids'");

 ?>
<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">  Order Bill </h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#"> Order</a></li>            
            <li class="breadcrumb-item"><a href="#"> Bill</a></li>            
            <li class="breadcrumb-item active" aria-current="page">  Order Bill </li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase"> Order Bill</h6>
<hr>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<center>
		<a href="" class="btn btn-success" onclick='printDiv();' title="Print Form"><i class="fa fa-print"></i></a>
		</center>
		
		
		<div id="DivIdToPrint">
			
			<style>
				.invoice-box {
					max-width: 800px;
					margin: auto;
					padding: 30px;
					border: 1px solid #eee;
					box-shadow: 0 0 10px rgba(0, 0, 0, .15);
					font-size: 16px;
					line-height: 24px;
					font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
					color: #555;
				}
    
				.invoice-box table {
					width: 100%;
					line-height: inherit;
					text-align: left;
				}
				
				.invoice-box table td {
					padding: 5px;
					vertical-align: top;
				}
    
				.invoice-box table tr td:nth-child(2) {
					text-align: right;
				}
    
				.invoice-box table tr.top table td {
					padding-bottom: 20px;
				}
				
				.invoice-box table tr.top table td.title {
					font-size: 45px;
					line-height: 45px;
					color: #333;
				}
    
				.invoice-box table tr.information table td {
					padding-bottom: 40px;
				}
				
				.invoice-box table tr.heading td {
					background: #eee;
					border-bottom: 1px solid #ddd;
					font-weight: bold;
				}
    
				.invoice-box table tr.details td {
					padding-bottom: 20px;
				}
				
				.invoice-box table tr.item td{
					border-bottom: 1px solid #eee;
				}
				
				.invoice-box table tr.item.last td {
					border-bottom: none;
				}
				
				.invoice-box table tr.total td:nth-child(2) {
					border-top: 2px solid #eee;
					font-weight: bold;
				}
				
				@media only screen and (max-width: 600px) {
					.invoice-box table tr.top table td {
						width: 100%;
						display: block;
						text-align: center;
					}
								
					.invoice-box table tr.information table td {
						width: 100%;
						display: block;
						text-align: center;
					}
				}
    
				/** RTL **/
				.rtl {
					direction: rtl;
					font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				}
    
				.rtl table {
					text-align: right;
				}
				
				.rtl table tr td:nth-child(2) {
					text-align: left;
				}
    </style>
		
         <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="6">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="<?= $this->conn->company_info('logo');?>" style="width:<?= $this->conn->company_info('logo_width');?>;height:<?php echo $this->conn-> company_info('logo_height');?>" alt="<?php echo $this->conn->company_info('company_name');?>">
                            </td>
                            
                            <td>
                                Invoice #: <?php echo $order_details->invoice_no;?><br>
                                Bill Date: <?php echo date('M d,Y ',strtotime($order_details->added_on));?><br>
                               
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="6">
                    <table>
                        <tr>
                            <td>
							<?php
							$franchise_details=$this->conn->runQuery('*','franchise_users',"id='$franchise_id'");
							echo '<strong>'.$franchise_details[0]->franchise_name.'</strong><br>';
							echo 'Username : '.$franchise_details[0]->username.'<br>';
							echo 'Email : '.$franchise_details[0]->email.'<br>';
							echo 'Mobile : '.$franchise_details[0]->mobile.'<br>';
							echo 'Website : '.$this->conn->company_info('base_url').'<br>';
						    //$order_address=	json_decode($order_details->order_address,true);
							
							?>
							
                               
                            </td>
                            
                            <td>
						
							<strong><b>Shipping Info</b></strong><br>
                               <?php echo 'Name :'.$users_details->name?><br>
                               <?php echo 'Username :'.$users_details->username?><br>
                               <?php echo 'Mobile :'.$users_details->mobile;?><br>
                               <?php echo 'Email :'.$users_details->email;?><br>
                              <!-- <?php echo 'Address :'.$order_address['address'].' '.$order_address['address2'];?><br>
                               <?= $order_address['State'].' '.$order_address['zip'];?><br>-->
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <!--<tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td colspan="6">
                    Amount #
                </td>
            </tr>
            
            <tr class="details">
                <td>
                   <?php $wt_type=$get_order_detail['wallet_type'];
				   if($wt_type=="transaction"){
					   $utr_nos=$get_order_detail['utr_no'];
					   echo "Transaction Id:".$utr_nos;
				   }else{
					   echo "Wallet";
				   }
				   ?>
                </td>
                
                <td colspan="6">
                   <?php echo $this->conn->company_info('currency');?> <?php echo $get_order_detail['order_total_amount'];?>
                </td>
            </tr>
            -->
            <tr class="heading">
                <td>
                    Sr No
                </td>
                <td class="text-left">
                    Product Name
                </td>
               
                
				 <td class="text-right">
                   Qty
                </td>
                <td class="text-right">Unit BV</td>
				<td class="text-right">
                   Total Price (<?php echo $this->conn->company_info('currency');?>)
                </td>
            </tr>
            <?php 
            $sr=0;
            foreach($pkg_details1 as $pkg_details2){
            
            ?>
            <tr class="item" >
                <td >
			 
                    <?php echo $sr+1;?>
					 
                </td>
                <td class="text-left" >
				 
                    <?php echo $pkg_details2->name;?>
					 
                </td >
                 
				<td class="text-right">
								 
                    <?php echo $pkg_details2->quantity;?>
								 
                </td>
                <td class="text-right">				 
                    <?php echo $pkg_details2->product_bv;?>
								 
                </td>
				 <td class="text-right">			 
                    <?php echo $pkg_details2->sub_total;?>
								 
                </td>
               
            </tr>
            <?php 
                $sr++;
                
            }
            
            ?>
          
            
            <tr class="total">
                <td></td>
               

                <td colspan="5">
                    	
                   Total Amount:<?php echo $this->conn->company_info('currency');?> <?php echo  $total_order_amt=$order_details->order_amount;?><br>
               
			
					Total BV : <?php echo $total_order_bv=$order_details->order_bv;?>
			
				 <br> <br><br> <br>
				 
				 Authorised Signatory
				 
				</td>
				
				
            </tr>
            <tr class="total">
                <td colspan="12">
             <center>More Information Visit <?= $this->conn->company_info('base_url');?><center></td>
           </tr>
        </table>
    </div>
		
 </div>
   
    </div>
</div>
 <script>

////////////////div print function /////////////////////////
//////////btn onclick  call this function ////////

function printDiv(){

  var divToPrint=document.getElementById('DivIdToPrint'); ////////////  <- div id /////////////

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}
  ///////////////////////// end function //////////
</script>

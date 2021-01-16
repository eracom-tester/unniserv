 <?php
 if(isset($_GET['order_id'])){
     $order_id=$_GET['order_id'];
    $table_data=$this->conn->runQuery('DISTINCT(`product_id`) as prod_id','franchise_order_items',"f_code='$order_id'");
/*echo"<pre>";
 print_r($table_data);*/
    $franchise_info=$this->conn->runQuery('*','franchise_users',"id='$order_id'");
   
  
 }

 ?>
          <div class="row pt-2 pb-2">
            <div class="col-sm-9">
              <h4 class="page-title">Franchise Pending Stock View</h4>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Franchise Pending Stock View</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Pending Stock View</li>
              </ol>
            </div>
          </div>
          <center>
                <input type='button' id='btn' value='Print' class="btn"  style="background-color:#4CC824;color:white" onclick='printDiv();'>
                </center>
          <div id="DivIdToPrint">
           
            <br>
            <strong>Customer Info</strong>
           <p>
              Name: <?= $franchise_info[0]->name;?></br>
              Franchise Name: <?= $franchise_info[0]->franchise_name;?></br>
             <!-- Franchise username: <?= $franchise_info[0]->username;?></br>
              -->
           
           </p>
            <br>
           
            <div class="row">
              <div class="col-md-12 bg-light">
                <div class="table-responsive">
                  <table class="table table-condensed ">
                    <tr>
                      <th>Sr No.</th>
                      <th>Product Name</th>
                      <th>Total Qty</th>
                      <!--<th>Total Mrp</th>-->
                      <th>Total dp</th>
                      <th>Total Bv</th>
                     
                     
                    </tr>
                    <?php  
                    
                      if(!empty($table_data)){ 
                          $sr=0;
                        foreach($table_data as $t_data){
                        // print_r($t_data);
                         $product_ids=$t_data->prod_id;
                      
                         $name=$this->conn->runQuery('name','products',"p_code='$product_ids'");
                       
                         $ttl_qty=$this->conn->runQuery('SUM(quantity) as ttl_qty','franchise_order_items',"f_code='$order_id' and product_id='$product_ids'")[0]->ttl_qty;
                         $ttl_amount=$this->conn->runQuery('SUM(sub_total) as ttl_amt','franchise_order_items',"f_code='$order_id' and product_id='$product_ids'")[0]->ttl_amt;
                         $total_bv=$this->conn->runQuery('SUM(product_bv) as ttl_bv','franchise_order_items',"f_code='$order_id' and product_id='$product_ids'")[0]->ttl_bv;
                          
                          
                         $ttl_qtys=$this->conn->runQuery('SUM(quantity) as ttl_qtys','order_items',"franchise_id='$order_id' and product_id='$product_ids'")[0]->ttl_qtys;
                         $ttl_amounts=$this->conn->runQuery('SUM(sub_total) as ttl_amts','order_items',"franchise_id='$order_id' and product_id='$product_ids'")[0]->ttl_amts;
                         $total_bvs=$this->conn->runQuery('SUM(product_bv) as tttl_bv','order_items',"franchise_id='$order_id' and product_id='$product_ids'")[0]->tttl_bv;
                          
                          $qty_pd= $ttl_qty!='' ? ($ttl_qtys!='' ? $ttl_qty-$ttl_qtys:$ttl_qty):0;
                          $amnt_pd= $ttl_amount!='' ? ($ttl_amounts!='' ? $ttl_amount-$ttl_amounts:$ttl_amount):0;
                          $bv_pd= $total_bv!='' ? ($total_bvs!='' ? $total_bv-$total_bvs:$total_bv):0;
                          ?>
                            <tr>
                              <td><?= $sr+1;?></td>
                              <td><?= $name[0]->name;?></td>
                              <td><?php echo $ttl_qty1[]=$qty_pd;?></td>
                              <td><?= $total_amt1[]=$amnt_pd;?></td>
                              <td><?= $total_bvs1[]=$bv_pd;?></td>
                              </tr>
                          <?php
                          $sr++;
                        }
                      }
                    ?>   
                     <tfoot>
                    <tr>
                      <td colspan="2">Total</td>
                      <td><b> Qty:<?= array_sum($ttl_qty1);?></b></td>
                      <td><b>Price:<?= array_sum($total_amt1);?></b></td>
                      <td><b> Business Volume:<?= array_sum($total_bvs1);?></b></td>
                         
                    </tr>
                  </tfoot>
                  </table>
                
                </div>
              </div>
            <?php  echo $this->pagination->create_links();?>      
            </div><!--End Row-->
<script>
 
        function printDiv(){
        var divToPrint=document.getElementById('DivIdToPrint'); ////////////  <- div id /////////////
        var newWin=window.open('','Print-Window');
        newWin.document.open();
        newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
        newWin.document.close();
        setTimeout(function(){newWin.close();},10);
        }
  
</script>

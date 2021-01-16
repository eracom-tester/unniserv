 <?php
 if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $table_data=$this->conn->runQuery('*','franchise_order_items',"order_id='$order_id'");
    $franchise_u_id=$table_data[0]->f_code;
    $franchise_info=$this->conn->runQuery('*','franchise_users',"id='$franchise_u_id'");
    
 }

 ?>
          <div class="row pt-2 pb-2">
            <div class="col-sm-9">
              <h4 class="page-title">Franchise Order</h4>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Franchise</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Order</li>
              </ol>
            </div>
          </div>
           <center>
                <input type='button' id='btn' value='Print Bill' class="btn"  style="background-color:#4CC824;color:white" onclick='printDiv();'>
                </center>
          <div id="DivIdToPrint">
           <center><h5>Bill</h5></center>
            <br>
            <strong>Customer Info</strong>
           <p>
              Franchise Name: <?= $franchise_info[0]->franchise_name;?></br>
              Franchise username: <?= $franchise_info[0]->username;?></br>
              Name: <?= $franchise_info[0]->name;?></br>
           
           </p>
            <div class="row">
              <div class="col-md-12 bg-light">
                <div class="table-responsive">
                  <table class="table table-condensed ">
                    <tr>
                      <th>Sr No.</th>
                      <th>Product Name</th>
                      <th>Qty</th>
                     
                      <th>Sub total</th>
                      <th> Business Volume</th>
                     
                   
                     
                    </tr>
                    <?php  
                    // print_r($table_data);
                      if(!empty($table_data)){ 
                          $sr=0;
                        foreach($table_data as $t_data){
                         
                         $product_details=$this->product->product_detail($t_data->product_id);
                          ?>
                            <tr>
                              <td><?= $sr+1;?></td>
                              <td><?= $product_details->name;?></td>
                              <td><?= $ttl_qty[]=$t_data->quantity;?></td>
                              <td><?= $total_amt[]=$t_data->sub_total;?></td>
                              <td><?= $total_bvs[]=$t_data->product_bv;?></td>
                               
                             
                           
                            
                            </tr>
                          <?php
                          $sr++;
                        }
                      }
                    ?>    
                    <tfoot>
                    <tr>
                      <td></td>
                      <td></td>
                      <td><b>Total Qty:<?= array_sum($ttl_qty);?></b></td>
                       
                      <td><b>Total Price:<?= array_sum($total_amt);?></b></td>
                       
                      <td><b>Total Business Volume:<?= array_sum($total_bvs);?></b></td>
                        
                    </tr>
                  </tfoot>
                  </table>
                   
                </div>
              </div>
            <?php  echo $this->pagination->create_links();?>      
            </div><!--End Row-->
</div>
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
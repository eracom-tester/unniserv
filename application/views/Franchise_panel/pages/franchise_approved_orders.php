 <?php
 if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $table_data=$this->conn->runQuery('*','user_repurchase',"order_id='$order_id'");
    
    /*$franchise_u_id=$table_data[0]->f_code;
    $franchise_info=$this->conn->runQuery('*','franchise_users',"id='$franchise_u_id'");*/
    
 }

 ?>
          <div class="row pt-2 pb-2">
            <div class="col-sm-9">
              <h4 class="page-title">Franchise Delivery Order</h4>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Franchise</a></li>
                <li class="breadcrumb-item active" aria-current="page">Delivery Order</li>
              </ol>
            </div>
          </div>
          <!-- <center>
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
           
           </p>-->
            <div class="row">
              <div class="col-md-12 bg-light">
                <div class="table-responsive">
                  <table class="table table-condensed ">
                    <tr>
                      <th>Sr No.</th>
                      <th>Product Name</th>
                      <th>Qty</th>
                      <th>Product Price </th>
                      <th>Total Price</th>
                      <th>Product Business Volume</th>
                      <th>Total Business Volume</th>
                      <th>Date</th>
                     
                    </tr>
                    <?php  
                    // print_r($table_data);
                      if(!empty($table_data)){ 
                          $sr=0;
                        foreach($table_data as $t_data){
                         
                          ?>
                            <tr>
                              <td><?= $sr+1;?></td>
                              <td><?= $t_data->product_name;?></td>
                              <td><?= $ttl_qty[]=$t_data->qty;?></td>
                              <td><?= $unit_amts[]= $t_data->unit_amt;?></td>
                              <td><?= $total_amt[]=$t_data->total_amt;?></td>
                              <td><?= $unit_bvs[]=$t_data->unit_bv;?></td>
                              <td><?= $total_bvs[]=$t_data->total_bv;?></td>
                               
                              <td><?= $t_data->added_on;?></td>
                           
                            
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
                      <td><b>Total Product Price:<?= array_sum($unit_amts);?></b></td>
                      <td><b>Total Price:<?= array_sum($total_amt);?></b></td>
                      <td><b>Business Volume:<?= array_sum($unit_bvs);?></b></td>
                      <td><b>Total Business Volume:<?= array_sum($total_bvs);?></b></td>
                        <td></td>
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
        <?php
        $u_code=$this->session->userdata('user_id');
        
        $ttl_income=$this->conn->runQuery('(SUM(amount) - SUM(tx_charge)) as amnt,SUM(amount) as ttl','transaction',"u_code='$u_code' and tx_type='income' and source='$source'");
        $total =  $ttl_income[0]->ttl!='' ? $ttl_income[0]->ttl:0;
        $payable =  $ttl_income[0]->amnt!='' ? $ttl_income[0]->amnt:0;
        
         
        ?>
         
        <div class="card card-body" style="background-color:<?= $this->config->item('user_back_color')?>;">
            <form action="<?= $base_url;?>" method="get">
                 <div class="form-inline1">
                                          
                    <input type="text" Placeholder="Enter Name" name="name" class=" " value='<?= isset($_REQUEST['name']) && $_REQUEST['name']!='' ? $_REQUEST['name']:'';?>' />
                    <input type="text" Placeholder="Enter Username" name="username" class=" " value='<?= isset($_REQUEST['username']) && $_REQUEST['username']!='' ? $_REQUEST['username']:'';?>' />                      
                     
                      
                      
                     <select name="limit">
                         <option value="20" <?= isset($_REQUEST['limit']) && $_REQUEST['limit']==20 ? 'selected':'';?> >20</option>
                         <option value="50" <?= isset($_REQUEST['limit']) && $_REQUEST['limit']==50 ? 'selected':'';?> >50</option>
                         <option value="100" <?= isset($_REQUEST['limit']) && $_REQUEST['limit']==100 ? 'selected':'';?> >100</option>
                         <option value="200" <?= isset($_REQUEST['limit']) && $_REQUEST['limit']==200 ? 'selected':'';?> >200</option>
                     </select>
                    
                     
                    <input type="date" class=" "  Placeholder="From"  name="start_date" value="<?= (isset($_REQUEST['start_date']) ? $_REQUEST['start_date']:''); ?>"/>
                    <input type="date" class=" "  Placeholder="End date"  name="end_date" value="<?= (isset($_REQUEST['end_date']) ? $_REQUEST['end_date']:''); ?>" />
                         
                     
                     
                     <input type="submit" name="submit" class=" " value="filter" />
                     <input type="submit" name="reset" class=" " value="Reset" />
                     <!--<a href="<?= $base_url;?>" class=" " > Reset </a>-->
                     <!--<input type="submit" name="export_to_excel" class="btn btn-sm m-1" value="Export to excel" />-->
                      
                </div>
            </form>
        </div>
       
        <div class="card"> 
        
            <div class="card-header text-right">
                Total Income : <?= $total;?>
                 | Payable Income : <?= $payable;?>
                <?php
                    $is_payout=$this->conn->setting('earning_type');
                    if($is_payout=='payout'){
                        $generated_amts=$this->wallet->generated_payout_by_income($u_code,$source);
                        $pending_amts=$this->wallet->pending_payout_by_income($u_code,$source);
                        ?>
                         | Generated Payout : <?= $generated_amts!='' ? $generated_amts :0 ;?>
                         | Expected Payout : <?= $pending_amts!='' ? $pending_amts :0 ;?>
                        <?php
                    }
                   
                ?>
            </div>
            <div class="table-responsive">
                <table class="<?= $this->conn->setting('table_classes'); ?>">
                    <thead>
                        <tr>
                            <th class="text-left border-right" >S No.</th>
                            <th class="text-left" >User</th>
                            <th class="text-left" >From</th>
                            <th  class="text-right" >Amount (<?= $this->conn->company_info('currency');?>)</th>
                            <th  class="text-right" >Extra Charges (<?= $this->conn->company_info('currency');?>)</th>
                            <th  class="text-left" >Remark</th>
                            <th  class="text-left" >Date </th>
                             
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $user=$this->session->userdata('profile');
                    if($table_data){
                        
                        foreach($table_data as $t_data){
                            $tx_profile=false;
                            $tx_profile=$this->profile->profile_info($t_data['tx_u_code']);
                            $sr_no++;
                            ?>
                            <tr>
                                <td class="text-left border-right"><?= $sr_no;?></td>
                                <td class="text-left"><?= $user->name;?> (<?= $user->username;?>) </td>
                                <td class="text-left"><?= $tx_profile ? $tx_profile->name:'';?> ( <?= $tx_profile ? $tx_profile->username : '';?> )</td>
                                <td class="text-right"><?= round($t_data['amount'],2);?></td>                               
                                <td class="text-right"><?= round($t_data['tx_charge'],2);?></td>
                                <td class="text-left"><small><?= $t_data['remark'];?></small></td>                                
                                <td class="text-left"><?= $t_data['date'];?></td>                                
                                           
                            </tr>
                            <?php
                        }
                    }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
        
    <?php echo $this->pagination->create_links();?>
    <div class="row pt-2 pb-2">
        <div class="col-sm-12">
		    
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Income</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> <?= $income_name;?></li>
         </ol>
	   </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php
            $data['sr_no']=$sr_no;;
            $data['table_data']=$table_data;
            $data['base_url']=$base_url;
            $data['source']=$income_slug;
            
            $panel_directory=$this->conn->company_info('panel_directory');
            $all_saparate_income=array('level','direct','repurchase','royalty','gen');
            if($income_slug=='level'){
                $this->load->view($panel_directory.'/pages/incomes/level_table',$data);
            }
            if($income_slug=='direct'){
                $this->load->view($panel_directory.'/pages/incomes/direct_table',$data);
            }
            
            if($income_slug=='repurchase'){
                $this->load->view($panel_directory.'/pages/incomes/repurchase_table',$data);
            }
            
            if($income_slug=='royalty'){
                $this->load->view($panel_directory.'/pages/incomes/royalty_table',$data);
            }
            if($income_slug=='gen'){
                $this->load->view($panel_directory.'/pages/incomes/generation_table',$data);
            }
           if(!in_array($income_slug, $all_saparate_income)){
                $this->load->view($panel_directory.'/pages/incomes/all_income_table',$data);
            }
            ?>
      
        </div>
    </div>


     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Add Feature</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">Features</li>
         </ol>
	   </div>
	  <!-- <div class="col-sm-3">
       <div class="btn-group float-sm-right">
        <button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Setting</button>
        <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">
        <span class="caret"></span>
        </button>
        <div class="dropdown-menu">
          <a href="javaScript:void();" class="dropdown-item">Action</a>
          <a href="javaScript:void();" class="dropdown-item">Another action</a>
          <a href="javaScript:void();" class="dropdown-item">Something else here</a>
          <div class="dropdown-divider"></div>
          <a href="javaScript:void();" class="dropdown-item">Separated link</a>
        </div>
      </div>
     </div> -->
     </div>
    <!-- End Breadcrumb-->

<!--End Row-->

        <?php 
            $success['param']='alert_success';
            $success['alert_class']='alert-success';
            $success['type']='success';
            $this->show->show_alert($success);
            ?>
            <?php 
            $erroralert['param']='alert_error';
            $erroralert['alert_class']='alert-danger';
            $erroralert['type']='error';
            $this->show->show_alert($erroralert);
        ?>
        <div class="row">
            <table class="table ">
                
                <tr>
                    <th>S No.</th>
                    <th>Feature Title</th>
                    <th>Action</th>
                </tr>
                <?php
                $get_all_title_features=$this->conn->runQuery('*','features',"is_feature_title='1'");
                if($get_all_title_features){
                    $sn_no=0;
                    foreach($get_all_title_features as $title_features){
                        $sn_no++;
                        $f_id=$title_features->id;
                        $this_f_Details=$this->conn->runQuery('*','features',"feature_id='$f_id'");
                        
                        //print_r($this_f_Details);
                        ?>
                        
                        <tr>
                            <td><?= $sn_no;?></td>
                            <td><?= $title_features->feature_name;?>
                                <div id="view_feature<?= $title_features->id;?>" class="collapse">
                                    <table class="table">
                                        <tr>
                                            <th>Title</th>
                                            <th>slug</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php
                                        if($this_f_Details){
                                            foreach($this_f_Details as $f_Details){
                                                ?>
                                                <tr>
                                                    <td><?= $f_Details->feature_name?></td>
                                                    <td><?= $f_Details->slug?></td>
                                                    <td><a href="?delete_feature=<?= $f_Details->id;?>" class="btn btn-danger btn-sm">delete</a></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        
                                        ?>
                                    </table>
                                </div>
                                <div id="add_subfeature<?= $title_features->id;?>" class="collapse">
                                         
                                            <div class="form-inline">
                                                <div class="form-group m1">
                                                    <input type="text" class="form-control" id="feature_name<?= $title_features->id;?>" Placeholder="Feature Title" />
                                                </div>
                                                <div class="form-group m1">
                                                    <input type="text" class="form-control"  id="slug<?= $title_features->id;?>" Placeholder="slug" />
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn-sm btn btn-success add_feature" data-featureid="<?= $title_features->id;?>" data-featuretitle="feature_name<?= $title_features->id;?>"  data-featureslug="slug<?= $title_features->id;?>" >Submit</button>
                                                </div>
                                            </div>
                                         
                                    </div>
                            
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm"  data-toggle="collapse" data-target="#view_feature<?= $title_features->id;?>" >View</button>
                                <button class="btn btn-success btn-sm"  data-toggle="collapse" data-target="#add_subfeature<?= $title_features->id;?>" >Add feature</button>
                            
                            </td>
                        </tr>
                        
                        <?php
                    }
                }
                ?>
                 <tr>
                             
                            <td colspan='3'>
                                <center><button class="btn btn-success btn-sm" data-toggle="collapse" data-target="#add_feature">add</button><br><br>
                                    <div id="add_feature" class="collapse">
                                        <form action="" method="post">
                                            <div class="form-inline">
                                                <div class="form-group m1">
                                                    <input type="text" class="form-control" name="feature_name" Placeholder="Feature Title" />
                                                </div>
                                                <div class="form-group m1">
                                                    <input type="text" class="form-control"  name="slug" Placeholder="slug" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn-sm btn btn-success"  name="add_feature_btn" value="Submit" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </center>
                            </td>
                            
                            
                        </tr>
            </table>
                
        
        </div>
        
           
           
 


    
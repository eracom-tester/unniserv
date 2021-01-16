    <div class="row pt-2 pb-2">
            <div class="col-sm-9">
    		    <h4 class="page-title"> Banners</h4>
    		    <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
                <li class="breadcrumb-item"><a href="#">Banners</a></li>            
                 
             </ol>
    	   </div>
    	   <div class="col-sm-3">
           
         </div>
    </div>
    <h6 class="text-uppercase"> Banners</h6>
    <hr>
 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <br>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>S No.</th>
                            <th>Type</th>
                            <th>Banner</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                          $sliders=$this->conn->runQuery('*','home_sliders',"1=1");
                          if($sliders){
                              $sno=0;
                              foreach($sliders as $slider){
                                  $sno++;
                                  ?>
                                  <tr>
                                    <td><?= $sno;?></td>
                                    <td><?= $slider->type;?></td>
                                    <td><img style="max-height:200px;" src="<?= $slider->img;?>" /></td>
                                    <td><?= $slider->sl_desc;?></td>
                                    <td><a class="btn btn-warning btn-sm" href="<?= $admin_path.'home/change_banner?id='.$slider->id;?>">Change</a></td>
                                </tr>
                                  <?php
                              }
                          }
                         ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

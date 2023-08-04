
        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">LIST OF <span class="red strong"><?php echo SYSTEM_NAME;?></span> MSME Partner</h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->
		
		<div class="properties-area recent-property" style="background-color: #FFF; padding-bottom: 55px;">
            <div class="container"> 
                <div class="row  pr0 padding-top-40 properties-page">
                    <div class="col-md-12 padding-bottom-40 large-search" style="text-align: center;"> 
                        <div class="search-form wow pulse" >
                            <?php include("includes/view_smart_search.php");?>
                        </div>
                    </div>

                    <div class="col-md-12  clear"> 
                        <div class="col-xs-10 page-subheader sorting pl0">
                        </div>

                        <div class="col-xs-2 layout-switcher">
                            <a class="layout-list active" href="javascript:void(0);"> <i class="fa fa-th-list"></i>  </a>
                            <a class="layout-grid" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>                          
                        </div><!--/ .layout-switcher-->
                    </div>

                    <div class="col-md-12 clear "> 
                        <div id="list-type" class="proerty-th-list">

                            <?php
                            if($result_msme == null){
                                echo '<div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title"> <p>We\'re sorry. We were not able to find a match. Please try another search filter.</p></div>.';
                            }
                            foreach ($result_msme as $row){
                            ?>

                            <div class="col-sm-6 col-md-3 p0">
                                <div class="box-two proerty-item">
                                    <div class="item-thumb">
                                            <a href="<?php echo base_url();?>msme/view/<?php echo encryptthis($row['user_id']);?>" ><img src="<?php echo base_url();?>assets/uploads/<?php echo $row['b_cover'];?>" style="object-fit: cover;"></a>
                                    </div>

                                    <div class="item-entry overflow">
                                        <h5><a href="<?php echo base_url();?>msme/view/<?php echo encryptthis($row['user_id']);?>"> <?php echo $row['b_name'];?> </a>
                                        <span class="proerty-price"><?php echo $row['orig_country'];?></span></h5>
                                        <div class="dot-hr"></div>
                                        <span class="proerty-price pull-right">Target: <?php echo $row['target_country'];?></span>
                                        <span class="pull-left"><?php echo $row['industry_name'];?></span><br>
                                        <p style="display: none;"><?php echo $row['b_info'];?>
                                            <?php
                                            $data_cat = array(
                                                'user_id'=> $row['user_id'],
                                            );
                                            $result_cat = $this-> database_model->select_all_query('v_user_categories ',$data_cat);

                                            echo '<div class="section property-features"><ul>';
                                            foreach ($result_cat as $row){
                                                echo '<li><a href="#">'.$row['category_name'].'</a></li>';
                                            }
                                            echo ' </ul></div>';
                                            ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <?php
                            } ?>


                        </div>
                    </div>

                    <div class="col-md-12 clear">                
                    </div>
                </div>                
            </div>
        </div>
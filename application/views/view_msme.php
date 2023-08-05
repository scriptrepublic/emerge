
        <div class="cover_photo" style=" background: #494C53 url('<?php echo base_url();?>assets/uploads/<?php echo $result_msme['b_cover'];?>') no-repeat scroll center top / cover; "> 
        	<div class="page-head-opacity">
	            <div class="container">
	                <div class="row">
	                    <div class="page-head-content">
	                        <h1 class="page-title"><?php echo $result_msme['b_name'];?> <span class="red strong" style="font-size: 20px;"><?php echo $result_msme['orig_country'];?></span></h1>               
	                    </div>
	                </div>
	            </div>
	        </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">   

                <div class="clearfix padding-top-40" >

                    <div class="col-md-8 single-property-content prp-style-1 ">
                        <div class="row">
                            <div class="light-slide-item">            
                                <div class="clearfix">
                                    <div class="favorite-and-print">
                                        <a class="printer-icon " href="javascript:window.print()">
                                            <i class="fa fa-print"></i> 
                                        </a>
                                    </div> 

                                    <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                        <li data-thumb="<?php echo base_url();?>assets/uploads/<?php echo $result_msme['b_cover'];?>"> 
                                            <img src="<?php echo base_url();?>assets/uploads/<?php echo $result_msme['b_cover'];?>" />
                                        </li>                                       
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="single-property-wrapper">

                            <div class="section">
                                <h4 class="s-property-title">Information</h4>
                                <div class="s-property-content">
                                    <p><?php echo $result_msme['b_info'];?></p>
                                </div>
                            </div>
                            <!-- End description area  -->

                            <div class="section additional-details">

                                <h4 class="s-property-title">Additional Details</h4>

                                <ul class="additional-details-list clearfix">
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Name of MSME</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $result_msme['b_name'];?></span>
                                    </li>
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Industry</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $result_msme['industry_name'];?></span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Country of Origin</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $result_msme['orig_country'];?></span>
                                    </li>
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Target Country</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $result_msme['target_country'];?></span>
                                    </li>


                                </ul>
                            </div>  
                            <!-- End additional-details area  -->

                            <div class="section property-features">      

                                <h4 class="s-property-title">Category of Inclusion</h4>                            
                                <ul>
                                	<?php
                                    $data_cat = array(
                                        'user_id'=> $result_msme['user_id'],
                                    );
                                    $result_cat = $this-> database_model->select_all_query('v_user_categories ',$data_cat);

                                    if($result_cat == null){
                                    	echo 'No available data.';
                                    }
                                    foreach ($result_cat as $row){
                                        echo '<li><a href="#">'.$row['category_name'].'</a></li>';
                                    }
                                    ?>
                                </ul>

                            </div>
                            <!-- End features area  -->

                            
                        </div>
                    </div>


                    <div class="col-md-4 p0">
                        <aside class="sidebar sidebar-property blog-asside-right">
                            <div class="dealer-widget">
                                <div class="dealer-content">
                                    <div class="inner-wrapper">

                                        <div class="clear">
                                            <div class="col-xs-3 col-sm-3 dealer-face">
                                                <a href="">
                                                    <img src="<?php echo $result_msme['b_photo'];?>" class="img-circle">
                                                </a>
                                            </div>
                                            <div class="col-xs-9 col-sm-9 ">
                                                <h3 class="dealer-name">
                                                    <a href=""><?php echo $result_msme['b_name'];?></a><br>
                                                    <span><?php echo $result_msme['industry_name'];?></span>        
                                                </h3>

                                            </div>
                                        </div>

                                        <div class="clear">
                                            <ul class="dealer-contacts">                                       
                                                <li><i class="pe-7s-map-marker strong"> </i> <?php echo $result_msme['orig_country'];?></li>
                                                <li><i class="pe-7s-mail strong"> </i> <?php echo $result_msme['user_email'];?></li>
                                                <li><i class="pe-7s-call strong"> </i> <?php echo $result_msme['b_contact'];?></li>
                                                <?php if($result_msme['b_url'] != '') { ?>
                                                <li><i class="pe-7s-global strong"> </i> <a href="<?php echo $result_msme['b_url'];?>" target="_blank"><?php echo $result_msme['b_url'];?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default sidebar-menu similar-property-wdg wow fadeInRight animated">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Browse by Industry</h3>
                                </div>
                                <div class="panel-body">
                                	<ul>
                                		<?php foreach ($result_industry as $row_ind){
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url();?>search/result?industry_id=<?php echo $row_ind['industry_id'];?>"><?php echo $row_ind['industry_name']?></a>
                                        </li>
                                        <?php
                                        } ?>
	                                </ul>
                                </div>
                            </div>                          

                        </aside>
                    </div>
                </div>

            </div>
        </div>
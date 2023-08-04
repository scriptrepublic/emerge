

        <div class="slider-area" style="background: black;">
            <div class="slider">
                <div id="bg-slider" class="owl-carousel owl-theme">

                    <div class="item" style="opacity: 0.3;"><img src="<?php echo base_url();?>assets/img/slide1/1.jpg"></div>
                    <div class="item" style="opacity: 0.3;"><img src="<?php echo base_url();?>assets/img/slide1/2.jpg"></div>
                    <div class="item" style="opacity: 0.3;"><img src="<?php echo base_url();?>assets/img/slide1/3.jpg"></div>

                </div>
            </div>
            <div class="slider-content">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                        <h2><strong class="apptext"><?php echo SYSTEM_NAME;?></strong> : <?php echo SYSTEM_TAGLINE;?></h2>
                        <p><?php echo SYSTEM_DESCRIPTION;?></p>
                        <div class="search-form wow pulse" data-wow-delay="0.8s">

                            <?php include("includes/view_smart_search.php");?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- property area -->
        <div class="content-area home-area-1 recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2>MSME Directory</h2>
                        <p><?php echo SYSTEM_DESCRIPTION3;?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="proerty-th">

                        <?php foreach ($result_msme as $row){
                            ?>

                            <div class="col-sm-6 col-md-3 p0">
                                <div class="box-two proerty-item">
                                    <div class="item-thumb">
                                        <a href="<?php echo base_url();?>msme/view/<?php echo encryptthis($row['user_id']);?>" ><img src="<?php echo base_url();?>assets/uploads/<?php echo $row['b_cover'];?>"></a>
                                    </div>

                                    <div class="item-entry overflow">
                                        <h5><a href="<?php echo base_url();?>msme/view/<?php echo encryptthis($row['user_id']);?>"> <?php echo $row['b_name'];?> </a>
                                            <br>
                                        <span class="proerty-price"><?php echo $row['orig_country'];?></span></h5>
                                        <div class="dot-hr"></div>
                                        <span class="pull-left"><?php echo $row['industry_name'];?></span><br>
                                        <p style="display: none;"><?php echo $row['b_info'];?></p>
                                    </div>
                                </div>
                            </div>
                            
                            <?php
                            } ?>
                        

                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-tree more-proerty text-center">
                                <div class="item-tree-icon">
                                    <i class="fa fa-th"></i>
                                </div>
                                <div class="more-entry overflow">
                                    <h5><a href="<?php echo base_url();?>search/result/" >LOOKING FOR MORE? </a></h5>
                                    <h5 class="tree-sub-ttl">Show all MSMEs</h5>
                                    <button class="btn border-btn more-black" >Browse MSMEs Directory</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--Welcome area -->
        <div class="Welcome-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 Welcome-entry  col-sm-12">
                        <div class="col-md-5 col-md-offset-2 col-sm-6 col-xs-12">
                            <div class="welcome_text wow fadeInLeft" data-wow-delay="0.3s" data-wow-offset="100">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                                        <!-- /.feature title -->
                                        <h2 style="display: flex; justify-content: center; align-items: center; letter-spacing: normal; font-weight: bold; font-size: 20px;"> 
                                        STRIVING SOCIAL INCLUSION </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                            <div  class="welcome_services wow fadeInRight" data-wow-delay="0.3s" data-wow-offset="100">
                                <div class="row">
                                    <div class="col-xs-6 m-padding">
                                        <div class="welcome-estate">
                                            <div class="welcome-icon">
                                                <i class="fa fa-users fa-3x inclusion"></i>
                                            </div>
                                            <h3>Indigenous People-Owned MSMEs</h3>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 m-padding">
                                        <div class="welcome-estate">
                                            <div class="welcome-icon">
                                                <i class="fa fa-wheelchair fa-3x inclusion"></i>
                                            </div>
                                            <h3>Persons With Disabilities</h3>
                                        </div>
                                    </div>


                                    <div class="col-xs-12 text-center">
                                        <i class="welcome-circle"></i>
                                    </div>

                                    <div class="col-xs-6 m-padding">
                                        <div class="welcome-estate">
                                            <div class="welcome-icon">
                                                <i class="fa fa-home fa-3x inclusion"></i>
                                            </div>
                                            <h3>Rural Community-Based MSMEs</h3>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 m-padding">
                                        <div class="welcome-estate">
                                            <div class="welcome-icon">
                                                <i class="fa fa-heart fa-3x inclusion"></i>
                                            </div>
                                            <h3>Different Social inclusions</h3>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- boy-sale area -->
        <div class="boy-sale-area">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
                        <div class="asks-first">
                            <div class="asks-first-circle">
                                <span class="fa fa-search"></span>
                            </div>
                            <div class="asks-first-info">
                                <h2>LOOKING FOR POTENTIAL MSMEs TO INVEST IN?</h2>
                                <p>Explore a Global MSME Directory, Connecting Investors to Export-Ready Products!</p>                                        
                            </div>
                            <div class="asks-first-arrow">
                                <a href="<?php echo base_url();?>search/result/"><span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-10 col-sm-offset-1 col-xs-12 col-md-offset-0">
                        <div  class="asks-first">
                            <div class="asks-first-circle">
                                <span class="fa fa-edit"></span>
                            </div>
                            <div class="asks-first-info">
                                <h2>EVALUATING THE READINESS OF YOUR MSME FOR EXPORTING? </h2>
                                <p>Take advantage of the <?php echo SYSTEM_NAME;?> exporting readiness tool to assess your business.</p>
                            </div>
                            <div class="asks-first-arrow">
                                <a href="<?php echo base_url();?>assessment"><span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

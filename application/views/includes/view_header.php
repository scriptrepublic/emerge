<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $page_title;?> - <?php echo SYSTEM_NAME;?>: <?php echo SYSTEM_TAGLINE;?></title>
        <meta name="description" content="<?php echo SYSTEM_DESCRIPTION;?>">
        <meta name="author" content="<?php echo SYSTEM_NAME;?>">
        <meta name="keyword" content="<?php echo SYSTEM_KEYWORD;?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

        <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url();?>assets/img/favicon.png" type="image/x-icon">

        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/normalize.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/fontello.css">
        <link href="<?php echo base_url();?>assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/fonts/icon-7-stroke/css/helper.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/js/sweet-alert2/sweetalert2.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-select.min.css"> 
        <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/icheck.min_all.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/price-range.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css">  
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.theme.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.transitions.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsive.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/wizard.css"> 
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/lightslider.min.css">
    </head>
    <body data-baseurl="<?php echo base_url(); ?>" >

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Body content -->


        <nav class="navbar navbar-default sticky-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/logo.png" height="50px" alt=""></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        <?php
                        if ( $this->session->userdata('ses_logged_in')!=TRUE)
                        {
                            echo '<a href="'.base_url().'login"><button class="navbar-btn nav-button wow bounceInRight login" data-wow-delay="0.45s">Login</button></a>';
                        }else{
                            echo '<a href="'.base_url().'assessment"><button class="navbar-btn nav-button wow bounceInRight login" data-wow-delay="0.45s"><i class="fa fa-edit"></i> Readiness Assessment</button></a>';
                        }

                        ?>
                        
                    </div>
                    <ul class="main-nav nav navbar-nav navbar-right">
                        <li><a class="active" href="<?php echo base_url();?>">Home</a></li>
                        <li class="dropdown yamm-fw" data-wow-delay="0.2s">
                            <a href="<?php echo base_url();?>search/result" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">MSMEs Directory <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="yamm-content">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h5>Industry</h5>
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
                                            <div class="col-sm-4">
                                                <h5>Origin Country</h5>
                                                <ul>
                                                    <?php foreach ($result_country as $row){
                                                    ?>
                                                    <li><a href="<?php echo base_url();?>search/result?country_origin=<?php echo $row['country_id'];?>"><?php echo $row['country_name']?></a>  </li>
                                                    <?php
                                                    } ?>
                                                </ul>
                                            </div>
                                            <div class="col-sm-4">
                                                <h5>Category of Inclusions</h5>
                                                <ul>
                                                    <?php foreach ($result_category as $row_cat){
                                                    ?>
                                                    <li><a href="<?php echo base_url();?>search/result?category_id%5B%5D=<?php echo $row_cat['category_id'];?>"><?php echo $row_cat['category_name'];?></a> </li>

                                                    <?php
                                                    } ?>
                                                </ul>
                                          
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.yamm-content -->
                                </li>
                            </ul>
                        </li>
                        <li><a class="" href="<?php echo base_url();?>faq">FAQs</a></li>
                        <?php
                        if ( $this->session->userdata('ses_logged_in')==TRUE)
                        {
                        ?>
                        <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                            <a href="<?php echo base_url()?>profile" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">My Account <b class="caret"></b></a>
                            <ul class="dropdown-menu navbar-nav">
                                <li>
                                    <a href="<?php echo base_url()?>profile">My Profile</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url()?>report">My Assessment Reports</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url()?>login/logout">Logout</a>
                                </li>

                            </ul>
                        </li>
                        <?php
                        }?>
                        
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->
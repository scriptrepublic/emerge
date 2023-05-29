<div class="content-area recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
            <div class="container">    

                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2><?php echo $page_title;?></h2>
                        <br>
                    </div>
                </div>

                <div class="row row-feat"> 
                    <div class="col-md-12">
 
                        <div class="col-sm-12 feat-list">

                        	<?php foreach ($result_faq as $row){
							?>

							<div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                         <h4 class="panel-title fqa-title" data-toggle="collapse" data-target="#fqa<?php echo $row['faq_id'];?>" aria-expanded="true">
                                            <?php echo $row['faq_q'];?>
                                         </h4> 
                                    </div>
                                    <div id="fqa<?php echo $row['faq_id'];?>" class="panel-collapse fqa-body">
                                        <div class="panel-body">
                                            <?php echo $row['faq_a'];?>
                                        </div> 
                                    </div>
                                </div>
                            </div>
							<?php
							} ?>
                        </div>
                        

                    </div>
                </div>
                
            </div>
        </div>
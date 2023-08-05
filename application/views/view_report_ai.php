

<div class="content-area user-profiel" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">   
                <div class="row">
                    <a href="<?php echo base_url();?>report" class="pull-left col-sm-10 col-sm-offset-1" ><i class="fa fa-arrow-left"></i> Back to My Assessment Reports</a>
                    <br>
                    <br>
                    <div class="col-sm-10 col-sm-offset-1 profiel-container" style="text-align: justify;">
                            <div class="col-sm-10 col-sm-offset-1">
                                <button class="navbar-btn nav-button login pull-left" id="ai_recommend" onclick="ai_recommend('<?php echo encryptthis($result_ass['assessment_id']); ?>')"><i class="fa fa-magic"></i> <?php echo SYSTEM_NAME; ?> AI Recommendations</button>
                            
                                <a href="javascript:window.print()"><button class="navbar-btn nav-button login pull-right" ><i class="fa fa-print"></i> Print</button></a>
                            </div>
                            <div class="clear">
                            <div class="profiel-header">
                                <center>
                                    <img src="<?php echo base_url();?>assets/img/steps/ai.png" style="width: 200px;"/>
                                </center>
                                <h3>
                                    <b><?php echo SYSTEM_NAME; ?> AI </b> RECOMMENDATION REPORT <br>
                                    <small>We are thrilled to present your Exporting Recommendation Ideas, by <?php echo SYSTEM_NAME; ?> AI,<br>offering an evaluation of your readiness for international trade.</small>
                                </h3>
                                <hr>
                            </div>

                            <div class="clear">
                                <div class="col-sm-10 col-sm-offset-1" id="typewriter">

                                    <div class="form-group" >
                                        <p><?php echo $result_ass['ai_recommendations'];?></p>


                                       
                                    </div> 
                                    <p><small>Disclaimer: Please note that the Exporting Recommendation Ideas are intended for informational purposes only. The recommendations provided should not be considered as professional advice. Before making any decisions related to international trade, we recommend consulting with qualified experts or conducting further research. EMERGE AI and its affiliates shall not be liable for any actions taken based on the information provided in this report.</small></p>
                                </div>
                                
                            </div>
 
                    

                </div>
            </div><!-- end row -->

        </div>
    </div>

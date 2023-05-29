

<div class="content-area" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">
                <div class="clearfix" > 
                    <div class="wizard-container"> 

                        <div class="wizard-card ct-wizard-orange" id="wizardProperty">
                            <form method="post" action="" id="form_assessment" class="form">
                                <div class="wizard-header">
                                    <h3>
                                        YOUR EXPORT READINESS <b>ASSESSMENT</b> TOOL <br>
                                        <small>Unlock your export potential as an MSME with our assessment tool, guiding you towards readiness and success in the global market.</small>
                                    </h3>
                                </div>

                                <ul>
                                    <li><a href="#step1" data-toggle="tab">Step 1 </a></li>
                                    <li><a href="#step2" data-toggle="tab">Step 2 </a></li>
                                    <li><a href="#step3" data-toggle="tab">Step 3 </a></li>
                                    <li><a href="#step4" data-toggle="tab">Step 4 </a></li>
                                </ul>

                                <div class="tab-content">

                                    <div class="tab-pane" id="step1">
                                        <div class="row p-b-15  ">
                                            <center>
                                                <img src="<?php echo base_url();?>assets/img/steps/step1.png" style="width: 300px;"/>
                                            </center>
                                            <h4 class="info-text"> Let's start with your basic information</h4>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Business Name <small>(required)</small></label>
                                                    <input name="b_name" type="text" class="form-control" value="<?php echo $result['b_name']; ?>" disabled>
                                                </div>

                                                <div class="form-group">
				                                    <label>Country of Origin <small>(required)</small></label>
				                                    <select name="b_country" class="form-control required" disabled>
				                                    	<option value="">- Select Country -</option>
				                                    	<?php foreach ($result_country as $row){
				                                    	?>
				                                    	<option value="<?php echo $row['country_id'];?>" <?php if($row['country_id'] == $result['b_country']) echo 'selected'; ?>><?php echo $row['country_name']?></option>
				                                    	<?php
				                                    	} ?>
				                                    </select>
				                                </div> 
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Business Contact Number <small>(required)</small></label>
                                                    <input name="b_contact" type="text" class="form-control" value="<?php echo $result['b_contact']; ?>" disabled>
                                                </div>


                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Business Email Address <small>(required)</small></label>
                                                    <input name="b_contact" type="text" class="form-control" value="<?php echo $result['user_email']; ?>" disabled>
                                                </div>

                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Basic Information <small>(required)</small></label>
                                                    <textarea  name="b_info" class="form-control required" placeholder="Provide a short description of your business" rows="3" disabled><?php echo $result['b_info']; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
				                                    <label>Target Country for Export <small>(required)</small></label>
				                                    <select name="b_target" class="form-control required" disabled>
				                                        <option value="">- Select Country -</option>
				                                        <option value="0" <?php if(0 == $result['b_target']) echo 'selected'; ?>>(Any Country)</option>
				                                        <?php foreach ($result_country as $row){
				                                        ?>
				                                        <option value="<?php echo $row['country_id'];?>" <?php if($row['country_id'] == $result['b_target']) echo 'selected'; ?>><?php echo $row['country_name']?></option>
				                                        <?php
				                                        } ?>
				                                    </select>
				                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <p>
                                                    <small>* If you wish to edit your basic information please click <a href="<?php echo base_url();?>profile">here</a>.</small>
                                                </p>
                                            </div>


                                        </div>
                                    </div>
                                    <!--  End step 1 -->

                                    <div class="tab-pane" id="step2">
                                        <center>
                                            <img src="<?php echo base_url();?>assets/img/steps/step2.png" style="width: 300px;"/>
                                        </center>
                                        <h4 class="info-text"> What industry does your business belong to? </h4>
                                        <div class="row">
                                            <div class="col-sm-12"> 
                                                <div class="col-sm-12"> 
                                                    <div class="form-group">
                                                        <label>Select one industry below :</label>
                                                    </div> 
                                                </div> 
                                            </div>
                                            <div class="col-sm-12">

		                                    	<select name="b_industry" class="form-control required">
			                                    	<option value="">- Select Industry -</option>
			                                    	<?php foreach ($result_industry as $row_ind){
			                                    	?>
			                                    	<option value="<?php echo $row_ind['industry_id'];?>" <?php if($row_ind['industry_id'] == $result['b_industry']) echo 'selected'; ?> ><?php echo $row_ind['industry_name']?></option>
			                                    	<?php
			                                    	} ?>
			                                    </select>
                                            </div>

                                            <div class="col-sm-12  padding-top-25"> 

                                        	<h4 class="info-text ">What category of inclusion does your business belong to?</h4>
                                                <div class="col-sm-12"> 
                                                    <div class="form-group">
                                                        <label>Select as many inclusion categories below :</label>
                                                    </div> 
                                                </div> 
                                            </div>

											<div class="list-group">

												<?php foreach ($result_category as $row_cat){
												?>
												<div class="col-sm-6">

													<label class="list-group-item">
														<input type="checkbox" name="category_id[]" value="<?php echo $row_cat['category_id'];?>" class="form-control required" <?php if (in_array($row_cat['category_id'], $my_categories)) { echo "checked"; } ?> >
														<?php echo $row_cat['category_name'];?>
													</label>
												</div>

												<?php
												} ?>

											</div>
                                        </div>
                                    </div>
                                    <!-- End step 2 -->

                                    <div class="tab-pane" id="step3"> 
                                        <center>
                                            <img src="<?php echo base_url();?>assets/img/steps/step3.png" style="width: 300px;"/>
                                        </center>                                       
                                        <h4 class="info-text">Areas of Export Readiness </h4>
                                        <div class="row">  

                                            <div class="col-sm-12"> 
                                                <div class="col-sm-12"> 
                                                    <div class="form-group">
                                                        <label>Please assess your readiness for export by answering "yes" or "no" to the following questions, as the results will be used to create your assessment report:</label>
                                                    </div> 
                                                </div> 
                                            </div>

                                            <div class="col-sm-12"> 
                                                <div class="col-sm-12"> 
                                                    <div class="form-group">
                                                        <?php foreach ($result_q_cat as $row_qcat){
														    	?>

														    	<h4 class="s-property-title"><?php echo $row_qcat['qcat_name'];?> &nbsp; <img  src="<?php echo base_url();?>assets/img/steps/<?php echo $row_qcat['img'];?>" style="width: 100px;"/></h4>

														    	
														    	<div class="list-group">
														    	<?php 
														    	$data_rowquery = array(
															    	'q_cat_id'=> $row_qcat['qcat_id']
															    );
																$result_q = $this-> database_model->select_all_query('r_question_detail',$data_rowquery);

																foreach ($result_q as $row_q){
																?>
																<label class="list-group-item">
																	<p style="margin-left:1.8em;"><?php echo $row_q['q_name'];?></p></li>
																	<p style="margin-left:1.8em;">
																		<small>
																		<input type="radio" name="q_<?php echo $row_q['q_id'];?>" value="<?php echo $row_q['q_id'];?>|1" class="q_id form-control required" <?php if (in_array($row_q['q_id'].'|1', $my_qa)) { echo "checked"; } ?>> Yes
																		<input type="radio" name="q_<?php echo $row_q['q_id'];?>" value="<?php echo $row_q['q_id'];?>|0" class="q_id form-control required" <?php if (in_array($row_q['q_id'].'|0', $my_qa)) { echo "checked"; } ?>> No
																		</small>
																	</p>
																</label>
																
																<?php
																}
																echo '</div>';
														} ?>
                                                    </div> 
                                                </div> 
                                            </div>
											
                                        </div>
                                    </div>
                                    <!--  End step 3 -->


                                    <div class="tab-pane" id="step4">   
                                        <center>
                                            <img src="<?php echo base_url();?>assets/img/steps/step4.png" style="width: 300px;"/>
                                        </center>                                     
                                        <h4 class="info-text"> Exporting Documentation Requirements </h4>
                                        <div class="row"> 

                                        	<div class="col-sm-12"> 
                                                <div class="col-sm-12"> 
                                                    <div class="form-group">
                                                        <label>The following are the exporting documentation requirements smartly picked by the STRIVE system based on your business and target country. Please check those with which you are familiar and have already complied:</label>
                                                    </div> 

													<div class="list-group">
  
                                                    <?php foreach ($result_docs as $row_doc){
											    	?>
														<label class="list-group-item">
															<input class="form-check-input me-1" type="checkbox" value="<?php echo $row_doc['doc_id'];?>" name="document_id[]"  <?php if (in_array($row_doc['doc_id'], $my_docs)) { echo "checked"; } ?>>
															<?php echo $row_doc['doc_name'];?>
															<br>
															<p style="margin-left:1.8em;"><small><?php echo $row_doc['doc_description'];?></small></p>
														</label>

													<?php
													} ?>
													</div>
                                                </div> 
                                            </div>


                                            <div class="col-sm-12">
                                                <div class="col-sm-12"> 
                                                    <p>
                                                        <label><strong>Terms and Conditions</strong></label>
                                                        By submitting the form, you agree to the processing of your business information, including industry, category of inclusion, export readiness information, and familiarity with export documentation requirements, by the STRIVE system. This consent allows us to generate an export readiness report based on the provided data.
                                                    </p>

                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" class="form-control required"  name="terms" checked/> <strong>Accept Terms and Conditions</strong>
                                                        </label>
                                                    </div> 
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" class="form-control" name="allow_public" <?php if ($result['b_public'] == 1) { echo "checked"; } ?>/> <strong>Allow my MSME business to be included in the STRIVE Public Directory</strong>
                                                        </label>
                                                    </div> 

                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <!--  End step 4 -->

                                </div>

                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-primary' name='next' value='Next' />
                                        <input type='button' class='btn btn-finish btn-primary ' name='finish' value='Finish' id="submit_assessment"/>
                                    </div>

                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-default' name='previous' value='Previous' />
                                    </div>
                                    <div class="clearfix"></div>                                            
                                </div>	
                            </form>
                        </div>
                        <!-- End submit form -->
                    </div> 
                </div>
            </div>
        </div>

<div class="page-head"> 
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Good Day! <span class="red strong"><?php echo SYSTEM_NAME;?> MSME Partner</span></h1>               
            </div>
        </div>
    </div>
</div>
<!-- End page header --> 


<div class="content-area user-profiel" style="background-color: #FCFCFC;">&nbsp;
        <div class="container">   
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 profiel-container">

                    <form method="post" action="" id="form_profile" class="form">
                        <div class="profiel-header">
                            <h3>
                                BUILD YOUR <b><?php echo SYSTEM_NAME;?></b> PROFILE <br>
                                <small>This information will let us know more about you.</small>
                            </h3>
                            <hr>
                        </div>
                        <div class="clear">
                            <div class="col-sm-3 col-sm-offset-1">
                                <div class="picture-container">
                                    <div class="picture">
                                        <img src="<?php echo $result['b_photo']; ?>" class="picture-src" id="wizardPicturePreview" title=""/>
                                        <input type="file" id="wizard-picture">
                                    </div>
                                    <h6>Choose Picture</h6>
                                </div>
                            </div>

                            <div class="col-sm-3 padding-top-25">
                                <div class="form-group">
                                    <label>First Name <small>(required)</small></label>
                                    <input name="firstname" type="text" class="form-control required" placeholder="First Name" value="<?php echo $result['user_fname']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-3 padding-top-25">
                                
                                <div class="form-group">
                                    <label>Last Name <small>(required)</small></label>
                                    <input name="lastname" type="text" class="form-control required" placeholder="Last Name" value="<?php echo $result['user_lname']; ?>">
                                </div> 
                            </div>  


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Business Name <small>(required)</small></label>
                                    <input name="b_name" type="text" class="form-control required" placeholder="Complete Business Name" value="<?php echo $result['b_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Country of Origin <small>(required)</small></label>
                                    <select name="b_country" class="form-control required">
                                    	<option value="">- Select Country -</option>
                                    	<?php foreach ($result_country as $row){
                                    	?>
                                    	<option value="<?php echo $row['country_id'];?>" <?php if($row['country_id'] == $result['b_country']) echo 'selected'; ?>><?php echo $row['country_name']?></option>
                                    	<?php
                                    	} ?>
                                    </select>
                                </div>
 
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Business Email</label>
                                    <input name="b_email" type="text" class="form-control required" placeholder="Business Email" value="<?php echo $result['user_email']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                
                                <div class="form-group">
                                    <label>Business Contact Number</label>
                                    <input name="b_contact" type="text" class="form-control required" placeholder="Business Contact Number" value="<?php echo $result['b_contact']; ?>">
                                </div> 
                            </div> 

                            <div class="col-sm-9 col-sm-offset-1">


                                <div class="form-group">
                                    <label>Target Country for Export <small>(required)</small></label>
                                    <select name="b_target" class="form-control required">
                                        <option value="">- Select Country -</option>
                                        <option value="0" <?php if(0 == $result['b_target']) echo 'selected'; ?>>(Any Country)</option>
                                        <?php foreach ($result_country as $row){
                                        ?>
                                        <option value="<?php echo $row['country_id'];?>" <?php if($row['country_id'] == $result['b_target']) echo 'selected'; ?>><?php echo $row['country_name']?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Business Information <small>(required)</small></label>
                                    <textarea  name="b_info" class="form-control required" placeholder="Provide a short description of your business" rows="3"><?php echo $result['b_info']; ?></textarea>
                                </div>
                            </div>
                        </div>
                
                        <div class="col-sm-5 col-sm-offset-1">
                            <br>
                            <input type='button' class='btn btn-finish btn-primary' name='save_profile' id='save_profile' value='Save' />

                        <br>
                        <br>
                        <br>
                        </div>
                </form>

            </div>
        </div><!-- end row -->

    </div>
</div>

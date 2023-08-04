                            <form action="<?php echo base_url();?>search/result" method="get" class=" form-inline" id="smart_search">
                                <button class="btn  toggle-btn" type="button"><i class="fa fa-bars"></i></button>

                                <div class="form-group">                                   
                                    <select class="selectpicker required" data-live-search="true" data-live-search-style="begins" name="industry_id">
                                        <option value="0">All Industry</option>
                                        <?php foreach ($result_industry as $row_ind){
                                        ?>
                                        <option value="<?php echo $row_ind['industry_id'];?>" <?php if($this->input->get('industry_id') == $row_ind['industry_id']) echo 'selected'; ?>><?php echo $row_ind['industry_name']?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">                                   
                                    <select class="selectpicker" data-live-search="true" data-live-search-style="begins" name="country_origin">
                                        <option value="0">All Countries (Origin)</option>
                                        <?php foreach ($result_country as $row){
                                        ?>
                                        <option value="<?php echo $row['country_id'];?>" <?php if($this->input->get('country_origin') == $row['country_id']) echo 'selected'; ?>><?php echo $row['country_name']?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">                                   
                                    <select class="selectpicker" data-live-search="true" data-live-search-style="begins" name="country_target">
                                        <option value="0">All Countries (Target)</option>
                                        <?php foreach ($result_country as $row){
                                        ?>
                                        <option value="<?php echo $row['country_id'];?>" <?php if($this->input->get('country_target') == $row['country_id']) echo 'selected'; ?>><?php echo $row['country_name']?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </div>
                                <button class="btn search-btn" type="submit"><i class="fa fa-search"></i></button>

                                <div style="display: none;" class="search-toggle">

                                    <div class="search-row">
                                        <?php foreach ($result_category as $row_cat){
                                        ?>

                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="category_id[]" value="<?php echo $row_cat['category_id'];?>" <?php if (in_array($row_cat['category_id'], $my_categories)) { echo "checked"; } ?>> <?php echo $row_cat['category_name'];?>
                                                </label>
                                            </div>
                                        </div>

                                        <?php
                                        } ?>
                                        
                                    </div>
                           
                                    <button class="btn search-btn prop-btm-sheaerch" type="submit" id="submit_search"><i class="fa fa-search"></i></button>  
                                </div>                    

                            </form>

        <div class="content-area user-profiel" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">   
                <div class="row">
                    <a href="<?php echo base_url();?>report" class="pull-left col-sm-10 col-sm-offset-1" ><i class="fa fa-arrow-left"></i> Back to My Assessment Reports</a>
                    <br>
                    <br>
                    <div class="col-sm-10 col-sm-offset-1 profiel-container" style="text-align: justify;">
                            <div class="col-sm-10 col-sm-offset-1">
                                <a href="javascript:window.print()"><button class="navbar-btn nav-button login pull-right" ><i class="fa fa-print"></i> Print</button></a>
                            </div>
                            <div class="clear">
                            <div class="profiel-header">
                                <center>
                                    <img src="<?php echo base_url();?>assets/img/steps/report.png" style="width: 200px;"/>
                                </center>
                                <h3>
                                    MSME EXPORT READINESS <b>ASSESSMENT</b> REPORT <br>
                                    <small>We are pleased to present your Exporting Assessment Report,<br>which provides a comprehensive evaluation of your readiness for international trade.<br>Here is a summary of the key findings:</small>
                                </h3>
                                <hr>
                            </div>

                            <div class="clear">
                                <div class="col-sm-10 col-sm-offset-1">

                                    <table class="table" style="text-align: justify; text-justify: inter-word;">
                                      <tbody>
                                        <tr>
                                          <th>Name of Business</th>
                                          <td><?php echo $result_user['b_name'];?></td>
                                        </tr>
                                        <tr>
                                          <th>Industry</th>
                                          <td><?php echo $result_user['industry_name'];?></td>
                                        </tr>
                                        <tr>
                                          <th>Country Origin</th>
                                          <td><?php echo $result_user['orig_country'];?></td>
                                        </tr>
                                        <tr>
                                          <th>Target Country to Export</th>
                                          <td><?php echo $result_user['target_country'];?></td>
                                        </tr>
                                        <tr>
                                          <th>Overall</th>
                                          <td><?php echo number_format($result_overall['grade'],0);?>% : <?php echo $result_overall['grade_name'];?></td>
                                        </tr>
                                        <tr>
                                          <th>Assessment Date</th>
                                          <td><?php echo date("F j, Y h:i:s A", strtotime($result_ass['date_completed'])); ?></td>
                                        </tr>
                                        <tr>
                                          <th>Summary</th>
                                          <td>The Exporting Assessment Report for <?php echo $result_user['b_name'];?>, <?php echo $result_user['industry_name'];?> MSME based in the <?php echo $result_user['orig_country'];?>, reveals an <?php echo $result_overall['grade_name'];?> readiness for export to the target country of <?php echo $result_user['target_country'];?>. The assessment indicates a level of preparedness across various aspects.
                                          The report covers key areas such as product/service readiness, market readiness, financial readiness, operational readiness, legal and regulatory readiness, and organizational readiness.</td>
                                        </tr>
                                        <tr>
                                          <th>Recommendation</th>
                                          <td><?php echo $result_overall['grade_description'];?></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <div class="form-group">
                                        <?php foreach ($result_q_cat as $row_qcat){
                                                ?>
                                                <img class="pull-right" src="<?php echo base_url();?>assets/img/steps/<?php echo $row_qcat['img'];?>" style="width: 100px;"/>
                                                
                                                <h4 class="s-property-title"><?php echo $row_qcat['qcat_name'];?></h4>


                                                <?php 
                                                $qa = $this-> database_model->selectonequery('SELECT (SUM(uq_is_yes)/COUNT(*))*100 AS grade, (SELECT grade_name FROM r_grade WHERE (SUM(uq_is_yes)/COUNT(*))*100 BETWEEN grade_min AND grade_max) as grade_name FROM r_user_question AS A LEFT JOIN r_question_detail AS B ON A.uq_question_id = B.q_id WHERE uq_orig_country = '.$orig_country.' AND uq_target_country = '.$target_country.' AND uq_user_id = '.$user_id.' AND B.q_cat_id = '.$row_qcat['qcat_id']);

                                                ?>
                                                <ul>
                                                    <li><strong>Assessment Result:</strong> <?php echo $qa['grade_name']; ?></li>
                                                    <li><strong>Grade:</strong> <?php echo number_format($qa['grade'],2); ?>%</li>
                                                    <li>

                                                        <?php if($qa['grade'] == 100) { echo '<strong>Conclusion: </strong> '.$row_qcat['q_cat_positive']; }
                                                        else {
                                                            echo '<strong>Recommendation: </strong>';
                                                            $result_q = $this-> database_model->selectquery('SELECT uq_question_id, B.q_action FROM r_user_question AS A LEFT JOIN r_question_detail AS B ON A.uq_question_id = B.q_id WHERE uq_orig_country = '.$orig_country.' AND uq_target_country = '.$target_country.' AND uq_user_id = '.$user_id.' AND A.uq_is_yes = 0 AND B.q_cat_id = '.$row_qcat['qcat_id']);
                                                            foreach ($result_q as $row_q){
                                                                echo $row_q['q_action'].' ';
                                                            }
                                                        }
                                                        
                                                        ?>

                                                    </li>
                                                </ul>
                                                <hr>
                                                <?php
                                        } ?>
                                    </div>

                                    <div class="profiel-header">
                                        <h4 class="s-property-title">
                                            Exporting Documentation Requirements
                                        </h4>
                                    </div>
                                    <table class="table" style="text-align: justify; text-justify: inter-word;">
                                      <tbody>
                                        <thead>
                                            <th style="width: 30%;">Documentary Requirement</th>
                                            <th>Action</th>
                                            <th>Link</th>
                                        </tr>
                                        </thead>
                                        <?php foreach ($result_docs as $row_docs){?>
                                        <tr>
                                            <td><?php echo $row_docs['doc_name'];?></td>
                                            <td><?php echo $row_docs['doc_action'];?></td>
                                            <td><h4><a href="<?php echo $row_docs['doc_link'];?>" target="_blank"><i class="fa fa-external-link"></i></a></h4></td>
                                        </tr>
                                        <?php } ?>
                                      </tbody>
                                    </table>
                                    
                                    <div class="form-group">
                                        <p>Remember that compliance with exporting documentation requirements is crucial to ensure a smooth and successful export transaction. Seek guidance from local customs authorities, freight forwarders, or trade associations to navigate specific requirements and regulations associated with your export operations.</p>
                                    </div> 
                                </div>
                                
                            </div>
 
                    

                </div>
            </div><!-- end row -->

        </div>
    </div>

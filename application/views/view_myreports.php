
<div class="page-head"> 
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">My <span class="red strong">Assessment Reports</span></h1>               
            </div>
        </div>
    </div>
</div>
<!-- End page header --> 


<div class="content-area user-profiel" style="background-color: #FCFCFC;">&nbsp;
        <div class="container">   
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 profiel-container">

                        <div class="profiel-header">
                            <h3>
                                EXPORT READINESS <b>ASSESSMENT REPORTS</b><br>
                                <small>List of all your existing Assessment Reports</small>
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
                                    </table>


                            	<table class="table" style="text-align: center;">
                                  <tbody>
                                    <thead>
                                        <th style="text-align: center;">Report ID</th>
                                        <th style="text-align: center;">Origin Country</th>
                                        <th style="text-align: center;">Target Country</th>
                                        <th style="text-align: center;">Date Taken</th>
                                        <th style="text-align: center;">Status</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    if (count($result_ass) < 1 ) echo '<tr><td colspan="5">You do not have any assessment report yet. Start here now <br><a href="'.base_url().'assessment"><button class="navbar-btn nav-button login" ><i class="fa fa-edit"></i> Readiness Assessment</button></a></td> </tr>';
                                    foreach ($result_ass as $row_ass){?>
                                    <tr>
                                        <td><?php echo $row_ass['assessment_id'];?></td>
                                        <td><?php echo $row_ass['orig_country_name'];?></td>
                                        <td><?php echo $row_ass['target_country_name'];?></td>
                                        <td><?php echo $row_ass['date_completed'];?></td>
                                        <td><a href="<?php echo base_url();?>report/view/<?php echo encryptthis($row_ass['origin_country']);?>/<?php echo encryptthis($row_ass['target_country']);?>"><i class="fa fa-external-link"></i> View</a></td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>

                            </div>
                        </div>
                

            </div>
        </div><!-- end row -->

    </div>
</div>

<?php $jobs = $this->session->userdata('job_detail'); ?>
<div class="visible-xs vert-offset-top-5"></div>
<div class="visible-sm vert-offset-top-8"></div>
<div class="visible-lg visible-md hidden-xs vert-offset-top-5"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container">
            <?php if($jobs) {
                foreach($jobs as $job) {
                    $Vidresume = $job['job_video_url'];
                    if($job['job_posted'] == "off") {
                        $jobPost = '[<font color="red">DRAFT</font>]';
                    } else {
                        $jobPost = '';
                    }
            ?>
                <div class="row">
                    <div class="col-xs-12 col-md-7 col-lg-7">
                        <h2><?php echo $job['job_title']; ?> <?php echo $jobPost; ?></h2>
                        <p><?php echo $job['job_primaryworklocation_city'].",".$job['job_primaryworklocation_country']; ?></p>
                        <p><strong>Job Category / Function:</strong> <?php echo $job['job_category'].",".$job['job_function']; ?></p>
                        <p><strong>Job Industry / Sub-Industry:</strong> <?php echo $job['job_industry'].",".$job['job_sub_industry']; ?></p>
            <?php
                        if($job['job_posted'] == "on") {
                            echo '<p><strong>Posted on:</strong> '.date("d-M-Y",strtotime($job['job_postdate'])).'</p>';
                        } else {
                            echo '';
                        }
            ?>                        
                        <p><strong>Salary:</strong> <?php echo $job['job_minsalary_currency']." ".$job['job_minmonth_salary']." - ".$job['job_maxsalary_currency']." ".$job['job_maxmonth_salary']; ?></p>
                        <p><strong>Mandatory Skills:</strong> <?php echo $job['job_mandatory_skills']; ?></p>
                        <p><strong>Desired Skills:</strong> <?php echo $job['job_desired_skills']; ?></p>
                    </div>
                    <div class="col-md-5 col-lg-5">
                        <?php if( $Vidresume != "" || !empty($Vidresume) ) { ?>
                            <video controls class="col-xs-12 col-md-12 col-lg-12" preload="auto" height="auto">
                                <source src="<?php echo base_url()."public/recruiter/".$job['job_video_url']; ?>" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"' />
                                Your browser does not support the video tag.
                            </video>
                        <?php } else { ?><br />
                            <img src="/images/no-video-pic.jpg" style="border: 1px solid black;" class="col-xs-12 col-md-12 col-lg-12" />
                        <?php } ?>
                    </div>
                </div><br />
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <p><strong>Job Description:</strong></p>
                        <p><?php echo html_entity_decode($job['job_description']);?></p><br />
                        <p><strong>Benefits:</strong></p>
                        <p><?php echo $job['job_benefits'];?></p><br />
                        <p><strong>Working Hours:</strong></p>
                        <p><?php echo $job['job_workinghours'];?></p>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <?php } else { ?>
                        <div class="col-xs-12">
                            <h3>This job does not exist (or) you typed the wrong URL.</h3>
                        </div>
                    <?php } ?>                
                </div>
            </div>
        </div>
    </div>
</div>
<?php $jobs = $this->session->userdata('job_detail'); ?>
<style type="text/css">
    table { margin:auto; border-collapse: collapse; text-align:center; font-size: 15px; }
    .table-bordered>tbody>tr>td, .table-bordered>thead>tr>td  {
        width:80px; height:80px;
        border:1px solid #999;
        vertical-align:middle;
        text-align:center;
    }
    .table-bordered>tbody>tr>th, .table-bordered>thead>tr>th {
        width:80px; height:80px;
        border:1px solid #999;
        vertical-align:middle;
        text-align:center;
        background-color: #ffd300;
        font-size:30px;
    }
    .days { font-weight: bold; font-size:20px; }
    .content { font-size: 10px; }
    .badge { white-space: normal !important; font-size:20px; }
</style>
<div class="site-content" >
    <div class="container page-header">
        <div class="row">
            <div class="col-md-6 no-padding">
                <h1 class="page-title font-1">Calendar</h1>
            </div>
            <div class="col-md-6 no-padding">
            	<div class="subpage-breadcrumbs">
            		<a href="<?php echo https_url($this->lang->lang().'/recruiter/export_calendar'); ?>" target="_blank">Export as CSV</a>
            	</div>
            </div>
        </div>
    </div>
    <div class="page-content container">
        <div class="row candidate-attribute">
            <div class="col-md-12 ">
                <?php echo $calendar; ?>
            </div>
        </div> <!-- end row -->
    </div>
    <div class="clearfix"></div>
</div> <!-- end site-content -->
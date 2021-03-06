<?php $applnOffer_actionurl = $this->lang->lang().'/recruiter/applicant_offer_action'; ?>
<script type="text/javascript" src="/js/recruiter/applicant_tracking/recruiter_applicantOffer.js" defer="true"></script>
<script type="text/javascript" src="/js/bootstrap-datepicker.min.js" defer="true"></script>
<script src="/js/bootstrap/bootstrap-wysiwyg.js" defer="true"></script>
<script src="/js/bootstrap/jquery.hotkeys.js" defer="true"></script>
<script src="/js/bootstrap/google-code-prettify.js" defer="true"></script>
<link href="/css/bootstrap-datepicker3.min.css" rel="stylesheet"/>
<div class="vert-offset-top-5 visible-lg visible-md"></div>
<div class="vert-offset-top-10 visible-sm"></div>
<input type="hidden" id="applnOfferAction" value="<?php echo https_url($applnOffer_actionurl); ?>" />
<div class="site-content" >

	<div class="container page-header">
		<div class="row">
			<div class="col-md-6 no-padding">
				<h1 class="page-title font-1"><?=lang('candidateJob.offerlbl1');?></h1>
			</div>
			<div class="col-md-6 no-padding"></div>
		</div>
	</div>
    
    <div class="page-content container">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <?php
                    $tmpuserData = array('username' => $this->session->userdata('recruiter_login') );
                    $userData = $this->login_database->read_user_information($tmpuserData,'employer'); 
                    $candidId = $this->uri->segment(4);
                    $jobRefId = $this->uri->segment(5);
                    $jobDet = $this->login_database->read_job_information( $jobRefId );
                    $condition = "candidate_coderefs_id ='".$candidId."'";
                    $this->db->select('*');
                    $this->db->from('candidate_signup');
                    $this->db->where($condition);
                    $query = $this->db->get();
                    if ($query->num_rows() > 0) { $candidDet = $query->result_array(); } else { $candidDet = ''; }
                    //print_r($candidDet);                            
                ?>
                <input type="hidden" id="intvwRecruiterName" value="<?php echo $userData[0]['employer_contact_firstname']." ".$userData[0]['employer_contact_lastname']; ?>" />
                <input type="hidden" id="intvwRecruiterEmail" value="<?php echo $userData[0]['employer_contact_email']; ?>" />
                <input type="hidden" id="intvwJobRefId" value="<?php echo $jobRefId; ?>" />
                <input type="hidden" id="intvwJobName" value="<?php echo $jobDet[0]['job_title']; ?>" />
                <input type="hidden" id="intvwCandidateId" value="<?php echo $candidDet[0]['candidate_coderefs_id']; ?>" />
                <input type="hidden" id="intvwCandidateName" value="<?php echo $candidDet[0]['candidate_lastname']." ".$candidDet[0]['candidate_firstname']; ?>" />
                <div id="collapseOne" class="panel-collapse collapse-in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true">
                    <span id="modal-error-msg" style="color: red; text-align:center;"></span>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="email">Job Name: </label>
                            </div>
                            <div class="col-md-6">
                                <label for="jobtitle"><?php echo $jobDet[0]['job_title']; ?></label>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-3">
                                <label for="email">Email To: </label>
                            </div>
                            <div class="col-md-6">
                                <?php echo $candidDet[0]['candidate_lastname']." ".$candidDet[0]['candidate_firstname']; ?>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-3">
                                <label for="email">Email Subject: <font color='red' size='4px'>*</font> </label>
                            </div>
                            
                            <div class="col-md-6">
                                <input type="text" id="candidEMailSubject" value="<?php echo "Offer of Employment - ".$jobDet[0]['job_title']."";?>" placeholder="Enter Email subject here" required />
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-3">
                                <label for="email">Email Body: <font color='red' size='4px'>*</font> </label>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
                                    <div class="btn-group">
                                        <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                        <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                        <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                        <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                        <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                                        <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-indent-left"></i></a>
                                        <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent-right"></i></a>
                                    </div>
                                </div><br />
                                <div id="editor" name="inputOfferEmailBody"></div>
                                <div id="inputoffertmpl" name="inputoffertmpl" style="display: none;">
                                    <?php
                                        $condition = "employer_contact_email ='".$this->session->userdata('recruiter_login')."'";
                                        $this->db->select('template_offer');
                                        $this->db->from('grabtalent_template');
                                        $this->db->where($condition);
                                        $query = $this->db->get();
                                        if ($query->num_rows() > 0) { $tmploffer = $query->result_array(); } else { return false; } 
                                        if($tmploffer) {
                                            foreach($tmploffer as $tmpl_offer) { 
                                                echo $tmpl_offer['template_offer'];
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer" style="text-align: center;">
                        <button id="OffrstgeEmail_updBtn" class="btn btn-primary" type="button">Confirm and Send email</button>
                        <button type="reset" class="btn btn-danger" title="<?=lang('recruiterlogin.companyprofresetBtn');?>"><?=lang('recruiterlogin.companyprofresetBtn');?></button>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- Modal Dialog - Start -->
<div class="modal fade bs-example-modal-xs" id="OfferstageUpdModal" tabindex="-1" role="dialog" aria-labelledby="OfferstageUpdModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">Message</div>
            <div class="modal-body"><h5 class="modal-title"></h5></div>
            <div class="modal-footer"><button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button></div>
        </div>
    </div>
</div>
<!-- Modal Dialog - End -->
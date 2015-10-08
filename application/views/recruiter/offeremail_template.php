<?php $offtmplupd_url = $this->lang->lang().'/recruiter/offeremail_templupdate'; ?>
<script src="/js/bootstrap/bootstrap-wysiwyg.js" defer="true"></script>
<script src="/js/bootstrap/jquery.hotkeys.js" defer="true"></script>
<script src="/js/bootstrap/google-code-prettify.js" defer="true"></script>
<div class="visible-xs vert-offset-top-5"></div>
<div class="visible-sm vert-offset-top-8"></div>
<div class="visible-lg visible-md hidden-xs vert-offset-top-5"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container">
            <div class="alert alert-success" id="modal-error-msg" role="alert" style="display: none;"></div>
            <form enctype="multipart/form-data">
                <input type="hidden" id="inputofferEmailUpdUrl" value="<?php echo https_url($offtmplupd_url); ?>" />
                <?php
                    $empDet = $this->login_database->read_user_information( 
                        array('username' => $this->session->userdata('logged_in')), 'employer' 
                    );
                ?>
                <input type="hidden" id="inputintvwEmailContact" value="<?php echo $this->session->userdata('logged_in'); ?>" />
                <input type="hidden" id="inputintvwEmailCtnctCode" value="<?php echo $empDet[0]['employer_code']; ?>" />
                <input type="hidden" id="inputintvwEmailCtnctName" value="<?php echo $empDet[0]['employer_name']; ?>" />
                <?php
                    $condition = "employer_contact_email ='".$this->session->userdata('logged_in')."'";
                    $this->db->select('template_offer');
                    $this->db->from('grabtalent_template');
                    $this->db->where($condition);
                    $query = $this->db->get();
                    if ($query->num_rows() > 0) { $tmploffr = $query->result_array(); } else { return false; } 
                    if($tmploffr) {
                        foreach($tmploffr as $tmpl_offr) {
                ?>
                <div class="row">                    
                    <h3><b><img src="/images/icons/profile.png" alt="" title="" height="50px" /> Create / Edit Offer Template</b></h3>
                    <p>While creating template, please use the below legends in order to map candidate details</p>
                    <ol>
                        <li>{candidate_name} - Candidate Name</li>
                        <li>{job_title} - Job Title</li>
                        <li>{employer_name} - Employer Name</li>
                        <li>{employer_email} - Employer Email Address</li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
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
                        <div id="editor" name="inputOfferTemplatetxtEdit"><?php echo $tmpl_offr['template_offer']; ?></div>
                    </div>
                </div><br />
                <div class="row">
                    <div class="col-lg-12 col-md-12" style="text-align: center;">
                        <button class="btn btn-primary" type="button" id="btnSaveoffrtmplate">Save</button>
                        <button class="btn btn-danger" type="button" onclick="window.location.reload()">Reset</button>
                    </div>
                </div>
                <?php 
                    }
                } else { ?>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
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
                            <div id="editor" name="inputOfferTemplatetxtCreate"><?php echo $tmpl_offr['template_offer']; ?></div>
                        </div>
                    </div><br />
                    <div class="row">
                        <div class="col-lg-12 col-md-12" style="text-align: center;">
                            <button class="btn btn-primary" type="button" id="btnCreateoffrtmplate">Create</button>
                            <button class="btn btn-danger" type="button" onclick="window.location.reload()">Reset</button>
                        </div>
                    </div>
                <?php } ?>
            </form>
        </div>        
    </div>
</div>
<script type="text/javascript">
$(function(){
    $("#editor").wysiwyg();
    $("#btnSaveoffrtmplate").on('click',function(){
        
        $.ajax({
            type        : 'POST',
            url         : $('#inputofferEmailUpdUrl').val(),
            data        : { 'templateOffer': $('div[name*="inputOfferTemplatetxtEdit"]').html(), 'employerEmail' : $('#inputofferEmailContact').val(), 'method': 'edit' }, // our data object
            crossDomain : true 
        })
        .done(function(data) {
            var response = data.split(';');
            $("#modal-error-msg").css("display","block").html(response[1]).delay(1000).fadeOut('slow');
            setTimeout(function() { window.location.reload(true); }, 2000 );
        })
        .fail(function(data) {
            $("#getCode").html("Something went wrong, Please try again!.");
            $("#getMsgModal").modal('show');
        });
        
    });
    
    $("#btnCreateoffrtmplate").on('click',function(){
        
        $.ajax({
            type        : 'POST',
            url         : $('#inputofferEmailUpdUrl').val(),
            data        : { 'employerName': $('#inputintvwEmailCtnctName').val(), 'employerCode': $('#inputintvwEmailCtnctCode').val(),'templateOffer': $('div[name*="inputOfferTemplatetxtCreate"]').html(), 'employerEmail' : $('#inputofferEmailContact').val(), 'method': 'create' }, // our data object
            crossDomain : true 
        })
        .done(function(data) {
            var response = data.split(';');
            $("#modal-error-msg").css("display","block").html(response[1]).delay(1000).fadeOut('slow');
            setTimeout(function() { window.location.reload(true); }, 2000 );
        })
        .fail(function(data) {
            $("#getCode").html("Something went wrong, Please try again!.");
            $("#getMsgModal").modal('show');
        });
        
    });
});
</script>
$(function(){$("#JobstatusupdateModal").on("show.bs.modal",function(t){var a=$(t.relatedTarget),o=a.attr("title"),e=$(this);e.find('.modal-body input[name="jobUpd-refCode"]').val(o)}),$("#JobstatusupdateModal").on("hide.bs.modal",function(){window.location.reload(!0)}),$("button#jobstatusUpd_btnsave").click(function(t){var a=$(this).html(),o=$("input[name='jobUpd-refCode']").val(),e=$("#jobstatusupd_comments").val(),d=$("#inputjobdeactUrl").val();$(this).html("<img src='/images/loading.gif' width='20px' height='20px'/>").attr("disabled","disabled"),$.ajax({type:"POST",url:d,data:{JobUpdId:o,jobStatusComments:e},crossDomain:!0}).done(function(t){var o=t.split(":");"success"==o[0]&&($("#modal-error-msg").html(o[1]),$("#modal-error-msg").delay(1500).fadeOut("slow",function(){$("button#jobstatusUpd_btnsave").html(a),$("#JobstatusupdateModal").modal("toggle")}))}).fail(function(){$("#modal-error-msg").text("Something went wrong, Please try again!.")}),t.preventDefault()})});
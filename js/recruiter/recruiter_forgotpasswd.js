$(function(){$("form").submit(function(t){var e=$("#recruiterforgotpwd_url").val(),a={email:$("#inputemailaddress").val()},o=$("#button-submit-password").text();$("#button-submit-password").html("<img src='/images/loading.gif' width='25px' height='25px'/>").attr("disabled","disabled"),$.ajax({type:"POST",url:e,data:a,crossDomain:!0}).done(function(t){var e=t.split(";");$("#getCode").html(e[1]),$("#getMsgModal").modal("show"),$("#button-submit-password").html(o).removeAttr("disabled")}).fail(function(){$("#getCode").html("Something went wrong, Please try again!."),$("#getMsgModal").modal("show"),$("#button-submit-password").html(o).removeAttr("disabled")}),$(this).trigger("reset"),t.preventDefault()})});
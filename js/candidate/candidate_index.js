$(function(){$("form").submit(function(a){var n=$("#inputCandLoginURL").val();$("#button-sign-in").html("<img src='/images/loading.gif' width='25px' height='25px'/>").attr("disabled","disabled");var i={emailaddress:$("#inputemailaddress").val(),password:$("#inputpassword").val()};$.ajax({type:"POST",url:n,data:i}).done(function(a){var n=a.split(";");"failure"==n[0]?($("#getCode").html(n[1]),$("#candIndexModal").modal("show"),$("#button-sign-in").html("Sign-in").removeAttr("disabled")):window.location=n[1]}).fail(function(){$("#getCode").html("Something went wrong, Please try again!."),$("#candIndexModal").modal("show")}),a.preventDefault()})});
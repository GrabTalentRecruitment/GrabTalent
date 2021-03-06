$(function() {
    var e = $("#button-job-create").text();
    $("#editor").wysiwyg(), $("#inputJobMinSalary, #inputJobMaxSalary").unbind("keyup change input paste").bind("keyup keypress change input paste", function(e) {
        return !(8 != e.which && 0 != e.which && (e.which < 48 || e.which > 57) && 46 != e.which)
    }), $("form").submit(function(t) {
        if (null != $("#response").html()) {
            $("#response").html()
        } else;
        var a = $("#inputjobCreateUrl").val();
        if ($("#button-job-create").html("<img src='/images/loading.gif' width='25px' height='25px'/>").attr("disabled", "disabled"), 0 == $("#inputJobMinSalCurrCode").val()) return $("#modal-window").css("display","block").find("#displayMsg").html("Please select all the mandatory fields"), $("#button-job-create").html(e).removeAttr("disabled"), setTimeout(function(){ $("#modal-window").hide(); }, 2000), !1;
        var o = desiredskills = 0;
        if (o = $("#inputJobMandatorySkl").val().length, 0 == o) return $("#modal-window").css("display","block").find("#displayMsg").html("Please select all the mandatory fields"), $("#button-job-create").html(e).removeAttr("disabled"), setTimeout(function(){ $("#modal-window").hide(); }, 2000), !1;
        var n = $("#editor").escapeHtml(),
            i = escape(n),
            l = $(this).serialize() + "&inputJobDescription=" + i;
            
        $.ajax({
            type: "POST",
            url: a,
            data: l,
            crossDomain: !0
        }).done(function(t) {
            var a = t.split(";");
            if ("failure" == a[0]) $("#modal-window").css("display","block").find("#displayMsg").html(a[1]);
            else {
                var o = a[0].split(":");
                $("#modal-window").css("display","block").find("#displayMsg").html(a[1]), $("#button-job-create").html(e).removeAttr("disabled"), setTimeout(function() {
                    window.location = o[1]
                }, 2500)
            }
        }).fail(function() {
            $("#modal-window").css("display","block").find("#displayMsg").html("Something went wrong, Please try again!."), $("#button-job-create").html(e).removeAttr("disabled"), setTimeout(function(){ $("#modal-window").hide(); }, 2000)
        }), t.preventDefault()
    }), $("#inputJobCategory").on("change", function(t) {
        var a = $("#inputjobFunctionUrl").val();
        $.ajax({
            type: "POST",
            url: a,
            data: {
                jobcatId: $(this).children(":selected").attr("id")
            },
            crossDomain: !0
        }).done(function(e) {
            $("#inputJobFunction").empty().append(e)
        }).fail(function() {
            $("#modal-window").css("display","block").find("#displayMsg").html("Something went wrong, Please try again!."), $("#button-job-create").html(e).removeAttr("disabled"), setTimeout(function(){ $("#modal-window").hide(); }, 2000)
        }), t.preventDefault()
    }), $("#inputJobIndustry").on("change", function(t) {
        var a = $("#inputjobSubIndustryUrl").val();
        $.ajax({
            type: "POST",
            url: a,
            data: {
                jobindusId: $(this).children(":selected").attr("id")
            },
            crossDomain: !0
        }).done(function(e) {
            $("#inputJobSubIndustry").empty().append(e)
        }).fail(function() {
            $("#modal-window").css("display","block").find("#displayMsg").html("Something went wrong, Please try again!."), $("#button-job-create").html(e).removeAttr("disabled"), setTimeout(function(){ $("#modal-window").hide(); }, 2000)
        }), t.preventDefault()
    }), $.fn.escapeHtml = function() {
        var e = navigator.userAgent,
            t = new RegExp("MSIE ([0-9]{1,}[.0-9]{0,})"),
            a = document.createElement("div"),
            o = "";
        return $(a).text($(this).val() || $(this).html() || $(this).text()), o = $(a).text(), null != t.exec(e) ? $(a).remove() : a.remove(), o.replace(/<\/?([a-z][a-z0-9]*)\b[^>]*>?/gi, "")
    }
});
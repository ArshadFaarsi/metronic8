function userStatusChange(id) {
    _token = $('meta[name="csrf-token"]').attr("content");
    var is_checked = 0;
    if ($("#user-status-" + id).prop("checked") == true) {
        is_checked = 1;
    }
    var url = ajxRoute.user_status_change;
    $.ajax({
        url: url,
        data: {
            _token: _token,
            id: id,
            selectedValue: is_checked,
        },
        type: "POST",
        dataType: "json",
        success: function (data) {
            if (data.code == 401) {
                window.location.href = ajxRoute.login;
            }
            if (data.status == 0) {
                $("#user-status-value-" + id)
                    .removeClass("badge-success")
                    .addClass("badge-danger")
                    .text("InActive");
            } else {
                $("#user-status-value-" + id)
                    .removeClass("badge-danger")
                    .addClass("badge-success")
                    .text("Active");
            }
        },
        beforeSend: function () { },
        complete: function () { },
        error: function (jqXHR, exception) {
            if (jqXHR.status === 0) {
            } else if (jqXHR.status >= 400) {
                window.location.reload();
            }
        },
    });
}
function getUserProfile(id) {
    _token = $('meta[name="csrf-token"]').attr("content");
    var url = ajxRoute.user_get_user;
    $.ajax({
        url: url,
        data: {
            _token: _token,
            id: id,
        },
        type: "GET",
        dataType: "json",
        success: function (response) {
            if (response && response.status == 401) {
                window.location.href = ajxRoute.login;
            }
            if (response && response.status == 200) {
                data = response.data;
                transaction = response.transaction;
                console.log(transaction);
                $("#_pr-usr-fname").text(data.name);
                $("#_pr-usr-env-email").attr("href", "mailto:" + data.email);
                $("#_pr-usr-name").text(data.name);
                $("#_pr-usr-email").text(data.email);
            }
        },
        beforeSend: function () {
            $("#model-loader").show();
        },
        complete: function () {
            $("#model-loader").hide();
        },
        error: function (jqXHR, exception) {
            if (jqXHR.status === 0) {
            } else if (jqXHR.status >= 400) {
                window.location.reload();
            }
        },
    });
}

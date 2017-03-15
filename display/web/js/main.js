$(document).ready(function () {
    setInterval(getStatusActivity, 5000);
});


function getStatusActivity()
{
    $.ajax({
        url: "/site/get-status",
        method: "GET",
        success: function(data){
            data = JSON.parse(data);
            if (data.status == true)
                location.href = "/";
        }
    });
}
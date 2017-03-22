$(document).ready(function () {
    setInterval(getReader, 500);
});

function getReader() {
    $.ajax({
        url: "/card-reader",
        method: "GET",
        success: function(data){
            var status = data.data.status;
            if (status == 1)
            {
                window.location.href = "/";
            }
        }
    });
}
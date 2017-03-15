$(document).ready(function () {
    setInterval(getAcceptor, 1000);
});

function getAcceptor() {
    $.ajax({
        url: "/bill-acceptor",
        method: "GET",
        success: function(data){
            var sum = data.data.sum;
            if (sum > 0)
            {
                $("#money-display").val(sum);
                disabledClose();
            }
        }
    });
}

function disabledClose()
{
    $(".close-btn").removeClass("active");
    $(".start-btn").addClass("active");
}

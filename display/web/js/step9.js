$(document).ready(function () {
    findCardServer();
});

function findCardServer() {
    $.ajax({
        url: "/card-reader/find-card",
        method: "GET",
        success: function(data){
            window.location.href = "/";
        }
    });
}
$(".btn-fuel").each(function (i, elem) {
    var id_address = $(elem).val();
    setInterval(getStatus, 1500, id_address, elem);
});

function getStatus(id_address, obj) {
    $.ajax({
        url: "/trk-address/view",
        method: "GET",
        data: {
            id: id_address
        },
        success: function(data){
            var status = data.data.status;

            $(obj).removeClass("up-icon");
            $(obj).removeClass("down-icon");

            if (status == 1)
                $(obj).addClass("down-icon");
            else
                $(obj).addClass("up-icon");
        }
    });

    return true;
}


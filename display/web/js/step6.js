$(document).ready(function () {
    validateBtn();

    $(".num").on("click", function () {
        if ($(this).is(".btn-grey"))
            return false;

        var num = $(this).val();

        var sum = $('#dvolume').val();
        sum = sum + num;

        $("#dvolume").val(sum);

        validateBtn();
    });

    $(".del").on("click", function () {
        var sum = $('#dvolume').val();
        sum = sum.substr(0, sum.length-1);

        $("#dvolume").val(sum);
        validateBtn();
    });

    $(".start-btn").on("click", function () {
        $("#svolume").val($("#dvolume").val());
        $("#volumePanel").submit();
        return false;
    });
});

function validateBtn() {
    var sum = $('#dvolume').val();

    var max_volume = $("#maxVolume").val() * 1;

    $(".num").each(function () {
        var val = $(this).val();

        var vsum = sum + val;
        if (vsum*1 > max_volume)
            $(this).addClass("btn-grey");
        else
            $(this).removeClass("btn-grey");
    });

    if (sum * 1 == 0)
        $(".num[value='0']").addClass('btn-grey');

    if (sum*1 > 0)
        $(".start-btn").addClass("active");
    else
        $(".start-btn").removeClass("active");
}

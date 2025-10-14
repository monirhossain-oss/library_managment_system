$(document).ready(function () {
    $(".open-menu").click(function () {
        $(".mobile-drawer").css("right", "0");
        $(".open-menu").hide();
        $(".close-menu").show();
    });

    $(".close-menu").click(function () {
        $(".mobile-drawer").css("right", "-250px");
        $(".close-menu").hide();
        $(".open-menu").show();
    });
});

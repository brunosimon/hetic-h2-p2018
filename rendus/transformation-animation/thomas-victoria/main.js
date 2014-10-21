$(document).ready(function () {
    $(".change").hover(function () {
        $(".cloud4").css("margin-top", "200px");
        $(".cloud5").css("margin-top", "200px");
        $(".cloud6").css("margin-top", "200px");
        $("body").css("background","#999999");
        $(".pluie1").css("opacity","1");
        $(".pluie2").css("opacity","1");
        $(".pluie3").css("opacity","1");

    });
    $(".change").mouseleave(function () {
        $(".cloud4").css("margin-top", "-200px");
        $(".cloud5").css("margin-top", "-200px");
        $(".cloud6").css("margin-top", "-200px");
        $("body").css("background","#6ecfff");
        $(".pluie1").css("opacity","0");
        $(".pluie2").css("opacity","0");
        $(".pluie3").css("opacity","0");
    });
});
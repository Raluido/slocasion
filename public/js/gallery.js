var prop = 50.0; // proporción alto/ancho*100 imagen principal
$("ul.obgaleria").each(function () {
    var id = "#" + $(this).attr("id");
    var ancho = 100 / $(id + " li").length;
    $("head").append(
        "<style>" +
            id +
            "{padding: 0 0 " +
            (prop + ancho) +
            "% 0;} " +
            id +
            " li{width:" +
            ancho +
            "%;padding: 0 0 " +
            ancho +
            "% 0;} " +
            id +
            " li:first-child {width: 100%;padding-bottom: " +
            prop +
            "%;}</style>"
    );
    $(id + " li:first-child")
        .clone()
        .prependTo(id);
    $(id + " li:first-child img").css({
        width: "100%",
    });
    $(id + " li").click(function () {
        $(id + " li:first-child").remove();
        $(this).clone().prependTo(id);
        $(id + " li:first-child img").animate(
            {
                width: "100%",
            },
            200
        );
    });
});

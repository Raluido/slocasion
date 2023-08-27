window.addEventListener("load", function () {
    $('.mobileMenuButton').on("click", function () {
        if ($('.mobileMenuLinks').hasClass('d-none')) {
            $('.mobileMenuLinks').removeClass('d-none');
            $('.mobileMenuLinks').addClass('d-block');
        } else {
            $('.mobileMenuLinks').removeClass('d-block');
            $('.mobileMenuLinks').addClass('d-none');
        }
    });
});
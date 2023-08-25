window.addEventListener("load", function () {
    this.window.addEventListener("click", function () {
        if ($('.mobileMenuLinks').hasClass('d-none')) {
            $('.mobileMenuLinks').removeClass('d-none');
            $('.mobileMenuLinks').addClass('d-block');
        } else {
            $('.mobileMenuLinks').removeClass('d-block');
            $('.mobileMenuLinks').addClass('d-none');
        }
    });
});
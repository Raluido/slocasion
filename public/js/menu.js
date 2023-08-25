window.addEventListener("load", function () {
    this.window.addEventListener("click", function () {
        if ($('.mobileMenuLinks').css('display', 'none')) {
            $('.mobileMenuLinks').css('display', 'block');
        } else {
            $('.mobileMenuLinks').css('display', 'none');
        }
    });
});
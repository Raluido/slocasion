window.onload = () => {
    let changeStateButton = document.querySelector('#changeStateButton');
    let car_soldOrBooked = document.querySelector('#car_soldOrBooked');
    let idCar = document.querySelector('#idCar').value;

    changeStateButton.addEventListener('click', () => {
        $.ajax({
            type: 'get',
            url: 'updatestatus/' + idCar + '/' + car_soldOrBooked.options[car_soldOrBooked.selectedIndex].text,
            success: function (data) {
                if (data == 'success') {
                }
            }

        })
    })
}
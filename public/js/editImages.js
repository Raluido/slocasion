const topHight = document.querySelector('input[name=topHight]');
bottomHight = document.querySelector('input[name=bottomHight]');
leftWidth = document.querySelector('input[name=leftWidth]');
rightWidth = document.querySelector('input[name=rightWidth]');
originalImg = document.querySelector('.innerImageCar img');
originalWidth = originalImg.clientWidth;
originalHeight = originalImg.clientHeight;
canvas = document.getElementById('canvas');
ctx = canvas.getContext("2d");

let canvaX = 0, canvaY = 0, canvaW = originalImg.clientWidth - 11, canvaH = originalImg.clientHeight - 99;

function reset() {
    ctx.fillRect(canvaX, canvaY, canvaW, canvaH);
    ctx.clearRect(canvaX, canvaY, canvaW, canvaH);
    ctx.strokeRect(canvaX, canvaY, canvaW, canvaH);
}

reset();


topHight.addEventListener("change", () => {
    canvaH = originalHeight - ((originalHeight / 100) * topHight.value);
    canvaY = (originalHeight / 100) * topHight.value

    ctx.fillRect(canvaX, canvaY, canvaW, canvaH);
    ctx.clearRect(canvaX, canvaY, canvaW, canvaH);
    ctx.strokeRect(canvaX, canvaY, canvaW, canvaH);
})

bottomHight.addEventListener("change", () => {

})

leftWidth.addEventListener("change", () => {

})

rightWidth.addEventListener("change", () => {

})

const sizeX = document.querySelector('input[name=sizeX]');
const sizeY = document.querySelector('input[name=sizeY]');
const moveX = document.querySelector('input[name=moveX]');
const moveY = document.querySelector('input[name=moveY]');
const originalImg = document.querySelector('.innerImageCar img');
const originalWidth = originalImg.clientWidth;
const originalHeight = originalImg.clientHeight;
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext("2d");

let x = 0, y = 0, w = originalWidth, h = originalHeight;
draw();

function draw() {
    ctx.clearRect(x, y, w, h);
    w = (originalWidth / 100) * sizeY.value;
    x = (moveX.value - 50) * (originalWidth / 100) * 2;
    h = (originalHeight / 100) * sizeX.value;
    y = (moveY.value - 50) * (originalHeight / 100) * 2;
    if (Math.abs(y) + h > originalHeight) {
        h = originalHeight - Math.abs(y);
    }
    if (Math.abs(x) + w > originalWidth) {
        w = originalWidth - Math.abs(x);
    }
    ctx.strokeRect(x, y, w, h);
    console.log(x);
    console.log(y);
    console.log(w);
    console.log(h);
}

sizeX.addEventListener("change", () => {
    draw();
})

sizeY.addEventListener("change", () => {
    draw();
})

moveX.addEventListener("change", () => {
    draw();
})

moveY.addEventListener("change", () => {
    draw();
})

const sizeX = document.querySelector('input[name=sizeX]');
const sizeY = document.querySelector('input[name=sizeY]');
const moveX = document.querySelector('input[name=moveX]');
const moveY = document.querySelector('input[name=moveY]');
const originalImg = document.querySelector('.innerImageCar img');
const originalWidth = originalImg.clientWidth - 12;
const originalHeight = originalImg.clientHeight - 114;
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext("2d");

let x = 0, y = 0, w = originalWidth, h = originalHeight;
draw();

function draw() {
    console.log(x);
    console.log(y);
    console.log(w);
    console.log(h);
    ctx.clearRect(x, y, w, h);
    h = (originalHeight / 100) * sizeX.value;
    w = (originalWidth / 100) * sizeY.value;
    y = moveY.value * (originalHeight / 100);
    x = moveX.value * (originalWidth / 100);
    ctx.strokeRect(x, y, w, h);
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

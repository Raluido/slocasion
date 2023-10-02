const addPhotosBtn = document.querySelector('.addPhotosBtn');
const addPhotosInput = document.querySelector('.addPhotosInput');
const imgPrev = document.querySelector('.imgPrev .innerImgPrev img');
const previous = document.querySelector('.previousPhoto');
const next = document.querySelector('.nextPhoto');
const cropOptions = document.querySelectorAll('.cropOptions div');
const cropRange = document.querySelector('.cropRange input');
const cropName = document.querySelector('.cropRange div');


let isMain = document.getElementById('isMain');
let cropTop = 0, cropBottom = 0, cropLeft = 0, cropRight = 0;
let cropMeasures = [];
let i = 0;
let y0 = 0, y1 = 0, x0 = 0, x1 = 0;

// change between the img added

addPhotosInput.addEventListener('change', function () {
    if (i == 0) {
        noCrop();
        addPrevImgZero();
        isMainFunc();
    }
})

previous.addEventListener('click', function () {
    if (i > 0) {
        i--;
        addPrevImg();
        isMainFunc();
    }
})

next.addEventListener('click', function () {
    if (i < addPhotosInput.files.length - 1) {
        i++;
        addPrevImg();
        isMainFunc();
    }
})

const noCrop = () => {
    cropMeasures = [];
    for (let i = 0; i < addPhotosInput.files.length; i++) {
        let data = {
            'id': i,
            'main': i == 0 ? true : false,
            'top': 0,
            'bottom': 0,
            'left': 0,
            'right': 0
        }
        cropMeasures.push(data);
    }
    document.getElementById('cropMeasures').value = JSON.stringify(cropMeasures);
}

const addPrevImgZero = () => {
    let file = addPhotosInput.files[0];
    if (!file) return;
    imgPrev.src = "";
    imgPrev.src = URL.createObjectURL(file);
}

const addPrevImg = () => {
    let file = addPhotosInput.files[i];
    if (!file) return;
    imgPrev.src = URL.createObjectURL(file);
    updateValues();
}

const isMainFunc = () => {
    if (cropMeasures[i].main == true) {
        isMain.checked = true;
    } else {
        isMain.checked = false;
    }
}

const updateValues = () => {
    if (cropMeasures.length > 0) {
        id = cropMeasures.findIndex(obj => obj.id == i);
        if (id >= 0) {
            cropTop = cropMeasures[id].top * (100 / imgPrev.clientHeight);
            cropBottom = cropMeasures[id].bottom * (100 / imgPrev.clientHeight);
            cropLeft = cropMeasures[id].left * (100 / imgPrev.clientWidth);
            cropRight = cropMeasures[id].right * (100 / imgPrev.clientWidth);
        } else {
            cropTop = 0;
            cropBottom = 0;
            cropLeft = 0;
            cropRight = 0;
        }
    }
    cropArea();
}

cropOptions.forEach(cropOption => {
    cropOption.addEventListener('click', () => {
        document.querySelector(".active").classList.remove("active");
        cropOption.classList.add("active");
        if (cropOption.id == 'cropTop') {
            cropRange.value = cropTop;
            cropRange.min = 0;
            cropName.innerText = 'Superior';
        } else if (cropOption.id == 'cropBottom') {
            cropRange.value = cropBottom;
            cropRange.min = 0;
            cropName.innerText = 'Inferior';
        } else if (cropOption.id == 'cropLeft') {
            cropRange.value = cropLeft;
            cropRange.min = 0;
            cropName.innerText = 'Izquierdo';
        } else if (cropOption.id == 'cropRight') {
            cropRange.value = cropRight;
            cropRange.min = 0;
            cropName.innerText = 'Derecho';
        }
    })
})

const updateOptions = () => {
    const activeFilter = document.querySelector('.active');
    if (activeFilter.id === 'cropTop') {
        cropTop = cropRange.value;
    } else if (activeFilter.id === 'cropBottom') {
        cropBottom = cropRange.value;
    } else if (activeFilter.id === 'cropLeft') {
        cropLeft = cropRange.value;
    } else if (activeFilter.id === 'cropRight') {
        cropRight = cropRange.value;
    }
    cropArea();
}

const cropArea = () => {
    let y0 = (imgPrev.clientHeight / 100) * cropTop;
    let y1 = (imgPrev.clientHeight / 100) * cropBottom;
    let x0 = (imgPrev.clientWidth / 100) * cropLeft;
    let x1 = (imgPrev.clientWidth / 100) * cropRight;
    if (y0 + y1 > imgPrev.clientHeight || x0 + x1 > imgPrev.clientWidth) {
        x0 = x1 = y0 = y1 = 0;
    }
    imgPrev.style.clipPath = `inset(${y0}px ${x1}px ${y1}px ${x0}px)`;
    let data = {
        'id': i,
        'main': i == 0 ? true : false,
        'top': y0,
        'bottom': y1,
        'left': x0,
        'right': x1
    };
    if (cropMeasures.length > 0) {
        imageId = cropMeasures.findIndex(obj => obj.id == i);
        if (imageId >= 0) {
            cropMeasures[imageId].top = y0;
            cropMeasures[imageId].bottom = y1;
            cropMeasures[imageId].left = x0;
            cropMeasures[imageId].right = x1;
        } else {
            cropMeasures.push(data);
        }
    } else {
        cropMeasures.push(data);
    }
    document.getElementById('cropMeasures').value = JSON.stringify(cropMeasures);
}

addPhotosBtn.addEventListener('click', () => addPhotosInput.click());
cropRange.addEventListener('input', updateOptions);

// manage how to change the main checkbox when the user wants

isMain.addEventListener('change', () => {
    if (isMain.checked == true) {
        index = cropMeasures.findIndex(obj => obj.main == true);
        if (index >= 0) {
            cropMeasures[index].main = false;
            cropMeasures[i].main = true;
        }
    } else {
        index = cropMeasures.findIndex(obj => obj.main == false);
        if (index >= 0) {
            cropMeasures[index].main = false;
            cropMeasures[0].main = true;
        }
    }
})

// manage the template

const topTemplate = document.querySelector('.topTemplate');
const bottomTemplate = document.querySelector('.bottomTemplate');
const rightTemplate = document.querySelector('.rightTemplate');
const leftTemplate = document.querySelector('.leftTemplate');
const squareTemplate = document.getElementById('squareTemplateId');
const grabSquare = document.getElementById('grabSquare');
let currentBottom = window.getComputedStyle(squareTemplate).getPropertyValue('bottom');
let currentTop = window.getComputedStyle(squareTemplate).getPropertyValue('top');
let currentHeight = window.getComputedStyle(squareTemplate).getPropertyValue('height');
let currentWidth = window.getComputedStyle(squareTemplate).getPropertyValue('width');
let currentRight = window.getComputedStyle(squareTemplate).getPropertyValue('right');
let currentLeft = window.getComputedStyle(squareTemplate).getPropertyValue('left');
let clickDownTop = false;
let clickDownBottom = false;
let clickDownLeft = false;
let clickDownRight = false;

let clickDown = false;

grabSquare.addEventListener('pointerdown', function () {
    clickDown = true;
})

grabSquare.addEventListener('pointerup', function () {
    clickDown = false;
})

function castNumb(numb) {
    let casted = Number(numb.replace('px', ''));
    return casted;
}

topTemplate.addEventListener('pointerdown', function () {
    clickDownTop = true;
})

topTemplate.addEventListener('pointerup', function () {
    clickDownTop = false;
})

bottomTemplate.addEventListener('pointerdown', function () {
    clickDownBottom = true;
})

bottomTemplate.addEventListener('pointerup', function () {
    clickDownBottom = false;
})

rightTemplate.addEventListener('pointerdown', function () {
    clickDownRight = true;
})

rightTemplate.addEventListener('pointerup', function () {
    clickDownRight = false;
})


leftTemplate.addEventListener('pointerdown', function () {
    clickDownLeft = true;
})

leftTemplate.addEventListener('pointerup', function () {
    clickDownLeft = false;
})

addEventListener('pointermove', function (event) {
    if (clickDownTop) {
        currentTop = window.getComputedStyle(squareTemplate).getPropertyValue('top');
        currentHeight = window.getComputedStyle(squareTemplate).getPropertyValue('height');
        let changeTop = event.movementY;
        squareTemplate.style.top = castNumb(currentTop) + changeTop + 'px';
        if (castNumb(currentTop) + changeTop < imgPrev.clientHeight) {
            squareTemplate.style.height = (castNumb(currentHeight) - ((castNumb(currentHeight) + castNumb(currentTop) + changeTop + castNumb(currentBottom)) - imgPrev.clientHeight)) + 'px';
        } else {
            squareTemplate.style.top = imgPrev.clientHeight + 'px';
        }

        if ((castNumb(currentHeight) - ((castNumb(currentHeight) + castNumb(currentTop) + changeTop + castNumb(currentBottom)) - imgPrev.clientHeight)) < imgPrev.clientHeight) {
            squareTemplate.style.height = (castNumb(currentHeight) - ((castNumb(currentHeight) + castNumb(currentTop) + changeTop + castNumb(currentBottom)) - imgPrev.clientHeight)) + 'px';
        } else {
            squareTemplate.style.top = 0 + 'px';
        }
    }

    if (clickDownBottom) {
        currentBottom = window.getComputedStyle(squareTemplate).getPropertyValue('bottom');
        currentHeight = window.getComputedStyle(squareTemplate).getPropertyValue('height');
        let changeBottom = - 1 * event.movementY;
        squareTemplate.style.bottom = castNumb(currentBottom) + changeBottom + 'px';
        if (castNumb(currentBottom) + changeBottom < imgPrev.clientHeight) {
            squareTemplate.style.height = (castNumb(currentHeight) - ((castNumb(currentHeight) + castNumb(currentBottom) + changeBottom + castNumb(currentTop)) - imgPrev.clientHeight)) + 'px';
        } else {
            squareTemplate.style.bottom = imgPrev.clientHeight + 'px';
        }

        if ((castNumb(currentHeight) - ((castNumb(currentHeight) + castNumb(currentBottom) + changeBottom + castNumb(currentTop)) - imgPrev.clientHeight)) < imgPrev.clientHeight) {
            squareTemplate.style.height = (castNumb(currentHeight) - ((castNumb(currentHeight) + castNumb(currentBottom) + changeBottom + castNumb(currentTop)) - imgPrev.clientHeight)) + 'px';
        } else {
            squareTemplate.style.bottom = 0 + 'px';
        }
    }

    if (clickDownRight) {
        currentRight = window.getComputedStyle(squareTemplate).getPropertyValue('right');
        currentWidth = window.getComputedStyle(squareTemplate).getPropertyValue('width');
        let changeRight = - 1 * event.movementX;
        squareTemplate.style.right = castNumb(currentRight) + changeRight + 'px';
        if (castNumb(currentRight) + changeRight < imgPrev.clientWidth) {
            squareTemplate.style.width = (castNumb(currentWidth) - ((castNumb(currentWidth) + castNumb(currentRight) + changeRight + castNumb(currentLeft)) - imgPrev.clientWidth)) + 'px';
        } else {
            squareTemplate.style.right = imgPrev.clientWidth + 'px';
        }

        if ((castNumb(currentWidth) - ((castNumb(currentWidth) + castNumb(currentRight) + changeRight + castNumb(currentLeft)) - imgPrev.clientWidth)) < imgPrev.clientWidth) {
            squareTemplate.style.width = (castNumb(currentWidth) - ((castNumb(currentWidth) + castNumb(currentRight) + changeRight + castNumb(currentLeft)) - imgPrev.clientWidth)) + 'px';
        } else {
            squareTemplate.style.right = 0 + 'px';
        }
    }

    if (clickDownLeft) {
        currentLeft = window.getComputedStyle(squareTemplate).getPropertyValue('left');
        currentWidth = window.getComputedStyle(squareTemplate).getPropertyValue('width');
        let changeLeft = event.movementX;
        squareTemplate.style.left = castNumb(currentLeft) + changeLeft + 'px';
        if (castNumb(currentLeft) + changeLeft < imgPrev.clientWidth) {
            squareTemplate.style.width = (castNumb(currentWidth) - ((castNumb(currentWidth) + castNumb(currentLeft) + changeLeft + castNumb(currentRight)) - imgPrev.clientWidth)) + 'px';
        } else {
            squareTemplate.style.left = imgPrev.clientWidth + 'px';
        }

        if ((castNumb(currentWidth) - ((castNumb(currentWidth) + castNumb(currentLeft) + changeLeft + castNumb(currentLeft)) - imgPrev.clientWidth)) < imgPrev.clientWidth) {
            squareTemplate.style.width = (castNumb(currentWidth) - ((castNumb(currentWidth) + castNumb(currentLeft) + changeLeft + castNumb(currentRight)) - imgPrev.clientWidth)) + 'px';
        } else {
            squareTemplate.style.left = 0 + 'px';
        }
    }

    if (clickDown) {
        currentRight = window.getComputedStyle(squareTemplate).getPropertyValue('right');
        currentWidth = window.getComputedStyle(squareTemplate).getPropertyValue('width');
        currentHeight = window.getComputedStyle(squareTemplate).getPropertyValue('height');
        currentLeft = window.getComputedStyle(squareTemplate).getPropertyValue('left');
        currentTop = window.getComputedStyle(squareTemplate).getPropertyValue('top');
        currentBottom = window.getComputedStyle(squareTemplate).getPropertyValue('bottom');
        if (castNumb(currentRight) > 0) {
            changeRight = -1 * event.movementX;
            squareTemplate.style.left = "unset";
            squareTemplate.style.right = castNumb(currentRight) + changeRight + 'px';
            if (castNumb(currentRight) + castNumb(currentWidth) > imgPrev.clientWidth) {
                squareTemplate.style.right = (imgPrev.clientWidth - castNumb(currentWidth)) + 'px';
            }
        }
        if (castNumb(currentLeft) > 0) {
            changeLeft = event.movementX;
            squareTemplate.style.right = "unset";
            squareTemplate.style.left = castNumb(currentLeft) + changeLeft + 'px';
            if (castNumb(currentLeft) + castNumb(currentWidth) > imgPrev.clientWidth) {
                squareTemplate.style.left = (imgPrev.clientWidth - castNumb(currentWidth)) + 'px';
            }
        }
        if (castNumb(currentTop) > 0) {
            changeTop = event.movementY;
            squareTemplate.style.bottom = "unset";
            squareTemplate.style.top = castNumb(currentTop) + changeTop + 'px';
            if (castNumb(currentTop) + castNumb(currentHeight) > imgPrev.clientHeight) {
                squareTemplate.style.top = (imgPrev.clientHeight - castNumb(currentHeight)) + 'px';
            }
        }
        if (castNumb(currentBottom) > 0) {
            changeBottom = -1 * event.movementY;
            squareTemplate.style.top = "unset";
            squareTemplate.style.bottom = castNumb(currentBottom) + changeBottom + 'px';
            if (castNumb(currentBottom) + castNumb(currentHeight) > imgPrev.clientHeight) {
                squareTemplate.style.bottom = (imgPrev.clientHeight - castNumb(currentHeight)) + 'px';
            }
        }
        let imageMeasurements = {
            'id': i,
            'top': currentTop,
            'bottom': currentBottom,
            'left': currentLeft,
            'right': currentRight,
            'width': currentWidth,
            'height': currentHeight,
        }
        console.log(imageMeasurements);
    }
})

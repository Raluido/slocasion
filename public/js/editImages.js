const addPhotosBtn = document.querySelector('.addPhotosBtn');
const addPhotosInput = document.querySelector('.addPhotosInput');
const innerImgPrev = document.querySelector('.imgPrev .innerImgPrev img');
const imgSize = document.querySelector('.imgPrev .innerImgPrev');
const previous = document.querySelector('.previousPhoto');
const next = document.querySelector('.nextPhoto');
const squareTemplate = document.getElementById('squareTemplateId');

const topTemplate = document.querySelector('.topTemplate');
const bottomTemplate = document.querySelector('.bottomTemplate');
const rightTemplate = document.querySelector('.rightTemplate');
const leftTemplate = document.querySelector('.leftTemplate');
const grabSquare = document.getElementById('grabSquare');

const defaultCrop = document.querySelector('.defaultCrop');
const resetCrop = document.querySelector('.resetCrop');

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

let clickDefault = false;

let isMain = document.getElementById('isMain');
let cropMeasures = [];
let i = 0;

// manage the template

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
        let changeTop = event.offsetY;
        squareTemplate.style.top = castNumb(currentTop) + changeTop + 'px';
        if (castNumb(currentTop) + changeTop < 0) {
            squareTemplate.style.top = '0px';
            squareTemplate.style.height = currentHeight;
            return;
        }

        currentBottom = window.getComputedStyle(squareTemplate).getPropertyValue('bottom');
        currentHeight = window.getComputedStyle(squareTemplate).getPropertyValue('height');
        squareTemplate.style.height = (innerImgPrev.height - (castNumb(currentTop) + changeTop + castNumb(currentBottom))) + 'px';
        if (castNumb(currentHeight) < 0.1 * innerImgPrev.height) {
            squareTemplate.style.height = 0.1 * innerImgPrev.height + 'px';
            squareTemplate.style.top = currentTop;
            if (changeTop < 0) {
                squareTemplate.style.top = castNumb(currentTop) + changeTop + 'px';
                squareTemplate.style.height = (innerImgPrev.height - (castNumb(currentTop) + changeTop + castNumb(currentBottom))) + 'px';
            }
        }
    }

    if (clickDownBottom) {
        currentBottom = window.getComputedStyle(squareTemplate).getPropertyValue('bottom');
        let changeBottom = - 1 * event.offsetY;
        squareTemplate.style.bottom = castNumb(currentBottom) + changeBottom + 'px';
        if (castNumb(currentBottom) + changeBottom < 0) {
            squareTemplate.style.bottom = '0px';
            squareTemplate.style.height = currentHeight;
            return;
        }

        currentTop = window.getComputedStyle(squareTemplate).getPropertyValue('top');
        currentHeight = window.getComputedStyle(squareTemplate).getPropertyValue('height');
        squareTemplate.style.height = (innerImgPrev.height - (castNumb(currentBottom) + changeBottom + castNumb(currentTop))) + 'px';
        if (castNumb(currentHeight) < 0.1 * innerImgPrev.height) {
            squareTemplate.style.height = 0.1 * innerImgPrev.height + 'px';
            squareTemplate.style.bottom = currentBottom;
            if (changeBottom < 0) {
                squareTemplate.style.bottom = castNumb(currentBottom) + changeBottom + 'px';
                squareTemplate.style.height = (innerImgPrev.height - (castNumb(currentBottom) + changeBottom + castNumb(currentTop))) + 'px';
            }
        }
    }

    if (clickDownRight) {
        currentRight = window.getComputedStyle(squareTemplate).getPropertyValue('right');
        let changeRight = - 1 * event.offsetX;

        squareTemplate.style.right = castNumb(currentRight) + changeRight + 'px';
        if (castNumb(currentRight) + changeRight < 0) {
            squareTemplate.style.right = '0px';
            squareTemplate.style.width = currentWidth;
            return;
        }
        currentLeft = window.getComputedStyle(squareTemplate).getPropertyValue('left');
        currentWidth = window.getComputedStyle(squareTemplate).getPropertyValue('width');
        squareTemplate.style.width = (innerImgPrev.width - (castNumb(currentRight) + changeRight + castNumb(currentLeft))) + 'px';
        if (castNumb(currentWidth) < 0.3 * innerImgPrev.width) {
            squareTemplate.style.width = 0.3 * innerImgPrev.width + 'px';
            squareTemplate.style.right = currentRight;

            if (changeRight < 0) {
                squareTemplate.style.right = castNumb(currentRight) + changeRight + 'px';
                squareTemplate.style.width = (innerImgPrev.width - (castNumb(currentRight) + changeRight + castNumb(currentLeft))) + 'px';
            }
        }
    }

    if (clickDownLeft) {
        currentLeft = window.getComputedStyle(squareTemplate).getPropertyValue('left');
        let changeLeft = event.offsetX;
        squareTemplate.style.left = castNumb(currentLeft) + changeLeft + 'px';
        if (castNumb(currentLeft) + changeLeft < 0) {
            squareTemplate.style.left = '0px';
            squareTemplate.style.width = currentWidth;
            return;
        }

        currentRight = window.getComputedStyle(squareTemplate).getPropertyValue('right');
        currentWidth = window.getComputedStyle(squareTemplate).getPropertyValue('width');
        squareTemplate.style.width = (innerImgPrev.width - (castNumb(currentLeft) + changeLeft + castNumb(currentRight))) + 'px';
        if (castNumb(currentWidth) < 0.1 * innerImgPrev.width) {
            squareTemplate.style.width = 0.1 * innerImgPrev.width;
            squareTemplate.style.left = currentLeft;
            if (changeLeft < 0) {
                squareTemplate.style.left = castNumb(currentLeft) + changeLeft + 'px';
                squareTemplate.style.width = (innerImgPrev.width - (castNumb(currentLeft) + changeLeft + castNumb(currentRight))) + 'px';
            }
        }
    }

    if (clickDown) {
        if (castNumb(currentRight) > 0) {
            changeRight = -1 * event.movementX;
            squareTemplate.style.left = "unset";
            squareTemplate.style.right = castNumb(currentRight) + changeRight + 'px';
            if (castNumb(currentRight) + castNumb(currentWidth) > innerImgPrev.width) {
                squareTemplate.style.right = (innerImgPrev.width - castNumb(currentWidth)) + 'px';
            }
        }
        if (castNumb(currentLeft) > 0) {
            changeLeft = event.movementX;
            squareTemplate.style.right = "unset";
            squareTemplate.style.left = castNumb(currentLeft) + changeLeft + 'px';
            if (castNumb(currentLeft) + castNumb(currentWidth) > innerImgPrev.width) {
                squareTemplate.style.left = (innerImgPrev.width - castNumb(currentWidth)) + 'px';
            }
        }
        if (castNumb(currentTop) > 0) {
            changeTop = event.movementY;
            squareTemplate.style.bottom = "unset";
            squareTemplate.style.top = castNumb(currentTop) + changeTop + 'px';
            if (castNumb(currentTop) + castNumb(currentHeight) > innerImgPrev.height) {
                squareTemplate.style.top = (innerImgPrev.height - castNumb(currentHeight)) + 'px';
            }
        }
        if (castNumb(currentBottom) > 0) {
            changeBottom = -1 * event.movementY;
            squareTemplate.style.top = "unset";
            squareTemplate.style.bottom = castNumb(currentBottom) + changeBottom + 'px';
            if (castNumb(currentBottom) + castNumb(currentHeight) > innerImgPrev.height) {
                squareTemplate.style.bottom = (innerImgPrev.height - castNumb(currentHeight)) + 'px';
            }
        }
    }
    currentRight = window.getComputedStyle(squareTemplate).getPropertyValue('right');
    currentWidth = window.getComputedStyle(squareTemplate).getPropertyValue('width');
    currentHeight = window.getComputedStyle(squareTemplate).getPropertyValue('height');
    currentLeft = window.getComputedStyle(squareTemplate).getPropertyValue('left');
    currentTop = window.getComputedStyle(squareTemplate).getPropertyValue('top');
    currentBottom = window.getComputedStyle(squareTemplate).getPropertyValue('bottom');
    data = {
        'id': i,
        'top': currentTop,
        'bottom': currentBottom,
        'left': currentLeft,
        'right': currentRight,
        'width': currentWidth,
        'height': currentHeight,
        'webHeight': innerImgPrev.height,
        'webWidth': innerImgPrev.width,
    }
    if (clickDownTop || clickDownBottom || clickDownLeft || clickDownRight || clickDown) {
        saveTemplate(data);
    }
})

defaultCrop.addEventListener('click', function () {
    data = {
        'top': 0.1 * innerImgPrev.height + 'px',
        'bottom': '0px',
        'left': '0px',
        'right': '0px',
        'width': innerImgPrev.width + 'px',
        'height': 0.8 * innerImgPrev.height + 'px',
        'webHeight': innerImgPrev.height,
        'webWidth': innerImgPrev.width,
    }
    saveTemplate(data);
})

resetCrop.addEventListener('click', function () {
    data = {
        'top': '0%',
        'bottom': '0%',
        'left': '0%',
        'right': '0%',
        'width': '100%',
        'height': '100%',
        'webHeight': innerImgPrev.height,
        'webWidth': innerImgPrev.width,
    }
    saveTemplate(data);
})

function saveTemplate(data) {
    id = cropMeasures.findIndex(obj => obj.id == i);
    if (id >= 0) {
        cropMeasures[id].top = data.top;
        cropMeasures[id].bottom = data.bottom;
        cropMeasures[id].left = data.left;
        cropMeasures[id].right = data.right;
        cropMeasures[id].width = data.width;
        cropMeasures[id].height = data.height;
        cropMeasures[id].webHeight = data.webHeight;
        cropMeasures[id].webWidth = data.webWidth;
        squareTemplate.style.top = data.top;
        squareTemplate.style.bottom = data.bottom;
        squareTemplate.style.left = data.left;
        squareTemplate.style.right = data.right;
        squareTemplate.style.width = data.width;
        squareTemplate.style.height = data.height;
    }
    document.getElementById('cropMeasures').value = JSON.stringify(cropMeasures);
}

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

const addPrevImgZero = () => {
    let file = addPhotosInput.files[0];
    if (!file) return;
    innerImgPrev.src = "";
    innerImgPrev.src = URL.createObjectURL(file);
}

const addPrevImg = () => {
    let file = addPhotosInput.files[i];
    if (!file) return;
    innerImgPrev.src = URL.createObjectURL(file);
    updateValues();
}

const noCrop = () => {
    cropMeasures = [];
    for (let i = 0; i < addPhotosInput.files.length; i++) {
        let data = {
            'id': i,
            'main': i == 0 ? true : false,
            'top': '0px',
            'bottom': '0px',
            'left': '0px',
            'right': '0px',
            'width': '100%',
            'height': '100%',
            'webHeight': null,
            'webWidth': null,
        }
        cropMeasures.push(data);
    }
    document.getElementById('cropMeasures').value = JSON.stringify(cropMeasures);
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
            squareTemplate.style.top = cropMeasures[id].top;
            squareTemplate.style.bottom = cropMeasures[id].bottom;
            squareTemplate.style.left = cropMeasures[id].left;
            squareTemplate.style.right = cropMeasures[id].right;
            squareTemplate.style.height = cropMeasures[id].height;
            squareTemplate.style.width = cropMeasures[id].width;
        }
    }
}

addPhotosBtn.addEventListener('click', () => addPhotosInput.click());

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
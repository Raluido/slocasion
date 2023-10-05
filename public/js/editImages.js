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
            squareTemplate.style.height = innerImgPrev.height + 'px';
            return;
        }
        if (castNumb(currentTop) + changeTop > 0.9 * innerImgPrev.height) {
            squareTemplate.style.top = 0.9 * innerImgPrev.height + 'px';
            squareTemplate.style.height = 0.1 * innerImgPrev.height + 'px';
            return;
        }

        currentBottom = window.getComputedStyle(squareTemplate).getPropertyValue('bottom');
        currentHeight = window.getComputedStyle(squareTemplate).getPropertyValue('height');
        squareTemplate.style.height = (innerImgPrev.height - (castNumb(currentTop) + changeTop + castNumb(currentBottom))) + 'px';
        if (castNumb(currentHeight) < 0.1 * innerImgPrev.height) {
            console.log(0.1 * innerImgPrev.height);
            squareTemplate.style.height = 0.1 * innerImgPrev.height + 'px';
            squareTemplate.style.top = innerImgPrev.height - (0.1 * innerImgPrev.height + currentBottom + currentTop);
        }
    }

    if (clickDownBottom) {
        currentBottom = window.getComputedStyle(squareTemplate).getPropertyValue('bottom');
        console.log(currentBottom);
        let changeBottom = - 1 * event.offsetY;
        squareTemplate.style.bottom = castNumb(currentBottom) + changeBottom + 'px';
        if (castNumb(currentBottom) + changeBottom < 0) {
            squareTemplate.style.bottom = '0px';
            squareTemplate.style.height = innerImgPrev.height + 'px';
            return;
        }
        if (castNumb(currentBottom) + changeBottom > 0.9 * innerImgPrev.height) {
            squareTemplate.style.bottom = 0.9 * innerImgPrev.height + 'px';
            squareTemplate.style.height = 0.1 * innerImgPrev.height + 'px';
            return;
        }

        currentTop = window.getComputedStyle(squareTemplate).getPropertyValue('top');
        currentHeight = window.getComputedStyle(squareTemplate).getPropertyValue('height');
        squareTemplate.style.height = (innerImgPrev.height - (castNumb(currentBottom) + changeBottom + castNumb(currentTop))) + 'px';
        if (castNumb(currentHeight) < 0.1 * innerImgPrev.height) {
            squareTemplate.style.height = 0.1 * innerImgPrev.height + 'px';
            squareTemplate.style.bottom = innerImgPrev.height - (0.1 * innerImgPrev.height + currentBottom + currentTop);
            return;
        }
    }

    // if (clickDownRight) {
    //     currentRight = window.getComputedStyle(squareTemplate).getPropertyValue('right');
    //     currentWidth = window.getComputedStyle(squareTemplate).getPropertyValue('width');
    //     let changeRight = - 1 * event.movementX;
    //     squareTemplate.style.right = castNumb(currentRight) + changeRight + 'px';
    //     if (castNumb(currentRight) + changeRight < innerImgPrev.clientWidth) {
    //         squareTemplate.style.width = (castNumb(currentWidth) - ((castNumb(currentWidth) + castNumb(currentRight) + changeRight + castNumb(currentLeft)) - innerImgPrev.clientWidth)) + 'px';
    //     } else {
    //         squareTemplate.style.right = innerImgPrev.clientWidth + 'px';
    //     }

    //     if ((castNumb(currentWidth) - ((castNumb(currentWidth) + castNumb(currentRight) + changeRight + castNumb(currentLeft)) - innerImgPrev.clientWidth)) < innerImgPrev.clientWidth) {
    //         squareTemplate.style.width = (castNumb(currentWidth) - ((castNumb(currentWidth) + castNumb(currentRight) + changeRight + castNumb(currentLeft)) - innerImgPrev.clientWidth)) + 'px';
    //     } else {
    //         squareTemplate.style.right = 0 + 'px';
    //     }
    // }

    // if (clickDownLeft) {
    //     currentLeft = window.getComputedStyle(squareTemplate).getPropertyValue('left');
    //     currentWidth = window.getComputedStyle(squareTemplate).getPropertyValue('width');
    //     let changeLeft = event.movementX;
    //     squareTemplate.style.left = castNumb(currentLeft) + changeLeft + 'px';
    //     if (castNumb(currentLeft) + changeLeft < innerImgPrev.clientWidth) {
    //         squareTemplate.style.width = (castNumb(currentWidth) - ((castNumb(currentWidth) + castNumb(currentLeft) + changeLeft + castNumb(currentRight)) - innerImgPrev.clientWidth)) + 'px';
    //     } else {
    //         squareTemplate.style.left = innerImgPrev.clientWidth + 'px';
    //     }

    //     if ((castNumb(currentWidth) - ((castNumb(currentWidth) + castNumb(currentLeft) + changeLeft + castNumb(currentLeft)) - innerImgPrev.clientWidth)) < innerImgPrev.clientWidth) {
    //         squareTemplate.style.width = (castNumb(currentWidth) - ((castNumb(currentWidth) + castNumb(currentLeft) + changeLeft + castNumb(currentRight)) - innerImgPrev.clientWidth)) + 'px';
    //     } else {
    //         squareTemplate.style.left = 0 + 'px';
    //     }
    // }

    // if (clickDown) {
    //     if (castNumb(currentRight) > 0) {
    //         changeRight = -1 * event.movementX;
    //         squareTemplate.style.left = "unset";
    //         squareTemplate.style.right = castNumb(currentRight) + changeRight + 'px';
    //         if (castNumb(currentRight) + castNumb(currentWidth) > innerImgPrev.clientWidth) {
    //             squareTemplate.style.right = (innerImgPrev.clientWidth - castNumb(currentWidth)) + 'px';
    //         }
    //     }
    //     if (castNumb(currentLeft) > 0) {
    //         changeLeft = event.movementX;
    //         squareTemplate.style.right = "unset";
    //         squareTemplate.style.left = castNumb(currentLeft) + changeLeft + 'px';
    //         if (castNumb(currentLeft) + castNumb(currentWidth) > innerImgPrev.clientWidth) {
    //             squareTemplate.style.left = (innerImgPrev.clientWidth - castNumb(currentWidth)) + 'px';
    //         }
    //     }
    //     if (castNumb(currentTop) > 0) {
    //         changeTop = event.movementY;
    //         squareTemplate.style.bottom = "unset";
    //         squareTemplate.style.top = castNumb(currentTop) + changeTop + 'px';
    //         if (castNumb(currentTop) + castNumb(currentHeight) > innerImgPrev.clientHeight) {
    //             squareTemplate.style.top = (innerImgPrev.clientHeight - castNumb(currentHeight)) + 'px';
    //         }
    //     }
    //     if (castNumb(currentBottom) > 0) {
    //         changeBottom = -1 * event.movementY;
    //         squareTemplate.style.top = "unset";
    //         squareTemplate.style.bottom = castNumb(currentBottom) + changeBottom + 'px';
    //         if (castNumb(currentBottom) + castNumb(currentHeight) > innerImgPrev.clientHeight) {
    //             squareTemplate.style.bottom = (innerImgPrev.clientHeight - castNumb(currentHeight)) + 'px';
    //         }
    //     }
    // }
    // currentRight = window.getComputedStyle(squareTemplate).getPropertyValue('right');
    // currentWidth = window.getComputedStyle(squareTemplate).getPropertyValue('width');
    // currentHeight = window.getComputedStyle(squareTemplate).getPropertyValue('height');
    // currentLeft = window.getComputedStyle(squareTemplate).getPropertyValue('left');
    // currentTop = window.getComputedStyle(squareTemplate).getPropertyValue('top');
    // currentBottom = window.getComputedStyle(squareTemplate).getPropertyValue('bottom');
    // data = {
    //     'id': i,
    //     'main': i == 0 ? true : false,
    //     'top': currentTop,
    //     'bottom': currentBottom,
    //     'left': currentLeft,
    //     'right': currentRight,
    //     'width': currentWidth,
    //     'height': currentHeight,
    // }
    // if (clickDownTop || clickDownBottom || clickDownLeft || clickDownRight || clickDown) {
    //     saveTemplate(data);
    // }
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
    } else {
        cropMeasures.push(data);
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
    console.log("saveAtStart");
    console.log(cropMeasures);
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
        console.log("next");
        console.log(cropMeasures);

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
            'width': null,
            'height': null,
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
        } else {
            squareTemplate.style.top = 0 + 'px';
            squareTemplate.style.bottom = 0 + 'px';
            squareTemplate.style.left = 0 + 'px';
            squareTemplate.style.right = 0 + 'px';
            squareTemplate.style.height = null;
            squareTemplate.style.width = null;
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
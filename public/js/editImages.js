const addPhotosBtn = document.querySelector('.addPhotosBtn');
const addPhotosInput = document.querySelector('.addPhotosInput');
const imgPrev = document.querySelector('.imgPrev .innerImgPrev img');
const previous = document.querySelector('.previousPhoto');
const next = document.querySelector('.nextPhoto');
const cropOptions = document.querySelectorAll('.cropOptions div');
const cropRange = document.querySelector('.cropRange input');
const cropName = document.querySelector('.cropRange div');
const imgHeight = imgPrev.clientHeight, imgWidth = imgPrev.clientWidth;

let isMain = document.getElementById('isMain');
let cropTop = 0, cropBottom = 0, cropLeft = 0, cropRight = 0;
let cropMeasures = [];
let i = 0;
let y0 = 0, y1 = 0, x0 = 0, x1 = 0;

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
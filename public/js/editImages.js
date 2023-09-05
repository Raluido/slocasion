const addPhotosBtn = document.querySelector('.addPhotosBtn');
const addPhotosInput = document.querySelector('.addPhotosInput');
const imgPrev = document.querySelector('.imgPrev .innerImgPrev img');
const previous = document.querySelector('.previousPhoto');
const next = document.querySelector('.nextPhoto');
const cropOptions = document.querySelectorAll('.cropOptions div');
const cropRange = document.querySelector('.cropRange input');
const cropName = document.querySelector('.cropRange div');

let imgHeight = imgPrev.clientHeight, imgWidth = imgPrev.clientWidth;

const addPrevImg = () => {
    let file = addPhotosInput.files[i];
    imgPrev.src = URL.createObjectURL(file);
}

let cropTop = 0, cropBottom = 0, cropLeft = 0, cropRight = 0;

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

let cropMeasures = [];

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
        'top': y0,
        'bottom': y1,
        'left': x0,
        'right': x1
    };
    if (cropMeasures.length > 0) {
        imageId = cropMeasures.findIndex(obj => obj.id == i);
        console.log(i);
        console.log(imageId);
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
}

let i = 0;

addPhotosBtn.addEventListener('click', function () {
    addPhotosInput.click();
})

addPhotosInput.addEventListener('change', function () {
    previous.addEventListener('click', function () {
        if (i > 0) {
            i--;
            addPrevImg();
        }
    })
    next.addEventListener('click', function () {
        const allPhotos = addPhotosInput.files.length;
        if (i < allPhotos - 1) {
            i++;
            addPrevImg();
        }
    })
    if (i == 0) {
        addPrevImg();
    }
})

cropRange.addEventListener('input', updateOptions);






























// const addPhotosBtn = document.querySelector('.addPhotosBtn');
// const addPhotosInput = document.querySelector('.addPhotosInput');
// const imgPrev = document.querySelector('.imgPrev .innerImgPrev img');
// const previous = document.querySelector('.previousPhoto');
// const next = document.querySelector('.nextPhoto');
// const cropOptions = document.querySelectorAll('.cropOptions div');
// const cropRange = document.querySelector('.cropRange input');
// const cropName = document.querySelector('.cropRange div');

// const addPrevImg = () => {
//     let file = addPhotosInput.files[i];
//     imgPrev.src = URL.createObjectURL(file);
// }

// let axisx = 0, axisy = 0, width = 100, height = 100;

// cropOptions.forEach(cropOption => {
//     cropOption.addEventListener('click', () => {
//         document.querySelector(".active").classList.remove("active");
//         cropOption.classList.add("active");
//         if (cropOption.id == 'axisx') {
//             cropRange.value = axisx;
//             cropRange.min = 0;
//             cropName.innerText = 'Eje x';
//         } else if (cropOption.id == 'axisy') {
//             cropRange.value = axisy;
//             cropRange.min = 0;
//             cropName.innerText = 'Eje y';
//         } else if (cropOption.id == 'width') {
//             cropRange.value = width;
//             cropRange.min = 0;
//             cropName.innerText = 'Largo';
//         } else if (cropOption.id == 'height') {
//             cropRange.value = height;
//             cropRange.min = 0;
//             cropName.innerText = 'Ancho';
//         }
//     })
// })

// const updateOptions = () => {
//     const activeFilter = document.querySelector('.active');
//     if (activeFilter.id === 'axisx') {
//         axisx = cropRange.value;
//     } else if (activeFilter.id === 'axisy') {
//         axisy = cropRange.value;
//     } else if (activeFilter.id === 'width') {
//         width = cropRange.value;
//     } else if (activeFilter.id === 'height') {
//         height = cropRange.value;
//     }
//     cropCanva();
// }


// const cropCanva = () => {
//     const canvas = document.createElement('canvas');
//     const ctx = canvas.getContext("2d");
//     canvas.width = imgPrev.naturalWidth;
//     canvas.height = imgPrev.naturalHeight;
//     let x0 = (canvas.width / 100) * axisx;
//     let y0 = (canvas.height / 100) * axisy;
//     let w0 = (canvas.width / 100) * width;
//     if (w0 > canvas.width - x0) {
//         w0 = canvas.width - x0;
//     }
//     let h0 = (canvas.width / 100) * height;
//     if (h0 > canvas.height - y0) {
//         h0 = canvas.height - y0;
//     }
//     ctx.drawImage = (imgPrev, x0, y0, w0, h0, 0, 0, canvas.width, canvas.height);
//     imgPrev.src = canvas.toDataURL("image/jpeg", 0.5);
// }

// let i = 0;

// addPhotosBtn.addEventListener('click', function () {
//     addPhotosInput.click();
// })

// addPhotosInput.addEventListener('change', function () {
//     previous.addEventListener('click', function () {
//         if (i > 0) {
//             i--;
//             addPrevImg();
//         }
//     })
//     next.addEventListener('click', function () {
//         const allPhotos = addPhotosInput.files.length;
//         if (i < allPhotos - 1) {
//             i++;
//             addPrevImg();
//         }
//     })
//     if (i == 0) {
//         addPrevImg();
//     }
// })

// cropRange.addEventListener('input', updateOptions);

const addPhotosBtn = document.querySelector('.addPhotosBtn');
const addPhotosInput = document.querySelector('.addPhotosInput');
const imgPrev = document.querySelector('.imgPrev .innerImgPrev img');
const previous = document.querySelector('.previousPhoto');
const next = document.querySelector('.nextPhoto');
const cropOptions = document.querySelectorAll('.cropOptions input');
// const axisy = document.querySelector('#axisy');
// const axisx = document.querySelector('#axisx');
// const heightCanva = document.querySelector('#heightCanva');
// const widthCanva = document.querySelector('#widthCanva');

const addPrevImg = () => {
    let file = addPhotosInput.files[i];
    imgPrev.src = URL.createObjectURL(file);
    imgPrev.addEventListener('load', () => {
        cropCanva();
    })
}

const cropCanva = () => {
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext("2d");
    canvas.width = imgPrev.naturalWidth;
    canvas.height = imgPrev.naturalHeight;
    console.log(canvas.width);
    console.log(canvas.height);
    let x0 = (canvas.width / 100) * cropOptions[2].value;
    let y0 = (canvas.height / 100) * cropOptions[0].value;
    let w0 = (canvas.width / 100) * cropOptions[3].value;
    if (w0 > canvas.width - x0) {
        w0 = canvas.width - x0;
    }
    let h0 = (canvas.width / 100) * cropOptions[1].value;
    if (h0 > canvas.height - y0) {
        h0 = canvas.height - y0;
    }
    ctx.drawImage = (imgPrev, x0, y0, w0, h0, 0, 0, canvas.width, canvas.height);
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


const addPhotosBtn = document.querySelector('.addPhotosBtn');
const addPhotosInput = document.querySelector('.addPhotosInput');
const allPhotos = (addPhotosInput.files).length;
const imgPrev = document.querySelector('.imgPrev img');
const previous = document.querySelector('.previousPhoto');
const next = document.querySelector('.nextPhoto');
const cropOptions = document.querySelectorAll('.cropOptions input');
const axisy = document.querySelector('.axisy');
const axisx = document.querySelector('.axisx');
const heightCanva = document.querySelector('.heightCanva');
const widthCanva = document.querySelector('.widthCanva');

const addPrevImg = () => {
    let file = addPhotosInput.files[i];
    imgPrev.src = URL.createObjectURL(file);
}

const cropCanva = () => {
    cropOptions.forEach(option => {
        option.addEventListener('click', () => {
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext("2d");
            canvas.width = imgPrev.naturalWidth;
            canvas.height = imgPrev.naturalHeight;
            let x0 = (canvas.width / 100) * axisx.value;
            let y0 = (canvas.height / 100) * axisy.value;
            let leftWidht = canvas.width - x0;
            let w0 = leftWidht - (leftWidht / 100) * widthCanva.value;
            let leftHeight = canvas.height - y0;
            let h0 = leftHeight - (leftHeight / 100) * heightCanva.value;
            ctx.drawImage = (imgPrev, x0, y0, w0, h0, 0, 0, canvas.width, canvas.height);
            console.log(x0);
        })
    })
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
            cropCanva();
        }
    })
    next.addEventListener('click', function () {
        if (i < allPhotos - 1) {
            i++;
            addPrevImg();
            cropCanva();
        }
    })
    if (i == 0) {
        addPrevImg();
        cropCanva();
    }
})


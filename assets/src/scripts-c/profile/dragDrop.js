function updateThumbnailComponent(dropZoneElement, file){
    
    let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

    if(dropZoneElement.querySelector(".drop-zone__description")){
        dropZoneElement.querySelector(".drop-zone__description").remove();
    }
    if(dropZoneElement.querySelector(".drop-zone i")){
        dropZoneElement.querySelector(".drop-zone i").remove();
    }
    if(thumbnailElement){
        thumbnailElement.classList.add('drop-zone__thumb');
        dropZoneElement.appendChild(thumbnailElement);
    }

    if(file.type.startsWith("image/")){
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => {
            dropZoneElement.style.backgroundImage = 'none';
            thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
        };
    }else{
        thumbnailElement.style.backgroundImage = null;
    }
}


function dragDropComponent(){

    document.querySelectorAll(".drop-zone__file").forEach( inputElement => {
        // Obtener contenedor
        const dropZoneElement = inputElement.closest(".drop-zone");

        dropZoneElement.addEventListener("click", e => {
            inputElement.click();
        });

        inputElement.addEventListener("change", e => {
            if(inputElement.files.length){
                updateThumbnailComponent(dropZoneElement, inputElement.files[0]);
            }
        });

        dropZoneElement.addEventListener('dragover', e => {
            e.preventDefault();
            dropZoneElement.classList.add('drop-zone--over');
        });

        ['dragleave','dragend'].forEach(type => {
            dropZoneElement.addEventListener(type, e => {
                dropZoneElement.classList.remove('drop-zone--over');
            });
        });

        dropZoneElement.addEventListener("drop", e => {
            e.preventDefault();
            if(e.dataTransfer.files.length){
                inputElement.files = e.dataTransfer.files;
                updateThumbnailComponent(dropZoneElement, e.dataTransfer.files[0]);
            } 
        });
       
    });
}

export default dragDropComponent;
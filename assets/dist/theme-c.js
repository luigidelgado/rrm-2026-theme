/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ([
/* 0 */,
/* 1 */
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* export default binding */ __WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ function __WEBPACK_DEFAULT_EXPORT__() {
    const tabs = document.querySelectorAll('.timeline-box .tabs .tab');
    const details = document.querySelectorAll('.timeline-box .tab-content');
    const images = document.querySelectorAll('.tab-content-image');

    for (let i = 0; i < tabs.length; i++) {
        tabs[i].addEventListener("click", () => {
            for (let j = 0; j < details.length; j++) {
                details[j].classList.remove("tab-content--active");
            }

            for (let k = 0; k < tabs.length; k++) {
                tabs[k].classList.remove("tab--active");
            }

            for (let l = 0; l < tabs.length; l++) {
                images[l].classList.remove("tab-content-image--active");
            }

            details[i].classList.add("tab-content--active");
            tabs[i].classList.add("tab--active");
            images[i].classList.add("tab-content-image--active");
        });
    }
}
    

/***/ }),
/* 2 */
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* export default binding */ __WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ function __WEBPACK_DEFAULT_EXPORT__() {
    const boxes = document.querySelectorAll(".faq-box");

    function toggleBoxes(e){
        e.stopPropagation();
        e.target.closest('.faq-box').classList.toggle("active");
    }

    boxes.forEach(box => box.addEventListener('click', toggleBoxes));

    const items = document.querySelectorAll(".accordion button");
    //console.log(items);
    function toggleAccordion() {
        const itemToggle = this.getAttribute('aria-expanded');
        
        for (let i = 0; i < items.length; i++) {
            items[i].setAttribute('aria-expanded', 'false');
        }
        
        if (itemToggle == 'false') {
            this.setAttribute('aria-expanded', 'true');
        }
    }

    items.forEach(item => item.addEventListener('click', toggleAccordion));

}

/***/ }),
/* 3 */
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* export default binding */ __WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ function __WEBPACK_DEFAULT_EXPORT__() {
    const tabs = document.querySelectorAll('.rules__tabs .rule-tab');
    const details = document.querySelectorAll('.rule-info');

    /* Cada tab debe tener su infoormación correspondiente */
    if(tabs.length !== details.length) return;

    for (let i = 0; i < tabs.length; i++) {
        tabs[i].addEventListener("click", () => {
            for (let j = 0; j < details.length; j++) {
                details[j].classList.remove("rule-info--active");
            }

            for (let k = 0; k < tabs.length; k++) {
                tabs[k].classList.remove("rule-tab--active");
            }

            details[i].classList.add("rule-info--active");
            tabs[i].classList.add("rule-tab--active");
        });
    }
}
    

/***/ }),
/* 4 */
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* export default binding */ __WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ function __WEBPACK_DEFAULT_EXPORT__() {

    let labelNames = document.querySelectorAll('.rrm.register .pmrow label');
    let inputElement = document.querySelectorAll('.rrm.register .pmrow input');
    //console.log(labelNames);
    let textLabel = [];
    labelNames.forEach(item => textLabel.push(item.textContent) );
    //console.log(textLabel);
    inputElement.forEach( (item, index) => {
        //console.log(item,index);
        //console.log(item.getAttribute('id'));
        let iconEl = document.createElement("i");
        if(item.getAttribute('id') === "user_login"){
            iconEl.classList.add('icon-account_circle')
        }
        if(item.getAttribute('id') === "user_email"){
            iconEl.classList.add('icon-mail')
        }
        if(item.getAttribute('id') === "user_pass" || item.getAttribute('id') === "confirm_pass"){
            iconEl.classList.add('icon-lock')
        }
        item.after(iconEl);
        item.placeholder = textLabel[index];
    });
}

/***/ }),
/* 5 */
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* export default binding */ __WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ function __WEBPACK_DEFAULT_EXPORT__() {
    let widget = document.querySelectorAll('.widget_block');    
}

/***/ }),
/* 6 */
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* export default binding */ __WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
// $('.minus').click(function () {
//     var $input = $(this).parent().find('input');
//     var count = parseInt($input.val()) - 1;
//     count = count < 1 ? 1 : count;
//     $input.val(count);
//     $input.change();
//     return false;
// });

/* harmony default export */ function __WEBPACK_DEFAULT_EXPORT__() {

    const cartForm = document.querySelector(".entry-summary .cart");

    if (typeof(cartForm) === 'undefined' || cartForm === null) return;

    let maxQuantity;
    if (document.querySelector(".quantity .qty")) {
        maxQuantity = document.querySelector(".quantity .qty").getAttribute("max");
    }
    //console.log(maxQuantity);
    let count = 0;
    let addRemoveItems = function(e,action){
        let inputQuantity;
        
        let quantityWarn =  document.querySelector('.quantity-warning');
        if (typeof(quantityWarn) !== 'undefined' && quantityWarn !== null) quantityWarn.remove();
        
        if(action === "remove"){
            inputQuantity = e.nextElementSibling;
            if(inputQuantity.value === "") inputQuantity.value = 0;
            count = parseInt(inputQuantity.value) - 1;
        }
        if(action === "add"){ 
            inputQuantity = e.previousElementSibling;
            if(inputQuantity.value === "") inputQuantity.value = 0;
            count = parseInt(inputQuantity.value) + 1;
        }
        //console.log("count",count);
        count = count < 1 ? 0 : count;
        let wrapperSingleButton = document.querySelector(".wrapper-single-buttons");
        let quantityWarning = document.createElement("div");
        if(maxQuantity !== undefined && maxQuantity !== null && maxQuantity !== "" && maxQuantity > 0){
            if(count > Number(maxQuantity)) {    
                quantityWarning.classList.add("quantity-warning");
                quantityWarning.innerText = "No se pueden agregar más productos";
                wrapperSingleButton.before(quantityWarning);
                return;
            } 
        }
      
        inputQuantity.value = count;
    };

    cartForm.addEventListener("click",function(e){
        if(e.target.tagName === "I"){
            if(e.target.classList.contains("icon-less")) addRemoveItems(e.target.parentNode,"remove");
            if(e.target.classList.contains("icon-add-fill")) addRemoveItems(e.target.parentNode,"add");
            return;
        }
        if(e.target.classList.contains("minus")) addRemoveItems(e.target,"remove");
        if(e.target.classList.contains("plus")) addRemoveItems(e.target,"add");
    },true);
    
}



/***/ }),
/* 7 */
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   sliderObjConfig: () => (/* binding */ sliderObjConfig)
/* harmony export */ });
/* Configuraciones del slider de home */

/* Configuraciones del slider de home [Featured products] */

/* Configuraciones del slider upsell */
let sliderObjConfig = {
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        992: {
            slidesPerView: 3,
            spaceBetween: 40,
        },
        1200: {
            slidesPerView: 4,
        }
    },
    //centeredSlides: true,
    spaceBetween: 40,
    navigation: {
        nextEl: ".swiper-button-next-upsell",
        prevEl: ".swiper-button-prev-upsell",
    },
}



/***/ }),
/* 8 */
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   configSlider: () => (/* binding */ configSlider)
/* harmony export */ });
let configSlider = {
  infinite: false,
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: true,
  dots: false,
  prevArrow:"<div class='slick-prev pull-left'><i class='icon-arrow_back_ios' aria-hidden='true'></i></div>",
  nextArrow:"<div class='slick-next pull-right'><i class='icon-arrow_forward_ios' aria-hidden='true'></i></div>",
  autoplay: false,
  centerMode: false,
  centerPadding: "0px",
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        //dots: true
      }
    },
    // {
    //   breakpoint: 992,
    //   settings: {
    //     slidesToShow: 2,
    //     slidesToScroll: 1
    //   }
    // },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
}



/***/ }),
/* 9 */
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   validateBikeEditForm: () => (/* binding */ validateBikeEditForm),
/* harmony export */   validateBikeForm: () => (/* binding */ validateBikeForm),
/* harmony export */   validateChallengueForm: () => (/* binding */ validateChallengueForm),
/* harmony export */   validateUpdateProfileForm: () => (/* binding */ validateUpdateProfileForm),
/* harmony export */   validateUpdateProfileFormModal: () => (/* binding */ validateUpdateProfileFormModal)
/* harmony export */ });
function validateUpdateProfileForm(){
    const validatorUpdateProfile = new JustValidate('#update-profile__form',{
        //validateBeforeSubmitting: true,
        //submitFormAutomatically: true,
    });
    validatorUpdateProfile
    .addField('#update_first_name', 
    [
        {
            rule: 'required',
            errorMessage: 'Campo requerido',
        },
    ])
    .addField('#update_last_name', 
    [
        {
            rule: 'required',
            errorMessage: 'Campo requerido',
        },
    ])
    .addField('#update_email', 
    [
        {
            rule: 'required',
            errorMessage: 'Campo requerido',
        },
    ])
    .addField('#update_user_login', 
    [
        {
            rule: 'required',
            errorMessage: 'Campo requerido',
        },
    ])
    .addField('#update_date_birth', 
    [
        {
            rule: 'required',
            errorMessage: 'Campo requerido',
        },
    ])
    .addField('#update_web', [
        {
          rule: 'customRegexp',
          value: /(https:\/\/www\.|http:\/\/www\.|https:\/\/|http:\/\/)?[a-zA-Z]{2,}(\.[a-zA-Z]{2,})(\.[a-zA-Z]{2,})?\/[a-zA-Z0-9]{2,}|((https:\/\/www\.|http:\/\/www\.|https:\/\/|http:\/\/)?[a-zA-Z]{2,}(\.[a-zA-Z]{2,})(\.[a-zA-Z]{2,})?)|(https:\/\/www\.|http:\/\/www\.|https:\/\/|http:\/\/)?[a-zA-Z0-9]{2,}\.[a-zA-Z0-9]{2,}\.[a-zA-Z0-9]{2,}(\.[a-zA-Z0-9]{2,})?/g,
          errorMessage: 'No es una URL válida',
        },
      ]);

    return validatorUpdateProfile;
}

function validateUpdateProfileFormModal(){
    const validatorUpdateProfile = new JustValidate('#update-profile__form-modal',{
        //validateBeforeSubmitting: true,
        //submitFormAutomatically: true,
    });
    validatorUpdateProfile
    .addField('#update_first_name', 
    [
        {
            rule: 'required',
            errorMessage: 'Campo requerido',
        },
    ])
    .addField('#update_last_name', 
    [
        {
            rule: 'required',
            errorMessage: 'Campo requerido',
        },
    ])
    .addField('#update_email', 
    [
        {
            rule: 'required',
            errorMessage: 'Campo requerido',
        },
    ])
    .addField('#update_user_login', 
    [
        {
            rule: 'required',
            errorMessage: 'Campo requerido',
        },
    ])
    .addField('#update_date_birth', 
    [
        {
            rule: 'required',
            errorMessage: 'Campo requerido',
        },
    ])
    .addField('#update_web', [
        {
          rule: 'customRegexp',
          value: /(https:\/\/www\.|http:\/\/www\.|https:\/\/|http:\/\/)?[a-zA-Z]{2,}(\.[a-zA-Z]{2,})(\.[a-zA-Z]{2,})?\/[a-zA-Z0-9]{2,}|((https:\/\/www\.|http:\/\/www\.|https:\/\/|http:\/\/)?[a-zA-Z]{2,}(\.[a-zA-Z]{2,})(\.[a-zA-Z]{2,})?)|(https:\/\/www\.|http:\/\/www\.|https:\/\/|http:\/\/)?[a-zA-Z0-9]{2,}\.[a-zA-Z0-9]{2,}\.[a-zA-Z0-9]{2,}(\.[a-zA-Z0-9]{2,})?/g,
          errorMessage: 'No es una URL válida',
        },
    ]);

    return validatorUpdateProfile;
}

function validateBikeEditForm(){

    const validatorEdit = new JustValidate('#edit-bike-form',{
        validateBeforeSubmitting: true,
    });
    validatorEdit
    .addField('#bike-edit-name', 
    [
        {
            rule: 'required',
            errorMessage: 'Campo requerido',
        },
        {
            rule: 'minLength',
            value: 3,
            errorMessage: 'Este campo debería de tener al menos 3 carácteres',
        },
        {
            rule: 'maxLength',
            value: 30,
            errorMessage: 'Este campo debería de tener maximo 30 carácteres',
        },
    ])
    // .addField('#bike-year', 
    // [
    //     {
    //         rule: 'required',
    //         errorMessage: 'Campo requerido',
    //     },
    // ])
    .addField('#bike-edit-brand', 
    [
        {
            rule: 'required',
            errorMessage: 'Campo requerido',
        },
    ])
    .addField('#bike-edit-color', 
    [
        {
            rule: 'required',
            errorMessage: 'Campo requerido',
        },
    ])
    .addField('#bike-edit-model', 
    [
        {
            rule: 'required',
            errorMessage: 'Campo requerido',
        },
    ])
    // .addField('#bike-status', 
    // [
    //     {
    //         rule: 'required',
    //         errorMessage: 'Campo requerido',
    //     },
    // ])
    // .addField('#bike-style', 
    // [
    //     {
    //         rule: 'required',
    //         errorMessage: 'Campo requerido',
    //     },
    // ])
    .addField('#bike-edit-image', 
    [
        {
            rule: 'files',
            value: {
              files: {
                extensions: ['jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG'],
                maxSize: 2000000,
                // minSize: 10000,
                types: ['image/jpeg', 'image/jpg', 'image/png'],
              },
            },
            errorMessage: 'La imagen tiene una o varias propiedades inválidas(extension, tamaño(Max. 2MB) , tipo, etc)',
        },
    ])
    return validatorEdit;
}

function validateBikeForm(){
    const validator = new JustValidate('#upload-bike-form');
    
    validator
        .addField('#bike-name', 
        [
            {
                rule: 'required',
                errorMessage: 'Campo requerido',
            },
            {
                rule: 'minLength',
                value: 3,
                errorMessage: 'Este campo debería de tener al menos 3 carácteres'
            },
            {
                rule: 'maxLength',
                value: 30,
                errorMessage: 'Este campo debería de tener maximo 30 carácteres',
            },
        ])
        // .addField('#bike-year', 
        // [
        //     {
        //         rule: 'required',
        //         errorMessage: 'Campo requerido',
        //     },
        // ])
        .addField('#bike-brand', 
        [
            {
                rule: 'required',
                errorMessage: 'Campo requerido',
            },
        ])
        .addField('#bike-color', 
        [
            {
                rule: 'required',
                errorMessage: 'Campo requerido',
            },
        ])
        .addField('#bike-model', 
        [
            {
                rule: 'required',
                errorMessage: 'Campo requerido',
            },
        ])
        // .addField('#bike-status', 
        // [
        //     {
        //         rule: 'required',
        //         errorMessage: 'Campo requerido',
        //     },
        // ])
        // .addField('#bike-style', 
        // [
        //     {
        //         rule: 'required',
        //         errorMessage: 'Campo requerido',
        //     },
        // ])
        .addField('#bike-image', 
        [
            {
                rule: 'minFilesCount',
                value: 1,
                errorMessage: 'Selecciona una imagen',
            },
            {
                rule: 'files',
                value: {
                  files: {
                    extensions: ['jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG'],
                    maxSize: 2000000,
                    // minSize: 10000,
                    types: ['image/jpeg', 'image/jpg', 'image/png'],
                  },
                },
                errorMessage: 'La imagen tiene una o varias propiedades inválidas(extension, tamaño(Max. 2MB) , tipo, etc)',
            },
        ])
        return validator;
}

function validateChallengueForm(){
    const validator = new JustValidate('#upload-challengue-form');
    validator
        .addField('#challengue-title', 
        [
            {
                rule: 'required',
                errorMessage: 'Campo requerido',
            },
            {
                rule: 'minLength',
                value: 3,
                errorMessage: 'Este campo debería de tener al menos 3 carácteres'
            },
        ])
        .addField('#challengue-description', 
        [
            {
                rule: 'required',
                errorMessage: 'Campo requerido',
            },
            {
                rule: 'minLength',
                value: 3,
                errorMessage: 'Este campo debería de tener al menos 3 carácteres'
            },
        ])
        .addField('#challengue-challengue', 
        [
            {
                rule: 'required',
                errorMessage: 'Campo requerido',
            },
        ])
        .addField('#challengue-state', 
        [
            {
                rule: 'required',
                errorMessage: 'Campo requerido',
            },
        ])
        .addField('#challengue-activity', 
        [
            {
                rule: 'required',
                errorMessage: 'Campo requerido',
            },
        ])
        .addField('#challengue-image', 
        [
            {
                rule: 'minFilesCount',
                value: 1,
                errorMessage: 'Selecciona una imagen',
            },
            {
                rule: 'files',
                value: {
                  files: {
                    extensions: ['jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG'],
                    maxSize: 2000000,
                    // minSize: 10000,
                    types: ['image/jpeg', 'image/jpg', 'image/png'],
                  },
                },
                errorMessage: 'La imagen tiene una o varias propiedades inválidas(extension, tamaño(Max. 2MB) , tipo, etc)',
            },
        ])
       return validator;
}



/***/ }),
/* 10 */
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   challengueGallery: () => (/* binding */ challengueGallery),
/* harmony export */   gallery: () => (/* binding */ gallery)
/* harmony export */ });
/* harmony import */ var _profile__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(11);


function challengueGallery($, itemGallery){

    const lightGalleryObjSettings = {
        plugins: [lgZoom, lgThumbnail,lgFullscreen,lgShare, lgAutoplay, lgHash],
        exThumbImage: 'data-exthumbimage',
        speed: 500,
        controls: true,
        download: true,
        thumbWidth: 93,
        thumbHeight: 62,
        thumbMargin: 2,
        fullScreen: true,
        autoplay: true,
        appendAutoplayControlsTo: '.lg-toolbar',
        share: true,
        customSlideName: true,
        mobileSettings: { controls: false, showCloseIcon: true, download: false, },
        extraProps: ['postId'],
        hash: true
    }

    let galleryItem = document.querySelectorAll(itemGallery);
     galleryItem.forEach( item => {
        item.addEventListener("click",function(e){
            e.preventDefault();
            item.nextElementSibling.firstElementChild.click();
        })
    });
    let actualSlide = null;
    let lightGalleries = document.querySelectorAll('.lightbox');
    for (let i = 0; i < lightGalleries.length; i++) {
        lightGalleries[i].id = 'gal' + i;
        let galleryItem = document.getElementById('gal' + i);
        galleryItem.addEventListener("click",function(e){
            e.preventDefault();
            this.firstElementChild.click();
        });
        
        galleryItem.addEventListener('lgBeforeSlide', (event) => {
            const { index, prevIndex } = event.detail;
            actualSlide = index;
            jQuery(galleryItem).addClass("active");
            // console.log(index);
            //console.log(galleryItem);
            //console.log(galleryItem.dataset.idPost);
            //galleryItem.data("id-user");
        });

        galleryItem.addEventListener('lgAfterOpen', (event) => {
            //console.log(event);
            let classErase = "";
            let isUserAllowedErase = document.querySelector("#is_user_logged_profile").value;
            if(isUserAllowedErase === "true"){
                classErase = "show";
            }else{
                classErase = "hidden";
            }
            const galleryErase = document.querySelector('.gallery-erase');
            if(galleryErase == null){
                $('.lg-toolbar').append('<a href=\"#\" class=\"lg-icon gallery-erase '+classErase+'\"><i class=\"icon-delete\"></i></a>');
            }
        });

        galleryItem.addEventListener('lgBeforeClose', (event) => {
            jQuery(galleryItem).removeClass("active");
        });

        // console.log(lightGalleries[i].dataset.gallery);
        // lightGalleryObjSettings.customSlideName = lightGalleries[i].dataset.gallery;
        //console.log("lightGallery",galleryItem);
        lightGalleryObjSettings.galleryId = 'gal' + i;
        lightGallery(galleryItem, lightGalleryObjSettings);
    }

    $(document).on("click",'.gallery-erase',function(e){
        e.preventDefault();
        if (confirm("¿Deseas eliminar esta fotografía?") != true) {
            return;
        } 
        //console.log("Aqui se borra");
        // console.log("actualSlide",actualSlide);
        // console.log(jQuery(".tab-challengue__item").children().eq(actualSlide).data("post-id"));
        let postId = jQuery(".tab-challengue__item.active").children().eq(actualSlide).data("post-id");
        // console.log("postId",postId);
        // console.log("id_user_logged",u_data.id_user_logged);
        // return;
        jQuery.ajax({
            type: 'POST',
            url: pm_ajax_object.ajax_url,
            data: {
                action: 'delete_post_gallery',
                post_id: postId,
                user_id_logged: u_data.id_user_logged
            },
            beforeSend: function () {
                //Quitar modal
                //console.log(itemGallery);
                
                jQuery(".lg-close").click();
                
                setTimeout(function(){
                    jQuery(".loader-layer").show();
                },400)
                setTimeout(function(){
                    jQuery(".loader").show();
                },500)
            },
            complete: function () {
                setTimeout(function(){
                    jQuery(".loader").hide();
                }, 500);
                setTimeout(function(){
                    jQuery(".loader-layer").hide();
                },600)
            },
            success: function(response) {
                console.log(response);
               
                //jQuery('#message').html(response);
                if(response.success){
                    jQuery("#modalMessage .modal-body > div").addClass("success").text(response.data);
                    (0,_profile__WEBPACK_IMPORTED_MODULE_0__.addCheckSuccessModal)();
                }
                else{
                    jQuery("#modalMessage .modal-body > div").text(response.data[0].message);
                }
                setTimeout(function(){
                    jQuery("#modalMessage").modal('show');
                }, 1500);
    
                setTimeout(function(){
                    window.location.reload();
                }, 2000);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                jQuery("#modalMessage .modal-body > div").text(xhr.responseText);
            }
        });

    });

}

function gallery(){
    lightGallery(document.getElementById('gallery-grid'),{
        plugins: [lgZoom, lgThumbnail,lgFullscreen,lgShare, lgAutoplay, lgHash],
        speed: 500,
        controls: true,
        download: true,
        thumbWidth: 93,
        thumbHeight: 62,
        thumbMargin: 2,
        fullScreen: true,
        autoplay: true,
        appendAutoplayControlsTo: '.lg-toolbar',
        share: false,
        customSlideName: true,
        selector: '.gallery-item',
        mobileSettings: { controls: false, showCloseIcon: true, download: false, }
    });
}



/***/ }),
/* 11 */
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   addCheckSuccessModal: () => (/* binding */ addCheckSuccessModal),
/* harmony export */   datepicker: () => (/* binding */ datepicker),
/* harmony export */   deleteBikeGarage: () => (/* binding */ deleteBikeGarage),
/* harmony export */   dragDrop: () => (/* binding */ dragDrop),
/* harmony export */   editBikeGarage: () => (/* binding */ editBikeGarage),
/* harmony export */   initProfile: () => (/* binding */ initProfile),
/* harmony export */   pendingAproval: () => (/* binding */ pendingAproval),
/* harmony export */   showHideSettings: () => (/* binding */ showHideSettings),
/* harmony export */   svgAnimation: () => (/* binding */ svgAnimation),
/* harmony export */   tabChallengue: () => (/* binding */ tabChallengue)
/* harmony export */ });
/* harmony import */ var _validation_forms__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(9);



function addCheckSuccessModal(){
    let icon = document.createElement("i");
    icon.classList.add("icon-check_circle");
    let bodyModal = document.querySelector("#modalMessage .modal-body > div");
    bodyModal.prepend(icon);
}

/*
    Datepicker form bike
    (Start)
*/

function datepicker(){
    jQuery('body').on('focus',".datepicker", function(){
        if( jQuery(this).hasClass('hasDatepicker') === false )  {
            jQuery(this).datepicker({
                minViewMode: 2,
                format: 'yyyy',
                endDate: '+1y'
                //endDate: new Date(),
                //format: 'dd-M-yy',
                //maxDate: new Date()
            });
        }
    });
}

/*
    Datepicker form bike
    (End)
*/

/*
    Selecciona la primera tab de ajustes 
    (Start)
*/
function initProfile(){
    jQuery('#pg-settings .pm-section-left-panel ul li a:first').addClass('active');
    jQuery('#pg-settings .pm-section-right-panel .pm-section-content:first').show();

    jQuery('#modalMultiStep #pg-edit-profile').attr("id","pg-edit-profile2");
}
/*
    Selecciona la primera tab de ajustes 
    (End)
*/

/*
    Se modifica el llenado del SVG refernte a cada desafio de progreso
    (Start)
*/
function fillSvg(element, percentage = 0){
    const totalPercentage = 100;
    const wheelPath = element.querySelectorAll(".wheel-path");
    const totalLength = wheelPath.length;
    const totalSections = totalPercentage / totalLength;
    const totalFill = percentage / totalSections;
    let color = "#4d4d4d";
    wheelPath.forEach(
        (element, index) => {
            index++;
            // El primer color es hasta la mitad del circulo
            if(index <= totalLength/2) color = "#bff8b3";
            // El segundo color es un cuarto del circulo
            if(index >= totalLength/2 + 1 && index <= totalLength - totalLength/4) color = "#79f1f0"
            // El tercer color es un cuarto del circulo
            if(index >= totalLength - (totalLength/4 - 1) && index <= totalLength) color = "#f6e59f"
            if(index <= totalFill) element.style.fill = color;
        }
    );
}

function svgAnimation(){
    const wheels = document.querySelectorAll('.wheel');
    wheels.forEach(element => fillSvg(element,element.dataset.percentage));    
}
/*
    Se modifica el llenado del SVG refernte a cada desafio de progreso
    (End)
*/

function updateThumbnail(dropZoneElement, file){
    //console.log(dropZoneElement, file);
    let thumbnailElement = dropZoneElement.querySelector(".drop-zone-profile__thumbnail");
    thumbnailElement.dataset.label = file.name;

    if(!file.type.startsWith("image/")) return null;
      
    if(file.type.startsWith("image/"))
    {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => {
            if(thumbnailElement.querySelector("img")) thumbnailElement.querySelector("img").remove()
            //thumbnailElement.querySelector("img").remove();
            thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
        };
    }

}

/* Funcionalidad de drag and drop*/
/* Se acoplo la funcionalidad de cortar la imagen (Profilegrid) */
function dragDrop($){
    //const buttonSkip = document.querySelector('.action-zone__skip');
    const nextModal = document.querySelector('.modal-footer .right-footer .next');
    let actionButtons = document.getElementById("changePic");
    let actionZone = document.querySelector(".action-zone");
    let actionZoneButtons = document.querySelector('.action-zone__buttons');
    let alertPic = document.querySelector('.action-zone__success');
    let cropPic = document.querySelector("#preview-avatar-profile");
    let cropPicImg = document.querySelector("#preview-avatar-profile > img");

    $('#photoimg2').on('change', function() 
    { 
        //console.log("change");
        $("#preview-avatar-profile").html('');
        $("#preview-avatar-profile").html('<div><div class="pm-loader"></div></div>');
        var pmDomColor = $(".pmagic").find("a").css('color');
        $(".pm-loader").css('border-top-color', pmDomColor);
        $('#avatar-edit-img').hide();
        $("#cropimage").ajaxForm({
        target: '#preview-avatar-profile',
        success: function()
                {
                    $("input[name='remove_image']").hide();
                    var error = $("#pg_profile_image_error").val();
                    if(error==1)
                    {
                        $("#btn-crop").hide();
                    }
                    else
                    {
                        // Mostrar botones de accion
                        actionButtons.classList.add("show"); // Se tienen que esconder hasta que pase la validacion
                        // Ocultar botones principales
                        actionZoneButtons.classList.add("hide");
           
                        $("#btn-crop").show();
                    }
                    $(".modal-footer").show();
                    var profileArea = 150;
                    var tw = $('#truewidth').val();
                    var th = $('#trueheight').val();
                    var x = 25/100*tw;
                    var y = 25/100*th;
                    if(x+profileArea>tw || y+profileArea>th)
                    {
                        x = 0;
                        y = 0;
                    }

                    if(profileArea>tw)
                    {
                        profileArea = tw;
                    } 

                    $('.jcrop-holder div div img').css('visibility','hidden');   
                    $('img#photo').Jcrop({
                       trueSize: [tw,th], 
                       aspectRatio: 1 / 1,
                       minSize:[profileArea,150], 
                       setSelect:   [ x,y,profileArea,150 ],
                       onSelect: updateCoords
                     });

                    $('#image_name').val($('#photo').attr('file-name'));
                }
        }).submit();

    });

    // buttonSkip.addEventListener("click",function(e){
    //     e.preventDefault();
    //     nextModal.click();
    // });

    function initDragDrop(){
        //action-zone__buttons
        //drop-zone
        //gravatar  
        actionButtons.classList.remove("show");
       
        actionZone.classList.remove("hide");
        
        actionZoneButtons.classList.remove("hide");
        alertPic.classList.add("hide");
    }

    function newCrop(e){   
       
        $(this).attr('disabled','disabled');
        e.preventDefault();
        let params = {
            targetUrl: pm_ajax_object.ajax_url,
            action: 'pm_upload_image',
            status: 'save',
            x: $('#x').val(),
            y : $('#y').val(),
            w: $('#w').val(),
            h : $('#h').val(),
            fullpath:$('#fullpath').val(),
            user_id:$('#user_id').val(),
            user_meta:$('#user_meta').val(),
            attachment_id:$('#attachment_id').val()
        };
            
        $.post(pm_ajax_object.ajax_url, params, function(response) 
        {
            if(response)
            {   
                //console.log(response);
                $("#preview-avatar-profile").html(response);
                $(".pm-profile-image img").remove();
                $(".pm-profile-image").prepend(response);
                alertPic.classList.remove('hide');
                setTimeout(function(){
                    initDragDrop();
                },2000);
                while (cropPic.firstChild) {
                    cropPic.removeChild(cropPic.firstChild);
                }
            }	
        });		
    }
    
    let buttonCrop = document.querySelector('#btn-crop2');
    if(typeof(buttonCrop) != 'undefined' && buttonCrop != null){
        buttonCrop.addEventListener('click',(e)=> newCrop(e));
    }

    document.querySelectorAll(".drop-zone-profile__input").forEach( inputElement => {
        const dropZoneElement = inputElement.closest(".drop-zone-profile");
        
        dropZoneElement.addEventListener("click", e => {
            actionButtons.classList.add("show");
            // Ocultar botones principales
            actionZoneButtons.classList.add("hide"); 
            inputElement.click();
            inputElement.addEventListener("cancel", e => {
                console.log("aqui se cancela");
                initDragDrop();
            });
        });

        // Agregar acciones a los botones de .action-zone__buttons (Start)
        const button_upload = document.querySelector('.action-zone__upload-photo');
        button_upload.addEventListener("click", e => {
            e.preventDefault();
            actionButtons.classList.add("show");
            inputElement.click();
            inputElement.addEventListener("cancel", e => {
                console.log("aqui se cancela");
                initDragDrop();
            });
        });
        // Agregar acciones a los botones de .action-zone__buttons (End)

        inputElement.addEventListener("change", e => {
            
            if(inputElement.files.length){
                updateThumbnail(dropZoneElement, inputElement.files[0]);
            }
        });

        dropZoneElement.addEventListener("dragover",e => {
            e.preventDefault();
            dropZoneElement.classList.add("drop-zone-porfile--over");
        });

        ["dragleave","dragend"].forEach(type => {
            dropZoneElement.addEventListener(type, e => {
                dropZoneElement.classList.remove('drop-zone-profile--over');
            })
        });

        dropZoneElement.addEventListener("drop", e => {
            e.preventDefault();
            if(e.dataTransfer.files.length){
                inputElement.files = e.dataTransfer.files;
                let event = new Event('change');
                inputElement.dispatchEvent(event);
                //updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
            }

            dropZoneElement.classList.remove("drop-zone-profile--over");
        });

    })
}

/*
    Muestra u oculta la seccion de configuracion de perfl
    (Start)
*/
function showHideSettings(){
    let settingArea = document.querySelector(".profilegrid-settings-area");
    let profileContent = document.querySelector(".profile-content");
    let buttonSettings = document.querySelectorAll(".button-settings");
    //let icon = document.querySelector(".button-settings i");
    //let buttonText = document.querySelector(".button-settings span");
    let $userBelongsToClub = jQuery(".update-profile__form-content #update_belong_to_club");
    let $userBelongsToClubValue = 0;

    function disableFieldsProfile(){
        jQuery(".update-profile__form-content #update_name_club").prop("disabled",true);
        jQuery(".update-profile__form-content #update_origin_club").prop("disabled",true);
        jQuery(".update-profile__form-content #update_number_member_clubs").prop("disabled",true);
    }

    function enableFieldsProfile(){
        jQuery(".update-profile__form-content #update_name_club").prop("disabled",false);
        jQuery(".update-profile__form-content #update_origin_club").prop("disabled",false);
        jQuery(".update-profile__form-content #update_number_member_clubs").prop("disabled",false);
    }

    function clearFieldProfile(){
        jQuery(".update-profile__form-content #update_name_club").val("");
        jQuery(".update-profile__form-content #update_origin_club").val("");
        jQuery(".update-profile__form-content #update_number_member_clubs").val("");
    }

    for(let i = 0; i < buttonSettings.length; i++){
        buttonSettings[i].addEventListener("click",function(e){
            e.preventDefault();
            console.log("click boton");
            settingArea.classList.toggle("show");
            profileContent.classList.toggle("show");
            // icon.classList.toggle("icon-settings");
            // icon.classList.toggle("icon-account_circle");
            e.target.closest('.button-settings').querySelector("i").classList.toggle("icon-settings");
            e.target.closest('.button-settings').querySelector("i").classList.toggle("icon-account_circle");
            e.target.closest('.button-settings').querySelector("span").innerText = e.target.closest('.button-settings').querySelector("span").innerText === "AJUSTES DE LA CUENTA" ? "REGRESAR AL PERFIL" : "AJUSTES DE LA CUENTA";

            /******  Validar si pertenece a un club en detalles de cuenta del perfil (Start) ********/

            $userBelongsToClubValue = $userBelongsToClub.val()
            if($userBelongsToClubValue  == 0) disableFieldsProfile()

            /******  Validar si pertenece a un club en detalles de cuenta del perfil(End) ********/


        });
    }
    
    jQuery(".update-profile__form-content #update_belong_to_club").on("change",function(){
        
        $userBelongsToClubValue = jQuery(this).val()
        console.log($userBelongsToClubValue);
        if($userBelongsToClubValue  == 1) enableFieldsProfile()

        if($userBelongsToClubValue  == 0){
            disableFieldsProfile()
            clearFieldProfile()
        }

    });
}
/*
    Muestra u oculta la seccion de configuracion de perfl
    (End)
*/

/*
    Muestra el tab o no de mis logros
    (Start)
*/
function tabChallengue(){
    let tab = document.querySelectorAll(".pm-profile-tab");
    tab.forEach(domEl => {
        let anchor = domEl.querySelector("a");
        let href = anchor.getAttribute("href");
        if(href.startsWith("#mislogros")){
            domEl.closest('li').classList.add("my-achievements");
        }
    });
}
/*
    Muestra el tab o no de mis logros
    (End)
*/

/*
    Actualizar motos (Asincrono)
    (Start)
*/
function updateBikeGarage(){
    
        jQuery.ajax({
          type: "POST",
          url: pm_ajax_object.ajax_url,
          cache: false,
          data: { action: "refresh_garage", "refresh-garage": "yes" },
        //   beforeSend: function () {
        //     jQuery(".loader").show();
        //   },
        //   complete: function () {
        //     jQuery(".loader").hide();
        //   },
          success: function (data) {
            jQuery(".tab-garage").html(data);
          },
        });
      
}
/*
    Actualizar motos (Asincrono)
    (End)
*/

/*
    Borrar Moto de garage(Asincrono)
    (Start)
*/
function deleteBikeGarage(){
    let deleteBike = (el)=>{
        //console.log(el);
        let entryID = jQuery(el).data('id-post');
        console.log(entryID);
        jQuery.ajax({
            type: 'POST',
            url: pm_ajax_object.ajax_url,
            data: {
                action: 'delete_garage_item',
                entry_id: entryID
            },
            beforeSend: function () {
                setTimeout(function(){
                    jQuery(".loader-layer").show();
                },400)
                setTimeout(function(){
                    jQuery(".loader").show();
                },500)
            },
            complete: function () {
                setTimeout(function(){
                    jQuery(".loader").hide();
                }, 500);
                setTimeout(function(){
                    jQuery(".loader-layer").hide();
                },600)
            },
            success: function(response) {
                console.log(response);
                //jQuery('#message').html(response);
                if (response.success == true || response.success == "true") {
                    jQuery("#modalMessage").modal('show');
                    jQuery("#modalMessage .modal-body > div").addClass("success").text("Se ha eliminado correctamente");
                    addCheckSuccessModal();
                    setTimeout(function(){
                        updateBikeGarage();
                    }, 1000);
                }else{
                    jQuery("#modalMessage").modal('show');
                    jQuery("#modalMessage .modal-body > div").text("Ha ocurrido un error, intentar más tarde");
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                jQuery("#modalMessage .modal-body > div").text(xhr.responseText);
            }
        });
    }

    jQuery(".pg-custom-tab-content").on("click",".garage-bike_delete-a", function(e){
        e.preventDefault();
        deleteBike(this);
    });

    jQuery('.garage-bike_delete > a').click(function(e) {
        e.preventDefault();
        deleteBike(this);
    });
}
/*
    Borrar moto de garage (Asincrono)
    (End)
*/

/*
    Actualizar información del perfil
    (Start)
*/

// Mostrar campos referentes a club(Depende si la opción "pertenece al club" es "no")
function hideFieldsProfile(){
    jQuery("#update_name_club").val("");
    jQuery("#update_origin_club").val("");
    jQuery("#update_number_member_clubs").val("");
    jQuery("#update_name_club").parent().closest('.update-profile__form-input').hide();
    jQuery("#update_origin_club").parent().closest('.update-profile__form-input').hide();
    jQuery("#update_number_member_clubs").parent().closest('.update-profile__form-input').hide();
}

// Mostrar campos referentes a club(Depende si la opción "pertenece al club" es "si")
function showFieldsProfile(){
    jQuery("#update_name_club").parent().closest('.update-profile__form-input').show();
    jQuery("#update_origin_club").parent().closest('.update-profile__form-input').show();
    jQuery("#update_number_member_clubs").parent().closest('.update-profile__form-input').show();
}

// Se verifica que el valor de "Pertenece a un club"
let belongsClub = jQuery("#update_belong_to_club").val();
if(belongsClub === "0" || belongsClub === "") hideFieldsProfile();

// Si se cambia la opción mostrar u ocultar los campos
jQuery("#update_belong_to_club").on('change', function(e){
    //console.log(e.target.value);
    if(e.target.value === "0") hideFieldsProfile();
    if(e.target.value === "1") showFieldsProfile();
});

// function stateData(stateData){
//     let selectElement = jQuery("#update_origin_state")
//     jQuery.each(stateData, function(index, item) {
//         // Crear la opción con el valor y texto del JSON
//         //console.log(item);
//         let option = jQuery('<option>').val(item.clave).text(item.nombre);
        
//         // Agregar la opción al select
//         selectElement.append(option);
//     });
// }

//console.log(jQuery("#update_origin_country"));

if(jQuery("#update_origin_country").val() == ""){
    jQuery(".parent-update-origin-state").hide();
}

// Si selecciona la opcion de méxico desplegar los estados
jQuery(".pmagic").on('change','#update_origin_country', function(e){
    console.log(e.target.value);
    if(e.target.value === "MEX"){
        jQuery(".parent-update-origin-state").show();
    }
    else{
        jQuery("#update_origin_state").val('');
        jQuery(".parent-update-origin-state").hide();
    }
});

// Actualizar datos
function updateProfileAsync(selector){

    let formData = jQuery(selector).serialize();
    //console.log("formData",formData);return;
    jQuery.ajax({
        url: pm_ajax_object.ajax_url,
        type: 'POST',
        data: {
            action: 'update_profile',
            form_data: formData
        },
        beforeSend: function () {
            setTimeout(function(){
                jQuery(".loader-layer").show();
            },400)
            setTimeout(function(){
                jQuery(".loader").show();
            },500)
        },
        complete: function () {
            setTimeout(function(){
                jQuery(".loader").hide();
            }, 500);
            setTimeout(function(){
                jQuery(".loader-layer").hide();
            },600)

            jQuery('#modalMultiStep').modal('hide');
        },
        success: function( response ) {
            // Do something on success like redirect the user
            console.log("response",response);
			if ( true === response.success ) {
                jQuery("#modalMessage .modal-body > div").addClass("success").text(response.data);
                addCheckSuccessModal();
                jQuery("#modalMessage").modal('show');
				//console.log(response.data);
			}
            else{
                jQuery("#modalMessage .modal-body > div").text(response.data[0].message);
                jQuery("#modalMessage").modal('show');
            }
        }
    })

}

//Validación del formulario
const updateProfileForm = document.querySelector('#update-profile__form.update-profile__form');
let updateProfileFormR  = typeof(updateProfileForm) != 'undefined' && updateProfileForm != null && (0,_validation_forms__WEBPACK_IMPORTED_MODULE_0__.validateUpdateProfileForm)();
    
if(typeof(updateProfileFormR ) != 'undefined' && updateProfileFormR != null){
    if(updateProfileFormR  != false){
        updateProfileFormR.onSuccess(( event ) => {
            updateProfileAsync(updateProfileForm);
        });
    }
}

const updateProfileFormModal = document.querySelector('#update-profile__form-modal.update-profile__form');
let updateProfileFormModalR  = typeof(updateProfileFormModal) != 'undefined' && updateProfileFormModal != null && (0,_validation_forms__WEBPACK_IMPORTED_MODULE_0__.validateUpdateProfileFormModal)();

if(typeof(updateProfileFormModalR ) != 'undefined' && updateProfileFormModalR != null){
    if(updateProfileFormModalR  != false){
        updateProfileFormModalR.onSuccess(( event ) => {
            updateProfileAsync(updateProfileFormModal);
        });
    }
}

/*
    Actualizar información del perfil
    (End)
*/

function editBikeAsync(entry_id){

    let name = document.querySelector("#edit-bike .upload-bike #bike-edit-name").value;
    let color = document.querySelector("#edit-bike .upload-bike #bike-edit-color").value;
    let model = document.querySelector("#edit-bike .upload-bike #bike-edit-model").value;
    let status = document.querySelector("#edit-bike .upload-bike #bike-edit-status").value;
    let style = document.querySelector("#edit-bike .upload-bike #bike-edit-style").value;
    let brand = document.querySelector("#edit-bike .upload-bike #bike-edit-brand").value;
    let image = jQuery("#edit-bike .upload-bike #bike-edit-image").prop("files")[0];
    // if(image === undefined){
    //     image = document.querySelector("#edit-bike .upload-bike #bike-edit-image").value;
    // }
 
    
    // jQuery('.drop-zone').removeAttr('style');
    // jQuery('.drop-zone__thumb').removeAttr('style');
    // jQuery('.drop-zone__init-data').empty();
    // jQuery('.drop-zone__init-data').append('<i class="icon-add_a_photo"></i><span class="drop-zone__description">Arrastra y suelta la imagen o selecciona una</span>');

    let form_data = new FormData();
    form_data.append("action", "edit_garage_item");
    form_data.append("entry_id", entry_id);
    form_data.append("name", name);
    form_data.append("color", color);
    form_data.append("model", model);
    form_data.append("status", status);
    form_data.append("style", style);
    form_data.append("brand", brand);
    form_data.append("image", image);

    jQuery.ajax({
        type: 'POST',
        url: pm_ajax_object.ajax_url,
        processData: false,
        contentType: false,
        data: form_data,
        beforeSend: function () {
            jQuery("#edit-bike").modal("hide");
            setTimeout(function(){
                jQuery(".loader-layer").show();
            },400)
            setTimeout(function(){
                jQuery(".loader").show();
            },500)
        },
        complete: function () {
            setTimeout(function(){
                jQuery(".loader").hide();
            }, 500);
            setTimeout(function(){
                jQuery(".loader-layer").hide();
            },600)
        },
        success: function(response) {
            console.log("entro aqui:", response);
            //jQuery('#message').html(response);
            if (response.success == true || response == "true") {
                jQuery("#modalMessage .modal-body > div").addClass("success").text(response.data);

                addCheckSuccessModal();

                setTimeout(function(){
                    jQuery("#modalMessage").modal('show');
                }, 700);

                // jQuery('.drop-zone').removeAttr('style');
                // jQuery('.drop-zone__thumb').removeAttr('style');
                // jQuery('.drop-zone__init-data').empty();
                // jQuery('.drop-zone__init-data').append('<i class="icon-add_a_photo"></i><span class="drop-zone__description">Arrastra y suelta la imagen o selecciona una</span>');

                updateBikeGarage();
            }

            if(response.success == false){
                jQuery("#modalMessage .modal-body > div").addClass("success").text(response.data);

                setTimeout(function(){
                    jQuery("#modalMessage").modal('show');
                }, 700);

                updateBikeGarage();
            }
        },
        error: function(xhr, status, error) {
            console.log(error);
            console.error(xhr.responseText);
            jQuery("#modalMessage .modal-body > div").html(xhr.responseText);
            jQuery("#modalMessage").modal('show');
        }
    });
}

/* Actualizar perfil (End) */

//Validar formulario antes de mandar
const bikeEditForm = document.querySelector('#edit-bike-form');
let bikeEditFormR = typeof(bikeEditForm) != 'undefined' && bikeEditForm != null && (0,_validation_forms__WEBPACK_IMPORTED_MODULE_0__.validateBikeEditForm)();
//console.log(bikeEditFormR);
if(typeof(bikeEditFormR) != 'undefined' && bikeEditFormR != null){
    if(bikeEditFormR != false){
        bikeEditFormR.onSuccess(( event ) => {
            editBikeAsync(jQuery("#edit-bike").attr("data-bike-id"));
            //event.currentTarget.submit();
        });
    }
}

// const bikeUploadForm = document.querySelector('#upload-bike-form');
// let bikeUploadFormR = typeof(bikeUploadForm) != 'undefined' && bikeUploadForm != null && validateBikeForm();

// if(typeof(bikeUploadFormR) != 'undefined' && bikeUploadFormR != null){
//     if(bikeUploadFormR != false){
//         bikeUploadFormR.onSuccess(( event ) => {
           
//         });
//     }
// }


let dragDropClone = document.querySelector('#edit-bike .drop-zone__init-data');
dragDropClone = typeof(dragDropClone ) != 'undefined' && dragDropClone  != null && dragDropClone.cloneNode( true );
let dragDropImage = document.querySelector('#edit-bike .drop-zone__thumb');
let dragDropZone = document.querySelector('#edit-bike .drop-zone');

function editBikeGarage(){

    const formEditBike = document.getElementById('edit-bike-form');
    let editBike = (el)  => {
        jQuery('#edit-bike').modal({
            keyboard: false
        })

        //Obtener los datos de la moto
        let entryID = jQuery(el).data('id-post');
        let name = jQuery(`.bike-${entryID} .name`).text();
        //console.log(name);
        //let year = jQuery(`.bike-${entryID} .year`).data("tag-id");
        let year = jQuery(`.bike-${entryID} .year`).text();
        let brand = jQuery(`.bike-${entryID} .brand`).data("tag-id");
        let color = jQuery(`.bike-${entryID} .color`).data("tag-id");
        let status = jQuery(`.bike-${entryID} .status`).data("tag-id");
        let style = jQuery(`.bike-${entryID} .style`).data("tag-id");
        var image = jQuery(`.bike-${entryID} .garage-bike__image > img`).attr("src");
        console.log(image);
        console.log(entryID);
       //Poner valores en el modal
        jQuery("#edit-bike").attr('data-bike-id',entryID);
        jQuery('#edit-bike .upload-bike #bike-edit-name').val(name);
        jQuery('#edit-bike .upload-bike #bike-edit-model').val(year);
        jQuery('#edit-bike .upload-bike #bike-edit-brand').val(brand);
        jQuery('#edit-bike .upload-bike #bike-edit-color').val(color);
        jQuery('#edit-bike .upload-bike #bike-edit-status').val(status);
        jQuery('#edit-bike .upload-bike #bike-edit-style').val(style);
        jQuery('#edit-bike .upload-bike #bike-image').val(image);
    }

    jQuery(".pg-custom-tab-content").on("click",".garage-bike_edit-a", function(e){
        e.preventDefault();
        bikeEditFormR.refresh();
        formEditBike.reset();
        dragDropZone.removeAttribute("style");
        dragDropImage.removeAttribute("style");

        jQuery('.drop-zone__init-data').empty();
        jQuery('.drop-zone__init-data').append('<i class="icon-add_a_photo"></i><span class="drop-zone__description">Arrastra y suelta la imagen o selecciona una.(Tamaño máximo permitido 2MB, medida máxima de 2560 píxeles)</span>');
        //dragDropImage.after( dragDropClone );
        //jQuery("#edit-bike .upload-bike #bike-edit-image").value = [];
        editBike(this);
    });

    jQuery('.garage-bike_edit > a').click(function(e) {
        e.preventDefault();
        bikeEditFormR.refresh();
        formEditBike.reset();
        dragDropZone.removeAttribute("style");
        dragDropImage.removeAttribute("style");

        jQuery('.drop-zone__init-data').empty();
        jQuery('.drop-zone__init-data').append('<i class="icon-add_a_photo"></i><span class="drop-zone__description">Arrastra y suelta la imagen o selecciona una. (Tamaño máximo permitido 2MB, medida máxima de 2560 píxeles)</span>');
        //dragDropImage.after( dragDropClone );
        //jQuery("#edit-bike .upload-bike #bike-edit-image").value = [];
        editBike(this);
    });
}

/******  Editar Desafio (Modal)(Start) ********/


// Limpiar campos del modal formulario challengue
function initModalChallengue(){
    //console.log("clear-form");
    jQuery('.drop-zone').removeAttr('style');
    jQuery('.drop-zone__thumb').removeAttr('style');
    jQuery('.drop-zone__init-data').empty();
    jQuery('.drop-zone__init-data').append('<i class="icon-add_a_photo"></i><span class="drop-zone__description">Arrastra y suelta la imagen o selecciona una. (Tamaño máximo permitido 2MB, medida máxima de 2560 píxeles)</span>');

    jQuery('#upload-challengue-form #challengue-title').attr("disabled",false);
    jQuery('#upload-challengue-form #challengue-description').attr("disabled",false);
    jQuery('#upload-challengue-form #challengue-challengue').attr("disabled",false);
    jQuery('#upload-challengue-form #challengue-state').attr("disabled",false);
    jQuery('#upload-challengue-form #challengue-activity').attr("disabled",false);

    jQuery('#upload-challengue-form .challengue-state').attr("disabled",false).hide();
    jQuery('#upload-challengue-form .challengue-activity').attr("disabled",false).hide();

    jQuery("#upload-challengue-form").attr("data-action", "save");
    jQuery('#upload-challengue-form').trigger("reset");
    uploadChallengueFormR.refresh();
}


// function initImageModal(){
//     jQuery('.drop-zone').removeAttr('style');
//     jQuery('.drop-zone__thumb').removeAttr('style');
//     jQuery('.drop-zone__init-data').empty();
//     jQuery('.drop-zone__init-data').append('<i class="icon-add_a_photo"></i><span class="drop-zone__description">Arrastra y suelta la imagen o selecciona una</span>');
// }



function editChallengue(){

    let entryId = jQuery("#upload-challengue-form").data("id-post");
    let challengueImage = jQuery("#challengue-image").prop("files")[0];
    let form_data = new FormData();
    form_data.append("action", "edit_challengue");
    form_data.append("entry_id", entryId);
    form_data.append("image", challengueImage);

    jQuery.ajax({
        url: pm_ajax_object.ajax_url,
        type: "post",
        contentType: false,
        processData: false,
        data: form_data,
        beforeSend: function () {
            setTimeout(function(){
                jQuery(".loader-layer").show();
            },400)
            setTimeout(function(){
                jQuery(".loader").show();
            },500)
        },
        complete: function(){
            setTimeout(function(){
                jQuery(".loader").hide();
            }, 500);
            setTimeout(function(){
                jQuery(".loader-layer").hide();
            },600)
        },
        success: function (response) {
            console.log(response);
            setTimeout(function(){
                jQuery("#upload-challengue").modal("hide");
            },1000);
            if(response.success){
                jQuery("#modalMessage .modal-body > div").addClass("success").text(response.data);
                addCheckSuccessModal();
            }
            else{
                jQuery("#modalMessage .modal-body > div").text(response.data);
            }
            setTimeout(function(){
                jQuery("#modalMessage").modal('show');
            }, 1500);

            setTimeout(function(){
                window.location.reload();
            }, 2000);

        },
        error: function(xhr, status, error) {
            console.log(error);
            //console.error(xhr.responseText);
            setTimeout(function(){
                jQuery("#upload-challengue").modal("hide");
            },1000);
            jQuery("#modalMessage .modal-body > div").text(error);
            setTimeout(function(){
                jQuery("#modalMessage").modal('show');
            }, 1500);
        }
    });
    
}

/******  Editar Desafio (Modal)(Start) ********/

/******  Subir Desafio (Modal)(Start) ********/

function addChallengue(){
    let challengueTitle = document.getElementById("challengue-title").value;
    let challengueDescription = document.getElementById("challengue-description").value;
    let challengueChallengue = document.getElementById("challengue-challengue").value;
    let challengueState = document.getElementById("challengue-state").value;
    let challengueActivity = document.getElementById("challengue-activity").value;
    let challengueImage = jQuery("#challengue-image").prop("files")[0];
    // console.log(challengueImage);
    // return;
    let form_data = new FormData();
    form_data.append("action", "save_challengue");
    form_data.append("challengueTitle", challengueTitle);
    form_data.append("challengueDescription", challengueDescription);
    form_data.append("challengueChallengue", challengueChallengue);
    form_data.append("challengueState", challengueState);
    form_data.append("challengueActivity", challengueActivity);
    form_data.append("image", challengueImage);

    // console.log(form_data);
    // return;

    jQuery.ajax({
        url: pm_ajax_object.ajax_url,
        type: "post",
        contentType: false,
        processData: false,
        data: form_data,
        beforeSend: function () {
            setTimeout(function(){
                jQuery(".loader-layer").show();
            },400)
            setTimeout(function(){
                jQuery(".loader").show();
            },500)
        },
        complete: function(){
            setTimeout(function(){
                jQuery(".loader").hide();
            }, 500);
            setTimeout(function(){
                jQuery(".loader-layer").hide();
            },600)
        },
        success: function (response) {
            console.log(response);
            setTimeout(function(){
                jQuery("#upload-challengue").modal("hide");
            },1000);
            if(response.success){
                jQuery("#modalMessage .modal-body > div").addClass("success").text(response.data);
                addCheckSuccessModal();
            }
            else{
                jQuery("#modalMessage .modal-body > div").text(response.data);
            }
            setTimeout(function(){
                jQuery("#modalMessage").modal('show');
            }, 1500);

            setTimeout(function(){
                window.location.reload();
            }, 2000);

        },
        error: function(xhr, status, error) {
            console.log(error);
            //console.error(xhr.responseText);
            setTimeout(function(){
                jQuery("#upload-challengue").modal("hide");
            },1000);
            jQuery("#modalMessage .modal-body > div").text(error);
            setTimeout(function(){
                jQuery("#modalMessage").modal('show');
            }, 1500);
        }
    });
}

const uploadChallengueForm = document.querySelector('#upload-challengue-form');
let uploadChallengueFormR = typeof(uploadChallengueForm) != 'undefined' && uploadChallengueForm!= null && (0,_validation_forms__WEBPACK_IMPORTED_MODULE_0__.validateChallengueForm)();

if(typeof(uploadChallengueFormR ) != 'undefined' && uploadChallengueFormR  != null){
    if(uploadChallengueFormR  != false){
        uploadChallengueFormR .onSuccess(( event ) => {
            //console.log("guardar");
            if(jQuery("#upload-challengue-form").attr("data-action") == "save"){
                addChallengue();
            }
            else{
                editChallengue();
            }
            
        });
    }
}

/* Obtener lista de destinos a partir de la selección de Estado o Zona */

function setPlacesProfile(places, id){
    //console.log(places[id]);
    places[id]['children'].forEach(function(el){
         jQuery('<option/>').val(el.term_id).text(el.name).appendTo('#challengue-activity')
    })
    jQuery('#challengue-activity').parent().closest('.upload-input').show();
    if(jQuery('#challengue-activity').attr('disabled')) jQuery('#challengue-activity').removeAttr('disabled');
}


function setPlaces(places){
    //Validar si es galeria o del profile
    places.forEach(function(el){
        jQuery('<option/>').val(el.id).text(el.name).appendTo('#challengue-activity')
    })
    //console.log(places, id);   
}

function setStatesZones(states){
    states.forEach(function(el){
        jQuery('<option/>').val(el.id).text(el.name).appendTo('#challengue-state')
    })
}

let response2;

function getStatesZonesProfile(){

    jQuery.ajax({
        type: 'POST',
        url: pm_ajax_object.ajax_url,
        data: {
            action: 'filtered_options_upload_photo',
            challengue_id: challengueId
        },
        beforeSend: function () {
            jQuery('.validation-error').text('');
            setTimeout(function(){
                jQuery(".loader-layer").show();
            },400)
            setTimeout(function(){
                jQuery(".loader").show();
            },500)
        },
        complete: function () {
            setTimeout(function(){
                jQuery(".loader").hide();
            }, 500);
            setTimeout(function(){
                jQuery(".loader-layer").hide();
            },600)
        },
        success: function(response) {
            //console.log("response",JSON.parse(response));
            response2 = JSON.parse(response);
            const array = Object.entries(response2).map(([index, value]) => {
                return { index, ...value };
            });
            array.sort((a, b) => a.name.localeCompare(b.name));
            //console.log(array);
            if(response2.length === 0){
                let messageSuccess = document.createElement("span");
                let br = document.createElement("br");
                messageSuccess.classList.add("challengue-completed");
                let textOne = document.createTextNode("Ya has completado los destinos de este desafío.");
                messageSuccess.append(textOne);
                messageSuccess.appendChild(br);
                let textTwo = document.createTextNode("Selecciona otro desafio porfavor.");
                messageSuccess.appendChild(textTwo);
                let parent = document.querySelector(".upload-input.challengue-state");
                parent.before(messageSuccess);
                return;
            }
            jQuery('.challengue-completed').remove();
            jQuery('#challengue-state').parent().closest('.upload-input').show();
            if(jQuery('#challengue-state').attr('disabled')) jQuery('#challengue-state').removeAttr('disabled');

            for(const property of array){
                //console.log(property);
                jQuery('<option/>').val(property.index).text(property.name).appendTo('#challengue-state')
            }

            // for (const property in response2) {
            //     //console.log(response2[property].name);
            //     jQuery('<option/>').val(property).text(response2[property].name).appendTo('#challengue-state')
            // }
        },
        error: function(xhr, status, error) {
            //console.error(xhr.responseText);
            jQuery('.validation-error').fadeIn('fast');
    
            jQuery('.validation-error').text(JSON.parse(xhr.responseText).message);
            setTimeout(function() {
                jQuery('.validation-error').fadeOut('fast');
            }, 5000);
            //jQuery("#modalMessage .modal-body > div").text(xhr.responseText);
        }
    });

}

function getStatesZones(){
    //NOTA: Trae máximo 100
    const url = siteUrl + '/wp-json/wp/v2/' + 'destinos' + '?post=' + challengueId + '&parent=0&per_page=100';
    //console.log("url",url);
    console.log(challengueId);
    // Validar si esta funcionalidad es para profile(Subir foto) o para galerias

    jQuery.ajax({
        type: 'GET',
        url: url,
        beforeSend: function () {
            jQuery('.validation-error').text('');
            setTimeout(function(){
                jQuery(".loader-layer").show();
            },400)
            setTimeout(function(){
                jQuery(".loader").show();
            },500)
        },
        complete: function () {
            setTimeout(function(){
                jQuery(".loader").hide();
            }, 500);
            setTimeout(function(){
                jQuery(".loader-layer").hide();
            },600)
        },
        success: function(response) {
            //console.log(response);
            jQuery('#challengue-state').parent().closest('.upload-input').show();
            if(jQuery('#challengue-state').attr('disabled')) jQuery('#challengue-state').removeAttr('disabled');
            setStatesZones(response);
        },
        error: function(xhr, status, error) {
            //console.error(xhr.responseText);
            jQuery('.validation-error').fadeIn('fast');
    
            jQuery('.validation-error').text(JSON.parse(xhr.responseText).message);
            setTimeout(function() {
                jQuery('.validation-error').fadeOut('fast');
            }, 5000);
            //jQuery("#modalMessage .modal-body > div").text(xhr.responseText);
        }
    });
}

function getPlace(id){
    const url = siteUrl + '/wp-json/wp/v2/' + 'destinos' + '?post=' + challengueId +  '&parent=' + Number(id) + '&per_page=99';
    //const url = siteUrl + '/wp-json/wp/v2/' + 'destinos' + '?post=' + 1000000+  '&parent=' + Number(id) + '&per_page=99';
    
    jQuery.ajax({
        type: 'GET',
        url: url,
        beforeSend: function () {
            jQuery('.validation-error').text('');
            setTimeout(function(){
                jQuery(".loader-layer").show();
            },400)
            setTimeout(function(){
                jQuery(".loader").show();
            },500)
        },
        complete: function () {
            setTimeout(function(){
                jQuery(".loader").hide();
            }, 500);
            setTimeout(function(){
                jQuery(".loader-layer").hide();
            },600)
        },
        success: function(response) {
            //console.log(response);
            jQuery('#challengue-activity').parent().closest('.upload-input').show();
            if(jQuery('#challengue-activity').attr('disabled')) jQuery('#challengue-activity').removeAttr('disabled');
            setPlaces(response);
        },
        error: function(xhr, status, error) {
            // console.error(xhr.responseText);
            // console.log("error",error);
            jQuery('.validation-error').fadeIn('fast');
    
            jQuery('.validation-error').text(JSON.parse(xhr.responseText).message);
            setTimeout(function() {
                jQuery('.validation-error').fadeOut('fast');
            }, 5000);
       
        }
    });
}

let challengueId = '';

jQuery("#challengue-state").on("change",function(e){
    e.preventDefault();
    // Limpiar selects cuando se cambia el desafio
    jQuery("#challengue-activity").find('option').not(':first').remove();
    let id = jQuery(this).val();
    //validar cuando sea de profile o de galerias
    //if(typeof(id ) != 'undefined' && id  != null &&  id > 0 && id != "") getPlace(id);
    console.log(jQuery("#challengue-activity").parents("#upload-challengue-form"));
    if(jQuery("#challengue-activity").parents("#upload-challengue-form").length > 0){
        //console.log("profile");
        setPlacesProfile(response2, id);
    }
    else{
        //de console.log("Dropdown galerias");
        if(typeof(id ) != 'undefined' && id  != null &&  id > 0 && id != "") getPlace(id);
    }
   
})

jQuery("#challengue-challengue").on("change",function(e){
    e.preventDefault();
    // Limpiar selects cuando se cambia el desafio
    jQuery("#challengue-state").find('option').not(':first').remove();
    jQuery("#challengue-activity").find('option').not(':first').remove();
    jQuery("#challengue-activity").parent().closest('.upload-input').hide();
    challengueId = jQuery(this).val();
    if(jQuery("#challengue-activity").parents("#upload-challengue-form")){
        getStatesZonesProfile();
    }else{
        if(typeof(challengueId ) != 'undefined' && challengueId  != null &&  challengueId > 0 && challengueId != "") getStatesZones(challengueId);
    }
    
})

/******  Subir Desafio (Modal)(End) ********/

function pendingAproval(){

    jQuery('#upload-challengue').on('show.bs.modal', function (event) {
      
        initModalChallengue();
        // do something...
        if(jQuery(event.relatedTarget).data('source') != undefined) jQuery("#upload-challengue-form").attr("data-action", "edit");
        if(jQuery("#upload-challengue-form").attr("data-action") == "save"){
            return;
        }
        jQuery('.upload-challengue .challengue-state').show();
        jQuery('.upload-challengue .challengue-activity').show();
        //Obtener los datos del post de galera
       const entryId = jQuery(event.relatedTarget).data('source')
       jQuery('#upload-challengue-form').attr("data-id-post",entryId);
       const title = jQuery(`.aproval-gallery-item-${entryId} .aproval-gallery-item__title`).data("title");
       const description = jQuery(`.aproval-gallery-item-${entryId} [data-content]`).data("content");
       const challengue = jQuery(`.aproval-gallery-item-${entryId} [data-id-challengue]`).data("id-challengue");
       const zoneId = jQuery(`.aproval-gallery-item-${entryId} [data-zone]`).data("zone");
       const zoneName = jQuery(`.aproval-gallery-item-${entryId} [data-zone]`).data("zone-name");
       const activityId = jQuery(`.aproval-gallery-item-${entryId} [data-activity]`).data("activity");
       const activityName = jQuery(`.aproval-gallery-item-${entryId} [data-activity]`).data("activity-name");
        // //console.log(entryID);
        //Poner valores en el modal
        
        jQuery('.upload-challengue #challengue-title').val(title).attr("disabled",true);
        jQuery('.upload-challengue #challengue-description').val(description).attr("disabled",true);
        jQuery('.upload-challengue #challengue-challengue').val(challengue).attr("disabled",true);

        const optionZone = jQuery('<option></option>').attr("value", zoneId).text(zoneName).attr('selected','selected');
        const optionActivity = jQuery('<option></option>').attr("value", activityId).text(activityName).attr('selected','selected');
        jQuery('.upload-challengue #challengue-state').attr("disabled",true).append(optionZone);
        jQuery('.upload-challengue #challengue-activity').attr("disabled",true).append(optionActivity);
    });

    
}


/******  Lazy Load Pendiente de aprobación (Start) ********/

let ajaxLock = false;

if( ! ajaxLock ) {

    function ajaxNextPostsAproval() {

        ajaxLock = true;

        //How many posts there's total
        let totalPosts = parseInt( jQuery( '#total-posts-count' ).text() );
        //How many have been loaded
        let postOffset = jQuery( '.aproval-gallery-item' ).length;
        //How many do you want to load in single patch
        let postsPerPage = 5;

        //Hide button if all posts are loaded
        if( totalPosts < postOffset + ( 1 * postsPerPage ) ) {

            jQuery( '#more-posts-button' ).fadeOut();
        }


        //Parameters you want to pass to query
        var ajaxData = '&post_offset=' + postOffset + '&action=ajaxNextPostsAproval';

        //Ajax call itself
        jQuery.ajax({
            type: 'get',
            url: pm_ajax_object.ajax_url,
            data: ajaxData,
            dataType: 'json',
            beforeSend: function () {
                setTimeout(function(){
                    jQuery(".loader-layer").show();
                },400)
                setTimeout(function(){
                    jQuery(".loader").show();
                },500)
            },
            complete: function () {
                setTimeout(function(){
                    jQuery(".loader").hide();
                }, 500);
                setTimeout(function(){
                    jQuery(".loader-layer").hide();
                },600)
            },
            //Ajax call is successful
            success: function ( response ) {

                //Add new posts
                jQuery( '#pendientesdeaprobacin7 .aproval-gallery-content' ).append( response[0] );
                //Update the count of total posts
                jQuery( '#total-posts-count' ).text( response[1] );

                ajaxLock = false;
            },

            //Ajax call is not successful, still remove lock in order to try again
            error: function (xhr, status, error) {
                //console.log(xhr);
                ajaxLock = false;
                jQuery('.validation-error').fadeIn('fast');
    
                jQuery('.validation-error').text(JSON.parse(xhr.responseText).message);
                setTimeout(function() {
                    jQuery('.validation-error').fadeOut('fast');
                }, 5000);
            }
        });
    }
    jQuery( '#more-posts-button' ).click( function( e ) {

        e.preventDefault(); 
    
        ajaxNextPostsAproval(); 
    
    });
}

/******  Lazy Load Pendiente de aprobación (End) ********/

/******  Lazy Load Pendiente de aprobación (Start) ********/

let ajaxLock2 = false;

if( ! ajaxLock2 ) {

    function ajaxNextGalleryPosts() {

        ajaxLock2 = true;

        //How many posts there's total
        let totalPosts = parseInt( jQuery( '#total-posts-count-gallery' ).text() );
        //How many have been loaded
        let postOffset = jQuery( '.latest-activity .activity' ).length;
        
        //How many do you want to load in single patch
        let postsPerPage = 5;

        //Hide button if all posts are loaded
        if( totalPosts < postOffset + ( 1 * postsPerPage ) ) {
            jQuery( '.activity__button' ).fadeOut();
        }


        //Parameters you want to pass to query
        var ajaxData = '&post_offset=' + postOffset + '&action=ajaxNextGalleryPosts';

        //Ajax call itself
        jQuery.ajax({
            type: 'get',
            url: pm_ajax_object.ajax_url,
            data: ajaxData,
            dataType: 'json',
            beforeSend: function () {
                setTimeout(function(){
                    jQuery(".loader-layer").show();
                },400)
                setTimeout(function(){
                    jQuery(".loader").show();
                },500)
            },
            complete: function () {
                setTimeout(function(){
                    jQuery(".loader").hide();
                }, 500);
                setTimeout(function(){
                    jQuery(".loader-layer").hide();
                },600)
            },
            //Ajax call is successful
            success: function ( response ) {

                //Add new posts
                //jQuery( '.latest-activity' ).append( response[0] );
                jQuery( response[0] ).insertBefore( ".latest-activity > .activity__button" );
                //Update the count of total posts
                jQuery( '#total-posts-count-gallery' ).text( response[1] );

                ajaxLock2 = false;
            },

            //Ajax call is not successful, still remove lock in order to try again
            error: function (xhr, status, error) {
                //console.log(xhr);
                ajaxLock2 = false;
                jQuery('.validation-error').fadeIn('fast');
    
                jQuery('.validation-error').text(JSON.parse(xhr.responseText).message);
                setTimeout(function() {
                    jQuery('.validation-error').fadeOut('fast');
                }, 5000);
            }
        });
    }
    jQuery( '.activity__button' ).click( function( e ) {

        e.preventDefault(); 
    
        ajaxNextGalleryPosts(); 
    
    });
}

/******  Lazy Load Pendiente de aprobación (End) ********/

/******  Borrar post desde pendientes de aprobación (Start) ********/
jQuery(document).on("click",'.aproval-gallery-item__delete',function(e){
    e.preventDefault();
    if (confirm("¿Deseas eliminar esta fotografía?") != true) {
        return;
    } 
    
    let postId = jQuery(this).data("source");
    //console.log("postId",postId);
    // console.log("id_user_logged",u_data.id_user_logged);
    //return;
    jQuery.ajax({
        type: 'POST',
        url: pm_ajax_object.ajax_url,
        data: {
            action: 'delete_post_gallery',
            post_id: postId,
            user_id_logged: u_data.id_user_logged
        },
        beforeSend: function () {
            setTimeout(function(){
                jQuery(".loader-layer").show();
            },400)
            setTimeout(function(){
                jQuery(".loader").show();
            },500)
        },
        complete: function () {
            setTimeout(function(){
                jQuery(".loader").hide();
            }, 500);
            setTimeout(function(){
                jQuery(".loader-layer").hide();
            },600)
        },
        success: function(response) {
            console.log(response);
            //jQuery('#message').html(response);
            if(response.success){
                jQuery("#modalMessage .modal-body > div").addClass("success").text(response.data);
                addCheckSuccessModal();
            }
            else{
                jQuery("#modalMessage .modal-body > div").text(response.data[0].message);
            }
            setTimeout(function(){
                jQuery("#modalMessage").modal('show');
            }, 1500);

            setTimeout(function(){
                window.location.reload();
            }, 2000);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            jQuery("#modalMessage .modal-body > div").text(xhr.responseText);
        }
    });

});
/******  Borrar post desde pendientes de aprobación (End) ********/




/***/ }),
/* 12 */
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   modalSteps: () => (/* binding */ modalSteps)
/* harmony export */ });
function modalSteps($){
    //https://codepen.io/shahrilamrias/pen/vdQXmL?editors=1010
	let lastTab = $(".tab-pane:last-child").attr("id");

	$(".back, .first").hide();

	$(".next").click(function() {
		let nextId = $(".tab-pane.active")
			.next()
			.attr("id");

		$('[href="#' + nextId + '"]').tab("show");

		$(".back, .first").css("display", "unset");
		if (nextId == lastTab) {
			$(".next").hide();
			// show submit button
		}
		return false;
	});

	$(".back").click(function() {
		let backId = $(".tab-pane.active")
			.prev()
			.attr("id");
		// alert(backId);
		$('[href="#' + backId + '"]').tab("show");

		$(".next").css("display", "unset");
		if (backId === "step1") {
			$(".back, .first").css("display", "none");
		}
		return false;
	});

	$(".nav-tabs li:first-child").click(function() {
		$(".back, .first").css("display", "none");
		$(".next").css("display", "unset");
	});

	$(".nav-tabs li:not(:first-child)").click(function() {
		$(".back, .first").css("display", "unset");
	});

	$(".nav-tabs li:last-child").click(function() {
		$(".next").css("display", "none");
	});

	$(".nav-tabs li:not(:last-child)").click(function() {
		$(".next").css("display", "unset");
	});
}





/***/ }),
/* 13 */
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
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

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (dragDropComponent);

/***/ }),
/* 14 */
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* BUG  Click Ajustes de cuenta , click en el menu en perfil */

//let buttonSettings = document.querySelectorAll(".button-settings");
let buttonUpload = document.querySelector(".button-upload");
let settingArea = document.querySelector(".profilegrid-settings-area");
let profileContent = document.querySelector(".profile-content");

function isMainTabsF(){
    return document.querySelector(".profile-content").classList.contains('show');
}

function buttonDefault(statusProfile){
    let buttonSettings = document.querySelectorAll(".button-settings");

    for(let i = 0; i < buttonSettings.length; i++){
        if(statusProfile == "profile"){
            console.log("entro profile");
            console.log(buttonSettings[i]);
            buttonSettings[i].querySelector("i").classList.remove("icon-settings");
            buttonSettings[i].querySelector("i").classList.add("icon-account_circle");
            buttonSettings[i].querySelector("span").innerText = "REGRESAR AL PERFIL";
           
        }
        if(statusProfile == "settings"){
            console.log("entro settings");
            buttonSettings[i].querySelector("i").classList.remove("icon-account_circle");
            buttonSettings[i].querySelector("i").classList.add("icon-settings");
            buttonSettings[i].querySelector("span").innerText = "AJUSTES DE LA CUENTA";
        }

        
    }
}


function hideSideMenu(){
    let sideMenu = document.querySelector(".side_menu_account");
    let sideMenuDesk = document.querySelector(".side_menu_account_desk");
    sideMenu.classList.remove("active_menu");
    sideMenuDesk.classList.remove("active_menu_desk");
}

function allTo(){
    if(window.location.hash === "#pg-my-orders"){
        buttonDefault('profile');
        toMyShopping();
    }
    if(window.location.hash === "#misdesafios1" || window.location.hash === "#migarage2"){ 
        buttonDefault('settings');
        toMyMainTabs();
    }

    if(window.location.hash === "#account-settings"){
        buttonDefault('profile');
        toMySettings();
    }

    if(window.location.hash === "#upload-photo"){
        console.log("upload-photo");
        toMyChallenguePhoto();
    }
    if(window.location.hash === "#pg-delete-account"){
        buttonDefault('profile');
        if(isMainTabsF() === true){
            setTimeout(function(){
                //buttonSettings.click();
                profileContent.classList.remove("show");
                settingArea.classList.add("show");
            },2000)
            
            jQuery("#pg-edit-profile").hide();
        }
        jQuery("#sobremi4").show();
        let profileTabs = document.querySelector(".pm-section-left-panel ul");
        profileTabs = profileTabs.querySelectorAll("li");
        profileTabs.forEach(element => {
            element.querySelector("a").classList.remove("active");
            if(element.querySelector("a").getAttribute("href") === "#pg-delete-account"){
                element.querySelector("a").classList.add("active");
            }
        });

        history.replaceState(null, null, ' ');
       
    }
}

function toMyMainTabs(){
    hideSideMenu();
    if(isMainTabsF() === false){
        //buttonSettings.click();
        //isMainTabs = true;
        settingArea.classList.remove("show");
        profileContent.classList.add("show");
    }
    let mainTabs = document.querySelector(".mymenu.pm-profile-tab-wrap");
    mainTabs = mainTabs.querySelectorAll("li");
    mainTabs.forEach(element => {
        if(window.location.hash === element.childNodes[0].hash){
            console.log(element);
            element.querySelector("a").click();
        }
    });
    
    history.replaceState(null, null, ' ');
}

function toMyShopping(){
    // Quitar menu si esta activo
    hideSideMenu();
    if(isMainTabsF() === true){
        //console.log("Estaba en perfil");
        // for(let i = 0; i < buttonSettings.length; i++){
        //buttonSettings[0].click();
        //}
        settingArea.classList.add("show");
        profileContent.classList.remove("show");
    }
    setTimeout(() => {
        
        let tabOptions = document.querySelectorAll(".pm-section-left-panel ul");
        //console.log(tabOptions[0]);
        //tabOptions = tabOptions[1].querySelectorAll("li");
        tabOptions = tabOptions[0].querySelectorAll("li");
        //console.log(tabOptions);
        //tabOptions = tabOptions.querySelectorAll("li");
        tabOptions.forEach(element => {
            if(window.location.hash === element.childNodes[0].hash){
                element.querySelector("a").click();
            }
        })
        //isMainTabs = false;
    }, 2000);
}

function toMySettings(){
    hideSideMenu();
    if(isMainTabsF() === true){
        //buttonSettings.click();
        //isMainTabs = false;
        profileContent.classList.remove("show");
        settingArea.classList.add("show");
    }
}

function toMyChallenguePhoto(){
    hideSideMenu();
    buttonUpload.click();
    history.replaceState(null, null, ' ');
}

function menuOptions(){
    window.onhashchange = function(){
        console.log("onhashchange");
        allTo();
    }
    
    if(window.location.hash) {
        console.log("location.hash");
        allTo();
    }

    jQuery('.options_account a').on('click', function (event) {
        if(this.pathname === window.location.pathname){
            // Do something 
            //console.log("es la misma");
            hideSideMenu();
            allTo();
        }
    });
}

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (menuOptions);

/***/ }),
/* 15 */
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   initMap: () => (/* binding */ initMap)
/* harmony export */ });
async function initMap(childTermInfo) {
    //console.log(childTermInfo);
    const { Map } = await google.maps.importLibrary("maps");

    const center = { lat: 27.3674724, lng: -101.6700636 };

    let map = new Map(document.getElementById("map"), {
        center: center,
        zoom: 4,
        streetViewControl: false 
    });

    let styles = [
        {
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#023E58"
            }
          ]
        },
        {
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#000"
            }
          ]
        },
        {
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#ffffff"
            }
          ]
        },
        {
          "featureType": "administrative.country",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#4b6878"
            }
          ]
        },
        {
          "featureType": "administrative.land_parcel",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "administrative.land_parcel",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#64779e"
            }
          ]
        },
        {
          "featureType": "administrative.neighborhood",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "administrative.province",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#4b6878"
            }
          ]
        },
        {
          "featureType": "landscape.man_made",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#334e87"
            }
          ]
        },
        {
          "featureType": "landscape.natural",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#7592A5"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#283d6a"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "labels.text",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#6f9ba5"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#1d2c4d"
            }
          ]
        },
        {
          "featureType": "poi.business",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#023e58"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "labels.text",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#3C7680"
            }
          ]
        },
        {
          "featureType": "road",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#304a7d"
            }
          ]
        },
        {
          "featureType": "road",
          "elementType": "labels",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#7592A5"
            }
          ]
        },
        {
          "featureType": "road",
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#1d2c4d"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#2c6675"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#255763"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#b0d5ce"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#023e58"
            }
          ]
        },
        {
          "featureType": "transit",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#98a5be"
            }
          ]
        },
        {
          "featureType": "transit",
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#1d2c4d"
            }
          ]
        },
        {
          "featureType": "transit.line",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#283d6a"
            }
          ]
        },
        {
          "featureType": "transit.station",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#3a4762"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#21435B"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "labels.text",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#4e6d70"
            }
          ]
        }
    ];

    map.setOptions({ styles });

    // Generar url para mapa estatico y poder compartir
    let mapStatic = `https://maps.googleapis.com/maps/api/staticmap?center=23,-102&zoom=5&size=700x500`;
    // console.log(typeof childTermInfo);
    // console.log(childTermInfo);
    if(typeof childTermInfo == "object"){
      childTermInfo = Object.entries(childTermInfo);
    }
    //console.log(childTermInfo);
    for (let i = 0; i < childTermInfo.length; i++) {
        const destinyPlace = childTermInfo[i][1];
        //console.log(destinyPlace);
        // Validar si tiene los datos necesarios para marcar el destino del mapa
        if(+destinyPlace['latitude'] == 0 || +destinyPlace['longitude'] == 0) continue;
        const icon = {
            url: destinyPlace['challengue_url'] || 'https://icons.iconarchive.com/icons/paomedia/small-n-flat/256/map-marker-icon.png', // url
            scaledSize: new google.maps.Size(32, 32), // scaled size
            origin: new google.maps.Point(0,0), // origin
            anchor: new google.maps.Point(0, 0) // anchor
        };
        //console.log("icon: ",icon);
        let lat = +destinyPlace['latitude'];
        let lng = +destinyPlace['longitude'];
        let name = destinyPlace['term_name'];
        new google.maps.Marker({
          position: { lat, lng},
          map,
          icon,
          title: name
        });
       
        //mapStatic += `&markers=anchor:32,32%7Cicon:${encodeURIComponent(icon.url)}%7C${lat},${lng}`;
        mapStatic += `&markers=anchor:32,32%7C${lat},${lng}`;
    }

    mapStatic += `&style=feature:road%7Cvisibility:off`;
    mapStatic += `&style=feature:water%7Ccolor:0x21435B`;
    mapStatic += `&style=feature:landscape.natural%7Ccolor:0x7592A5`;
    //mapStatic += `&key=AIzaSyBjQfylrEN0CBOQyR3xmoTeG84Glk6bMis`;
    //mapStatic += `&key=AIzaSyAdHv-Zgpn_k0JMorToRLz08Sj_RNZ9VTg`;
    mapStatic += `&key=AIzaSyDZHZwywpEp7gJ1xM3f8iCl-Tuurh-8Q5E`;
    console.log(mapStatic);
    
    return mapStatic;

}



/***/ })
/******/ 	]);
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
var __webpack_exports__ = {};
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _scripts_c_history_timeline_tab__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(1);
/* harmony import */ var _scripts_c_faq_faq__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(2);
/* harmony import */ var _scripts_c_faq_rules_tab__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(3);
/* harmony import */ var _scripts_c_register_placeholder__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(4);
/* harmony import */ var _scripts_c_archive_products_filter__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(5);
/* harmony import */ var _scripts_c_product_quantity_input__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(6);
/* harmony import */ var _scripts_c_sliders_config_sliders__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(7);
/* harmony import */ var _scripts_c_sliders_slider_salon_home__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(8);
/* harmony import */ var _scripts_c_profile_validation_forms__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(9);
/* harmony import */ var _scripts_c_profile_gallery__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(10);
/* harmony import */ var _scripts_c_profile_modal_steps__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(12);
/* harmony import */ var _scripts_c_profile_dragDrop__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(13);
/* harmony import */ var _scripts_c_profile_profile__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(11);
/* harmony import */ var _scripts_c_menu_menu__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(14);
/* harmony import */ var _scripts_c_profile_map__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(15);















//import stateDataJson from './scripts-c/profile/estados.json' assert { type: 'json' };


document.addEventListener('DOMContentLoaded', async function() {
   
    let divs = document.querySelectorAll('.page-id-10 .profile .entry-content');

    // Recorre cada div y verifica si tiene hijos
    divs.forEach(function(div) {
        // Si el div no tiene hijos, agrega la clase 'no-children'
        let children = div.children;
        if (children.length === 1 && children[0].classList.contains('xs_social_share_widget')) {
            // Si la condición se cumple, agrega la clase 'only-social-share'
            div.classList.add('only-social-share');
        }
    });

   //stateData(stateDataJson);
    let textMenu = jQuery("#menu-rodando_rutas > li:last-child > a").text();
    jQuery(".rr_menu_lateral_mobile > a").text(textMenu);
    
    
    /* Tab timeline Page History (Start) */
    const historySection = document.querySelector(".history-rrm");
    if(typeof(historySection) !== 'undefined' || historySection !== null) (0,_scripts_c_history_timeline_tab__WEBPACK_IMPORTED_MODULE_0__["default"])();
    /* Tab timeline Page History (End) */

    const datepickerEl = document.querySelector('.datepicker');
    typeof(datepickerEl) != 'undefined' && datepickerEl != null && (0,_scripts_c_profile_profile__WEBPACK_IMPORTED_MODULE_12__.datepicker)();

    (0,_scripts_c_faq_faq__WEBPACK_IMPORTED_MODULE_1__["default"])();

    (0,_scripts_c_faq_rules_tab__WEBPACK_IMPORTED_MODULE_2__["default"])();

    /* Put placeholder to inputs on register form (Start) */
    (0,_scripts_c_register_placeholder__WEBPACK_IMPORTED_MODULE_3__["default"])();
    /* Put placeholder to inputs on register form (End) */
    
    (0,_scripts_c_archive_products_filter__WEBPACK_IMPORTED_MODULE_4__["default"])();

    (0,_scripts_c_product_quantity_input__WEBPACK_IMPORTED_MODULE_5__["default"])();
    
    /* Inicialiar el slider de ventas dirigidas en el single del producto */
    new Swiper(".slider-products.up-sells .swiper", _scripts_c_sliders_config_sliders__WEBPACK_IMPORTED_MODULE_6__.sliderObjConfig);
    new Swiper(".slider-products.related .swiper", _scripts_c_sliders_config_sliders__WEBPACK_IMPORTED_MODULE_6__.sliderObjConfig);
    new Swiper(".slider-products.cross-sells .swiper", _scripts_c_sliders_config_sliders__WEBPACK_IMPORTED_MODULE_6__.sliderObjConfig);

    jQuery("#home_salon_fama .right_content .slider_salon").slick(_scripts_c_sliders_slider_salon_home__WEBPACK_IMPORTED_MODULE_7__.configSlider);

    jQuery('#home_salon_fama .right_content .slider_salon').on('afterChange', function(event, slick, currentSlide) {
        let hallFame = document.querySelector("#home_salon_fama .degraded");
        slick.currentSlide >= slick.slideCount - slick.options.slidesToShow ? hallFame.classList.add("hide") : hallFame.classList.remove("hide");
    });

    // Add show tab to first option of the account settings
    (0,_scripts_c_profile_profile__WEBPACK_IMPORTED_MODULE_12__.initProfile)();

    (0,_scripts_c_profile_profile__WEBPACK_IMPORTED_MODULE_12__.svgAnimation)();

    const profilePage = document.querySelector('.page-template-template-profile');

    typeof(profilePage) != 'undefined' && profilePage != null && (0,_scripts_c_profile_profile__WEBPACK_IMPORTED_MODULE_12__.showHideSettings)();

    typeof(profilePage) != 'undefined' && profilePage != null && (0,_scripts_c_profile_modal_steps__WEBPACK_IMPORTED_MODULE_10__.modalSteps)(jQuery);

    typeof(profilePage) != 'undefined' && profilePage != null && (0,_scripts_c_profile_profile__WEBPACK_IMPORTED_MODULE_12__.dragDrop)(jQuery);

    typeof(profilePage) != 'undefined' && profilePage != null && (0,_scripts_c_profile_gallery__WEBPACK_IMPORTED_MODULE_9__.challengueGallery)(jQuery, ".tab-challengue__content");

    typeof(profilePage) != 'undefined' && profilePage != null && (0,_scripts_c_profile_dragDrop__WEBPACK_IMPORTED_MODULE_11__["default"])();

    // const galleryPage = document.querySelector('.page-template-template-gallery');
    // typeof(galleryPage) != 'undefined' && galleryPage != null && challengueGallery(jQuery, ".gallery-item__display");

    // const bikeForm = document.querySelector('#upload-bike-form');
    // typeof(bikeForm) != 'undefined' && bikeForm != null && validateBikeForm();

    const galleryPage = document.querySelector('.page-template-template-gallery');
    typeof(galleryPage) != 'undefined' && galleryPage != null && (0,_scripts_c_profile_gallery__WEBPACK_IMPORTED_MODULE_9__.gallery)()
        

    // const bikeEditForm = document.querySelector('#edit-bike-form');
    // typeof(bikeEditForm) != 'undefined' && bikeEditForm != null && validateBikeEditForm();

    //const challengueForm = document.querySelector('#upload-challengue-form');
    //typeof(challengueForm) != 'undefined' && challengueForm != null && validateChallengueForm();
    //console.log(typeof(challengueForm) != 'undefined' && challengueForm != null);

    function changeImage(){
        document.querySelector(".pg-profile-change-img #pm-change-image").addEventListener("click", function(e){
            e.preventDefault();
            jQuery('#image-profile').modal();
        });
    }

    const changeImageDom = document.querySelector(".pg-profile-change-img #pm-change-image");
    typeof(changeImageDom) != 'undefined' && changeImageDom != null && changeImage();

    (0,_scripts_c_profile_profile__WEBPACK_IMPORTED_MODULE_12__.tabChallengue)();

    //Funcionalidad del menu para desplegar las opciones del menu
    (0,_scripts_c_menu_menu__WEBPACK_IMPORTED_MODULE_13__["default"])();

    // Si se encuentra el wpadminbar
    let wpadminbar = document.querySelector("#wpadminbar");
    
    function menuAdaptation(){
        let mobileMenuContainer = document.querySelector("#mobile-menu-container");
        mobileMenuContainer.classList.add("menu-mobile-top");
    }

    typeof(wpadminbar ) != 'undefined' && wpadminbar  != null && menuAdaptation();

    // Mostrar modal de portada de perfil
    jQuery('#upload-cover-image').on('hide.bs.modal', function (event) {
        // do something...
        location.reload();
    })


    // Ocultar boton cuando se abre el modal de subir foto(desafio)
    jQuery('#upload-challengue').on('show.bs.modal', function (event) {
        // do something...
        let sideMenu = document.querySelector(".side_menu_account_desk");
        sideMenu.classList.remove("active_menu_desk");
    })

    jQuery('#modalMessage').on('hide.bs.modal', function (event) {
        // do something...
        jQuery("#modalMessage .modal-body > div").removeClass("success");
        jQuery("#modalMessage .modal-body > div i.icon-check_circle").remove();
    })
    

    // Modal para pedir los datos del usuario, se coloca una cookie por 7 días para no pedirlo
    function setCookie(cname, exdays) {
        let d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        //d.setTime(d.getTime() +  (30 * 1000));
        let expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + "exists" + ";" + expires + ";path=/";
    }

    function getCookie(name) {
        const nameEquals = name + '=';
        const cookieArray = document.cookie.split(';');
        let cookie;
        for (cookie of cookieArray) {
          while (cookie.charAt(0) == ' ') {
            cookie = cookie.slice(1, cookie.length);
          }
      
          if (cookie.indexOf(nameEquals) == 0)
            return decodeURIComponent(
              cookie.slice(nameEquals.length, cookie.length),
            );
        }
      
        return null;
    }
   
    // Detectar si el perfil ya se lleno, en ese caso no mostrar el modal de los pasos para completar perfil
    let updateProfileForm = document.querySelector(".update-profile__form"); 

    function profileComplete(form){
        let flagBelongsToClub = 1;
        for (let i = 0; i < form.elements.length; i++) { 
            let element = form.elements[i]; 
            if(element.id == "update_belong_to_club"){
                //console.log(element.value);
                if(element.value == 0){
                    flagBelongsToClub = 0;
                }
            }
            //console.log(element);
            if(element.nodeName === "BUTTON") continue;
            // Si no pertenece a un club, ignorar estos campos en la validacion de campos vacios
            if(flagBelongsToClub == 0){
                if(
                    element.id == "update_name_club" ||
                    element.id == "update_origin_club" ||
                    element.id == "update_number_member_clubs"
                ){
                    continue;
                }
            }
           
            if(element.value == "") return false; 
            
        } 
        //console.log("flag",flagBelongsToClub);
        return true;
    }

    //console.log(u_data);
    
    if(typeof(u_data) != 'undefined' && u_data != null){
        if(u_data.is_user_logged_in == true){
            if(u_data.id_user_logged == u_data.id_user){
                //console.log(profileComplete(updateProfileForm));
                if(!profileComplete(updateProfileForm)){
                    //console.log("aqui sigo");
                    typeof(profilePage) != 'undefined' && profilePage != null && !Boolean(getCookie('modalMultiStep')) && jQuery('#modalMultiStep').modal();
                    let time = document.getElementById("duration_modal_information_user").value;
                    // console.log(time);
                    // // Set a cookie
                    jQuery('#modalMultiStep').on('shown.bs.modal', function (event) {
                        setCookie("modalMultiStep", time);
                    });
                }
            }
        }
    }

   

    // Abrir y cerrar la lista de acciones de las motos del garage
    jQuery("body").on("click", ".garage-bike-menu", function(e){
        e.stopPropagation();
        jQuery(this).next().toggleClass("active");
    });

    jQuery('.tooltip-actions').on("click",function(e){
        e.stopPropagation();
    });

    jQuery('body').on("click",function(e){
        jQuery('.tooltip-actions').removeClass("active");
    });

    typeof(profilePage) != 'undefined' && profilePage != null && (0,_scripts_c_profile_profile__WEBPACK_IMPORTED_MODULE_12__.deleteBikeGarage)();

    typeof(profilePage) != 'undefined' && profilePage != null && (0,_scripts_c_profile_profile__WEBPACK_IMPORTED_MODULE_12__.editBikeGarage)();

    typeof(profilePage) != 'undefined' && profilePage != null && (0,_scripts_c_profile_profile__WEBPACK_IMPORTED_MODULE_12__.pendingAproval)();
    

    //console.log("child_term_info",child_term_info);
    
    if(typeof(child_term_info) != 'undefined' && child_term_info != null){
        await (0,_scripts_c_profile_map__WEBPACK_IMPORTED_MODULE_14__.initMap)(child_term_info);
    }

    jQuery(".fb-share-button-custom").on("click",function(){
        FB.ui({
            method: 'share',
            href: jQuery(this).attr("data-href")
          }, function(response){});
    });

    jQuery(".twitter-share-button-custom").on("click",function(){
        //console.log(jQuery(this).attr("data-href"));

        const url = encodeURIComponent(jQuery(this).attr("data-href"));
        const text = encodeURIComponent(jQuery(this).attr("data-text"));
        const description = encodeURIComponent(jQuery(this).attr("data-description"));
        //const image = encodeURIComponent('URL_DE_LA_IMAGEN');

        const tweetUrl = `https://twitter.com/intent/tweet?url=${url}&text=${text}&description=${description}&via=twitterdev`;
  
        window.open(tweetUrl, '_blank');
      
    });
    

    function onVisible(element, callback) {
        new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
            if(entry.intersectionRatio > 0) {
                callback(element);
                observer.disconnect();
            }
            });
        }).observe(element);
        if(!callback) return new Promise(r => callback=r);
    }

    let myMap = document.querySelector("#mimapa3");
    if(typeof(myMap) != 'undefined' && myMap!= null){
        if(document.querySelector("#mimapa3")){
            onVisible(myMap, () => {
                FB.XFBML.parse();
            });
        }
    }
   

    jQuery(".map__share").on("click",function(e){
        e.stopPropagation();
        jQuery(this).find(".map__share-social").toggleClass("show");
    });

    jQuery(".share").on("click",function(e){
        e.stopPropagation();
        jQuery(this).find(".map__share-social").toggleClass("show");
    });


    jQuery("body").on("click", function(){
        jQuery(".map__share-social").removeClass("show");
    });

    /* Mostrar password en los campos de contraseña */
    let loginBox = document.querySelector(".pm-login-box");
    if(typeof(loginBox) != 'undefined' && loginBox!= null){

        const togglePassword = document.querySelector(".pmagic.login .pm-login-box form .pm-field-input i.icon-lock");
        const uPassword = document.querySelector("#user_pass");
        
        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = uPassword.getAttribute("type") === "password" ? "text" : "password";
            uPassword.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("icon-lock");
            this.classList.toggle("icon-eye-lookproduct");
        });
    }

    let registerBox = document.querySelector(".pg-group-reg-form");
    if(typeof(registerBox) != 'undefined' && registerBox!= null){
        const togglePassword = document.querySelectorAll(".pmagic.register .pg-group-reg-form form .pmrow .pm-field-input i.icon-lock");
        togglePassword.forEach(function(val){
            val.addEventListener("click", function () {
                // toggle the type attribute
                const type = val.previousElementSibling.getAttribute("type") === "password" ? "text" : "password";
                val.previousElementSibling.setAttribute("type", type);
                
                // toggle the icon
                this.classList.toggle("icon-lock");
                this.classList.toggle("icon-eye-lookproduct");
            });
        });
    }

    let changePassword = document.querySelector("#pg-change-password");
    if(typeof(changePassword ) != 'undefined' && changePassword != null){

        const togglePassword = document.querySelectorAll("#pg-change-password .pmagic-form .pm-field-input i.icon-lock");
        //const uPassword = document.querySelectorAll("#pg-change-password .pmagic-form .pm-field-input input[type=password]");
        
        togglePassword.forEach(function(val){
            val.addEventListener("click", function () {
                // toggle the type attribute
                const type = val.nextElementSibling.getAttribute("type") === "password" ? "text" : "password";
                val.nextElementSibling.setAttribute("type", type);
                
                // toggle the icon
                this.classList.toggle("icon-lock");
                this.classList.toggle("icon-eye-lookproduct");
            });
        });
    }

    /* Mostrar password en los campos de contraseña */


    /* 
        Se cambia el texto en los comentarios de "Deja una respuesta" a "Deja un comentario" 
        La traducción de wordpress no funciona para este texto
    */
    const textComment = jQuery("#respond.comment-respond .gamma.comment-reply-title");
    function changeTextComment(){
        textComment.text("Deja un comentario");
    }
    typeof(textComment) != 'undefined' && textComment != null && changeTextComment();

    /* 
        Se ocultan las opciones de envio en el checkout
        Se comprueba si el usuario ya tiene una direccion de envío previamente en la funcion check_user_shipping_address en rrm-templates-functions.php
        Si ya tiene direccion asignada se le pone la classe shipping complete, con esta clase se ocultan las opciones
        En caso de que el usuario ya tenga dirección asignada pero la cambie, aparecen nuevamente las opciones ya que se el dom se actualiza y quita la clase agregada
    */
    let shipping_methods = document.querySelector('#customer_order_review #order_review'); // Cambia 'element-id' por el ID del elemento al que deseas agregar la clase
    let flagShippingMethods = false;
    typeof(shipping_methods ) != 'undefined' && shipping_methods != null && observerShippingMethods();
    function observerShippingMethods(){
        const callback = function(mutationsList, observer) {
            // Use traditional 'for loops' for IE 11
            if(!flagShippingMethods ){
                for(const mutation of mutationsList) {
                    try{
                        if (mutation.addedNodes[0].querySelector("#shipping_method")){
                            console.log("entro");
                            let selector = mutation.addedNodes[0].querySelector("#shipping_method");
                            if (hasCompleteShippingAddress === 'true') {
                                selector.classList.add('shipping-complete');
                                flagShippingMethods = true;
                            } else {
                                selector.classList.add('shipping-incomplete');
                                flagShippingMethods = true;
                            }
                        }
                    } catch(error){
                        //console.log(error)
                    }
                }
            }
          };
          
          // Options for the observer (which mutations to observe)
          const config = {childList: true, subtree: true };
          
          // Create an observer instance linked to the callback function
          const observer = new MutationObserver(callback);
          
          // Start observing the target node for configured mutations
          observer.observe(shipping_methods , config);
    }

    let copyLinkEl = document.getElementById('copy-link');
    typeof(copyLinkEl) != 'undefined' && copyLinkEl != null && copyLink();

    function copyLink(){
        copyLinkEl.addEventListener('click', function(e) {
            // Obtener el enlace del anchor
            e.preventDefault();
            
            let link = this.href;
            // Usar la API del portapapeles para copiar el enlace
            navigator.clipboard.writeText(link).then(function() {
                // Éxito
                alert('Enlace copiado al portapapeles: ' + link);
            }).catch(function(err) {
                // Error
                console.error('No se pudo copiar el enlace: ', err);
            });
        });
    }
  

    
});
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin

})();

/******/ })()
;
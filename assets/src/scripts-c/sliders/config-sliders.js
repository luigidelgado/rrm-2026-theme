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

export { sliderObjConfig };
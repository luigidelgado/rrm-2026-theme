import timelineTab from "./scripts-c/history/timeline-tab";
import faq from "./scripts-c/faq/faq";
import rulesTabs from "./scripts-c/faq/rules-tab";
import placeholder from "./scripts-c/register/placeholder";
import filter from "./scripts-c/archive-products/filter";
import quantityInput from "./scripts-c/product/quantity-input";
import { sliderObjConfig } from "./scripts-c/sliders/config-sliders";
import { configSlider } from "./scripts-c/sliders/slider-salon-home";
import { validateBikeForm, validateBikeEditForm, validateChallengueForm } from "./scripts-c/profile/validation-forms";
import { gallery,challengueGallery } from "./scripts-c/profile/gallery";
import { modalSteps } from "./scripts-c/profile/modal-steps";
import dragDropComponent  from './scripts-c/profile/dragDrop';
import { initProfile, svgAnimation, showHideSettings, dragDrop, tabChallengue, deleteBikeGarage, editBikeGarage, pendingAproval, datepicker, shareOnFacebook, stateData  }  from "./scripts-c/profile/profile";
import menuOptions  from "./scripts-c/menu/menu";
import { initMap } from "./scripts-c/profile/map";
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
    if(typeof(historySection) !== 'undefined' || historySection !== null) timelineTab();
    /* Tab timeline Page History (End) */

    const datepickerEl = document.querySelector('.datepicker');
    typeof(datepickerEl) != 'undefined' && datepickerEl != null && datepicker();

    faq();

    rulesTabs();

    /* Put placeholder to inputs on register form (Start) */
    placeholder();
    /* Put placeholder to inputs on register form (End) */
    
    filter();

    quantityInput();
    
    /* Inicialiar el slider de ventas dirigidas en el single del producto */
    new Swiper(".slider-products.up-sells .swiper", sliderObjConfig);
    new Swiper(".slider-products.related .swiper", sliderObjConfig);
    new Swiper(".slider-products.cross-sells .swiper", sliderObjConfig);

    jQuery("#home_salon_fama .right_content .slider_salon").slick(configSlider);

    jQuery('#home_salon_fama .right_content .slider_salon').on('afterChange', function(event, slick, currentSlide) {
        let hallFame = document.querySelector("#home_salon_fama .degraded");
        slick.currentSlide >= slick.slideCount - slick.options.slidesToShow ? hallFame.classList.add("hide") : hallFame.classList.remove("hide");
    });

    // Add show tab to first option of the account settings
    initProfile();

    svgAnimation();

    const profilePage = document.querySelector('.page-template-template-profile');

    typeof(profilePage) != 'undefined' && profilePage != null && showHideSettings();

    typeof(profilePage) != 'undefined' && profilePage != null && modalSteps(jQuery);

    typeof(profilePage) != 'undefined' && profilePage != null && dragDrop(jQuery);

    typeof(profilePage) != 'undefined' && profilePage != null && challengueGallery(jQuery, ".tab-challengue__content");

    typeof(profilePage) != 'undefined' && profilePage != null && dragDropComponent();

    // const galleryPage = document.querySelector('.page-template-template-gallery');
    // typeof(galleryPage) != 'undefined' && galleryPage != null && challengueGallery(jQuery, ".gallery-item__display");

    // const bikeForm = document.querySelector('#upload-bike-form');
    // typeof(bikeForm) != 'undefined' && bikeForm != null && validateBikeForm();

    const galleryPage = document.querySelector('.page-template-template-gallery');
    typeof(galleryPage) != 'undefined' && galleryPage != null && gallery()
        

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

    tabChallengue();

    //Funcionalidad del menu para desplegar las opciones del menu
    menuOptions();

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

    typeof(profilePage) != 'undefined' && profilePage != null && deleteBikeGarage();

    typeof(profilePage) != 'undefined' && profilePage != null && editBikeGarage();

    typeof(profilePage) != 'undefined' && profilePage != null && pendingAproval();
    

    //console.log("child_term_info",child_term_info);
    
    if(typeof(child_term_info) != 'undefined' && child_term_info != null){
        await initMap(child_term_info);
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
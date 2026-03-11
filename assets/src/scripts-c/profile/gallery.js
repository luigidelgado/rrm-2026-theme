import { addCheckSuccessModal } from './profile';

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

export{
    challengueGallery,
    gallery
}
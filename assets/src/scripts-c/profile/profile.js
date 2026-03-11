import { validateBikeEditForm, validateUpdateProfileForm, validateUpdateProfileFormModal, validateChallengueForm } from "./validation-forms";


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
          data: { action: "refresh_garage", "refresh-garage": "yes", nonce: cc_ajax_object.nonces.refresh_garage },
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
                nonce: cc_ajax_object.nonces.delete_garage_item,
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
            nonce: cc_ajax_object.nonces.update_profile,
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
let updateProfileFormR  = typeof(updateProfileForm) != 'undefined' && updateProfileForm != null && validateUpdateProfileForm();
    
if(typeof(updateProfileFormR ) != 'undefined' && updateProfileFormR != null){
    if(updateProfileFormR  != false){
        updateProfileFormR.onSuccess(( event ) => {
            updateProfileAsync(updateProfileForm);
        });
    }
}

const updateProfileFormModal = document.querySelector('#update-profile__form-modal.update-profile__form');
let updateProfileFormModalR  = typeof(updateProfileFormModal) != 'undefined' && updateProfileFormModal != null && validateUpdateProfileFormModal();

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
    form_data.append("nonce", cc_ajax_object.nonces.edit_garage_item);
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
let bikeEditFormR = typeof(bikeEditForm) != 'undefined' && bikeEditForm != null && validateBikeEditForm();
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
    form_data.append("nonce", cc_ajax_object.nonces.edit_challengue);
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
    form_data.append("nonce", cc_ajax_object.nonces.save_challengue);
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
let uploadChallengueFormR = typeof(uploadChallengueForm) != 'undefined' && uploadChallengueForm!= null && validateChallengueForm();

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
            nonce: cc_ajax_object.nonces.filtered_options_upload_photo,
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
        var ajaxData = '&post_offset=' + postOffset + '&action=ajaxNextPostsAproval&nonce=' + cc_ajax_object.nonces.ajaxNextPostsAproval;

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
        var ajaxData = '&post_offset=' + postOffset + '&action=ajaxNextGalleryPosts&nonce=' + cc_ajax_object.nonces.ajaxNextGalleryPosts;

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

export{
    initProfile,
    svgAnimation,
    showHideSettings,
    dragDrop,
    tabChallengue,
    deleteBikeGarage,
    editBikeGarage,
    pendingAproval, 
    datepicker,
    addCheckSuccessModal
    //stateData
}

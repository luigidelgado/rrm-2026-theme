/******/ (() => {
  // webpackBootstrap
  /******/ "use strict";
  /******/ var __webpack_modules__ = [
    ,
    /* 0 */ /* 1 */
    /***/ (
      __unused_webpack_module,
      __webpack_exports__,
      __webpack_require__
    ) => {
      __webpack_require__.r(__webpack_exports__);
      /* harmony export */ __webpack_require__.d(__webpack_exports__, {
        /* harmony export */ validateBikeEditForm: () =>
          /* binding */ validateBikeEditForm,
        /* harmony export */ validateBikeForm: () =>
          /* binding */ validateBikeForm,
        /* harmony export */ validateChallengueForm: () =>
          /* binding */ validateChallengueForm,
        /* harmony export */ validateUpdateProfileForm: () =>
          /* binding */ validateUpdateProfileForm,
        /* harmony export */ validateUpdateProfileFormModal: () =>
          /* binding */ validateUpdateProfileFormModal,
        /* harmony export */
      });
      function validateUpdateProfileForm() {
        const validatorUpdateProfile = new JustValidate(
          "#update-profile__form",
          {
            //validateBeforeSubmitting: true,
            //submitFormAutomatically: true,
          }
        );
        validatorUpdateProfile
          .addField("#update_first_name", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
          ])
          .addField("#update_last_name", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
          ])
          .addField("#update_email", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
          ])
          .addField("#update_user_login", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
          ])
          .addField("#update_date_birth", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
          ]);

        return validatorUpdateProfile;
      }

      function validateUpdateProfileFormModal() {
        const validatorUpdateProfile = new JustValidate(
          "#update-profile__form-modal",
          {
            //validateBeforeSubmitting: true,
            //submitFormAutomatically: true,
          }
        );
        validatorUpdateProfile
          .addField("#update_first_name", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
          ])
          .addField("#update_last_name", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
          ])
          .addField("#update_email", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
          ])
          .addField("#update_user_login", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
          ])
          .addField("#update_date_birth", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
          ]);

        return validatorUpdateProfile;
      }

      function validateBikeEditForm() {
        const validatorEdit = new JustValidate("#edit-bike-form", {
          validateBeforeSubmitting: true,
        });
        validatorEdit
          .addField("#bike-edit-name", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
            {
              rule: "minLength",
              value: 3,
              errorMessage: "Este campo debería de tener al menos 3 carácteres",
            },
            {
              rule: "maxLength",
              value: 30,
              errorMessage: "Este campo debería de tener maximo 30 carácteres",
            },
          ])
          // .addField('#bike-year',
          // [
          //     {
          //         rule: 'required',
          //         errorMessage: 'Campo requerido',
          //     },
          // ])
          .addField("#bike-edit-brand", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
          ])
          .addField("#bike-edit-color", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
          ])
          .addField("#bike-edit-model", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
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
          .addField("#bike-edit-image", [
            {
              rule: "files",
              value: {
                files: {
                  extensions: ["jpeg", "jpg", "png"],
                  // maxSize: 20000,
                  // minSize: 10000,
                  types: ["image/jpeg", "image/jpg", "image/png"],
                },
              },
              errorMessage:
                "La imagen descargada tiene una o varias propiedades invalidas(extension, tamaño , tipo, etc)",
            },
          ]);
        return validatorEdit;
      }

      function validateBikeForm() {
        const validator = new JustValidate("#upload-bike-form");

        validator
          .addField("#bike-name", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
            {
              rule: "minLength",
              value: 3,
              errorMessage: "Este campo debería de tener al menos 3 carácteres",
            },
            {
              rule: "maxLength",
              value: 30,
              errorMessage: "Este campo debería de tener maximo 30 carácteres",
            },
          ])
          // .addField('#bike-year',
          // [
          //     {
          //         rule: 'required',
          //         errorMessage: 'Campo requerido',
          //     },
          // ])
          .addField("#bike-brand", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
          ])
          .addField("#bike-color", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
          ])
          .addField("#bike-model", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
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
          .addField("#bike-image", [
            {
              rule: "minFilesCount",
              value: 1,
              errorMessage: "Selecciona una imagen",
            },
            {
              rule: "files",
              value: {
                files: {
                  extensions: ["jpeg", "jpg", "png"],
                  // maxSize: 20000,
                  // minSize: 10000,
                  types: ["image/jpeg", "image/jpg", "image/png"],
                },
              },
              errorMessage:
                "La imagen cargada tiene una o varias propiedades invalidas(extension, tamaño , tipo, etc)",
            },
          ]);
        return validator;
      }

      function validateChallengueForm() {
        const validator = new JustValidate("#upload-challengue-form");
        validator
          .addField("#challengue-title", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
            {
              rule: "minLength",
              value: 3,
              errorMessage: "Este campo debería de tener al menos 3 carácteres",
            },
          ])
          .addField("#challengue-description", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
            {
              rule: "minLength",
              value: 3,
              errorMessage: "Este campo debería de tener al menos 3 carácteres",
            },
          ])
          .addField("#challengue-challengue", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
          ])
          .addField("#challengue-state", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
          ])
          .addField("#challengue-activity", [
            {
              rule: "required",
              errorMessage: "Campo requerido",
            },
          ])
          .addField("#challengue-image", [
            {
              rule: "minFilesCount",
              value: 1,
              errorMessage: "Selecciona una imagen",
            },
            {
              rule: "files",
              value: {
                files: {
                  extensions: ["jpeg", "jpg", "png"],
                  // maxSize: 20000,
                  // minSize: 10000,
                  types: ["image/jpeg", "image/jpg", "image/png"],
                },
              },
              errorMessage:
                "La imagen descargada tiene una o varias propiedades invalidas(extension, tamaño , tipo, etc)",
            },
          ]);
        return validator;
      }

      /***/
    },
    /******/
  ];
  /************************************************************************/
  /******/ // The module cache
  /******/ var __webpack_module_cache__ = {};
  /******/
  /******/ // The require function
  /******/ function __webpack_require__(moduleId) {
    /******/ // Check if module is in cache
    /******/ var cachedModule = __webpack_module_cache__[moduleId];
    /******/ if (cachedModule !== undefined) {
      /******/ return cachedModule.exports;
      /******/
    }
    /******/ // Create a new module (and put it into the cache)
    /******/ var module = (__webpack_module_cache__[moduleId] = {
      /******/ // no module.id needed
      /******/ // no module.loaded needed
      /******/ exports: {},
      /******/
    });
    /******/
    /******/ // Execute the module function
    /******/ __webpack_modules__[moduleId](
      module,
      module.exports,
      __webpack_require__
    );
    /******/
    /******/ // Return the exports of the module
    /******/ return module.exports;
    /******/
  }
  /******/
  /************************************************************************/
  /******/ /* webpack/runtime/define property getters */
  /******/ (() => {
    /******/ // define getter functions for harmony exports
    /******/ __webpack_require__.d = (exports, definition) => {
      /******/ for (var key in definition) {
        /******/ if (
          __webpack_require__.o(definition, key) &&
          !__webpack_require__.o(exports, key)
        ) {
          /******/ Object.defineProperty(exports, key, {
            enumerable: true,
            get: definition[key],
          });
          /******/
        }
        /******/
      }
      /******/
    };
    /******/
  })();
  /******/
  /******/ /* webpack/runtime/hasOwnProperty shorthand */
  /******/ (() => {
    /******/ __webpack_require__.o = (obj, prop) =>
      Object.prototype.hasOwnProperty.call(obj, prop);
    /******/
  })();
  /******/
  /******/ /* webpack/runtime/make namespace object */
  /******/ (() => {
    /******/ // define __esModule on exports
    /******/ __webpack_require__.r = (exports) => {
      /******/ if (typeof Symbol !== "undefined" && Symbol.toStringTag) {
        /******/ Object.defineProperty(exports, Symbol.toStringTag, {
          value: "Module",
        });
        /******/
      }
      /******/ Object.defineProperty(exports, "__esModule", { value: true });
      /******/
    };
    /******/
  })();
  /******/
  /************************************************************************/
  var __webpack_exports__ = {};
  // This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
  (() => {
    var __webpack_exports__ = {};
    __webpack_require__.r(__webpack_exports__);
    /* harmony import */ var _scripts_c_profile_validation_forms_js__WEBPACK_IMPORTED_MODULE_0__ =
      __webpack_require__(1);

    jQuery(document).ready(function () {
      checkCookies();

      jQuery("#rr_scroll_top").on("click", function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
      });

      jQuery("#slider-top").slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 7000,
      });

      jQuery("#home_top_desafios .slider_desafios .slider").slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 5000,
        responsive: [
          {
            breakpoint: 1080,
            settings: {
              slidesToShow: 4,
            },
          },
          {
            breakpoint: 770,
            settings: {
              slidesToShow: 3,
            },
          },
          {
            breakpoint: 580,
            settings: {
              slidesToShow: 2,
            },
          },
        ],
      });

      jQuery("#search_btn").on("click", function (e) {
        e.preventDefault();
        jQuery(".side_menu_account_desk").removeClass("active_menu_desk");
        jQuery(".notifications_desk").removeClass("show_notifications");
        jQuery(".buscar-modal").show();
      });

      jQuery("#search_btn_mobile").on("click", function (e) {
        e.preventDefault();
        jQuery(".carrito_mobile").removeClass("show_carrito_mobile");
        jQuery(".notifications_mobile").removeClass(
          "show_notifications_mobile"
        );
        jQuery(".side_menu_account").removeClass("active_menu");
        jQuery(".mobile-menu-container").removeClass("menu-open");
        jQuery(".buscar_mobile").toggleClass("show_buscar_mobile");
      });

      jQuery("#carrito_btn_mobile").on("click", function (e) {
        e.preventDefault();
        jQuery(".buscar_mobile").removeClass("show_buscar_mobile");
        jQuery(".notifications_mobile").removeClass(
          "show_notifications_mobile"
        );
        jQuery(".side_menu_account").removeClass("active_menu");
        jQuery(".mobile-menu-container").removeClass("menu-open");
        jQuery(".carrito_mobile").toggleClass("show_carrito_mobile");
      });

      jQuery("#close_carrito_menu").on("click", function (e) {
        e.preventDefault();
        jQuery(".carrito_mobile").removeClass("show_carrito_mobile");
      });

      jQuery("#notification_btn_mobile").on("click", function (e) {
        e.preventDefault();
        jQuery(".carrito_mobile").removeClass("show_carrito_mobile");
        jQuery(".buscar_mobile").removeClass("show_buscar_mobile");
        jQuery(".side_menu_account").removeClass("active_menu");
        jQuery(".mobile-menu-container").removeClass("menu-open");
        jQuery(".notifications_mobile").toggleClass(
          "show_notifications_mobile"
        );
        let data = {
          action: "check_false_notifications",
          nonce: cc_ajax_object.nonces.check_false_notifications,
        };
        jQuery
          .post(pm_ajax_object.ajax_url, data, function (response) {})
          .done(function () {});
      });

      jQuery("#close_notifications_menu").on("click", function (e) {
        e.preventDefault();
        jQuery(".notifications_mobile").removeClass(
          "show_notifications_mobile"
        );
      });

      jQuery("#notification_btn").on("click", function (e) {
        e.preventDefault();
        jQuery(".side_menu_account_desk").removeClass("active_menu_desk");
        jQuery(".notifications_desk").toggleClass("show_notifications");
        let data = {
          action: "check_false_notifications",
          nonce: cc_ajax_object.nonces.check_false_notifications,
        };
        jQuery
          .post(pm_ajax_object.ajax_url, data, function (response) {})
          .done(function () {});
      });

      jQuery("#side_menu_btn_mobile").on("click", function (e) {
        e.preventDefault();
        jQuery(".carrito_mobile").removeClass("show_carrito_mobile");
        jQuery(".buscar_mobile").removeClass("show_buscar_mobile");
        jQuery(".notifications_mobile").removeClass(
          "show_notifications_mobile"
        );
        jQuery(".mobile-menu-container").removeClass("menu-open");
        jQuery(".side_menu_account").toggleClass("active_menu");
      });

      jQuery("#side_menu_btn").on("click", function (e) {
        e.preventDefault();
        jQuery(".notifications_desk").removeClass("show_notifications");
        jQuery(".side_menu_account_desk").toggleClass("active_menu_desk");
      });

      var body = document.getElementById("page");
      var except = document.getElementById("side_menu_account_desk");
      var except2 = document.getElementById("side_menu_btn");
      var except3 = document.getElementById("notifications_desk");
      var except4 = document.getElementById("notification_btn");

      if (body) {
        body.addEventListener(
          "click",
          function () {
            jQuery(".side_menu_account_desk").removeClass("active_menu_desk");
            jQuery(".notifications_desk").removeClass("show_notifications");
          },
          false
        );
      }
      if (except) {
        except.addEventListener(
          "click",
          function (ev) {
            ev.stopPropagation();
          },
          false
        );
      }
      if (except2) {
        except2.addEventListener(
          "click",
          function (ev) {
            ev.stopPropagation();
          },
          false
        );
      }
      if (except3) {
        except3.addEventListener(
          "click",
          function (ev) {
            ev.stopPropagation();
          },
          false
        );
      }

      if (except4) {
        except4.addEventListener(
          "click",
          function (ev) {
            ev.stopPropagation();
          },
          false
        );
      }

      jQuery("#close_account_menu").on("click", function (e) {
        e.preventDefault();
        jQuery(".side_menu_account").removeClass("active_menu");
      });

      jQuery("#buscar-close").on("click", function (e) {
        e.preventDefault();
        jQuery(".buscar-modal").hide();
      });

      jQuery("#cookies-close").on("click", function (e) {
        e.preventDefault();
        setCookie("rr_cookies", true, 365);
        jQuery(".rr_cookies").hide();
      });

      jQuery("#unete-close").on("click", function (e) {
        e.preventDefault();
        let time = document.getElementById("time_banner").value;
        console.log(time);
        setCookie("rr_unete", true, time);
        jQuery(".unete-modal").hide();
      });

      jQuery("#btn_unete_header").on("click", function (e) {
        e.preventDefault();
        let time = document.getElementById("time_banner").value;
        setCookie("rr_unete", true, time);
        jQuery(".unete-modal").hide();
      });

      var PUS = {};
      PUS.slicknav = function () {
        jQuery("#rr_menu").slicknav({
          allowParentLinks: true,
          prependTo: "#mobile-menu-wrap",
        });

        jQuery(".mobile-menu-trigger").on("click", function (e) {
          jQuery(".mobile-menu-container").addClass("menu-open");
          e.stopPropagation();
        });

        jQuery(".mobile-menu-close").on("click", function (e) {
          jQuery(".mobile-menu-container").removeClass("menu-open");
          e.stopPropagation();
        });
      };
      PUS.slicknav();

      const bikeUploadForm = document.querySelector("#upload-bike-form");
      let bikeUploadFormR =
        typeof bikeUploadForm != "undefined" &&
        bikeUploadForm != null &&
        (0,
        _scripts_c_profile_validation_forms_js__WEBPACK_IMPORTED_MODULE_0__.validateBikeForm)();

      if (typeof bikeUploadFormR != "undefined" && bikeUploadFormR != null) {
        if (bikeUploadFormR != false) {
          bikeUploadFormR.onSuccess((event) => {
            var name = document.getElementById("bike-name").value;
            console.log(name);
            var color = document.getElementById("bike-color").value;
            var model = document.getElementById("bike-model").value;
            var status = document.getElementById("bike-status").value;
            var style = document.getElementById("bike-style").value;
            var brand = document.getElementById("bike-brand").value;
            var image = jQuery("#bike-image").prop("files")[0];
            var form_data = new FormData();
            form_data.append("action", "save_garage_item");
            form_data.append("nonce", cc_ajax_object.nonces.save_garage_item);
            form_data.append("name", name);
            form_data.append("color", color);
            form_data.append("model", model);
            form_data.append("status", status);
            form_data.append("style", style);
            form_data.append("brand", brand);
            form_data.append("image", image);
            jQuery.ajax({
              url: pm_ajax_object.ajax_url,
              type: "post",
              contentType: false,
              processData: false,
              data: form_data,
              beforeSend: function () {
                jQuery("#upload-bike").modal("hide");
                setTimeout(function () {
                  jQuery(".loader-layer").show();
                }, 400);
                setTimeout(function () {
                  jQuery(".loader").show();
                }, 500);
              },
              afterSend: function () {
                jQuery(".loader").hide();
              },
              success: function (response) {
                console.log("entro aqui:", response);
                if (response.success == true || response.success == "true") {
                  jQuery("#modalMessage .modal-body > div")
                    .addClass("success")
                    .text(response.data);
                  addCheckSuccessModal();
                  setTimeout(function () {
                    jQuery("#modalMessage").modal("show");
                  }, 700);
                  updateBikeGarage();
                }
                if (response.success == false) {
                  jQuery("#modalMessage .modal-body > div")
                    .addClass("success")
                    .text(response.data);

                  setTimeout(function () {
                    jQuery("#modalMessage").modal("show");
                  }, 700);

                  updateBikeGarage();
                }
              },
              complete: function (res) {
                setTimeout(function () {
                  jQuery(".loader").hide();
                }, 500);
                setTimeout(function () {
                  jQuery(".loader-layer").hide();
                }, 600);
                jQuery(".drop-zone").removeAttr("style");
                jQuery(".drop-zone__thumb").removeAttr("style");
                jQuery(".drop-zone__init-data").empty();
                jQuery(".drop-zone__init-data").append(
                  '<i class="icon-add_a_photo"></i><span class="drop-zone__description">Arrastra y suelta la imagen o selecciona una</span>'
                );
              },
              error: function (xhr, ajaxOptions, thrownError) {
                jQuery(".loader").hide();
                jQuery("#upload-bike").modal("hide");
                jQuery("#modalMessage .modal-body > div").text(error);
                setTimeout(function () {
                  jQuery("#modalMessage").modal("show");
                }, 1500);
              },
            });
          });
        }
      }

      function updateBikeGarage() {
        jQuery.ajax({
          type: "POST",
          url: pm_ajax_object.ajax_url,
          cache: false,
          data: { action: "refresh_garage", "refresh-garage": "yes", nonce: cc_ajax_object.nonces.refresh_garage },
          complete: function () {
            jQuery(".loader").hide();
            jQuery("#bike-name").val("");
            jQuery("#bike-color").val("");
            jQuery("#bike-model").val("");
            jQuery("#bike-status").val("");
            jQuery("#bike-style").val("");
            jQuery("#bike-brand").val("");
            jQuery("#bike-image").val("");
          },
          success: function (data) {
            jQuery(".tab-garage").html(data);
          },
        });
      }

      function addCheckSuccessModal() {
        let icon = document.createElement("i");
        icon.classList.add("icon-check_circle");
        let bodyModal = document.querySelector(
          "#modalMessage .modal-body > div"
        );
        bodyModal.prepend(icon);
      }

      /*jQuery('form[name="new-garage-item"]').on("submit", function (e) {
      e.preventDefault();
      var name = document.getElementById("bike-name").value;
      console.log(name);
      var color = document.getElementById("bike-color").value;
      var model = document.getElementById("bike-model").value;
      var status = document.getElementById("bike-status").value;
      var style = document.getElementById("bike-style").value;
      var brand = document.getElementById("bike-brand").value;
      var image = jQuery("#bike-image").prop("files")[0];
      var form_data = new FormData();
      form_data.append("action", "save_garage_item");
      form_data.append("nonce", cc_ajax_object.nonces.save_garage_item);
      form_data.append("name", name);
      form_data.append("color", color);
      form_data.append("model", model);
      form_data.append("status", status);
      form_data.append("style", style);
      form_data.append("brand", brand);
      form_data.append("image", image);
      jQuery.ajax({
        url: pm_ajax_object.ajax_url,
        type: "post",
        contentType: false,
        processData: false,
        data: form_data,
        beforeSend: function () {
          jQuery(".loader").show();
        },
        afterSend: function () {
          jQuery(".loader").hide();
        },
        success: function (response) {
          if (response == true || response == "true") {
            jQuery("#upload-bike").modal("hide");
            jQuery.ajax({
              type: "POST",
              url: pm_ajax_object.ajax_url,
              cache: false,
              data: { action: "refresh_garage", "refresh-garage": "yes", nonce: cc_ajax_object.nonces.refresh_garage },
              complete: function () {
                jQuery(".loader").hide();
                jQuery("#bike-name").val("");
                jQuery("#bike-color").val("");
                jQuery("#bike-model").val("");
                jQuery("#bike-status").val("");
                jQuery("#bike-style").val("");
                jQuery("#bike-brand").val("");
                jQuery("#bike-image").val("");
              },
              success: function (data) {
                jQuery(".tab-garage").html(data);
              },
            });
          } else {
            jQuery(".loader").hide();
          }
        },
        complete: function (res) {
          jQuery(".drop-zone").removeAttr("style");
          jQuery(".drop-zone__thumb").removeAttr("style");
          jQuery(".drop-zone__init-data").empty();
          jQuery(".drop-zone__init-data").append(
            '<i class="icon-add_a_photo"></i><span class="drop-zone__description">Arrastra y suelta la imagen o selecciona una</span>'
          );
        },
        error: function (xhr, ajaxOptions, thrownError) {
          jQuery(".loader").hide();
        },
      });
      //}
    });
  
    */

      jQuery('form[name="contact-me"]').on("submit", function (e) {
        e.preventDefault();
        jQuery(".loader").show();
        var name = document.getElementById("nombre").value;
        var mail = document.getElementById("correo").value;
        var msg = document.getElementById("message").value;
        let data = {
          action: "get_contact_form",
          nonce: cc_ajax_object.nonces.get_contact_form,
          name: name,
          mail: mail,
          message: msg,
        };
        jQuery
          .post(pm_ajax_object.ajax_url, data, function (response) {
            jQuery(".loader").hide();
            if (response === true || response === "true") {
              jQuery(".respuesta-contacto").text(
                "Hemos recibido tu comentario."
              );
            } else if (response === false || response === "false") {
              jQuery(".respuesta-contacto").text(
                "Error al enviar tu comentario, intentalo nuevamente."
              );
            } else {
              jQuery(".respuesta-contacto").text(response);
            }
          })
          .done(function () {});
      });
    });

    jQuery(document.body).trigger("wc_fragment_refresh");

    const jQueryuiAccordion = jQuery(".h-accordion");

    jQueryuiAccordion.accordion({
      collapsible: true,
      heightStyle: "content",

      activate: (event, ui) => {
        const newHeaderId = ui.newHeader.attr("id");

        if (newHeaderId) {
          history.pushState(null, null, `#jQuery{newHeaderId}`);
        }
      },

      create: (event, ui) => {
        const jQuerythis = jQuery(event.target);
        const jQueryactiveAccordion = jQuery(window.location.hash);

        if (jQuerythis.find(jQueryactiveAccordion).length) {
          jQuerythis.accordion(
            "option",
            "active",
            jQuerythis
              .find(jQuerythis.accordion("option", "header"))
              .index(jQueryactiveAccordion)
          );
        }
      },
    });

    jQuery(window).on("hashchange", (event) => {
      const jQueryactiveAccordion = jQuery(window.location.hash);
      const jQueryparentAccordion =
        jQueryactiveAccordion.parents(".h-accordion");

      if (jQueryactiveAccordion.length) {
        jQueryparentAccordion.accordion(
          "option",
          "active",
          jQueryparentAccordion
            .find(jQueryuiAccordion.accordion("option", "header"))
            .index(jQueryactiveAccordion)
        );
      }
    });

    function setCookie(cname, cvalue, exdays) {
      const d = new Date();
      d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
      let expires = "expires=" + d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
      let name = cname + "=";
      let decodedCookie = decodeURIComponent(document.cookie);
      let ca = decodedCookie.split(";");
      for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == " ") {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }

    function checkCookies() {
      let cook = getCookie("rr_cookies");
      if (cook == true || cook == "true") {
      } else {
        jQuery(".rr_cookies").show();
      }
      let unete = getCookie("rr_unete");
      if (unete == true || unete == "true") {
      } else {
        jQuery(".unete-modal").show();
      }
    }
  })();

  // This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
  (() => {
    __webpack_require__.r(__webpack_exports__);
    // extracted by mini-css-extract-plugin
  })();

  /******/
})();

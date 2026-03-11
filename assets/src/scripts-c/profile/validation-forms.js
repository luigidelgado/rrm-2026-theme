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

export{
    validateBikeForm,
    validateChallengueForm,
    validateBikeEditForm,
    validateUpdateProfileForm,
    validateUpdateProfileFormModal
}
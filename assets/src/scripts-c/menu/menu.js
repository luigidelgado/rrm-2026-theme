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

export default menuOptions;
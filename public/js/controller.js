// Module Import 
import loginView from "./Views/loginView.js";
import profileView from "./Views/profileView.js";
import membersView from "./Views/membersView.js"

window.addEventListener("load", function() {
    if ((window.location.pathname.slice(1) == "login") || (window.location.pathname == "/") ) {
        loginView.generateFormArray();
        loginView.clearAllInputs();
        loginView.inputsCheck();
    }
    if (window.location.pathname.slice(1) == "profil") {
        profileView.generateFormArray();
        profileView.infoFormValidation();
        profileView.modalsHanlder();
        profileView.clearInputs();
    }
    if (window.location.pathname.slice(1) == "members") {
        membersView.setDefaultOption();
        membersView.clearAllInputs();
        membersView.displaySelectedTable();
        membersView.modalsHideDisplay();
    }
})


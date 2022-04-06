// Module Import
import * as model from "./model.js"; 
import loginView from "./Views/loginView.js";
import profileView from "./Views/profileView.js";
import membersView from "./Views/membersView.js";




window.addEventListener("load", function() {
    if ((window.location.pathname.slice(1) == "login") || (window.location.pathname == "/") ) {
        loginView.generateFormArray();
        loginView.clearAllInputs();
        // loginView.inputsCheck();
        window.addEventListener("keydown", (e) => {
            if (e.key == "Enter") {
                e.preventDefault();
            }
        })
    }
    if (window.location.pathname.slice(1) == "profile") {
        profileView.generateFormArray();
        profileView.infoFormValidation();
        profileView.modalsHanlder();
        profileView.clearInputs();
        window.addEventListener("keydown", (e) => {
            if (e.key == "Enter") {
                e.preventDefault();
            }
        })
    }
    if ((window.location.pathname.slice(1) == "members") || (window.location.pathname.slice(1) == "roles") || (window.location.pathname.slice(1) == "permissions")) {
        membersView.generateFormTable();
        membersView.testFunction();
        membersView.dipslayHideModal();
    }

    console.log("Js Fired");

})


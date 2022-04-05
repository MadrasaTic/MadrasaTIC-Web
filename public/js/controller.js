// Module Import 
import loginView from "./Views/loginView.js";
import profileView from "./Views/profileView.js";
import membersView from "./Views/membersView.js";
import rolesView from "./Views/rolesView.js"
import permissionsView from "./Views/permissionsView.js"

window.addEventListener("load", function() {
    if ((window.location.pathname.slice(1) == "login") || (window.location.pathname == "/") ) {
        loginView.generateFormArray();
        loginView.clearAllInputs();
        // loginView.inputsCheck();
    }
    if (window.location.pathname.slice(1) == "profile") {
        profileView.generateFormArray();
        profileView.infoFormValidation();
        profileView.modalsHanlder();
        window.addEventListener("keydown", (e) => {
            if (e.key == "Enter") {
                e.preventDefault();
            }
        })
        // profileView.clearInputs();
    }
    if (window.location.pathname.slice(1) == "roles") {
        rolesView.generateFormTable();
        rolesView.dipslayHideModal();
    }
    if (window.location.pathname.slice(1) == "permissions") {
        permissionsView.generateFormTable();
        permissionsView.dipslayHideModal();
    }
    if (window.location.pathname.slice(1) == "members") {
        membersView.testFunction();
        membersView.generateFormTable();
        membersView.dipslayHideModal();
    }
})


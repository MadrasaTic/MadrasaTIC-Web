// Module Import
import * as model from "./model.js";
import loginView from "./Views/loginView.js";
import profileView from "./Views/profileView.js";
import tablesView from "./Views/tablesView.js";
import sideBarView from "./Views/sideBarView.js";
import infraView from "./Views/infraView.js";
import SignalmentsView from "./Views/signalmentsView.js"
import signalmentsView from "./Views/signalmentsView.js";



window.addEventListener("load", function() {
    sideBarView.displayHoverEffect();

    if ((window.location.pathname.slice(1) == "login") || (window.location.pathname == "/") ) {
        loginView.generateFormArray();
        loginView.clearAllInputs();
        loginView.inputsCheck();
        // window.addEventListener("keydown", (e) => {
        //     if (e.key == "Enter") {
        //         e.preventDefault();
        //     }
        // })
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
    if ((window.location.pathname.slice(1) == "members")
        || (window.location.pathname.slice(1) == "roles")
        || (window.location.pathname.slice(1) == "permissions")
        || (window.location.pathname.slice(1) == "signalmentsState")
        || (window.location.pathname.slice(1) == "departments")
        || (window.location.pathname.slice(1) == "signalmentsCategory")
        || (window.location.pathname.slice(1) == "signalmentsPriority")
        )  {
        tablesView.generateFormTable();
        tablesView.renderModalHeaderName();
        tablesView.dipslayHideModal();
        window.addEventListener("keydown", (e) => {
            if (e.key == "Enter") {
                e.preventDefault();
            }
        })
    }
    if (window.location.pathname.slice(1) == "infrastructure") {
        infraView.getAndDisplayItems("annexe", '/infrastructure/annexe');
        infraView.renderAddClick();
        infraView.closeAllInputsOnClick();
    }
    if (window.location.pathname.slice(1) == "signalments") {
        signalmentsView.testFunction();
    }

    console.log("Js Fired");

})


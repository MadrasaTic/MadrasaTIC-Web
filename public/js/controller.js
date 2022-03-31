// Module Import 
import loginView from "./Views/loginView.js";
import profileView from "./Views/profileView.js"

window.addEventListener("load", function() {
    if (window.location.pathname.slice(1) == "login") {
        loginView.inputsCheck();
    }
})

window.addEventListener("load", function() {
    if (window.location.pathname.slice(1) == "register") {
        profileView.inputsCheck();
        profileView.clearInputs();
        profileView.renderProfilInputName();
    }
})


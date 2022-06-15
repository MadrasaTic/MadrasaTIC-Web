// Module Import
// import * as model from "./model.js";
import loginView from "./Views/loginView.js";
import profileView from "./Views/profileView.js";
import tablesView from "./Views/tablesView.js";
import sideBarView from "./Views/sideBarView.js";
import infraView from "./Views/infraView.js";
import signalmentsView from "./Views/signalmentsView.js";
import annoncesView from "./Views/annoncesView.js"
// Models
import * as signalmentsModal from "./Modals/signalmentsModal.js";
import * as annonceModal from "./Modals/annonceModal.js";


// Signalements Controllers
function controlSignalements () {
    console.log("Signalments Controller Loaded");
}

async function controlInfra(type, url) {
    // Get Annexes
    const data = await signalmentsModal.loadInfra(type, url);
    // Render Them
    signalmentsView.renderInfraOptions(data, type);
}

// Annonces Controllers
async function controlAnnonce(id) {
    // Get Annonce's infos
    const data = await annonceModal.loadAnnonceInfo(id);
    // Render Them
    console.log(data);
    annoncesView.renderAnnonceInfo(data);
}


if ((window.location.pathname.slice(1) == "signalments")) {
    console.log("Signalement");

    function init() {
        signalmentsView.addHandlerRender(controlSignalements);
        signalmentsView.addHandlerParentFilterChange();
        signalmentsView.addHandlerInfraFilters();
        signalmentsView.addHandlerShowModalBtn();
        signalmentsView.addHandlerCloseModal();
        signalmentsView.addHandlerApproveSignalmentBtn();
        signalmentsView.addHandlerResendSignalmentsBtn();
        signalmentsView.addHandlerDeleteSignalmentBtn();
        signalmentsView.addHandlerShowRattachedToBody();
        signalmentsView.addHandlerRattachedToBackBtn();
        signalmentsView.addHandlerRattachedToSubmitBtn();
        signalmentsView.addHandlerCloseRattachedToBtn();
        // Modal
        signalmentsView.addHandlerModalState();
        signalmentsView.addHandlerModalCategoryChange();
        // Selects
        signalmentsView.addHandlerCategoryChange();
        signalmentsView.addHandlerStateChange();
        signalmentsView.addHandlerLoadAnnexe(controlInfra, "annexe", '/infrastructure/annexe');
        signalmentsView.addHandlerAnnexeChange(controlInfra, "bloc", '/infrastructure/bloc/listing/' );
        signalmentsView.addHandlerBlocChange(controlInfra, "room", '/infrastructure/room/listing/');
        signalmentsView.adHandlerSalleChange();
    }
    init();
}


if ((window.location.pathname.slice(1) == "annonces")) {
    console.log("Annonces");

    function init() {
        // OnLoad
        annoncesView.addHandlerAnnonceState();
        // Modal
        annoncesView.addHandlerShowModalBtn(controlAnnonce);
        annoncesView.addHandlerCloseModal();
        annoncesView.addHandlerDeleteAnnonceBtn();
    }

    init();

}

// 


// Old Controller (Needs Refactoring)
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
    console.log("Js Fired (Old Controller)");
})


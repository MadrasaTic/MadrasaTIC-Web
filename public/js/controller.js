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
import addSignalmentView from "./Views/addSignalmentView.js";

// Signalements
async function controlShowSignalment (signalmentID) {
    // Get Signalment Info
    const data = await signalmentsModal.loadSignalmentInfo(signalmentID);
    // Organize Data
    const  {
        id,
        title,
        description,
        annexe: {name: annexeName},
        creator: {user_information: {first_name: creatorFName, last_name: creatorLName, user_id: creatorID}},
        last_signalement_v_c: {state: {id: stateID}, category: {id: categoryID}, attachement: image},
    } = data;
    data.blocName = data.bloc?data.bloc.name : ""
    data.roomName = data.room?data.room.name : ""
    const blocName = data.bloc?data.bloc.name : ""
    const roomName = data.room?data.room.name : ""
    const filteredData = {
        id,
        creatorID: creatorID,
        title: title,
        description: description,
        annexeName : annexeName,
        image: image,
        blocName: blocName,
        roomName : roomName,
        creatorName : creatorFName +  " " +creatorLName,
        stateID: stateID,
        categoryID: categoryID,
    }
    console.log(filteredData);
    // Render Data
    signalmentsView.renderShowSignalment(filteredData);
}

async function controlShowRapport(signalmentID) {
    // Get rapport data
    const data = await signalmentsModal.loadRapportInfo(signalmentID);
    // Render Data
    signalmentsView.renderShowRapport(data);
}

async function controlAddRapport(uploadData) {
    const resp = await signalmentsModal.addSignalmentRapport(uploadData);
    console.log(resp);
}

async function controlDeleteSignalment(signalmentID) {
    const resp = await signalmentsModal.deleteSignalment(signalmentID);
    console.log(resp);
    window.location.reload();
}

async function controlInfra(type, url) {
    // Get Annexes
    const data = await signalmentsModal.loadInfra(type, url);
    // Render Data
    signalmentsView.renderInfraOptions(data, type);
}

// Annonces Controllers
async function controlAnnonce(id) {
    // Get Annonce's infos
    const data = await annonceModal.loadAnnonceInfo(id);
    // Render Them
    annoncesView.renderAnnonceInfo(data);
}

if (window.location.pathname.slice(1) == "signalments/create") {
    console.log("Add Signalement");
    addSignalmentView.addHandlerLoadAnnexe(controlInfra, "annexe", '/infrastructure/annexe');
    addSignalmentView.addHandlerAnnexeChange(controlInfra, "bloc", '/infrastructure/bloc/listing/' );
    addSignalmentView.addHandlerBlocChange(controlInfra, "room", '/infrastructure/room/listing/');
    addSignalmentView.adHandlerSalleChange();

}

if ((window.location.pathname.slice(1) == "signalments")) {
    console.log("Signalement");

    function init() {
        signalmentsView.addHanlderApplyStateColors();
        signalmentsView.addHandlerRender();
        signalmentsView.addHandlerParentFilterChange();
        // Basic Modal Operations
        signalmentsView.addHandlerShowModalBtn(controlShowSignalment);
        signalmentsView.addHandlerCloseModal();

        signalmentsView.addHandlerApproveSignalmentBtn();
        signalmentsView.addHandlerResendSignalmentsBtn();
        signalmentsView.addHandlerDeleteSignalmentBtn(controlDeleteSignalment);
        // Rattached To
        signalmentsView.addHandlerShowRattachedToBody();
        signalmentsView.addHandlerCloseRattachedToBtn();

        signalmentsView.addHandlerDivClick();

        signalmentsView.addHandlerRattachedToBackBtn();
        signalmentsView.addHandlerRattachedToSubmitBtn();

        signalmentsView.addHandlerModalCategoryChange();
        // Add Rapport
        signalmentsView.addHandlerShowRapportBody();
        signalmentsView.addHandlerCloseRapportBtn();
        signalmentsView.addHandlerRapportAddBtn(controlAddRapport);
        signalmentsView.addHandlerRapportBackBtn();
        signalmentsView.addHandlerInputDispaly();
        signalmentsView.addHandlerRapportImgBtn();
        // View Rapport
        signalmentsView.addHandlerViewRapportBody(controlShowRapport);
        signalmentsView.addHandlerCloseViewRapportBtn();
        signalmentsView.addHandlerViewRapportBackBtn();
        // View Changes
        signalmentsView.addHandlerViewChangestBody();
        signalmentsView.addHandlerCloseViewChangesBtn();
        signalmentsView.addHandlerChangestBackBtn();
        // Filters
        signalmentsView.addHandlerCategoryChange();
        signalmentsView.addHandlerStateChange();
        signalmentsView.addHandlerInfraFilters();
        signalmentsView.addHandlerLoadAnnexe(controlInfra, "annexe", '/infrastructure/annexe');
        signalmentsView.addHandlerAnnexeChange(controlInfra, "bloc", '/infrastructure/bloc/listing/' );
        signalmentsView.addHandlerBlocChange(controlInfra, "room", '/infrastructure/room/listing/');
        signalmentsView.adHandlerSalleChange();
        // Inputs
        signalmentsView.addHandlerSearchInput();
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

    if (window.location.pathname.slice(1) != "addSignalement") {
        sideBarView.displayHoverEffect();
    }

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


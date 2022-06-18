// Module Import
// import * as model from "./model.js";
import loginView from "./Views/loginView.js";
import profileView from "./Views/profileView.js";
import tablesView from "./Views/tablesView.js";
import sideBarView from "./Views/sideBarView.js";
import infraView from "./Views/infraView.js";
import signalmentsView from "./Views/signalmentsView.js";
// Models
import * as signalmentsModal from "./Modals/signalmentsModal.js";

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
        bloc: {name: blocName},
        room: {name: roomName},
        creator: {user_information: {first_name: creatorFName, last_name: creatorLName}},
        last_signalement_v_c: {state: {id: stateID}, category: {id: categoryID}, attachement: image},
    } = data;

    const filteredData = {
        id,
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

async function controlInfra(type, url) {
    // Get Annexes
    const data = await signalmentsModal.loadInfra(type, url);
    // Render Data
    signalmentsView.renderInfraOptions(data, type);
}


if ((window.location.pathname.slice(1) == "signalments")) {

    function init() {
        signalmentsView.addHanlderApplyStateColors();
        signalmentsView.addHandlerRender();
        signalmentsView.addHandlerParentFilterChange();
        // Basic Modal Operations
        signalmentsView.addHandlerShowModalBtn(controlShowSignalment);
        signalmentsView.addHandlerCloseModal();
        
        signalmentsView.addHandlerApproveSignalmentBtn();
        signalmentsView.addHandlerResendSignalmentsBtn();
        signalmentsView.addHandlerDeleteSignalmentBtn();
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
        signalmentsView.addHandlerRapportAddBtn();
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


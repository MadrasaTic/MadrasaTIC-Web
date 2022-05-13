

class SignalmentsView {

    addHandlerRender(handler) {
        if (window.location.pathname.slice(1) == "signalments") handler();
    }

    addHandlerParentFilterChange() {
        document.querySelector("#signa--nav").addEventListener("click", (e) => {
            if (!e.target.classList.contains("nav_filter")) return;
            if (e.target.classList.contains("nav_item--hoverd")) return;
            document.querySelector(".nav_item--hoverd").classList.remove("nav_item--hoverd");
            e.target.classList.add("nav_item--hoverd");
        })
    }

    addHandlerInfraFilters() {
        document.querySelector("#infra_filter--button").addEventListener("click", () => {
            document.querySelector("#infra-filters--container").classList.toggle("d-none")
        })
    }

    addHandlerShowModalBtn() {
        document.querySelector("#show_modal--button").addEventListener("click", () => {
            document.querySelector("#modal_signalments").classList.remove("d-none");
        })
    } 

    addHandlerCloseModal() {
        document.querySelector("#close_signalment--button").addEventListener("click", () => {
            document.querySelector("#modal_signalments").classList.add("d-none");
        })
    }

    addHandlerApproveSignalmentBtn() {
        document.querySelector("#approve_signalment--button").addEventListener("click", () => {
            console.log("Signalements Approved");
        })
    }

    addHandlerResendSignalmentsBtn() {
        document.querySelector("#resend_signalment--button").addEventListener("click", () => {
            console.log("Signalement Resent");
        })
    }

    addHandlerDeleteSignalmentBtn() {
        document.querySelector("#delete_signalment--button").addEventListener("click", () => {
            console.log("Signalment Delete");
        })
    }

    addHandlerShowRattachedToBody() {
        document.querySelector("#showRattachedTo--button").addEventListener("click", () => {
            document.querySelector("#signalments--body").classList.add("d-none");
            document.querySelector("#rattachedTo--body").classList.remove("d-none");
        })
    }

    addHandlerRattachedToBackBtn() {
        document.querySelector("#rattachedTo_back--button").addEventListener("click", () => {
            document.querySelector("#signalments--body").classList.remove("d-none");
            document.querySelector("#rattachedTo--body").classList.add("d-none");
        })
    }

    addHandlerRattachedToSubmitBtn() {
        document.querySelector("#rattachedTo_valid--button").addEventListener("click", () => {
            console.log("Valider le rattachement");
        })
    }

    addHandlerCloseRattachedToBtn() {
        document.querySelector("#close_rattachedTo--icon").addEventListener("click", () => {
            document.querySelector("#signalments--body").classList.remove("d-none");
            document.querySelector("#rattachedTo--body").classList.add("d-none");
        })
    }
    
    // Selects
    addHandlerModalCategoryChange() {
        document.querySelector("#modalCategory--select").addEventListener("change", () => {
            console.log('Category Select changes');
        })
    }

    addHandlerCategoryChange() {
        document.querySelector("#category--select").addEventListener("change", () => {
            console.log("Category Principal change");
        })
    }

    addHandlerStateChange() {
        document.querySelector("#state--select").addEventListener("change", () => {
            console.log("State Change");
        })
    }
    
    addHandlerAnnexeChange() {
        document.querySelector("#annexe--select").addEventListener("change", () => {
            console.log("Annexe Change");
        })
    }

    addHandlerBlocChange() {
        document.querySelector("#bloc--select").addEventListener("change", () => {
            console.log("Bloc change");
        })
    }

    adHandlerSalleChange() {
        document.querySelector("#salle--select").addEventListener("change", () => {
            console.log("Salle change");
        })
    }

    addHandlerModalState() {
        document.querySelector("#modalState--container").addEventListener("click", () => {
            console.log("Modal state change");
        })
    }

}

export default new SignalmentsView();



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
    addHandlerLoadAnnexe(handler, type, url) {
        window.addEventListener("load", () => {
            handler(type, url)
        })
    }

    addHandlerAnnexeChange(handler, type, url) {
        const annexeSelect = document.querySelector("#annexe--select");
        annexeSelect.addEventListener("change", () => {
            const selectedOption = annexeSelect.options[annexeSelect.selectedIndex];
            if (!selectedOption) return
            const blocsUrl = url + selectedOption.value
            handler(type, blocsUrl)
        })
        annexeSelect.addEventListener("click", () => {
            const selectedOption = annexeSelect.options[annexeSelect.selectedIndex];
            if (!selectedOption) return
            const blocsUrl = url + selectedOption.value
            handler(type, blocsUrl)
        })
    }

    addHandlerBlocChange(handler, type, url) {
        const blocSelect = document.querySelector("#bloc--select");
        blocSelect.addEventListener("change", () => {
            const selectedOption = blocSelect.options[blocSelect.selectedIndex];
            if (!blocSelect) return
            const roomsUrl = url + selectedOption.value
            handler(type, roomsUrl)
        })
        blocSelect.addEventListener("click", () => {
            const selectedOption = blocSelect.options[blocSelect.selectedIndex];
            if (!blocSelect) return
            const roomsUrl = url + selectedOption.value
            handler(type, roomsUrl)
        })
    }

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
    
    

    adHandlerSalleChange(handler) {
        document.querySelector("#room--select").addEventListener("change", () => {
            console.log("Salle change");
        })
    }

    addHandlerModalState() {
        document.querySelector("#modalState--container").addEventListener("click", () => {
            console.log("Modal state change");
        })
    }



    renderInfraOptions(data, type) {
        if (type == "bloc" ) document.querySelector(`#bloc--select`).innerHTML = "";
        document.querySelector(`#room--select`).innerHTML = "";
        data.forEach(item =>  {
            const select = document.querySelector(`#${type}--select`);
            const html = `<option value="${item.id}">${item.name}</option>`;
            select.insertAdjacentHTML("beforeend", html)
        })
    }
}

export default new SignalmentsView();



class SignalmentsView {
    #selectedCategory = "Catégories";
    #selectedState = "États";
    #selectedDate = "";
    #selectedAnnexe = "Annexes";
    #selectedBloc = "Blocs";
    #selectedRoom = "Salles";

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
            // Filtrage Code
            this.#selectedAnnexe = selectedOption.text;
            // First Display ALL Cards
            let allCards = Array.from(document.querySelectorAll(".cardDiv"))
            if (this.#selectedState != "États") allCards = allCards.filter(card => card.dataset.state == this.#selectedState);
            if (this.#selectedCategory != "Catégories") allCards = allCards.filter(card => card.dataset.category == this.#selectedCategory);

            //
            allCards.forEach(card => card.classList.remove("d-none"))
            // If Categories Reset
            if (this.#selectedAnnexe == "Annexes") return;
            // First Cards not Match Condition
            const notMatchCardTAB  = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.annexe && card.dataset.annexe != selectedOption.text);
            notMatchCardTAB.forEach(card => card.classList.add("d-none"));
        })
       annexeSelect.addEventListener("click", () => {
           const selectedOption = annexeSelect.options[annexeSelect.selectedIndex];
           if (!selectedOption) return
           const blocsUrl = url + selectedOption.value
           handler(type, blocsUrl)
           // Filtrage Code
           this.#selectedAnnexe = selectedOption.text;
           // First Display ALL Cards
           let allCards = Array.from(document.querySelectorAll(".cardDiv"))
           if (this.#selectedState != "États") allCards = allCards.filter(card => card.dataset.state == this.#selectedState);
           if (this.#selectedCategory != "Catégories") allCards = allCards.filter(card => card.dataset.category == this.#selectedCategory);

           //
           allCards.forEach(card => card.classList.remove("d-none"))
           // If Categories Reset
           if (this.#selectedAnnexe == "Annexes") return;
           // First Cards not Match Condition
           const notMatchCardTAB  = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.annexe && card.dataset.annexe != selectedOption.text);
           notMatchCardTAB.forEach(card => card.classList.add("d-none"));
       })
       

    }

    addHandlerBlocChange(handler, type, url) {
        const blocSelect = document.querySelector("#bloc--select");
        blocSelect.addEventListener("change", () => {
            const selectedOption = blocSelect.options[blocSelect.selectedIndex];
            if (!blocSelect) return
            const roomsUrl = url + selectedOption.value
            handler(type, roomsUrl)
            // Filtrage Code
            this.#selectedBloc = selectedOption.text;
            // First Display ALL Cards
            let allCards = Array.from(document.querySelectorAll(".cardDiv"))
            if (this.#selectedState != "États") allCards = allCards.filter(card => card.dataset.state == this.#selectedState);
            if (this.#selectedCategory != "Catégories") allCards = allCards.filter(card => card.dataset.category == this.#selectedCategory);
            allCards = allCards.filter(card => card.dataset.annexe == this.#selectedAnnexe);

            //
            allCards.forEach(card => card.classList.remove("d-none"))
            // If Categories Reset
            if (this.#selectedAnnexe == "Annexes" || this.#selectedBloc == "Blocs") return;
            // First Cards not Match Condition
            const notMatchCardTAB  = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.bloc && card.dataset.bloc != selectedOption.text);
            notMatchCardTAB.forEach(card => card.classList.add("d-none"));
        })
        blocSelect.addEventListener("click", () => {
            const selectedOption = blocSelect.options[blocSelect.selectedIndex];
            if (!blocSelect) return
            const roomsUrl = url + selectedOption.value
            handler(type, roomsUrl)
                  // Filtrage Code
                  this.#selectedBloc = selectedOption.text;
                  // First Display ALL Cards
                  let allCards = Array.from(document.querySelectorAll(".cardDiv"))
                  if (this.#selectedState != "États") allCards = allCards.filter(card => card.dataset.state == this.#selectedState);
                  if (this.#selectedCategory != "Catégories") allCards = allCards.filter(card => card.dataset.category == this.#selectedCategory);
                  allCards = allCards.filter(card => card.dataset.annexe == this.#selectedAnnexe);
      
                  //
                  allCards.forEach(card => card.classList.remove("d-none"))
                  // If Categories Reset
                  if (this.#selectedAnnexe == "Annexes" || this.#selectedBloc == "Blocs") return;
                  // First Cards not Match Condition
                  const notMatchCardTAB  = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.bloc && card.dataset.bloc != selectedOption.text);
                  notMatchCardTAB.forEach(card => card.classList.add("d-none"));
        })
    }

    addHandlerModalCategoryChange() {
        document.querySelector("#modalCategory--select").addEventListener("change", (e) => {
            console.log(e.target.value);
        })
    }

    addHandlerCategoryChange() {
        document.querySelector("#category--select").addEventListener("change", (e) => {
            const select = e.target.closest("select");
            const selectedOption = select.options[select.selectedIndex];
            this.#selectedCategory = selectedOption.text;
            // First Display ALL Cards
            let allCards = Array.from(document.querySelectorAll(".cardDiv"))
            if (this.#selectedState != "États") allCards = allCards.filter(card => card.dataset.state == this.#selectedState);
            if (this.#selectedAnnexe != "Annexes") allCards = allCards.filter(card => card.dataset.annexe == this.#selectedAnnexe);
            
            //
            allCards.forEach(card => card.classList.remove("d-none"))
            // If Categories Reset
            if (selectedOption.text == "Catégories") return;
            // First Cards not Match Condition
            const notMatchCardTAB  = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.category && card.dataset.category != selectedOption.text);
            notMatchCardTAB.forEach(card => card.classList.add("d-none"));
        })
    }

    addHandlerStateChange() {
        document.querySelector("#state--select").addEventListener("change", (e) => {
            const select = e.target.closest("select");
            const selectedOption = select.options[select.selectedIndex];
            this.#selectedState = selectedOption.text;
            // First Display ALL Cards
            let allCards = Array.from(document.querySelectorAll(".cardDiv"));
            if (this.#selectedCategory != "Catégories") allCards = allCards.filter(card => card.dataset.category == this.#selectedCategory);
            if (this.#selectedAnnexe != "Annexes") allCards = allCards.filter(card => card.dataset.annexe == this.#selectedAnnexe);
            
            //
            allCards.forEach(card => card.classList.remove("d-none"))
            // If Categories Reset
            if (selectedOption.text == "États") return;
            // First Cards not Match Condition
            const notMatchCardTAB  = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.state && card.dataset.state != selectedOption.text);
            notMatchCardTAB.forEach(card => card.classList.add("d-none"));
        })
    }
    
    

    adHandlerSalleChange(handler) {
        document.querySelector("#room--select").addEventListener("change", (e) => {
            // Filtrage Code
            const selectedOption = e.target.options[e.target.selectedIndex];
            console.log(selectedOption)
            this.#selectedRoom = selectedOption.text;
            // First Display ALL Cards
            let allCards = Array.from(document.querySelectorAll(".cardDiv"))
            if (this.#selectedState != "États") allCards = allCards.filter(card => card.dataset.state == this.#selectedState);
            if (this.#selectedCategory != "Catégories") allCards = allCards.filter(card => card.dataset.category == this.#selectedCategory);
            allCards = allCards.filter(card => card.dataset.annexe == this.#selectedAnnexe);
            allCards = allCards.filter(card => card.dataset.bloc == this.#selectedBloc);

            //
            allCards.forEach(card => card.classList.remove("d-none"))
            // If Categories Reset
            if (this.#selectedAnnexe == "Annexes" || this.#selectedBloc == "Blocs" || this.#selectedRoom == "Salles") return;
            // First Cards not Match Condition
            const notMatchCardTAB  = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.room && card.dataset.room != selectedOption.text);
            notMatchCardTAB.forEach(card => card.classList.add("d-none"));
        })
    }

    addHandlerModalState() {
        document.querySelector("#modalState--container").addEventListener("click", () => {
            console.log("Modal state change");
        })
    }



    renderInfraOptions(data, type) {
        if (type == "bloc" ) {
            const blocSelect = document.querySelector(`#bloc--select`)
            blocSelect.innerHTML = "";
            const html = `<option value="reset" selected>Blocs</option>`
            blocSelect.insertAdjacentHTML("afterbegin", html)
        } 
        const roomSelect = document.querySelector(`#room--select`)
        roomSelect.innerHTML = "";
        const html2 = `<option value="reset" selected>Salles</option>`;
        roomSelect.insertAdjacentHTML("afterbegin", html2)
        data.forEach(item =>  {
            const select = document.querySelector(`#${type}--select`);
            const html = `<option value="${item.id}">${item.name}</option>`;
            select.insertAdjacentHTML("beforeend", html)
        })
    }
}

export default new SignalmentsView();

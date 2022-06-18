

class SignalmentsView {
    #selectedCategory = "Catégories";
    #selectedState = "États";
    #selectedDate = "";
    #selectedAnnexe = "Annexes";
    #selectedBloc = "Blocs";
    #selectedRoom = "Salles";
    #selectedParentFilter = "aiguillés";
    #currentSignalmentID = "";
    #currentSignalmentCategoryName = "";
    #currentSignalmentCreatorID = "";


    // Init
    addHandlerRender() {
        // if (window.location.pathname.slice(1) == "signalments") 
    }

    addHanlderApplyStateColors() {
        window.addEventListener("load", () => {
            document.querySelectorAll(".color--icon").forEach(color => {
                color.style.backgroundColor = color.dataset.color;
            })
        })
    }

    addHandlerParentFilterChange() {
        document.querySelector("#signa--nav").addEventListener("click", (e) => {
            if (!e.target.classList.contains("nav_filter")) return;
            if (e.target.classList.contains("nav_item--hoverd")) return;
            document.querySelector(".nav_item--hoverd").classList.remove("nav_item--hoverd");
            e.target.classList.add("nav_item--hoverd");
            //
            let allCards = Array.from(document.querySelectorAll(".cardDiv"));
            allCards.forEach(card => card.classList.remove("d-none"));
            this.#selectedParentFilter = e.target.dataset.type;
            let notMatchCardTAB = ""
            this.#selectedParentFilter = e.target.dataset.type;
            if (e.target.dataset.type == "aiguillés") {
                notMatchCardTAB = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.state == "Non Traité");
            } else {
                notMatchCardTAB = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.state != "Non Traité");
            }
            notMatchCardTAB.forEach(card => card.classList.add("d-none"));
        })
        window.addEventListener("load", (e) => {
            let allCards = Array.from(document.querySelectorAll(".cardDiv"))
            //
            allCards.forEach(card => card.classList.remove("d-none"))
            let notMatchCardTAB = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.state == "Non Traité");
            notMatchCardTAB.forEach(card => card.classList.add("d-none"));
        })
    }
    
    addHandlerSearchInput() {
        const input = document.querySelector("#search--input")
        input.addEventListener("input", (e) => {
            let allCards = Array.from(document.querySelectorAll(".cardDiv"));
            // Display All cards
            allCards.forEach(card => card.classList.add("d-none"));
            // 
            if (this.#selectedParentFilter == "aiguillés") allCards = allCards.filter(card => card.dataset.state != "Non Traité");                
            if (this.#selectedParentFilter == "non-aiguillés") allCards = allCards.filter(card => card.dataset.state == "Traité" );
            if (this.#selectedState != "États") allCards = allCards.filter(card => card.dataset.state == this.#selectedState);
            if (this.#selectedCategory != "Catégories") allCards = allCards.filter(card => card.dataset.category == this.#selectedCategory);
            allCards = allCards.filter(card => card.dataset.title.includes(input.value) || card.dataset.category.includes(input.value)) 
            //
            allCards.forEach(card => card.classList.remove("d-none"));
            window.scrollBy(0, 150);
        })
    }


    // Modal Basic Operations
    addHandlerShowModalBtn(handler) {
        const showModalBtn = document.querySelectorAll(".show_modal--button");
        showModalBtn.forEach(btn => {
            btn.addEventListener("click", (e) => {  
                // Display Modal
                document.querySelector("#modal_signalments").classList.remove("d-none");
                // Get clicked Signalment ID
                const id = e.target.dataset.signalmentid;
                // Call controller
                handler(id);
            })
        })
    } 
    addHandlerCloseModal() {
        document.querySelector("#close_signalment--button").addEventListener("click", () => {
            document.querySelector("#modal_signalments").classList.add("d-none");
        })
    }
    addHandlerApproveSignalmentBtn() {
        document.querySelector("#approve_signalment--button").addEventListener("click", (e) => {
            console.log("Signalements Approved");
        })
    }
    addHandlerResendSignalmentsBtn() {
        document.querySelector("#resend_signalment--button").addEventListener("click", () => {
            console.log("Signalement Resent");
        })
    }
    addHandlerDeleteSignalmentBtn(handler) {
        document.querySelector("#delete_signalment--button").addEventListener("click", (e) => {
            // e.target.querySelector("a").href = `/signalments/delete/${this.#currentSignalmentID}`;
            console.log(e.target);
            console.log(this.#currentSignalmentID);
            handler(this.#currentSignalmentID);
        })
    }

    // Modal Rattached To
    addHandlerShowRattachedToBody() {
        document.querySelector("#showRattachedTo--button").addEventListener("click", (e) => {
            e.preventDefault()
            document.querySelector("#signalments--body").classList.add("d-none");
            document.querySelector("#rattachedTo--body").classList.remove("d-none");
            const cardsContainer = document.querySelector("#rattachedTo--body").querySelector(".modal-body");
            const allCards = Array.from(cardsContainer.querySelectorAll(".card"));
            // Display All Cards
            allCards.forEach(card => card.classList.remove("d-none"));
            // Hide same ID & Not Same Category Name
            const noMatchCard = allCards.filter(card => card.dataset.signalmentid == this.#currentSignalmentID || card.dataset.signalmentcategory != this.#currentSignalmentCategoryName);
            noMatchCard && noMatchCard.forEach(card => card.classList.add("d-none"));
        })
    }

    addHandlerRattachedToBackBtn() {
        document.querySelector("#rattachedTo_back--button").addEventListener("click", (e) => {
            e.preventDefault()
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

    addHandlerDivClick() {
        const rattachedToBody = document.querySelector("#rattachedTo--body");
        const rattachedToCards = rattachedToBody.querySelectorAll(".card");
        rattachedToCards.forEach(card => {
            card.addEventListener("click", (e) => {
                const divCard = e.target.closest(".card");
                const selectedCard = rattachedToBody.querySelector(".cardClicked");
                divCard.classList.toggle("cardClicked");
                selectedCard && selectedCard.classList.remove("cardClicked");
            })
        })
    }

    // Add Rapport Body
    addHandlerShowRapportBody() {
        document.querySelector("#showRapport--button").addEventListener("click", (e)=> {
            e.preventDefault();
            document.querySelector("#signalments--body").classList.add("d-none");
            document.querySelector("#rapport--body").classList.remove("d-none");
        })
    }

    addHandlerCloseRapportBtn() {
        document.querySelector("#close_rapport--icon").addEventListener("click", () => {
            document.querySelector("#signalments--body").classList.remove("d-none");
            document.querySelector("#rapport--body").classList.add("d-none");
        })
    }

    addHandlerRapportAddBtn(handler) {
        document.querySelector("#rapport_add--button").addEventListener("click", (e) =>{
            e.preventDefault();
            console.log("Add Rapport");
            // Récupréer inputs et les stocker dans un object
            const uploadData = {
                title: document.querySelector("#addRapport-title").value,
                description: document.querySelector("#addRapport-description").value,
                attachement: document.querySelector("#rapport--browse").value,
                created_by: this.#currentSignalmentCreatorID,
                signalement_id: this.#currentSignalmentID,
            }
            // Send the object to the controlelr
            console.log(uploadData);
            handler(uploadData)
        })
    } 

    addHandlerRapportBackBtn() {
        document.querySelector("#rapport_back--button").addEventListener("click", (e) =>{
            e.preventDefault()
            document.querySelector("#signalments--body").classList.remove("d-none");
            document.querySelector("#rapport--body").classList.add("d-none");
        })  
    }

    addHandlerInputDispaly() {
        const rapportBody = document.querySelector("#rapport--body");
        const inputs = Array.from(rapportBody.querySelectorAll("input"));
        inputs.push(rapportBody.querySelector("textarea"));

        inputs.forEach(input => {
            input.addEventListener("keypress", (e) => {
                if (e.key === "Enter") {
                    e.preventDefault();
                }
            })
        })
    }

    addHandlerRapportImgBtn() {
        const addImageBtn = document.querySelector("#rapport_image--button");
        const browseInput = document.querySelector("#rapport--browse");
        addImageBtn.addEventListener("click", (e) => {
            browseInput.click();
        })
        browseInput.addEventListener("change", (e) => {
            document.querySelector("#rapport_images--p").textContent = browseInput.value;
        })
    }

    // View Rapport
    addHandlerViewRapportBody(handler) {
        document.querySelector("#viewRapport--button").addEventListener("click", (e)=> {
            e.preventDefault();
            document.querySelector("#signalments--body").classList.add("d-none");
            document.querySelector("#viewRapport--body").classList.remove("d-none");
             // 
            handler(this.#currentSignalmentID);
        })
    }

    addHandlerCloseViewRapportBtn() {
        document.querySelector("#close_viewRapport--icon").addEventListener("click", () => {
            document.querySelector("#signalments--body").classList.remove("d-none");
            document.querySelector("#viewRapport--body").classList.add("d-none");
        })
    }

    addHandlerViewRapportBackBtn() {
        document.querySelector("#viewRapport_back--button").addEventListener("click", (e) =>{
            e.preventDefault()
            document.querySelector("#signalments--body").classList.remove("d-none");
            document.querySelector("#viewRapport--body").classList.add("d-none");
        })  
    }

    // View Change
    addHandlerViewChangestBody() {
        document.querySelector("#viewChanges--button").addEventListener("click", (e)=> {
            e.preventDefault();
            document.querySelector("#signalments--body").classList.add("d-none");
            document.querySelector("#changes--body").classList.remove("d-none");
        })
    }

    addHandlerCloseViewChangesBtn() {
        document.querySelector("#close_changes--icon").addEventListener("click", () => {
            document.querySelector("#signalments--body").classList.remove("d-none");
            document.querySelector("#changes--body").classList.add("d-none");
        })
    }

    addHandlerChangestBackBtn() {
        document.querySelector("#changes_back--button").addEventListener("click", (e) =>{
            e.preventDefault()
            document.querySelector("#signalments--body").classList.remove("d-none");
            document.querySelector("#changes--body").classList.add("d-none");
        })  
    }
    // Select Handlers    
    addHandlerInfraFilters() {
        document.querySelector("#infra_filter--button").addEventListener("click", () => {
            document.querySelector("#infra-filters--container").classList.toggle("d-none")
        })
    }

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
            if (this.#selectedParentFilter == "aiguillés") allCards = allCards.filter(card => card.dataset.state != "Non Traité");                
            if (this.#selectedParentFilter == "non-aiguillés") allCards = allCards.filter(card => card.dataset.state == "Traité" );
            if (this.#selectedState != "États") allCards = allCards.filter(card => card.dataset.state == this.#selectedState);
            if (this.#selectedCategory != "Catégories") allCards = allCards.filter(card => card.dataset.category == this.#selectedCategory);
            //
            allCards.forEach(card => card.classList.remove("d-none"))
            // If Categories Reset
            if (this.#selectedAnnexe == "Annexes") return;
            // First Cards not Match Condition
            const notMatchCardTAB = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.annexe && card.dataset.annexe != selectedOption.text);
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
            let allCards = Array.from(document.querySelectorAll(".cardDiv"));
            if (this.#selectedParentFilter == "aiguillés") allCards = allCards.filter(card => card.dataset.state != "Non Traité");                
            if (this.#selectedParentFilter == "non-aiguillés") allCards = allCards.filter(card => card.dataset.state == "Traité" );
            if (this.#selectedState != "États") allCards = allCards.filter(card => card.dataset.state == this.#selectedState);
            if (this.#selectedCategory != "Catégories") allCards = allCards.filter(card => card.dataset.category == this.#selectedCategory);
            //
            allCards.forEach(card => card.classList.remove("d-none"))
            // If Categories Reset
            if (this.#selectedAnnexe == "Cites") return;
            // First Cards not Match Condition
            const notMatchCardTAB = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.annexe && card.dataset.annexe != selectedOption.text);
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
            if (this.#selectedParentFilter == "aiguillés") allCards = allCards.filter(card => card.dataset.state != "Non Traité");                
            if (this.#selectedParentFilter == "non-aiguillés") allCards = allCards.filter(card => card.dataset.state == "Traité" );
            if (this.#selectedState != "États") allCards = allCards.filter(card => card.dataset.state == this.#selectedState);
            if (this.#selectedCategory != "Catégories") allCards = allCards.filter(card => card.dataset.category == this.#selectedCategory);
            allCards = allCards.filter(card => card.dataset.annexe == this.#selectedAnnexe);
            //
            allCards.forEach(card => card.classList.remove("d-none"))
            // If Categories Reset
            if (this.#selectedAnnexe == "Annexes" || this.#selectedBloc == "Blocs") return;
            // First Cards not Match Condition
            const notMatchCardTAB = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.bloc && card.dataset.bloc != selectedOption.text);
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
            let allCards = Array.from(document.querySelectorAll(".cardDiv"));
            if (this.#selectedParentFilter == "aiguillés") allCards = allCards.filter(card => card.dataset.state != "Non Traité");                
            if (this.#selectedParentFilter == "non-aiguillés") allCards = allCards.filter(card => card.dataset.state == "Traité" );
            if (this.#selectedState != "États") allCards = allCards.filter(card => card.dataset.state == this.#selectedState);
            if (this.#selectedCategory != "Catégories") allCards = allCards.filter(card => card.dataset.category == this.#selectedCategory);
            allCards = allCards.filter(card => card.dataset.annexe == this.#selectedAnnexe);
            //
            allCards.forEach(card => card.classList.remove("d-none"))
            // If Categories Reset
            if (this.#selectedAnnexe == "Annexes" || this.#selectedBloc == "Blocs") return;
            // First Cards not Match Condition
            const notMatchCardTAB = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.bloc && card.dataset.bloc != selectedOption.text);
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
            let allCards = Array.from(document.querySelectorAll(".cardDiv"));
            if (this.#selectedParentFilter == "aiguillés") allCards = allCards.filter(card => card.dataset.state != "Non Traité");                
            if (this.#selectedParentFilter == "non-aiguillés") allCards = allCards.filter(card => card.dataset.state == "Traité" );
            if (this.#selectedState != "États") allCards = allCards.filter(card => card.dataset.state == this.#selectedState);
            if (this.#selectedAnnexe != "Annexes") allCards = allCards.filter(card => card.dataset.annexe == this.#selectedAnnexe);
            //
            allCards.forEach(card => card.classList.remove("d-none"))
            // If Categories Reset
            if (selectedOption.text == "Catégories") return;
            // First Cards not Match Condition
            const notMatchCardTAB = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.category && card.dataset.category != selectedOption.text);
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
            if (this.#selectedParentFilter == "aiguillés") allCards = allCards.filter(card => card.dataset.state != "Non Traité");                
            if (this.#selectedParentFilter == "non-aiguillés") allCards = allCards.filter(card => card.dataset.state == "Traité" );
            if (this.#selectedCategory != "Catégories") allCards = allCards.filter(card => card.dataset.category == this.#selectedCategory);
            if (this.#selectedAnnexe != "Annexes") allCards = allCards.filter(card => card.dataset.annexe == this.#selectedAnnexe);
            //
            allCards.forEach(card => card.classList.remove("d-none"))
            // If Categories Reset
            if (selectedOption.text == "États") return;
            // First Cards not Match Condition
            const notMatchCardTAB = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.state && card.dataset.state != selectedOption.text);
            notMatchCardTAB.forEach(card => card.classList.add("d-none"));
        })
    }

    adHandlerSalleChange(handler) {
        document.querySelector("#room--select").addEventListener("change", (e) => {
            // Filtrage Code
            const selectedOption = e.target.options[e.target.selectedIndex];
            this.#selectedRoom = selectedOption.text;
            // First Display ALL Cards
            let allCards = Array.from(document.querySelectorAll(".cardDiv"));
            if (this.#selectedParentFilter == "aiguillés") allCards = allCards.filter(card => card.dataset.state != "Non Traité");                
            if (this.#selectedParentFilter == "non-aiguillés") allCards = allCards.filter(card => card.dataset.state == "Traité" );
            if (this.#selectedState != "États") allCards = allCards.filter(card => card.dataset.state == this.#selectedState);
            if (this.#selectedCategory != "Catégories") allCards = allCards.filter(card => card.dataset.category == this.#selectedCategory);
            allCards = allCards.filter(card => card.dataset.annexe == this.#selectedAnnexe);
            allCards = allCards.filter(card => card.dataset.bloc == this.#selectedBloc);
            //
            allCards.forEach(card => card.classList.remove("d-none"))
            // If Categories Reset
            if (this.#selectedAnnexe == "Annexes" || this.#selectedBloc == "Blocs" || this.#selectedRoom == "Salles") return;
            // First Cards not Match Condition
            const notMatchCardTAB = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.room && card.dataset.room != selectedOption.text);
            notMatchCardTAB.forEach(card => card.classList.add("d-none"));
        })
    }

    // Rendring
    renderInfraOptions(data, type) {
        if (type == "annexe") {
            const blocSelect = document.querySelector(`#annexe--select`)
            blocSelect.innerHTML = "";
            const html = `<option value="reset" selected>Cites</option>`
            blocSelect.insertAdjacentHTML("afterbegin", html)
        }
        if (type == "bloc") {
            const blocSelect = document.querySelector(`#bloc--select`)
            blocSelect.innerHTML = "";
            const html = `<option value="reset" selected>Blocs</option>`
            blocSelect.insertAdjacentHTML("afterbegin", html)
        }
        if (type == "room") {
            const blocSelect = document.querySelector(`#room--select`)
            blocSelect.innerHTML = "";
            const html = `<option value="reset" selected>Salles</option>`
            blocSelect.insertAdjacentHTML("afterbegin", html)
        }
        data.forEach(item => {
            const select = document.querySelector(`#${type}--select`);
            const html = `<option value="${item.id}">${item.name}</option>`;
            select.insertAdjacentHTML("beforeend", html)
        })
    }
    // Show Signalment
    renderShowSignalment(data) {
        // Set 
        this.#currentSignalmentID = data.id;
        this.#currentSignalmentCategoryName = document.querySelector(`#modalCategory--select option[value = "${data.categoryID}"]`).text;
        this.#currentSignalmentCreatorID = data.creatorID;

        // Header
        document.querySelector("#signalments-annexe").textContent = "Cite: " + data.annexeName;
        document.querySelector("#signalments-bloc").textContent = "Bloc: " + data.blocName;
        document.querySelector("#signalments-room").textContent = "Salle : " + data.roomName;
        // Selects
        document.querySelector(`#modalCategory--select option[value = "${data.categoryID}"]`).selected = true;
        document.querySelector(`#modalState--select option[value = "${data.stateID}"]`).selected = true;
        // Image
        // document.querySelector(`#signalments-img`).src = `/storage/${data.image}`;
        // Body
        document.querySelector("#signalment-title").textContent = data.title;
        document.querySelector("#signalment-description").textContent = data.description;
        document.querySelector("#signalments-user").textContent = data.creatorName;
    }   
    // Show Rapport
    renderShowRapport(data) {
        console.log(data);
        const rapportContainer = document.querySelector("#viewRapport--body").querySelector(".modal-body");
        const htmlInvalid = `
        <div class="h-100 w-100 d-flex align-items-center justify-content-center">
            <p>Aucun rapport n'est rattaché à ce signalement</p>
        </div>
        `
        if (data) {
            const htmlValid = `
            <div>
                <h3 id="viewRapport-title">${data.title }</h3>
                <p id="viewRapport-description" style="text-align: justify;">${data.description }</p>
                <img id="addRapport-image" class="img-fluid" src="/storage/images/report/${data.attachement}"
                    alt="Image du Rapport">
            </div>
            `

            rapportContainer.insertAdjacentHTML("afterbegin",  htmlValid) 
        } 
        else rapportContainer.insertAdjacentHTML("afterbegin", htmlInvalid)
    }
}

export default new SignalmentsView();

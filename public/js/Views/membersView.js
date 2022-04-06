import View from "./View.js";


class Members extends View {
    // Buttons
    #btnAdd = document.querySelector("#add--button");
    #btnModify = Array.from(document.querySelectorAll(".modify--button"));
    #btnRemove = Array.from(document.querySelectorAll(".remove--button"));
    // Modal
    #modalContainer = document.querySelector("#modal--container");
    #modalSaveButton = document.querySelector("#modal_save--button");
    #modalCloseButton = document.querySelector("#modal_close--button");
    #modalCloseIcon = document.querySelector("#close--icon");
    // Form
    #modalForm = "";
    #modalUpdateForm = "";
    #checkBoxTable = "";
    #textAreaTable = "";
    #currentPage = window.location.pathname.slice(1);
    #type =  this.#currentPage == "members" ? "un Membre" 
    : this.currentPage == "permissions" ?  "une Permission" 
    : "Un Rôle" 

    testFunction() {
    }


    generateFormTable() {
        this.#modalForm = Array.from(document.querySelector("#modal--form").elements)
        .filter (input => input.classList.contains("needs--validation"));
        this.#modalUpdateForm = Array.from(document.querySelector("#modal_update--form").elements)
        .filter (input => input.classList.contains("needs--validation"));
        this.#checkBoxTable =  Array.from(document.querySelector("#modal_update--form").elements)
        .filter(input => (input.type == "checkbox"))
        this.#textAreaTable = Array.from(document.querySelector("#modal_update--form").elements)
        .filter (input => input.classList.contains("text--area"));
    }

    async displayUpdateData(currentPage, id) {
        let data = await fetch(`/${currentPage}/${id}/edit`).then(function(response) {
            return response.json();
        }).then(function(data) {
            return data
        })
        const {user_information} = data;
        data = {...user_information, ...data}


        let permissionsTable = []
        if (data.permissions) permissionsTable = data.permissions.map(permObj => permObj["id"]) 
        
        console.log(permissionsTable);


        this.#modalUpdateForm.forEach((input) => {
            const inputText = input.id
            input.value = data[`${inputText}`]?? null;
        })

        this.#checkBoxTable.forEach((checkbox) => {
            const id = +checkbox.id.split("k").slice(-1).join("");
            if(permissionsTable.indexOf(id) >= 0) {
                checkbox.checked = true;
            }
        })


        this.#textAreaTable.forEach((textArea) => textArea.value = data.description)
    }

    activeSubmitButton(type) {
        this.#modalSaveButton.addEventListener("click", () => {
                document.querySelector(`.${type}--submit`).click();
            })
    }


    _inputsCheck() {
        this.#modalForm.forEach((input) => {
            input.addEventListener("focus", (e) => {
                this._renderInputValidation(e.target, input.type )();
                if (this._enableSaveBtn(this.#modalForm)) this.#modalSaveButton.classList.remove("disabled")
                else this.#modalSaveButton.classList.add("disabled");
            });
            input.addEventListener("blur", this._renderBlurValidation);
            input.addEventListener("input", (e) => {
                this._renderInputValidation(e.target, input.type )();
                if (this._enableSaveBtn(this.#modalForm)) this.#modalSaveButton.classList.remove("disabled")
                else this.#modalSaveButton.classList.add("disabled");
            })
        })
        this.#modalUpdateForm.forEach((input) => {
            input.addEventListener("focus", (e) => {
                this._renderInputValidation(e.target, input.type )();
                if (this._enableSaveBtn(this.#modalUpdateForm)) this.#modalSaveButton.classList.remove("disabled")
                else this.#modalSaveButton.classList.add("disabled");
            });
            input.addEventListener("blur", this._renderBlurValidation);
            input.addEventListener("input", (e) => {
                this._renderInputValidation(e.target, input.type )();
                if (this._enableModifyBtn(this.#modalUpdateForm)) this.#modalSaveButton.classList.remove("disabled")
                else this.#modalSaveButton.classList.add("disabled");
            })
        })
    }

    _enableSaveBtn(inputsArray) {
        if (!inputsArray) return true
        else return inputsArray.every(input => input.classList.contains("is-valid"));
    }

    _enableModifyBtn(inputsArray) {
        if (!inputsArray) return true
        else return inputsArray.some(input => input.classList.contains("is-valid"));
    }

    dipslayHideModal () {
        const closeBtns = [this.#modalCloseButton, this.#modalCloseIcon];

        this.#btnAdd.addEventListener("click", (e) => {
                e.preventDefault()
                this.#modalContainer.classList.remove("d-none");
                document.querySelector(`#${this.#currentPage}_add--body`).classList.remove("d-none");
                document.querySelector("#modal--title").textContent = `Ajouter ${this.#type}`;
                this._inputsCheck();
                this.activeSubmitButton("add");
        })


        this.#btnModify.forEach((btn) => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                this.#modalContainer.classList.remove("d-none");
                document.querySelector(`#${this.#currentPage}_modify--body`).classList.remove("d-none");
                document.querySelector("#modal--title").textContent = `Modifier ${this.#type}`;
                this._inputsCheck();
                const id = +e.target.href.split('/').slice(-1)
                document.querySelector("#modal_update--form").action = `/${this.#currentPage}/${id}`
                this.displayUpdateData(`${this.#currentPage}`, id)
                this.activeSubmitButton("modify");

            })
        })

        this.#btnRemove.forEach(btn => {
            btn.addEventListener("click", (e) => {
                e.preventDefault()
                const id = +e.target.href.split('/').slice(-1)
                document.querySelector("#modal_delete--form").action = `/${this.#currentPage}/delete/${id}`

                this.#modalContainer.classList.remove("d-none");
                document.querySelector("#remove--body").classList.remove("d-none");
                this.#modalSaveButton.classList.remove("disabled");
                document.querySelector("#modal--title").textContent = "Confirmer la Suppression";
                this.activeSubmitButton("remove")

            })
        })

        closeBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                this.#modalContainer.classList.add("d-none");
                document.querySelector(`#${this.#currentPage}_add--body`).classList.add("d-none");
                document.querySelector(`#${this.#currentPage}_modify--body`).classList.add("d-none");
                document.querySelector("#remove--body").classList.add("d-none");
                this.#modalSaveButton.classList.add("disabled");
                document.querySelector("#modal--title").textContent = "";
                [...this.#modalForm, ...this.#modalUpdateForm].forEach((input) => this._renderQuitBlurValidation(input))
            })
        })

    }

}

export default new Members();

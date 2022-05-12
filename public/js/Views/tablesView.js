import View from "./View.js";
import {getJSON} from "../helpers.js";

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
    #currentPage = window.location.pathname.slice(1);
    #modalForm = "";
    #modalUpdateForm = "";
    #checkBoxTable = "";
    #textAreaTable = "";
    #selectsTable = "";
    #type =  "";

    renderModalHeaderName() {
        switch(this.#currentPage) {
            case "members":
                this.#type = "un Membre"
                break;
            case "permissions":
                this.#type = "une Permission"
                break;
            case "signalmentsState": 
                this.#type = "un Etat"
                break;
            case "roles":
                this.#type = "un Rôle"
                break;
            case "departments":
                this.#type = "un Service"
                break;
            case "signalmentsCategory":
                this.#type = "une Catégorie"
                break;
                
            case "signalmentsPriority":
                this.#type = "une Priorité"
                break;
        }
    }


    generateFormTable() {
        this.#modalForm = Array.from(document.querySelector("#modal--form").elements)
        .filter (input => input.classList.contains("needs--validation"));
        this.#modalUpdateForm = Array.from(document.querySelector("#modal_update--form").elements)
        .filter (input => input.classList.contains("needs--validation"));
        this.#checkBoxTable =  Array.from(document.querySelector("#modal_update--form").elements)
        .filter(input => (input.dataset.type || input.type == "checkbox"))
        this.#textAreaTable = Array.from(document.querySelector("#modal_update--form").elements)
        .filter (input => input.classList.contains("text--area"));
        // Color Input
        document.querySelector("#color") ? this.#modalUpdateForm = [...this.#modalUpdateForm, document.querySelector("#color")] : "";
        // Fill selectedTable with optionsTables
        this.#selectsTable = Array.from(document.querySelector("#modal_update--form").querySelectorAll("select"));
        // testing
        console.log(this.#modalUpdateForm);
    }

    async displayUpdateData(currentPage, id) {
        let permissionsTable = [];
        // Fetch & Store Data
        let data = await getJSON(`/${currentPage}/${id}/edit`);

        // testing
        console.log(data);

        const {user_information} = data;
        data = {...user_information, ...data
        }
        // Store CheckBox
        if (data.permissions) permissionsTable = data.permissions.map(permObj => permObj["id"]);
        // Display on Input 
        this.#modalUpdateForm.forEach((input) => {
            if (!input) return;
            const inputText = input.id;
            input.value = data[`${inputText}`]?? null;
        })
        // Display on CheckBox
        if (this.#checkBoxTable) {
            this.#checkBoxTable.forEach((checkbox) => {
                const id = +checkbox.id.split("k").slice(-1).join("");
                if(permissionsTable.indexOf(id) >= 0) {
                    checkbox.checked = true;
                }
            })
        }
        // Display on TextArea
        if (this.#textAreaTable) {
            this.#textAreaTable.forEach((textArea) => {
                textArea.value = data.description
            })
        }
        // Display on Selects
        if (this.#selectsTable) {
                this.#selectsTable.forEach((select) => {
                    const selectedOptionID = data[`${select.name}`];
                    const selectedOption =  Array.from(select.querySelectorAll("option")).find(option => option.value == selectedOptionID);
                    selectedOption ? selectedOption.selected = "selected" : "";
                })
        }
        
    }

    activeSubmitButton(type) {
        this.#modalSaveButton.addEventListener("click", () => {
            document.querySelector(`.${type}--submit`).click();
        })
    }


    _inputsCheck() {
        this.#modalForm.forEach((input) => {
            input.addEventListener("focus", (e) => {
                this._renderInputValidation(e.target, input.dataset.type || input.type )();
                if (this._enableSaveBtn(this.#modalForm)) this.#modalSaveButton.classList.remove("disabled")
                else this.#modalSaveButton.classList.add("disabled");
            });
            input.addEventListener("blur", this._renderBlurValidation);
            input.addEventListener("input", (e) => {
                this._renderInputValidation(e.target, input.dataset.type || input.type )();
                if (this._enableSaveBtn(this.#modalForm)) this.#modalSaveButton.classList.remove("disabled")
                else this.#modalSaveButton.classList.add("disabled");
            })
        })
        this.#modalUpdateForm.forEach((input) => {
            input.addEventListener("focus", (e) => {
                this._renderInputValidation(e.target, input.dataset.type || input.type )();
                if (this._enableModifyBtn(this.#modalUpdateForm)) this.#modalSaveButton.classList.remove("disabled")
                else this.#modalSaveButton.classList.add("disabled");
            });
            input.addEventListener("blur", this._renderBlurValidation);
            input.addEventListener("input", (e) => {
                this._renderInputValidation(e.target, input.dataset.type || input.type )();
                if (this._enableModifyBtn(this.#modalUpdateForm)) this.#modalSaveButton.classList.remove("disabled")
                else this.#modalSaveButton.classList.add("disabled");
            })
        })
    }

    _selectChangeCheck() {
        this.#selectsTable.forEach(select => {
            select.addEventListener("change", () => {
                this.#modalSaveButton.classList.remove("disabled")
            })
        })
    }

    _checkBoxsCheck() {
        this.#checkBoxTable.forEach(checkBox => {
            checkBox.addEventListener("change", () => {
                this.#modalSaveButton.classList.remove("disabled")
            })
        })
    }

    _enableSaveBtn(inputsArray) {   
        if (!inputsArray) return true
        else return inputsArray.every(input => input && input.classList.contains("is-valid"));
    }

    _enableModifyBtn(inputsArray) {
        if (!inputsArray) return true
        else return inputsArray.some(input => input.classList.contains("is-valid")) && !inputsArray.some(input => input.classList.contains("is-invalid"));
    }

    dipslayHideModal () {
        const closeBtns = [this.#modalCloseButton, this.#modalCloseIcon];

        this.#btnAdd.addEventListener("click", (e) => {
                e.preventDefault()
                this.#modalContainer.classList.remove("d-none");
                this.#modalSaveButton.classList.add("disabled")
                document.querySelector(`#${this.#currentPage}_add--body`).classList.remove("d-none");
                document.querySelector("#modal--title").textContent = `Ajouter ${this.#type}`;
                this._inputsCheck();
                this.activeSubmitButton("add");
        })

        this.#btnModify.forEach((btn) => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                this.#modalSaveButton.classList.add("disabled");
                this.#modalContainer.classList.remove("d-none");
                document.querySelector(`#${this.#currentPage}_modify--body`).classList.remove("d-none");
                document.querySelector("#modal--title").textContent = `Modifier ${this.#type}`;
                this._inputsCheck();
                this._selectChangeCheck();
                this._checkBoxsCheck();
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
                this.#checkBoxTable.forEach((checkBox) => checkBox.checked = false);
            })
        })

    }

}

export default new Members();


import View from "./View.js"

class Members extends View {
    // General
    #containerModal = document.querySelector("#modal--container");
    #selectTable = document.querySelector("#table--select");
    #formsAdd = [...document.querySelectorAll(".add--forms")];
    #inputsArray = this.#formsAdd.map((form) => [...form.elements]).flat().filter((input) => ((input.placeholder) && (input.type != "textarea")));

    // Hide / Show
    #iconClose = document.querySelector("#close--icon");
    #btnClose = document.querySelector("#close--button");
    #btnSave = document.querySelector("#save--button");
    // Important Button
    #btnAdd = document.querySelector(".add--button");
    // Selected
    #currentSelect = "members";

    setDefaultOption () {
        this.#selectTable.value = "members";
    }

    clearAllInputs() {
        this.#inputsArray.forEach((input) => {
            input.value = ""
        })
        this.#btnSave.classList.add("disabled")
    }

    _validInputs(type) {
        const inputsArray = this.#inputsArray.filter((input) => input.classList.contains(`${type}--inputs`));
        inputsArray.forEach((input) => {
            input.addEventListener("focus", this._renderFocusValidation);
            input.addEventListener("blur", this._renderBlurValidation);
            input.addEventListener("input", (e) => {
                this._renderInputValidation(e.target, input.type )();
                if (this._enableSaveBtn(inputsArray)) this.#btnSave.classList.remove("disabled")
                else this.#btnSave.classList.add("disabled")
            })
        })
    }

    modalsHideDisplay() {
        this.#btnClose.addEventListener("click", () => {
            this.#containerModal.classList.add("d-none");
            this.#inputsArray.forEach((input) =>  {
                this._renderQuitBlurValidation(input);
            })
            this.clearAllInputs();
            document.querySelector(`#${this.#currentSelect}--body`).classList.add("d-none");
            document.querySelector(`#remove--body`).classList.add("d-none");

        })
        this.#iconClose.addEventListener("click", () => {
            this.#containerModal.classList.add("d-none");
            this.#inputsArray.forEach((input) =>  {
                this._renderQuitBlurValidation(input);
            })
            this.clearAllInputs();
            document.querySelector(`#${this.#currentSelect}--body`).classList.add("d-none");
            document.querySelector(`#remove--body`).classList.add("d-none");

        })
        this.#btnAdd.addEventListener("click", () => {
            const displayedType = this.#currentSelect == "members" ? "Un Membre" 
            : 
            this.#currentSelect == "permissions" ? "Une Permissison" 
            :
            "Un Rôle "
            this.#containerModal.classList.remove("d-none");
            document.querySelector(`#${this.#currentSelect}--body`).classList.remove("d-none");
            this._validInputs(this.#currentSelect);
            document.querySelector("#modal--title").textContent = `Ajouter ${displayedType}`
        })
    }

    _consultRemoveLinks() {
        const consultLink = document.querySelector(`#${this.#currentSelect}_consult--link`);
        const removeLink = document.querySelector(`#${this.#currentSelect}_remove--link`)
        consultLink.addEventListener("click", () => {
            const displayedType = this.#currentSelect == "members" ? "Un Membre" 
            : 
            this.#currentSelect == "permissions" ? "Une Permissison" 
            :
            "Un Rôle "
            this.#containerModal.classList.remove("d-none");
            document.querySelector(`#${this.#currentSelect}--body`).classList.remove("d-none");
            this._validInputs(this.#currentSelect);
            document.querySelector("#modal--title").textContent = `Ajouter ${displayedType}`
        });
        removeLink.addEventListener("click", () => {
            this.#containerModal.classList.remove("d-none");
            document.querySelector(`#remove--body`).classList.remove("d-none");
            this.#btnSave.classList.remove("disabled")
        })
    }

    _enableSaveBtn(inputsArray) {
        return inputsArray.every(input => input.classList.contains("is-valid"));
    }

    displaySelectedTable() {
        let newSelect = ""
        this._consultRemoveLinks();

        this.#selectTable.addEventListener("focus", (e) => {
            this.#currentSelect = e.target.value;
        })
        
        this.#selectTable.addEventListener("change", (e) => {
            newSelect = e.target.value;
            document.querySelector(`#${this.#currentSelect}--table`).classList.add("d-none");
            document.querySelector(`#${newSelect}--table`).classList.remove("d-none");
            document.querySelector(`#add_${this.#currentSelect}--text`).classList.add("d-none");
            document.querySelector(`#add_${newSelect}--text`).classList.remove("d-none");
            this.#currentSelect = newSelect;
            e.target.blur();
            this._consultRemoveLinks();
        })
    }
}

export default new Members();
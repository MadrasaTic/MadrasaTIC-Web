
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
    #btnSubmit = document.querySelector("#submit--button");
    #currentPage = window.location.pathname.slice(1);
    #Obj
    

    generateFormTable() {
        this.#modalForm = Array.from(document.querySelector("#modal--form").elements)
        .filter (input => input.classList.contains("modal--input"));
        this.#modalUpdateForm = Array.from(document.querySelector("#modal_update--form").elements)
        .filter (input => input.placeholder);
    }

    async displayUpdateData(currentPage, id) {

        const data = await fetch(`/${currentPage}/${id}`).then(function(response) {
            return response.json();
        }).then(function(data) {
            return data
        })

        console.log(data);

        this.#modalUpdateForm.forEach((input) => {
            const inputText = input.id
            input.value = data[`${inputText}`];
        })

        
    }

    testFunction() {
        console.log("Fired")
    }



    _inputsCheck() {
        this.#modalForm.forEach((input) => {
            input.addEventListener("focus", this._renderFocusValidation);
            input.addEventListener("blur", this._renderBlurValidation);
            input.addEventListener("input", (e) => {
                this._renderInputValidation(e.target, input.type )();
                if (this._enableSaveBtn(this.#modalForm)) this.#modalSaveButton.classList.remove("disabled")
                else this.#modalSaveButton.classList.add("disabled");
            })
        })
    }

    _enableSaveBtn(inputsArray) {
        if (!inputsArray) return true
        else return inputsArray.every(input => input.classList.contains("is-valid"));
    }

    dipslayHideModal () {
        const closeBtns = [this.#modalCloseButton, this.#modalCloseIcon];

        this.#btnAdd.addEventListener("click", (e) => {
                e.preventDefault()
                this.#modalContainer.classList.remove("d-none");
                document.querySelector(`#${this.#currentPage}_add--body`).classList.remove("d-none");
                document.querySelector("#modal--title").textContent = "Ajouter une Permission";
                this._inputsCheck();
        })


        this.#btnModify.forEach((btn) => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                this.#modalContainer.classList.remove("d-none");
                document.querySelector(`#${this.#currentPage}_modify--body`).classList.remove("d-none");
                document.querySelector("#modal--title").textContent = "Modifier la Permission";
                this._inputsCheck();
                const id = +e.target.href.split('/').slice(-1)
                document.querySelector("#modal_update--form").action = `/permissions/${id}`
                this.displayUpdateData("permissions", id)
            })
        })

        this.#btnRemove.forEach(btn => {
            btn.addEventListener("click", (e) => {
                e.preventDefault()
                const id = +e.target.href.split('/').slice(-1)
                console.log(id)
                document.querySelector("#modal_delete--form").action = `/permissions/delete/${id}`

                this.#modalContainer.classList.remove("d-none");
                document.querySelector("#remove--body").classList.remove("d-none");
                this.#modalSaveButton.classList.remove("disabled");
                document.querySelector("#modal--title").textContent = "Confirmer la Suppression";
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
            })
        })

        // this.#modalSaveButton.addEventListener("click", () => {
        //     this.#btnSubmit.click();
        // })
    }

}

export default new Members();
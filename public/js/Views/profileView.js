import View from './View.js'

class profileView extends View{
    #inputFirstName = document.querySelector("#fname--input"); 
    #inputLastName = document.querySelector("#lname--input");
    #inputPhone = document.querySelector("#phone--input");
    #newPassword = document.querySelector("#new_password--input");
    #previousPassword = document.querySelector("#previous_password--input")
    #btnModify = document.querySelector("#btn--modify");
    #btnSave = document.querySelector("#btn--save");
    #inputProfilImage = document.querySelector("#profil_image--input");
    #textProfilImage = document.querySelector("#img_profil--text");
    #btnUploadImage = document.querySelector("#upload_image--button");
    #btnUploadError = document.querySelector("#upload_image--error");
    #btnUploadSuccess = document.querySelector("#upload_image--success");
    #btnSaveProfil = document.querySelector("#save_profil--button");
    #iconSuccessUpload = document.querySelector("#upload_icon--success");
    #iconDefaultUpload = document.querySelector("#upload_icon--default");
    #inputSubmitImage = document.querySelector("#submit_image--input");
    #modalProfilImage = document.querySelector("#profil_photo--modal");
    #iconClosePhoto = document.querySelector("#close_photo--icon");
    #btnClosePhoto = document.querySelector("#close_photo--button");
    #btnChangePhoto = document.querySelector("#change_photo--button");
    #btnClosePassword = document.querySelector("#close_password--button");
    #btnCancelPassword = document.querySelector("#cancel_password--button");
    #btnSavePassword = document.querySelector("#save_password--button");
    #iconClosePassword = document.querySelector("#close_password--icon");
    #modalPassword = document.querySelector("#password--modal");
    #btnCloseDisconnect = document.querySelector("#close_disconnect--button");
    #btnCancelDisconnect = document.querySelector("#cancel_disconnect--button");
    #btnSaveDisconnect = document.querySelector("#save_disconnect--button");
    #iconCloseDisconnect = document.querySelector("#close_disconnect--icon");
    #modalDisconnect = document.querySelector("#disconnect--modal");
    #btnDisconnect = document.querySelector("#disconnect--button");


    clearInputs() {
        this.#inputFirstName.value = this.#inputLastName.value = this.#inputPhone.value = this.#newPassword.value =  this.#previousPassword.value = "";
    }

    renderProfilInputName () {
        let imgName = "";

        this.#btnDisconnect.addEventListener("click", (e) => {
            e.preventDefault();
            this.#modalDisconnect.classList.remove("d-none")
        })

        this.#btnCloseDisconnect.addEventListener("click", () => {
            this.#modalDisconnect.classList.add("d-none");
        })

        this.#btnCancelDisconnect.addEventListener("click", () => {
            this.#modalDisconnect.classList.add("d-none");
            this.#previousPassword.value = this.#newPassword.value = "";
            location.reload();
        })

        this.#btnSaveDisconnect.addEventListener("click", ()=> {
            this.#modalDisconnect.classList.add("d-none");
            this.#previousPassword.value = this.#newPassword.value = "";
            location.reload();
        })

        this.#iconCloseDisconnect.addEventListener("click", () => {
            this.#modalDisconnect.classList.add("d-none");
        })



        this.#btnClosePassword.addEventListener("click", () => {
            this.#modalPassword.classList.add("d-none");
        })

        this.#btnCancelPassword.addEventListener("click", () => {
            this.#modalPassword.classList.add("d-none");
            this.#previousPassword.value = this.#newPassword.value = "";
            location.reload();
        })

        this.#btnSavePassword.addEventListener("click", ()=> {
            this.#modalPassword.classList.add("d-none");
            this.#previousPassword.value = this.#newPassword.value = "";
            location.reload();
        })
        
        this.#btnSave.addEventListener("click", (e) => {
            e.preventDefault()
            this.#modalPassword.classList.remove("d-none"); 
        })

        this.#iconClosePassword.addEventListener("click", () => {
            this.#modalPassword.classList.add("d-none");
        })
        
        this.#btnChangePhoto.addEventListener("click", () => {
            this.#modalProfilImage.classList.remove("d-none")
        })

        this.#iconClosePhoto.addEventListener("click", ()=> {
            this.#modalProfilImage.classList.add("d-none")
        })

        this.#btnClosePhoto.addEventListener("click", ()=> {
            this.#modalProfilImage.classList.add("d-none")
        })

        this.#inputProfilImage.addEventListener("change", (e)=> {
            console.log(this.#btnSaveProfil);
            if (e.target.value) {
                imgName = String(this.#inputProfilImage.value).split("\\").slice(-1).join("");
                this.#textProfilImage.textContent = imgName;        
                this.#btnUploadSuccess.classList.remove("d-none");
                this.#btnSaveProfil.classList.remove("disabled");
                this.#iconSuccessUpload.classList.remove("d-none");
                this.#iconDefaultUpload.classList.add("d-none");
            } else {
                console.log("not correct");
                this.#btnUploadError.remove("d-none");
                this.#btnUploadImage.add("d-none");
            }
        })

        this.#btnSaveProfil.addEventListener("click", ()=> {
            this.#inputSubmitImage.click();
        })
    }
    
    inputsCheck() {
        this.#inputFirstName.addEventListener("focus", this._renderFocusValidation);
        this.#inputFirstName.addEventListener("blur", this._renderBlurValidation);
        this.#inputFirstName.addEventListener("input", (e) => {
            this._renderInputValidation(e.target, "text")();
            this._enableModifyBtn();
        });
        this.#inputLastName.addEventListener("focus", this._renderFocusValidation);
        this.#inputLastName.addEventListener("blur", this._renderBlurValidation);
        this.#inputLastName.addEventListener("input", (e) => {
            this._renderInputValidation(e.target, "text")();
            this._enableModifyBtn();

        });
        this.#inputPhone.addEventListener("focus", this._renderFocusValidation);
        this.#inputPhone.addEventListener("blur", this._renderBlurValidation);
        this.#inputPhone.addEventListener("input", (e) => {
            this._renderInputValidation(e.target, "phone")();
            this._enableModifyBtn();
        });

        this.#newPassword.addEventListener("focus", this._renderFocusValidation);
        this.#newPassword.addEventListener("blur", this._renderBlurValidation);
        this.#newPassword.addEventListener("input", (e) => {
            this._renderInputValidation(e.target, "password")();
            this._enableSaveBtn();
        });

        this.#previousPassword.addEventListener("focus", this._renderFocusValidation);
        this.#previousPassword.addEventListener("blur", this._renderBlurValidation);
        this.#previousPassword.addEventListener("input", (e) => {
            this._renderInputValidation(e.target, "password")();
            this._enableSaveBtn();
        });
    }

    _enableModifyBtn() {
        if (
            this.#inputFirstName.classList.contains("is-valid") ||
            this.#inputLastName.classList.contains("is-valid") ||
            this.#inputPhone.classList.contains("is-valid")
        ) {
            this.#btnModify.classList.remove("disabled");
        }
        else this.#btnModify.classList.add("disabled")
    }

    _enableSaveBtn() {
        if ((this.#newPassword.classList.contains("is-valid")) && (this.#previousPassword.classList.contains("is-valid")))this.#btnSave.classList.remove("disabled")
        else this.#btnSave.classList.add("disabled")
    }


}

export default new profileView();
class loginView {
    #inputEmail = document.querySelector("#email--input");
    #inputPassword = document.querySelector("#password--input");
    #btnLogin = document.querySelector("#login--btn");
    #validEmail;
    #validPassword;

    validEmailCheck() {
        window.addEventListener("load", () => {
            this.#inputEmail.value = this.#inputPassword = "";
        })
        this.#inputEmail.addEventListener("focus", this._renderFocusValidation);
        this.#inputEmail.addEventListener("blur", this._renderBlurValidation);
        this.#inputEmail.addEventListener("input", (e) => {
            this._renderInputValidation(e.target, "email")();
        });
        this.#inputPassword.addEventListener("focus", this._renderFocusValidation);
        this.#inputPassword.addEventListener("blur", this._renderBlurValidation);
        this.#inputPassword.addEventListener("input", (e) => {
            this._renderInputValidation(e.target, "password")();
        });
    }


    _renderFocusValidation(parentEl) {
        const iconValid =
            parentEl.target.parentElement.querySelector(".valid--icon");
        if (!iconValid.classList.contains("d-none")) return;

        const iconInvalid =
            parentEl.target.parentElement.querySelector(".invalid--icon");
        const textInvalid =
            parentEl.target.parentElement.parentElement.querySelector(
                ".invalid-feedback"
            );

        // Init
        textInvalid.classList.remove("d-none");
        iconInvalid.classList.remove("d-none");
        parentEl.target.classList.remove("is-valid");
        parentEl.target.classList.add("is-invalid");
    }   

    _renderBlurValidation(parentEl) {
        const iconInvalid =
            parentEl.target.parentElement.querySelector(".invalid--icon");
        const textInvalid =
            parentEl.target.parentElement.parentElement.querySelector(
                ".invalid-feedback"
            );

        iconInvalid.classList.add("d-none");
        textInvalid.classList.add("d-none");
        parentEl.target.classList.remove("is-invalid")
    }

    _renderInputValidation(parentEl, type) {
        return () => {
            const iconValid = parentEl.parentElement.querySelector(".valid--icon");
            const iconInvalid = parentEl.parentElement.querySelector(".invalid--icon");
            const textValid = parentEl.parentElement.parentElement.querySelector(".valid-feedback");
            const textInvalid = parentEl.parentElement.parentElement.querySelector(".invalid-feedback");
            const input = parentEl.value;

    
            const re = type === "email" ? /^([a-z]){1,}\.([a-zA-Z])+(@esi-sba\.dz)$/ : /^(?=.*\d)(?=.*[!#$%&?"*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/ ;
    
    
            if (re.test(input) && iconValid.classList.contains("d-none")) {
                this._majDisplayIcons(iconValid, iconInvalid);
                this._majDisplayMessages(textValid, textInvalid);
                this._majDisplayInputStyle(parentEl);
                console.log(`${type} is correct`);
                type == "email" ? this.#validEmail = true : type == "password" ? this.#validPassword = true : "";
            } else if (
                !re.test(input) &&
                iconInvalid.classList.contains("d-none")
            ) {
                this._majDisplayIcons(iconValid, iconInvalid);
                this._majDisplayMessages(textValid, textInvalid);
                this._majDisplayInputStyle(parentEl);
                console.log(`${type} is not correct`);
                type == "password" ? this.#validPassword = false : this.#validEmail = false;

            }

            console.log(this.#validEmail, this.#validPassword);
    
            if (this.#validEmail && this.#validPassword) {
                this.#btnLogin.classList.remove("disabled");
            } else if (
                !this.#btnLogin.classList.contains("disabled")
            )
                this.#btnLogin.classList.add("disabled");
        }
    }

    _majDisplayIcons(iconValid, iconInvalid) {
        iconValid.classList.toggle("d-none");
        iconInvalid.classList.toggle("d-none");
    }
    _majDisplayMessages(textValid, textInvalid) {
        textValid.classList.toggle("d-none");
        textInvalid.classList.toggle("d-none");
    }
    _majDisplayInputStyle(parentInput) {
        parentInput.classList.toggle("is-valid");
        parentInput.classList.toggle("is-invalid");
    }
}

export default new loginView();

// const re1 = /(?=.*[A-Z])(?=.*[a-z]).*$/
// const re2 = /[!#$%&?"*]/;
// const re3 = /\d/;
// const re4 = /.{8,}/;

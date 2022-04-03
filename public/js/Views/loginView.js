import View from "./View.js";

class loginView extends View {
    #formLogin;
    #btnLogin = document.querySelector("#login--btn");

    generateFormArray() {
        this.#formLogin = Array.from(document.querySelector("#login--form").elements).filter((input) => (input.placeholder));
    }

    clearAllInputs () {
        this.#formLogin.forEach(input => {
            input.value = ""
        });
    }

    inputsCheck() {
        this.#formLogin.forEach((input) => {
            input.addEventListener("focus", this._renderFocusValidation);
            input.addEventListener("blur", this._renderBlurValidation);
            input.addEventListener("input", (e) => {
                this._renderInputValidation(e.target, input.type)();
                if (this._enableLoginBtn()) this.#btnLogin.classList.remove("disabled")
                else this.#btnLogin.classList.add("disabled")
            });
        })
    }

    _enableLoginBtn() {
        return this.#formLogin.every(input => input.classList.contains("is-valid"))
    }

}

export default new loginView();



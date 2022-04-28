export default class View {

    #reEmail =  /^([a-z]){1,}\.([a-zA-Z])+(@esi-sba\.dz)$/;
    #rePassword = /^(?=.*\d)(?=.*[!#$%&?"*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    #reChars = /(?=.*[A-Z])(?=.*[a-z]).*$/
    #reDigits = /\d/; 


    _renderFocusValidation(parentEl) {
        const iconValid =
            parentEl.target.parentElement.querySelector(".valid--icon");
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

    _renderQuitBlurValidation(parentEl) {
        const iconValid =
            parentEl?.parentElement.querySelector(".valid--icon");
        const textValid = 
            parentEl?.parentElement.parentElement.querySelector(".valid-feedback");
        const iconInvalid =
            parentEl?.parentElement.querySelector(".invalid--icon");
        const textInvalid =
            parentEl?.parentElement.querySelector(
                ".invalid-feedback"
            );

        if (!iconValid?.classList.contains("d-none")) {
            iconValid?.classList.add("d-none");
            textValid?.classList.add("d-none");
            parentEl?.classList.remove("is-valid");
        }

        if (!iconInvalid?.classList.contains("d-none")) {
            iconInvalid?.classList.add("d-none");
            textInvalid?.classList.add("d-none");
            parentEl?.classList.remove("is-invalid");
        }
    }

    _renderInputValidation(parentEl, type) {
        return () => {
            const iconValid = parentEl.parentElement.querySelector(".valid--icon");
            const iconInvalid = parentEl.parentElement.querySelector(".invalid--icon");
            const textValid = parentEl.parentElement.parentElement.querySelector(".valid-feedback");
            const textInvalid = parentEl.parentElement.parentElement.querySelector(".invalid-feedback");
            const input = parentEl?.value;
            
            const re = 
            type === "email" ? /^([a-z]){1,}\.([a-zA-Z])+(@esi-sba\.dz)$/ 
            : 
            type === "password" ? /^(?=.*\d)(?=.*[!#$%&?"*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/ 
            : 
            type === "text" ? /^[a-zA-Zéè   \ ]{4,30}$/
            : 
            type === "number" ? /\d*/ : "";

            if (re?.test(input) && iconValid.classList.contains("d-none")) {
                this._majDisplayIcons(iconValid, iconInvalid, "correct");
                this._majDisplayMessages(textValid, textInvalid, "correct");
                this._majDisplayInputStyle(parentEl, "correct");
            } else if (
                !re?.test(input) &&
                iconInvalid.classList.contains("d-none")
            ) {
                this._majDisplayIcons(iconValid, iconInvalid, "incorrect");
                this._majDisplayMessages(textValid, textInvalid, "incorrect");
                this._majDisplayInputStyle(parentEl, "incorrect");
            }
    
        }
    }

    _majDisplayIcons(iconValid, iconInvalid, value) {
        if (value == "correct") {
            iconValid.classList.remove("d-none");
            iconInvalid.classList.add("d-none")
        } else 
        if (value = "incorrect") {
            iconValid.classList.add("d-none");
            iconInvalid.classList.remove("d-none")
        }
    }
    _majDisplayMessages(textValid, textInvalid, value) {
        if (value == "correct") {
            textValid.classList.remove("d-none");
            textInvalid.classList.add("d-none")
        } else 
        if (value == "incorrect") {
            textValid.classList.add("d-none");
            textInvalid.classList.remove("d-none")
        }
    }
    _majDisplayInputStyle(parentInput, value) {
        if (value == "correct") {
            parentInput.classList.add("is-valid");
            parentInput.classList.remove("is-invalid")
        } else 
        if (value == "incorrect") {
            parentInput.classList.remove("is-valid");
            parentInput.classList.add("is-invalid")
        }
    }
}
export default class View {

    #reEmail =  /^([a-z]){1,}\.([a-zA-Z])+(@esi-sba\.dz)$/;
    #rePassword = /^(?=.*\d)(?=.*[!#$%&?"*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    #reChars = /(?=.*[A-Z])(?=.*[a-z]).*$/
    #reDigits = /\d/; 


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

    
            const re = 
            type === "email" ? /^([a-z]){1,}\.([a-zA-Z])+(@esi-sba\.dz)$/ 
            : 
            type === "password" ? /^(?=.*\d)(?=.*[!#$%&?"*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/ 
            : 
            type === "text" ? /^[a-zA-Z]{4,16}$/
            : 
            type === "phone" ? /^\d{10}$/ : "";


    
    
            if (re.test(input) && iconValid.classList.contains("d-none")) {
                this._majDisplayIcons(iconValid, iconInvalid);
                this._majDisplayMessages(textValid, textInvalid);
                this._majDisplayInputStyle(parentEl);
            } else if (
                !re.test(input) &&
                iconInvalid.classList.contains("d-none")
            ) {
                this._majDisplayIcons(iconValid, iconInvalid);
                this._majDisplayMessages(textValid, textInvalid);
                this._majDisplayInputStyle(parentEl);
            }
    
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
class loginView {
    #inputEmail = document.querySelector("#email--input");
    #inputPassword = document.querySelector("#password--input");
    #checkContainer = document.querySelectorAll(".check--container");
    #errorMessagesContainer = document.querySelector("#error_messages--container")
    #textValidEmail = document.querySelector(".valid_email--text");
    #textInvalidEmail = document.querySelector(".invalid_email--text");
    #btnLogin = document.querySelector("#login--btn");
    #validEmail = false;
    #validPassword = false;



    validEmailCheck() {
        let labelValid;
        let labelInvalid;



        let input = ""
        const reInput = /^([a-z]){1,}\.([a-zA-Z])+(@esi-sba\.dz)$/
        const rePassword = /^(?=.*\d)(?=.*[!#$%&?"*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/
        const re1 = /(?=.*[A-Z])(?=.*[a-z]).*$/
        const re2 = /[!#$%&?"*]/;
        const re3 = /\d/;
        const re4 = /.{8,}/;

        

        this.#inputEmail.addEventListener("input", (e) => {
            this.#checkContainer[0].classList.remove("d-none");
            this.#textInvalidEmail.classList.remove("d-none");
            labelValid = this.#inputEmail.parentElement.querySelector(".valid--icon");
            labelInvalid = this.#inputEmail.parentElement.querySelector(".invalid--icon");
            
            input = e.target.value;
            if (reInput.test(input) && labelValid.classList.contains("d-none") ) { 
                this._displayValidInput(labelValid, labelInvalid);
                this._displayValidEmailMessage();
                this.#validEmail = true;
            } else if (!reInput.test(input) && labelInvalid.classList.contains("d-none")) {
                this._displayInvalidInput(labelValid, labelInvalid);
                this._displayInvalidEmailMessage();
                this.#validEmail = false;

            }

            console.log(this.#validEmail, this.#validPassword);
            if(this.#validEmail && this.#validPassword){
                this.#btnLogin.classList.remove("disabled")
            } 
            else if (!this.#btnLogin.classList.contains("disabled"))this.#btnLogin.classList.add("disabled")

            

        });



        this.#inputPassword.addEventListener("input", (e) => {
            this.#checkContainer[1].classList.remove("d-none");
            this.#errorMessagesContainer.classList.remove("d-none");
    
            labelValid = this.#inputPassword.parentElement.querySelector(".valid--icon");
            labelInvalid = this.#inputPassword.parentElement.querySelector(".invalid--icon");

            input = e.target.value;

            if (rePassword.test(input) && labelValid.classList.contains("d-none") ) { 
                this._displayValidInput(labelValid, labelInvalid);
                this.#validPassword = true
            } else if (!rePassword.test(input) && labelInvalid.classList.contains("d-none")) {
                this._displayInvalidInput(labelValid, labelInvalid);
                this.#validEmail = false;
            }

            console.log("InputIsTypes");

            if (re1.test(input)) document.querySelector("#er1").classList.add("text-success")
            else document.querySelector("#er1").classList.remove("text-success");
            if (re2.test(input)) document.querySelector("#er2").classList.add("text-success")
            else document.querySelector("#er2").classList.remove("text-success");
            if (re3.test(input)) document.querySelector("#er3").classList.add("text-success")
            else document.querySelector("#er3").classList.remove("text-success");
            if (re4.test(input)) document.querySelector("#er4").classList.add("text-success")
            else document.querySelector("#er4").classList.remove("text-success");

            console.log(this.#validEmail, this.#validPassword);
            if(this.#validEmail && this.#validPassword){
                this.#btnLogin.classList.remove("disabled")
            } 
            else if (!this.#btnLogin.classList.contains("disabled") )this.#btnLogin.classList.add("disabled")
        });


       


    }
    _displayValidInput(labelValid, labelInvalid) {
        // Display / Hide Icons
        labelValid.classList.toggle("d-none");
        labelInvalid.classList.toggle("d-none");



    }
    _displayInvalidInput(labelValid, labelInvalid) {
        labelValid.classList.toggle("d-none");
        labelInvalid.classList.toggle("d-none");
    }

    _displayValidEmailMessage() {
        this.#textValidEmail.classList.toggle("d-none");
        this.#textInvalidEmail.classList.toggle("d-none");        
    }

    _displayInvalidEmailMessage() {
        this.#textValidEmail.classList.toggle("d-none");
        this.#textInvalidEmail.classList.toggle("d-none");  
    }


}

export default new loginView();
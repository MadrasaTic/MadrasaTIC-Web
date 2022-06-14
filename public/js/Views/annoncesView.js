

class SignalmentsView {
    #selectedCategory = "Catégories";
    #selectedState = "États";
    #selectedDate = "";
    #selectedAnnexe = "Annexes";
    #selectedBloc = "Blocs";
    #selectedRoom = "Salles";
    #selectedParentFilter = ""

    addHandlerRender(handler) {
        if (window.location.pathname.slice(1) == "signalments") handler();
    }

    addHandlerParentFilterChange() {
    
    }

    addHandlerInfraFilters() {

    }

    addHandlerShowModalBtn() {
        const showModalBtn = document.querySelectorAll(".show_modal--button");
        console.log(showModalBtn);
        showModalBtn.forEach(btn => {
            btn.addEventListener("click", () => {
                document.querySelector("#modal_signalments").classList.remove("d-none");
            })
        })
    } 

    addHandlerCloseModal() {
        document.querySelector("#close_signalment--button").addEventListener("click", () => {
            document.querySelector("#modal_signalments").classList.add("d-none");
        })
    }

    addHandlerApproveSignalmentBtn() {
        document.querySelector("#approve_signalment--button").addEventListener("click", (e) => {
            console.log("Signalements Approved");
            // const form = e.target.closest("form");
            // form.method = "POST";
            // form.action = "/signalements/delete/id"

            const form = e.target.closest("form");


            form.action = `/signalments/${form.dataset.id}`
            

            e.target.closest("button").click();
            
            
        })
    }

    addHandlerResendSignalmentsBtn() {
        document.querySelector("#resend_signalment--button").addEventListener("click", () => {
            console.log("Signalement Resent");
        })
    }

    addHandlerDeleteSignalmentBtn() {
        document.querySelector("#delete_signalment--button").addEventListener("click", (e) => {
            console.log("Signalment Delete");
            const form = e.target.closest("form");
            

            form.action = `/signalments/delete/${form.dataset.id}`

            console.log(form.action)

            e.target.closest("button").click();


        })
    }

    addHandlerShowRattachedToBody() {
   
    }

    addHandlerRattachedToBackBtn() {
       
    }

    addHandlerRattachedToSubmitBtn() {
       
    }

    addHandlerCloseRattachedToBtn() {

    }
    
    // Selects
    addHandlerLoadAnnexe(handler, type, url) {
        window.addEventListener("load", () => {
            handler(type, url)
        })
    }

    addHandlerAnnexeChange(handler, type, url) {

    }

    addHandlerBlocChange(handler, type, url) {
    }

    addHandlerModalCategoryChange() {
   
    }

    addHandlerCategoryChange() {
        
    }

    addHandlerStateChange() {

    }
    
    

    adHandlerSalleChange(handler) {
      
    }

    addHandlerModalState() {
       
    }



    renderInfraOptions(data, type) {

    }
}

export default new SignalmentsView();
